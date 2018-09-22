from django.shortcuts import render
from django.http import JsonResponse,HttpResponseRedirect

device_list = []
device_cmd = []
device_cmd_c = []


def index(request):
    context = {}
    if request.POST:
        device_name = ''
        try:
            device_name = request.POST['d_list']
            d_index = device_list.index(device_name)
            device_cmd[d_index] = request.POST['code']
            device_cmd_c[d_index] = True
            #print(device_cmd, device_cmd_c)
        except Exception:
            print('不存在设备', device_name)
        finally:
            return HttpResponseRedirect('/')
    return render(request, 'index.html', context)


def device(request):
    context = {}
    context['device_list'] = device_list
    return JsonResponse(context)


# --------------------------------------------------------#
from socketserver import BaseRequestHandler, TCPServer
from threading import Thread
import time

socketServer_port = 10000  # socket服务器监听端口


def Get_keyvalue(datastr, key):
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
        print("建立连接,IP:", self.client_address)
        while True:
            d_index = None
            device_name = ''
            try:
                msg = str(self.request.recv(1024), encoding="gbk")  # 尝试接收数据
            except Exception:
                #print('连接出错--接收')
                break

            if not msg:
                break
            cmd = Get_keyvalue(msg, 'cmd')
            if cmd != None:
                cmd = cmd.strip()
            if cmd == 'get_device_list':
                self.request.send(bytes(str(device_list), encoding="gbk"))

                
            if cmd == 'send_device':
                #print(msg)
                try:
                    index = device_list.index(Get_keyvalue(msg, 'device_name'))
                    code = Get_keyvalue(msg, 'code')
                    if code == '' or code == None:
                        pass
                    else:
                        device_cmd[index] = code
                        device_cmd_c[index] = True
                except:
                    pass
      
            if cmd == 'subscribe':
                device_name = Get_keyvalue(msg, 'device_name')
                device_name = device_name.strip()
                if device_name in device_list:
                    print(device_name, '设备重名！')
                    break
                
                self.request.send(bytes('connect', encoding="gbk"))  # 连接成功应答
                
                device_list.append(device_name)
                print('新建设备:', device_name)
                device_cmd.append('')
                device_cmd_c.append(False)
                
                while True:
                    d_index = device_list.index(device_name)
                    boom = 0
                    while boom != 100:
                        if device_cmd_c[d_index] and device_cmd[d_index] != '':
                            break
                        time.sleep(0.1)
                        boom += 1
                    if device_cmd_c[d_index] and device_cmd[d_index] != '':
                        boom = 0
                    try:
                        if boom == 100:
                            ret_msg = bytes('alive', encoding="gbk")
                        else:
                            ret_msg = bytes(device_cmd[d_index], encoding="gbk")
                        # 尝试发送数据
                        self.request.send(ret_msg)
                    except Exception:
                        #print('连接出错--发送')
                        break
                    device_cmd[d_index] = ''  # 清空命令
                    device_cmd_c[d_index] = False  # 重置状态
                    if boom == 100:
                        print(device_name, '发送心跳!')
                    else:
                        print(device_name, '发送指令完毕!')
                    try:
                        msg = str(self.request.recv(1024), encoding="gbk")  # 尝试接收数据
                    except Exception:
                        print(device_name, '连接出错--接收')
                        break
                    if not msg:
                        break
                    if boom == 100:
                        print(device_name, '确认存活!')
                    else:
                        if msg == 'successful_cmd\r\n':
                            print(device_name, '应答：成功命令!')
                        elif msg == 'unknow_cmd\r\n':
                            print(device_name, '应答：未知命令!')
            try:
                if d_index != None:
                    print('删除设备:', device_name, self.client_address)
                    #print(d_index, device_name)
                    d_index = device_list.index(device_name)
                    if d_index == -1:
                        print(device_name, '设备不存在')
                    else:
                        #print(d_index)
                        device_list.pop(d_index)
                        device_cmd.pop(d_index)
                        device_cmd_c.pop(d_index)
            except Exception:
                print(device_name, '删除出错')
        print("断开连接,IP:", self.client_address)


NWORKERS = 4
# 绑定socket服务端所在ip(默认留空为本地不需要改)和端口号(在最上面改端口号即可)
serv = TCPServer(('', socketServer_port), EchoHandler)
for n in range(NWORKERS):
    t = Thread(target=serv.serve_forever)
    t.daemon = True
    t.start()
print("SocketServer Start...")
