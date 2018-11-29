import pymysql

ip = "127.0.0.1"  # 数据库ip地址，留空为本地
user = "root"  # 数据库连接用户名
pwd = "123456"  # 密码
db_name = "iot"  # 数据库名


#  数据库查询
def mysql_ex(sql_str):
    db = pymysql.connect(ip, user, pwd, db_name, use_unicode=True, charset="utf8")
    cursor = db.cursor()
    cursor.execute(sql_str)
    data = cursor.fetchall()
    db.close()
    return data


#  数据库修改
def mysql_commit(sql):
    # 打开数据库连接
    db = pymysql.connect(ip, user, pwd, db_name, use_unicode=True, charset="utf8")
    # 使用 cursor() 方法创建一个游标对象 cursor
    cursor = db.cursor()
    try:
        # 执行sql语句
        cursor.execute(sql)
        # 提交到数据库执行
        db.commit()
    except:
        # 发生错误时回滚
        db.rollback()
        return 0
    # 关闭数据库连接
    finally:
        db.close()
    return 1


def test_connect():
    try:
        db = pymysql.connect(ip, user, pwd, db_name, use_unicode=True, charset="utf8")
        db.close()
    except:
        return 1
    else:
        return 0


def get_last_time(db, tb):
    sql = 'select UPDATE_TIME from information_schema.TABLES\
 where TABLE_SCHEMA="%s" and information_schema.TABLES.TABLE_NAME = "%s"' % (db, tb)
    try:
        data = mysql_ex(sql)
    except:
        return -1
    else:
        return data


