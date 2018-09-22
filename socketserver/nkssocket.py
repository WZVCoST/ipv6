from socketserver import BaseRequestHandler, TCPServer
from threading import Thread
import alisms
import pymysql,time

host = ""  # 数据库ip地址，留空为本地
name = ""  # 数据库连接用户名
pwd = ""  # 密码
db_name = ""  # 数据库名
table = "" #表名称
socketServer_port = 60001 #socket服务器监听端口

# ----------------------监控设置----------------------
device_name = ['Tem1', 'Tem2','Tem3','Hum','CO2']  # 需要监控的设备名(thing)
max_value = [35, 35,35,85,800]  # 最大值，位置对应
min_value = [0, 0,0,20,200]  # 最小值，位置对应
delay = 1800  # 发短信间隔单位秒
phone_num = '13705777980'  # 接收短信的手机
# ----------------------监控设置----------------------

global m
m = []
if len(device_name) == len(max_value) and len(max_value) == len(min_value):
    print('监控设置格式无误')
else:
    print('监控设置有误，设备名最大值最小值长度不一致，每个设备都有对应的最小值最大值！')
    exit()
for i in device_name:
    m.append(True)
def send_msg(d_name, value):
    template_params = {
        'device_name': d_name,
        'value': value
    }
    sms = alisms.AliSMS()
    resp = sms.send(phone_num, template_params)
    print(resp.status_code, resp.json(), '发送短信')
def monitoring(d_name, value):
    global m
    if d_name not in device_name:
        return 0
    index = device_name.index(d_name)
    if not m[index]:
        return 0
    if float(value) < min_value[index]:
        send_msg(d_name, value)
        Thread(target=m_control, args=(delay,index)).start()
        return 1
    elif float(value) > max_value[index]:
        send_msg(d_name, value)
        Thread(target=m_control, args=(delay,index)).start()
        return 1
    return 0



def m_control(d, d_index):
    global m
    m[d_index] = False
    time.sleep(d)
    m[d_index] = True

def Insert(data, thing):
    # 打开数据库连接
    db = pymysql.connect(host,name,pwd,db_name)
    # 使用 cursor() 方法创建一个游标对象 cursor
    cursor = db.cursor()
    # SQL 插入语句
    sql = "INSERT INTO {0}(\
           data,thing,createdTime) \
           VALUES ('{1}','{2}','{3}')".format(table,data,thing,time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()))
    try:
       # 执行sql语句
       cursor.execute(sql)
       # 提交到数据库执行
       db.commit()
    except:
       # 发生错误时回滚
       db.rollback()
    # 关闭数据库连接
    print(time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()),':写入数据库成功!\n')
    db.close()
    
def Get_data(datastr,key):
    if datastr.find(key) == -1:
        return
    if datastr[datastr.find(key) + len(key)] != '=':
        return
    start = datastr.find(key) + len(key) + 1
    end = start + 1
    while True:
        if end == len(datastr) or datastr[end] == '&':
            break
        end += 1
    if end == len(datastr):
        return datastr[start:len(datastr)]
    return datastr[start:end]

class EchoHandler(BaseRequestHandler):
    def handle(self):
        print('-----------建立连接-----------')
        print ("连接来自IP:", self.client_address)
        while True:
            msg = self.request.recv(1024)
            if not msg:
                break
            str_msg = str(msg, encoding="gbk").strip()
            print(str_msg)
            data = Get_data(str_msg,'data')
            thing = Get_data(str_msg,'device_name')
            if data != None and thing != None:
                data = data.strip()
                thing = thing.strip()#去掉前后空格
                #print(data,thing)
                monitoring(thing, data)
                Thread(target=Insert,args=(data,thing)).start()#写入数据库线程
            else:
                print('异常数据不写入数据库\n')
        print('-----------连接断开-----------')

if __name__ == '__main__':
    NWORKERS = 16
    # 绑定socket服务端所在ip(默认留空为本地不需要改)和端口号(在最上面改端口号即可)
    serv = TCPServer(('', socketServer_port), EchoHandler)
    for n in range(NWORKERS):
        t = Thread(target=serv.serve_forever)
        t.daemon = True
        t.start()
    print("Socket服务启动")
    serv.serve_forever()
