# -*- coding: utf-8 -*-

from django.shortcuts import render
import pymysql, time
from django.http import JsonResponse

host = "ebd.jydsj.org"  # 数据库ip地址，留空为本地
name = "wpm"  # 数据库连接用户名
pwd = "wpm"  # 密码
db_name = "wpm"  # 数据库名
table = "iot_t"  # 表名称


def Get_newdata(d_name, timestamp):
    # 打开数据库连接
    db = pymysql.connect(host, name, pwd, db_name)
    # 使用 cursor() 方法创建一个游标对象 cursor
    cursor = db.cursor()
    date = timestamp_to_date(timestamp)
    # 使用 execute()  方法执行 SQL 查询
    cursor.execute(
        "SELECT data,createdTime from {0} WHERE createdTime>'{1}' AND thing='{2}' ORDER BY createdTime DESC ".format(
            table, date, d_name))
    # 使用 fetchone() 方法获取单条数据.
    data = cursor.fetchall()
    # 关闭数据库连接
    db.close()
    return data


def Get_data(d_name, limit):
    # 打开数据库连接
    db = pymysql.connect(host, name, pwd, db_name)
    # 使用 cursor() 方法创建一个游标对象 cursor
    cursor = db.cursor()
    # 使用 execute()  方法执行 SQL 查询
    cursor.execute(
        "SELECT data,createdTime from {0} WHERE thing='{1}'ORDER BY createdTime DESC limit {2}".format(table, d_name,
                                                                                                       limit))
    # 使用 fetchone() 方法获取单条数据.
    data = cursor.fetchall()
    # 关闭数据库连接
    db.close()
    return data


def Get_devicename():
    # 打开数据库连接
    db = pymysql.connect(host, name, pwd, db_name)
    # 使用 cursor() 方法创建一个游标对象 cursor
    cursor = db.cursor()
    # 使用 execute()  方法执行 SQL 查询
    cursor.execute("SELECT thing from {0} GROUP BY thing".format(table))
    # 使用 fetchone() 方法获取单条数据.
    data = cursor.fetchall()
    # 关闭数据库连接
    db.close()
    return data


def date_to_timestamp(date):  # 将日期格式转换成时间戳
    dt = str(date)
    # 转换成时间数组
    timeArray = time.strptime(dt, "%Y-%m-%d %H:%M:%S")
    # 转换成时间戳
    timestamp = time.mktime(timeArray)
    return timestamp


def timestamp_to_date(timestamp):  # 将时间戳转换成日期格式
    # 转换成localtime
    time_local = time.localtime(timestamp)
    # 转换成新的时间格式(2016-05-05 20:28:54)
    dt = time.strftime("%Y-%m-%d %H:%M:%S", time_local)
    return dt


def ajax_newdata(request):
    retdata = []
    maxstp = float(request.GET.get('maxtimestamp'))
    d_name = request.GET.get('d_name')
    data = Get_newdata(d_name, maxstp / 1000)
    if data == ():
        return JsonResponse(None, safe=False)
    if data != ():
        for d in data:
            temp = {}
            temp['x'] = date_to_timestamp(d[1]) * 1000
            temp['y'] = d[0]
            retdata.append(temp)
    retdata.reverse()
    return JsonResponse(retdata, safe=False)


def ajax_data(request):
    context = {}
    device_name = []
    limit = int(request.GET.get('limit'))
    if limit == None:
        limit = 10
    for d in Get_devicename():  # 读取所有设备名
        device_name.append(d[0])
    for dv_name in device_name:
        date_list = []
        t_list = []
        data = Get_data(dv_name, limit)
        for t in data:
            timestamp = date_to_timestamp(str(t[1]))
            t_list.append(t[0])
            date_list.append(timestamp * 1000)
        date_list.reverse()
        t_list.reverse()
        xydata = []
        for i in range(len(date_list)):
            temp = {}
            temp['x'] = date_list[i]
            temp['y'] = t_list[i]
            xydata.append(temp)
        dv_data = {}
        dv_data['data'] = xydata
        if dv_name == 'Tem1' or dv_name == 'Tem2' or dv_name == 'Tem3':
            dv_data['type'] = '温度℃'
        elif dv_name == 'Hum':
            dv_data['type'] = '湿度'
        elif dv_name == 'CO2':
            dv_data['type'] = '二氧化碳浓度'
        else:
            dv_data['type'] = '值'
        context[dv_name] = dv_data
    context['device_list'] = device_name
    return JsonResponse(context, safe=False)


def index(request):
    if request.GET.get('limit') != None and request.GET.get('limit') != '':
        limit = int(request.GET.get('limit'))
    else:
        limit = 10
    context = {}
    context['limit'] = limit
    return render(request, 'index.html', context)
