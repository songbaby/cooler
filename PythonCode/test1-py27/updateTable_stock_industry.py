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


def getDataFromTXH(id,name,table):
    payload = {'typed': '1',
           'preParams': '',
           'ts': '1',
           'f': '3',
           'qs': 'pc_~soniu~stock~stock~history~query',
           'selfsectsn': '',
           'querytype': '',
           'searchfilter': '',
           'tid': 'stockpick',
           'w': name,
           }
    print("will get "+name)
    r = requests.get(url='http://www.iwencai.com/stockpick/search', params=payload ,headers=g_headers)
    print(r.url)
    #print(r.text)

    selector = etree.HTML(r.text)
    content = selector.xpath('//*[@id="tableWrap"]/div[2]/div/div[2]/div/table/tbody/tr[*]/td[3]/div/text()')
    for code in content:
        updateTable_stock(table,id,code)
        print(code)

#update tablle c_stock_industry or update tablle c_stock_industry
def updateTable_stock(table,id,code):

    sql = "select * from "
    sql+=table;
    sql+=" where cate = ";
    sql+=str(id)
    sql+=" and stock = ";
    sql+="\'"
    sql+=code
    sql+="\'"
    print(sql);

    cursel = conn.cursor()
    res = cursel.execute(sql)
    cursel.close()
    conn.commit()
    print("select res : " + str(res))
    if(res == 0):
        sql="insert "
        sql+= table
        sql+="( cate ,stock ) values ("
        sql+= str(id)
        sql+=","
        sql+="\'"
        sql+=code
        sql+="\'"
        sql+=')'
        print(sql);
        curins = conn.cursor()
        res = curins.execute(sql)
        curins.close()
        conn.commit()
        return



def up_industry_hot(conn,tableInfo,tableRelation):
    cur = conn.cursor()
    aa=cur.execute("select * from   "+tableInfo)
    print aa
    info = cur.fetchmany(aa)
    for column in info:
        print("column0 "+str(column[0]))
        print("column1 "+column[1])
        getDataFromTXH(column[0],column[1],tableRelation)
    cur.close()
    conn.commit()



def delete_all(conn,table):
    cur = conn.cursor()
    aa=cur.execute("delete  from   "+table)
    print aa
    cur.close()
    conn.commit()




conn= MySQLdb.connect(
        host='localhost',
        port = 3306,
        user='root',
        passwd='123456',
        db ='cooler',
        charset='utf8'
        )
print(conn);
delete_all(conn,"c_stock_industry")
delete_all(conn,"c_stock_hot")
up_industry_hot(conn,"c_industry","c_stock_industry")
up_industry_hot(conn,"c_hot","c_stock_hot")

conn.close()
exit(0)



