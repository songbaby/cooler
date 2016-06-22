/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.5-10.1.9-MariaDB : Database - cooler
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cooler` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cooler`;

/*Table structure for table `c_auth` */

DROP TABLE IF EXISTS `c_auth`;

CREATE TABLE `c_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL COMMENT '名称',
  `auth_pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `auth_c` varchar(32) NOT NULL DEFAULT '' COMMENT '模块',
  `auth_a` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  `auth_path` varchar(32) NOT NULL COMMENT '全路径',
  `auth_level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '基别',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `c_auth` */

insert  into `c_auth`(`auth_id`,`auth_name`,`auth_pid`,`auth_c`,`auth_a`,`auth_path`,`auth_level`) values (1,'商品管理',0,'','','1',0),(2,'商品列表',1,'Goods','showlist','1-2',1),(3,'添加商品',1,'Goods','add','1-3',1),(4,'用户评论',1,'User','pinglun','1-4',1),(5,'订单管理',0,'','','5',0),(6,'订单列表',5,'Order','showlist','5-6',1),(7,'订单查询',5,'Order','view','5-7',1),(8,'文章管理',0,'','','8',0),(9,'文章列表',8,'Article','showlist','8-9',1),(10,'权限管理',0,'','','10',0),(11,'管理员列表',10,'Manager','showlist','10-11',1),(12,'角色管理',10,'Role','showlist','10-12',1),(13,'权限管理',10,'Auth','showlist','10-13',1),(23,'商品类型',1,'Goods','type','1-23',1),(24,'促销管理',0,'','','24',0),(25,'商品修改',2,'Goods','upd','1-2-25',2),(26,'商品删除',2,'Goods','del','1-2-26',2),(27,'增加订单',6,'Order','add','5-6-27',2),(28,'老婆管理',0,'Laopo','gg','28',0),(29,'商品拍卖',2,'Goods','paimai','1-2-29',2);

/*Table structure for table `c_category` */

DROP TABLE IF EXISTS `c_category`;

CREATE TABLE `c_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `c_category` */

insert  into `c_category`(`cat_id`,`cat_name`) values (1,'手机'),(2,'电脑'),(3,'相机'),(4,'耳机'),(5,'电池');

/*Table structure for table `c_goods` */

DROP TABLE IF EXISTS `c_goods`;

CREATE TABLE `c_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `goods_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_weight` int(11) NOT NULL DEFAULT '0' COMMENT '重量',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `goods_number` int(11) NOT NULL DEFAULT '100' COMMENT '数量',
  `goods_category_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类',
  `goods_brand_id` int(11) NOT NULL DEFAULT '0' COMMENT '品牌',
  `goods_introduce` text COLLATE utf8_unicode_ci COMMENT '详细介绍',
  `goods_big_img` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_small_img` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '商品小图',
  `goods_create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `goods_last_time` int(11) NOT NULL DEFAULT '0',
  `abc` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品表';

/*Data for the table `c_goods` */

