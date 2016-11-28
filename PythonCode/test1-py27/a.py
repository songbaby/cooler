#-*—coding:utf8-*-
import requests
from lxml import etree
import MySQLdb



g_headers = {
            'Host':' www.iwencai.com',
            'Connection': 'keep-alive',
            'Accept': 'application/json, text/javascript, */*; q=0.01',
            'X-Requested-With':'XMLHttpRequest',
            'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36',
            'Accept-Encoding': 'gzip, deflate, sdch',
            'Accept-Language': 'zh-CN,zh;q=0.8',
            'Cookie': 'wP_h=a586ecde8fd35198f8c97c5b04ad9aa293a701ed; PHPSESSID=1lf55l7tl9rhd2hocl8b6jlc40; guideState=1; cid=knbrpshnt329ps6rthank9slm11475369602; ComputerID=knbrpshnt329ps6rthank9slm1161002+085322'
           }


def getStockCount(district):
    payload = {'typed': '1',
           'preParams': '',
           'ts': '1',
           'f': '3',
           'qs': 'pc_~soniu~stock~stock~history~query',
           'selfsectsn': '',
           'querytype': '',
           'searchfilter': '',
           'tid': 'stockpick',
           'w': district,
           }
    print("will get "+district)
    r = requests.get(url='http://www.iwencai.com/stockpick/search', params=payload ,headers=g_headers)
    print(r.url)
    #print(r.text)

    selector = etree.HTML(r.text)
    content = selector.xpath('//*[@id="boxTitle"]/span[2]/text()')
    for each in content:
        return each

def updateStockCount(conn,cnt,id):
    sql="update c_nation set stockcount = "
    sql+=cnt
    sql+=" where id = "
    sql+=id
    print(sql)
    cur = conn.cursor()
    res = cur.execute(sql)
    cur.close()
    conn.commit()
    print("update res : " + str(res))



conn= MySQLdb.connect(
        host='localhost',
        port = 3306,
        user='root',
        passwd='123456',
        db ='cooler',
        charset='utf8'
        )
print(conn);
cur = conn.cursor()
aa=cur.execute("select * from c_nation  ")
print aa

info = cur.fetchmany(aa)
for column in info:
    if column[4] == "" or ( column[4] != "" and column[4] == column[3] ):
      #  district = u"办公地址 "+column[2]+column[3]
        district = u"举牌 "
        cnt = getStockCount(district)
        id = str(column[0])
        updateStockCount(conn,cnt,id)
        print cnt
    #break
cur.close()
conn.commit()
conn.close()


exit(0)




payload = {'typed': '1',
           'preParams': '',
           'ts': '1',
           'f': '3',
           'qs': 'pc_~soniu~stock~stock~history~query',
           'selfsectsn': '',
           'querytype': '',
           'searchfilter': '',
           'tid': 'stockpick',
           'w': '办公地址 山东淄博',
           }
headers = {
            'Host':' www.iwencai.com',
            'Connection': 'keep-alive',
            'Accept': 'application/json, text/javascript, */*; q=0.01',
            'X-Requested-With':'XMLHttpRequest',
            'User-Agent': 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36',
            'Accept-Encoding': 'gzip, deflate, sdch',
            'Accept-Language': 'zh-CN,zh;q=0.8',
            'Cookie': 'wP_h=a586ecde8fd35198f8c97c5b04ad9aa293a701ed; PHPSESSID=1lf55l7tl9rhd2hocl8b6jlc40; guideState=1; cid=knbrpshnt329ps6rthank9slm11475369602; ComputerID=knbrpshnt329ps6rthank9slm1161002+085322'
           }
r = requests.get(url='http://www.iwencai.com/stockpick/search', params=payload ,headers=headers)
print(r.url)
print(r.text)