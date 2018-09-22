# -*- coding: utf-8 -*-

import json
import time
import pymysql
from django.http import JsonResponse
from django.shortcuts import render
from .import WebSettings

host = WebSettings.host
name = WebSettings.name
pwd = WebSettings.pwd
db_name = WebSettings.db_name
table = WebSettings.table
f_delay = WebSettings.f_delay
d_limit = WebSettings.d_limit


def Mysql_Ex(sql_str):
    db = pymysql.connect(host, name, pwd, db_name)
    cursor = db.cursor()
    cursor.execute(sql_str)
    data = cursor.fetchall()
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


def new_data(request):
    return_data = {}

    device_list = request.POST['device_list']
    if not device_list or device_list == '[]':
        return JsonResponse(None, safe=False)
    device_list = json.loads(device_list)

    stamp_list = request.POST['stamp_list']
    if not stamp_list or stamp_list == '[]':
        return JsonResponse(None, safe=False)
    stamp_list = json.loads(stamp_list)

    sql_str = ''
    for i in range(len(device_list)):
        date = timestamp_to_date(stamp_list[i] / 1000)
        sql_str += "("
        sql_str += "SELECT thing,data,createdTime from {0} WHERE createdTime>'{1}' AND thing='{2}' ORDER BY createdTime DESC LIMIT 10".format(
            table, date, device_list[i])
        if i == len(device_list) - 1:
            sql_str += ")"
        else:
            sql_str += ")UNION"

    data = Mysql_Ex(sql_str)
    if not data:
        return JsonResponse(None, safe=False)

    for device in device_list:
        temp_list = []
        for e in data:
            if e[0] == device:
                temp = {}
                temp['x'] = date_to_timestamp(e[2]) * 1000
                temp['y'] = e[1]
                temp_list.append(temp)
        if temp_list:
            temp_list.reverse()
            return_data[device] = temp_list

    return JsonResponse(return_data, safe=False)


def ajax_data(request):
    context = {}
    device_name = []
    limit = int(request.GET.get('limit'))
    if not limit:
        limit = d_limit  # 默认数据限制

    for d in Mysql_Ex("SELECT thing from {0} GROUP BY thing".format(table)):  # 读取所有设备名
        device_name.append(d[0])

    # 拼接sql语句
    sql_str = ''
    for i in range(len(device_name)):
        sql_str += "("
        sql_str += "SELECT thing,data,createdTime from {0} WHERE thing='{1}'ORDER BY createdTime DESC limit {2}".format(
            table, device_name[i], limit)
        if i == len(device_name) - 1:
            sql_str += ")"
        else:
            sql_str += ")UNION"
    # 执行查询，读取最新数据
    full_data = Mysql_Ex(sql_str)
    for dv_name in device_name:
        date_list = []
        t_list = []
        #  使用列表推导式遍历出数据中包含该设备的数据
        data = [item for item in full_data if item[0] == dv_name]
        for t in data:
            timestamp = date_to_timestamp(str(t[2]))
            t_list.append(t[1])
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
        if 'Tem' in dv_name:
            dv_data['type'] = '温度℃'
        elif 'Hum' in dv_name:
            dv_data['type'] = '湿度'
        elif 'CO2' in dv_name:
            dv_data['type'] = '二氧化碳浓度'
        elif 'O2' in dv_name:
            dv_data['type'] = '氧气浓度'
        else:
            dv_data['type'] = '值'
        context[dv_name] = dv_data
    context['device_list'] = device_name
    return JsonResponse(context, safe=False)


def index(request):
    context = {}
    context['limit'] = d_limit
    context['flash_delay'] = f_delay
    return render(request, 'index.html', context)
