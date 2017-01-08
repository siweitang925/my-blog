# Host: 127.0.01  (Version: 5.6.17)
# Date: 2016-12-15 18:31:02
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "blog_about"
#

CREATE TABLE `blog_about` (
  `about_id` int(11) NOT NULL DEFAULT '1',
  `about_introduction` text NOT NULL COMMENT '//资料介绍',
  `about_url` varchar(40) DEFAULT '' COMMENT '//有关url',
  `about_qr` varchar(40) DEFAULT '' COMMENT '网站网址二维码',
  `about_title` varchar(100) DEFAULT '' COMMENT '标题',
  `about_keywords` varchar(255) DEFAULT '' COMMENT '/关键词',
  `about_description` varchar(255) DEFAULT '' COMMENT '//描述',
  `about_contact` varchar(255) DEFAULT '' COMMENT '//联系方式',
  `about_location` varchar(50) DEFAULT '' COMMENT '//现居地',
  PRIMARY KEY (`about_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='关于我';

#
# Data for table "blog_about"
#

INSERT INTO `blog_about` VALUES (1,'<p><span style=\"font-size: 24px; color: rgb(89, 89, 89);\">Just about me </span><span style=\"font-size: 36px;\">&nbsp;</span>&nbsp;</p><p>&nbsp;&nbsp;</p><p>&nbsp;&nbsp;网站刚做完，开心！ &nbsp; &nbsp;</p><p>&nbsp;&nbsp;踏上程序猿这条路，虽然有点偶然，但是仔细想想，如果不是对计算机技术有兴趣，之前没有接触过编程相关的东西，我估计也不敢在大三下临时选择学习网页编程，而放弃应聘能源化学工程相关专业的工作。不给自己留后路是希望自己能够破后而立，能继续坚持下去。</p><p>&nbsp;&nbsp;也许现在学到的还是一点点皮毛，但是我们谁都不知道三年后的我们会是什么样子，或好或坏，希望总是有的。</p><p><span style=\"font-size: 24px; color: rgb(89, 89, 89);\">About my website</span></p><p>语言：PHP&nbsp;</p><p>后台：laravel框架</p><p>前端：杨青博客模板</p>','','','慢慢成长，总有一天你的那颗种子也会发芽','四味糖的个人信息，唐士位的介绍','小菜鸟的成长史，个人信息介绍。','QQ：1075494419\r\n\r\n微信：siweitang925','北京/房山');

#
# Structure for table "blog_article"
#

CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) DEFAULT '' COMMENT '文章标题',
  `art_tag` varchar(40) DEFAULT '' COMMENT '文章标签',
  `art_description` varchar(255) DEFAULT '' COMMENT '文章描述',
  `art_thumb` varchar(100) DEFAULT '' COMMENT '缩略图',
  `art_content` text COMMENT '文章内容',
  `art_time` varchar(255) DEFAULT '' COMMENT '发布时间',
  `art_editor` varchar(20) DEFAULT '' COMMENT '编辑人',
  `art_view` int(11) DEFAULT '0' COMMENT '浏览次数',
  `cate_id` int(11) DEFAULT '0' COMMENT '分类id',
  `art_recommend` char(1) DEFAULT '0' COMMENT '站长推荐',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='文章管理';

#
# Data for table "blog_article"
#

INSERT INTO `blog_article` VALUES (13,'curl模拟get,post请求时，浏览器响应头为200，但是请求不成功','curl,请求失败，get,post','用curl模拟get，post请求时，返回200，但是请求没有成功，预览代码可以看到Apache服务器界面。\r\n','/uploads/20161214123939703.jpg','<p class=\"MsoListParagraph\" style=\"margin-left:48px\"><span style=\"font-variant-numeric: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: &#39;Times New Roman&#39;\">&nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"font-family:宋体\">在本地测试使用</span>curl<span style=\"font-family:宋体\">时，不能用</span>localhost<span style=\"font-family:宋体\">或者</span>127.0.0.1<span style=\"font-family:宋体\">开头来打开本机文件测试，不然服务器会因为端口被占用而返回</span>false<span style=\"font-family:宋体\">！</span> <span style=\"font-family:宋体\">预览代码可以看到</span>Apache<span style=\"font-family:宋体\">服务器界面。</span></p><p style=\"margin-left:48px\">&nbsp;</p><p style=\"margin-left:48px\">&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family:宋体\">解决办法：</span>Apache<span style=\"font-family:宋体\">配置，通过域名的形式访问文件！</span></p><p style=\"margin-left:48px\">&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-family:宋体\">如：</span><a href=\"http://www.xxx.com/\">www.xxx.com</a><span style=\"font-family:宋体\">形式</span></p><p><br/></p>','1481683710','admin',2,22,'1'),(14,'curl采集百度网页信息次数多了会被禁','user-agent被禁,curl模拟登录','在对百度进行curl信息采集时，如果多次循环采集，user-agent会被禁掉，需要通过使用多个user-agent交替使用来减少被禁的可能。','/uploads/20161214123929782.jpg','<p style=\"margin-left:48px\"><span style=\"font-family: 宋体;\"><br/></span></p><p style=\"margin-left:48px\"><span style=\"font-family: 宋体;\">在对百度进行</span>curl<span style=\"font-family: 宋体;\">信息采集时，如果多次循环采集，</span>user-agent<span style=\"font-family: 宋体;\">会被禁掉，需要通过使用多个</span>user-agent<span style=\"font-family: 宋体;\">交替使用来减少被禁的可能。</span></p><p style=\"margin-left:48px\"><span style=\"font-family: 宋体;\"><br/></span></p><p><strong><span style=\"font-family:宋体\">以下下是常用浏览器</span>user-agent<span style=\"font-family:宋体\">列表</span></strong><span style=\"font-family:宋体\">：</span></p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">$agent=array(</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent:Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent:Mozilla/5.0 (Windows; U; Windows NT 6.1; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent:Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0;&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent:Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:2.0.1) Gecko/20100101 Firefox/4.0.1&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent:Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent:Opera/9.80 (Macintosh; Intel Mac OS X 10.6.8; U; en) Presto/2.8.131 Version/11.11&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent:Opera/9.80 (Windows NT 6.1; U; en) Presto/2.8.131 Version/11.11&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_0) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Maxthon 2.0)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; TencentTraveler 4.0)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; The World)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; SE 2.X MetaSr 1.0; SE 2.X MetaSr 1.0; .NET CLR 2.0.50727; SE 2.X MetaSr 1.0)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; 360SE)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Avant Browser)&quot;,</p><p class=\"MsoListParagraph\" style=\"margin-left:48px\">&quot;User-Agent: Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)&quot;</p><p class=\"MsoListParagraph\" style=\"margin-left:48px;text-indent:0\">);</p><p class=\"MsoListParagraph\" style=\"margin-left:48px;text-indent:0\">&nbsp;</p><p class=\"MsoListParagraph\" style=\"margin-left:48px;text-indent:0\">&nbsp;</p><p class=\"MsoListParagraph\" style=\"margin-left:48px;text-indent:0\"><span style=\"color: rgb(0, 112, 192);\"><strong><span style=\"font-family: 宋体;\">也可通过代理</span>IP<span style=\"font-family: 宋体;\">池来防禁</span>IP<span style=\"font-family: 宋体;\">。</span></strong></span></p><p><br/></p>','1481683888','admin',81,22,'0');

#
# Structure for table "blog_category"
#

CREATE TABLE `blog_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cate_name` varchar(50) DEFAULT '0' COMMENT '分类名称',
  `cate_title` varchar(255) DEFAULT '0' COMMENT '标题',
  `cate_keywords` varchar(255) DEFAULT '' COMMENT '关键词',
  `cate_description` varchar(255) DEFAULT '' COMMENT '描述',
  `cate_view` int(11) unsigned DEFAULT '0' COMMENT '浏览量',
  `cate_order` varchar(255) DEFAULT '0' COMMENT '排序',
  `cate_pid` int(11) unsigned DEFAULT '0' COMMENT '父级ID',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章分类';

#
# Data for table "blog_category"
#

INSERT INTO `blog_category` VALUES (1,'闲言碎语','如果不经常叨叨絮絮，那我怎么知道自己有多精分呢？','随想，随笔，随性','一个焦虑症患者的思想结晶',12,'2',0),(2,'学习笔记','web编程，创造一个自己想要的空间','web编程，PHP，javascript,html,css','web编程技术，bug及解决方案',39,'1',0),(3,'知识库','这里有可以满足你走上人生巅峰所需求的知识！','海量，知识，储备，净化','站长辛辛苦苦为你们收集的干货',5,'3',0),(20,'没什么可说的','大概，你所以为的就是我所想要写的','随笔','咚咚咚，掉出了许多牢骚',0,'2',1),(21,'日常发现','生活很美好，只是你缺少发现美的眼睛','日常发现','保持好奇心，生活更有趣',0,'1',1),(22,'PHP','一点一滴慢慢积累','PHP编程，PHP解决方法','PHP技术积累，应用爬虫抓取网页信息',34,'3',2),(23,'前端','么么哒哒，来都来了...','javascript,html,css','前端的炫丽页面效果更容易获得成就感',1,'2',2),(24,'技术栏','成为技术宅？-->> read this article！','技术，','学习，收集有关技术方面的资料',0,'3',3),(25,'生活常识','看吧，你会发现生活的精彩','常识，生活','生活的小常识，不一定都从知乎上获得',0,'1',3),(26,'思想先行','勿以往之不谏，知来者之可追！','人生，思考','一些比较有深刻，可以探讨，诱人思考的文章',2,'2',3);

#
# Structure for table "blog_config"
#

CREATE TABLE `blog_config` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT '' COMMENT '配置标题',
  `conf_name` varchar(50) DEFAULT '' COMMENT '变量名',
  `conf_content` text COMMENT '变量值',
  `conf_order` int(11) DEFAULT '0' COMMENT '排序',
  `conf_tips` varchar(255) DEFAULT '' COMMENT '备注',
  `field_type` varchar(50) DEFAULT '' COMMENT '字段类型',
  `field_value` varchar(255) DEFAULT '' COMMENT '字段值',
  PRIMARY KEY (`conf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='网站配置';

#
# Data for table "blog_config"
#

INSERT INTO `blog_config` VALUES (1,'网站统计','web_statistic','哈哈！',2,'统计网站相关信息','textarea',''),(4,'网站状态','web_status','0',3,'代表网站当前状态，是运行中，还是关闭状态。','radio','0|关闭,1|打开'),(5,'网站标题','web_title','四味糖的个人博客',1,'配置网站的标题','input',''),(6,'辅助标题','seo_title','PHP编程，爬虫爱好者',4,'有助于seo搜索','input',''),(7,'关键词','keywords','PHP！web编程！爬虫！技术分享！',5,'网站关键词','input',''),(8,'描述','description','四味糖的个人博客，专注于PHP技术分享，文章精炼，有营养！',6,'网站的描述','textarea',''),(9,'版权信息','copyright','@copyright   Design by 四味糖 2016-12-12',8,'页面下部的版权信息','input','');

#
# Structure for table "blog_links"
#

CREATE TABLE `blog_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '链接名',
  `link_title` varchar(255) CHARACTER SET utf8 DEFAULT '' COMMENT '链接标题',
  `link_url` varchar(255) CHARACTER SET utf8 DEFAULT '#' COMMENT '链接地址',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='友情链接';

#
# Data for table "blog_links"
#

INSERT INTO `blog_links` VALUES (1,'通信汪的博客','非常简洁的hexo博客','http://tasays.cn/',1),(2,'杨青博客','杨青模板提供者的网站','http://www.yangqq.com/',2);

#
# Structure for table "blog_navs"
#

CREATE TABLE `blog_navs` (
  `nav_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '导航名',
  `nav_alias` varchar(40) CHARACTER SET utf8 DEFAULT '' COMMENT '导航别名',
  `nav_url` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '#' COMMENT '导航地址',
  `nav_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='导航栏';

#
# Data for table "blog_navs"
#

INSERT INTO `blog_navs` VALUES (1,'关于','about','http://www.blog.com/about',2),(2,'首页','index','http://www.blog.com/',1),(9,'留言板','message','http://www.blog.com/message',6),(10,'闲言碎语','gossip','http://www.blog.com/cate/1',3),(11,'学习笔记','learn','http://www.blog.com/cate/2',4),(12,'知识库','knowledge','http://www.blog.com/cate/3',5);

#
# Structure for table "blog_user"
#

CREATE TABLE `blog_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员信息';

#
# Data for table "blog_user"
#

INSERT INTO `blog_user` VALUES (1,'admin','eyJpdiI6InpBc1FBNVwvZ3FUZGZMenA3dDFUZktBPT0iLCJ2YWx1ZSI6IldQSTZjYU9lbDZEUERodndFR2hPdGx1VXM2OGUrK3c2MmRsaHdNOVdibFk9IiwibWFjIjoiOWFhNGJhMjg2NzA3MjgxZDNmNDY1MjZlNWQyM2JiNGZmNzJiZjA4MzNkYzAxNTJjMzNmYzUwMmIxMjA1ZmIzNyJ9');