insert  into `c_goods`(`goods_id`,`goods_name`,`goods_weight`,`goods_price`,`goods_number`,`goods_category_id`,`goods_brand_id`,`goods_introduce`,`goods_big_img`,`goods_small_img`,`goods_create_time`,`goods_last_time`,`abc`) values (10,'索爱C7069',0,'1500.00',7,3,7,'&lt;p&gt;C702可以说是一种在外观上复古的产物，不仅延续T系列早期的直板造型，而且在屏幕和键盘的组合分布上都继承了前辈的精髓。C702的机身尺寸为106×48×15.5毫米，重量为105克。此外索尼爱立信为C702融入了&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;&lt;strong&gt;三防特性，即防尘、防滑和防水溅&lt;/strong&gt;&lt;/font&gt;，这款新的C702搭载了索尼爱立信经典A200平台，界面布局与W908c、K858c一致，典型的特征就是配备左右软键、中央确定键和通话/挂机键。&lt;/p&gt;\r\n&lt;p&gt;索尼爱立信C702配备一块&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;2.2英寸26万色TFT液晶显示屏&lt;/font&gt;&lt;/strong&gt;，分辨率为240×320像素(QVGA)，显示效果属于目前主流水准。C702可以说是索尼爱立信首批&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;内置GPS模块&lt;/font&gt;&lt;/strong&gt;的 手机产品之一，C702的搜星、定位一气呵成，十分精准，误差大约在10米之内。基本上定位后可以将有效卫星数量控制在4—6颗，可以说可以满足我们的需 要了。C702还提供了“影像定位”功能，配合内置的AGPS全球定位辅助系统，只须启动Geo-Tagging智能影像定位功能，便可将拍摄地点记录在 照片内，方便用户随时查询。&lt;/p&gt;\r\n&lt;p&gt; &lt;/p&gt;\r\n&lt;p&gt;作为一款Cyber-shot系列影像手机，索尼爱立信C702在拍照功能方面同样有不俗的表现。并且手机内置的&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;320万像素摄像头&lt;/font&gt;&lt;/strong&gt;也 同样在拍照功能上也不错的表现。不仅支持自动聚焦和双LED闪光功能，而且还拥有2倍数码变焦、防红眼、Photo fix优画及场景模式等功能。索尼爱立信C702除了配备的是最大光圈为F3.2的4.2毫米镜头之外，该机也如同门中的旗舰C902一样增加了对脸部有 先自动聚焦功能的支持。&lt;/p&gt;\r\n&lt;p&gt; &lt;/p&gt;','upload/images/200905/goods_img/10_G_1242973436141.jpg','upload/images/200905/thumb_img/10_thumb_G_1242973436403.jpg',1241965622,0,''),(11,'索爱C702cc',0,'1300.00',1,3,7,'','upload/images/200905/goods_img/12_G_1241965978209.jpg','upload/images/200905/thumb_img/10_thumb_G_1242973436403.jpg',1241966951,0,''),(12,'摩托罗拉A8100',0,'983.00',8,3,2,'&lt;p&gt;全机使用的材质除去电池盖部分采用了金属以外，其它均使用了ABS工程塑料作为主材，这款手机的三围是105×51×14毫米，有着100克的轻量级重量，拿在手中的感觉还是非常不错的。A810手机作为一款&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;PDA手机&lt;/font&gt;&lt;/strong&gt;在设计的时候取消了键盘配置，一切数字键都要依靠手机内提供的虚拟键盘进行操作，在手机的左上侧是一个&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;3.5mm的标准耳机插口&lt;/font&gt;&lt;/strong&gt;，这种设计可以让用户使用自己习惯或者喜欢的耳机去欣赏音乐。&lt;/p&gt;\r\n&lt;p&gt; &lt;/p&gt;\r\n&lt;p&gt;这款摩托罗拉A810手机配置了一块&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;&lt;strong&gt;26万色的2.2英寸TFT全触摸屏幕&lt;/strong&gt;&lt;/font&gt;，其分辨率达到了主流的QVGA水平（240×320像素），摩托罗拉A810采用了内部核心为2.6.10的&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;LINUX操作系统&lt;/font&gt;&lt;/strong&gt;，菜单上依然采用传统的9宫格的显示方式，一般手机的名片式电话本只能支持诸如电话、邮件、传真、公司等一些基本信息，而A810手机的电话本除了这些还支持公司地址，配偶信息、子女姓名、上司名称、助手等等，对于一款手机来说，电话本不可谓不强大。A810的&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;手写识别能力相当的惊人&lt;/font&gt;&lt;/strong&gt;，对连笔、草书和倒插笔的识别率都相当的高，同时还为左右手设置了不同的书写习惯选择，并支持手写速度的调节。&lt;/p&gt;\r\n&lt;p&gt;这款A810手机&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;内置的音乐播放功能&lt;/font&gt;&lt;/strong&gt;可以支持MP3、WAV、AMR、AAC等格式的音乐播放，&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;&lt;strong&gt;支持后台播放&lt;/strong&gt;&lt;/font&gt;。视频方面，这款A810支持MP4、3GP、H.263格式的播放，视频播放器同样简约，操作方便，这款摩托罗拉A810还内置了6款游戏，每一款都有很高的耐玩性，而且都是支持触摸屏操作的，同时这款手机还内置了&lt;strong&gt;&lt;font size=&quot;3&quot; color=&quot;#ff0000&quot;&gt;FM收音机&lt;/font&gt;&lt;/strong&gt;，支持自动搜索，并提供了20个频道供用户存储，不过收音机并不支持后台播放。&lt;/p&gt;\r\n&lt;p&gt; &lt;/p&gt;','upload/images/200905/goods_img/12_G_1241965978209.jpg','upload/images/200905/thumb_img/12_thumb_G_1241965978410.jpg',1245297652,0,''),(13,'诺基亚5320 XpressMusic',0,'1311.00',8,3,1,'<p>诺基亚5320XpressMusic音乐手机采用XpressMusic系列常见的黑红、黑蓝配色方案，而材质方便则选用的是经过<strong><font size=\"3\" color=\"#ff0000\">抛光处理</font></strong>的工程塑料；三围/体重为，为108&times;46&times;15mm/<strong><font size=\"3\" color=\"#ff0000\">90g</font></strong>，手感舒适。</p>\r\n<p>&nbsp;</p>\r\n<p>诺基亚5320采用的是一块可视面积为2.0英寸的<font size=\"3\" color=\"#ff0000\"><strong>1600万色</strong></font>屏幕，分辨率是常见的240&times;320像素（QVGA）。虽然屏幕不是特别大，但效果非常精细，色彩还原不错。</p>\r\n<p>&nbsp;</p>\r\n<p>手机背面，诺基亚为5320XM配备一颗<strong><font size=\"3\" color=\"#ff0000\">200W像素</font></strong>的摄像头，并且带有<strong><font size=\"3\" color=\"#ff0000\">两个LED的补光灯</font></strong>，可以实现拍照、摄像功能，并能通过彩信、邮件方式发送给朋友。</p>\r\n<p>&nbsp;</p>','upload/images/200905/goods_img/13_G_1241968002233.jpg','upload/images/200905/thumb_img/13_thumb_G_1241968002527.jpg',1241967762,0,''),(14,'诺基亚5800XM',0,'2625.00',1,4,1,'','upload/images/200905/goods_img/14_G_1241968492932.jpg','upload/images/200905/thumb_img/14_thumb_G_1241968492116.jpg',1241968492,0,''),(15,'摩托罗拉A810',0,'788.00',3,3,2,'','upload/images/200905/goods_img/15_G_1242973362318.jpg','upload/images/200905/thumb_img/15_thumb_G_1242973362970.jpg',1241968703,0,''),(16,'恒基伟业G101',0,'823.33',0,2,11,'','upload/images/200905/goods_img/16_G_1241968949002.jpg','upload/images/200905/thumb_img/16_thumb_G_1241968949103.jpg',1241968949,0,''),(17,'夏新N7',3,'2300.00',1123,3,5,'','upload/images/200905/goods_img/17_G_1241969394677.jpg','upload/images/200905/thumb_img/17_thumb_G_1241969394587.jpg',1241969394,0,''),(18,'夏新T5',0,'2878.00',1,4,5,'<p>&nbsp;  TD-SCDMA/GSM两种模式任意切换，中国3G手机先驱，支持大陆特有3G网络，轻松实现可视电话、视频留言、视频会议功能，2.6英寸Q屏，手写、键盘双输入，内置移动证券，支持手机邮箱、手机地图、无驱U盘</p>','upload/images/200905/goods_img/12_G_1241965978209.jpg','upload/images/200905/thumb_img/10_thumb_G_1242973436403.jpg',1241969533,0,''),(19,'三星SGH-F258',0,'858.00',12,3,6,'<p>从整体来看，三星SGH-F258比较<font size=\"3\" color=\"#ff0000\"><strong>时尚</strong></font>可爱，三围尺寸为94&times;46&times;17.5mm，重量为96克，曲线柔和具有玲珑美感。</p>\r\n<p>&nbsp;</p>\r\n<p>三星F258的前面板整体应用<strong><font size=\"3\" color=\"#ff0000\">镜面效果</font></strong>，2.0英寸显示屏幕略显窄小，导航键与功能键在滑盖滑开之前是前面板的全部控制键，没有挂断和接听键，不过，五向键有<font size=\"3\"><strong><font color=\"#ff0000\">音乐操</font><font color=\"#ff0000\">作</font></strong></font>功能，明确显示了F258音乐手机的定位。</p>\r\n<p>&nbsp;</p>\r\n<p>F258的数字键键区采用了极具金属质感的平板式设计，每颗按键的面积足够大，按键与按键之间的间隔明显，操作起来手感舒适。</p>','upload/images/200905/goods_img/19_G_1241970175091.jpg','upload/images/200905/thumb_img/19_thumb_G_1241970175208.jpg',1241970139,0,''),(20,'三星BC01',0,'280.00',12,3,6,'','upload/images/200905/goods_img/20_G_1242106490663.jpg','upload/images/200905/thumb_img/20_thumb_G_1242106490058.jpg',1241970417,0,''),(21,'金立 A30',0,'2000.00',40,3,10,'<p> </p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">标准配置: 标准锂电池两块,充电器两个,立体声耳机一个,数据线,说明书送256TF</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">通讯功能  输入法 短信功能 话机通讯录 通话记录</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">输入法: 中文输入法</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">短信功能: 支持短信300条和彩信100条</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">话机通讯录: 1000组名片式电话存储 来电防火墙功能  来电大头贴及来电铃声识别</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">通话记录：支持电话录音,恢复/静音,双音多频,免提</font></span></p>\r\n<p> </p>\r\n<p><font size=\"3\">高级功能</font></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">多媒体娱乐: 200万像素，最大支持10240*960，11级数码变焦,多种效果设置,连拍可全屏查看拍摄或下载的图片.支持有声MP4短片拍摄，录像时间根据内存 大小而定，拍摄录像,TV电视可跟朋友家人一起分享。支持网络摄像头功能 支持MPEG4、3GP(H.263)等视频格式 支持MP3等音频格式播放， 支持歌词播放</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">内置游戏:智能拼图</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">扩展存储功能:支持TF扩展,支持U盘功能,本机内置1M,随机赠送256TF卡</font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">高级功能:直板/智能PDA手写/键盘输入 超长待机 WAP上网  录音 蓝牙 FM收音机 电子书 Java扩展 TV电视输出 声控语音拨号 免费电视 来电防火墙   </font></span></p>\r\n<p align=\"left\"><span style=\"font-size: medium;\"><font size=\"3\">附加功能: 日历 计算器 闹钟 记事本 日程表 秒表 单位换算</font></span></p>\r\n<p><span style=\"font-size: medium;\"><font size=\"3\">提醒 以上性能均为本公司员工试机后所写,产品资料仅供参考,请以收到实物为准</font></span></p>','upload/images/200905/goods_img/21_G_1242109298873.jpg','upload/images/200905/thumb_img/21_thumb_G_1242109298150.jpg',1241970634,0,''),(22,'多普达Touch HD',0,'5999.00',1,3,3,'<p><img src=\"http://xgone.xgou.com/xgoumanage/upload/20090325/2009032502045081100887.jpg\" alt=\"\" /></p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"http://www.ouku.com/upimg/ouku/Image/002(1).jpg\" alt=\"\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>','upload/images/200905/goods_img/22_G_1241971076358.jpg','upload/images/200905/thumb_img/22_thumb_G_1241971076803.jpg',1241971076,0,''),(23,'诺基亚N97',0,'4000.00',8,5,1,'<p>诺基亚N96采用了<strong><font size=\"3\" color=\"#ff0000\">双向滑盖</font></strong>设计，机身整体呈灰黑色，沉稳、大气，机身材质采用了高强度的塑料材质，手机背面采用了抛光面板的设计风格。N96三维体积103*55*20mm，重量为125g。屏幕方面，诺基亚N96配备一块<strong><font size=\"3\" color=\"#ff0000\">2.8英寸</font></strong>的屏幕，支持<strong><font size=\"3\" color=\"#ff0000\">1670万色</font></strong>显示，分辨率达到QVGA（320×240）水准。</p>\r\n<p><img alt=\"\" src=\"file:///C:/DOCUME~1/user/LOCALS~1/Temp/moz-screenshot.jpg\" /></p>\r\n<p> </p>\r\n<p> <img src=\"http://img2.zol.com.cn/product/21/896/ceN6LBMCid3X6.jpg\" alt=\"\" /></p>\r\n<p>诺基亚N96设置有专门的<strong><font size=\"3\" color=\"#ff0000\">音乐播放键</font></strong>和标准的3.5毫米音频插口，支持多格式音乐播放。内置了<strong><font size=\"3\" color=\"#ff0000\">多媒体播放器</font></strong>，支持FM调频收音机等娱乐功能。N96手机支持<strong><font size=\"3\" color=\"#ff0000\">N-Gage游戏平台</font></strong>，内置包括<font size=\"3\" color=\"#ff0000\"><strong>《PinBall》完整版</strong></font>在内的四款N-Gage游戏，除了手机本身内置的游戏，还可以从N-Gage的网站下载或者购买最新的游戏，而且可以在论坛里和其他玩家一起讨论。</p>\r\n<p><img src=\"http://img2.zol.com.cn/product/21/898/cekkw57qJjSI.jpg\" alt=\"\" /></p>\r\n<p> </p>','upload/images/200905/goods_img/23_G_1241971556855.jpg','upload/images/200905/thumb_img/23_thumb_G_1241971556399.jpg',1241971488,1376313982,''),(24,'P807',0,'2000.00',100,3,9,'<div>\r\n<div>\r\n<div><font size=\"4\">规格参数</font></div>\r\n<p><font size=\"4\"><span>上市时间：</span><span>2008年06月</span></font></p>\r\n<p><font size=\"4\"><span>网络频率：</span><span>GSM/GPRS；900/1800MHz</span></font></p>\r\n<p><font size=\"4\"><span>重　量　：</span><span>未知</span></font></p>\r\n<p><font size=\"4\"><span>尺寸/体积：</span><span>未知</span></font></p>\r\n<p><font size=\"4\"><span>可选颜色：</span><span>银色</span></font></p>\r\n<p><font size=\"4\"><span>屏幕参数：</span><span>26万色TFT彩色屏幕；</span></font></p>\r\n<p><font size=\"4\"><span>WAP上网：</span><span>支持飞笺</span></font></p>\r\n<p><font size=\"4\"><span>基本配置:<em><strong><font size=\"5\" color=\"#ff00ff\">二电(1760毫安) 一充 数据线 耳机 手写笔 512M内存卡</font></strong></em></span></font></p>\r\n<p> </p>\r\n</div>\r\n</div>\r\n<div><font size=\"4\">基本功能</font></div>\r\n<p><font size=\"4\"><span>『时钟』</span><span>『内置振动』</span><span>『录音』</span><span>『可选铃声』</span></font></p>\r\n<p><font size=\"4\"><span>『和弦铃声』</span><span>『MP3铃声』</span><span>『来电铃声识别』</span><span>『来电图片识别』</span></font></p>\r\n<p><font size=\"4\"><span>『情景模式』</span><span>『待机图片』</span><span>『图形菜单』</span><span>『触摸屏』</span></font></p>\r\n<p><span><font size=\"4\">『手写输入』</font></span></p>\r\n<div><font size=\"4\">通信功能</font></div>\r\n<p><font size=\"4\"><span>『双卡双待』</span><span>『内置天线』</span><span>『输入法』</span><span>『中文短信』</span></font></p>\r\n<p><font size=\"4\"><span>『短信群发』</span><span>『多媒体短信』</span><span>『话机通讯录』</span><span>『通话记录』</span></font></p>\r\n<p><font size=\"4\"><span>『免提通话』</span><span>『飞行模式』</span></font></p>\r\n<div><font size=\"4\">多媒体娱乐 :支持3GP、MP4文件播放</font></div>\r\n<p><font size=\"4\"><span>『视频播放』</span><span>『MP3播放器』</span></font></p>\r\n<p><font size=\"4\"><span>多媒体卡扩展：</span><span>支持microSD卡扩展 </span></font></p>\r\n<p><font size=\"4\"><span>摄像头：</span><span>内置</span></font></p>\r\n<p><font size=\"4\"><span>摄像头像素：</span><span>30万像素</span></font></p>\r\n<p><font size=\"4\"><span>传感器类型：</span><span>CMOS</span></font></p>\r\n<p><font size=\"4\"><span>变焦模式：</span><span>数码变焦</span></font></p>\r\n<p><font size=\"4\"><span>照片分辨率：</span><span>多种照片分辨率选择</span></font></p>\r\n<p><font size=\"4\"><span>拍摄模式：</span><span>多种拍摄模式选择</span></font></p>\r\n<p><font size=\"4\"><span>照片质量：</span><span>多种照片质量选择</span></font></p>\r\n<p><font size=\"4\"><span>视频拍摄：</span><span>有声视频拍摄</span></font></p>\r\n<div><font size=\"4\">数据传输</font></div>\r\n<p><font size=\"4\"><span>『WAP浏览器』</span><span>『数据线接口』</span></font></p>\r\n<div><font size=\"4\">个人助理</font></div>\r\n<p><font size=\"4\"><span>『闹钟』</span><span>『日历』</span><span>『计算器』</span></font></p>','upload/images/200905/goods_img/24_G_1241971981284.jpg','upload/images/200905/thumb_img/24_thumb_G_1241971981429.jpg',1241971981,0,''),(25,'小灵通/固话50元充值卡',0,'48.00',2,13,0,'','upload/images/200905/goods_img/25_G_1241972709544.jpg','upload/images/200905/thumb_img/25_thumb_G_1241972709885.jpg',1241972709,0,''),(26,'小灵通/固话20元充值卡',0,'19.00',2,13,0,'','upload/images/200905/goods_img/26_G_1241972789293.jpg','upload/images/200905/thumb_img/26_thumb_G_1241972789393.jpg',1241972789,0,''),(27,'联通100元充值卡',0,'95.00',2,0,0,'','upload/images/200905/goods_img/27_G_1241972894061.jpg','upload/images/200905/thumb_img/27_thumb_G_1241972894068.jpg',1241972894,1376309295,''),(28,'联通50元充值卡',0,'45.00',0,15,0,'','upload/images/200905/goods_img/28_G_1241972976313.jpg','upload/images/200905/thumb_img/28_thumb_G_1241972976986.jpg',1241972976,0,''),(29,'移动100元充值卡',0,'90.00',0,14,0,'','upload/images/200905/goods_img/29_G_1241973022206.jpg','upload/images/200905/thumb_img/29_thumb_G_1241973022239.jpg',1241973022,0,''),(30,'移动20元充值卡',0,'18.00',9,14,0,'','upload/images/200905/goods_img/30_G_1241973114234.jpg','upload/images/200905/thumb_img/30_thumb_G_1241973114800.jpg',1241973114,0,''),(31,'摩托罗拉E8 ',0,'1337.00',1,3,2,'','upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',1242110412,0,''),(32,'htc_one',102,'3999.00',25,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(33,'htc_s',122,'3456.00',12,23,343,'sfsfsfsd','upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(34,'htc_ss',122,'3456.00',12,23,343,'sfsfsfsd','upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',1370660527,0,''),(35,'apple5s',0,'5999.00',34,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(36,'LV包',0,'12000.00',13,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(37,'三星耳机',20,'109.00',59,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(39,'HTC_one',0,'3555.00',100,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(41,'三星耳机',20,'109.00',59,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(44,'南孚34电池',0,'50.00',59,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(45,'波导手机333',99,'1200.00',40,0,0,'','upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(47,'haier999',12,'3210.00',101,4,23,'水电费撒范德萨','upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(49,'华硕电脑',1500,'5640.00',23,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(50,'aaaaaa',0,'2000.00',100,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(51,'qqq',0,'1200.00',100,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(53,'fff',0,'111.00',100,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(54,'xxx',0,'123.00',100,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(55,'erer',0,'122.00',100,0,0,NULL,'upload/images/200905/goods_img/31_G_1242110412332.jpg','upload/images/200905/thumb_img/31_thumb_G_1242110412996.jpg',0,0,''),(64,'meinv',50,'10000.00',1,0,0,'一晚上1w','upload/2016-06-21/5769410da96f0.jpg','upload/2016-06-21/small_5769410da96f0.jpg',0,0,'');

/*Table structure for table `c_info_cooler` */

DROP TABLE IF EXISTS `c_info_cooler`;

CREATE TABLE `c_info_cooler` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT 'boss',
  `lianxiren_id` int(4) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `note` text,
  `price` float DEFAULT NULL,
  `province` int(4) DEFAULT '1',
  `city` int(4) DEFAULT '1',
  `county` int(4) DEFAULT '1',
  `town` int(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `c_info_cooler` */

insert  into `c_info_cooler`(`id`,`name`,`lianxiren_id`,`lat`,`lng`,`note`,`price`,`province`,`city`,`county`,`town`) values (1,'东运冷库',1,35.079983,116.235237,NULL,NULL,1,1,1,5),(2,'恒泰冷库',2,35.079392,116.184357,NULL,NULL,1,1,1,2),(3,'金门冷库',3,35.179392,116.184357,NULL,NULL,1,1,1,5),(4,'宏泰集团万吨冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(5,'东泰冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(6,'金乡县文峰冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(7,'金利源冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(8,'兄弟冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(9,'金乡县金乡街道华诚蒜业冷库',1,1,NULL,NULL,NULL,1,1,1,1),(10,'汇满鑫冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(11,'国庆冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(12,'boss',1,NULL,NULL,NULL,NULL,1,1,1,1);

/*Table structure for table `c_info_lianxiren` */

DROP TABLE IF EXISTS `c_info_lianxiren`;

CREATE TABLE `c_info_lianxiren` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT 'baby',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `c_info_lianxiren` */

insert  into `c_info_lianxiren`(`id`,`name`) values (1,'刘东'),(2,'刘恒');

/*Table structure for table `c_loc` */

DROP TABLE IF EXISTS `c_loc`;

CREATE TABLE `c_loc` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(4) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `sort` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc` */

insert  into `c_loc`(`id`,`pid`,`name`,`sort`) values (1,1,'金乡街道',0),(2,1,'高河街道',0),(3,1,'王丕街道',0),(4,1,'鱼山街道',0),(5,17,'兴隆镇',0),(6,17,'司马镇',0),(7,17,'霄云镇',0),(8,17,'鸡黍镇',0),(9,17,'马庙镇',0),(10,17,'胡集镇',0),(11,17,'卜集镇',0),(12,17,'羊山镇',0),(13,17,'化雨镇',0),(14,17,'金乡经济开发区',0),(15,17,'济宁食品工业开发区',0),(16,17,'济宁化学工业开发区',0),(17,1,'济宁市',0),(18,2,'潍坊市',0),(19,17,'金乡县',0),(20,18,'寿光市',0),(21,23,'山东省',0),(22,23,'江苏省',0),(23,0,'中国',0),(24,18,'圣城街道',0),(25,18,'文家街道',0),(26,18,'洛城街道',0),(27,18,'古城街道',0),(28,18,'孙家集街道',0),(29,18,'化龙镇',0),(30,18,'营里镇',0),(31,18,'台头镇',0),(32,18,'田柳镇',0),(33,18,'上口镇',0),(34,18,'侯镇',0),(35,18,'纪台镇',0),(36,18,'稻田镇',0),(37,18,'羊口镇',0);

/*Table structure for table `c_loc_city` */

DROP TABLE IF EXISTS `c_loc_city`;

CREATE TABLE `c_loc_city` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `pid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_city` */

insert  into `c_loc_city`(`id`,`name`,`pid`) values (1,'济宁市',1),(2,'潍坊市',1),(3,NULL,NULL);

/*Table structure for table `c_loc_county` */

DROP TABLE IF EXISTS `c_loc_county`;

CREATE TABLE `c_loc_county` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `pid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_county` */

insert  into `c_loc_county`(`id`,`name`,`pid`) values (1,'金乡县',1),(2,'寿光市',2);

/*Table structure for table `c_loc_province` */

DROP TABLE IF EXISTS `c_loc_province`;

CREATE TABLE `c_loc_province` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_province` */

insert  into `c_loc_province`(`id`,`name`) values (1,'山东省');

/*Table structure for table `c_loc_town` */

DROP TABLE IF EXISTS `c_loc_town`;

CREATE TABLE `c_loc_town` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `pid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_town` */

insert  into `c_loc_town`(`id`,`name`,`pid`) values (1,'金乡街道',1),(2,'高河街道',1),(3,'王丕街道',1),(4,'鱼山街道',1),(5,'兴隆镇',1),(6,'司马镇',1),(7,'霄云镇',1),(8,'鸡黍镇',1),(9,'马庙镇',1),(10,'胡集镇',1),(11,'卜集镇',1),(12,'羊山镇',1),(13,'化雨镇',1),(14,'金乡经济开发区',1),(15,'济宁食品工业开发区',1),(16,'济宁化学工业开发区',1);

/*Table structure for table `c_manager` */

DROP TABLE IF EXISTS `c_manager`;

CREATE TABLE `c_manager` (
  `mg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mg_name` varchar(32) NOT NULL,
  `mg_pwd` varchar(32) NOT NULL,
  `mg_time` int(10) unsigned NOT NULL COMMENT '时间',
  `mg_role_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`mg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `c_manager` */

insert  into `c_manager`(`mg_id`,`mg_name`,`mg_pwd`,`mg_time`,`mg_role_id`) values (1,'admin','123456',0,0),(2,'tom','123456',0,1),(3,'linken','123456',0,1),(4,'mary','123456',1387785044,0),(5,'yuehan','123456',1387785056,1);

/*Table structure for table `c_role` */

DROP TABLE IF EXISTS `c_role`;

CREATE TABLE `c_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(128) NOT NULL DEFAULT '' COMMENT '权限ids,1,2,5',
  `role_auth_ac` text COMMENT '模块-操作',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `c_role` */

insert  into `c_role`(`role_id`,`role_name`,`role_auth_ids`,`role_auth_ac`) values (1,'经理','1,2,25,26,3,4,23,5,6,7,8,9','Goods-showlist,Goods-add,User-pinglun,Order-showlist,Order-view,Article-showlist,Goods-type,Goods-upd,Goods-del'),(2,'员工','1,2,25,3,4,23,5,8,9','Goods-showlist,Goods-add,User-pinglun,Article-showlist,Goods-type,Goods-upd');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
