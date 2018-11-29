import alisms
import mysql_handle
import time
from threading import Thread

# ----------------------监控设置----------------------
device_name = ['Tem1', 'Hem1']  # 需要监控的设备名(thing)
max_value = [15, 80]  # 最大值，位置对应
min_value = [13, 30]  # 最小值，位置对应
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
        print(d_name + '小于阈值，准备发送短信')
        send_msg(d_name, value)
        Thread(target=m_control, args=(delay, index)).start()
        return 1
    elif float(value) > max_value[index]:
        print(d_name + '大于阈值，准备发送短信')
        send_msg(d_name, value)
        Thread(target=m_control, args=(delay, index)).start()
        return 1
    return 0


def m_control(d, d_index):
    global m
    m[d_index] = False
    time.sleep(d)
    m[d_index] = True


def check():
    for name in device_name:
        try:
            data = mysql_handle.mysql_ex("select data from things where thing='%s' \
        ORDER BY createdTime DESC limit 1" % name)
        except:
            print('读取数据库数据失败！')
            return
        if not data:
            print('数据为空')
            return
        monitoring(name, data[0][0])


if __name__ == '__main__':
    print('启动监控...')
    while True:
        check()
        time.sleep(10)
