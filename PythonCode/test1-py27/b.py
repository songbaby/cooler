#-*—coding:utf8-*-
import requests
from lxml import etree
import re
import sys
reload(sys)
sys.setdefaultencoding("utf-8")

def findweb(url):
    hea = {'User-Agent':'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36'}
    html = requests.get(url,headers = hea)
    html.encoding = 'utf-8' #这一行是将编码转为utf-8否则中文会显示乱码。
    selector = etree.HTML(html.text)
    #提取文本
    content = selector.xpath('//*[@id="analysis_ul"]/li/div[5]/h1/a/text()')
    for each in content:
        print each

url ='http://news.fx678.com/news/top/index.shtml'
findweb(url)