-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 02 日 02:32
-- 服务器版本: 5.0.90
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `q4213`
--

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_duilian`
--

CREATE TABLE IF NOT EXISTS `dev_advs_duilian` (
  `id` int(4) NOT NULL auto_increment,
  `groupname` char(200) NOT NULL,
  `src` char(100) NOT NULL default '',
  `src2` char(100) NOT NULL default '',
  `url` char(200) NOT NULL default '',
  `url2` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dev_advs_duilian`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_lb`
--

CREATE TABLE IF NOT EXISTS `dev_advs_lb` (
  `id` int(20) NOT NULL auto_increment,
  `groupid` int(5) NOT NULL default '1',
  `title` char(100) NOT NULL default '',
  `src` char(100) NOT NULL default '',
  `src1` char(255) NOT NULL,
  `url` char(100) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `dev_advs_lb`
--

INSERT INTO `dev_advs_lb` (`id`, `groupid`, `title`, `src`, `src1`, `url`, `xuhao`) VALUES
(39, 1, '广告标题', 'advs/pics/20101104/1288860946.jpg', '', 'http://', 2),
(46, 1, '广告标题', 'advs/pics/20101104/1288860941.jpg', '', 'http://', 1),
(48, 1, '广告标题', 'advs/pics/20101104/1288860953.jpg', '', 'http://', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_lbgroup`
--

CREATE TABLE IF NOT EXISTS `dev_advs_lbgroup` (
  `id` int(3) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `dev_advs_lbgroup`
--

INSERT INTO `dev_advs_lbgroup` (`id`, `groupname`, `xuhao`, `moveable`) VALUES
(1, '默认轮播广告组', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_link`
--

CREATE TABLE IF NOT EXISTS `dev_advs_link` (
  `id` int(12) NOT NULL auto_increment,
  `groupid` int(5) NOT NULL default '0',
  `name` varchar(200) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  `type` varchar(20) NOT NULL default '',
  `src` varchar(100) NOT NULL default '',
  `cl` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `dev_advs_link`
--

INSERT INTO `dev_advs_link` (`id`, `groupid`, `name`, `url`, `xuhao`, `type`, `src`, `cl`) VALUES
(48, 1, '支付宝', 'http://www.alipay.com', 0, '', 'advs/pics/20101012/1286868413.jpg', 0),
(42, 1, '支付宝', 'http://www.alipay.com', 1, '', 'advs/pics/20101012/1286868034.jpg', 0),
(43, 1, '工商银行', 'http://www.icbc.com.cn', 0, '', 'advs/pics/20101012/1286868074.jpg', 0),
(44, 1, '快钱', 'http://www.99bill.com', 0, '', 'advs/pics/20101012/1286868100.jpg', 0),
(45, 1, '万里通', 'http://www.baidu.com', 0, '', 'advs/pics/20101012/1286868145.jpg', 0),
(46, 1, 'roadway', 'http://www.baidu.com', 0, '', 'advs/pics/20101012/1286868166.jpg', 0),
(47, 1, '平安', 'http://www.baidu.com', 0, '', 'advs/pics/20101012/1286868182.jpg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_linkgroup`
--

CREATE TABLE IF NOT EXISTS `dev_advs_linkgroup` (
  `id` int(3) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `dev_advs_linkgroup`
--

INSERT INTO `dev_advs_linkgroup` (`id`, `groupname`, `xuhao`, `moveable`) VALUES
(1, '默认友情链接组', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_logo`
--

CREATE TABLE IF NOT EXISTS `dev_advs_logo` (
  `id` int(4) NOT NULL auto_increment,
  `groupname` char(200) NOT NULL,
  `src` char(100) NOT NULL default '',
  `url` char(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dev_advs_logo`
--

INSERT INTO `dev_advs_logo` (`id`, `groupname`, `src`, `url`) VALUES
(1, '网站标志一', 'advs/pics/20100908/1283921636.jpg', '#');

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_movi`
--

CREATE TABLE IF NOT EXISTS `dev_advs_movi` (
  `id` int(4) NOT NULL auto_increment,
  `groupname` char(200) NOT NULL,
  `src` char(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dev_advs_movi`
--

INSERT INTO `dev_advs_movi` (`id`, `groupname`, `src`) VALUES
(1, '视频广告测试一', 'http://vhead.blog.sina.com.cn/player/outer_player.swf?auto=1&vid=16205152&uid=1504617052');

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_pic`
--

CREATE TABLE IF NOT EXISTS `dev_advs_pic` (
  `id` int(4) NOT NULL auto_increment,
  `groupname` char(200) NOT NULL,
  `src` char(100) NOT NULL default '',
  `url` char(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dev_advs_pic`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_pop`
--

CREATE TABLE IF NOT EXISTS `dev_advs_pop` (
  `id` int(12) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `body` text,
  `ifpop` int(1) NOT NULL default '0',
  `popwidth` int(10) default NULL,
  `popheight` int(10) default NULL,
  `popleft` int(10) default NULL,
  `poptop` int(10) default NULL,
  `poptoolbar` int(1) default NULL,
  `popmenubar` int(1) default NULL,
  `popstatus` int(1) default NULL,
  `poplocation` int(1) default NULL,
  `popscrollbars` varchar(50) default NULL,
  `popresizable` int(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dev_advs_pop`
--

INSERT INTO `dev_advs_pop` (`id`, `title`, `body`, `ifpop`, `popwidth`, `popheight`, `popleft`, `poptop`, `poptoolbar`, `popmenubar`, `popstatus`, `poplocation`, `popscrollbars`, `popresizable`) VALUES
(1, '弹出窗口', '窗口内容 ', 0, 400, 300, 0, 0, 0, 0, 0, 0, 'auto', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_advs_text`
--

CREATE TABLE IF NOT EXISTS `dev_advs_text` (
  `id` int(4) NOT NULL auto_increment,
  `groupname` char(200) NOT NULL,
  `text` char(200) NOT NULL default '',
  `url` char(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dev_advs_text`
--

INSERT INTO `dev_advs_text` (`id`, `groupname`, `text`, `url`) VALUES
(1, '促销广告一', '本季特大优惠活动开始啦qq', 'http://www.com');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_admin`
--

CREATE TABLE IF NOT EXISTS `dev_base_admin` (
  `id` int(6) NOT NULL auto_increment,
  `user` varchar(30) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `job` varchar(50) NOT NULL,
  `jobid` varchar(20) NOT NULL,
  `moveable` int(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `dev_base_admin`
--

INSERT INTO `dev_base_admin` (`id`, `user`, `password`, `name`, `job`, `jobid`, `moveable`) VALUES
(3, 'admin', '202cb962ac59075b964b07152d234b70', '管理员', '管理员', 'A001', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_adminauth`
--

CREATE TABLE IF NOT EXISTS `dev_base_adminauth` (
  `id` int(6) NOT NULL auto_increment,
  `coltype` varchar(30) NOT NULL,
  `auth` int(5) NOT NULL default '0',
  `name` char(50) NOT NULL default '',
  `intro` char(255) NOT NULL default '',
  `xuhao` int(10) NOT NULL default '0',
  `pid` int(10) NOT NULL default '0',
  `pname` char(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

--
-- 转存表中的数据 `dev_base_adminauth`
--

INSERT INTO `dev_base_adminauth` (`id`, `coltype`, `auth`, `name`, `intro`, `xuhao`, `pid`, `pname`) VALUES
(69, 'advs', 91, '网站标志管理', '', 1, 2, ''),
(17, 'advs', 95, '网站广告管理', '', 5, 2, ''),
(30, 'advs', 96, '友情链接管理', '', 4, 7, ''),
(1, 'base', 1, '网站参数设置', '', 1, 0, ''),
(2, 'base', 2, '修改管理密码', '', 2, 0, ''),
(3, 'base', 3, '管理账户维护', '', 3, 0, ''),
(5, 'base', 5, '网站排版设置', '', 5, 0, ''),
(66, 'base', 6, '模块插件管理', '', 6, 0, ''),
(67, 'base', 7, '软件升级更新', '', 7, 0, ''),
(37, 'comment', 130, '点评模块参数设置', '', 0, 13, ''),
(11, 'comment', 131, '点评分类', '', 1, 13, ''),
(26, 'comment', 132, '点评管理', '', 2, 13, ''),
(120, 'shop', 325, '订单完成确认', '', 13, 31, ''),
(119, 'shop', 324, '订单配送确认', '', 12, 31, ''),
(118, 'shop', 323, '订单付款确认', '', 11, 31, ''),
(117, 'shop', 322, '订单调价权限', '', 9, 31, ''),
(4, 'member', 50, '会员类型设置', '', 1, 5, ''),
(42, 'member', 51, '会员模块参数设置', '', 11, 6, ''),
(19, 'member', 52, '会员查询管理', '', 2, 5, ''),
(20, 'member', 53, '会员资料查询', '', 3, 5, ''),
(21, 'member', 54, '会员资料修改', '', 4, 5, ''),
(22, 'member', 55, '会员邮件发送', '', 5, 5, ''),
(23, 'member', 56, '会员权限管理', '', 6, 5, ''),
(24, 'member', 57, '会员公告管理', '', 7, 5, ''),
(32, 'member', 58, '模拟会员登录', '', 8, 5, ''),
(33, 'member', 59, '会员实名认证', '', 9, 5, ''),
(34, 'member', 60, '会员删除权限', '', 10, 5, ''),
(63, 'member', 61, '会员区域设置', '', 11, 6, ''),
(64, 'member', 62, '会员行业分类', '', 12, 0, ''),
(65, 'member', 63, '积分规则设置', '', 13, 6, ''),
(35, 'member', 64, '会员转移类型', '', 11, 5, ''),
(36, 'member', 65, '重设会员密码', '', 12, 5, ''),
(68, 'member', 66, '积分录入权限', '', 16, 6, ''),
(6, 'menu', 11, '导航菜单设置', '', 1, 1, ''),
(38, 'news', 120, '文章模块参数设置', '', 0, 12, ''),
(39, 'news', 121, '文章分类', '', 1, 12, ''),
(13, 'news', 122, '文章管理', '', 2, 12, ''),
(12, 'news', 123, '文章专题设置', '', 3, 12, ''),
(40, 'news', 125, '文章发布', '', 5, 12, ''),
(41, 'news', 126, '文章修改', '', 6, 12, ''),
(43, 'page', 301, '网页分组和管理', '', 1, 30, ''),
(27, 'tools', 81, '访问统计系统', '', 1, 7, ''),
(29, 'tools', 82, '投票调查系统', '', 3, 7, ''),
(72, 'base', 8, '管理菜单设置', '', 8, 0, ''),
(116, 'shop', 321, '订单查询管理', '', 9, 31, ''),
(115, 'shop', 320, '商品修改', '', 8, 31, ''),
(114, 'shop', 319, '商品发布', '', 7, 31, ''),
(113, 'shop', 317, '商品管理', '', 5, 31, ''),
(112, 'shop', 316, '品牌管理', '', 4, 31, ''),
(109, 'shop', 310, '网店参数设置', '', 0, 31, ''),
(110, 'shop', 311, '配送方法设置', '', 1, 31, ''),
(111, 'shop', 313, '商品分类管理', '', 4, 31, ''),
(125, 'shop', 328, '订单退订确认', '', 15, 31, ''),
(124, 'shop', 331, '商品销售统计', '', 16, 31, ''),
(123, 'shop', 330, '订单查询统计', '', 16, 31, ''),
(122, 'shop', 327, '订单退货确认', '', 15, 31, ''),
(121, 'shop', 326, '订单退款确认', '', 14, 31, ''),
(87, 'base', 9, '模块安装卸载', '', 9, 0, ''),
(88, 'tools', 83, '图片投票系统', '', 3, 7, ''),
(89, 'tools', 84, 'QQ客服系统', '', 4, 7, ''),
(90, 'tools', 85, '51客服系统', '', 5, 7, ''),
(91, 'tools', 86, '51la统计系统', '', 6, 7, ''),
(92, 'tools', 87, '移动短信留言', '', 7, 7, ''),
(93, 'member', 67, '财务收款入账', '', 16, 6, ''),
(94, 'member', 68, '会员帐务查询', '', 16, 6, ''),
(95, 'member', 69, '支付方法设置', '', 16, 6, ''),
(96, 'member', 70, '帐务查询统计', '', 16, 6, ''),
(97, 'job', 221, '招聘职位发布', '', 1, 22, ''),
(98, 'job', 222, '招聘职位管理', '', 2, 22, ''),
(99, 'job', 223, '求职申请处理', '', 3, 22, ''),
(100, 'job', 224, '企业人才库查询', '', 4, 22, ''),
(101, 'job', 225, '应聘表单设置', '', 7, 22, ''),
(126, 'feedback', 211, '反馈表单设置', '', 1, 21, ''),
(127, 'feedback', 212, '反馈留言管理', '', 3, 21, ''),
(128, 'huanzeng', 720, '换赠参数设置', '', 0, 72, ''),
(129, 'huanzeng', 721, '赠品管理权限', '', 1, 72, ''),
(130, 'huanzeng', 722, '赠品订单管理权限', '', 2, 72, ''),
(131, 'huanzeng', 723, '赠品换购统计权限', '', 3, 72, '');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_adminmenu`
--

CREATE TABLE IF NOT EXISTS `dev_base_adminmenu` (
  `id` int(6) NOT NULL auto_increment,
  `pid` int(6) NOT NULL default '0',
  `menu` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `xuhao` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `dev_base_adminmenu`
--

INSERT INTO `dev_base_adminmenu` (`id`, `pid`, `menu`, `url`, `xuhao`) VALUES
(15, 0, '网站标志管理', 'advs/admin/advs_logo_modi.php?id=1', 1),
(16, 0, '轮播广告管理', 'advs/admin/advs_lb.php', 2),
(17, 0, '发布新的商品', 'shop/admin/shop_conadd.php', 7),
(18, 0, '商品查询管理', 'shop/admin/shop_con.php', 8),
(19, 0, '订单查询管理', 'shop/admin/order.php', 13),
(20, 0, '会员帐务管理', 'member/admin/member_common.php?searchmodle=account', 15),
(21, 0, '支付方法设置', 'member/admin/paycenter.php', 4),
(22, 0, '配送方法设置', 'shop/admin/yun_method.php', 6),
(23, 0, '配送区域设置', 'shop/admin/yun_zone.php', 5),
(24, 0, '修改网站介绍', 'page/admin/page.php', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_adminrights`
--

CREATE TABLE IF NOT EXISTS `dev_base_adminrights` (
  `id` int(50) NOT NULL auto_increment,
  `auth` char(20) default NULL,
  `user` char(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3326 ;

--
-- 转存表中的数据 `dev_base_adminrights`
--

INSERT INTO `dev_base_adminrights` (`id`, `auth`, `user`) VALUES
(3321, '212', 'admin'),
(3320, '211', 'admin'),
(3319, '225', 'admin'),
(3318, '224', 'admin'),
(3317, '223', 'admin'),
(3316, '222', 'admin'),
(3315, '221', 'admin'),
(3314, '70', 'admin'),
(3313, '69', 'admin'),
(3312, '68', 'admin'),
(3311, '67', 'admin'),
(3310, '87', 'admin'),
(3309, '86', 'admin'),
(3308, '85', 'admin'),
(3307, '84', 'admin'),
(3306, '83', 'admin'),
(3305, '9', 'admin'),
(3304, '326', 'admin'),
(3303, '327', 'admin'),
(3302, '330', 'admin'),
(3301, '331', 'admin'),
(3300, '328', 'admin'),
(3299, '313', 'admin'),
(3298, '311', 'admin'),
(3297, '310', 'admin'),
(3296, '316', 'admin'),
(3295, '317', 'admin'),
(3294, '319', 'admin'),
(3293, '320', 'admin'),
(3292, '321', 'admin'),
(3291, '8', 'admin'),
(3290, '82', 'admin'),
(3289, '81', 'admin'),
(3288, '301', 'admin'),
(3287, '126', 'admin'),
(3286, '125', 'admin'),
(3285, '123', 'admin'),
(3284, '122', 'admin'),
(3283, '121', 'admin'),
(3282, '120', 'admin'),
(3281, '11', 'admin'),
(3280, '66', 'admin'),
(3279, '65', 'admin'),
(3278, '64', 'admin'),
(3277, '63', 'admin'),
(3276, '62', 'admin'),
(3275, '61', 'admin'),
(3274, '60', 'admin'),
(3273, '59', 'admin'),
(3272, '58', 'admin'),
(3271, '57', 'admin'),
(3270, '56', 'admin'),
(3269, '55', 'admin'),
(3268, '54', 'admin'),
(3267, '53', 'admin'),
(3266, '52', 'admin'),
(3265, '51', 'admin'),
(3264, '50', 'admin'),
(3263, '322', 'admin'),
(3262, '323', 'admin'),
(3261, '324', 'admin'),
(3260, '325', 'admin'),
(3259, '132', 'admin'),
(3258, '131', 'admin'),
(3257, '130', 'admin'),
(3256, '7', 'admin'),
(3255, '6', 'admin'),
(3254, '5', 'admin'),
(3253, '3', 'admin'),
(3252, '2', 'admin'),
(3251, '1', 'admin'),
(3250, '96', 'admin'),
(3249, '95', 'admin'),
(3248, '91', 'admin'),
(3322, '720', 'admin'),
(3323, '721', 'admin'),
(3324, '722', 'admin'),
(3325, '723', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_border`
--

CREATE TABLE IF NOT EXISTS `dev_base_border` (
  `id` int(12) NOT NULL auto_increment,
  `bordertype` varchar(10) NOT NULL default 'border',
  `tempid` char(8) NOT NULL default '',
  `tempname` varchar(50) NOT NULL default '边框模板',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- 转存表中的数据 `dev_base_border`
--

INSERT INTO `dev_base_border` (`id`, `bordertype`, `tempid`, `tempname`) VALUES
(1, 'border', '001', '可选颜色边框模板'),
(2, 'border', '002', '可选颜色边框模板'),
(3, 'border', '003', '可选颜色边框模板'),
(4, 'border', '004', '可选颜色边框模板'),
(5, 'border', '005', '可选颜色边框模板'),
(6, 'border', '006', '可选颜色边框模板'),
(66, 'lable', '212', '竖排菜单式标签切换边框模板,无外框线'),
(8, 'border', '008', '可选颜色边框模板(浅色调)'),
(9, 'border', '009', '可选颜色边框模板'),
(10, 'border', '010', '可选颜色边框模板'),
(11, 'border', '011', '可选颜色边框模板'),
(12, 'border', '012', '可选颜色边框模板(浅色调)'),
(13, 'border', '013', '可选颜色边框模板'),
(14, 'border', '014', '可选颜色边框模板'),
(15, 'border', '015', '可选颜色边框模板'),
(16, 'border', '016', '可选颜色边框模板'),
(17, 'border', '017', '可选颜色边框模板'),
(18, 'border', '018', '可选颜色边框模板'),
(19, 'border', '501', '浅色调创意边框模板'),
(20, 'border', '502', '边框模板'),
(22, 'border', '504', '边框模板'),
(23, 'border', '505', '边框模板'),
(34, 'border', '020', '可选颜色边框模板(浅色调)'),
(25, 'border', '507', '边框模板'),
(35, 'border', '503', '无框线简约边框模版'),
(27, 'border', '509', '边框模板'),
(37, 'border', '506', '浅色调无框线边框模版'),
(31, 'border', '513', '浅灰色圆角边框模板'),
(33, 'border', '019', '可选颜色边框模板(浅色调)'),
(38, 'border', '508', '浅色调边框模版'),
(39, 'border', '510', '左侧标题栏浅色调模版'),
(40, 'border', '511', '无标题栏圆角边框模版'),
(41, 'border', '512', '无标题栏圆角边框模版'),
(42, 'border', '514', '边框模板'),
(43, 'border', '021', '左侧标题栏可变色边框模板'),
(44, 'border', '515', '灰色外背景边框模板'),
(45, 'border', '516', '无标题栏圆角灰色背景边框模版'),
(46, 'border', '517', '无标题栏圆角浅色背景边框模板'),
(47, 'lable', '201', '标签切换边框模板,浅蓝简约型'),
(48, 'lable', '051', '可选颜色,标签切换边框模板,带总标题'),
(49, 'lable', '202', '标签切换边框模板,红黑标签，无框线'),
(50, 'lable', '203', '标签切换边框模板'),
(51, 'lable', '204', '标签切换边框模板,浅灰简约,带总标题栏'),
(52, 'lable', '052', '可选颜色,标签切换边框模板,带总标题'),
(53, 'lable', '205', '标签切换边框模板,圆角,深色'),
(54, 'lable', '053', '可选颜色,标签切换边框模板,圆角'),
(55, 'lable', '206', '标签切换边框模板,圆角,浅黄色调'),
(56, 'lable', '207', '标签切换边框模板,圆角,浅蓝淡雅风格'),
(57, 'lable', '208', '标签切换边框模板,内圆角,浅蓝淡雅风格'),
(58, 'lable', '209', '标签切换边框模板,内圆角,灰白渐变'),
(59, 'lable', '210', '标签切换边框模板,圆角,浅色渐变'),
(60, 'lable', '054', '可选颜色,标签切换边框模板,圆角'),
(61, 'lable', '055', '可选颜色,标签切换边框模板'),
(62, 'lable', '211', '标签切换边框模板,圆角,橙色+灰色'),
(63, 'border', '500', '条幅边框,无标题栏，搜索条登录框等专用'),
(64, 'border', '022', '可选颜色边框模板'),
(67, 'lable', '056', '可选颜色,竖排菜单式标签切换边框,无框线'),
(75, 'border', '519', '无标题栏边框模版(圆角，粗边线)'),
(77, 'border', '023', '可选颜色边框模板'),
(78, 'border', '024', '可选颜色边框模板'),
(87, 'border', '596', '浅色圆角边框'),
(81, 'border', '606', '浅色圆角边框'),
(83, 'border', '520', '红色标题栏浅灰背景边框'),
(84, 'border', '604', '搜索条专用边框'),
(85, 'border', '605', '黑色标题栏圆角边框'),
(86, 'border', '595', '浅色圆角边框'),
(101, 'border', '782', '左侧边框'),
(95, 'border', '787', '当前位置条背景'),
(102, 'border', '788', '左侧下部'),
(103, 'border', '783', '新品上市'),
(104, 'border', '784', '最新动态'),
(106, 'border', '781', '绿茶'),
(107, 'border', '785', '乌龙茶'),
(108, 'border', '786', '普洱茶'),
(109, 'border', '789', '茶具'),
(110, 'border', '790', '友情链接'),
(111, 'border', '791', '新手指南'),
(112, 'border', '792', '关于支付'),
(113, 'border', '793', '关于配送'),
(114, 'border', '794', '售后服务'),
(115, 'border', '795', '关于我们'),
(116, 'border', '796', '礼盒'),
(117, 'border', '797', '位置条1');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_coltype`
--

CREATE TABLE IF NOT EXISTS `dev_base_coltype` (
  `id` int(12) NOT NULL auto_increment,
  `coltype` varchar(30) NOT NULL default '',
  `colname` varchar(50) NOT NULL default '',
  `sname` varchar(30) NOT NULL,
  `ifadmin` int(1) NOT NULL default '1',
  `ifchannel` int(1) NOT NULL default '0',
  `ifpubplus` int(1) NOT NULL default '1',
  `moveable` int(1) NOT NULL default '0',
  `installed` int(1) NOT NULL default '1',
  `classtbl` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- 转存表中的数据 `dev_base_coltype`
--

INSERT INTO `dev_base_coltype` (`id`, `coltype`, `colname`, `sname`, `ifadmin`, `ifchannel`, `ifpubplus`, `moveable`, `installed`, `classtbl`) VALUES
(1, 'base', '基础模块', '基础', 0, 0, 0, 0, 1, ''),
(2, 'diy', '自定内容', '自定义', 0, 0, 1, 0, 1, ''),
(3, 'menu', '导航菜单', '菜单', 1, 0, 1, 0, 1, ''),
(5, 'index', '首页模块', '首页', 0, 1, 0, 0, 1, ''),
(20, 'page', '网页模块', '网页', 1, 0, 1, 0, 1, ''),
(21, 'news', '文章模块', '文章', 1, 1, 1, 0, 1, '_news_cat'),
(31, 'shop', '网上购物', '购物', 1, 1, 1, 0, 1, '_shop_cat'),
(28, 'comment', '互动点评', '点评', 1, 1, 1, 0, 1, '_comment_cat'),
(30, 'member', '会员模块', '会员', 1, 1, 1, 0, 1, ''),
(97, 'search', '全站搜索', '搜索', 0, 0, 1, 0, 1, ''),
(100, 'effect', '素材特效', '特效', 0, 0, 1, 0, 1, ''),
(105, 'job', '企业招聘', '招聘', 1, 1, 1, 1, 1, ''),
(114, 'feedback', '留言反馈', '反馈', 1, 1, 1, 1, 1, ''),
(110, 'advs', '网站广告', '广告', 1, 0, 1, 0, 1, ''),
(112, 'tools', '辅助工具', '工具', 1, 0, 1, 0, 1, ''),
(115, 'huanzeng', '积分换赠', '换赠', 1, 1, 1, 1, 1, '_hz_cat');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_config`
--

CREATE TABLE IF NOT EXISTS `dev_base_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dev_base_config`
--

INSERT INTO `dev_base_config` (`xuhao`, `vname`, `settype`, `colwidth`, `variable`, `value`, `intro`) VALUES
(1, '网站名称', 'input', '30', 'SiteName', '茶叶网上专卖店www.zzlm.com.cn', '用于在网页标题、导航栏处显示'),
(2, '网站网址', 'input', '30', 'SiteHttp', 'http://www.zzlm.com.cn/', '网站的实际访问网址,末尾加“/”'),
(4, '服务邮箱', 'input', '30', 'SiteEmail', 'service@mydomain.com', '在发送系统邮件时作为发件人邮件'),
(5, '邮件转发方式', 'ownersys', '1', 'ownersys', '0', 'LINUX/UNIX服务器一般可使用内置邮件系统转发邮件；WINDOWS服务器建议使用外部SMTP邮箱转发，并设置以下SMTP邮箱参数'),
(6, 'SMTP服务器', 'input', '30', 'owner_m_smtp', 'mail.mydomain.com', ''),
(7, 'SMTP邮箱用户', 'input', '30', 'owner_m_user', 'alex@mydomain.com', ''),
(8, 'SMTP邮箱密码', 'input', '30', 'owner_m_pass', '123456', ''),
(5, 'SMTP转发邮箱', 'input', '30', 'owner_m_mail', 'alex@mydomain.com', ''),
(9, 'SMTP身份验证', 'YN', '10', 'owner_m_check', '1', ''),
(10, '是否生成并使用静态HTML网页', 'YN', '10', 'CatchOpen', '0', ''),
(11, 'HTML静态网页更新时间(秒)', 'input', '8', 'CatchTime', '3600', '超过此时间访问静态页面时，重新生成静态页并刷新页面'),
(3, '软件授权用户账号', 'input', '30', 'phpwebUser', 'www.zzlm.com.cn', '在本软件安装、升级或使用其他服务时所采用的软件授权用户登录帐号'),
(99, '安全校验码', 'code', '30', 'safecode', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_pageset`
--

CREATE TABLE IF NOT EXISTS `dev_base_pageset` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `coltype` varchar(50) NOT NULL default '',
  `pagename` varchar(50) NOT NULL default '',
  `th` int(5) NOT NULL default '200',
  `ch` int(5) NOT NULL default '500',
  `bh` int(5) NOT NULL default '200',
  `pagetitle` varchar(255) NOT NULL default '',
  `metakey` varchar(255) NOT NULL default '',
  `metacon` text NOT NULL,
  `bgcolor` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL,
  `bgposition` varchar(20) NOT NULL,
  `bgrepeat` varchar(20) NOT NULL default 'repeat',
  `bgatt` varchar(10) NOT NULL default 'scroll',
  `containwidth` int(5) NOT NULL default '900',
  `containbg` varchar(100) NOT NULL default '#ffffff',
  `containimg` varchar(100) NOT NULL,
  `containmargin` int(2) NOT NULL default '0',
  `containpadding` int(2) NOT NULL default '10',
  `containcenter` char(10) NOT NULL default 'auto',
  `topbg` varchar(100) NOT NULL default 'transparent',
  `topwidth` char(10) NOT NULL default '900',
  `contentbg` varchar(100) NOT NULL default 'transparent',
  `contentwidth` char(10) NOT NULL default '900',
  `contentmargin` int(2) NOT NULL default '10',
  `bottombg` varchar(100) NOT NULL default 'transparent',
  `bottomwidth` char(10) NOT NULL default '900',
  `buildhtml` varchar(12) NOT NULL default '0',
  `xuhao` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=340 ;

--
-- 转存表中的数据 `dev_base_pageset`
--

INSERT INTO `dev_base_pageset` (`id`, `name`, `coltype`, `pagename`, `th`, `ch`, `bh`, `pagetitle`, `metakey`, `metacon`, `bgcolor`, `bgimage`, `bgposition`, `bgrepeat`, `bgatt`, `containwidth`, `containbg`, `containimg`, `containmargin`, `containpadding`, `containcenter`, `topbg`, `topwidth`, `contentbg`, `contentwidth`, `contentmargin`, `bottombg`, `bottomwidth`, `buildhtml`, `xuhao`) VALUES
(126, '友情链接', 'advs', 'link', 165, 217, 211, '', '友情链接', '友情链接', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(92, '点评检索', 'comment', 'query', 165, 1025, 211, '', '0', '0', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'catid', 12),
(88, '点评详情', 'comment', 'detail', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 17),
(123, '点评频道首页', 'comment', 'main', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'index', 11),
(1, '首页', 'index', 'index', 165, 1973, 186, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'index', 1),
(241, '会员主页', 'member', 'homepage', 246, 554, 161, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 15),
(5, '会员登录', 'member', 'login', 165, 377, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 1),
(6, '重设密码', 'member', 'lostpass', 165, 299, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 2),
(12, '会员注册', 'member', 'reg', 165, 467, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(202, '会员中心首页', 'member', 'main', 163, 309, 209, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 1),
(203, '登录帐号设置', 'member', 'account', 165, 428, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 2),
(204, '头像签名设置', 'member', 'person', 165, 462, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 3),
(205, '详细资料修改', 'member', 'detail', 165, 572, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 5),
(206, '联系信息设置', 'member', 'contact', 165, 462, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 6),
(207, '会员公告详情', 'member', 'notice', 165, 372, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 7),
(208, '文章发布', 'member', 'newsfabu', 164, 520, 152, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 8),
(209, '文章管理', 'member', 'newsgl', 162, 325, 150, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 9),
(210, '文章修改', 'member', 'newsmodify', 164, 808, 152, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 10),
(318, '投诉建议', 'page', 'html_feedback', 165, 217, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(231, '我的收藏夹', 'member', 'fav', 165, 545, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 12),
(232, '我的好友', 'member', 'friends', 165, 545, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 12),
(233, '我的点评', 'member', 'comment', 165, 545, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 13),
(228, '文章分类', 'member', 'newscat', 147, 267, 150, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 9),
(234, '我的站内短信', 'member', 'msn', 165, 545, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 15),
(2, '文章检索', 'news', 'query', 163, 482, 209, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'catid', 2),
(3, '文章正文', 'news', 'detail', 165, 427, 211, '', '0', '0', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 3),
(33, '频道首页', 'news', 'main', 163, 520, 209, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'index', 0),
(129, '内容页', 'page', 'html', 163, 273, 209, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 1),
(16, '全站搜索', 'search', 'search', 165, 672, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 2),
(246, '我的积分', 'member', 'membercent', 165, 606, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 19),
(247, '会员文章', 'news', 'membernews', 164, 185, 152, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 12),
(310, '订单查询', 'member', 'shoporder', 165, 572, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 8),
(309, '订单付款', 'shop', 'shoporderpay', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 9),
(308, '商品订购', 'shop', 'startorder', 165, 1216, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 6),
(300, '频道首页', 'shop', 'main', 216, 1899, 169, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'index', 1),
(301, '商品查询', 'shop', 'query', 163, 1212, 209, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'catid', 2),
(302, '商品详情', 'shop', 'detail', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 3),
(303, '品牌查询', 'shop', 'brandquery', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 4),
(304, '品牌详情', 'shop', 'branddetail', 133, 1068, 0, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 5),
(305, '购物车', 'shop', 'cart', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 6),
(306, '订单详情', 'shop', 'shoporderdetail', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 9),
(307, '品牌首页', 'shop', 'brand', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 4),
(289, '分组首页', 'page', 'html_main', 200, 500, 200, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(290, '会员付款记录', 'member', 'paylist', 165, 428, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 19),
(291, '会员消费记录', 'member', 'buylist', 165, 428, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 19),
(292, '招聘职位查询', 'job', 'main', 165, 422, 211, '诚聘英才', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'index', 2),
(293, '招聘职位详情', 'job', 'detail', 165, 1239, 211, '', '0', '0', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 3),
(311, '关于我们', 'page', 'html_aboutus', 165, 275, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(315, '联系方式', 'page', 'html_contact', 165, 217, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(316, '售后服务', 'page', 'html_job', 163, 312, 209, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(317, '留言反馈', 'feedback', 'main', 165, 572, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 1),
(299, '帐户在线充值', 'member', 'onlinepay', 165, 428, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 19),
(319, '换赠首页', 'huanzeng', 'main', 169, 853, 175, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'index', 0),
(320, '赠品检索', 'huanzeng', 'query', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'catid', 2),
(321, '赠品详情', 'huanzeng', 'detail', 165, 1025, 211, '', '0', '0', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 3),
(322, '购物车', 'huanzeng', 'cart', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 6),
(323, '赠品兑换', 'huanzeng', 'startorder', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 6),
(324, '订单详情', 'huanzeng', 'orderdetail', 165, 1025, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 9),
(325, '订单查询', 'member', 'hzorder', 165, 572, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 8),
(327, '新手指南', 'page', 'guide', 165, 184, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 0),
(328, '新手指南', 'page', 'guide_main', 200, 500, 200, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(329, '支付说明', 'page', 'pay', 165, 209, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 0),
(330, '支付说明', 'page', 'pay_main', 200, 500, 200, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(331, '配送说明', 'page', 'send', 165, 217, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 0),
(332, '配送说明', 'page', 'send_main', 200, 500, 200, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0),
(333, '售后服务', 'page', 'service', 165, 407, 211, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', 'id', 0),
(334, '售后服务', 'page', 'service_main', 200, 500, 200, '', '', '', 'transparent', 'url(effect/source/bg/bg.gif)', '0% 0%', 'repeat-x', 'scroll', 1002, 'none transparent scroll repeat 0% 0%', '', 0, 0, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'rgb(255,255,255)', '900', 0, 'rgb(255,255,255)', '900', '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_pagetemp`
--

CREATE TABLE IF NOT EXISTS `dev_base_pagetemp` (
  `id` int(12) NOT NULL auto_increment,
  `tempname` varchar(50) NOT NULL,
  `bgcolor` varchar(100) NOT NULL,
  `bgimage` varchar(100) NOT NULL,
  `bgposition` varchar(20) NOT NULL,
  `bgrepeat` varchar(20) NOT NULL default 'repeat',
  `bgatt` varchar(10) NOT NULL default 'scroll',
  `containwidth` int(5) NOT NULL default '900',
  `containbg` varchar(100) NOT NULL default '#ffffff',
  `containimg` varchar(100) NOT NULL,
  `containmargin` int(2) NOT NULL default '0',
  `containpadding` int(2) NOT NULL default '10',
  `containcenter` char(10) NOT NULL default 'auto',
  `topbg` varchar(100) NOT NULL default 'transparent',
  `topwidth` char(10) NOT NULL default '900',
  `contentbg` varchar(100) NOT NULL default 'transparent',
  `contentwidth` char(10) NOT NULL default '900',
  `contentmargin` int(2) NOT NULL default '10',
  `bottombg` varchar(100) NOT NULL default 'transparent',
  `bottomwidth` char(10) NOT NULL default '900',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `dev_base_pagetemp`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_base_plus`
--

CREATE TABLE IF NOT EXISTS `dev_base_plus` (
  `id` int(12) NOT NULL auto_increment,
  `coltype` varchar(30) NOT NULL,
  `pluslable` varchar(100) default '0',
  `plusname` varchar(50) NOT NULL,
  `plustype` varchar(50) default '0',
  `pluslocat` varchar(50) default '0',
  `tempname` varchar(100) NOT NULL default '0',
  `tempcolor` varchar(2) NOT NULL,
  `showborder` char(20) NOT NULL default '0',
  `bordercolor` varchar(7) NOT NULL default '#dddddd',
  `borderwidth` int(2) NOT NULL default '1',
  `borderstyle` varchar(10) NOT NULL default 'solid',
  `borderlable` varchar(150) NOT NULL,
  `borderroll` varchar(10) NOT NULL,
  `showbar` varchar(10) NOT NULL default 'none',
  `barbg` varchar(10) NOT NULL default '#cccccc',
  `barcolor` varchar(10) NOT NULL default '#ffffff',
  `backgroundcolor` varchar(7) NOT NULL default '#ffffff',
  `morelink` varchar(100) NOT NULL default 'http://',
  `width` int(5) NOT NULL default '100',
  `height` int(5) NOT NULL default '100',
  `top` int(5) NOT NULL default '0',
  `left` int(5) NOT NULL default '0',
  `zindex` int(2) NOT NULL default '99',
  `padding` int(11) NOT NULL default '0',
  `shownums` int(10) NOT NULL default '0',
  `ord` varchar(100) NOT NULL default 'id',
  `sc` varchar(10) NOT NULL default 'desc',
  `showtj` int(5) NOT NULL default '0',
  `cutword` int(20) default '0',
  `target` varchar(30) default '0',
  `catid` int(100) NOT NULL default '0',
  `cutbody` int(5) NOT NULL default '0',
  `picw` int(3) NOT NULL default '100',
  `pich` int(3) NOT NULL default '100',
  `fittype` char(10) NOT NULL default 'fill',
  `title` varchar(100) NOT NULL,
  `body` text,
  `pic` varchar(255) NOT NULL,
  `piclink` char(255) NOT NULL default '-1',
  `attach` varchar(255) NOT NULL,
  `movi` varchar(255) NOT NULL,
  `sourceurl` varchar(30) NOT NULL,
  `word` char(255) NOT NULL,
  `word1` char(255) NOT NULL,
  `word2` char(255) NOT NULL,
  `word3` char(255) NOT NULL default '',
  `word4` char(255) NOT NULL default '',
  `text` text NOT NULL,
  `text1` text NOT NULL,
  `code` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `link1` char(255) NOT NULL default '',
  `link2` char(255) NOT NULL default '',
  `link3` char(255) NOT NULL,
  `link4` char(255) NOT NULL,
  `tags` char(30) NOT NULL,
  `groupid` varchar(20) NOT NULL default '',
  `projid` varchar(20) NOT NULL default '',
  `modno` int(3) NOT NULL default '0',
  `setglobal` int(5) NOT NULL default '0',
  `overflow` varchar(20) NOT NULL default 'hidden',
  `bodyzone` varchar(10) NOT NULL default 'content',
  `display` char(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7554 ;

--
-- 转存表中的数据 `dev_base_plus`
--

INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(3640, 'shop', 'modShopTwoClassBrand', '分类品牌组合查询', 'shop', 'branddetail', 'tpl_shoptwoclass_brand_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 230, 899, 12, 0, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 108, 50, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3642, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'branddetail', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 712, 28, 0, 0, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(3784, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'branddetail', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7041, 'shop', 'modShopBrandQuery', '品牌检索', 'shop', 'brandquery', 'tpl_shop_brandquery_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 956, 57, 230, 90, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 40, 'fill', '品牌检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3776, 'menu', 'modBottomMenu', '底部菜单（一级）', 'news', 'membernews', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(3768, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'newscat', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(3764, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'newsmodify', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(3763, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'newsgl', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(3762, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'newsfabu', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(3799, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'homepage', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6805, 'shop', 'modShopCart', '购物车', 'shop', 'cart', 'tpl_shop_cart.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 500, 57, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6033, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'main', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 80, 87, 0, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6032, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'main', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 468, 26, 164, 70, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6031, 'diy', 'modDiyTemp', '自定义模版', 'shop', 'main', 'tpl_diy_pw1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 218, 27, 9, 719, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6818, 'shop', 'modShopStartOrder', '商品订购', 'shop', 'startorder', 'tpl_shop_startorder.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 1157, 57, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品订购', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6831, 'shop', 'modShopOrderPay', '订单付款', 'shop', 'shoporderpay', 'tpl_shop_orderpay.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 500, 57, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6829, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'shoporderpay', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7293, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'shoporder', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '订单查询', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7294, 'shop', 'modShopMemberOrder', '会员订单查询', 'member', 'shoporder', 'tpl_shop_order.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 500, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '订单查询', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7292, 'diy', 'modPic', '图片/FLASH', 'member', 'shoporder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(3711, 'shop', 'modShopSmallCart', '购物车提示信息', 'news', 'membernews', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7288, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'shoporder', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3823, 'diy', 'modButtomInfo', '底部信息编辑区', 'news', 'membernews', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(3815, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'newscat', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7476, 'advs', 'modLogo', '网站标志', 'comment', 'query', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7474, 'shop', 'modShopTwoClass', '商品二级分类', 'comment', 'query', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 13, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7475, 'diy', 'modButtomInfo', '底部信息编辑区', 'comment', 'query', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 15, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(3798, 'diy', 'modButtomInfo', '底部信息编辑区', 'index', 'index', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 54, 0, 19, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(3719, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'branddetail', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3703, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'newscat', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3809, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'newsfabu', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(3752, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'homepage', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7249, 'member', 'modMemberPerson', '头像签名设置表单', 'member', 'person', 'tpl_member_person.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 390, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '头像签名设置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7247, 'diy', 'modPic', '图片/FLASH', 'member', 'person', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7248, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'person', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '头像签名', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7472, 'menu', 'modTopMenu', '顶部菜单(一级)', 'comment', 'query', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7473, 'comment', 'modCommentNavPath', '当前位置提示条', 'comment', 'query', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 21, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '点评详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7122, 'news', 'modNewsQuery', '文章翻页检索', 'news', 'query', 'tpl_newsquery_diy.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 730, 412, 70, 254, 10, 0, 10, 'id', 'desc', 0, 40, '_self', 0, -1, -1, -1, 'fill', '文章检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7202, 'member', 'modMemberInfo', '会员登录信息', 'member', 'main', 'tpl_memberinfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 442, 166, 70, 232, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员登录信息', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7203, 'member', 'modMemberCentInfo', '会员积分信息', 'member', 'main', 'tpl_centinfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 300, 165, 70, 702, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员积分', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7204, 'member', 'modMemberNotice', '会员公告(列表)', 'member', 'main', 'tpl_member_notice.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'block', '#f5f5f5', '', '', '-1', 772, 47, 254, 230, 13, 0, 5, 'id', 'desc', 0, 25, '_self', 0, -1, -1, -1, 'fill', '会员公告', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(395, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'homepage', 'tpl_navpath.htm', '', '1000', '#4682b4', 0, 'solid', '', 'click', 'none', '#4682b4', '#fff', '#fff', '-1', 900, 29, 0, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '当前位置', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(397, 'member', 'modMemberHomeInfo', '会员信息', 'member', 'homepage', 'tpl_member_homeinfo.htm', '', 'B018', '#4682b4', 1, 'solid', '', 'click', 'block', '#4682b4', '#fff', '#fff', '-1', 512, 211, 34, 0, 5, 12, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '会员信息', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(398, 'comment', 'modMemberCommentList', '会员最新点评', 'member', 'homepage', 'tpl_membercommentlist.htm', '', 'B018', '#4682b4', 1, 'solid', '', 'click', 'block', '#4682b4', '#fff', '#fff', '{#RP#}comment/class/index.php?mid={#mid#}', 380, 170, 208, 520, 6, 12, 5, 'id', 'desc', 0, 20, '_self', 0, -1, 100, 100, 'fill', '我的点评', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(1014, 'news', 'modMemberNewsList', '会员最新文章', 'member', 'homepage', 'tpl_newslist_time.htm', '-1', 'B018', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '{#RP#}news/membernews.php?mid={#mid#}', 380, 167, 34, 520, 10, 10, 5, 'id', 'desc', 0, 20, '_self', 0, -1, 100, 100, 'fill', '我的文章', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7233, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'account', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '帐号设置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7234, 'member', 'modMemberAccount', '登录账号设置表单', 'member', 'account', 'tpl_member_account.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 200, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '登录帐号设置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7232, 'diy', 'modPic', '图片/FLASH', 'member', 'account', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(411, 'news', 'modMemberNewsSearchForm', '会员文章搜索', 'news', 'membernews', 'tpl_membernews_searchform.htm', '', 'D018', '#4682b4', 1, 'solid', '', 'click', 'block', '#4682b4', '#fff', '#fff', '-1', 205, 183, 0, 0, 3, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '文章搜索', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(1061, 'news', 'modMemberNewsQuery', '会员文章检索', 'news', 'membernews', 'tpl_newsquery_cap.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 145, 35, 220, 8, 0, 20, 'id', 'desc', 0, 30, '_self', 0, -1, 100, 100, 'fill', '会员文章', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(413, 'news', 'modNewsNavPath', '当前位置提示条', 'news', 'membernews', 'tpl_navpath.htm', '', '1000', '#4682b4', 0, 'solid', '', '', 'none', '#4682b4', '#fff', '#fff', '-1', 677, 28, 0, 221, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '当前位置', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', ''),
(7413, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'friends', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的好友', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7414, 'member', 'modMemberFriends', '我的好友', 'member', 'friends', 'tpl_member_friends.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 350, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的好友', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7412, 'diy', 'modPic', '图片/FLASH', 'member', 'friends', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7428, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'msn', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的短信', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7429, 'member', 'modMemberMsn', '我的站内短信', 'member', 'msn', 'tpl_member_msn.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 350, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的站内短信', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7482, 'diy', 'modPic', '图片/FLASH', 'comment', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7427, 'diy', 'modPic', '图片/FLASH', 'member', 'msn', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7398, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'membercent', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的积分', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7399, 'member', 'modMemberCentLog', '会员积分查询', 'member', 'membercent', 'tpl_member_centlog.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 534, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的积分', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7397, 'diy', 'modPic', '图片/FLASH', 'member', 'membercent', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(435, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'newsfabu', 'tpl_navpath.htm', '', '1000', '#4682b4', 0, 'solid', '', 'click', 'none', '#4682b4', '#fff', '#fff', '-1', 690, 29, 0, 210, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '当前位置', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(436, 'news', 'modNewsFabu', '文章发布表单', 'member', 'newsfabu', 'tpl_news_fabu.htm', '', '1000', '#4682b4', 0, 'solid', '', 'click', 'none', '#4682b4', '#fff', '#fff', '-1', 700, 478, 40, 200, 6, 10, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '文章发布', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(438, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'newsgl', 'tpl_navpath.htm', '', '1000', '#4682b4', 0, 'solid', '', 'click', 'none', '#4682b4', '#fff', '#fff', '-1', 700, 30, 0, 200, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '当前位置', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(440, 'news', 'modNewsGl', '文章管理', 'member', 'newsgl', 'tpl_news_gl.htm', '', '1000', '#4682b4', 0, 'solid', '', '', 'none', '#4682b4', '#fff', '#fff', '-1', 700, 148, 30, 200, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '文章管理', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', ''),
(441, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'newscat', 'tpl_navpath.htm', '', '1000', '#4682b4', 0, 'solid', '', 'click', 'none', '#4682b4', '#fff', '#fff', '-1', 700, 30, 0, 200, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '当前位置', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(443, 'news', 'modNewsMyCat', '文章分类管理', 'member', 'newscat', 'tpl_news_mycat.htm', '', '1000', '#4682b4', 0, 'solid', '', '', 'none', '#4682b4', '#fff', '#fff', '-1', 700, 175, 32, 200, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '文章分类管理', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', ''),
(7262, 'diy', 'modPic', '图片/FLASH', 'member', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7263, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'detail', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '个人资料', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(453, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'newsmodify', 'tpl_navpath.htm', '', '1000', '#4682b4', 0, 'solid', '', 'click', 'none', '#4682b4', '#fff', '#fff', '-1', 688, 29, 0, 212, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '当前位置', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(454, 'news', 'modNewsModify', '文章修改表单', 'member', 'newsmodify', 'tpl_news_modify.htm', '', '1000', '#eeeeee', 0, 'solid', '', 'click', 'none', '#4682b4', '#fff', '#fff', '-1', 696, 770, 36, 204, 6, 10, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 100, 'fill', '文章修改', '-1 ', '-1', '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3723, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'html_main', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6030, 'advs', 'modLogo', '网站标志', 'shop', 'main', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 162, 58, 48, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6791, 'shop', 'modShopContent', '商品详情', 'shop', 'detail', 'tpl_shop_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 514, 57, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(5687, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'index', 'index', 'tpl_page_menu_dolphin.htm', '-1', 'A795', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 122, 167, 1790, 849, 21, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 5, 0, 'hidden', 'content', 'block'),
(7039, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'brandquery', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7038, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'brandquery', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7037, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'brandquery', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3548, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'branddetail', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6792, 'shop', 'modShopComment', '商品点评', 'shop', 'detail', 'tpl_shop_comment.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', 'http://', 772, 350, 609, 230, 90, 0, 5, 'id', 'desc', 0, 20, '_self', 0, 120, -1, -1, 'fill', '商品评论', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6828, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'shoporderpay', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6816, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'startorder', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6029, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'main', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 786, 30, 89, 208, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6827, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'shoporderpay', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3743, 'shop', 'modShopList', '自选商品列表', 'index', 'index', 'tpl_shoplist_recomm.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '{#RP#}shop/class/', 593, 191, 356, 215, 8, 0, 4, 'id', 'desc', 1, 10, '_self', 0, 30, 130, 130, 'auto', '新品上市', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '', 3, 0, 'hidden', 'content', 'block'),
(7471, 'shop', 'modShopSearchForm', '商品搜索表单', 'comment', 'query', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(5679, 'shop', 'modShopList', '自选商品列表', 'index', 'index', 'tpl_shoplist_cat.htm', '-1', 'A785', '', 1, 'solid', '', 'click', 'none', '', '', '#fff', '{#RP#}shop/class/?3.html', 790, 280, 853, 212, 15, 0, 5, 'id', 'desc', 1, 12, '_self', 3, 30, 130, 130, 'auto', '乌龙茶', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '', 5, 0, 'hidden', 'content', 'block'),
(7470, 'diy', 'modPic', '图片/FLASH', 'comment', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7454, 'shop', 'modShopSearchForm', '商品搜索表单', 'comment', 'detail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3687, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'homepage', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(1439, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'newscat', 'tpl_qqmenu_2.htm', 'F', 'A595', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 185, 217, 0, 0, 5, 12, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(1438, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'newsmodify', 'tpl_qqmenu_2.htm', 'F', 'A595', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 185, 217, 0, 0, 5, 12, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(2014, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'newsgl', 'tpl_qqmenu_2.htm', 'F', 'A595', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 185, 217, 0, 0, 5, 12, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(1436, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'newsfabu', 'tpl_qqmenu_2.htm', 'F', 'A595', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 185, 217, 0, 0, 5, 12, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7393, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'membercent', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7423, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'msn', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7264, 'member', 'modMemberDetail', '个人资料修改表单', 'member', 'detail', 'tpl_member_detail.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 500, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '个人资料修改', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7228, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'account', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3516, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'homepage', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3540, 'shop', 'modShopSearchForm', '商品搜索表单', 'news', 'membernews', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block');
INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(7392, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'membercent', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 543, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7524, 'search', 'modSearch', '全站搜索结果', 'search', 'search', 'tpl_search.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 600, 70, 230, 90, 0, -1, 'id', 'desc', 0, 30, '_self', 0, -1, -1, -1, 'fill', '全站搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7132, 'shop', 'modShopSmallCart', '购物车提示信息', 'news', 'detail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7133, 'diy', 'modPic', '图片/FLASH', 'news', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7134, 'news', 'modNewsNavPath', '当前位置提示条', 'news', 'detail', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '新闻检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7131, 'menu', 'modBottomMenu', '底部菜单（一级）', 'news', 'detail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(3532, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'newscat', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7408, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'friends', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7383, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'comment', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的点评', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7384, 'member', 'modMemberComment', '我的点评', 'member', 'comment', 'tpl_member_comment.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 350, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的点评', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7382, 'diy', 'modPic', '图片/FLASH', 'member', 'comment', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7278, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'contact', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '联系信息', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7279, 'member', 'modMemberContact', '联系信息设置表单', 'member', 'contact', 'tpl_member_contact.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 390, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '联系信息设置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7277, 'diy', 'modPic', '图片/FLASH', 'member', 'contact', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(3526, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'newsfabu', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3527, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'newsgl', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3528, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'newsmodify', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7218, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'notice', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '公告详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7219, 'member', 'modMemberNoticeContent', '会员公告详情', 'member', 'notice', 'tpl_member_notice_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 300, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员公告', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7217, 'diy', 'modPic', '图片/FLASH', 'member', 'notice', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7273, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'contact', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7243, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'person', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3503, 'menu', 'modChannelMenu', '二级导航菜单', 'page', 'html_main', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7028, 'shop', 'modShopBrandAll', '分类品牌列表', 'shop', 'brand', 'tpl_shop_brandall_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 923, 57, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 100, 40, 'auto', '品牌查询', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6803, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'cart', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3499, 'menu', 'modChannelMenu', '二级导航菜单', 'shop', 'branddetail', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7036, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'brandquery', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6789, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'detail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6028, 'diy', 'modPic', '图片/FLASH', 'shop', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 74, 119, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7378, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'comment', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3491, 'menu', 'modChannelMenu', '二级导航菜单', 'news', 'membernews', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6815, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'startorder', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7198, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'main', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7242, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'person', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7258, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'detail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7272, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'contact', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7213, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'notice', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3477, 'menu', 'modChannelMenu', '二级导航菜单', 'member', 'newsfabu', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3478, 'menu', 'modChannelMenu', '二级导航菜单', 'member', 'newsgl', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3479, 'menu', 'modChannelMenu', '二级导航菜单', 'member', 'newsmodify', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7422, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'msn', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 543, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7391, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'membercent', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(3483, 'menu', 'modChannelMenu', '二级导航菜单', 'member', 'newscat', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7421, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'msn', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7118, 'shop', 'modShopSearchForm', '商品搜索表单', 'news', 'query', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7130, 'diy', 'modPic', '图片/FLASH', 'news', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7145, 'shop', 'modShopSmallCart', '购物车提示信息', 'news', 'main', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7146, 'diy', 'modPic', '图片/FLASH', 'news', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7147, 'news', 'modNewsNavPath', '当前位置提示条', 'news', 'main', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '新闻检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6931, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'html', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '公司简介', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7377, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'comment', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 543, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7407, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'friends', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 543, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7308, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'paylist', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '付款记录', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7309, 'member', 'modMemberPayList', '会员付款记录', 'member', 'paylist', 'tpl_member_paylist.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 300, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '付款记录', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7307, 'diy', 'modPic', '图片/FLASH', 'member', 'paylist', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6788, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'detail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(3641, 'shop', 'modShopBrandGoodsQuery', '品牌相关商品检索', 'shop', 'branddetail', 'tpl_shop_query_1.htm', '-1', 'A595', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 712, 1025, 41, 0, 7, 6, 9, 'id', 'desc', 0, 12, '_self', 0, 28, 120, 120, 'fill', '品牌商品', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '', 1, 0, 'visible', 'content', 'block'),
(7338, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'onlinepay', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '在线充值', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7323, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'buylist', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '消费记录', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7324, 'member', 'modMemberBuyList', '会员消费记录', 'member', 'buylist', 'tpl_member_buylist.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 300, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '消费记录', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7322, 'diy', 'modPic', '图片/FLASH', 'member', 'buylist', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(3467, 'menu', 'modChannelMenu', '二级导航菜单', 'member', 'homepage', 'tpl_channelmenu_1030.htm', 'K', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 71, 60, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3699, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'newsmodify', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3698, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'newsgl', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3697, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'newsfabu', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 27, 10, 448, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7212, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'notice', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 309, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7271, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'contact', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7287, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'shoporder', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7241, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'person', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7120, 'news', 'modNewsClass', '文章一级分类', 'news', 'query', 'tpl_newsclass_dolphin.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '栏目导航', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7117, 'menu', 'modTopMenu', '顶部菜单(一级)', 'news', 'query', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(3737, 'shop', 'modShopList', '自选商品列表', 'index', 'index', 'tpl_shoplist_cat.htm', '-1', 'A781', '', 0, 'solid', '', 'click', 'none', '', '', '', '{#RP#}shop/class/?1.html', 790, 280, 572, 212, 5, 0, 5, 'uptime', 'desc', 1, 12, '_self', 1, 30, 130, 130, 'auto', '绿 茶', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '', 2, 0, 'hidden', 'content', 'block'),
(7211, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'notice', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6814, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'startorder', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7286, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'shoporder', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(3574, 'advs', 'modLogo', '网站标志', 'member', 'newsfabu', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3575, 'advs', 'modLogo', '网站标志', 'member', 'newsgl', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3576, 'advs', 'modLogo', '网站标志', 'member', 'newsmodify', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7368, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'fav', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的收藏', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(3580, 'advs', 'modLogo', '网站标志', 'member', 'newscat', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6930, 'diy', 'modPic', '图片/FLASH', 'page', 'html', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7521, 'diy', 'modPic', '图片/FLASH', 'search', 'search', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7406, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'friends', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(3588, 'advs', 'modLogo', '网站标志', 'news', 'membernews', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6027, 'diy', 'modPic', '图片/FLASH', 'shop', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 339, 30, 0, 663, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100929/1285750799.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'top', 'block'),
(3596, 'advs', 'modLogo', '网站标志', 'shop', 'branddetail', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6844, 'shop', 'modShopOrderDetail', '订单详情', 'shop', 'shoporderdetail', 'tpl_shop_orderdetail.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 738, 57, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3600, 'advs', 'modLogo', '网站标志', 'page', 'html_main', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3564, 'advs', 'modLogo', '网站标志', 'member', 'homepage', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 180, 70, 5, 6, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7173, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'member', 'reg', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7200, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'main', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 309, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7197, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'main', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7257, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'detail', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7453, 'menu', 'modTopMenu', '顶部菜单(一级)', 'comment', 'detail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(3563, 'advs', 'modLogo', '网站标志', 'index', 'index', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7495, 'diy', 'modPic', '图片/FLASH', 'comment', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7256, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'detail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7227, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'account', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7457, 'comment', 'modCommentNavPath', '当前位置提示条', 'comment', 'detail', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '点评详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7452, 'shop', 'modShopTwoClass', '商品二级分类', 'comment', 'detail', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6825, 'advs', 'modLogo', '网站标志', 'shop', 'shoporderpay', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6826, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'shoporderpay', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7477, 'menu', 'modMainMenu', '一级导航菜单', 'comment', 'query', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3552, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'html_main', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(3788, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'html_main', 'tpl_bottommenu_1.htm', 'F', 'A604', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 900, 38, 0, 0, 17, 3, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7303, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'paylist', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7468, 'shop', 'modShopSmallCart', '购物车提示信息', 'comment', 'query', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 17, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7467, 'menu', 'modBottomMenu', '底部菜单（一级）', 'comment', 'query', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 19, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6842, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'shoporderdetail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7496, 'comment', 'modCommentList', '最新点评（列表）', 'comment', 'main', 'tpl_commentlist.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '{#RP#}comment/class/index.php', 751, 200, 70, 230, 90, 0, 5, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '最新点评', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block');
INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(7493, 'shop', 'modShopSmallCart', '购物车提示信息', 'comment', 'main', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7492, 'menu', 'modBottomMenu', '底部菜单（一级）', 'comment', 'main', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7491, 'diy', 'modPic', '图片/FLASH', 'comment', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7510, 'advs', 'modLinkNavPath', '当前位置提示条', 'advs', 'link', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '友情链接', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7552, 'job', 'modJobContent', '职位信息详情', 'job', 'detail', 'tpl_jobcontent.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 411, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '职位信息', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7553, 'job', 'modJobForm', '应聘申请表单', 'job', 'detail', 'tpl_job_form.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'block', '#f5f5f5', '', '', '-1', 772, 837, 400, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '应聘申请', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3811, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'newsmodify', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(3810, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'newsgl', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7376, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'comment', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7363, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'fav', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7369, 'member', 'modMemberFav', '我的收藏夹', 'member', 'fav', 'tpl_member_fav.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 350, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '我的收藏夹', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7367, 'diy', 'modPic', '图片/FLASH', 'member', 'fav', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7174, 'member', 'modMemberReg', '会员注册', 'member', 'reg', 'tpl_reg.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 390, 75, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员注册', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7172, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'reg', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7161, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'login', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员登录', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7507, 'diy', 'modPic', '图片/FLASH', 'advs', 'link', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7506, 'shop', 'modShopSmallCart', '购物车提示信息', 'advs', 'link', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7505, 'menu', 'modBottomMenu', '底部菜单（一级）', 'advs', 'link', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(3831, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'branddetail', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6802, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'cart', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6801, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'cart', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6800, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'cart', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6841, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'shoporderdetail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6840, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'shoporderdetail', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6839, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'shoporderdetail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7026, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'brand', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7025, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'brand', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7024, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'brand', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(3835, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'html_main', 'tpl_bottominfo.htm', '-1', 'A516', '', 0, 'solid', '', 'click', 'none', '', '', '#fff', '-1', 900, 175, 38, 0, 6, 15, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright ? 2009-2010&nbsp;All Rights Reserved. 家电商城网站管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;<br /><br /><img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198928725.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198943820.gif" border=0 />&nbsp;<img alt="" src="[ROOTPATH]index/pics/20091022/200910221256198954080.gif" border=0 /></div><!# footer end #>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7318, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'buylist', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7302, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'paylist', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7301, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'paylist', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7337, 'diy', 'modPic', '图片/FLASH', 'member', 'onlinepay', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7317, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'buylist', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7316, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'buylist', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7538, 'job', 'modJobQuery', '职位翻页检索', 'job', 'main', 'tpl_jobquery.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 350, 70, 230, 90, 0, 10, 'id', 'desc', 0, 30, '_self', 0, 100, -1, -1, 'fill', '职位查询', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7535, 'diy', 'modPic', '图片/FLASH', 'job', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7534, 'shop', 'modShopSmallCart', '购物车提示信息', 'job', 'main', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7549, 'diy', 'modPic', '图片/FLASH', 'job', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7548, 'shop', 'modShopSmallCart', '购物车提示信息', 'job', 'detail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7547, 'menu', 'modBottomMenu', '底部菜单（一级）', 'job', 'detail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7546, 'diy', 'modPic', '图片/FLASH', 'job', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7362, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'fav', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 543, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7361, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'fav', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7339, 'member', 'modMemberOnlinePay', '帐户在线充值', 'member', 'onlinepay', 'tpl_member_onlinepay.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 300, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '帐户在线充值', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7331, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'onlinepay', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7332, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'onlinepay', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7333, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'onlinepay', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7443, 'feedback', 'modFeedBackSmallForm', '全站留言表单', 'feedback', 'main', 'tpl_feedback_smallform.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 500, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '给我留言', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7478, 'diy', 'modPic', '图片/FLASH', 'comment', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7479, 'menu', 'modBottomMenu', '底部菜单（一级）', 'comment', 'query', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 20, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7480, 'shop', 'modShopSmallCart', '购物车提示信息', 'comment', 'query', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 18, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7438, 'menu', 'modBottomMenu', '底部菜单（一级）', 'feedback', 'main', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7433, 'menu', 'modTopMenu', '顶部菜单(一级)', 'feedback', 'main', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7434, 'menu', 'modMainMenu', '一级导航菜单', 'feedback', 'main', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7435, 'advs', 'modLogo', '网站标志', 'feedback', 'main', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7436, 'diy', 'modButtomInfo', '底部信息编辑区', 'feedback', 'main', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7437, 'diy', 'modPic', '图片/FLASH', 'feedback', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6859, 'page', 'modPageContent', '网页内容详情', 'page', 'html_aboutus', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 198, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6855, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'html_aboutus', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6857, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'html_aboutus', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(6854, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'html_aboutus', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6929, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'html', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6850, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'html_aboutus', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6851, 'advs', 'modLogo', '网站标志', 'page', 'html_aboutus', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6852, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'html_aboutus', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6849, 'diy', 'modPic', '图片/FLASH', 'page', 'html_aboutus', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6928, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'html', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7533, 'menu', 'modBottomMenu', '底部菜单（一级）', 'job', 'main', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7532, 'diy', 'modPic', '图片/FLASH', 'job', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6883, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'html_job', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '诚聘英才', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6880, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'html_job', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 8, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6881, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'html_job', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6882, 'diy', 'modPic', '图片/FLASH', 'page', 'html_job', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6879, 'diy', 'modPic', '图片/FLASH', 'page', 'html_job', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6871, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'html_contact', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '联系方式', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6870, 'diy', 'modPic', '图片/FLASH', 'page', 'html_contact', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6869, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'html_contact', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6867, 'diy', 'modPic', '图片/FLASH', 'page', 'html_contact', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6868, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'html_contact', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6866, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'html_contact', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6865, 'advs', 'modLogo', '网站标志', 'page', 'html_contact', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3922, 'diy', 'modPic', '图片/FLASH', 'index', 'index', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 221, 1750, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100909/1284018237.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 6, 0, 'hidden', 'content', 'block'),
(3912, 'menu', 'modMainMenu', '一级导航菜单', 'index', 'index', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(3911, 'diy', 'modPic', '图片/FLASH', 'index', 'index', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6743, 'advs', 'modAdvsLbXml', '轮播广告(FX)', 'index', 'index', 'tpl_advslb_xml.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 580, 290, 0, 213, 26, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'content', 'block'),
(6787, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'detail', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6786, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'detail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6785, 'advs', 'modLogo', '网站标志', 'shop', 'detail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6784, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'detail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6783, 'diy', 'modPic', '图片/FLASH', 'shop', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6777, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'query', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6761, 'diy', 'modPic', '图片/FLASH', 'shop', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6760, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'query', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6759, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'query', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6799, 'advs', 'modLogo', '网站标志', 'shop', 'cart', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6798, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'cart', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block');
INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(6797, 'diy', 'modPic', '图片/FLASH', 'shop', 'cart', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6796, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'cart', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6813, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'startorder', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6812, 'advs', 'modLogo', '网站标志', 'shop', 'startorder', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6811, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'startorder', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6810, 'diy', 'modPic', '图片/FLASH', 'shop', 'startorder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6809, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'startorder', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6823, 'diy', 'modPic', '图片/FLASH', 'shop', 'shoporderpay', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6824, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'shoporderpay', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6822, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'shoporderpay', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6821, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'shoporderpay', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6820, 'diy', 'modPic', '图片/FLASH', 'shop', 'shoporderpay', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6838, 'advs', 'modLogo', '网站标志', 'shop', 'shoporderdetail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6837, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'shoporderdetail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6836, 'diy', 'modPic', '图片/FLASH', 'shop', 'shoporderdetail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6835, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'shoporderdetail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6834, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'shoporderdetail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7023, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'brand', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7022, 'advs', 'modLogo', '网站标志', 'shop', 'brand', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7021, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'brand', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7020, 'diy', 'modPic', '图片/FLASH', 'shop', 'brand', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7019, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'brand', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7018, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'brand', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7035, 'advs', 'modLogo', '网站标志', 'shop', 'brandquery', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7034, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'brandquery', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7033, 'diy', 'modPic', '图片/FLASH', 'shop', 'brandquery', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7032, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'brandquery', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7031, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'brandquery', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6026, 'member', 'modMemberWelcome', '会员欢迎信息', 'shop', 'main', 'tpl_member_welcome.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 352, 24, 2, 311, 9, 5, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6025, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'main', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 141, 34, 125, 816, 13, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6036, 'shop', 'modShopGlobalQuery', '全站翻页商品列表', 'shop', 'main', 'tpl_shop_query_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 770, 1842, 55, 232, 90, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, 160, 160, 'auto', '商品列表', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '', 1, 0, 'visible', 'content', 'block'),
(6020, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'main', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 770, 40, 0, 232, 15, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6021, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'main', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 898, 0, 0, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6022, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'main', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6023, 'shop', 'modShopClassDrop', '下拉式商品分类', 'shop', 'main', 'tpl_shopclass_drop.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 658, 38, 123, 40, 10, 0, 6, 'id', 'desc', 1, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(5112, 'advs', 'modLogo', '网站标志', 'huanzeng', 'main', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 153, 59, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(5111, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'main', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 730, 31, 12, 260, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '积分换赠', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(5110, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 990, 137, 38, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100909/1284018237.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 6, 0, 'hidden', 'bottom', 'block'),
(5109, 'diy', 'modButtomInfo', '底部信息编辑区', 'huanzeng', 'main', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 990, 80, 87, 0, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 休闲食品网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(5108, 'shop', 'modShopTwoClassBrand', '分类品牌组合查询', 'huanzeng', 'main', 'tpl_shoptwoclass_brand_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 230, 899, 12, 0, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, 108, 50, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(5107, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 990, 96, 73, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(5103, 'menu', 'modBottomMenu', '底部菜单（一级）', 'huanzeng', 'main', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 990, 25, 39, 0, 4, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(5104, 'effect', 'modNowDate', '当前日期时间', 'huanzeng', 'main', 'tpl_nowdate.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 221, 30, 93, 26, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前日期时间', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(5105, 'shop', 'modShopSmallCart', '购物车提示信息', 'huanzeng', 'main', 'tpl_shop_smallcart_top.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 452, 22, 25, 536, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(5106, 'menu', 'modMainMenu', '一级导航菜单', 'huanzeng', 'main', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 729, 41, 84, 261, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '导航菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(5101, 'shop', 'modShopSearchForm', '商品搜索表单', 'huanzeng', 'main', 'tpl_shop_search_dolphin.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 726, 30, 134, 264, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7067, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7066, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'detail', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '赠品详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7065, 'shop', 'modShopSmallCart', '购物车提示信息', 'huanzeng', 'detail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7064, 'menu', 'modBottomMenu', '底部菜单（一级）', 'huanzeng', 'detail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7063, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7062, 'menu', 'modMainMenu', '一级导航菜单', 'huanzeng', 'detail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7061, 'advs', 'modLogo', '网站标志', 'huanzeng', 'detail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7060, 'diy', 'modButtomInfo', '底部信息编辑区', 'huanzeng', 'detail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7129, 'menu', 'modMainMenu', '一级导航菜单', 'news', 'detail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7466, 'diy', 'modPic', '图片/FLASH', 'comment', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6878, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'html_job', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7080, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'cart', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7079, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'cart', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '赠品兑换', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7078, 'shop', 'modShopSmallCart', '购物车提示信息', 'huanzeng', 'cart', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7077, 'menu', 'modBottomMenu', '底部菜单（一级）', 'huanzeng', 'cart', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7076, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'cart', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7075, 'menu', 'modMainMenu', '一级导航菜单', 'huanzeng', 'cart', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7074, 'advs', 'modLogo', '网站标志', 'huanzeng', 'cart', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7072, 'shop', 'modShopTwoClass', '商品二级分类', 'huanzeng', 'cart', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7073, 'diy', 'modButtomInfo', '底部信息编辑区', 'huanzeng', 'cart', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7093, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'startorder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7092, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'startorder', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '赠品兑换', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7091, 'shop', 'modShopSmallCart', '购物车提示信息', 'huanzeng', 'startorder', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7090, 'menu', 'modBottomMenu', '底部菜单（一级）', 'huanzeng', 'startorder', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7089, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'startorder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7087, 'advs', 'modLogo', '网站标志', 'huanzeng', 'startorder', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7088, 'menu', 'modMainMenu', '一级导航菜单', 'huanzeng', 'startorder', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7106, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'orderdetail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7105, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'orderdetail', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '订单详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7100, 'advs', 'modLogo', '网站标志', 'huanzeng', 'orderdetail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7101, 'menu', 'modMainMenu', '一级导航菜单', 'huanzeng', 'orderdetail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7102, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'orderdetail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7103, 'menu', 'modBottomMenu', '底部菜单（一级）', 'huanzeng', 'orderdetail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7104, 'shop', 'modShopSmallCart', '购物车提示信息', 'huanzeng', 'orderdetail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7055, 'huanzeng', 'modHzQuery', '赠品检索搜索', 'huanzeng', 'query', 'tpl_hz_query.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 370, 75, 230, 11, 0, 20, 'id', 'desc', 0, 30, '_self', 0, 30, 120, 120, 'fill', '赠品检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7052, 'shop', 'modShopSearchForm', '商品搜索表单', 'huanzeng', 'query', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7051, 'menu', 'modTopMenu', '顶部菜单(一级)', 'huanzeng', 'query', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7050, 'shop', 'modShopTwoClass', '商品二级分类', 'huanzeng', 'query', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7049, 'diy', 'modButtomInfo', '底部信息编辑区', 'huanzeng', 'query', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7048, 'advs', 'modLogo', '网站标志', 'huanzeng', 'query', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7047, 'menu', 'modMainMenu', '一级导航菜单', 'huanzeng', 'query', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7046, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7045, 'menu', 'modBottomMenu', '底部菜单（一级）', 'huanzeng', 'query', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7044, 'shop', 'modShopSmallCart', '购物车提示信息', 'huanzeng', 'query', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6927, 'diy', 'modPic', '图片/FLASH', 'page', 'html', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6919, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'html_feedback', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '请您留言', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6848, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'html_aboutus', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6847, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'html_aboutus', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6846, 'diy', 'modPic', '图片/FLASH', 'page', 'html_aboutus', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6858, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'html_aboutus', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '公司简介', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6745, 'shop', 'modShopList', '自选商品列表', 'index', 'index', 'tpl_shoplist_5.htm', '-1', 'A788', '', 1, 'solid', '', 'click', 'none', '', '', '#fff', '{#RP#}shop/class/', 202, 325, 1037, 0, 28, 0, 4, 'id', 'desc', 0, 12, '_self', 0, 30, 50, 50, 'auto', '热销商品', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '热销商品', '', '', 8, 0, 'hidden', 'content', 'block'),
(6747, 'menu', 'modBottomMenu', '底部菜单（一级）', 'index', 'index', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 10, 0, 29, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6741, 'shop', 'modShopSmallCart', '购物车提示信息', 'index', 'index', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 25, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6746, 'diy', 'modPic', '图片/FLASH', 'index', 'index', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 5, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(5675, 'news', 'modNewsList', '文章列表', 'index', 'index', 'tpl_newslist_1.htm', '-1', 'A788', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '{#RP#}news/class/?2.html', 202, 295, 1376, 0, 11, 0, 9, 'id', 'desc', 0, 13, '_self', 2, 50, -1, -1, 'fill', '茶叶知识', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '0', 1, 0, 'hidden', 'content', 'block'),
(5676, 'diy', 'modPlusBorder', '空白边框', 'index', 'index', 'tpl_plusborder.htm', '-1', 'A796', '#dddddd', 1, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '{#RP#}shop/class/', 580, 38, 302, 213, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '新品上市', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 2, 0, 'hidden', 'content', 'block'),
(5677, 'news', 'modNewsList', '文章列表', 'index', 'index', 'tpl_newslist_1.htm', '-1', 'A784', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '{#RP#}news/class/?1.html', 200, 292, 0, 802, 13, 0, 8, 'id', 'desc', 0, 13, '_self', 1, 50, -1, -1, 'fill', '最新动态', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '0', 2, 0, 'hidden', 'content', 'block'),
(5678, 'shop', 'modShopList', '自选商品列表', 'index', 'index', 'tpl_shoplist_diy.htm', '-1', 'A783', '', 0, 'solid', '', 'click', 'none', '', '', '', '{#RP#}shop/class/', 200, 242, 302, 802, 14, 0, 5, 'id', 'desc', 0, 12, '_self', 0, 30, 60, 60, 'auto', '新品上市', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '新品上市', '', '', 4, 0, 'hidden', 'content', 'block');
INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(5680, 'shop', 'modShopList', '自选商品列表', 'index', 'index', 'tpl_shoplist_cat.htm', '-1', 'A786', '', 1, 'solid', '', 'click', 'none', '', '', '#fff', '{#RP#}shop/class/?5.html', 790, 280, 1138, 212, 16, 0, 6, 'id', 'desc', 1, 12, '_self', 5, 30, 130, 130, 'auto', '普洱茶', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '', 6, 0, 'hidden', 'content', 'block'),
(5681, 'shop', 'modShopList', '自选商品列表', 'index', 'index', 'tpl_shoplist_recomm.htm', '-1', 'A789', '', 1, 'solid', '', 'click', 'none', '', '', '#fff', '{#RP#}shop/class/?129.html', 790, 280, 1423, 212, 17, 0, 5, 'id', 'desc', 1, 12, '_self', 129, 30, 130, 130, 'auto', '精品茶具', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', '', 7, 0, 'hidden', 'content', 'block'),
(5682, 'advs', 'modLinkPic', '图片友情链接', 'index', 'index', 'tpl_linkpic.htm', '-1', 'A790', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '{#RP#}advs/link/', 1002, 60, 1685, 0, 18, 0, 7, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '友情链接', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'content', 'block'),
(5684, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'index', 'index', 'tpl_page_menu_dolphin.htm', '-1', 'A792', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 105, 163, 1790, 426, 24, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 2, 0, 'hidden', 'content', 'block'),
(5685, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'index', 'index', 'tpl_page_menu_dolphin.htm', '-1', 'A793', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 106, 165, 1790, 567, 22, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '4', '', 3, 0, 'hidden', 'content', 'block'),
(5686, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'index', 'index', 'tpl_page_menu_dolphin.htm', '-1', 'A794', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 122, 165, 1790, 708, 23, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '5', '', 4, 0, 'hidden', 'content', 'block'),
(6864, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'html_contact', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6863, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'html_contact', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6862, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'html_contact', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(6861, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'html_contact', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6860, 'page', 'modPageContent', '网页内容详情', 'page', 'html_contact', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 132, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6877, 'advs', 'modLogo', '网站标志', 'page', 'html_job', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6876, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'html_job', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6875, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'html_job', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6874, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'html_job', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(6873, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'html_job', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6884, 'job', 'modJobQuery', '职位翻页检索', 'page', 'html_job', 'tpl_jobquery.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 242, 70, 230, 12, 0, 10, 'id', 'desc', 0, 30, '_self', 0, 100, -1, -1, 'fill', '职位查询', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7483, 'comment', 'modCommentQuery', '点评检索', 'comment', 'query', 'tpl_comment_query.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 397, 70, 230, 90, 0, 20, 'id', 'desc', 0, 30, '_self', 0, -1, -1, -1, 'fill', '点评检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7439, 'shop', 'modShopSmallCart', '购物车提示信息', 'feedback', 'main', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7440, 'diy', 'modPic', '图片/FLASH', 'feedback', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7432, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'feedback', 'main', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7442, 'feedback', 'modFeedBackNavPath', '当前位置提示条', 'feedback', 'main', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '请您留言', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7431, 'shop', 'modShopSearchForm', '商品搜索表单', 'feedback', 'main', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6923, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'html', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6924, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'html', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6925, 'advs', 'modLogo', '网站标志', 'page', 'html', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6926, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'html', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6922, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'html', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(6921, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'html', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6920, 'page', 'modPageContent', '网页内容详情', 'page', 'html', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 198, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6918, 'diy', 'modPic', '图片/FLASH', 'page', 'html_feedback', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6917, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'html_feedback', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6916, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'html_feedback', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6915, 'diy', 'modPic', '图片/FLASH', 'page', 'html_feedback', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6911, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'html_feedback', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6912, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'html_feedback', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6913, 'advs', 'modLogo', '网站标志', 'page', 'html_feedback', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6914, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'html_feedback', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6910, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'html_feedback', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(6909, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'html_feedback', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6908, 'page', 'modPageContent', '网页内容详情', 'page', 'html_feedback', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 0, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7542, 'menu', 'modTopMenu', '顶部菜单(一级)', 'job', 'detail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 119, 0, 6, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7543, 'menu', 'modMainMenu', '一级导航菜单', 'job', 'detail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7544, 'advs', 'modLogo', '网站标志', 'job', 'detail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7545, 'diy', 'modButtomInfo', '底部信息编辑区', 'job', 'detail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7541, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'job', 'detail', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7540, 'shop', 'modShopSearchForm', '商品搜索表单', 'job', 'detail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7551, 'job', 'modJobNavPath', '当前位置提示条', 'job', 'detail', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '职位详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7528, 'menu', 'modTopMenu', '顶部菜单(一级)', 'job', 'main', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 119, 0, 6, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7529, 'menu', 'modMainMenu', '一级导航菜单', 'job', 'main', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7530, 'advs', 'modLogo', '网站标志', 'job', 'main', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7531, 'diy', 'modButtomInfo', '底部信息编辑区', 'job', 'main', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7527, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'job', 'main', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7526, 'shop', 'modShopSearchForm', '商品搜索表单', 'job', 'main', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7537, 'job', 'modJobNavPath', '当前位置提示条', 'job', 'main', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '诚聘英才', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7504, 'diy', 'modPic', '图片/FLASH', 'advs', 'link', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7503, 'diy', 'modButtomInfo', '底部信息编辑区', 'advs', 'link', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7502, 'advs', 'modLogo', '网站标志', 'advs', 'link', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7501, 'menu', 'modMainMenu', '一级导航菜单', 'advs', 'link', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7520, 'shop', 'modShopSmallCart', '购物车提示信息', 'search', 'search', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7519, 'menu', 'modBottomMenu', '底部菜单（一级）', 'search', 'search', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7518, 'diy', 'modPic', '图片/FLASH', 'search', 'search', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7128, 'diy', 'modButtomInfo', '底部信息编辑区', 'news', 'detail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7127, 'advs', 'modLogo', '网站标志', 'news', 'detail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7114, 'advs', 'modLogo', '网站标志', 'news', 'query', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7115, 'diy', 'modButtomInfo', '底部信息编辑区', 'news', 'query', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7113, 'menu', 'modMainMenu', '一级导航菜单', 'news', 'query', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7112, 'diy', 'modPic', '图片/FLASH', 'news', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7144, 'menu', 'modBottomMenu', '底部菜单（一级）', 'news', 'main', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7143, 'diy', 'modPic', '图片/FLASH', 'news', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7142, 'menu', 'modMainMenu', '一级导航菜单', 'news', 'main', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7141, 'diy', 'modButtomInfo', '底部信息编辑区', 'news', 'main', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7140, 'advs', 'modLogo', '网站标志', 'news', 'main', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7465, 'menu', 'modMainMenu', '一级导航菜单', 'comment', 'query', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7464, 'advs', 'modLogo', '网站标志', 'comment', 'query', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 6, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7463, 'diy', 'modButtomInfo', '底部信息编辑区', 'comment', 'query', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 16, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7451, 'diy', 'modButtomInfo', '底部信息编辑区', 'comment', 'detail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7450, 'advs', 'modLogo', '网站标志', 'comment', 'detail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7449, 'menu', 'modMainMenu', '一级导航菜单', 'comment', 'detail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7448, 'diy', 'modPic', '图片/FLASH', 'comment', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7447, 'menu', 'modBottomMenu', '底部菜单（一级）', 'comment', 'detail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7446, 'shop', 'modShopSmallCart', '购物车提示信息', 'comment', 'detail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7490, 'menu', 'modMainMenu', '一级导航菜单', 'comment', 'main', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7489, 'advs', 'modLogo', '网站标志', 'comment', 'main', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7488, 'diy', 'modButtomInfo', '底部信息编辑区', 'comment', 'main', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7158, 'diy', 'modPic', '图片/FLASH', 'member', 'login', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7157, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'login', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7156, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'login', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7155, 'diy', 'modPic', '图片/FLASH', 'member', 'login', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7170, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'reg', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7169, 'advs', 'modLogo', '网站标志', 'member', 'reg', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7168, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'reg', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7167, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'reg', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7186, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'member', 'lostpass', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7187, 'member', 'modResetPass', '重设密码向导', 'member', 'lostpass', 'tpl_resetpass.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 664, 222, 75, 278, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '重设密码', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7185, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'lostpass', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7194, 'advs', 'modLogo', '网站标志', 'member', 'main', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block');
INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(7195, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'main', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7193, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'main', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7192, 'diy', 'modPic', '图片/FLASH', 'member', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7210, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'notice', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7209, 'advs', 'modLogo', '网站标志', 'member', 'notice', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7226, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'account', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7225, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'account', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7224, 'advs', 'modLogo', '网站标志', 'member', 'account', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7240, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'person', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7239, 'advs', 'modLogo', '网站标志', 'member', 'person', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7255, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'detail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7254, 'advs', 'modLogo', '网站标志', 'member', 'detail', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7270, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'contact', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7269, 'advs', 'modLogo', '网站标志', 'member', 'contact', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7285, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'shoporder', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7284, 'advs', 'modLogo', '网站标志', 'member', 'shoporder', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7300, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'paylist', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7299, 'advs', 'modLogo', '网站标志', 'member', 'paylist', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7315, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'buylist', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7314, 'advs', 'modLogo', '网站标志', 'member', 'buylist', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7330, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'onlinepay', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7329, 'advs', 'modLogo', '网站标志', 'member', 'onlinepay', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7360, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'fav', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7359, 'advs', 'modLogo', '网站标志', 'member', 'fav', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7375, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'comment', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7374, 'advs', 'modLogo', '网站标志', 'member', 'comment', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7390, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'membercent', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7389, 'advs', 'modLogo', '网站标志', 'member', 'membercent', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7405, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'friends', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7404, 'advs', 'modLogo', '网站标志', 'member', 'friends', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7420, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'msn', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7419, 'advs', 'modLogo', '网站标志', 'member', 'msn', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(5669, 'shop', 'modShopTwoClass', '商品二级分类', 'index', 'index', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(5683, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'index', 'index', 'tpl_page_menu_dolphin.htm', '-1', 'A791', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 112, 161, 1790, 286, 20, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '2', '', 1, 0, 'hidden', 'content', 'block'),
(6744, 'diy', 'modColorZone', '空白色块', 'index', 'index', 'tpl_colorzone.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '#cdcdcd', '-1', 1, 290, 0, 213, 27, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(5668, 'menu', 'modTopMenu', '顶部菜单(一级)', 'index', 'index', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(4855, 'shop', 'modShopSearchForm', '商品搜索表单', 'index', 'index', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7352, 'diy', 'modPic', '图片/FLASH', 'member', 'hzorder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7353, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'hzorder', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '订单查询', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7348, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'hzorder', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7347, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'hzorder', 'tpl_qqmenu_3.htm', 'A', 'A782', '#def', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 426, 0, 0, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7346, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'hzorder', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7354, 'huanzeng', 'modHzMemberOrder', '会员订单查询', 'member', 'hzorder', 'tpl_hz_order.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 500, 70, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '订单查询', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7344, 'advs', 'modLogo', '网站标志', 'member', 'hzorder', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7345, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'hzorder', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7015, 'page', 'modPageContent', '网页内容详情', 'page', 'guide', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 88, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7014, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'guide', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7013, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'guide', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 182, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '栏目导航', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '2', '', 1, 0, 'visible', 'content', 'block'),
(7012, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'guide', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7011, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'guide', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7010, 'advs', 'modLogo', '网站标志', 'page', 'guide', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7009, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'guide', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7008, 'diy', 'modPic', '图片/FLASH', 'page', 'guide', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7004, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'guide', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7005, 'diy', 'modPic', '图片/FLASH', 'page', 'guide', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7006, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'guide', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '新手指南', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7007, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'guide', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6989, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'send', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '栏目导航', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '4', '', 1, 0, 'visible', 'content', 'block'),
(6990, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'send', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6991, 'page', 'modPageContent', '网页内容详情', 'page', 'send', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 88, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6988, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'send', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6987, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'send', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6986, 'advs', 'modLogo', '网站标志', 'page', 'send', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6985, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'send', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6984, 'diy', 'modPic', '图片/FLASH', 'page', 'send', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6983, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'send', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6982, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'send', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '关于配送', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6981, 'diy', 'modPic', '图片/FLASH', 'page', 'send', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6980, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'send', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7003, 'page', 'modPageContent', '网页内容详情', 'page', 'pay', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 132, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7002, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'pay', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7001, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'pay', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 182, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '栏目导航', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'visible', 'content', 'block'),
(7000, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'pay', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6999, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'pay', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6998, 'advs', 'modLogo', '网站标志', 'page', 'pay', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6997, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'pay', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6996, 'diy', 'modPic', '图片/FLASH', 'page', 'pay', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6992, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'pay', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6993, 'diy', 'modPic', '图片/FLASH', 'page', 'pay', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6994, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'pay', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '关于支付', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6995, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'pay', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6976, 'menu', 'modTopMenu', '顶部菜单(一级)', 'page', 'service', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6977, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'page', 'service', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '栏目导航', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '5', '', 1, 0, 'visible', 'content', 'block'),
(6978, 'shop', 'modShopSearchForm', '商品搜索表单', 'page', 'service', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6979, 'page', 'modPageContent', '网页内容详情', 'page', 'service', 'tpl_page_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 685, 330, 75, 255, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6974, 'advs', 'modLogo', '网站标志', 'page', 'service', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6975, 'menu', 'modMainMenu', '一级导航菜单', 'page', 'service', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block');
INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(6973, 'diy', 'modButtomInfo', '底部信息编辑区', 'page', 'service', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6971, 'menu', 'modBottomMenu', '底部菜单（一级）', 'page', 'service', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6972, 'diy', 'modPic', '图片/FLASH', 'page', 'service', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6969, 'diy', 'modPic', '图片/FLASH', 'page', 'service', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6970, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'service', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '售后服务', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6968, 'shop', 'modShopSmallCart', '购物车提示信息', 'page', 'service', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7500, 'menu', 'modTopMenu', '顶部菜单(一级)', 'advs', 'link', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 119, 0, 6, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7499, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'advs', 'link', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7498, 'shop', 'modShopSearchForm', '商品搜索表单', 'advs', 'link', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7509, 'advs', 'modLinkPic', '图片友情链接', 'advs', 'link', 'tpl_linkpic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '{#RP#}advs/link/', 772, 100, 70, 230, 90, 0, 6, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '友情链接', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7111, 'menu', 'modBottomMenu', '底部菜单（一级）', 'news', 'query', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7110, 'shop', 'modShopSmallCart', '购物车提示信息', 'news', 'query', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7109, 'diy', 'modPic', '图片/FLASH', 'news', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7121, 'news', 'modNewsNavPath', '当前位置提示条', 'news', 'query', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '新闻检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7126, 'menu', 'modTopMenu', '顶部菜单(一级)', 'news', 'detail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7125, 'news', 'modNewsClass', '文章一级分类', 'news', 'detail', 'tpl_newsclass_dolphin.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '栏目导航', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7124, 'shop', 'modShopSearchForm', '商品搜索表单', 'news', 'detail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7135, 'news', 'modNewsContent', '文章正文', 'news', 'detail', 'tpl_newscontent.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 730, 355, 70, 254, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7139, 'menu', 'modTopMenu', '顶部菜单(一级)', 'news', 'main', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7138, 'news', 'modNewsClass', '文章一级分类', 'news', 'main', 'tpl_newsclass_dolphin.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '栏目导航', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7137, 'shop', 'modShopSearchForm', '商品搜索表单', 'news', 'main', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7136, 'news', 'modNewsQuery', '文章翻页检索', 'news', 'main', 'tpl_newsquery_diy.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 730, 450, 70, 254, 10, 0, 10, 'id', 'desc', 0, 40, '_self', 0, -1, -1, -1, 'fill', '文章检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6819, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'shoporderpay', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6808, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'startorder', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6806, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'startorder', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6807, 'diy', 'modPic', '图片/FLASH', 'shop', 'startorder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6756, 'diy', 'modPic', '图片/FLASH', 'shop', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6755, 'menu', 'modMainMenu', '一级导航菜单', 'shop', 'query', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6781, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'detail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6782, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'detail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 10, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6779, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'detail', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6780, 'diy', 'modPic', '图片/FLASH', 'shop', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6753, 'advs', 'modLogo', '网站标志', 'shop', 'query', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6795, 'shop', 'modShopSmallCart', '购物车提示信息', 'shop', 'cart', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 9, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6793, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'cart', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(6794, 'diy', 'modPic', '图片/FLASH', 'shop', 'cart', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6034, 'menu', 'modBottomMenu', '底部菜单（一级）', 'shop', 'main', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 37, 0, 14, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(6035, 'diy', 'modPic', '图片/FLASH', 'shop', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101013/1286935380.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 8, 0, 'hidden', 'bottom', 'block'),
(6748, 'diy', 'modButtomInfo', '底部信息编辑区', 'shop', 'query', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(6833, 'diy', 'modPic', '图片/FLASH', 'shop', 'shoporderdetail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(6832, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'shoporderdetail', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7456, 'comment', 'modCommentContent', '点评详情', 'comment', 'detail', 'tpl_comment_content.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 666, 70, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '点评详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7445, 'diy', 'modPic', '图片/FLASH', 'comment', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7487, 'shop', 'modShopTwoClass', '商品二级分类', 'comment', 'main', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7486, 'comment', 'modCommentNavPath', '当前位置提示条', 'comment', 'main', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '点评详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7485, 'menu', 'modTopMenu', '顶部菜单(一级)', 'comment', 'main', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7484, 'shop', 'modShopSearchForm', '商品搜索表单', 'comment', 'main', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7462, 'shop', 'modShopTwoClass', '商品二级分类', 'comment', 'query', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 14, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7461, 'comment', 'modCommentNavPath', '当前位置提示条', 'comment', 'query', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 22, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '点评检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7460, 'menu', 'modTopMenu', '顶部菜单(一级)', 'comment', 'query', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7459, 'shop', 'modShopSearchForm', '商品搜索表单', 'comment', 'query', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 10, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7017, 'diy', 'modPic', '图片/FLASH', 'shop', 'brand', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7016, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'brand', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7030, 'diy', 'modPic', '图片/FLASH', 'shop', 'brandquery', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7029, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'brandquery', 'tpl_navpath.htm', '-1', 'A787', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 34, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '当前位置', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7054, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'query', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '赠品检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7043, 'diy', 'modPic', '图片/FLASH', 'huanzeng', 'query', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7059, 'shop', 'modShopTwoClass', '商品二级分类', 'huanzeng', 'detail', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7058, 'menu', 'modTopMenu', '顶部菜单(一级)', 'huanzeng', 'detail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7057, 'shop', 'modShopSearchForm', '商品搜索表单', 'huanzeng', 'detail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7068, 'huanzeng', 'modHzDetail', '赠品详情', 'huanzeng', 'detail', 'tpl_hz_detail.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 433, 75, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '赠品详情', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7071, 'menu', 'modTopMenu', '顶部菜单(一级)', 'huanzeng', 'cart', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7070, 'shop', 'modShopSearchForm', '商品搜索表单', 'huanzeng', 'cart', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7081, 'huanzeng', 'modHzCart', '购物车', 'huanzeng', 'cart', 'tpl_hz_cart.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 217, 75, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7086, 'diy', 'modButtomInfo', '底部信息编辑区', 'huanzeng', 'startorder', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7085, 'shop', 'modShopTwoClass', '商品二级分类', 'huanzeng', 'startorder', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7084, 'menu', 'modTopMenu', '顶部菜单(一级)', 'huanzeng', 'startorder', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7083, 'shop', 'modShopSearchForm', '商品搜索表单', 'huanzeng', 'startorder', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7094, 'huanzeng', 'modHzStartOrder', '赠品兑换', 'huanzeng', 'startorder', 'tpl_hz_startorder.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 587, 75, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '赠品兑换', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7099, 'diy', 'modButtomInfo', '底部信息编辑区', 'huanzeng', 'orderdetail', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7098, 'shop', 'modShopTwoClass', '商品二级分类', 'huanzeng', 'orderdetail', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7097, 'menu', 'modTopMenu', '顶部菜单(一级)', 'huanzeng', 'orderdetail', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7096, 'shop', 'modShopSearchForm', '商品搜索表单', 'huanzeng', 'orderdetail', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7107, 'huanzeng', 'modHzOrderDetail', '订单详情', 'huanzeng', 'orderdetail', 'tpl_hz_orderdetail.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 508, 57, 230, 12, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7517, 'diy', 'modButtomInfo', '底部信息编辑区', 'search', 'search', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7513, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'search', 'search', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7514, 'menu', 'modTopMenu', '顶部菜单(一级)', 'search', 'search', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 119, 0, 6, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7515, 'menu', 'modMainMenu', '一级导航菜单', 'search', 'search', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7516, 'advs', 'modLogo', '网站标志', 'search', 'search', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7512, 'shop', 'modShopSearchForm', '商品搜索表单', 'search', 'search', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7523, 'search', 'modSearchNavPath', '当前位置提示条', 'search', 'search', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '全站搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7191, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'main', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7190, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'main', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7189, 'diy', 'modPic', '图片/FLASH', 'member', 'main', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7201, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'main', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 14, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员中心', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7208, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'notice', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7207, 'diy', 'modPic', '图片/FLASH', 'member', 'notice', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7206, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'notice', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7205, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'notice', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7223, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'account', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7222, 'diy', 'modPic', '图片/FLASH', 'member', 'account', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7221, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'account', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7220, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'account', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7238, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'person', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7237, 'diy', 'modPic', '图片/FLASH', 'member', 'person', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7236, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'person', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7235, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'person', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7253, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'detail', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7252, 'diy', 'modPic', '图片/FLASH', 'member', 'detail', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7251, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'detail', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7250, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'detail', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7268, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'contact', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7267, 'diy', 'modPic', '图片/FLASH', 'member', 'contact', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7266, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'contact', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7265, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'contact', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7283, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'shoporder', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7282, 'diy', 'modPic', '图片/FLASH', 'member', 'shoporder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block');
INSERT INTO `dev_base_plus` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `modno`, `setglobal`, `overflow`, `bodyzone`, `display`) VALUES
(7281, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'shoporder', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7280, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'shoporder', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7298, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'paylist', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7297, 'diy', 'modPic', '图片/FLASH', 'member', 'paylist', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7296, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'paylist', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7295, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'paylist', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7313, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'buylist', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7312, 'diy', 'modPic', '图片/FLASH', 'member', 'buylist', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7311, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'buylist', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7310, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'buylist', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7328, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'onlinepay', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7327, 'diy', 'modPic', '图片/FLASH', 'member', 'onlinepay', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7326, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'onlinepay', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7325, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'onlinepay', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7343, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'hzorder', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7342, 'diy', 'modPic', '图片/FLASH', 'member', 'hzorder', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7341, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'hzorder', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7340, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'hzorder', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7358, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'fav', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7357, 'diy', 'modPic', '图片/FLASH', 'member', 'fav', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7356, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'fav', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7355, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'fav', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7373, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'comment', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7372, 'diy', 'modPic', '图片/FLASH', 'member', 'comment', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7371, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'comment', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7370, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'comment', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7388, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'membercent', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7387, 'diy', 'modPic', '图片/FLASH', 'member', 'membercent', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7386, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'membercent', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7385, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'membercent', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7403, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'friends', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7402, 'diy', 'modPic', '图片/FLASH', 'member', 'friends', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7401, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'friends', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7400, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'friends', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7418, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'msn', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7417, 'diy', 'modPic', '图片/FLASH', 'member', 'msn', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7416, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'msn', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7415, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'msn', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7154, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'login', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7183, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'lostpass', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7166, 'diy', 'modPic', '图片/FLASH', 'member', 'reg', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7152, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'login', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7153, 'advs', 'modLogo', '网站标志', 'member', 'login', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7151, 'menu', 'modTopMenu', '顶部菜单(一级)', 'member', 'login', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(7160, 'member', 'modMemberLogin', '会员登录表单(大)', 'member', 'login', 'tpl_member_login.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 300, 75, 230, 90, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员登录', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(7149, 'shop', 'modShopSearchForm', '商品搜索表单', 'member', 'login', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7150, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'member', 'login', 'tpl_page_menu_1.htm', '-1', 'A782', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 202, 215, 0, 0, 10, 0, 10, 'id', 'desc', 0, 12, '_self', 0, -1, -1, -1, 'fill', '关于我们', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'visible', 'content', 'block'),
(7165, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'reg', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7164, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'reg', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7163, 'diy', 'modPic', '图片/FLASH', 'member', 'reg', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7162, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'reg', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员注册', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7175, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'lostpass', 'tpl_navpath.htm', '-1', 'A797', '#dddddd', 0, 'solid', '', 'click', 'none', '#cccccc', '#fff', '#fff', '-1', 772, 38, 0, 230, 11, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '会员登录', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'content', 'block'),
(7176, 'diy', 'modPic', '图片/FLASH', 'member', 'lostpass', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 30, 0, 1, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20101105/1288934164.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 7, 0, 'hidden', 'bottom', 'block'),
(7177, 'shop', 'modShopSmallCart', '购物车提示信息', 'member', 'lostpass', 'tpl_shop_smallcart_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 213, 40, 123, 789, 8, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '购物车', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7178, 'menu', 'modBottomMenu', '底部菜单（一级）', 'member', 'lostpass', 'tpl_bottommenu_1.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 28, 35, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注栏目', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '', 1, 0, 'hidden', 'bottom', 'block'),
(7179, 'diy', 'modPic', '图片/FLASH', 'member', 'lostpass', 'tpl_pic.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 37, 117, 0, 2, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', 'diy/pics/20100908/1283922608.jpg', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(7180, 'diy', 'modButtomInfo', '底部信息编辑区', 'member', 'lostpass', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 130, 79, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '脚注信息', '<div style="LINE-HEIGHT: 22px">Copyright (C) 2009-2010&nbsp;All Rights Reserved. 茶叶网上专卖店管理系统 版权所有&nbsp;&nbsp;&nbsp;<a class=icp href="http://www.miibeian.gov.cn/" target=_blank><font color=#648675>沪ICP备01234567号</font></a><br />服务时间：<span class=red><strong><font color=#ff0000>周一至周日 08:30 — 20:00</font></strong></span>&nbsp; 全国订购及服务热线：<span class=red><strong><font color=#ff0000>021-98765432</font></strong></span>&nbsp; <br />联系地址：上海市某某路某大厦20楼B座2008室&nbsp;&nbsp;&nbsp;邮政编码：210000&nbsp;&nbsp;</div>', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'bottom', 'block'),
(7181, 'menu', 'modMainMenu', '一级导航菜单', 'member', 'lostpass', 'tpl_mainmenu_dolphin.htm', 'A', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 1002, 36, 80, 0, 4, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(7182, 'advs', 'modLogo', '网站标志', 'member', 'lostpass', 'tpl_logo.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 252, 69, 0, 0, 3, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '网站标志', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '', 1, 0, 'hidden', 'top', 'block'),
(6772, 'shop', 'modShopTwoClass', '商品二级分类', 'shop', 'query', 'tpl_shoptwoclass_diy.htm', '-1', 'A782', '#dddddd', 1, 'solid', '', 'click', 'block', '#cccccc', '#fff', '#fff', '-1', 202, 1023, 0, 0, 7, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品分类', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block'),
(6775, 'menu', 'modTopMenu', '顶部菜单(一级)', 'shop', 'query', 'tpl_topmenu_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 695, 30, 120, 0, 9, 0, 10, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '顶部菜单', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '57', '', 1, 0, 'hidden', 'top', 'block'),
(6776, 'shop', 'modShopSearchForm', '商品搜索表单', 'shop', 'query', 'tpl_shop_searchform_1.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 526, 47, 29, 476, 5, 0, -1, 'id', 'desc', 0, -1, '_self', 0, -1, -1, -1, 'fill', '商品搜索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'hidden', 'top', 'block'),
(6778, 'shop', 'modShopQuery', '商品检索搜索', 'shop', 'query', 'tpl_shop_query_diy.htm', '-1', '1000', '', 0, 'solid', '', 'click', 'none', '', '', '', '-1', 772, 1155, 57, 230, 12, 0, 10, 'id', 'desc', 0, 30, '_self', 0, 30, 100, 100, 'fill', '商品检索', '-1 ', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '', 1, 0, 'visible', 'content', 'block');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_plusdefault`
--

CREATE TABLE IF NOT EXISTS `dev_base_plusdefault` (
  `id` int(12) NOT NULL auto_increment,
  `coltype` varchar(30) NOT NULL,
  `pluslable` varchar(100) default '0',
  `plusname` char(100) NOT NULL default '',
  `plustype` varchar(50) default '0',
  `pluslocat` varchar(50) default '0',
  `tempname` varchar(100) NOT NULL default '0',
  `tempcolor` varchar(2) NOT NULL default '-1',
  `showborder` char(20) NOT NULL default '1000',
  `bordercolor` varchar(7) NOT NULL default '#4682b4',
  `borderwidth` int(2) NOT NULL default '1',
  `borderstyle` varchar(10) NOT NULL default 'solid',
  `borderlable` varchar(150) NOT NULL,
  `borderroll` varchar(10) NOT NULL,
  `showbar` varchar(10) NOT NULL default 'none',
  `barbg` varchar(10) NOT NULL default '#4682b4',
  `barcolor` varchar(10) NOT NULL default '#fff',
  `backgroundcolor` varchar(7) NOT NULL default '#fff',
  `morelink` varchar(100) NOT NULL default 'http://',
  `width` int(5) NOT NULL default '100',
  `height` int(5) NOT NULL default '100',
  `top` int(5) NOT NULL default '0',
  `left` int(5) NOT NULL default '0',
  `zindex` int(2) NOT NULL default '99',
  `padding` int(11) NOT NULL default '0',
  `shownums` int(10) NOT NULL default '-1',
  `ord` varchar(100) NOT NULL default '-1',
  `sc` varchar(10) NOT NULL default '-1',
  `showtj` int(5) NOT NULL default '-1',
  `cutword` int(20) NOT NULL default '-1',
  `target` varchar(30) NOT NULL default '-1',
  `catid` int(10) NOT NULL default '-1',
  `cutbody` int(5) NOT NULL default '-1',
  `picw` int(3) NOT NULL default '-1',
  `pich` int(3) NOT NULL default '-1',
  `fittype` varchar(10) NOT NULL default '-1',
  `title` varchar(100) NOT NULL default '',
  `body` text,
  `pic` varchar(255) NOT NULL default '-1',
  `piclink` char(255) NOT NULL default '-1',
  `attach` varchar(255) NOT NULL default '-1',
  `movi` varchar(255) NOT NULL default '-1',
  `sourceurl` varchar(20) NOT NULL default '-1',
  `word` varchar(255) NOT NULL default '-1',
  `word1` varchar(255) NOT NULL default '-1',
  `word2` varchar(255) NOT NULL default '-1',
  `word3` char(255) NOT NULL default '-1',
  `word4` char(255) NOT NULL default '-1',
  `text` text NOT NULL,
  `text1` text NOT NULL,
  `code` text NOT NULL,
  `link` varchar(255) NOT NULL default '-1',
  `link1` char(255) NOT NULL default '-1',
  `link2` char(255) NOT NULL default '-1',
  `link3` char(255) NOT NULL default '-1',
  `link4` char(255) NOT NULL default '-1',
  `tags` varchar(30) NOT NULL default '-1',
  `groupid` varchar(20) NOT NULL default '-1',
  `projid` varchar(20) NOT NULL default '-1',
  `moveable` int(1) NOT NULL default '1',
  `classtbl` varchar(30) NOT NULL default '',
  `grouptbl` varchar(50) NOT NULL,
  `projtbl` varchar(50) NOT NULL,
  `setglobal` int(5) NOT NULL default '-1',
  `overflow` varchar(20) NOT NULL default 'hidden',
  `bodyzone` varchar(10) NOT NULL default 'content',
  `display` varchar(10) NOT NULL default 'block',
  `ifmul` int(1) NOT NULL default '1',
  `ifrefresh` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=344 ;

--
-- 转存表中的数据 `dev_base_plusdefault`
--

INSERT INTO `dev_base_plusdefault` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `moveable`, `classtbl`, `grouptbl`, `projtbl`, `setglobal`, `overflow`, `bodyzone`, `display`, `ifmul`, `ifrefresh`) VALUES
(17, 'advs', 'modLogo', '网站标志', 'all', 'all', 'tpl_logo.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 150, 60, 20, 20, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '网站标志', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_logo', '', 1, 'hidden', 'top', 'block', 0, 0),
(25, 'advs', 'modLinkPic', '图片友情链接', 'all', 'all', 'tpl_linkpic.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}advs/link/', 650, 100, 0, 0, 90, 10, 6, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '友情链接', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_linkgroup', '', -1, 'hidden', 'content', 'block', 1, 0),
(26, 'advs', 'modLinkText', '文字友情链接', 'all', 'all', 'tpl_link.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}advs/link/', 650, 100, 0, 0, 90, 10, 12, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '友情链接', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_linkgroup', '', -1, 'hidden', 'content', 'block', 1, 0),
(31, 'advs', 'modAdvsLb', '图片轮播广告', 'all', 'all', 'tpl_advslb.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 320, 280, 200, 200, 90, 0, 5, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '轮播广告', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_lbgroup', '', -1, 'hidden', 'content', 'block', 0, 1),
(32, 'advs', 'modAdvsPic', '页内图片广告', 'all', 'all', 'tpl_advspic.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 565, 95, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '广告位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_pic', '', -1, 'hidden', 'content', 'block', 1, 0),
(199, 'effect', 'modHeadBgSource', '头部效果图素材', 'all', 'all', 'tpl_headbg.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 150, 0, 0, -1, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '头部效果图', '-1', '-1', '-1', '-1', '-1', 'head/1.png', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'top', 'block', 0, 0),
(34, 'advs', 'modAdvsText', '文字广告（静态）', 'all', 'all', 'tpl_advstext.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 200, 30, 200, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '广告位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_text', '', -1, 'hidden', 'content', 'block', 1, 0),
(35, 'advs', 'modAdvsMovi', 'FLASH视频广告', 'all', 'all', 'tpl_movi.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 300, 300, 200, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '视频播放', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_movi', '', -1, 'hidden', 'content', 'block', 1, 0),
(48, 'advs', 'modAdvsFloat', '图片广告（飘动）', 'all', 'all', 'tpl_advs_float.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 100, 100, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '广告位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_pic', '', -1, 'hidden', 'bodyex', 'block', 0, 1),
(49, 'advs', 'modAdvsDuilian', '对联广告', 'all', 'all', 'tpl_advs_duilian.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 100, 220, 130, 6, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '广告位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_duilian', '', -1, 'hidden', 'bodyex', 'block', 0, 1),
(50, 'advs', 'modAdvsZimu', '文字广告（字幕）', 'all', 'all', 'tpl_advszimu.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 200, 30, 200, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '广告位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_text', '', -1, 'hidden', 'content', 'block', 1, 0),
(51, 'advs', 'modAdvsFixed', '图片广告（悬浮）', 'all', 'all', 'tpl_advs_fixed.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 100, 100, 350, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '广告位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '2', '-1', 1, '', '_advs_pic', '', -1, 'hidden', 'bodyex', 'block', 0, 0),
(61, 'advs', 'modLinkNavPath', '当前位置提示条', 'advs', 'link', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(89, 'advs', 'modAdvsCode', '广告代码', 'all', 'all', 'tpl_advscode.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 250, 250, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '广告位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '请在此插入广告代码', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 1),
(18, 'comment', 'modCommentSearchForm', '点评搜索表单', 'comment', 'all', 'tpl_comment_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 200, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '点评搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(21, 'comment', 'modCommentList', '最新点评（列表）', 'all', 'all', 'tpl_commentlist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}comment/class/index.php', 300, 200, 0, 0, 90, 12, 5, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '最新点评', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(22, 'comment', 'modCommentQuery', '点评检索', 'comment', 'query', 'tpl_comment_query.htm', '-1', '1000', '#def', 1, 'solid', '', '', 'none', '#def', '#fff', '#fff', '-1', 750, 300, 35, 0, 90, 0, 20, '-1', '-1', -1, 30, '_self', -1, -1, -1, -1, '-1', '点评检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(23, 'comment', 'modCommentClass', '点评分类', 'all', 'all', 'tpl_comment_class.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 200, 200, 90, 12, -1, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '点评分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(24, 'comment', 'modCommentContent', '点评详情', 'comment', 'detail', 'tpl_comment_content.htm', '-1', '1000', '#def', 0, 'solid', '', '', 'none', '#def', '#fff', '#fff', '-1', 750, 500, 35, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '点评详情', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(56, 'comment', 'modCommentNavPath', '当前位置提示条', 'comment', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(151, 'comment', 'modMemberCommentList', '会员最新点评', 'member', 'homepage', 'tpl_membercommentlist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}comment/class/index.php?mid={#mid#}', 380, 170, 0, 0, 90, 12, 5, '-1', '-1', 0, 20, '_self', -1, -1, -1, -1, '-1', '我的点评', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(164, 'comment', 'modCommentHot30', '本月点评点击榜', 'all', 'all', 'tpl_comment_hotlist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}comment/class/index.php?myord=cl', 300, 200, 0, 0, 90, 12, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '本月点击榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(165, 'comment', 'modCommentHot7', '本周点评点击榜', 'all', 'all', 'tpl_comment_hotlist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}comment/class/index.php?myord=cl', 300, 200, 0, 0, 90, 12, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '本周点击榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(166, 'comment', 'modCommentRq30', '本月点评人气榜', 'all', 'all', 'tpl_comment_hotlist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}comment/class/index.php?myord=backcount', 300, 200, 0, 0, 90, 12, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '本月人气榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(167, 'comment', 'modCommentRq7', '本周点评人气榜', 'all', 'all', 'tpl_comment_hotlist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}comment/class/index.php?myord=backcount', 300, 200, 0, 0, 90, 12, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '本周人气榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_comment_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(9, 'diy', 'modEdit', 'HTML编辑区', 'all', 'all', 'tpl_edit.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '自定内容', '请输入内容', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(27, 'diy', 'modButtomInfo', '底部信息编辑区', 'all', 'all', 'tpl_bottominfo.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 900, 120, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '脚注信息', '请输入内容', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', 1, 'hidden', 'bottom', 'block', 0, 0),
(47, 'diy', 'modText', '多行文字', 'all', 'all', 'tpl_text.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '多行文字', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '请输入自定义文字', '-1', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(53, 'diy', 'modPic', '图片/FLASH', 'all', 'all', 'tpl_pic.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 300, 200, 0, 0, 90, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '图片', '-1', '', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(74, 'diy', 'modWords', '单行文字', 'all', 'all', 'tpl_words.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 50, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '单行文字', '-1', '-1', '-1', '-1', '-1', '-1', '请输入文字', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(75, 'diy', 'modPicWordText', '图片+标题+介绍', 'all', 'all', 'tpl_picwordtext.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', 'http://', 250, 90, 30, 300, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, 100, '-1', '自定图文', '-1', '', 'http://', '-1', '-1', '-1', '请输入标题文字', '-1', '-1', '-1', '-1', '请输入介绍文字', '-1', '-1', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(76, 'diy', 'modPicWord', '图片+标题', 'all', 'all', 'tpl_picword.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', 'http://', 200, 250, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '自定图文', '-1', '', 'http://', '-1', '-1', '-1', '请输入标题', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(184, 'news', 'modNewsPicMemo', '文章图片+标题+摘要', 'all', 'all', 'tpl_newspicmemo.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 300, 320, 0, 0, 99, 5, 3, 'id|dtime|uptime|prop1|prop2|cl|xuhao', 'desc', 0, 12, '_self', 0, 35, 80, 80, 'fill', '图片新闻', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '0', 1, '_news_cat', '', '_news_proj', -1, 'hidden', 'content', 'block', 1, 0),
(86, 'diy', 'modPlusBorder', '空白边框', 'all', 'all', 'tpl_plusborder.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', 'http://', 300, 300, 0, 0, 1, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '空白边框', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(87, 'diy', 'modColorZone', '空白色块', 'all', 'all', 'tpl_colorzone.htm', '-1', '1000', '#e10000', 1, 'solid', '', '', 'none', '', '', '#e10000', '-1', 200, 200, 30, 30, 1, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(63, 'effect', 'modJIanFan', '动态简繁转换', 'all', 'all', 'tpl_jianfan.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '', '-1', 150, 50, 30, 700, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '简繁转换', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'top', 'block', 0, 0),
(64, 'effect', 'modNowDate', '当前日期时间', 'all', 'all', 'tpl_nowdate.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 30, 10, 600, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前日期时间', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(65, 'effect', 'modMouseClock', '鼠标时钟特效', 'all', 'all', 'tpl_mouseclock.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 150, 150, 300, 10, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '特效', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'bodyex', 'block', 0, 1),
(90, 'effect', 'modTraFlash', '透明flash特效', 'all', 'all', 'tpl_flash1.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 500, 200, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(6, 'index', 'modIndexNavPath', '当前位置提示条', 'index', 'index', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(30, 'member', 'modLoginForm', '会员登录表单', 'all', 'all', 'tpl_loginform.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 180, 0, 0, 90, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员登录', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(37, 'member', 'modMemberReg', '会员注册', 'member', 'reg', 'tpl_reg.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 750, 390, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员注册', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(43, 'member', 'modMemberLogin', '会员登录表单(大)', 'member', 'login', 'tpl_member_login.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 650, 300, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员登录', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(45, 'member', 'modResetPass', '重设密码向导', 'member', 'lostpass', 'tpl_resetpass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 500, 250, 0, 0, 90, 30, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '重设密码', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(57, 'member', 'modMemberNavPath', '当前位置提示条', 'member', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 700, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(103, 'member', 'modMemberInfo', '会员登录信息', 'member', 'main', 'tpl_memberinfo.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 300, 250, 0, 0, 99, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员登录信息', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(104, 'member', 'modMemberNotice', '会员公告(列表)', 'member', 'main', 'tpl_member_notice.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 200, 0, 0, 99, 12, 5, '-1', '-1', -1, 25, '_self', -1, -1, -1, -1, '-1', '会员公告', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(106, 'member', 'modMemberAccount', '登录账号设置表单', 'member', 'account', 'tpl_member_account.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 200, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '登录帐号设置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(107, 'member', 'modMemberPerson', '头像签名设置表单', 'member', 'person', 'tpl_member_person.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 390, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '头像签名设置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(108, 'member', 'modMemberDetail', '个人资料修改表单', 'member', 'detail', 'tpl_member_detail.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 500, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '个人资料修改', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(109, 'member', 'modMemberContact', '联系信息设置表单', 'member', 'contact', 'tpl_member_contact.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 390, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '联系信息设置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(110, 'member', 'modMemberNoticeContent', '会员公告详情', 'member', 'notice', 'tpl_member_notice_content.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 300, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员公告', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(139, 'member', 'modMemberFav', '我的收藏夹', 'member', 'fav', 'tpl_member_fav.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 350, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '我的收藏夹', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(140, 'member', 'modMemberFriends', '我的好友', 'member', 'friends', 'tpl_member_friends.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 350, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '我的好友', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(141, 'member', 'modMemberComment', '我的点评', 'member', 'comment', 'tpl_member_comment.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 350, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '我的点评', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(142, 'member', 'modMemberMsn', '我的站内短信', 'member', 'msn', 'tpl_member_msn.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 350, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '我的站内短信', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(147, 'member', 'modMemberCentInfo', '会员积分信息', 'member', 'main', 'tpl_centinfo.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 300, 200, 0, 0, 99, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员积分', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(148, 'member', 'modMemberCentLog', '会员积分查询', 'member', 'membercent', 'tpl_member_centlog.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 300, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '我的积分', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(153, 'member', 'modMemberIntro', '会员简介', 'member', 'homepage', 'tpl_member_intro.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 500, 200, 0, 0, 99, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员简介', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(154, 'member', 'modMemberHomeInfo', '会员信息', 'member', 'homepage', 'tpl_member_homeinfo.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 500, 210, 0, 0, 99, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员信息', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(14, 'menu', 'modChannelMenu', '二级导航菜单', 'all', 'all', 'tpl_channelmenu.htm', 'A', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 65, 120, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '导航菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_menu_group', '', 1, 'hidden', 'top', 'block', 0, 0),
(16, 'menu', 'modBottomMenu', '底部菜单（一级）', 'all', 'all', 'tpl_bottommenu.htm', 'A', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 900, 28, 0, 0, 90, 0, 10, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '脚注栏目', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '3', '-1', 1, '', '_menu_group', '', 1, 'hidden', 'bottom', 'block', 0, 0),
(67, 'menu', 'modDropDownMenu', '二级下拉菜单', 'all', 'all', 'tpl_dropdownmenu.htm', 'A', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 900, 28, 100, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '导航菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_menu_group', '', 1, 'hidden', 'top', 'block', 0, 0),
(66, 'menu', 'modTopMenu', '顶部菜单(一级)', 'all', 'all', 'tpl_topmenu.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 350, 30, 5, 500, 90, 0, 10, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '顶部菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '2', '-1', 1, '', '_menu_group', '', 1, 'hidden', 'top', 'block', 0, 0),
(68, 'menu', 'modMainMenu', '一级导航菜单', 'all', 'all', 'tpl_mainmenu.htm', 'A', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 900, 30, 100, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '导航菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_menu_group', '', 1, 'hidden', 'top', 'block', 0, 0),
(115, 'menu', 'modTreeMenu', '树形导航菜单', 'all', 'all', 'tpl_treemenu.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 190, 200, 0, 0, 99, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '导航菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_menu_group', '', 1, 'visible', 'content', 'block', 0, 1),
(116, 'menu', 'modMemberMenu', '会员功能菜单', 'member', 'all', 'tpl_qqmenu.htm', 'A', '1000', '#def', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 190, 200, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '会员中心', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 1),
(1, 'news', 'modNewsQuery', '文章翻页检索', 'news', 'all', 'tpl_newsquery.htm', '-1', 'A010', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 600, 500, 30, 200, 90, 10, 20, '-1', '-1', -1, 30, '_self', -1, -1, -1, -1, '-1', '文章检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(2, 'news', 'modNewsClass', '文章一级分类', 'all', 'all', 'tpl_newsclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '文章分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(3, 'news', 'modNewsTreeClass', '文章分类（树形）', 'all', 'all', 'tpl_classtree.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 200, 200, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '文章分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 1),
(4, 'news', 'modNewsProjList', '相关文章(同专题)', 'news', 'detail', 'tpl_newslist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 200, 200, 0, 0, 90, 12, 5, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '相关文章', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(5, 'news', 'modNewsAuthorList', '相关文章(同发布人)', 'news', 'detail', 'tpl_newslist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 200, 200, 0, 0, 90, 12, 5, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '相关文章', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(7, 'news', 'modNewsClassFc', '文章逐级分类', 'news', 'query', 'tpl_newsclass.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 200, 0, 0, 90, 12, 99, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '文章分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(8, 'news', 'modNewsList', '文章列表', 'all', 'all', 'tpl_newslist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}news/class/', 200, 200, 0, 0, 90, 10, 5, 'id|dtime|uptime|prop1|prop2|cl|xuhao', 'desc', 0, 12, '_self', 0, 50, -1, -1, '-1', '最新文章', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '0', 1, '_news_cat', '', '_news_proj', -1, 'hidden', 'content', 'block', 1, 0),
(12, 'news', 'modNewsContent', '文章正文', 'news', 'detail', 'tpl_newscontent.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 630, 300, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章正文', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(13, 'news', 'modNewsSearchForm', '文章搜索表单', 'news', 'all', 'tpl_news_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 0, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(20, 'news', 'modNewsComment', '文章点评', 'news', 'detail', 'tpl_news_comment.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '', '', '#fff', 'http://', 630, 300, 300, 0, 90, 1, 5, '-1', '-1', -1, 20, '_self', -1, 120, -1, -1, '-1', '文章评论', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(55, 'news', 'modNewsNavPath', '当前位置提示条', 'news', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(72, 'news', 'modNewsProject', '文章专题名称列表', 'all', 'all', 'tpl_newsproj.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', -1, 12, '_self', -1, -1, -1, -1, '-1', '最新专题', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(82, 'news', 'modNewsPic', '文章图片+标题', 'all', 'all', 'tpl_newspic.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 200, 300, 0, 0, 99, 5, 4, 'id|dtime|uptime|prop1|prop2|cl|xuhao', 'desc', 0, 6, '_self', 0, -1, 160, 120, 'fill', '图片新闻', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '0', 1, '_news_cat', '', '_news_proj', -1, 'hidden', 'content', 'block', 1, 0),
(88, 'news', 'modNewsHot', '文章人气榜', 'all', 'all', 'tpl_newshot.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}news/class/index.php?myord=cl', 200, 280, 0, 0, 90, 10, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '文章人气榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '0', 1, '_news_cat', '', '_news_proj', -1, 'hidden', 'content', 'block', 1, 0),
(112, 'news', 'modNewsFabu', '文章发布表单', 'member', 'newsfabu', 'tpl_news_fabu.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 700, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章发布', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(113, 'news', 'modNewsGl', '文章管理', 'member', 'newsgl', 'tpl_news_gl.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 700, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章管理', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(114, 'news', 'modNewsModify', '文章修改表单', 'member', 'newsmodify', 'tpl_news_modify.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 700, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章修改', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(136, 'news', 'modNewsMyCat', '文章分类管理', 'member', 'newscat', 'tpl_news_mycat.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 300, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章分类管理', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(149, 'news', 'modMemberNewsList', '会员最新文章', 'member', 'homepage', 'tpl_newslist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}news/membernews.php?mid={#mid#}', 380, 170, 0, 0, 90, 10, 5, 'id|dtime|uptime|prop1|prop2|cl', 'desc', 0, 20, '_self', -1, -1, -1, -1, '-1', '我的文章', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(155, 'news', 'modMemberNewsClass', '会员文章分类', 'news', 'membernews', 'tpl_membernews_class.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 180, 0, 0, 99, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(156, 'news', 'modMemberNewsQuery', '会员文章检索', 'news', 'membernews', 'tpl_newsquery.htm', '-1', 'A010', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 300, 30, 220, 90, 10, 20, '-1', '-1', -1, 30, '_self', -1, -1, -1, -1, '-1', '会员文章', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(157, 'news', 'modMemberNewsSearchForm', '会员文章搜索', 'news', 'membernews', 'tpl_membernews_searchform.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 175, 0, 0, 99, 15, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '文章搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(58, 'page', 'modPageNavPath', '当前位置提示条', 'page', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(62, 'page', 'modPageContent', '网页内容详情', 'page', 'all', 'tpl_page_content.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 350, 30, 220, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '内容标题', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(70, 'page', 'modPageTitleList', '网页标题(列表)', 'all', 'all', 'tpl_pagelist.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', 'http://', 200, 300, 0, 0, 90, 10, 10, '-1', '-1', -1, 12, '_self', -1, -1, -1, -1, '-1', '内容标题列表', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_page_group', '', -1, 'hidden', 'content', 'block', 0, 0),
(71, 'page', 'modPageContentFy', '网页内容翻页', 'page', 'all', 'tpl_page_fy.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 50, 30, 220, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '翻页', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(73, 'page', 'modPageTitleMenu', '网页标题(菜单)', 'all', 'all', 'tpl_page_titlemenu.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 0, 10, '-1', '-1', -1, 12, '_self', -1, -1, -1, -1, '-1', '内容标题菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_page_group', '', -1, 'hidden', 'content', 'block', 1, 0),
(29, 'search', 'modSearch', '全站搜索结果', 'search', 'search', 'tpl_search.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 900, 600, 30, 0, 90, 0, -1, '-1', '-1', -1, 30, '_self', -1, -1, -1, -1, '-1', '全站搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(46, 'search', 'modSearchForm', '全站搜索表单', 'all', 'all', 'tpl_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 30, 0, 0, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '全站搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(59, 'search', 'modSearchNavPath', '当前位置提示条', 'search', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(28, 'tools', 'modShowCount', '访问统计', 'all', 'all', 'tpl_showcount.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 150, 30, 100, 300, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '访问统计', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', 1, 'hidden', 'bottom', 'block', 0, 0),
(54, 'tools', 'modVote', '投票调查', 'all', 'all', 'tpl_vote.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 250, 200, 200, 90, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '投票调查', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_tools_pollindex', '', -1, 'hidden', 'content', 'block', 0, 0),
(320, 'shop', 'modShopBrandQuery', '品牌检索', 'shop', 'brandquery', 'tpl_shop_brandquery.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 500, 30, 200, 90, 5, 10, '-1', '-1', -1, -1, '_self', -1, -1, 100, 40, 'fill', '品牌检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(169, 'news', 'modNewsHot30', '本月文章人气榜', 'all', 'all', 'tpl_newshot.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}news/class/index.php?myord=cl', 200, 280, 0, 0, 90, 10, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '本月人气榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '0', 1, '_news_cat', '', '_news_proj', -1, 'hidden', 'content', 'block', 1, 0),
(172, 'news', 'modNewsSameTagList', '相关文章(同标签)', 'news', 'detail', 'tpl_newslist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 200, 200, 0, 0, 90, 12, 5, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '相关文章', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(319, 'shop', 'modShopSmallCart', '购物车提示信息', 'all', 'all', 'tpl_shop_smallcart.htm', '-1', 'A001', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 180, 0, 0, 90, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '购物车', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'content', 'block', 0, 0),
(176, 'diy', 'modDiyMovi', 'FLASH视频', 'all', 'all', 'tpl_diymovi.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 300, 300, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '视频', '-1', '-1', '-1', '-1', '请输入FLASH视频来源网址', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(175, 'advs', 'modLinkOpt', '下拉式友情链接', 'all', 'all', 'tpl_linkopt.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '{#RP#}advs/link/', 200, 50, 0, 0, 90, 10, 12, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '友情链接', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_linkgroup', '', -1, 'hidden', 'content', 'block', 1, 0);
INSERT INTO `dev_base_plusdefault` (`id`, `coltype`, `pluslable`, `plusname`, `plustype`, `pluslocat`, `tempname`, `tempcolor`, `showborder`, `bordercolor`, `borderwidth`, `borderstyle`, `borderlable`, `borderroll`, `showbar`, `barbg`, `barcolor`, `backgroundcolor`, `morelink`, `width`, `height`, `top`, `left`, `zindex`, `padding`, `shownums`, `ord`, `sc`, `showtj`, `cutword`, `target`, `catid`, `cutbody`, `picw`, `pich`, `fittype`, `title`, `body`, `pic`, `piclink`, `attach`, `movi`, `sourceurl`, `word`, `word1`, `word2`, `word3`, `word4`, `text`, `text1`, `code`, `link`, `link1`, `link2`, `link3`, `link4`, `tags`, `groupid`, `projid`, `moveable`, `classtbl`, `grouptbl`, `projtbl`, `setglobal`, `overflow`, `bodyzone`, `display`, `ifmul`, `ifrefresh`) VALUES
(204, 'member', 'modMemberRank3', '会员悬赏榜(积分三)', 'all', 'all', 'tpl_memberrank.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 250, 0, 0, 99, 12, 10, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '会员悬赏榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(205, 'member', 'modMemberRank4', '会员金币榜(积分四)', 'all', 'all', 'tpl_memberrank.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 250, 0, 0, 99, 12, 10, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '会员金币榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(206, 'member', 'modMemberRank5', '消费积分榜(积分五)', 'all', 'all', 'tpl_memberrank.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 250, 0, 0, 99, 12, 10, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '消费积分榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(207, 'member', 'modMemberTags', '会员推荐(标签)', 'all', 'all', 'tpl_membertags.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 250, 0, 0, 99, 12, 2, '-1', '-1', -1, -1, '_self', -1, -1, 70, 70, '-1', '会员推荐', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(203, 'member', 'modMemberRank2', '会员人气榜(积分二)', 'all', 'all', 'tpl_memberrank.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 250, 0, 0, 99, 12, 10, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '会员人气榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(202, 'member', 'modMemberRank1', '会员经验榜(积分一)', 'all', 'all', 'tpl_memberrank.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 250, 0, 0, 99, 12, 10, '-1', '-1', -1, -1, '_self', -1, -1, -1, -1, '-1', '会员经验榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(182, 'diy', 'modWordTT', '标题+链接组', 'all', 'all', 'tpl_wordtt.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', 'http://', 300, 70, 0, 0, 99, 10, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '今日头条', '-1', '-1', '-1', '-1', '-1', '-1', '请输入头条标题文字', '自定义链接文字一', '自定义链接文字二', '自定义链接文字三', '自定义链接文字四', '-1', '-1', '-1', 'http://', 'http://', 'http://', 'http://', 'http://', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(183, 'diy', 'modWordText', '标题+介绍', 'all', 'all', 'tpl_wordtext.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', 'http://', 300, 100, 0, 0, 99, 10, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '插件标题', '-1', '-1', '-1', '-1', '-1', '-1', '请输入标题文字', '-1', '-1', '-1', '-1', '请输入介绍文字', '-1', '-1', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(187, 'news', 'modNewsPicRollx3', '三图轮播特效', 'all', 'all', 'tpl_newspicrollx3.htm', 'A', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#dddddd', '#fff', '#fff', '-1', 700, 270, 0, 200, 99, 0, -1, '-1', '-1', 0, 12, '_self', 0, 25, -1, -1, '-1', '图片新闻', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '0', 1, '_news_cat', '', '_news_proj', -1, 'hidden', 'content', 'block', 0, 1),
(189, 'diy', 'modPicWords', '图片+标题组', 'all', 'all', 'tpl_picwordx5.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', 'http://', 300, 120, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, 100, '-1', '自定图文', '-1', '', 'http://', '-1', '-1', '-1', '请输入标题', '请输入标题', '请输入标题', '请输入标题', '请输入标题', '-1', '-1', '-1', 'http://', 'http://', 'http://', 'http://', 'http://', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(190, 'effect', 'modButtonSource', '按钮素材', 'all', 'all', 'tpl_picsource.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 80, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '按钮素材', '-1', '-1', '-1', '-1', '-1', 'button/01.gif', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(191, 'effect', 'modIconSource', '图标素材', 'all', 'all', 'tpl_picsource.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 50, 50, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '图标素材', '-1', '-1', '-1', '-1', '-1', 'icon/01.gif', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(193, 'effect', 'modSmallIcon', '小图标素材', 'all', 'all', 'tpl_smallicon.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 50, 50, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '图标素材', '-1', '-1', '-1', '-1', '-1', 'smallicon/1.gif', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(198, 'effect', 'modBgSource', '背景图片素材', 'all', 'all', 'tpl_bgsource.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 100, 100, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '背景素材', '-1', '-1', '-1', '-1', '-1', 'bg/1.gif', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(195, 'effect', 'modSourceCoolLine', '分割线装饰素材', 'all', 'all', 'tpl_picsource.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 300, 100, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '分割线素材', '-1', '-1', '-1', '-1', '-1', 'coolline/1.png', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(196, 'effect', 'modCartonSource', '其他图片素材', 'all', 'all', 'tpl_picsource.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 200, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '卡通图片', '-1', '-1', '-1', '-1', '-1', 'carton/1.png', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(200, 'diy', 'modGroupLable', '标签切换边框', 'all', 'all', 'tpl_plusborder.htm', '-1', 'A201', '', 0, 'solid', '', '', 'none', '', '#fff', '#fff', 'http://', 300, 300, 0, 0, 0, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '自动标签', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(208, 'effect', 'modHeaderBg', '头部背景图素材', 'all', 'all', 'tpl_bgsource.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 150, 0, 0, -1, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '头部背景素材', '-1', '-1', '-1', '-1', '-1', 'bg/1.gif', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'top', 'block', 0, 0),
(209, 'effect', 'modHeadTraFlash', '头部透明flash特效', 'all', 'all', 'tpl_flash1.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 150, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'top', 'block', 0, 0),
(210, 'diy', 'modBgSound', '网页背景音乐(mid)', 'all', 'all', 'tpl_bgsound.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 100, 50, 350, 0, -1, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '背景音乐', '-1', '-1', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'bodyex', 'block', 0, 1),
(211, 'news', 'modNewsSameClass', '文章同级分类', 'news', 'query', 'tpl_newsclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '文章分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(318, 'shop', 'modShopOrderSearch', '非会员订单查询', 'all', 'all', 'tpl_shop_ordersearch.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 150, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '订单查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(214, 'diy', 'modHeadPic', '头部自定义效果图', 'all', 'all', 'tpl_headpic.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 150, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '图片', '-1', '', 'http://', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'top', 'block', 0, 0),
(219, 'diy', 'modDiyTemp', '自定义模版', 'all', 'all', 'tpl_diy.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 300, 300, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '自定模版', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(220, 'news', 'modNewsTwoClass', '文章二级分类', 'all', 'all', 'tpl_newstwoclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '文章分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_news_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(317, 'shop', 'modShopOrderDetail', '订单详情', 'shop', 'shoporderdetail', 'tpl_shop_orderdetail.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(316, 'shop', 'modShopMemberOrder', '会员订单查询', 'member', 'shoporder', 'tpl_shop_order.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '订单查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(315, 'shop', 'modShopOrderPay', '订单付款', 'shop', 'shoporderpay', 'tpl_shop_orderpay.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(314, 'shop', 'modShopStartOrder', '商品订购', 'shop', 'startorder', 'tpl_shop_startorder.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '商品订购', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 1),
(313, 'shop', 'modShopBrandGoodsQuery', '品牌相关商品检索', 'shop', 'branddetail', 'tpl_shop_query_1.htm', '-1', 'A001', '', 1, 'solid', '', '', 'block', '', '', '#fff', '-1', 650, 350, 0, 0, 90, 15, 10, 'id|xuhao|dtime|uptime|bn|prop1|prop2|price0|price|cl', 'desc', 0, 12, '_self', -1, 30, 100, 100, 'fill', '品牌商品', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(312, 'shop', 'modShopBrandDetail', '品牌介绍', 'shop', 'branddetail', 'tpl_shop_branddetail.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 300, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '品牌介绍', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(311, 'shop', 'modShopBrandClass', '品牌商品一级分类', 'all', 'branddetail', 'tpl_shopclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '品牌商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(310, 'shop', 'modShopBrandTwoClass', '品牌商品二级分类', 'all', 'branddetail', 'tpl_shoptwoclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '品牌商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(309, 'shop', 'modShopSaleList', '热卖商品排行榜', 'all', 'all', 'tpl_shop_hotlist.htm', '-1', 'A001', '', 1, 'solid', '', '', 'none', '', '', '#fff', '{#RP#}shop/class/', 300, 350, 0, 0, 90, 10, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '热卖商品排行榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(308, 'shop', 'modShopHotList', '热门商品排行榜', 'all', 'all', 'tpl_shop_hotlist.htm', '-1', 'A001', '', 1, 'solid', '', '', 'none', '', '', '#fff', '{#RP#}shop/class/', 300, 350, 0, 0, 90, 10, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '热门商品排行榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(307, 'shop', 'modShopSameTagList', '同标签相关商品', 'shop', 'detail', 'tpl_shoplist.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '#fff', 'http://', 200, 300, 0, 0, 90, 10, 6, '-1', '-1', 0, 12, '_self', -1, -1, 100, 100, 'fill', '相关商品', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(306, 'shop', 'modShopComment', '商品点评', 'shop', 'detail', 'tpl_shop_comment.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '', '', '#fff', 'http://', 650, 350, 350, 0, 90, 1, 5, '-1', '-1', -1, 20, '_self', -1, 120, -1, -1, '-1', '商品评论', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(305, 'shop', 'modShopSameClass', '商品同级分类', 'shop', 'query', 'tpl_shopclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(303, 'shop', 'modShopSearchForm', '商品搜索表单', 'all', 'all', 'tpl_shop_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 200, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '商品搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', 1, 'hidden', 'content', 'block', 0, 0),
(304, 'shop', 'modShopClassFc', '商品逐级分类', 'shop', 'query', 'tpl_shopclass.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 200, 0, 0, 90, 5, 99, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(301, 'shop', 'modShopCart', '购物车', 'shop', 'cart', 'tpl_shop_cart.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '购物车', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(302, 'shop', 'modShopList', '自选商品列表', 'all', 'all', 'tpl_shoplist.htm', '-1', 'A001', '', 1, 'solid', '', '', 'none', '', '', '#fff', '{#RP#}shop/class/', 300, 350, 0, 0, 90, 10, 6, 'id|xuhao|dtime|uptime|prop1|prop2|price0|price|cl', 'desc', 0, 12, '_self', 0, 30, 80, 80, 'fill', '最新商品', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(300, 'shop', 'modShopTwoClass', '商品二级分类', 'all', 'all', 'tpl_shoptwoclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(299, 'shop', 'modShopClass', '商品一级分类', 'all', 'all', 'tpl_shopclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(298, 'shop', 'modShopContent', '商品详情', 'shop', 'detail', 'tpl_shop_content.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 350, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '商品详情', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(297, 'shop', 'modShopBrandAll', '分类品牌列表', 'shop', 'brand', 'tpl_shop_brandall.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 500, 30, 200, 90, 5, -1, '-1', '-1', 0, -1, '_self', -1, -1, 100, 40, 'fill', '品牌查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(296, 'shop', 'modShopGlobalQuery', '全站翻页商品列表', 'all', 'all', 'tpl_shop_query_1.htm', '-1', 'A001', '', 1, 'solid', '', '', 'block', '', '', '#fff', '-1', 650, 350, 0, 0, 90, 15, 10, 'id|xuhao|dtime|uptime|bn|prop1|prop2|price0|price|cl', 'desc', 0, 12, '_self', 0, -1, 100, 100, 'fill', '商品列表', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(295, 'shop', 'modShopQuery', '商品检索搜索', 'shop', 'query', 'tpl_shop_query.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 220, 90, 5, 10, '-1', '-1', -1, 30, '_self', -1, 30, 100, 100, 'fill', '商品检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 1),
(294, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(246, 'menu', 'modVMenu', '竖式导航菜单', 'all', 'all', 'tpl_vmenu.htm', 'A', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 200, 300, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '导航菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_menu_group', '', 1, 'hidden', 'content', 'block', 0, 0),
(247, 'menu', 'modMVMenu', '手风琴式二级菜单', 'all', 'all', 'tpl_mvmenu.htm', 'A', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 180, 200, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '导航菜单', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_menu_group', '', -1, 'visible', 'content', 'block', 0, 1),
(255, 'news', 'modNewsPicLb', '文章图片轮播', 'all', 'all', 'tpl_newspic_lb.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 300, 280, 0, 0, 99, 1, 5, 'id|dtime|uptime|prop1|prop2|cl|xuhao', 'desc', 0, 15, '-1', 0, -1, -1, -1, '-1', '图片新闻', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_news_cat', '', '_news_proj', -1, 'hidden', 'content', 'block', 1, 1),
(256, 'diy', 'modDiyHeadTraFlash', '头部自定义透明FLASH', 'all', 'all', 'tpl_diyheadtraflash.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 150, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'top', 'block', 0, 0),
(257, 'advs', 'modAdvsHeadLb', '头部图片轮播', 'all', 'all', 'tpl_advsheadlb.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 900, 200, 0, 0, 90, 0, 5, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_lbgroup', '', 1, 'hidden', 'top', 'block', 0, 1),
(258, 'page', 'modPagePicList', '标题+摘要+主题图', 'all', 'all', 'tpl_page_piclist.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 300, 0, 0, 90, 0, 10, '-1', '-1', -1, 15, '_self', -1, 50, 120, 90, 'fill', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_page_group', '', -1, 'hidden', 'content', 'block', 0, 0),
(259, 'tools', 'modToolsPhotoPollQuery', '图片投票翻页检索', 'all', 'all', 'tpl_tools_photopoll_query.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 500, 30, 200, 90, 5, 20, 'id|uptime|votes', '-1', -1, 30, '-1', 0, -1, 80, 80, 'fill', '图片投票检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_tools_photopollindex', '', '', -1, 'visible', 'content', 'block', 0, 1),
(260, 'tools', 'modToolsQqCs', 'QQ客服', 'all', 'all', 'tpl_tools_qqcs.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 120, 300, 100, 20, 90, 0, -1, '-1', '-1', 0, -1, '-1', -1, -1, -1, -1, '-1', 'QQ客服', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'content', 'block', 0, 0),
(261, 'tools', 'modToolsWyCs', '51客服', 'all', 'all', 'tpl_tools_wycs.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 300, 120, 100, 0, 90, 0, -1, '-1', '-1', 0, -1, '-1', -1, -1, -1, -1, '-1', '51客服', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'content', 'block', 0, 0),
(262, 'tools', 'modToolsStatistics', '统计代码插件', 'all', 'all', 'tpl_tools_statistics.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 30, 30, 50, 400, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '统计代码', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'bottom', 'block', 0, 0),
(263, 'tools', 'modToolsYdCs', '移动短信留言', 'all', 'all', 'tpl_tools_ydcs.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 400, 350, 100, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '移动短信留言板', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'content', 'block', 0, 0),
(264, 'member', 'modMemberPayList', '会员付款记录', 'member', 'paylist', 'tpl_member_paylist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 300, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '付款记录', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(265, 'member', 'modMemberBuyList', '会员消费记录', 'member', 'buylist', 'tpl_member_buylist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 300, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '消费记录', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(266, 'job', 'modJobQuery', '职位翻页检索', 'all', 'all', 'tpl_jobquery.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '#ffffff', '-1', 650, 350, 0, 0, 90, 15, 10, '-1', '-1', -1, 30, '_self', -1, 100, -1, -1, '-1', '职位查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(267, 'job', 'modJobList', '最新职位列表', 'all', 'all', 'tpl_joblist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}job/', 200, 200, 0, 0, 90, 12, 5, '-1', '-1', -1, 12, '_self', -1, -1, -1, -1, '-1', '最新职位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0),
(268, 'job', 'modJobContent', '职位信息详情', 'job', 'detail', 'tpl_jobcontent.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 630, 300, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '职位信息', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(269, 'job', 'modJobSearchForm', '职位搜索表单', 'job', 'all', 'tpl_job_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 0, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '职位搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(270, 'job', 'modJobNavPath', '当前位置提示条', 'job', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(271, 'job', 'modJobForm', '应聘申请表单', 'job', 'detail', 'tpl_job_form.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#f5f5f5', '#505050', '#fff', '-1', 650, 500, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '应聘申请', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(321, 'shop', 'modShopTwoClassBrand', '分类品牌组合查询', 'all', 'all', 'tpl_shoptwoclass_brand.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 180, 300, 0, 0, 90, 0, -1, '-1', '-1', 0, -1, '_self', -1, -1, 140, 50, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(322, 'feedback', 'modFeedBackNavPath', '当前位置提示条', 'feedback', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(323, 'feedback', 'modFeedBackForm', '留言反馈表单', 'feedback', 'all', 'tpl_feedback_form.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 650, 500, 50, 220, 90, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '留言反馈', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_feedback_group', '', -1, 'visible', 'content', 'block', 0, 0),
(324, 'feedback', 'modFeedBackSmallForm', '全站留言表单', 'all', 'all', 'tpl_feedback_smallform.htm', '-1', 'A001', '', 1, 'solid', '', '', 'none', '', '', '', '-1', 650, 500, 0, 0, 90, 10, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '给我留言', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_feedback_group', '', 1, 'hidden', 'content', 'block', 0, 0),
(293, 'member', 'modMemberOnlinePay', '帐户在线充值', 'member', 'onlinepay', 'tpl_member_onlinepay.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 700, 300, 0, 0, 99, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '帐户在线充值', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(325, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(326, 'huanzeng', 'modHzSearchForm', '赠品搜索表单', 'huanzeng', 'all', 'tpl_hz_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 200, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '赠品搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(327, 'huanzeng', 'modHzQuery', '赠品检索搜索', 'huanzeng', 'query', 'tpl_hz_query.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 500, 30, 200, 90, 5, 20, '-1', '-1', -1, 30, '_self', -1, 30, 120, 120, 'fill', '赠品检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'visible', 'content', 'block', 0, 1),
(328, 'huanzeng', 'modHzDetail', '赠品详情', 'huanzeng', 'detail', 'tpl_hz_detail.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 350, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '赠品详情', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'visible', 'content', 'block', 0, 0),
(329, 'huanzeng', 'modHzPaiHang', '赠品兑换排行', 'huanzeng', 'all', 'tpl_hz_paihang.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 200, 300, 0, 0, 90, 10, 6, '-1', '-1', 0, 12, '_self', 0, -1, 100, 100, 'fill', '赠品兑换排行', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(330, 'huanzeng', 'modHzCart', '购物车', 'huanzeng', 'cart', 'tpl_hz_cart.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '购物车', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(331, 'huanzeng', 'modHzStartOrder', '赠品兑换', 'huanzeng', 'startorder', 'tpl_hz_startorder.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '赠品兑换', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 1),
(332, 'huanzeng', 'modHzOrderDetail', '订单详情', 'huanzeng', 'orderdetail', 'tpl_hz_orderdetail.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(333, 'huanzeng', 'modHzMemberOrder', '会员订单查询', 'member', 'hzorder', 'tpl_hz_order.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '订单查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0),
(334, 'huanzeng', 'modHzClass', '赠品一级分类', 'all', 'all', 'tpl_hzclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '赠品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(335, 'huanzeng', 'modHzTwoClass', '赠品二级分类', 'all', 'all', 'tpl_hztwoclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '赠品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0),
(337, 'effect', 'modSetHomePageCyrano', '设为首页加入收藏', 'all', 'all', 'tpl_sethomepage_cyrano.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '', '-1', 150, 50, 30, 700, 90, 5, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '设为首页加入收藏', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', 1, 'hidden', 'top', 'block', 0, 0),
(338, 'news', 'modNewsGlobalQuery', '全站翻页文章列表', 'all', 'all', 'tpl_newsquery.htm', '-1', 'A001', '', 1, 'solid', '', '', 'block', '', '', '#fff', '-1', 650, 350, 0, 0, 90, 15, 10, 'id|dtime|uptime|prop1|prop2|cl|xuhao', 'desc', 0, 20, '_self', 0, 50, -1, -1, '-1', '最新文章', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '0', 1, '_news_cat', '', '_news_proj', -1, 'visible', 'content', 'block', 0, 0),
(343, 'advs', 'modAdvsLbXml', '轮播广告(FX)', 'all', 'all', 'tpl_advslb_xml.htm', '-1', '1000', '#ffffff', 0, 'solid', '', '', 'none', '#ffffff', '#ffffff', '#ffffff', '-1', 900, 200, 0, 0, 99, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '1', '-1', 1, '', '_advs_lbgroup', '', 1, 'hidden', 'top', 'block', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_plusplan`
--

CREATE TABLE IF NOT EXISTS `dev_base_plusplan` (
  `id` int(12) NOT NULL auto_increment,
  `planid` int(6) NOT NULL default '0',
  `coltype` varchar(30) NOT NULL,
  `pluslable` varchar(100) default '0',
  `plusname` varchar(50) NOT NULL,
  `plustype` varchar(50) default '0',
  `pluslocat` varchar(50) default '0',
  `tempname` varchar(100) NOT NULL default '0',
  `tempcolor` varchar(2) NOT NULL,
  `showborder` char(20) NOT NULL default '0',
  `bordercolor` varchar(7) NOT NULL default '#dddddd',
  `borderwidth` int(2) NOT NULL default '1',
  `borderstyle` varchar(10) NOT NULL default 'solid',
  `borderlable` varchar(150) NOT NULL,
  `borderroll` varchar(10) NOT NULL,
  `showbar` varchar(10) NOT NULL default 'none',
  `barbg` varchar(10) NOT NULL default '#cccccc',
  `barcolor` varchar(10) NOT NULL default '#ffffff',
  `backgroundcolor` varchar(7) NOT NULL default '#ffffff',
  `morelink` varchar(100) NOT NULL default 'http://',
  `width` int(5) NOT NULL default '100',
  `height` int(5) NOT NULL default '100',
  `top` int(5) NOT NULL default '0',
  `left` int(5) NOT NULL default '0',
  `zindex` int(2) NOT NULL default '99',
  `padding` int(11) NOT NULL default '0',
  `shownums` int(10) NOT NULL default '0',
  `ord` varchar(100) NOT NULL default 'id',
  `sc` varchar(10) NOT NULL default 'desc',
  `showtj` int(5) NOT NULL default '0',
  `cutword` int(20) default '0',
  `target` varchar(30) default '0',
  `catid` int(100) NOT NULL default '0',
  `cutbody` int(5) NOT NULL default '0',
  `picw` int(3) NOT NULL default '100',
  `pich` int(3) NOT NULL default '100',
  `fittype` char(10) NOT NULL default 'fill',
  `title` varchar(100) NOT NULL,
  `body` text,
  `pic` varchar(255) NOT NULL,
  `piclink` char(255) NOT NULL default '-1',
  `attach` varchar(255) NOT NULL,
  `movi` varchar(255) NOT NULL,
  `sourceurl` varchar(30) NOT NULL,
  `word` char(255) NOT NULL,
  `word1` char(255) NOT NULL,
  `word2` char(255) NOT NULL,
  `word3` char(255) NOT NULL default '',
  `word4` char(255) NOT NULL default '',
  `text` text NOT NULL,
  `text1` text NOT NULL,
  `code` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `link1` char(255) NOT NULL default '',
  `link2` char(255) NOT NULL default '',
  `link3` char(255) NOT NULL,
  `link4` char(255) NOT NULL,
  `tags` char(30) NOT NULL,
  `groupid` varchar(20) NOT NULL default '',
  `projid` varchar(20) NOT NULL default '',
  `modno` int(3) NOT NULL default '0',
  `setglobal` int(5) NOT NULL default '0',
  `overflow` varchar(20) NOT NULL default 'hidden',
  `bodyzone` varchar(10) NOT NULL default 'content',
  `display` char(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=928 ;

--
-- 转存表中的数据 `dev_base_plusplan`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_base_plusplanid`
--

CREATE TABLE IF NOT EXISTS `dev_base_plusplanid` (
  `id` int(6) NOT NULL auto_increment,
  `planname` varchar(50) NOT NULL default '',
  `plustype` varchar(50) NOT NULL default '',
  `pluslocat` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- 转存表中的数据 `dev_base_plusplanid`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_base_plustemp`
--

CREATE TABLE IF NOT EXISTS `dev_base_plustemp` (
  `id` int(12) NOT NULL auto_increment,
  `pluslable` char(30) NOT NULL default '',
  `cname` char(30) NOT NULL,
  `tempname` char(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=356 ;

--
-- 转存表中的数据 `dev_base_plustemp`
--

INSERT INTO `dev_base_plustemp` (`id`, `pluslable`, `cname`, `tempname`) VALUES
(297, 'modShopList', '商品名/图片/品牌/价格', 'tpl_shoplist_2.htm'),
(201, 'modLoginForm', '横式会员登录表单，请选用专用边框(如500号边框)', 'tpl_loginform_h.htm'),
(67, 'modMemberNewsList', '标题+时间', 'tpl_newslist_time.htm'),
(68, 'modMemberNewsList', '标题+摘要', 'tpl_newslist_memo.htm'),
(87, 'modMemberNewsQuery', '文章翻页检索,标题+摘要', 'tpl_newsquery_memo.htm'),
(88, 'modMemberNewsQuery', '文章翻页检索,标题+时间,带表头', 'tpl_newsquery_cap.htm'),
(89, 'modNewsAuthorList', '标题+时间', 'tpl_newslist_time.htm'),
(90, 'modNewsAuthorList', '类别+标题', 'tpl_newslist_cat.htm'),
(91, 'modNewsAuthorList', '标题+摘要', 'tpl_newslist_memo.htm'),
(92, 'modNewsAuthorList', '标题+作者', 'tpl_newslist_author.htm'),
(103, 'modNewsContent', '仿新闻门户正文风格', 'tpl_newscontent_portal.htm'),
(16, 'modNewsHot', '标题+图标风格2', 'tpl_newshot2.htm'),
(58, 'modNewsHot', '标题+时间', 'tpl_newshot_time.htm'),
(59, 'modNewsHot', '标题+作者', 'tpl_newshot_author.htm'),
(60, 'modNewsHot', '标题+图标风格3', 'tpl_newshot3.htm'),
(61, 'modNewsHot', '标题+图标风格4', 'tpl_newshot4.htm'),
(102, 'modNewsHot', '标题+点击数', 'tpl_newshot_cl.htm'),
(62, 'modNewsHot30', '标题+图标风格2', 'tpl_newshot2.htm'),
(63, 'modNewsHot30', '标题+时间', 'tpl_newshot_time.htm'),
(64, 'modNewsHot30', '标题+作者', 'tpl_newshot_author.htm'),
(65, 'modNewsHot30', '标题+图标风格3', 'tpl_newshot3.htm'),
(66, 'modNewsHot30', '标题+图标风格4', 'tpl_newshot4.htm'),
(101, 'modNewsHot30', '标题+点击数', 'tpl_newshot_cl.htm'),
(2, 'modNewsList', '标题+时间', 'tpl_newslist_time.htm'),
(3, 'modNewsList', '类别+标题', 'tpl_newslist_cat.htm'),
(57, 'modNewsList', '标题+参数列1,2,3', 'tpl_newslist_prop3.htm'),
(56, 'modNewsList', '标题+参数列1,2', 'tpl_newslist_prop2.htm'),
(55, 'modNewsList', '标题+参数列1', 'tpl_newslist_prop1.htm'),
(42, 'modNewsList', '标题+摘要', 'tpl_newslist_memo.htm'),
(41, 'modNewsList', '标题+作者', 'tpl_newslist_author.htm'),
(198, 'modNewsPicMemo', '图片+标题+两个参数列', 'tpl_newspicprop_2.htm'),
(84, 'modNewsPicMemo', '图片+标题+三个参数列', 'tpl_newspicprop.htm'),
(93, 'modNewsProjList', '标题+时间', 'tpl_newslist_time.htm'),
(94, 'modNewsProjList', '类别+标题', 'tpl_newslist_cat.htm'),
(95, 'modNewsProjList', '标题+摘要', 'tpl_newslist_memo.htm'),
(96, 'modNewsProjList', '标题+作者', 'tpl_newslist_author.htm'),
(10, 'modNewsQuery', '文章翻页检索,标题+摘要', 'tpl_newsquery_memo.htm'),
(86, 'modNewsQuery', '文章翻页检索,标题+时间,带表头', 'tpl_newsquery_cap.htm'),
(97, 'modNewsSameTagList', '标题+时间', 'tpl_newslist_time.htm'),
(98, 'modNewsSameTagList', '类别+标题', 'tpl_newslist_cat.htm'),
(99, 'modNewsSameTagList', '标题+摘要', 'tpl_newslist_memo.htm'),
(100, 'modNewsSameTagList', '标题+作者', 'tpl_newslist_author.htm'),
(344, 'modShopTwoClass', '自定义模版', 'tpl_shoptwoclass_diy.htm'),
(303, 'modShopList', '商品名/价格纯文字列表', 'tpl_shoplist_8.htm'),
(302, 'modShopList', '商品名/图片/简介/价格(上下布局)', 'tpl_shoplist_7.htm'),
(301, 'modShopList', '商品名/图片/品牌/参数列/价格(上下布局)', 'tpl_shoplist_6.htm'),
(48, 'modPicWords', '图片+四行标题', 'tpl_picwordx4.htm'),
(46, 'modPicWords', '图片+两行标题', 'tpl_picwordx2.htm'),
(49, 'modPicWords', '图片+三行标题', 'tpl_picwordx3.htm'),
(18, 'modText', '从右到左竖写', 'tpl_text_1.htm'),
(20, 'modTraFlash', '移动竖条', 'tpl_flash2.htm'),
(21, 'modTraFlash', '光球光芒时隐时现', 'tpl_flash3.htm'),
(22, 'modTraFlash', '米字星光', 'tpl_flash4.htm'),
(45, 'modWordTT', '标题+4组链接', 'tpl_wordttx4.htm'),
(44, 'modWordTT', '标题+3组链接', 'tpl_wordttx3.htm'),
(43, 'modWordTT', '标题+2组链接', 'tpl_wordttx2.htm'),
(202, 'modNewsSearchForm', '竖式搜索表单', 'tpl_news_searchform_h.htm'),
(299, 'modShopList', '商品名/图片/简介/价格', 'tpl_shoplist_4.htm'),
(296, 'modShopList', '商品名/图片/简介单列', 'tpl_shoplist_1.htm'),
(205, 'modCommentSearchForm', '竖式搜索表单', 'tpl_comment_searchform_h.htm'),
(206, 'modSearchForm', '竖式搜索表单', 'tpl_searchform_h.htm'),
(207, 'modButtomInfo', '灰色渐变背景', 'tpl_bottominfo_1.htm'),
(208, 'modMemberTags', '头像+三组积分+推荐标签3', 'tpl_membertags_1.htm'),
(209, 'modMemberTags', '头像+推荐标签3', 'tpl_membertags_2.htm'),
(210, 'modMemberRank1', '小头像+昵称+积分', 'tpl_memberrank_head.htm'),
(211, 'modMemberRank2', '小头像+昵称+积分', 'tpl_memberrank_head.htm'),
(212, 'modMemberRank3', '小头像+昵称+积分', 'tpl_memberrank_head.htm'),
(213, 'modMemberRank4', '小头像+昵称+积分', 'tpl_memberrank_head.htm'),
(214, 'modMemberRank5', '小头像+昵称+积分', 'tpl_memberrank_head.htm'),
(215, 'modHeadTraFlash', '移动竖条', 'tpl_flash2.htm'),
(216, 'modHeadTraFlash', '光球光芒时隐时现', 'tpl_flash3.htm'),
(217, 'modHeadTraFlash', '米字星光', 'tpl_flash4.htm'),
(218, 'modHeadBgSource', '头部效果图片+圆角遮罩(5px)', 'tpl_headbg_circle.htm'),
(219, 'modHeadBgSource', '头部效果图片+圆角遮罩(9px)', 'tpl_headbg_circle9.htm'),
(343, 'modTopMenu', '自定义菜单', 'tpl_topmenu_1.htm'),
(221, 'modBgSound', '显示播放器', 'tpl_bgsound_show.htm'),
(222, 'modFormGroup', '列表式', 'tpl_formgroup_list.htm'),
(223, 'modNewsList', '标题+时间(微软雅黑,14px)', 'tpl_newslist_time_big.htm'),
(325, 'modFeedBackSmallForm', '小型留言表单(适合放在左右侧)', 'tpl_feedback_smallform1.htm'),
(280, 'modShopTwoClass', '商品二级分类树型风格', 'tpl_shoptwoclass_1.htm'),
(261, 'modDropDownMenu', '圆角标签二级下拉菜单模板', 'tpl_dropdownmenu_6.htm'),
(321, 'modShopList', '150*150橱窗式商品展示', 'tpl_shoplist_10.htm'),
(315, 'modShopSmallCart', '顶部购物车提示式样', 'tpl_shop_smallcart_top.htm'),
(314, 'modMemberMenu', '二级树形菜单', 'tpl_qqmenu_2.htm'),
(266, 'modBottomMenu', '底部菜单之纯文字菜单模板', 'tpl_bottommenu_1.htm'),
(267, 'modNewsList', '双列文章标题模板', 'tpl_newslist_mul.htm'),
(268, 'modPageTitleMenu', '圆角按钮型网页标题菜单', 'tpl_page_titlemenu_b1.htm'),
(270, 'modCommentQuery', '留言问答风格', 'tpl_comment_query_pw.htm'),
(271, 'modCommentContent', '留言问答风格', 'tpl_comment_content_pw.htm'),
(272, 'modMemberMenu', '圆角按钮仿QQ菜单模板', 'tpl_qqmenu_1.htm'),
(273, 'modNewsList', '标题 时间（反白）', 'tpl_newslist_time_white.htm'),
(274, 'modPageTitleMenu', '纯色背景网页标题菜单', 'tpl_page_titlemenu_b2.htm'),
(320, 'modShopList', '230*230橱窗式商品展示', 'tpl_shoplist_9.htm'),
(276, 'modPageTitleMenu', '深灰色按钮菜单', 'tpl_page_titlemenu_b7.htm'),
(312, 'modChannelMenu', '标签式菜单(单色)', 'tpl_channelmenu_1030.htm'),
(278, 'modPagePicList', '图片 标题 摘要,每行两个', 'tpl_page_piclist_2.htm'),
(298, 'modShopList', '商品名/图片/参数列/价格', 'tpl_shoplist_3.htm'),
(326, 'modMainMenu', '自定义模版', 'tpl_mainmenu_dolphin.htm'),
(328, 'modLoginForm', '自定义模版', 'tpl_loginform_dolphin.htm'),
(348, 'modShopList', '自定义模版', 'tpl_shoplist_recomm.htm'),
(349, 'modShopList', '畅销单品', 'tpl_shoplist_diy.htm'),
(334, 'modShopQuery', '自定义模版', 'tpl_shop_query_diy.htm'),
(354, 'modShopSearchForm', '自定义模版', 'tpl_shop_searchform_1.htm'),
(336, 'modPageTitleMenu', '自定义模版', 'tpl_page_menu_dolphin.htm'),
(337, 'modNewsGlobalQuery', '自定义模版', 'tpl_newsquery_diy.htm'),
(338, 'modNewsQuery', '自定义模版', 'tpl_newsquery_diy.htm'),
(339, 'modNewsClass', '自定义模版', 'tpl_newsclass_dolphin.htm'),
(340, 'modMemberMenu', '自定义模版', 'tpl_qqmenu_3.htm'),
(342, 'modDiyTemp', '自定义模版', 'tpl_diy_pw1.htm'),
(345, 'modShopSmallCart', '自定义模版', 'tpl_shop_smallcart_1.htm'),
(346, 'modNewsList', '自定义模版', 'tpl_newslist_1.htm'),
(347, 'modVote', '自定义模版', 'tpl_vote_dolphin.htm'),
(350, 'modShopList', '分类推荐', 'tpl_shoplist_cat.htm'),
(351, 'modPageTitleMenu', '内页模版', 'tpl_page_menu_1.htm'),
(352, 'modShopBrandAll', '自定义模版', 'tpl_shop_brandall_1.htm'),
(353, 'modShopBrandQuery', '自定义模版', 'tpl_shop_brandquery_1.htm'),
(355, 'modShopList', '商品名/图片/品牌/参数列/价格(左右布局)', 'tpl_shoplist_5.htm');

-- --------------------------------------------------------

--
-- 表的结构 `dev_base_version`
--

CREATE TABLE IF NOT EXISTS `dev_base_version` (
  `version` varchar(30) NOT NULL default '',
  `release` int(8) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dev_base_version`
--

INSERT INTO `dev_base_version` (`version`, `release`) VALUES
('1.0.0', 20090215),
('1.1.0', 20090320),
('1.1.1', 20090326),
('1.1.2', 20090327),
('1.1.3', 20090328),
('1.1.4', 20090401),
('1.1.5', 20090402),
('1.1.6', 20090412),
('1.1.7', 20090418),
('1.1.8', 20090419),
('1.1.9', 20090420),
('1.1.10', 20090421),
('1.2.0', 20090428),
('1.2.1', 20090504),
('1.2.2', 20090508),
('1.2.3', 20090514),
('1.2.4', 20090612),
('1.2.5', 20090615),
('1.2.6', 20090624),
('1.2.7', 20090728),
('1.2.8', 20090801),
('1.2.9', 20090802),
('1.2.10', 20090803),
('1.2.11', 20090804),
('1.2.12', 20090820),
('1.3.0', 20090828),
('1.3.1', 20090829),
('1.3.2', 20090830),
('1.3.3', 20090831),
('1.3.4', 20090901),
('1.3.5', 20090902),
('1.3.6', 20090903),
('1.3.7', 20090904),
('1.3.15', 20090912),
('1.3.8', 20090905),
('1.3.9', 20090906),
('1.3.11', 20090908),
('1.3.12', 20090909),
('1.3.16', 20091009),
('1.3.17', 20091010),
('1.3.18', 20091112),
('1.3.19', 20100623),
('1.4.0', 20100830),
('1.4.1', 20100920),
('1.4.2', 20100921),
('1.4.3', 20100925),
('1.5.0', 20111209),
('', 20120407),
('', 20120407),
('', 20120408),
('', 20120408),
('', 20120410),
('', 20120410);

-- --------------------------------------------------------

--
-- 表的结构 `dev_comment`
--

CREATE TABLE IF NOT EXISTS `dev_comment` (
  `id` int(20) NOT NULL auto_increment,
  `pid` int(20) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `rid` int(20) NOT NULL default '0',
  `contype` varchar(30) NOT NULL default 'comment',
  `pname` varchar(100) NOT NULL default '',
  `title` varchar(200) NOT NULL default '',
  `body` text,
  `pj1` int(1) NOT NULL default '3',
  `pj2` int(1) NOT NULL default '3',
  `pj3` int(1) NOT NULL default '3',
  `dtime` int(11) NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  `ip` varchar(16) NOT NULL default '',
  `iffb` int(1) NOT NULL default '0',
  `tuijian` int(1) NOT NULL default '0',
  `cl` int(10) NOT NULL default '0',
  `lastname` varchar(50) NOT NULL default '',
  `lastmemberid` int(12) NOT NULL default '0',
  `backcount` int(12) NOT NULL default '0',
  `picsrc` varchar(255) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  `memberid` int(20) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=523 ;

--
-- 转存表中的数据 `dev_comment`
--

INSERT INTO `dev_comment` (`id`, `pid`, `catid`, `rid`, `contype`, `pname`, `title`, `body`, `pj1`, `pj2`, `pj3`, `dtime`, `uptime`, `ip`, `iffb`, `tuijian`, `cl`, `lastname`, `lastmemberid`, `backcount`, `picsrc`, `xuhao`, `memberid`) VALUES
(522, 0, 11, 7, 'comment', '游客', '对六安瓜片的评论', '不错', 3, 3, 3, 1289183656, 1289183656, '192.168.1.123', 1, 0, 6, '游客', -1, 0, '', 1, -1);

-- --------------------------------------------------------

--
-- 表的结构 `dev_comment_cat`
--

CREATE TABLE IF NOT EXISTS `dev_comment_cat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(6) NOT NULL default '0',
  `cat` varchar(50) NOT NULL default '',
  `catpath` varchar(255) NOT NULL,
  `coltype` varchar(30) NOT NULL default '',
  `xuhao` int(4) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '0',
  `ifbbs` int(1) NOT NULL default '1',
  `ifshow` int(1) NOT NULL default '1',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- 转存表中的数据 `dev_comment_cat`
--

INSERT INTO `dev_comment_cat` (`catid`, `pid`, `cat`, `catpath`, `coltype`, `xuhao`, `moveable`, `ifbbs`, `ifshow`) VALUES
(1, 0, '文章点评', '0001:', 'news', 2, 0, 0, 1),
(11, 0, '商品点评', '0011:', 'shop', 1, 0, 0, 1),
(112, 0, '网友留言', '0112:', 'comment', 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dev_comment_config`
--

CREATE TABLE IF NOT EXISTS `dev_comment_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dev_comment_config`
--

INSERT INTO `dev_comment_config` (`xuhao`, `vname`, `settype`, `colwidth`, `variable`, `value`, `intro`) VALUES
(5, '匿名点评是否审核', 'YN', '30', 'noMembercheck', '0', '匿名发表、回复点评时是否审核'),
(7, '点评图片上传尺寸限制(Byte)', 'input', '30', 'EditPicLimit', '204800', '发表点评时，编辑器内上传图片大小的限制'),
(6, '未登录时是否允许上传图片', 'YN', '30', 'NoMemberUpPic', '0', '未登录会员时,是否允许在编辑器内上传图片(备注:会员登录后发表点评是否可以上传图片，在会员权限中设置)'),
(1, '模块频道名称', 'input', '30', 'ChannelName', '网友点评', '本模块对应的频道名称，如“网友点评”；用于显示在网页标题、当前位置提示条等处'),
(2, '是否在当前位置提示条显示模块频道名称', 'YN', '30', 'ChannelNameInNav', '1', '是否在当前位置提示条显示模块频道名称'),
(8, '点评关键词过滤', 'textarea', '30', 'KeywordDeny', '', '点评禁止的词语，多个以逗号分割');

-- --------------------------------------------------------

--
-- 表的结构 `dev_feedback`
--

CREATE TABLE IF NOT EXISTS `dev_feedback` (
  `id` int(3) NOT NULL auto_increment,
  `groupid` int(5) NOT NULL default '0',
  `field_caption` varchar(200) NOT NULL default '',
  `field_type` int(1) NOT NULL default '0',
  `field_size` int(5) NOT NULL default '0',
  `field_name` varchar(200) NOT NULL default '',
  `field_value` varchar(255) NOT NULL default '',
  `field_null` int(1) NOT NULL default '0',
  `value_repeat` int(1) NOT NULL default '0',
  `field_intro` varchar(255) NOT NULL default '',
  `use_field` int(1) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '0',
  `xuhao` int(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1496 ;

--
-- 转存表中的数据 `dev_feedback`
--

INSERT INTO `dev_feedback` (`id`, `groupid`, `field_caption`, `field_type`, `field_size`, `field_name`, `field_value`, `field_null`, `value_repeat`, `field_intro`, `use_field`, `moveable`, `xuhao`) VALUES
(1, 0, '留言标题', 1, 399, 'title', '', 1, 1, '', 1, 1, 1),
(2, 0, '留言内容', 2, 399, 'content', '', 0, 1, '', 1, 0, 2),
(3, 0, '您的姓名', 1, 399, 'name', '', 0, 1, '', 0, 0, 3),
(5, 0, '联系电话', 1, 399, 'tel', '', 0, 1, '', 0, 0, 5),
(6, 0, '联系地址', 1, 399, 'address', '', 0, 1, '', 0, 0, 6),
(7, 0, '电子邮件', 1, 399, 'email', '', 0, 1, '', 0, 0, 7),
(8, 0, '网址URL', 1, 399, 'url', '', 0, 1, '', 0, 0, 8),
(9, 0, 'QQ号码', 1, 399, 'qq', '', 0, 1, '', 0, 0, 9),
(10, 0, '公司名称', 1, 399, 'company', '', 0, 1, '', 0, 0, 10),
(11, 0, '公司地址', 1, 399, 'company_address', '', 0, 1, '', 0, 0, 11),
(4, 0, '性　　别', 5, 399, 'sex', '男;女', 0, 1, '', 0, 0, 4),
(12, 0, '邮政编码', 1, 399, 'zip', '', 0, 1, '', 0, 0, 12),
(13, 0, '传真号码', 1, 399, 'fax', '', 0, 1, '', 0, 0, 13),
(14, 0, '产品编号', 1, 399, 'products_id', '', 0, 1, '', 0, 0, 14),
(15, 0, '产品名称', 1, 399, 'products_name', '', 0, 1, '', 0, 0, 15),
(16, 0, '订购数量', 1, 399, 'products_num', '', 0, 1, '', 0, 0, 16),
(19, 0, '自定义一', 5, 399, 'custom1', '100;200;300;400;500', 0, 1, '', 0, 0, 17),
(18, 0, '自定义二', 5, 399, 'custom2', '100;200;300;400;500', 0, 1, '', 0, 0, 18),
(17, 0, '自定义三', 5, 399, 'custom3', '100;200;300;400;500', 0, 1, '', 0, 0, 19),
(20, 0, '自定义四', 1, 399, 'custom4', '', 0, 1, '', 0, 0, 20),
(21, 0, '自定义五', 1, 399, 'custom5', '', 0, 1, '', 0, 0, 21),
(22, 0, '自定义六', 1, 399, 'custom6', '', 0, 1, '', 0, 0, 22),
(23, 0, '自定义七', 1, 399, 'custom7', '', 0, 1, '', 0, 0, 23),
(1145, 1, '自定义二', 5, 399, 'custom2', '100;200;300;400;500', 0, 1, '', 0, 0, 18),
(1146, 1, '自定义三', 5, 399, 'custom3', '100;200;300;400;500', 0, 1, '', 0, 0, 19),
(1147, 1, '自定义四', 1, 399, 'custom4', '', 0, 1, '', 0, 0, 20),
(1148, 1, '自定义五', 1, 399, 'custom5', '', 0, 1, '', 0, 0, 21),
(1149, 1, '自定义六', 1, 399, 'custom6', '', 0, 1, '', 0, 0, 22),
(1150, 1, '自定义七', 1, 399, 'custom7', '', 0, 1, '', 0, 0, 23),
(1143, 1, '订购数量', 1, 399, 'products_num', '', 0, 1, '', 0, 0, 16),
(1144, 1, '自定义一', 5, 399, 'custom1', '100;200;300;400;500', 0, 1, '', 0, 0, 17),
(1142, 1, '产品名称', 1, 399, 'products_name', '', 0, 1, '', 0, 0, 15),
(1141, 1, '产品编号', 1, 399, 'products_id', '', 0, 1, '', 0, 0, 14),
(1140, 1, '传真号码', 1, 399, 'fax', '', 0, 1, '', 0, 0, 13),
(1139, 1, '邮政编码', 1, 399, 'zip', '', 0, 1, '', 0, 0, 12),
(1138, 1, '性别称谓', 5, 399, 'sex', '先生;女士', 0, 1, '', 0, 0, 9),
(1136, 1, '客户名称', 1, 399, 'company', '', 1, 1, '', 1, 0, 3),
(1137, 1, '公司地址', 1, 399, 'company_address', '', 0, 1, '', 0, 0, 11),
(1135, 1, 'QQ/MSN', 1, 399, 'qq', '', 0, 1, '', 1, 0, 9),
(1134, 1, '网址URL', 1, 399, 'url', '', 0, 1, '', 0, 0, 8),
(1133, 1, '电子邮件', 1, 399, 'email', '', 0, 1, '', 0, 0, 7),
(1132, 1, '联系地址', 1, 399, 'address', '', 0, 1, '', 0, 0, 6),
(1131, 1, '联系电话', 1, 399, 'tel', '', 1, 1, '', 1, 0, 5),
(1130, 1, '联 系 人', 1, 399, 'name', '', 0, 1, '', 1, 0, 4),
(1129, 1, '详细描述', 2, 399, 'content', '', 1, 1, '', 1, 0, 2),
(1128, 1, '留言主题', 1, 399, 'title', '', 1, 1, '', 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dev_feedback_group`
--

CREATE TABLE IF NOT EXISTS `dev_feedback_group` (
  `id` int(3) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '1',
  `ifano` int(11) NOT NULL default '0',
  `allowmembertype` varchar(255) NOT NULL,
  `allowfeedback` char(255) NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `dev_feedback_group`
--

INSERT INTO `dev_feedback_group` (`id`, `groupname`, `xuhao`, `moveable`, `ifano`, `allowmembertype`, `allowfeedback`, `intro`) VALUES
(1, '请您留言', 1, 0, 1, '|26|', '|3|', '请您留言');

-- --------------------------------------------------------

--
-- 表的结构 `dev_feedback_info`
--

CREATE TABLE IF NOT EXISTS `dev_feedback_info` (
  `id` int(12) NOT NULL auto_increment,
  `groupid` int(5) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `name` varchar(200) NOT NULL default '',
  `sex` varchar(10) NOT NULL default '',
  `tel` varchar(100) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `qq` varchar(20) NOT NULL default '',
  `company` varchar(255) NOT NULL default '',
  `company_address` varchar(255) NOT NULL default '',
  `zip` varchar(6) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `products_id` varchar(100) NOT NULL default '',
  `products_name` varchar(200) NOT NULL default '',
  `products_num` varchar(9) NOT NULL default '',
  `custom1` text NOT NULL,
  `custom2` text NOT NULL,
  `custom3` text NOT NULL,
  `custom4` text NOT NULL,
  `custom5` text NOT NULL,
  `custom6` text NOT NULL,
  `custom7` text NOT NULL,
  `ip` varchar(20) NOT NULL default '',
  `time` int(11) NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  `memberid` int(12) NOT NULL default '0',
  `stat` int(2) NOT NULL default '0',
  `adminid` int(5) NOT NULL default '0',
  `coadminid` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=170 ;

--
-- 转存表中的数据 `dev_feedback_info`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_cat`
--

CREATE TABLE IF NOT EXISTS `dev_hz_cat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) default NULL,
  `cat` char(100) default NULL,
  `xuhao` int(12) default NULL,
  `catpath` char(255) default NULL,
  `nums` int(20) default NULL,
  `tj` int(1) NOT NULL default '0',
  `ifchannel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dev_hz_cat`
--

INSERT INTO `dev_hz_cat` (`catid`, `pid`, `cat`, `xuhao`, `catpath`, `nums`, `tj`, `ifchannel`) VALUES
(1, 0, '玩具', 1, '0001:', 0, 0, 0),
(2, 1, '电动玩具', 1, '0001:0002:', 0, 0, 0),
(3, 1, '毛绒玩具', 2, '0001:0003:', 0, 0, 0),
(4, 0, '数码通讯', 2, '0004:', 0, 0, 0),
(5, 2, '触电玩具', 1, '0001:0002:0005:', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_con`
--

CREATE TABLE IF NOT EXISTS `dev_hz_con` (
  `id` int(12) NOT NULL auto_increment,
  `catid` int(12) NOT NULL default '0',
  `catpath` varchar(255) NOT NULL default '',
  `pcatid` int(12) NOT NULL default '0',
  `contype` varchar(20) NOT NULL default 'huanzeng',
  `title` varchar(255) NOT NULL default '',
  `cent` int(10) default '0',
  `kucun` int(20) NOT NULL default '0',
  `salenums` int(20) NOT NULL default '0',
  `body` text,
  `dtime` int(11) default '0',
  `xuhao` int(5) default '0',
  `cl` int(20) default NULL,
  `tj` int(1) default NULL,
  `iffb` int(1) default '0',
  `ifbold` int(1) default '0',
  `ifred` varchar(20) default NULL,
  `type` varchar(30) NOT NULL default '',
  `src` varchar(150) NOT NULL default '',
  `uptime` int(11) default '0',
  `author` varchar(100) default NULL,
  `source` varchar(100) default NULL,
  `memberid` varchar(100) default NULL,
  `proj` varchar(255) NOT NULL default '',
  `secure` int(11) NOT NULL default '0',
  `memo` text NOT NULL,
  `prop1` char(255) NOT NULL default '',
  `prop2` char(255) NOT NULL default '',
  `prop3` char(255) NOT NULL default '',
  `prop4` char(255) NOT NULL default '',
  `prop5` char(255) NOT NULL default '',
  `prop6` char(255) NOT NULL default '',
  `prop7` char(255) NOT NULL default '',
  `prop8` char(255) NOT NULL default '',
  `prop9` char(255) NOT NULL default '',
  `prop10` char(255) NOT NULL default '',
  `prop11` char(255) NOT NULL default '',
  `prop12` char(255) NOT NULL default '',
  `prop13` char(255) NOT NULL default '',
  `prop14` char(255) NOT NULL default '',
  `prop15` char(255) NOT NULL default '',
  `prop16` char(255) NOT NULL default '',
  `prop17` char(255) NOT NULL default '',
  `prop18` char(255) NOT NULL default '',
  `prop19` char(255) NOT NULL default '',
  `prop20` char(255) NOT NULL default '',
  `tags` varchar(255) NOT NULL,
  `zhichi` int(5) NOT NULL default '0',
  `fandui` int(5) NOT NULL default '0',
  `tplog` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `dev_hz_con`
--

INSERT INTO `dev_hz_con` (`id`, `catid`, `catpath`, `pcatid`, `contype`, `title`, `cent`, `kucun`, `salenums`, `body`, `dtime`, `xuhao`, `cl`, `tj`, `iffb`, `ifbold`, `ifred`, `type`, `src`, `uptime`, `author`, `source`, `memberid`, `proj`, `secure`, `memo`, `prop1`, `prop2`, `prop3`, `prop4`, `prop5`, `prop6`, `prop7`, `prop8`, `prop9`, `prop10`, `prop11`, `prop12`, `prop13`, `prop14`, `prop15`, `prop16`, `prop17`, `prop18`, `prop19`, `prop20`, `tags`, `zhichi`, `fandui`, `tplog`) VALUES
(1, 2, '0001:0002:', 0, 'huanzeng', '翻滚遥控车', 300, 20, 0, '<p>会跳舞的火球特技<b>遥控车翻滚</b>*有音乐</p>', 1254194415, 0, 44, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20090929/1254194415.jpg', 1257841862, '系统管理员', '', '0', '', 0, '会跳舞的火球特技遥控车翻滚*有音乐', '5号', '塑料', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(2, 3, '0001:0003:', 0, 'huanzeng', '布绒狗狗', 200, 20, 0, '布绒狗狗的介绍 ', 1254204709, 0, 90, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20091023/1256260916.jpg', 1257841784, '系统管理员', '', '0', '', 0, '布绒狗狗的简述', '100*45*30(mm)', '650g', '黄色', '绒布', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(4, 2, '0001:0002:', 0, 'huanzeng', '电动玩具警车', 300, 20, 0, '<p>电动玩具警车的介绍</p>', 1254205119, 0, 83, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20090929/1254206267.jpg', 1254206267, '系统管理员', '', '0', '', 0, '电动玩具警车的简述', '5号', '塑料', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(6, 1, '0001:', 0, 'huanzeng', '变形金刚－大黄蜂', 500, 30, 0, '大黄蜂的赠品介绍', 1257842529, 0, 26, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20091110/1257842529.jpg', 1257842529, '系统管理员', '', '0', '', 0, '大黄蜂的简述', '150×30×25', 'JG－526', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_config`
--

CREATE TABLE IF NOT EXISTS `dev_hz_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dev_hz_config`
--

INSERT INTO `dev_hz_config` (`xuhao`, `vname`, `settype`, `colwidth`, `variable`, `value`, `intro`) VALUES
(1, '模块频道名称', 'input', '30', 'ChannelName', '积分换赠', '本模块对应的频道名称，如“积分换赠”；用于显示在网页标题、当前位置提示条等处'),
(2, '是否在当前位置提示条显示模块频道名称', 'YN', '30', 'ChannelNameInNav', '1', '是否在当前位置提示条显示模块频道名称'),
(3, '积分换赠时采用的积分类型', 'select', '30', 'CentType', '5', '请选择积分换赠积分的类型');

-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_mzone`
--

CREATE TABLE IF NOT EXISTS `dev_hz_mzone` (
  `id` int(6) NOT NULL auto_increment,
  `memberid` int(12) NOT NULL default '0',
  `name` varchar(50) NOT NULL,
  `zone` varchar(100) default NULL,
  `postcode` varchar(20) NOT NULL,
  `tel` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dev_hz_mzone`
--

INSERT INTO `dev_hz_mzone` (`id`, `memberid`, `name`, `zone`, `postcode`, `tel`) VALUES
(1, 156, 'aa', 'grg', 'ggg', 'fefe'),
(2, 155, 'google', 'hhh', 'hhh', 'rhr');

-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_order`
--

CREATE TABLE IF NOT EXISTS `dev_hz_order` (
  `orderid` int(8) NOT NULL auto_increment,
  `OrderNo` varchar(30) NOT NULL default '',
  `memberid` int(6) NOT NULL default '0',
  `user` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `tel` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `totalcent` int(10) NOT NULL default '0',
  `iflook` int(1) NOT NULL default '0',
  `ifyun` int(1) NOT NULL default '0',
  `ifpay` int(1) NOT NULL default '0',
  `ifok` int(1) NOT NULL default '0',
  `iftui` int(1) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  `dtime` int(11) NOT NULL default '0',
  `paytime` int(11) NOT NULL default '0',
  `yuntime` int(11) NOT NULL default '0',
  `bz` text,
  `items` text,
  PRIMARY KEY  (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dev_hz_order`
--

INSERT INTO `dev_hz_order` (`orderid`, `OrderNo`, `memberid`, `user`, `name`, `tel`, `address`, `postcode`, `totalcent`, `iflook`, `ifyun`, `ifpay`, `ifok`, `iftui`, `ip`, `dtime`, `paytime`, `yuntime`, `bz`, `items`) VALUES
(1, '100001', 156, 'aaaaaa', 'aa', 'fefe', 'grg', 'ggg', 300, 0, 0, 1, 0, 0, '192.168.1.123', 1284086106, 1284086106, 0, '', '电动玩具警车(1) '),
(2, '100002', 156, 'aaaaaa', 'aa', 'fefe', 'grg', 'ggg', 500, 0, 0, 1, 0, 0, '192.168.1.123', 1284364412, 1284364412, 0, '', '变形金刚－大黄蜂(1) '),
(3, '100003', 156, 'aaaaaa', 'aa', 'fefe', 'grg', 'ggg', 500, 0, 0, 1, 0, 0, '192.168.1.123', 1286947118, 1286947118, 0, '', '变形金刚－大黄蜂(1) '),
(4, '100004', 155, 'aaaaa', 'google', 'rhr', 'hhh', 'hhh', 500, 0, 0, 1, 0, 0, '192.168.1.123', 1288943495, 1288943495, 0, '', '变形金刚－大黄蜂(1) '),
(5, '100005', 155, 'aaaaa', 'google', 'rhr', 'hhh', 'hhh', 200, 0, 0, 1, 0, 0, '192.168.1.123', 1289178094, 1289178094, 0, '', '布绒狗狗(1) ');

-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_orderitems`
--

CREATE TABLE IF NOT EXISTS `dev_hz_orderitems` (
  `id` int(8) NOT NULL auto_increment,
  `memberid` int(6) NOT NULL default '0',
  `orderid` int(6) NOT NULL default '0',
  `gid` int(6) NOT NULL default '0',
  `bn` varchar(100) NOT NULL default '',
  `goods` varchar(100) NOT NULL default '0',
  `nums` int(6) NOT NULL default '0',
  `cent` int(10) NOT NULL default '0',
  `ifyun` int(1) NOT NULL default '0',
  `iftui` int(1) NOT NULL default '0',
  `dtime` int(11) NOT NULL default '0',
  `yuntime` int(11) NOT NULL default '0',
  `msg` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dev_hz_orderitems`
--

INSERT INTO `dev_hz_orderitems` (`id`, `memberid`, `orderid`, `gid`, `bn`, `goods`, `nums`, `cent`, `ifyun`, `iftui`, `dtime`, `yuntime`, `msg`) VALUES
(1, 156, 1, 4, '', '电动玩具警车', 1, 300, 0, 0, 1284086106, 0, NULL),
(2, 156, 2, 6, '', '变形金刚－大黄蜂', 1, 500, 0, 0, 1284364412, 0, NULL),
(3, 156, 3, 6, '', '变形金刚－大黄蜂', 1, 500, 0, 0, 1286947118, 0, NULL),
(4, 155, 4, 6, '', '变形金刚－大黄蜂', 1, 500, 0, 0, 1288943495, 0, NULL),
(5, 155, 5, 2, '', '布绒狗狗', 1, 200, 0, 0, 1289178094, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_pages`
--

CREATE TABLE IF NOT EXISTS `dev_hz_pages` (
  `id` int(12) NOT NULL auto_increment,
  `productid` int(12) NOT NULL default '0',
  `src` varchar(150) NOT NULL default '',
  `xuhao` int(5) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_hz_pages`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_hz_prop`
--

CREATE TABLE IF NOT EXISTS `dev_hz_prop` (
  `id` int(20) NOT NULL auto_increment,
  `catid` int(20) NOT NULL default '0',
  `propname` char(30) default NULL,
  `xuhao` int(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `xuhao` (`xuhao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `dev_hz_prop`
--

INSERT INTO `dev_hz_prop` (`id`, `catid`, `propname`, `xuhao`) VALUES
(3, 2, '使用电池型号', 1),
(4, 2, '材质', 2),
(5, 3, '大小', 1),
(6, 3, '重量', 2),
(7, 3, '颜色', 3),
(8, 3, '布质', 4),
(9, 1, '规格', 1),
(10, 1, '型号', 2);

-- --------------------------------------------------------

--
-- 表的结构 `dev_job`
--

CREATE TABLE IF NOT EXISTS `dev_job` (
  `id` int(12) NOT NULL auto_increment,
  `jobname` varchar(255) NOT NULL default '',
  `jobtype` varchar(20) NOT NULL default '',
  `experience` varchar(100) NOT NULL default '',
  `education` varchar(50) NOT NULL default '',
  `langneed` varchar(50) NOT NULL default '',
  `langlevel` varchar(50) NOT NULL default '',
  `pnums` int(5) NOT NULL default '0',
  `jobaddr` varchar(200) NOT NULL default '',
  `jobintro` text,
  `jobrequest` text NOT NULL,
  `jobstat` int(1) NOT NULL default '0',
  `contact` varchar(50) NOT NULL default '',
  `tel` varchar(50) NOT NULL default '',
  `email` varchar(200) NOT NULL default '',
  `dtime` int(11) default '0',
  `uptime` int(11) default '0',
  `endtime` int(11) default '0',
  `xuhao` int(5) default '0',
  `cl` int(20) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  `iffb` int(1) default '0',
  `contype` varchar(20) NOT NULL default 'job',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `dev_job`
--

INSERT INTO `dev_job` (`id`, `jobname`, `jobtype`, `experience`, `education`, `langneed`, `langlevel`, `pnums`, `jobaddr`, `jobintro`, `jobrequest`, `jobstat`, `contact`, `tel`, `email`, `dtime`, `uptime`, `endtime`, `xuhao`, `cl`, `tj`, `iffb`, `contype`) VALUES
(7, '采购部经理助理', '全职', '3年以上', '大专', '', '', 1, '上海', '采购部经理助理', '采购部经理助理', 1, '', '', '', 1256218313, 1256218313, 0, 0, 16, 0, 1, 'job'),
(6, '营销总监', '全职', '1年以上', '本科', '', '', 1, '上海', '营销总监1名', '营销总监1名', 1, '', '', '', 1256218268, 1284102747, 0, 0, 13, 0, 1, 'job'),
(4, '客户服务人员', '全职', '3年以上', '本科', '', '', 2, '上海', '客户服务人员2名\r\n', '客户服务人员2名\r\n', 1, '', '', '', 1252052940, 1256218232, 0, 0, 23, 0, 1, 'job');

-- --------------------------------------------------------

--
-- 表的结构 `dev_job_form`
--

CREATE TABLE IF NOT EXISTS `dev_job_form` (
  `id` int(3) NOT NULL auto_increment,
  `field_caption` varchar(200) NOT NULL default '',
  `field_type` int(1) NOT NULL default '0',
  `field_size` int(5) NOT NULL default '0',
  `field_name` varchar(200) NOT NULL default '',
  `field_value` varchar(255) NOT NULL default '',
  `field_null` int(1) NOT NULL default '0',
  `value_repeat` int(1) NOT NULL default '0',
  `field_intro` varchar(255) NOT NULL default '',
  `use_field` int(1) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '0',
  `xuhao` int(3) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `dev_job_form`
--

INSERT INTO `dev_job_form` (`id`, `field_caption`, `field_type`, `field_size`, `field_name`, `field_value`, `field_null`, `value_repeat`, `field_intro`, `use_field`, `moveable`, `xuhao`) VALUES
(1, '姓　　名', 1, 200, 'title', '', 1, 1, '', 1, 1, 1),
(2, '教育经历', 2, 399, 'content', '', 1, 1, '', 1, 0, 14),
(3, '出生日期', 1, 200, 'name', '', 1, 1, '', 1, 0, 3),
(4, '性　　别', 5, 50, 'sex', '男;女', 1, 1, '', 1, 0, 2),
(5, '联系电话', 1, 200, 'tel', '', 1, 1, '', 1, 0, 9),
(6, '通信地址', 1, 300, 'address', '', 1, 1, '', 1, 0, 11),
(7, '电子邮箱', 1, 300, 'email', '', 1, 1, '', 1, 0, 12),
(8, '博客/主页', 1, 399, 'url', '', 0, 1, '', 0, 0, 18),
(9, 'QQ/MSN', 1, 399, 'qq', '', 0, 1, '', 0, 0, 19),
(10, '毕业院校', 1, 300, 'company', '', 1, 1, '', 1, 0, 5),
(11, '最高学历', 1, 200, 'company_address', '', 1, 1, '', 1, 0, 6),
(12, '邮政编码', 1, 399, 'zip', '', 0, 1, '', 0, 0, 19),
(13, '手机号码', 1, 200, 'fax', '', 0, 1, '', 1, 0, 10),
(14, '毕业专业', 1, 200, 'products_id', '', 1, 1, '', 1, 0, 7),
(15, '毕业时间', 1, 200, 'products_name', '', 1, 1, '', 1, 0, 8),
(16, '专业特长', 1, 399, 'products_num', '', 1, 1, '', 1, 0, 13),
(19, '婚姻状况', 5, 200, 'custom1', '未婚;已婚', 1, 1, '', 1, 0, 4),
(18, '工作经历', 2, 399, 'custom2', '', 1, 1, '', 1, 0, 15),
(17, '自定义三', 5, 399, 'custom3', '100;200;300;400;500', 0, 1, '', 0, 0, 19),
(20, '自定义四', 1, 399, 'custom4', '', 0, 1, '', 0, 0, 20),
(21, '自定义五', 1, 399, 'custom5', '', 0, 1, '', 0, 0, 21),
(22, '自定义六', 1, 399, 'custom6', '', 0, 1, '', 0, 0, 22),
(23, '自定义七', 1, 399, 'custom7', '', 0, 1, '', 0, 0, 23);

-- --------------------------------------------------------

--
-- 表的结构 `dev_job_telent`
--

CREATE TABLE IF NOT EXISTS `dev_job_telent` (
  `id` int(12) NOT NULL auto_increment,
  `jobid` int(6) NOT NULL default '0',
  `jobname` char(200) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `name` varchar(200) NOT NULL default '',
  `sex` varchar(10) NOT NULL default '',
  `tel` varchar(100) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `qq` varchar(20) NOT NULL default '',
  `company` varchar(255) NOT NULL default '',
  `company_address` varchar(255) NOT NULL default '',
  `zip` varchar(6) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `products_id` varchar(100) NOT NULL default '',
  `products_name` varchar(200) NOT NULL default '',
  `products_num` varchar(9) NOT NULL default '',
  `custom1` text NOT NULL,
  `custom2` text NOT NULL,
  `custom3` text NOT NULL,
  `custom4` text NOT NULL,
  `custom5` text NOT NULL,
  `custom6` text NOT NULL,
  `custom7` text NOT NULL,
  `fileurl` varchar(200) NOT NULL default '',
  `ip` varchar(20) NOT NULL default '',
  `time` int(11) NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  `stat` int(2) NOT NULL default '0',
  `fav` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_job_telent`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_member`
--

CREATE TABLE IF NOT EXISTS `dev_member` (
  `memberid` int(12) NOT NULL auto_increment,
  `membertypeid` int(3) NOT NULL default '0',
  `membergroupid` int(3) NOT NULL default '0',
  `user` varchar(30) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `company` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL default '',
  `birthday` int(8) NOT NULL default '0',
  `zoneid` int(10) NOT NULL default '0',
  `catid` int(10) NOT NULL default '0',
  `addr` varchar(255) NOT NULL default '',
  `tel` varchar(255) NOT NULL default '',
  `mov` varchar(255) NOT NULL default '',
  `postcode` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `url` varchar(255) NOT NULL default 'http://',
  `passtype` varchar(255) NOT NULL default '',
  `passcode` varchar(255) NOT NULL default '',
  `qq` varchar(100) NOT NULL default '',
  `msn` varchar(100) NOT NULL default '',
  `maillist` int(1) NOT NULL default '0',
  `bz` text,
  `pname` varchar(30) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `memberface` varchar(100) NOT NULL,
  `nowface` varchar(50) NOT NULL,
  `checked` int(1) NOT NULL default '0',
  `rz` int(1) NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `regtime` int(11) NOT NULL default '0',
  `exptime` int(11) NOT NULL default '0',
  `account` decimal(12,2) NOT NULL default '0.00',
  `paytotal` decimal(12,2) NOT NULL default '0.00',
  `buytotal` decimal(12,2) NOT NULL default '0.00',
  `cent1` int(10) NOT NULL default '0',
  `cent2` int(10) NOT NULL default '0',
  `cent3` int(10) NOT NULL default '0',
  `cent4` int(10) NOT NULL default '0',
  `cent5` int(10) NOT NULL default '0',
  `ip` varchar(26) NOT NULL default '',
  `logincount` int(20) NOT NULL default '0',
  `logintime` int(11) NOT NULL default '0',
  `loginip` varchar(50) NOT NULL default '',
  `salesname` varchar(30) NOT NULL,
  PRIMARY KEY  (`memberid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=160 ;

--
-- 转存表中的数据 `dev_member`
--

INSERT INTO `dev_member` (`memberid`, `membertypeid`, `membergroupid`, `user`, `password`, `name`, `company`, `sex`, `birthday`, `zoneid`, `catid`, `addr`, `tel`, `mov`, `postcode`, `email`, `url`, `passtype`, `passcode`, `qq`, `msn`, `maillist`, `bz`, `pname`, `signature`, `memberface`, `nowface`, `checked`, `rz`, `tags`, `regtime`, `exptime`, `account`, `paytotal`, `buytotal`, `cent1`, `cent2`, `cent3`, `cent4`, `cent5`, `ip`, `logincount`, `logintime`, `loginip`, `salesname`) VALUES
(155, 26, 1, 'aaaaa', '594f803b380a41396ed63dca39503542', '张三', '', '1', 19800918, 1, 0, '上海徐汇区华亭家园2-1209', '021-12345678', '13967527790', '210002', 'aaa@www.cn', 'http://', '身份证', '330809198009181520', '99887766', 'alex@hotmail.com', 0, '', 'aaaaa', '', '', '4', 1, 0, '', 1256349783, 0, 0.00, 0.00, 0.00, 14, 0, 0, 0, 800, '192.168.0.101', 5, 1289179111, '192.168.1.123', ''),
(156, 26, 1, 'aaaaaa', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '', '', '', 0, 0, 0, '', '', '', '', 'gfef@cvd.cn', 'http://', '', '', '', '', 0, NULL, 'aaaaaa', '', '', '1', 1, 0, '', 1283925465, 0, 0.00, 0.00, 0.00, 525, 0, 0, 0, 400, '192.168.1.123', 16, 1286956661, '192.168.1.123', '');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_buylist`
--

CREATE TABLE IF NOT EXISTS `dev_member_buylist` (
  `id` int(12) NOT NULL auto_increment,
  `buyfrom` varchar(50) NOT NULL default '',
  `memberid` int(12) NOT NULL default '0',
  `orderid` int(12) NOT NULL default '0',
  `payid` int(12) NOT NULL default '0',
  `paytype` varchar(50) NOT NULL default '0',
  `payhb` varchar(30) NOT NULL default '',
  `payhl` decimal(12,4) NOT NULL default '0.0000',
  `paytotal` decimal(12,2) NOT NULL default '0.00',
  `daytime` int(11) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  `OrderNo` varchar(30) NOT NULL default '',
  `logname` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_member_buylist`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_member_cat`
--

CREATE TABLE IF NOT EXISTS `dev_member_cat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) NOT NULL default '0',
  `cat` char(100) NOT NULL default '',
  `xuhao` int(4) NOT NULL default '0',
  `catpath` char(255) NOT NULL default '',
  `nums` int(20) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_member_cat`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_member_centlog`
--

CREATE TABLE IF NOT EXISTS `dev_member_centlog` (
  `id` int(8) NOT NULL auto_increment,
  `memberid` int(12) NOT NULL default '0',
  `event` int(5) NOT NULL default '0',
  `dtime` int(11) NOT NULL default '0',
  `cent1` int(10) NOT NULL default '0',
  `cent2` int(10) NOT NULL default '0',
  `cent3` int(10) NOT NULL default '0',
  `cent4` int(10) NOT NULL default '0',
  `cent5` int(10) NOT NULL default '0',
  `memo` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `dev_member_centlog`
--

INSERT INTO `dev_member_centlog` (`id`, `memberid`, `event`, `dtime`, `cent1`, `cent2`, `cent3`, `cent4`, `cent5`, `memo`) VALUES
(1, 155, 111, 1256349783, 10, 0, 0, 0, 0, ''),
(2, 156, 111, 1283925465, 10, 0, 0, 0, 0, ''),
(3, 156, 114, 1284085306, 1, 0, 0, 0, 0, ''),
(4, 156, 114, 1284085841, 1, 0, 0, 0, 0, ''),
(5, 156, 0, 1284085904, 500, 0, 0, 0, 0, '后台录入积分备注'),
(6, 156, 0, 1284085984, 0, 0, 0, 0, 500, '后台录入积分备注'),
(7, 156, 0, 1284086106, 0, 0, 0, 0, -300, '积分换赠'),
(8, 156, 0, 1284086199, 0, 0, 0, 0, 200, '后台录入积分备注'),
(9, 156, 114, 1284093537, 1, 0, 0, 0, 0, ''),
(10, 156, 114, 1284094921, 1, 0, 0, 0, 0, ''),
(11, 157, 111, 1284104872, 10, 0, 0, 0, 0, ''),
(12, 156, 114, 1284104879, 1, 0, 0, 0, 0, ''),
(13, 156, 0, 1284364214, 0, 0, 0, 0, 0, '500'),
(14, 156, 114, 1284364230, 1, 0, 0, 0, 0, ''),
(15, 156, 0, 1284364248, 0, 0, 0, 0, 500, '后台录入积分备注'),
(16, 156, 0, 1284364412, 0, 0, 0, 0, -500, '积分换赠'),
(17, 156, 114, 1284427550, 1, 0, 0, 0, 0, ''),
(18, 156, 114, 1284428422, 1, 0, 0, 0, 0, ''),
(19, 155, 114, 1284433445, 1, 0, 0, 0, 0, ''),
(20, 156, 114, 1284602093, 1, 0, 0, 0, 0, ''),
(21, 156, 114, 1285809820, 1, 0, 0, 0, 0, ''),
(22, 156, 114, 1285809963, 1, 0, 0, 0, 0, ''),
(23, 156, 114, 1285810059, 1, 0, 0, 0, 0, ''),
(24, 156, 114, 1286873036, 1, 0, 0, 0, 0, ''),
(25, 156, 114, 1286946681, 1, 0, 0, 0, 0, ''),
(26, 156, 0, 1286946783, 0, 0, 0, 0, 500, '后台录入积分备注'),
(27, 156, 0, 1286947118, 0, 0, 0, 0, -500, '积分换赠'),
(28, 156, 114, 1286956661, 1, 0, 0, 0, 0, ''),
(29, 158, 111, 1286958794, 10, 0, 0, 0, 0, ''),
(30, 155, 114, 1288943333, 1, 0, 0, 0, 0, ''),
(31, 155, 0, 1288943388, 0, 0, 0, 0, 300, '后台录入积分备注'),
(32, 155, 0, 1288943404, 0, 0, 0, 0, 200, '后台录入积分备注'),
(33, 155, 0, 1288943495, 0, 0, 0, 0, -500, '积分换赠'),
(34, 155, 0, 1288948327, 0, 0, 0, 0, 1000, '后台录入积分备注'),
(35, 155, 114, 1289178081, 1, 0, 0, 0, 0, ''),
(36, 155, 0, 1289178094, 0, 0, 0, 0, -200, '积分换赠'),
(37, 155, 114, 1289179111, 1, 0, 0, 0, 0, ''),
(38, 159, 111, 1289185652, 10, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_centrule`
--

CREATE TABLE IF NOT EXISTS `dev_member_centrule` (
  `id` int(8) NOT NULL auto_increment,
  `coltype` varchar(30) NOT NULL,
  `name` char(100) NOT NULL default '',
  `event` int(5) NOT NULL default '0',
  `cent1` int(10) NOT NULL default '0',
  `cent2` int(10) NOT NULL default '0',
  `cent3` int(10) NOT NULL default '0',
  `cent4` int(10) NOT NULL default '0',
  `cent5` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `dev_member_centrule`
--

INSERT INTO `dev_member_centrule` (`id`, `coltype`, `name`, `event`, `cent1`, `cent2`, `cent3`, `cent4`, `cent5`) VALUES
(1, 'member', '新会员注册', 111, 10, 0, 0, 0, 0),
(6, 'member', '加好友', 112, 1, 0, 0, 0, 0),
(7, 'member', '发站内短信', 113, 1, 0, 0, 0, 0),
(21, 'member', '会员登录', 114, 1, 0, 0, 0, 0),
(2, 'news', '发布文章', 121, 10, 0, 0, 0, 0),
(9, 'news', '文章被支持', 122, 0, 1, 0, 0, 0),
(10, 'news', '文章被反对', 123, 0, -1, 0, 0, 0),
(22, 'news', '文章被版主推荐', 124, 20, 0, 0, 0, 0),
(23, 'news', '文章被版主删除并扣分', 125, -20, 0, 0, 0, 0),
(5, 'comment', '发表点评', 131, 5, 0, 0, 0, 0),
(8, 'comment', '回复点评', 132, 1, 0, 0, 0, 0),
(28, 'comment', '点评被版主推荐', 134, 20, 0, 0, 0, 0),
(29, 'comment', '点评被版主删除并扣分', 135, -20, 0, 0, 0, 0),
(41, 'shop', '订单付款', 313, 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_centset`
--

CREATE TABLE IF NOT EXISTS `dev_member_centset` (
  `id` int(8) NOT NULL auto_increment,
  `centname1` char(50) NOT NULL,
  `centname2` char(50) NOT NULL,
  `centname3` char(50) NOT NULL,
  `centname4` char(50) NOT NULL,
  `centname5` char(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dev_member_centset`
--

INSERT INTO `dev_member_centset` (`id`, `centname1`, `centname2`, `centname3`, `centname4`, `centname5`) VALUES
(1, '经验', '人气', '悬赏', '金币', '消费');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_config`
--

CREATE TABLE IF NOT EXISTS `dev_member_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dev_member_config`
--

INSERT INTO `dev_member_config` (`xuhao`, `vname`, `settype`, `colwidth`, `variable`, `value`, `intro`) VALUES
(1, '模块频道名称', 'input', '30', 'ChannelName', '会员中心', '本模块对应的频道名称；用于显示在当前位置提示条等处'),
(2, '是否在当前位置提示条显示模块频道名称', 'YN', '30', 'ChannelNameInNav', '1', '是否在当前位置提示条显示模块频道名称'),
(3, '会员网名昵称是否允许重复', 'YN', '1', 'DblPname', '1', '会员注册和修改资料时校验网名昵称是否允许重复'),
(4, 'UCenter 会员接口是否启用', 'YN', '1', 'UC_OPEN', '0', 'UCenter会员接口包括会员注册、会员登录接口；启用本接口前请先上传UCenter会员接口程序'),
(5, 'UCenter 应用 ID', 'input', '30', 'UC_APPID', '2', '该值为PHPWEB在 UCenter 的应用 ID，请填写你在UCenter将PHPWEB添加应用后实际获得的应用ID'),
(6, 'UCenter 通信密钥', 'input', '30', 'UC_KEY', 'PWUC2009', '通信密钥用于在 UCenter 和 PHPWEB 之间传输信息的加密，可包含任何字母及数字，请在 UCenter 与 PHPWEB 设置完全相同的通讯密钥，以确保两套系统能够正常通信'),
(7, 'UCenter 访问地址', 'input', '30', 'UC_API', 'http://discuz.phpweb.net/uc_server', '您的 UCenter 访问地址，不正确的设置可能导致网站功能异常，请小心修改。格式: http://www.sitename.com/uc_server (最后不要加''/'')'),
(7, 'UCenter IP 地址', 'input', '30', 'UC_IP', '', '如果您的服务器无法通过域名访问 UCenter，可以输入 UCenter 服务器的 IP 地址'),
(8, 'UCenter 数据库服务器', 'input', '30', 'UC_DBHOST', 'localhost', '可以是本地也可以是远程数据库服务器，如果 MySQL 端口不是默认的 3306，请填写如下形式：www.zzlm.com.cn:6033'),
(9, 'UCenter 数据库用户名', 'input', '30', 'UC_DBUSER', 'root', ''),
(10, 'UCenter 数据库密码', 'input', '30', 'UC_DBPW', '123456', ''),
(12, 'UCenter 数据库名', 'input', '30', 'UC_DBNAME', 'dbdiscuz', ''),
(13, 'UCenter 数据表前缀', 'input', '30', 'UC_DBTABLEPRE', 'cdb_uc_', '请填入您的UCenter数据表前缀，注意格式正确；如果是直接安装UCENTER，表前缀是一个“_”，如果是和discuz!一起安装的，则是带两个“_”的完整前缀'),
(14, 'UCenter 数据库编码', 'input', '30', 'UC_DBCHARSET', 'utf8', 'UCenter的数据库编码'),
(15, 'UCenter 的字符集', 'input', '30', 'UC_CHARSET', 'utf-8', ''),
(17, 'UCenter 用户自动激活时对应的会员类型', 'MTYPE', '30', 'UC_MEMBERTYPEID', '26', '用户登录时，在UCenter通过验证的用户（来自其他应用的用户），如果本系统没有该会员，自动增加会员时对应的会员类型');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_defaultrights`
--

CREATE TABLE IF NOT EXISTS `dev_member_defaultrights` (
  `id` int(12) NOT NULL auto_increment,
  `membertypeid` int(12) NOT NULL default '0',
  `secureid` int(12) NOT NULL default '0',
  `securetype` char(100) NOT NULL default '',
  `secureset` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=506 ;

--
-- 转存表中的数据 `dev_member_defaultrights`
--

INSERT INTO `dev_member_defaultrights` (`id`, `membertypeid`, `secureid`, `securetype`, `secureset`) VALUES
(505, 26, 133, 'func', '0'),
(504, 26, 132, 'func', '0'),
(502, 26, 127, 'func', '0'),
(503, 26, 131, 'func', '0'),
(501, 26, 126, 'class', ':1:2:'),
(500, 26, 123, 'func', '0'),
(499, 26, 122, 'func', '0'),
(498, 26, 121, 'func', '0'),
(497, 26, 114, 'func', '0'),
(493, 26, 101, 'con', '1'),
(494, 26, 111, 'func', '0'),
(495, 26, 112, 'func', '0'),
(496, 26, 113, 'func', '0');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_fav`
--

CREATE TABLE IF NOT EXISTS `dev_member_fav` (
  `id` int(12) NOT NULL auto_increment,
  `memberid` int(12) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `dev_member_fav`
--

INSERT INTO `dev_member_fav` (`id`, `memberid`, `title`, `url`) VALUES
(40, 155, '花生糕', 'http://4000.com/4186/shop/html/?12.html'),
(41, 156, '铁观音', 'http://4000.com/4195/shop/html/?14.html');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_friends`
--

CREATE TABLE IF NOT EXISTS `dev_member_friends` (
  `id` int(12) NOT NULL auto_increment,
  `memberid` int(12) NOT NULL default '0',
  `fid` int(12) NOT NULL default '0',
  `fgroup` char(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_member_friends`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_member_group`
--

CREATE TABLE IF NOT EXISTS `dev_member_group` (
  `id` int(6) NOT NULL auto_increment,
  `membergroup` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dev_member_group`
--

INSERT INTO `dev_member_group` (`id`, `membergroup`) VALUES
(1, '个人'),
(2, '企业');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_msn`
--

CREATE TABLE IF NOT EXISTS `dev_member_msn` (
  `id` int(12) NOT NULL auto_increment,
  `tomemberid` int(12) NOT NULL default '0',
  `frommemberid` int(12) NOT NULL default '0',
  `body` text NOT NULL,
  `dtime` int(11) NOT NULL default '0',
  `iflook` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dev_member_msn`
--

INSERT INTO `dev_member_msn` (`id`, `tomemberid`, `frommemberid`, `body`, `dtime`, `iflook`) VALUES
(2, 156, 0, 'aaaaaa,您好!\r\n\r\n感谢您在本站注册!\r\n\r\n会员名: aaaaaa\r\n密码: aaaaaa\r\n\r\n网址:http://', 1283925465, 1),
(3, 157, 0, 'zzzzz,您好!\r\n\r\n感谢您在本站注册!\r\n\r\n会员名: zzzzz\r\n密码: zzzzz\r\n\r\n网址:http://', 1284104872, 1),
(4, 158, 0, 'vvvvv,您好!\r\n\r\n感谢您在本站注册!\r\n\r\n会员名: vvvvv\r\n密码: vvvvv\r\n\r\n网址:http://', 1286958794, 0),
(5, 159, 0, '66666,您好!\r\n\r\n感谢您在本站注册!\r\n\r\n会员名: 66666\r\n密码: 66666\r\n\r\n网址:http://', 1289185652, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_notice`
--

CREATE TABLE IF NOT EXISTS `dev_member_notice` (
  `id` int(12) NOT NULL auto_increment,
  `membertypeid` int(20) default NULL,
  `title` varchar(255) default NULL,
  `body` text,
  `dtime` int(11) default NULL,
  `xuhao` int(5) default NULL,
  `cl` int(20) default NULL,
  `ifnew` int(1) default NULL,
  `ifred` int(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `dev_member_notice`
--

INSERT INTO `dev_member_notice` (`id`, `membertypeid`, `title`, `body`, `dtime`, `xuhao`, `cl`, `ifnew`, `ifred`) VALUES
(1, 0, '这是测试的一条会员公告', '这是测试的一条会员公告', 1220596305, 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_nums`
--

CREATE TABLE IF NOT EXISTS `dev_member_nums` (
  `id` int(12) NOT NULL auto_increment,
  `memberid` int(50) default NULL,
  `secureid` int(50) default NULL,
  `nums` int(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_member_nums`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_member_onlinepay`
--

CREATE TABLE IF NOT EXISTS `dev_member_onlinepay` (
  `id` int(11) NOT NULL auto_increment,
  `memberid` int(20) NOT NULL default '0',
  `payid` int(11) NOT NULL default '0',
  `paytype` char(30) NOT NULL default '',
  `paytotal` decimal(10,2) NOT NULL default '0.00',
  `ifpay` int(1) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `backtime` int(11) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `dev_member_onlinepay`
--

INSERT INTO `dev_member_onlinepay` (`id`, `memberid`, `payid`, `paytype`, `paytotal`, `ifpay`, `addtime`, `backtime`, `ip`) VALUES
(1, 150, 2, '支付宝', 0.01, 0, 1255919231, 0, 'www.zzlm.com.cn'),
(2, 157, 2, '支付宝', 1.00, 0, 1284104932, 0, '192.168.1.6');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_pay`
--

CREATE TABLE IF NOT EXISTS `dev_member_pay` (
  `id` int(11) NOT NULL auto_increment,
  `memberid` int(20) NOT NULL default '0',
  `payid` int(11) NOT NULL default '0',
  `payhb` varchar(30) NOT NULL default '',
  `payhl` decimal(12,4) NOT NULL default '0.0000',
  `oof` decimal(12,2) NOT NULL default '0.00',
  `method` varchar(200) NOT NULL default '',
  `type` varchar(50) NOT NULL default '',
  `addtime` int(11) NOT NULL default '0',
  `fpnum` varchar(100) NOT NULL default '',
  `memo` varchar(255) NOT NULL default '',
  `ip` varchar(20) NOT NULL default '',
  `logname` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_member_pay`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_member_paycenter`
--

CREATE TABLE IF NOT EXISTS `dev_member_paycenter` (
  `id` int(11) NOT NULL auto_increment,
  `pcenter` varchar(100) NOT NULL default '',
  `pcentertype` int(2) NOT NULL default '0',
  `pcenteruser` varchar(100) NOT NULL default '',
  `pcenterkey` text,
  `key1` text,
  `key2` text,
  `hbtype` varchar(255) NOT NULL default '',
  `postfile` varchar(100) NOT NULL default '',
  `recfile` varchar(100) NOT NULL default '',
  `ifuse` int(1) NOT NULL default '0',
  `ifback` int(1) NOT NULL default '0',
  `intro` text,
  `xuhao` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dev_member_paycenter`
--

INSERT INTO `dev_member_paycenter` (`id`, `pcenter`, `pcentertype`, `pcenteruser`, `pcenterkey`, `key1`, `key2`, `hbtype`, `postfile`, `recfile`, `ifuse`, `ifback`, `intro`, `xuhao`) VALUES
(1, '送货上门收款', 0, '', '', '', '', '', '', '', 1, 1, '限本地送货上门收款', 1),
(2, '支付宝', 1, '2088002053153634', '9fkjby5pbzscg61vil4pf6xwlp8b9w6d', 'wangjinmin1982@126.com', '', 'alipay_db', 'alipay_db_post.php', 'alipay_db_rec.php', 1, 1, '支付宝担保交易', 2),
(3, '建设银行账户', 0, '', '', '', '', '', '', '', 1, 1, '户名:王小丫\r\n账号:0000000000000000', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_regstep`
--

CREATE TABLE IF NOT EXISTS `dev_member_regstep` (
  `id` int(8) NOT NULL auto_increment,
  `membertypeid` int(5) NOT NULL default '0',
  `regstep` varchar(30) NOT NULL,
  `stepname` varchar(50) NOT NULL,
  `xuhao` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- 转存表中的数据 `dev_member_regstep`
--

INSERT INTO `dev_member_regstep` (`id`, `membertypeid`, `regstep`, `stepname`, `xuhao`) VALUES
(1, 0, 'person', '头像签名设置', 1),
(2, 0, 'detail', '会员资料设置', 2),
(3, 0, 'contact', '填写联系信息', 3),
(69, 26, 'contact', '填写联系信息', 3),
(68, 26, 'detail', '会员资料设置', 2),
(67, 26, 'person', '头像签名设置', 1),
(70, 35, 'person', '头像签名设置', 1),
(71, 35, 'detail', '会员资料设置', 2),
(72, 35, 'contact', '填写联系信息', 3),
(73, 36, 'person', '头像签名设置', 1),
(74, 36, 'detail', '会员资料设置', 2),
(75, 36, 'contact', '填写联系信息', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_rights`
--

CREATE TABLE IF NOT EXISTS `dev_member_rights` (
  `id` int(12) NOT NULL auto_increment,
  `memberid` int(12) NOT NULL default '0',
  `secureid` int(12) NOT NULL default '0',
  `securetype` char(100) NOT NULL,
  `secureset` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4718 ;

--
-- 转存表中的数据 `dev_member_rights`
--

INSERT INTO `dev_member_rights` (`id`, `memberid`, `secureid`, `securetype`, `secureset`) VALUES
(4665, 155, 113, 'func', '0'),
(4664, 155, 112, 'func', '0'),
(4663, 155, 111, 'func', '0'),
(4662, 155, 101, 'con', '1'),
(4661, 155, 114, 'func', '0'),
(4660, 155, 121, 'func', '0'),
(4659, 155, 122, 'func', '0'),
(4658, 155, 123, 'func', '0'),
(4657, 155, 126, 'class', ':1:2:'),
(4656, 155, 131, 'func', '0'),
(4655, 155, 127, 'func', '0'),
(4654, 155, 132, 'func', '0'),
(4653, 155, 133, 'func', '0'),
(4666, 156, 133, 'func', '0'),
(4667, 156, 132, 'func', '0'),
(4668, 156, 127, 'func', '0'),
(4669, 156, 131, 'func', '0'),
(4670, 156, 126, 'class', ':1:2:'),
(4671, 156, 123, 'func', '0'),
(4672, 156, 122, 'func', '0'),
(4673, 156, 121, 'func', '0'),
(4674, 156, 114, 'func', '0'),
(4675, 156, 101, 'con', '1'),
(4676, 156, 111, 'func', '0'),
(4677, 156, 112, 'func', '0'),
(4678, 156, 113, 'func', '0');

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_secure`
--

CREATE TABLE IF NOT EXISTS `dev_member_secure` (
  `id` int(12) NOT NULL auto_increment,
  `coltype` varchar(30) NOT NULL,
  `securename` char(100) NOT NULL default '',
  `securetype` char(30) NOT NULL default '',
  `xuhao` int(12) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=190 ;

--
-- 转存表中的数据 `dev_member_secure`
--

INSERT INTO `dev_member_secure` (`id`, `coltype`, `securename`, `securetype`, `xuhao`) VALUES
(101, 'base', '内容阅读权限级别', 'con', 1),
(111, 'member', '会员登录帐号设置', 'func', 2),
(112, 'member', '会员头像签名设置', 'func', 3),
(113, 'member', '会员个人资料修改', 'func', 4),
(114, 'member', '会员联系信息修改', 'func', 5),
(121, 'news', '文章发布权限', 'func', 6),
(122, 'news', '文章修改权限', 'func', 7),
(123, 'news', '文章发布/修改免审核权限', 'func', 8),
(124, 'news', '文章图片上传权限', 'func', 5),
(125, 'news', '文章附件上传权限', 'func', 8),
(126, 'news', '文章公共分类投稿授权', 'class', 12),
(127, 'news', '文章自定义分类权限', 'func', 9),
(129, 'news', '文章版主权限(推荐/删除)', 'banzhu', 9),
(131, 'comment', '点评发表权限', 'func', 10),
(132, 'comment', '点评回复权限', 'func', 11),
(133, 'comment', '点评免审核权限', 'func', 12),
(134, 'comment', '点评图片上传权限', 'func', 4),
(139, 'comment', '点评版主权限(推荐/删除)', 'banzhu', 9);

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_type`
--

CREATE TABLE IF NOT EXISTS `dev_member_type` (
  `membertypeid` int(6) NOT NULL auto_increment,
  `membertype` varchar(100) default NULL,
  `membergroupid` int(3) NOT NULL default '0',
  `ifcanreg` int(1) default NULL,
  `ifchecked` int(1) default NULL,
  `regxy` text,
  `regmail` text,
  `expday` int(8) default NULL,
  `startcent` int(20) default NULL,
  `endcent` int(20) default NULL,
  `menugroupid` int(5) NOT NULL default '4',
  PRIMARY KEY  (`membertypeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `dev_member_type`
--

INSERT INTO `dev_member_type` (`membertypeid`, `membertype`, `membergroupid`, `ifcanreg`, `ifchecked`, `regxy`, `regmail`, `expday`, `startcent`, `endcent`, `menugroupid`) VALUES
(26, '普通会员', 1, 1, 1, '会员注册协议\r\n\r\n1.\r\n2.\r\n3.\r\n4.\r\n5.\r\n', '{#user#},您好!\r\n\r\n感谢您在本站注册!\r\n\r\n会员名: {#user#}\r\n密码: {#password#}\r\n\r\n网址:http://', 0, 0, 0, 4),
(35, 'VIP会员', 1, 0, 1, '', '{#user#},您好!\r\n\r\n感谢您在本站注册!\r\n\r\n登录账号: {#user#}\r\n密码: {#password#}\r\n\r\n网址:http://', 0, 0, 0, 4),
(36, '合作伙伴', 1, 0, 1, '', '', 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- 表的结构 `dev_member_zone`
--

CREATE TABLE IF NOT EXISTS `dev_member_zone` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) default NULL,
  `cat` char(50) default NULL,
  `xuhao` int(4) default NULL,
  `catpath` char(255) default NULL,
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `dev_member_zone`
--

INSERT INTO `dev_member_zone` (`catid`, `pid`, `cat`, `xuhao`, `catpath`) VALUES
(1, 0, '北京', 1, '0001:'),
(2, 0, '上海', 2, '0002:'),
(3, 0, '天津', 3, '0003:'),
(4, 0, '重庆', 4, '0004:'),
(5, 0, '浙江', 5, '0005:'),
(6, 0, '江苏', 6, '0006:'),
(7, 0, '广东', 7, '0007:'),
(8, 5, '杭州', 1, '0005:0008:'),
(9, 5, '嘉兴', 2, '0005:0009:'),
(10, 6, '南京', 1, '0006:0010:'),
(11, 6, '苏州', 2, '0006:0011:'),
(12, 7, '广州', 1, '0007:0012:'),
(13, 7, '深圳', 2, '0007:0013:'),
(21, 5, '宁波', 3, '0005:0021:'),
(26, 5, '舟山', 8, '0005:0026:'),
(25, 5, '金华', 7, '0005:0025:'),
(23, 5, '温州', 5, '0005:0023:'),
(22, 5, '湖州', 4, '0005:0022:'),
(24, 5, '台州', 6, '0005:0024:');

-- --------------------------------------------------------

--
-- 表的结构 `dev_menu`
--

CREATE TABLE IF NOT EXISTS `dev_menu` (
  `id` int(12) NOT NULL auto_increment,
  `groupid` int(6) NOT NULL default '1',
  `pid` int(6) NOT NULL default '0',
  `menu` varchar(50) NOT NULL default '',
  `linktype` int(1) NOT NULL default '1',
  `coltype` varchar(30) NOT NULL default '',
  `folder` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL default '',
  `ifshow` int(1) NOT NULL default '0',
  `xuhao` int(4) NOT NULL default '0',
  `target` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=310 ;

--
-- 转存表中的数据 `dev_menu`
--

INSERT INTO `dev_menu` (`id`, `groupid`, `pid`, `menu`, `linktype`, `coltype`, `folder`, `url`, `ifshow`, `xuhao`, `target`) VALUES
(80, 1, 0, '茶叶知识', 1, '', 'news/class/?2.html', 'http://', 1, 6, '_self'),
(307, 57, 0, '乌龙茶', 1, '', 'shop/class/?3html', 'http://', 1, 47, '_self'),
(215, 4, 0, '会员资料设置', 1, '', 'member/member_account.php', 'http://', 1, 1, '_self'),
(216, 4, 215, '登录账号', 1, '', 'member/member_account.php', 'http://', 1, 1, '_self'),
(152, 3, 0, '关于我们', 1, '', 'page/html/aboutus.php', 'http://', 1, 1, '_self'),
(153, 3, 0, '联系我们', 1, '', 'page/html/contact.php', 'http://', 1, 6, '_self'),
(155, 3, 0, '友情链接', 1, '', 'advs/link/', 'http://', 1, 10, '_self'),
(166, 2, 0, '会员中心', 0, 'member', '', 'http://', 1, 27, '_self'),
(165, 2, 0, '会员注册', 1, '', 'member/reg.php', 'http://', 1, 26, '_self'),
(273, 2, 0, '我的积分', 1, '', 'member/member_cent.php', 'http://', 1, 44, '_self'),
(218, 4, 215, '个人资料', 1, '', 'member/member_detail.php', 'http://', 1, 3, '_self'),
(217, 4, 215, '头像签名', 1, '', 'member/member_person.php', 'http://', 1, 2, '_self'),
(188, 2, 0, '我的收藏', 1, '', 'member/member_fav.php', 'http://', 1, 34, '_self'),
(272, 2, 0, '我的点评', 1, '', 'member/member_comment.php', 'http://', 1, 43, '_self'),
(206, 1, 0, '会员中心', 0, 'member', 'shop/class/?127.html', 'http://', 1, 9, '_self'),
(219, 4, 215, '联系信息', 1, '', 'member/member_contact.php', 'http://', 1, 4, '_self'),
(286, 4, 235, '我的好友', 1, '', 'member/member_friends.php', 'http://', 1, 7, '_self'),
(287, 4, 235, '站内短信', 1, '', 'member/member_msn.php', 'http://', 1, 8, '_self'),
(291, 3, 0, '常见问题', 1, '', 'page/service/?23.html', 'http://', 1, 5, '_self'),
(292, 3, 0, '请您留言', 0, 'feedback', '', 'http://', 1, 8, '_self'),
(284, 4, 280, '在线充值', 1, '', 'member/member_onlinepay.php', 'http://', 1, 4, '_self'),
(235, 4, 0, '会员个人专区', 1, '', 'member/member_fav.php', 'http://', 1, 3, '_self'),
(236, 4, 235, '我的收藏', 1, '', 'member/member_fav.php', 'http://', 1, 1, '_self'),
(238, 4, 235, '我的点评', 1, '', 'member/member_comment.php', 'http://', 1, 3, '_self'),
(240, 4, 235, '我的积分', 1, '', 'member/member_cent.php', 'http://', 1, 6, '_self'),
(243, 4, 215, '退出登录', 1, '', 'logout.php', 'http://', 1, 5, '_self'),
(251, 2, 0, '站内短信', 1, '', 'member/member_msn.php', 'http://', 1, 42, '_self'),
(288, 3, 0, '支付方式', 1, '', 'page/pay/?13.html', 'http://', 1, 4, '_self'),
(289, 3, 0, '配送说明', 1, '', 'page/send/?16.html', 'http://', 1, 3, '_self'),
(290, 3, 0, '购物指南', 1, '', 'page/guide/?4.html', 'http://', 1, 2, '_self'),
(256, 1, 0, '茶文化', 1, '', 'news/class/?74.html', 'http://', 1, 8, '_self'),
(274, 1, 0, '饮茶健康', 1, '', 'news/class/?73.html', 'http://', 1, 7, '_self'),
(280, 4, 0, '订单账户管理', 0, 'index', '', 'http://', 1, 2, '_self'),
(281, 4, 280, '订单查询', 1, '', 'shop/order.php', 'http://', 1, 1, '_self'),
(282, 4, 280, '付款记录', 1, '', 'member/member_paylist.php', 'http://', 1, 2, '_self'),
(283, 4, 280, '消费记录', 1, '', 'member/member_buylist.php', 'http://', 1, 3, '_self'),
(279, 3, 0, '招聘信息', 0, 'job', '', 'http://', 1, 7, '_self'),
(295, 57, 0, '绿茶', 1, '', 'shop/class/?1.html', 'http://', 1, 45, '_self'),
(296, 57, 0, '红茶', 1, '', 'shop/class/?2.html', 'http://', 1, 46, '_self'),
(294, 4, 280, '赠品订单', 1, '', 'huanzeng/order.php', 'http://', 1, 5, '_self'),
(297, 57, 0, '普洱茶', 1, '', 'shop/class/?5.html', 'http://', 1, 48, '_self'),
(298, 57, 0, '茉莉花茶', 1, '', 'shop/class/?99.html', 'http://', 1, 48, '_self'),
(308, 57, 0, '立体茶包', 1, '', 'shop/class/?7.html', 'http://', 1, 51, '_self'),
(299, 57, 0, '保健茶', 1, '', 'shop/class/?126.html', 'http://', 1, 49, '_self'),
(300, 57, 0, '精品礼盒', 1, '', 'shop/class/?128.html', 'http://', 1, 50, '_self'),
(302, 1, 0, '商城首页', 0, 'index', '', 'http://', 1, 1, '_self'),
(303, 1, 0, '全部商品', 1, '', 'shop/class/', 'http://', 1, 2, '_self'),
(304, 1, 0, '品牌查询', 1, '', 'shop/brand.php', 'http://', 1, 3, '_self'),
(305, 1, 0, '积分兑换', 1, '', 'huanzeng/class/', 'http://', 1, 4, '_self'),
(306, 1, 0, '购物指南', 1, '', 'page/guide/?4.html', 'http://', 1, 5, '_self'),
(309, 57, 0, '茶具精品', 1, '', 'shop/class/?129.html', 'http://', 1, 52, '_self');

-- --------------------------------------------------------

--
-- 表的结构 `dev_menu_group`
--

CREATE TABLE IF NOT EXISTS `dev_menu_group` (
  `id` int(3) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- 转存表中的数据 `dev_menu_group`
--

INSERT INTO `dev_menu_group` (`id`, `groupname`, `xuhao`, `moveable`) VALUES
(1, '频道导航菜单', 1, 0),
(2, '顶部导航菜单', 2, 0),
(3, '底部导航菜单', 3, 0),
(4, '会员功能菜单', 4, 0),
(57, '商品分类导航', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dev_news_cat`
--

CREATE TABLE IF NOT EXISTS `dev_news_cat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) NOT NULL default '0',
  `cat` char(100) NOT NULL default '',
  `xuhao` int(12) NOT NULL default '0',
  `catpath` char(255) NOT NULL default '',
  `nums` int(20) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  `ifchannel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- 转存表中的数据 `dev_news_cat`
--

INSERT INTO `dev_news_cat` (`catid`, `pid`, `cat`, `xuhao`, `catpath`, `nums`, `tj`, `ifchannel`) VALUES
(1, 0, '最新动态', 1, '0001:', 36, 0, 0),
(2, 0, '茶叶知识', 2, '0002:', 5, 0, 0),
(73, 0, '饮茶健康', 3, '0073:', 0, 0, 0),
(74, 0, '茶文化', 4, '0074:', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_news_con`
--

CREATE TABLE IF NOT EXISTS `dev_news_con` (
  `id` int(12) NOT NULL auto_increment,
  `catid` int(12) NOT NULL default '0',
  `catpath` varchar(255) NOT NULL default '',
  `pcatid` int(12) NOT NULL default '0',
  `contype` varchar(20) NOT NULL default 'news',
  `title` varchar(255) NOT NULL default '',
  `body` text,
  `dtime` int(11) default '0',
  `xuhao` int(5) default '0',
  `cl` int(20) default NULL,
  `tj` int(1) default NULL,
  `iffb` int(1) default '0',
  `ifbold` int(1) default '0',
  `ifred` varchar(20) default NULL,
  `type` varchar(30) NOT NULL default '',
  `src` varchar(150) NOT NULL default '',
  `uptime` int(11) default '0',
  `author` varchar(100) default NULL,
  `source` varchar(100) default NULL,
  `memberid` varchar(100) default NULL,
  `proj` varchar(255) NOT NULL default '',
  `secure` int(11) NOT NULL default '0',
  `memo` text NOT NULL,
  `prop1` char(255) NOT NULL default '',
  `prop2` char(255) NOT NULL default '',
  `prop3` char(255) NOT NULL default '',
  `prop4` char(255) NOT NULL default '',
  `prop5` char(255) NOT NULL default '',
  `prop6` char(255) NOT NULL default '',
  `prop7` char(255) NOT NULL default '',
  `prop8` char(255) NOT NULL default '',
  `prop9` char(255) NOT NULL default '',
  `prop10` char(255) NOT NULL default '',
  `prop11` char(255) NOT NULL default '',
  `prop12` char(255) NOT NULL default '',
  `prop13` char(255) NOT NULL default '',
  `prop14` char(255) NOT NULL default '',
  `prop15` char(255) NOT NULL default '',
  `prop16` char(255) NOT NULL default '',
  `prop17` char(255) NOT NULL default '',
  `prop18` char(255) NOT NULL default '',
  `prop19` char(255) NOT NULL default '',
  `prop20` char(255) NOT NULL default '',
  `fileurl` varchar(100) NOT NULL,
  `tourl` varchar(255) NOT NULL,
  `downcount` int(10) NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `zhichi` int(5) NOT NULL default '0',
  `fandui` int(5) NOT NULL default '0',
  `tplog` text NOT NULL,
  `downcentid` int(1) NOT NULL default '1',
  `downcent` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=316 ;

--
-- 转存表中的数据 `dev_news_con`
--

INSERT INTO `dev_news_con` (`id`, `catid`, `catpath`, `pcatid`, `contype`, `title`, `body`, `dtime`, `xuhao`, `cl`, `tj`, `iffb`, `ifbold`, `ifred`, `type`, `src`, `uptime`, `author`, `source`, `memberid`, `proj`, `secure`, `memo`, `prop1`, `prop2`, `prop3`, `prop4`, `prop5`, `prop6`, `prop7`, `prop8`, `prop9`, `prop10`, `prop11`, `prop12`, `prop13`, `prop14`, `prop15`, `prop16`, `prop17`, `prop18`, `prop19`, `prop20`, `fileurl`, `tourl`, `downcount`, `tags`, `zhichi`, `fandui`, `tplog`, `downcentid`, `downcent`) VALUES
(294, 1, '0001:', 0, 'news', '关于本商城网站最新改版', '关于本商城网站最新改版关于本商城网站最新改版关于本商城网站最新改版', 1255919953, 0, 4, 0, 1, 0, '0', 'gif', '', 1286953425, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(295, 1, '0001:', 0, 'news', '安吉白茶促销专场 ', '安吉白茶促销专场 安吉白茶促销专场 安吉白茶促销专场 安吉白茶促销专场 ', 1255919992, 0, 3, 0, 1, 0, '0', 'gif', '', 1286953445, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(296, 1, '0001:', 0, 'news', '商城开业2周年，全场九折优惠', '商城开业2周年，全场九折优惠', 1255920036, 0, 5, 0, 1, 0, '0', 'gif', '', 1284106726, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(297, 1, '0001:', 0, 'news', '中秋节送什么?来商城看看', '中秋节送什么?来商城看看', 1255920068, 0, 5, 0, 1, 0, '0', 'gif', '', 1284106734, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(298, 1, '0001:', 0, 'news', '推出一系列茶具套装促销大活动', '推出一系列茶具套装促销大活动', 1255920126, 0, 12, 0, 1, 0, '0', 'gif', '', 1286953382, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 2, 0, '|150||156|', 1, 0),
(299, 1, '0001:', 0, 'news', '金秋送福优惠活动开始了', '金秋送福优惠活动开始了金秋送福优惠活动开始了金秋送福优惠活动开始了金秋送福优惠活动开始了', 1256047214, 0, 25, 0, 1, 0, '0', 'gif', '', 1286953362, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(300, 2, '0002:', 0, 'news', '中国十大名茶之一：黄山毛峰', '中国十大名茶之一：黄山毛峰中国十大名茶之一：黄山毛峰中国十大名茶之一：黄山毛峰', 1284102398, 0, 2, 0, 1, 0, '0', 'gif', '', 1286952951, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(301, 2, '0002:', 0, 'news', '买茶沏茶问清法子', '买茶沏茶问清法子买茶沏茶问清法子买茶沏茶问清法子', 1284102425, 0, 9, 0, 1, 0, '0', 'gif', '', 1286952935, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(304, 2, '0002:', 0, 'news', '国茶道的鼎盛时期茶道的鼎盛时期', '国茶道的鼎盛时期茶道的鼎盛时期国茶道的鼎盛时期茶道的鼎盛时期国茶道的鼎盛时期茶道的鼎盛时期', 1286952964, 0, 0, 0, 1, 0, '0', 'gif', '', 1286952964, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(302, 2, '0002:', 0, 'news', '安溪铁观音茶几大产茶区的茶质分辨', '安溪铁观音茶几大产茶区的茶质分辨安溪铁观音茶几大产茶区的茶质分辨', 1284102451, 0, 7, 0, 1, 0, '0', 'gif', '', 1286952903, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(305, 2, '0002:', 0, 'news', '茶道的鼎盛时期中国茶道的鼎盛时期', '茶道的鼎盛时期中国茶道的鼎盛时期茶道的鼎盛时期中国茶道的鼎盛时期茶道的鼎盛时期中国茶道的鼎盛时期', 1286952977, 0, 0, 0, 1, 0, '0', 'gif', '', 1286952977, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(303, 1, '0001:', 0, 'news', '中闽弘泰商品网上展销', '中闽弘泰商品网上展销中闽弘泰商品网上展销中闽弘泰商品网上展销', 1284106621, 0, 0, 0, 1, 0, '0', 'gif', '', 1286953336, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', '', 0, '', 0, 0, '', 1, 0),
(306, 2, '0002:', 0, 'news', '黄山毛峰：状如雀舌香如白兰 中国十大名茶之一', '黄山毛峰：状如雀舌香如白兰 中国十大名茶之一黄山毛峰：状如雀舌香如白兰 中国十大名茶之一黄山毛峰：状如雀舌香如白兰 中国十大名茶之一', 1286953018, 0, 0, 0, 1, 0, '0', 'gif', '', 1286953018, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(307, 2, '0002:', 0, 'news', '饮用新茶不宜过浓', '饮用新茶不宜过浓饮用新茶不宜过浓饮用新茶不宜过浓', 1286953063, 0, 0, 0, 1, 0, '0', 'gif', '', 1286953063, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(308, 73, '0073:', 0, 'news', '煮茶及久泡茶不宜饮', '煮茶及久泡茶不宜饮煮茶及久泡茶不宜饮煮茶及久泡茶不宜饮 ', 1286953085, 0, 1, 0, 1, 0, '0', 'gif', '', 1289185394, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(309, 2, '0002:', 0, 'news', '烘焦及久贮的茶不宜饮', '烘焦及久贮的茶不宜饮烘焦及久贮的茶不宜饮烘焦及久贮的茶不宜饮烘焦及久贮的茶不宜饮', 1286953109, 0, 8, 0, 1, 0, '0', 'gif', '', 1286953109, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(310, 1, '0001:', 0, 'news', '最新优惠活动进行中！', '最新优惠活动进行中！最新优惠活动进行中！', 1286953480, 0, 0, 0, 1, 0, '0', 'gif', '', 1286953480, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(311, 74, '0074:', 0, 'news', '买茶沏茶问清法子', '茶叶是中国人家里、单位都少不了的东西。消暑解渴，保健养颜，喝茶这事儿说深了，足以成书；但说浅了，也未必人人都知道。今天先不谈茶文化，且就茶消费中最大众化的十个问题，请教一下中国茶叶流通协会秘书长吴锡端，看看他对于这些“简单”的问题是怎么说的。1.茶是越新鲜越好吗？说茶越新鲜越好，其实主要是指绿茶，因为绿茶过去保鲜比较困难，常常过了夏天后，茶叶就会慢慢变黄，口感也相对差一些。现在茶叶的保鲜技术已经比较先进，特别是一些大的茶庄，往往都拥有冷库等保鲜条件，可以提高新茶的保鲜期，因此，不如随喝随买，反而能保证“新鲜”。对于那些现炒现卖的茶，我的建议是不要买。因为通常茶叶炒制后，还要经过后期处理，比如高档“龙井”，在炒制工艺上一般分为“青锅”和“辉锅”两道工序，“青锅”有杀青的作用，但“青锅”炒出来的茶还会有潮气，所以要再“辉锅”，把茶叶包起来，放上白灰来吸收里面的水分，一般要封存一个星期左右，收灰后的茶叶泡出来才好喝，而且能在恒温的情况下存放一年。现场炒制出来的就没有这种效果。而且，商场人多杂乱，现场炒制的茶卫生也不一定能跟上。新茶与陈茶的鉴别主要是看它的色、香、味。色泽指茶叶在存放过程中，受空气中氧气和光的作用，绿茶由新茶的青翠嫩绿逐渐变得枯灰。红茶由新茶的乌润变成灰褐。在味道上，新茶鲜爽，陈茶滋味淡薄，略带苦涩，香气也由清香变得淡浊。不过，这种区别具体到每种茶是不一样的，而且如储存条件良好，这种差别也会相对缩小。', 1289184258, 0, 0, 0, 1, 0, '0', 'gif', '', 1289184258, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(312, 74, '0074:', 0, 'news', '中国十大名茶之一：黄山毛峰', '黄山毛峰，清朝名茶，属绿茶烘青类。长期以来人们用“名山产名茶”的观点，推断黄山毛峰系明朝黄山云雾之后称。黄山毛峰产于安徽省歙县黄山。中国十大名茶之一。由清代光绪年间谢裕泰茶庄所创制(《徽州商会资料》)。每年清明谷雨，选摘初展肥壮嫩芽，手工炒制，该茶外形微卷，状似雀舌，绿中泛黄，银毫显露，且带有金黄色鱼叶(俗称黄金片)。入杯冲泡雾气结顶，汤色清碧微黄，叶底黄绿有活力，滋味醇甘，香气如兰，韵味深长。由于新制茶叶白毫披身，芽尖峰芒，且鲜叶采自黄山高峰，遂将该茶取名为黄山毛峰。 　　黄山毛峰产于中国安徽秀丽的黄山之中，成茶外形细嫩扁曲，多毫有峰，色泽油润光滑；冲泡杯中雾气轻绕顶，滋味醇甜，鲜香持久。 　　产于安徽黄山，主要分布在桃花峰的云谷寺、松谷庵 、吊桥阉、慈光阁及半寺周围。这里山高林密，日照短，云雾多，自然条件十分优越，茶树得云雾之滋润，无寒暑之侵袭，蕴成良好的品质。 　　黄山毛峰采制十分精细。制成的毛峰茶外形细扁微曲，状如雀舌，香如白兰，味醇回甘。 　　黄山名茶众多，除毛峰外，还有休宁的“屯绿”，太平的“猴魁”，歙县的“老竹大方”等等，都各具特色，脍炙人口。', 1289184284, 0, 0, 0, 1, 0, '0', 'gif', '', 1289184284, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(313, 74, '0074:', 0, 'news', '黄山毛峰：状如雀舌香如白兰 中国十大名茶之一', '黄山毛峰，清朝名茶，属绿茶烘青类。长期以来人们用“名山产名茶”的观点，推断黄山毛峰系明朝黄山云雾之后称。黄山毛峰产于安徽省歙县黄山。中国十大名茶之一。由清代光绪年间谢裕泰茶庄所创制(《徽州商会资料》)。每年清明谷雨，选摘初展肥壮嫩芽，手工炒制，该茶外形微卷，状似雀舌，绿中泛黄，银毫显露，且带有金黄色鱼叶(俗称黄金片)。入杯冲泡雾气结顶，汤色清碧微黄，叶底黄绿有活力，滋味醇甘，香气如兰，韵味深长。由于新制茶叶白毫披身，芽尖峰芒，且鲜叶采自黄山高峰，遂将该茶取名为黄山毛峰。 　　黄山毛峰产于中国安徽秀丽的黄山之中，成茶外形细嫩扁曲，多毫有峰，色泽油润光滑；冲泡杯中雾气轻绕顶，滋味醇甜，鲜香持久。 　　产于安徽黄山，主要分布在桃花峰的云谷寺、松谷庵 、吊桥阉、慈光阁及半寺周围。这里山高林密，日照短，云雾多，自然条件十分优越，茶树得云雾之滋润，无寒暑之侵袭，蕴成良好的品质。 　　黄山毛峰采制十分精细。制成的毛峰茶外形细扁微曲，状如雀舌，香如白兰，味醇回甘。 　　黄山名茶众多，除毛峰外，还有休宁的“屯绿”，太平的“猴魁”，歙县的“老竹大方”等等，都各具特色，脍炙人口。', 1289184310, 0, 1, 0, 1, 0, '0', 'gif', '', 1289184310, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(314, 73, '0073:', 0, 'news', '中国茶道的鼎盛时期', '继唐之后，宋代饮茶更为普遍。王安石《临川集卷七十议茶法》说：“夫茶之为民用，等于米盐，不可一日以无。”李觏(gò)《盯江集卷十六·富国策一十》云：“茶并非古也，源于江左，流于天下，浸淫于近世，君子小人靡不嗜也，富贵贫贱靡不用也。”宋人吴自牧编撰的《梦粱录》载有“开门八件事”；柴、米、油、盐、酒、酱、醋、茶。由此可见，茶已同布帛菽粟，成日常生活之必需品，须臾离不得。到元代，去掉了酒而成“开门七件事”。元杂剧《刘行首》二折中有一首诗；教你当家不当家，及至当家乱如麻；早起开门七件事，柴米油盐酱醋茶。 明代画家、文学家唐伯虎穷困不堪，作《除夕口占》自嘲：柴米油盐酱醋茶，般般都在别人家；岁暮清淡无一事，竹堂寺里看梅花。 宋代明代商贸繁荣，饮茶成了一大服务行业，由家庭走向社会，由比屋之钦发展到茶肆、菜行、茶亭、茶定、茶摊、茶店、茶馆比比皆是，由独钦发展到办茶会、茶宴聚饮。茶道亦成社区文化的重要组成部分。荣事不再是个人的享受，已全方位向社会开放，成为社会政治、经济、文化、社交及一切世俗生活的载体，一个小小的茶馆竟是社会的缩影，茶事如一面镜子照见了社会的方方面面、旮旮旯旯。 茶道的发展要以茶文化的发展为依托，茶文化的一个最重要的方面是茶业文学。宋明文人亦如前朝，著诗文歌吟茶事。茶诗数量倍增，内容也有两个突出的变化：一是宋明茶业文学涉及对茶政的批判。二是宋明茶叶文学对茶道艺能的描写更细腻入微。\r\n', 1289184377, 0, 0, 0, 1, 0, '0', 'gif', '', 1289184377, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0),
(315, 73, '0073:', 0, 'news', '买茶沏茶问清法子', '茶叶是中国人家里、单位都少不了的东西。消暑解渴，保健养颜，喝茶这事儿说深了，足以成书；但说浅了，也未必人人都知道。今天先不谈茶文化，且就茶消费中最大众化的十个问题，请教一下中国茶叶流通协会秘书长吴锡端，看看他对于这些“简单”的问题是怎么说的。1.茶是越新鲜越好吗？说茶越新鲜越好，其实主要是指绿茶，因为绿茶过去保鲜比较困难，常常过了夏天后，茶叶就会慢慢变黄，口感也相对差一些。现在茶叶的保鲜技术已经比较先进，特别是一些大的茶庄，往往都拥有冷库等保鲜条件，可以提高新茶的保鲜期，因此，不如随喝随买，反而能保证“新鲜”。对于那些现炒现卖的茶，我的建议是不要买。因为通常茶叶炒制后，还要经过后期处理，比如高档“龙井”，在炒制工艺上一般分为“青锅”和“辉锅”两道工序，“青锅”有杀青的作用，但“青锅”炒出来的茶还会有潮气，所以要再“辉锅”，把茶叶包起来，放上白灰来吸收里面的水分，一般要封存一个星期左右，收灰后的茶叶泡出来才好喝，而且能在恒温的情况下存放一年。现场炒制出来的就没有这种效果。而且，商场人多杂乱，现场炒制的茶卫生也不一定能跟上。新茶与陈茶的鉴别主要是看它的色、香、味。色泽指茶叶在存放过程中，受空气中氧气和光的作用，绿茶由新茶的青翠嫩绿逐渐变得枯灰。红茶由新茶的乌润变成灰褐。在味道上，新茶鲜爽，陈茶滋味淡薄，略带苦涩，香气也由清香变得淡浊。不过，这种区别具体到每种茶是不一样的，而且如储存条件良好，这种差别也会相对缩小。 \r\n', 1289184399, 0, 0, 0, 1, 0, '0', 'gif', '', 1289184399, '管理员', '', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://', 'http://', 0, '', 0, 0, '', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_news_config`
--

CREATE TABLE IF NOT EXISTS `dev_news_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dev_news_config`
--

INSERT INTO `dev_news_config` (`xuhao`, `vname`, `settype`, `colwidth`, `variable`, `value`, `intro`) VALUES
(5, '文章主题图片上传尺寸限制(Byte)', 'input', '30', 'PicSizeLimit', '256000', '会员发布文章上传主题图片时,单个图片尺寸的限制'),
(6, '文章编辑器图片上传限制(Byte)', 'input', '30', 'EditPicLimit', '512000', '会员发布文章时,在编辑器内上传图片,单个图片的尺寸限制'),
(1, '模块频道名称', 'input', '30', 'ChannelName', '商城新闻', '本模块对应的频道名称，如“新闻中心”；用于显示在网页标题、当前位置提示条等处'),
(2, '是否在当前位置提示条显示模块频道名称', 'YN', '30', 'ChannelNameInNav', '1', '是否在当前位置提示条显示模块频道名称'),
(7, '附件上传大小限制', 'input', '30', 'FileSizeLimit', '1024000', '会员发布文章上传附件时,允许上传附件的文件大小;但最高设置不能超过2M '),
(8, '会员发布文章关键词过滤', 'textarea', '30', 'KeywordDeny', '', '会员发布文章时禁止的词语，多个以逗号分割');

-- --------------------------------------------------------

--
-- 表的结构 `dev_news_downlog`
--

CREATE TABLE IF NOT EXISTS `dev_news_downlog` (
  `id` int(12) NOT NULL auto_increment,
  `newsid` int(12) NOT NULL default '0',
  `memberid` int(12) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_news_downlog`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_news_pages`
--

CREATE TABLE IF NOT EXISTS `dev_news_pages` (
  `id` int(12) NOT NULL auto_increment,
  `newsid` int(12) NOT NULL default '0',
  `body` text NOT NULL,
  `xuhao` int(5) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- 转存表中的数据 `dev_news_pages`
--

INSERT INTO `dev_news_pages` (`id`, `newsid`, `body`, `xuhao`) VALUES
(112, 299, '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `dev_news_pcat`
--

CREATE TABLE IF NOT EXISTS `dev_news_pcat` (
  `catid` int(12) NOT NULL auto_increment,
  `memberid` int(12) NOT NULL default '0',
  `pid` int(12) NOT NULL default '0',
  `cat` char(100) NOT NULL default '',
  `xuhao` int(12) NOT NULL default '0',
  `catpath` char(255) NOT NULL default '',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dev_news_pcat`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_news_proj`
--

CREATE TABLE IF NOT EXISTS `dev_news_proj` (
  `id` int(12) NOT NULL auto_increment,
  `project` varchar(100) default NULL,
  `folder` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `dev_news_proj`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_news_prop`
--

CREATE TABLE IF NOT EXISTS `dev_news_prop` (
  `id` int(20) NOT NULL auto_increment,
  `catid` int(20) NOT NULL default '0',
  `propname` char(30) default NULL,
  `xuhao` int(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `xuhao` (`xuhao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_news_prop`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_page`
--

CREATE TABLE IF NOT EXISTS `dev_page` (
  `id` int(12) NOT NULL auto_increment,
  `groupid` int(6) NOT NULL default '1',
  `title` varchar(200) NOT NULL default '',
  `body` text NOT NULL,
  `xuhao` int(4) NOT NULL default '0',
  `src` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `memo` text NOT NULL,
  `pagefolder` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `dev_page`
--

INSERT INTO `dev_page` (`id`, `groupid`, `title`, `body`, `xuhao`, `src`, `url`, `memo`, `pagefolder`) VALUES
(1, 1, '公司简介', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 产品品类齐全，具品质保障且性价比高。茶品包括传统中国茶（绿茶、红茶、乌龙茶、黑茶、白茶和黄茶等），玲珑茶包，花草茶以及各种自主研发的茶品，如油切黑乌龙等。志在建设成中国规模最大、茶品最齐全、服务最优越的茶品商城。总部位于上海，是一家会员制的直购平台。以便捷的多渠道方式，为会员提供高品质和高性价比的健康产品。以品味、时尚、健康、快乐为企业文化，致力于为丰富现代家庭的品质生活而努力。摒弃传统店面的概念，以网络、电话和会刊为主要销售渠道，成立专业的产品团队、仓储和配送中心。用户只需一个电话，选购的商品即可在1-2天（上海）或3-5天(其他地区)内送货上门。为用户提供了优越的便捷体验，同时低成本的运营模式提升了性价比。茶园监控 - 品质第一步与浙江、福建、云南等多地茶园建立独家合作关系，进行科学有效的茶园管理，生产与加工龙井、铁观音和普洱茶等名茶。根据不同的茶叶产区、茶园基地制订不同的茶事活动，并由专职茶叶植保员对茶园基地和原料加工环节进行制度化管理，包括有效农药及化肥的采购、保管、发放、施用以及农药残留控制、茶叶溯源、卫生管理等。从源头开始确保品质与安全。 ', 1, '', '', '', 'aboutus'),
(9, 1, '请您留言', '', 4, '', 'feedback/index.php', '', 'feedback'),
(2, 1, '联系方式', '地 址：上海市莫干山路2168号<br />电 话：021-98765432<br />联系人：杨军(经理)<br />手 机：15887654321<br />网址：www.aaaa.com<br />邮 箱：bos@mail.com ', 2, '', '', '', 'contact'),
(4, 2, '购物指南', '<p><img border=0 alt="" src="[ROOTPATH]page/pics/20101013/201010131286953960187.jpg" /></p>', 2, '', '', '', ''),
(20, 5, '退换货政策', '客户收到货物时发现包装纸箱有被拆开过的痕迹，茶叶包装有损坏，货品有误，可拒绝签收退回。<br />并拨打客服热线 400-820-8060为您进行调换退货服务。<br />自客户签收商品之日起7日内，商品在未经开启，无人为破损的情况下，如您对我们的商品不满意，我们将提供退换货的服务。<br />特殊说明<br />1.退货发生时，由于客户原因造成的退货，我们只退回商品的货款金额，原订单如有相应运费（以也买茶当时运费为准），恕不退还；<br />如因也买茶原因或商品质量问题而造成的退货，也买茶将退还您商品的货款金额及相应运费。<br />2.套装商品不可部分退货。<br />3.订单中有赠品，需将赠品一同退回。如赠品一经拆包或使用，则订单商品只换不退。如有不便，敬请谅解。<br />4.退货需要退回发票及商品发货单，请于购买商品后妥善保管购物发票及商品发货单，如因客户原因无法退回发票或商品发货单的，<br />将可能导致无法进行退货。<br />5.图片及信息仅供参照，商品将以实物为准。因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，不属质量问题。<br />6.退换商品需包装完好，商品一旦开封，非质量问题不予退换。', 1, '', '', '', ''),
(21, 5, '如何退换货', '1.如果您的订单需要办理退换货，注册会员可登陆，点击我的退换货，提交申请。<br />\r\n\r\n2. 待您的申请通过后，按照如下步骤进行。<br />\r\n\r\n1）请将需退换的商品、原包装内的商品发货单及发票(如果有)，通过快递或邮寄的方式寄送到：上海市。如发货单及发票(如果有)未随货物一并返还，可能造成我们无法或者延误为您办理退换货，敬请谅解 。<br />\r\n\r\n2）我们收到您的包裹后，会对您退回的商品进行质检，然后根据您的要求进行退换货操作。若办理换货，我们会在收到您的包裹48小时内，将您需要的商品发出，若您需要的商品缺货，我们会在第一时间联系您，经您同意的情况下更换为其它商品或根据您的要求，进行退货处理。<br />\r\n\r\n若办理退货，退款会使用您原订单的支付方式进行退回，支付现金的订单使用银行转账退款。采用这两种方式退款到达您的帐户会需要一定的时间，银行转帐会根据不同银行间跨行转账的到账期而不同。<br />\r\n\r\n3）因商品质量问题(非人为损坏)造成的退、换货，也买茶承担您邮寄或快递费用，请您保留好相关凭证\r\n', 2, '', '', '', ''),
(22, 5, '投诉与咨询', '投诉<br />非网站注册会员可拨打免费客服热线：021-12345678<br />网站注册会员可登陆我的也买茶，点击我的投诉，管理您的投诉内容，同时也欢迎您拨打免费客服热线：021-12345678，向客服人员提交投诉。<br />如果客户与也买茶之间发生任何争议，可依据相关法律来解决。<br />咨询<br />如果您对商品有任何疑问，欢迎在产品页面的下方留言咨询，我们会在第一时间回复。网站注册会员可登陆我的也买茶，点击我的咨询，查看咨询结果。同时也欢迎您拨打免费客服热线：021-12345678，向客服人员咨询。 ', 3, '', '', '', ''),
(23, 5, '常见问题', '1）哪些城市可以货到付款？订单完成后多长时间送达？<br />开通了多个城市的快递送货上门货到付款服务，请点击查询具体城市及时间。<br />2）如何订购？您可以通过拨打热线电话400-123-4567联系我们的销售中心进行订购，也可以通过网站自行订购。 <br />3）如何付款？我们为您提供多种结算方式，您可以根据自身情况选择方便的方式支付货款。<br />货到付款：配送员送货上门，客户收单验货后，直接将货款交给快递公司的工作人员。在线支付：指直接使用您的银行帐号或卡号进行网上在线付款，您的银行卡需开通网上银行支付的服务才能使用此种支付方式。 <br />4）订单生成后我需要多长时间内支付？<br />选择在线支付、邮局汇款时，如果在以下规定时间内未收到您的款项，系统将自动取消订单。网上支付：等待3天；邮局汇款： 等待7天。 <br />5）我不满意，如何办理退换货？自客户签收商品之日起7日内，商品在未经开启，无人为破损的情况下，如您对我们的商品不满意，我们将提供退换货的服务。<br />在您联系我们的客服，并申请退换货后。请将需退换的商品、原包装内的商品发货单及发票(如果有)，通过快递或邮寄的方式寄送到：上海市如发货单及发票(如果有)未随货物一并返还，我们收到您的包裹后，会对您退回的商品进行质检，然后根据您的要求进行退换货操作。 ', 4, '', '', '', ''),
(7, 1, '诚聘英才', '<p>&nbsp;</p>', 3, '', '', '', 'job'),
(11, 2, '用户注册', '您只要通过注册创建自己的账户，即可成为会员。\r\n注意主要有以下两种途径：\r\n\r\n1.网站注册\r\n(1)进入网站后，点击页面右上方“会员中心”，将出现新页面，在相应提示处输入您的邮箱地址或手机号、密码、确认密码后点击“完成”即可，注册用户名是唯一的。注册成功后，您可以到网站“个人信息管理”进行个人信息的更新。\r\n\r\n(2)在订购过程中也可注册。 进入 - 选择您所需要的商品 - 点击放入购物车内 - 将出现新页面 - 在页面右侧点击“注册”进入注册页面。\r\n\r\n', 1, '', '', '', ''),
(12, 2, '会员制度', '积分制度累积积分<br />① 您在累积的总积分，包括已经使用的积分。 <br />可用积分<br />① 您的总积分里，可以实际使用的部分。<br />即种积分，减去已经使用（兑换商品和礼品）的积分。 <br />积分获取您可以通过以下几种方式，获取积分： <br />1.购买商品 <br />b)积分以最终支付的订单金额为准，折扣券和抵用券抵用的金额不参与积分，运费可参与积分。 <br />c)积分将会在发货后的15天内，自动添加到您的账户中。如您进行了退货处理，积分也将在退货处理完毕后自动退还。 <br />2.推荐朋友<br />a)推荐朋友成为会员并产生消费，您即可获得积分。 <br />b)您的积分额度为"被推荐者"一年内购物消费积分的50%。比如，您推荐的朋友注册后一年内购买商品获得1000积分，您可同时获得500积分；而其参加活动获取的积分，不计入您可获取的积分范围。 <br />c)您获得的积分，将会在"被推荐者"积分产生后，自动添加到您的账户。 <br />3.调研反馈<br />a)注册后30天内，参加并完成 "新用户调研"问卷，即可获得200积分。 <br />b)发货后30天内，登陆网站参加并完成"购物满意度"问卷，即可获取200积分。 <br />c)该积分将会在您完成问卷后，自动添加到您的账户中。 <br />4.市场活动 <br />a)参加单独的市场活动，可享受双倍积分或额外积分。请随时关注。<br />积分使用您可以采取以下几种方式，使用积分： <br />1.兑换商品<br />a)积分可用来兑换完整的商品。 <br />b)积分不可用来抵扣运费，物流费用需额外支付。 <br />2.兑换礼品 <br />a)参加单独的积分兑礼活动，享受兑换优惠。请随时关注。 ', 3, '', '', '', ''),
(13, 3, '支付方式', '货到付款目前开通了多个城市的快递送货上门货到付款服务，详情可上网站查询。<br />全国知名专业快递公司为您快递送达，当面确认商品。<br />选购的商品可在订单确定后1-2天（上海及其他五大货仓辐射地区）或3-5天（其他地区）内送货上门。<br />在线支付在线支付包含支付宝支付。<br />*需要发票的顾客请注明，发票将在货款付讫后两周内到达。<br />支付提示：与支付宝签署协议，在购物您可以直接使用支付宝支付。收到产品后再确认付款，让您买得更安心。', 1, '', '', '', ''),
(14, 3, '发票制度', '电话订购时，确认好所需要的产品后，请将您的发票抬头提供给销售人员，发票将在货款付讫后两周内到达。如您在网站订购，请在提交订单前在您是否需要开具发 票处选择“是”，并填写发票抬头。发票将在货款付讫后两周内到达。我们提供的发票为产品专用发票，此发票可用作单位报销使用。一张订单对应一张发票。配送费金额不包含在订单发票金额中。', 2, '', '', '', ''),
(15, 3, '如何退款', '如您需办理退款，请联系我们的帮助中心，经客服工作人员核实后会为您办理退款，以下为退款方式及时间：<br />支付方式 退款方式 退款周期 在线支付 退至顾客原支付卡 1-3个工作日，偏远地区及小银行时间稍长 <br />货到付款 通过邮局或银行转账退至顾客 邮局汇款：7-14个工作日<br />温馨提示：若由于第三方支付平台或银行原因，造成货款无法及时退回，我们的客服人员会与您联系解决。 ', 3, '', '', '', ''),
(16, 4, '关于配送', '目前开通了多个城市的快递送货上门货到付款服务，详情可上网站查询咨询。<br />\r\n到货时间：上海及其他五大货仓辐射地区2-3个工作日，其他地区3-5个工作日（除人为不可控的特殊原因外，如：洪水、交通故障、天灾等）<br />\r\n注：需要节假日配送的顾客，请在下单前与客服联系，以免延误您收货时间。', 1, '', '', '', ''),
(17, 4, '款到发货', '目前开通了多个城市的快递送货上门货到付款服务，详情可上网站查询咨询。<br />\r\n到货时间：上海及其他五大货仓辐射地区2-3个工作日，其他地区3-5个工作日（除人为不可控的特殊原因外，如：洪水、交通故障、天灾等）<br />\r\n注：需要节假日配送的顾客，请在下单前与客服联系，以免延误您收货时间。', 2, '', '', '', ''),
(18, 4, '配送费标准', '<p>\r\n<table style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; BORDER-LEFT: rgb(192,192,192) 1px solid; BORDER-TOP: rgb(192,192,192) 1px solid" cellSpacing=0 cellPadding=0 width="100%">\r\n<tbody>\r\n<tr>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #f7fbfe; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; COLOR: #2152a1; FONT-WEIGHT: bold; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=25 vAlign=center width=70 align=middle>配送区域</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #f7fbfe; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; COLOR: #2152a1; FONT-WEIGHT: bold; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" vAlign=center width=59 align=middle>省份</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #f7fbfe; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; COLOR: #2152a1; FONT-WEIGHT: bold; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" vAlign=center width=86 align=middle>城市</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #f7fbfe; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; COLOR: #2152a1; FONT-WEIGHT: bold; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" vAlign=center width=360 align=middle>配送范围</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #f7fbfe; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; COLOR: #2152a1; FONT-WEIGHT: bold; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" vAlign=center width=84 align=middle>运费 （元）</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: #f7fbfe; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; COLOR: #2152a1; FONT-WEIGHT: bold; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" vAlign=center width=80 align=middle>配送时间</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; BACKGROUND-COLOR: rgb(238,238,238); PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=52 width=70>华东</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=59>上海</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>上海</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>上海地区（三岛除外）</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20>6</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20>1~2天</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 colSpan=5>&nbsp;</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red rowSpan=13 width=59>江苏</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>南京</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360 left="">\r\n<div align=left>玄武区(兰园街道)、鼓楼区(宁海路街道)、建邺区(滨湖街道)、白下区(洪武路街道)、秦淮区(秦虹街道)、下关区(中山桥街道)、雨花台区(宁南街道)、浦口区(珠江镇)、栖霞区(尧化街道)、江宁区(东山街道)、六合区(雄州镇)</div></td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=13>8</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=13>2~4天</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>苏州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>金阊区、常熟市(虞山镇)、沧浪区、张家港市(杨舍镇)、平江区、太仓市(城厢镇)、虎丘区、昆山市(玉山镇)、吴中区(长桥街道)、吴江市(松陵镇)、相城区(元和街道)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>常州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>钟楼区、金坛市(金城镇)、天宁区、溧阳市(溧城镇)、戚墅堰区、新北区(河海街道)、武进区(湖塘镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>无锡</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>崇安区、江阴市(澄江镇)、北塘区、宜兴市(宜城镇)、南长区、锡山区(东亭镇)、惠山区(堰桥镇)、滨湖区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>镇江</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>京口区、丹阳市(云阳镇)、润州区、扬中市(三茅镇)、丹徒区(谷阳镇)、句容市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>南通</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>崇川区、如皋市(如城镇)、海安县(海安镇)、港闸区、通州市(金沙镇)、如东县(掘港镇)、海门市(海门镇)、启东市(汇龙镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>扬州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>维扬区、高邮市(高邮镇)、宝应县(安宜镇)、广陵区、江都市(仙女镇)、邗江区、仪征市(真州镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>徐州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>云龙区、邳州市(运河镇)、铜山县(铜山镇)、鼓楼区、新沂市(新安镇)、睢宁县(睢城镇)、九里区、沛 县(沛城镇)、贾汪区(老矿街道)、丰 县(凤城镇)、泉山区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>淮安</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>清河区、涟水县(涟城镇)、清浦区、洪泽县(高良涧镇)、楚州区(淮城镇)、金湖县(黎城镇)、淮阴区(王营镇)、盱眙县(盱城镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>连云港</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>新浦区、东海县(牛山镇)、连云区、灌云县(伊山镇)、海州区、赣榆县(青口镇)、灌南县(新安镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>泰州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>海陵区、泰兴市(泰兴镇)、高港区(口岸镇)、姜堰市(姜堰镇)、靖江市(靖城镇)、兴化市(昭阳镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>宿迁</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>宿城区、沭阳县(沭城镇)、宿豫区(顺河镇)、泗阳县(众兴镇)、泗洪县(青阳镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>盐城</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>亭湖区、东台市(东台镇)、建湖县(建湖镇)、盐都区(潘黄镇)、大丰市(大中镇)、响水县(响水镇)、阜宁县(阜城镇)、射阳县(合德镇)、滨海县(东坎镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red rowSpan=11 width=59>浙江</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>杭州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>拱墅区(湖墅街道)、西湖区、上城区(清波街道)、下城区(武林街道)、江干区、滨江区(西兴街道)、余杭区(临平街道)、萧山区(城厢街道)、建德市(新安江街道)、富阳市(富春街道)、临安市(锦城街道)、桐庐县(桐君街道)、淳安县(千岛湖镇)</div></td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=11>8</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=11>2~4天</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>宁波</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>海曙区、江东区、江北区、镇海区(招宝山街道)、北仑区(新碶街道)、鄞州区(钟公庙街道)、余姚市(兰江街道)、慈溪市(浒山街道)、奉化市(锦屏街道)、宁海县(跃龙街道)、象山县(丹城街道)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>温州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>鹿城区、龙湾区(永中街道）、瓯海区（娄桥街道)、瑞安市(安阳街道)、瓯海区(娄桥街道)、瑞安市(安阳街道)、永嘉县(上塘镇)、洞头县(北岙镇)、平阳县(昆阳镇)、苍南县(灵溪镇)、文成县(大峃镇)、泰顺县(罗阳镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>嘉兴</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>南湖区、秀洲区(新城街道)、海宁市(硖石街道)、嘉善县(魏塘镇)、平湖市(当湖街道)、海盐县(武原镇)、桐乡市(梧桐街道)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>湖州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>吴兴区、长兴县(雉城镇)、南浔区(南浔镇)、德清县(武康镇)、安吉县(递铺镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>绍兴</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>越城区、诸暨市(暨阳街道)、绍兴县(柯桥街道)、上虞市(百官街道)、新昌县(城关镇)、嵊州市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>金华</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>婺城区、兰溪市(兰江街道)、武义县(壶山街道)、金东区(多湖街道)、义乌市(稠城街道)、浦江县(浦阳街道)、东阳市(吴宁街道)、磐安县(安文镇)、永康市(东城街道)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>衢州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>柯城区、江山市、龙游县(龙洲街道)、衢江区(樟潭街道)、常山县(天马镇)、开化县(城关镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>舟山</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>定海区、岱山县(高亭镇)、普陀区(沈家门街道)、嵊泗县(菜园镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>台州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>椒江区(海门街道)、临海市(古城街道)、玉环县(珠港镇)、黄岩区(东城街道)、温岭市(太平街道)、天台县(赤城街道)、路桥区(路北街道)、仙居县(福应街道)、三门县(海游镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>丽水</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>莲都区、龙泉市(龙渊街道)、缙云县(五云镇)、景宁畲族自治县(鹤溪镇)、青田县(鹤城镇)、云和县(云和镇)、遂昌县(妙高镇)、松阳县(西屏镇)、庆元县(松源镇)</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red rowSpan=17 width=59>安徽</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red width=86>合肥</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>庐阳区、瑶海区、蜀山区、包河区</div></td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px">8</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=17>3~5天</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>芜湖</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>镜湖区、弋江区、鸠江区、三山区</div></td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=16>8</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>蚌埠</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>蚌山区、龙子湖区、禹会区、淮上区 </div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>淮南</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>田家庵区、大通区、谢家集区、八公山区、潘集区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>马鞍山</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>雨山区、金家庄、花山区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>淮北</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>相山区、杜集区、烈山区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>铜陵</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>铜官山、狮子山、郊区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>安庆</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>迎江区、桐城市、大观区、宜秀区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>黄山</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>屯溪区、黄山区、徽州区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>滁州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>琅琊区、天长市、南谯区、明光市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>阜阳</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>颍州区、界首市、颍东区、颍泉区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>宿州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>埇桥区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>巢湖</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>居巢区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>亳州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>谯城区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>池州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>贵池区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>宣城</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>宣州区、宁国市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" class=red height=20 width=86>六安</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>金安区、裕安区</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=9 width=59>福建</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>福州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>台江区、仓山区、马尾区、晋安区、长乐市(以上全境派送)、鼓楼区(全区派送)、闽侯县、福清市<br /></div></td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px">8</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=9>3~5天</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>厦门</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>思明区、湖里区、集美区、同安区、翔安区(以上全境派送)、海沧区(区内派送)</div></td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" rowSpan=8>8</td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>莆田</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>城厢区、涵江区、荔城区、秀屿区、仙游县</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>三明</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>梅列区、三元区(以上全境派送)、永安市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>泉州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>鲤城区、丰泽区、洛江区、泉港区、石狮市、晋江市(以上全境派送)、惠安县、安溪县、德化县、南安市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>漳州</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>芗城区、龙文区、漳浦县、长泰县、南靖县、龙海市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>南平</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>延平区、武夷山市、建瓯市、建阳市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>龙岩</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>新罗区、永定县、上杭县、连城县、漳平市</div></td></tr>\r\n<tr align=middle>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" height=20 width=86>宁德</td>\r\n<td style="BORDER-BOTTOM: rgb(192,192,192) 1px solid; PADDING-BOTTOM: 5px; PADDING-LEFT: 5px; PADDING-RIGHT: 5px; BORDER-RIGHT: rgb(192,192,192) 1px solid; PADDING-TOP: 5px" width=360>\r\n<div align=left>蕉城区(全区派送)、古田县、屏南县、寿宁县、周宁县、柘荣县、福安市、福鼎市</div></td></tr></tbody></table></p>', 3, '', '', '', ''),
(19, 4, '验货与签收', '1.请您务必在收到商品时开箱验货，确认无误后再进行签收。如您验收商品时发现商品包装破损、商品短缺或错误、商品存在表面质量问题等，请您现场向配送人员指 出后拒收整个包裹。对于有塑封包装或开箱即损贴纸的商品，如您已打开塑封包装或撕开开箱即损贴纸则不可拒收，但商品短缺或错误、商品存在表面质量问题的除外。<br />\r\n\r\n2.如您验收商品后确认商品的名称、数量、价格等信息无误，商品包装完好、商品没有划痕、破损等表面质量问题，请在发货单正面客户签收处签字确认。您或您委托 的收货人的签字表示您已确认上述内容无误，有权不接受以此为由的退换货。<br />\r\n\r\n3.签收商品后，如果商品出现质量问题，请与客服中心联系。<br />\r\n\r\n4.如您在下订单时选择了“需要发票”，请仔细检查发票是否随商品一起送到，如未收到发票，请与客服中心联系。<br />\r\n\r\n注：有个别配送商是要求先付款才能打开包装箱的，在这种情况下，请您检查外包装。如外包装有破损，请在发货单上注明。\r\n', 4, '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `dev_page_group`
--

CREATE TABLE IF NOT EXISTS `dev_page_group` (
  `id` int(3) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL default '',
  `xuhao` int(5) NOT NULL default '0',
  `moveable` int(1) NOT NULL default '1',
  `folder` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dev_page_group`
--

INSERT INTO `dev_page_group` (`id`, `groupname`, `xuhao`, `moveable`, `folder`) VALUES
(1, '关于我们', 1, 0, 'html'),
(2, '新手指南', 1, 1, 'guide'),
(3, '支付说明', 1, 1, 'pay'),
(4, '配送说明', 1, 1, 'send'),
(5, '售后服务', 1, 1, 'service');

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_brand`
--

CREATE TABLE IF NOT EXISTS `dev_shop_brand` (
  `id` int(12) NOT NULL auto_increment,
  `brand` char(100) NOT NULL default '',
  `logo` char(100) NOT NULL default '',
  `url` char(100) NOT NULL default '',
  `intro` text,
  `xuhao` int(5) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `dev_shop_brand`
--

INSERT INTO `dev_shop_brand` (`id`, `brand`, `logo`, `url`, `intro`, `xuhao`, `tj`) VALUES
(2, '中闽弘泰', '', '', '黄山毛峰产于安徽省歙县黄山，中国茶叶品牌之一。现在黄山名茶黄山毛峰作为国家礼茶，每年“五一”前送往北京、上海、广州等地。1976年以来，安徽省外贸部门将黄山名茶黄山毛峰装二两小袋包装出口,打入巴黎、伦敦和东南亚国家茶叶市场，颇受国外人士的赞赏 ', 2, 0),
(3, '山国饮艺', '', '', '正山小种生产历史悠久，19世纪70年代已销欧美各国，现出口德国、英国等地。品牌红茶正山小种冲水后汤色艳红，经久耐泡，滋味醇厚，似桂元汤味，气味芬芳浓烈。特别是加入牛奶的品牌红茶正山小种，茶香不减，形成糖浆状奶茶，甘甜爽口，别具风味。 品牌红茶正山小种非常适合于咖喱和肉的菜肴搭配。本文由和茶网原创，转摘请注明出处。 ', 3, 0),
(4, '贡牌', '', '', '祁门红茶，简称祁红，是我国传统功夫红茶的珍品，为历史名茶，出产于19世纪后期，是世界三大高香茶之一，有“茶中英豪”，“群芳最”，“王子茶”等美誉。品牌红茶祁门红茶主要产于安徽省祁门县出口英国，荷兰，德国等多个国家和地区，一直是我国的国事礼茶。 ', 4, 0),
(5, '凤凰山', '', '', '云南滇红是云南红茶的统称，分为品牌红茶滇红工夫茶和品牌红茶滇红碎茶两种，产区主要是云南澜沧江沿岸的临沧、保山、思茅、西双版纳、德宏、红河6个地州的20多个县。品牌红茶滇红工夫，以1芽1叶为主制造而成，成品茶芽叶肥壮，苗锋秀丽完整，金毫显露，色泽乌黑油润，汤色红浓透明，滋味浓厚鲜爽，香气高醇持久，叶底红匀明亮。本文由和茶网原创，转摘请注明出处。 ', 5, 0),
(7, '御龙阁', '', '', '洞庭碧螺春茶属于绿茶类，也是中国茶叶品牌之一。主产于江苏省苏州市吴县太湖的洞庭山，所以又称“洞庭碧螺春茶”。洞庭碧螺春茶已有1000多年历史。民间最早叫“洞庭茶”，又叫“吓煞人香”。 ', 1, 0),
(14, '艺福堂', '', 'http://', '“艺福堂”茗茶是杭州艺福茶业有限公司创立的品牌。取“百年福气，茶艺满堂”之意。', 0, 0),
(11, '西湖龙井', '', '', '清代，作为中国茶叶品牌<a class=txtlink href="http://www.hecha.cn/cy/list_cy-35-35.html" target=_blank><font color=#316ac5>龙井茶</font></a>则开始名列众名茶之首。清代乾隆(1736――1795)年间，乾隆皇帝六下江南，有四次来龙井茶区观看茶叶采制，品茶赋诗，乾隆在《雨中再游龙井》诗有“西湖风景美，龙井名茶佳”之句，并将胡公庙前的十八棵茶树封为“御茶”。晚清民国时期，龙井茶树已遍布狮子峰、龙井、灵隐、五云山、虎跑、梅家坞等地，故又分狮、龙、云、虎等几个品类', 0, 0),
(13, '安吉白茶', '', 'http://', '白色的绿茶，是绿茶中珍贵的白化品种，古人则看做是祥瑞灵动的象征。安吉白茶产自浙江省安吉县，是一处美丽富饶的原产地。安吉白茶的白，主要原因是在于茶树嫩芽为白色，因此采摘到的茶叶极其珍贵，鲜嫩无比！', 0, 0),
(15, '尚客茶品', '', 'http://', '色的绿茶，是绿茶中珍贵的白化品种，古人则看做是祥瑞灵动的象征。安吉白茶产自浙江省安吉县，是一处美丽富饶的原产地。安吉白茶的白，主要原因是在于茶树嫩芽为白色，因此采摘到的茶叶极其珍贵，鲜嫩无比！', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_brandcat`
--

CREATE TABLE IF NOT EXISTS `dev_shop_brandcat` (
  `id` int(12) NOT NULL auto_increment,
  `brandid` int(10) NOT NULL default '0',
  `catid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=899 ;

--
-- 转存表中的数据 `dev_shop_brandcat`
--

INSERT INTO `dev_shop_brandcat` (`id`, `brandid`, `catid`) VALUES
(631, 15, 8),
(651, 15, 89),
(650, 15, 88),
(649, 15, 87),
(648, 15, 86),
(647, 15, 7),
(646, 15, 78),
(645, 15, 77),
(644, 15, 6),
(696, 7, 99),
(695, 7, 89),
(742, 2, 126),
(694, 7, 88),
(693, 7, 87),
(692, 7, 86),
(731, 2, 6),
(723, 2, 114),
(691, 7, 7),
(630, 15, 1),
(629, 13, 15),
(711, 7, 138),
(627, 14, 140),
(626, 14, 139),
(625, 14, 138),
(676, 7, 107),
(701, 7, 131),
(643, 15, 72),
(706, 7, 134),
(734, 2, 7),
(728, 2, 57),
(700, 7, 130),
(624, 14, 137),
(623, 14, 129),
(622, 14, 136),
(621, 14, 135),
(620, 14, 134),
(741, 2, 101),
(628, 13, 1),
(619, 14, 128),
(618, 14, 133),
(718, 2, 14),
(617, 14, 127),
(616, 14, 132),
(733, 2, 78),
(727, 2, 3),
(615, 14, 131),
(614, 14, 130),
(613, 14, 126),
(612, 14, 101),
(611, 14, 100),
(898, 3, 140),
(642, 15, 71),
(641, 15, 70),
(722, 2, 109),
(710, 7, 137),
(640, 15, 5),
(639, 15, 114),
(699, 7, 126),
(897, 3, 139),
(896, 3, 138),
(895, 3, 137),
(894, 3, 129),
(610, 14, 99),
(609, 14, 89),
(608, 14, 88),
(607, 14, 87),
(606, 14, 86),
(605, 14, 7),
(604, 14, 78),
(833, 5, 8),
(750, 2, 138),
(832, 5, 1),
(638, 15, 109),
(740, 2, 100),
(637, 15, 108),
(893, 3, 133),
(892, 3, 127),
(891, 3, 132),
(890, 3, 131),
(690, 7, 78),
(689, 7, 77),
(688, 7, 6),
(687, 7, 72),
(709, 7, 129),
(717, 2, 10),
(721, 2, 108),
(726, 2, 36),
(686, 7, 71),
(737, 2, 88),
(675, 7, 15),
(685, 7, 70),
(684, 7, 5),
(746, 2, 127),
(749, 2, 137),
(889, 3, 130),
(683, 7, 59),
(682, 7, 58),
(603, 14, 77),
(602, 14, 6),
(601, 14, 72),
(720, 2, 107),
(600, 14, 71),
(705, 7, 128),
(736, 2, 87),
(888, 3, 126),
(599, 14, 70),
(708, 7, 136),
(716, 2, 9),
(598, 14, 5),
(887, 3, 101),
(886, 3, 100),
(885, 3, 99),
(884, 3, 89),
(597, 14, 59),
(596, 14, 58),
(595, 14, 57),
(674, 7, 14),
(594, 14, 3),
(593, 14, 36),
(592, 14, 35),
(591, 14, 2),
(590, 14, 114),
(589, 14, 109),
(588, 14, 108),
(883, 3, 88),
(587, 14, 107),
(745, 2, 132),
(725, 2, 35),
(586, 14, 15),
(698, 7, 101),
(585, 14, 14),
(882, 3, 87),
(791, 4, 8),
(713, 7, 140),
(673, 7, 10),
(744, 2, 131),
(790, 4, 1),
(748, 2, 129),
(752, 2, 140),
(672, 7, 9),
(669, 15, 140),
(668, 15, 139),
(667, 15, 138),
(739, 2, 99),
(704, 7, 133),
(738, 2, 89),
(747, 2, 133),
(584, 14, 10),
(583, 14, 9),
(582, 14, 8),
(581, 14, 1),
(730, 2, 59),
(881, 3, 86),
(719, 2, 15),
(666, 15, 137),
(665, 15, 129),
(664, 15, 136),
(663, 15, 135),
(880, 3, 7),
(743, 2, 130),
(636, 15, 107),
(724, 2, 2),
(712, 7, 139),
(635, 15, 15),
(634, 15, 14),
(633, 15, 10),
(879, 3, 78),
(878, 3, 77),
(877, 3, 6),
(876, 3, 72),
(662, 15, 134),
(661, 15, 128),
(660, 15, 133),
(659, 15, 127),
(658, 15, 132),
(657, 15, 131),
(656, 15, 130),
(655, 15, 126),
(751, 2, 139),
(654, 15, 101),
(632, 15, 9),
(715, 2, 8),
(714, 2, 1),
(729, 2, 58),
(732, 2, 77),
(735, 2, 86),
(681, 7, 57),
(680, 7, 3),
(679, 7, 114),
(703, 7, 127),
(707, 7, 135),
(653, 15, 100),
(652, 15, 99),
(671, 7, 8),
(670, 7, 1),
(702, 7, 132),
(697, 7, 100),
(678, 7, 109),
(677, 7, 108),
(525, 11, 8),
(524, 11, 1),
(875, 3, 71),
(874, 3, 70),
(873, 3, 5),
(872, 3, 59),
(871, 3, 58),
(870, 3, 57),
(869, 3, 3),
(868, 3, 36),
(867, 3, 35),
(866, 3, 2),
(792, 4, 9),
(793, 4, 10),
(794, 4, 14),
(795, 4, 15),
(796, 4, 107),
(797, 4, 108),
(798, 4, 109),
(799, 4, 114),
(800, 4, 2),
(801, 4, 35),
(802, 4, 36),
(803, 4, 3),
(804, 4, 57),
(805, 4, 58),
(806, 4, 59),
(807, 4, 5),
(808, 4, 70),
(809, 4, 71),
(810, 4, 72),
(811, 4, 6),
(812, 4, 77),
(813, 4, 78),
(814, 4, 7),
(815, 4, 86),
(816, 4, 87),
(817, 4, 88),
(818, 4, 89),
(819, 4, 99),
(820, 4, 100),
(821, 4, 101),
(822, 4, 126),
(823, 4, 130),
(824, 4, 131),
(825, 4, 132),
(826, 4, 127),
(827, 4, 133),
(828, 4, 128),
(829, 4, 134),
(830, 4, 135),
(831, 4, 136),
(834, 5, 9),
(835, 5, 10),
(836, 5, 14),
(837, 5, 15),
(838, 5, 107),
(839, 5, 108),
(840, 5, 109),
(841, 5, 114),
(842, 5, 2),
(843, 5, 35),
(844, 5, 36),
(845, 5, 3),
(846, 5, 57),
(847, 5, 58),
(848, 5, 59),
(849, 5, 5),
(850, 5, 70),
(851, 5, 71),
(852, 5, 72),
(853, 5, 6),
(854, 5, 77),
(855, 5, 78),
(856, 5, 126),
(857, 5, 130),
(858, 5, 131),
(859, 5, 132),
(860, 5, 127),
(861, 5, 133),
(862, 5, 128),
(863, 5, 134),
(864, 5, 135),
(865, 5, 136);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_cat`
--

CREATE TABLE IF NOT EXISTS `dev_shop_cat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) NOT NULL default '0',
  `cat` char(100) NOT NULL default '',
  `xuhao` int(12) NOT NULL default '0',
  `catpath` char(255) NOT NULL default '',
  `nums` int(20) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  `ifchannel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=141 ;

--
-- 转存表中的数据 `dev_shop_cat`
--

INSERT INTO `dev_shop_cat` (`catid`, `pid`, `cat`, `xuhao`, `catpath`, `nums`, `tj`, `ifchannel`) VALUES
(1, 0, '绿茶', 1, '0001:', 0, 1, 0),
(2, 0, '红茶', 2, '0002:', 0, 1, 0),
(3, 0, '乌龙茶', 3, '0003:', 0, 1, 0),
(5, 0, '普洱茶', 5, '0005:', 0, 1, 0),
(6, 0, '花茶', 7, '0006:', 0, 1, 0),
(7, 0, '立体茶包', 8, '0007:', 0, 0, 0),
(8, 1, '龙井', 1, '0001:0008:', 0, 1, 0),
(9, 1, '碧螺春', 2, '0001:0009:', 0, 1, 0),
(10, 1, '黄山毛峰', 3, '0001:0010:', 0, 1, 0),
(14, 1, '信阳毛尖', 7, '0001:0014:', 0, 1, 0),
(15, 1, '安吉白茶', 8, '0001:0015:', 0, 1, 0),
(35, 2, '祁门红茶', 1, '0002:0035:', 0, 1, 0),
(36, 2, '滇红', 2, '0002:0036:', 0, 1, 0),
(57, 3, '安溪铁观音', 1, '0003:0057:', 0, 1, 0),
(58, 3, '台湾乌龙', 2, '0003:0058:', 0, 1, 0),
(59, 3, '武夷岩茶', 3, '0003:0059:', 0, 1, 0),
(138, 129, '瓷器', 2, '0129:0138:', 0, 0, 0),
(70, 5, '普洱散茶', 1, '0005:0070:', 0, 1, 0),
(71, 5, '普洱饼茶', 2, '0005:0071:', 0, 1, 0),
(72, 5, '普洱沱茶', 3, '0005:0072:', 0, 1, 0),
(77, 6, '工艺花茶', 1, '0006:0077:', 0, 1, 0),
(78, 6, '花草茶', 2, '0006:0078:', 0, 1, 0),
(136, 128, '富贵红礼盒', 3, '0128:0136:', 0, 0, 0),
(135, 128, '时尚原木礼盒', 2, '0128:0135:', 0, 0, 0),
(134, 128, '简约绿礼盒', 1, '0128:0134:', 0, 0, 0),
(133, 127, '桑抹茶', 1, '0127:0133:', 0, 0, 0),
(86, 7, '原叶茶', 1, '0007:0086:', 0, 0, 0),
(87, 7, '配方茶', 2, '0007:0087:', 0, 0, 0),
(88, 7, '进口果粒茶', 3, '0007:0088:', 0, 0, 0),
(89, 7, '油切黑乌龙', 4, '0007:0089:', 0, 0, 0),
(130, 126, '减肥茶', 1, '0126:0130:', 0, 0, 0),
(131, 126, '保健茶', 2, '0126:0131:', 0, 0, 0),
(99, 0, '茉莉花茶', 6, '0099:', 0, 1, 0),
(100, 99, '茉莉大白毫', 1, '0099:0100:', 0, 1, 0),
(101, 99, '茉莉龙珠', 2, '0099:0101:', 0, 1, 0),
(140, 129, '茶具', 4, '0129:0140:', 0, 0, 0),
(139, 129, '不锈钢', 3, '0129:0139:', 0, 0, 0),
(107, 1, '六安瓜片', 9, '0001:0107:', 0, 1, 0),
(108, 1, '开化龙顶', 10, '0001:0108:', 0, 1, 0),
(109, 1, '蒸青绿茶', 11, '0001:0109:', 0, 1, 0),
(114, 1, '太平猴魁', 12, '0001:0114:', 0, 1, 0),
(132, 126, '柚子茶', 3, '0126:0132:', 0, 0, 0),
(137, 129, '玻璃茶具', 1, '0129:0137:', 0, 0, 0),
(126, 0, '保健茶', 9, '0126:', 0, 0, 0),
(127, 0, '茶食品', 10, '0127:', 0, 0, 0),
(128, 0, '精品礼盒', 11, '0128:', 0, 0, 0),
(129, 0, '茶具精品', 12, '0129:', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_con`
--

CREATE TABLE IF NOT EXISTS `dev_shop_con` (
  `id` int(12) NOT NULL auto_increment,
  `catid` int(12) NOT NULL default '0',
  `catpath` varchar(255) NOT NULL default '',
  `pcatid` int(12) NOT NULL default '0',
  `brandid` int(12) NOT NULL default '0',
  `contype` varchar(20) NOT NULL default 'shop',
  `bn` varchar(30) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `body` text,
  `canshu` text NOT NULL,
  `price0` decimal(10,2) default '0.00',
  `price` decimal(10,2) default '0.00',
  `danwei` varchar(20) NOT NULL default '',
  `kucun` int(6) NOT NULL default '0',
  `cent` int(10) NOT NULL default '0',
  `weight` int(10) NOT NULL default '0',
  `salenums` int(6) NOT NULL default '0',
  `xuhao` int(5) NOT NULL default '0',
  `cl` int(20) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  `iffb` int(1) NOT NULL default '0',
  `ifbold` int(1) NOT NULL default '0',
  `ifred` varchar(20) NOT NULL default '',
  `type` varchar(30) NOT NULL default '',
  `src` varchar(150) NOT NULL default '',
  `dtime` int(11) NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  `author` varchar(100) NOT NULL default '',
  `source` varchar(100) NOT NULL default '',
  `memberid` varchar(100) NOT NULL default '',
  `secure` int(11) NOT NULL default '0',
  `memo` text NOT NULL,
  `prop1` char(255) NOT NULL default '',
  `prop2` char(255) NOT NULL default '',
  `prop3` char(255) NOT NULL default '',
  `prop4` char(255) NOT NULL default '',
  `prop5` char(255) NOT NULL default '',
  `prop6` char(255) NOT NULL default '',
  `prop7` char(255) NOT NULL default '',
  `prop8` char(255) NOT NULL default '',
  `prop9` char(255) NOT NULL default '',
  `prop10` char(255) NOT NULL default '',
  `prop11` char(255) NOT NULL default '',
  `prop12` char(255) NOT NULL default '',
  `prop13` char(255) NOT NULL default '',
  `prop14` char(255) NOT NULL default '',
  `prop15` char(255) NOT NULL default '',
  `prop16` char(255) NOT NULL default '',
  `prop17` char(255) NOT NULL default '',
  `prop18` char(255) NOT NULL default '',
  `prop19` char(255) NOT NULL default '',
  `prop20` char(255) NOT NULL default '',
  `tags` varchar(255) NOT NULL default '',
  `zhichi` int(5) NOT NULL default '0',
  `fandui` int(5) NOT NULL default '0',
  `tplog` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `dev_shop_con`
--

INSERT INTO `dev_shop_con` (`id`, `catid`, `catpath`, `pcatid`, `brandid`, `contype`, `bn`, `title`, `body`, `canshu`, `price0`, `price`, `danwei`, `kucun`, `cent`, `weight`, `salenums`, `xuhao`, `cl`, `tj`, `iffb`, `ifbold`, `ifred`, `type`, `src`, `dtime`, `uptime`, `author`, `source`, `memberid`, `secure`, `memo`, `prop1`, `prop2`, `prop3`, `prop4`, `prop5`, `prop6`, `prop7`, `prop8`, `prop9`, `prop10`, `prop11`, `prop12`, `prop13`, `prop14`, `prop15`, `prop16`, `prop17`, `prop18`, `prop19`, `prop20`, `tags`, `zhichi`, `fandui`, `tplog`) VALUES
(1, 8, '0001:0008:', 0, 11, 'shop', 'A001', '西湖龙井', '龙井茶是已有1200多年历史的中国名茶，为绿茶之首，被誉为"绿茶皇后"。龙井茶加工方法独特，运用"抓、抖、搭、拓、捺、推、扣、甩、磨、压"等十大手法，其最后一道"压"的工艺造就了其独特的光扁平直的外形。香味独具"兰花豆"香。 ', '', 744.00, 620.00, '盒', 199, 0, 100, 1, 0, 6, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255501953.jpg', 1255501707, 1286953245, '系统管理员', '', '0', 0, '龙井茶是已有1200多年历史的中国名茶，为绿茶之首，被誉为&quot;绿茶皇后&quot;。龙井茶加工方法独特，运用&quot;抓、抖、搭、拓、捺、推、扣、甩、磨、压&quot;等十大手法，其最后一道&quot;压&quot;的工艺造就了其独特的光扁平直的外形。香味独具&quot;兰花豆&quot;香。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '畅销单品,', 0, 0, ''),
(2, 59, '0003:0059:', 0, 7, 'shop', 'A002', '武夷岩茶', '浙江原产名茶之一，拥有典型的绿茶气质，香气怡人，口味清新。开化龙顶历史背景不深，创造与上世纪五十年代，是年轻绿茶的典型代表。 ', '', 432.00, 360.00, '盒', 199, 0, 150, 1, 0, 39, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255502238.jpg', 1255502238, 1289185271, '系统管理员', '', '0', 0, '浙江原产名茶之一，拥有典型的绿茶气质，香气怡人，口味清新。开化龙顶历史背景不深，创造与上世纪五十年代，是年轻绿茶的典型代表。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '热销商品,', 0, 0, ''),
(3, 15, '0001:0015:', 0, 13, 'shop', 'A004', '白茶', '白色的绿茶，是绿茶中珍贵的白化品种，古人则看做是祥瑞灵动的象征。安吉白茶产自浙江省安吉县，是一处美丽富饶的原产地。安吉白茶的白，主要原因是在于茶树嫩芽为白色，因此采摘到的茶叶极其珍贵，鲜嫩无比！ ', '', 518.40, 432.00, '盒', 210, 0, 100, 0, 0, 41, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255502834.jpg', 1255502834, 1286953273, '系统管理员', '', '0', 0, '白色的绿茶，是绿茶中珍贵的白化品种，古人则看做是祥瑞灵动的象征。安吉白茶产自浙江省安吉县，是一处美丽富饶的原产地。安吉白茶的白，主要原因是在于茶树嫩芽为白色，因此采摘到的茶叶极其珍贵，鲜嫩无比！\r\n\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上市,畅销单品,', 0, 0, ''),
(4, 15, '0001:0015:', 0, 13, 'shop', 'A005', '安吉白茶', '<P>&nbsp;</P>', '', 618.00, 515.00, '盒', 200, 0, 500, 0, 0, 23, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255503667.jpg', 1255503667, 1289185248, '系统管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上市,热销商品,', 0, 0, ''),
(5, 58, '0003:0058:', 0, 12, 'shop', 'D009', '蒸青绿茶', '秋日好，秋高气爽，胃口渐长。但腰围渐长恐怕要令大多数现代人烦恼，秋日大快朵颐之时，何不配以铁观音秋茶，品香之余，消油解腻，一举多得。 ', '', 216.00, 180.00, '克', 500, 0, 200, 0, 0, 36, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255508631.jpg', 1255508631, 1286952099, '系统管理员', '', '0', 0, '秋日好，秋高气爽，胃口渐长。但腰围渐长恐怕要令大多数现代人烦恼，秋日大快朵颐之时，何不配以铁观音秋茶，品香之余，消油解腻，一举多得。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上市,', 0, 0, ''),
(6, 10, '0001:0010:', 0, 2, 'shop', 'A009', '黄山毛峰', '绿绿的茶芽，清绿的茶汤，清透的茶香；一瞬间，我眼前的高楼大厦，立即幻化成了森林；而我，身心舒畅，忘记了什么叫电脑辐射。 ', '', 391.20, 326.00, '克', 600, 0, 100, 0, 0, 23, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255511091.jpg', 1255511091, 1289185262, '系统管理员', '', '0', 0, '绿绿的茶芽，清绿的茶汤，清透的茶香；一瞬间，我眼前的高楼大厦，立即幻化成了森林；而我，身心舒畅，忘记了什么叫电脑辐射。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '热销商品,', 0, 0, ''),
(7, 107, '0001:0107:', 0, 7, 'shop', 'D009', '六安瓜片', '中国人对茶有着特殊的感情，在中国春天的气息里，一定少不了一抹茶香。喝上一壶新茶才像是真正到了春天，而纯正清高的龙井香气，可能正是中国人心中对春天最美的注解。 ', '', 256.80, 214.00, '克', 199, 0, 100, 1, 0, 35, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255511388.jpg', 1255511388, 1286955215, '系统管理员', '', '0', 0, '中国人对茶有着特殊的感情，在中国春天的气息里，一定少不了一抹茶香。喝上一壶新茶才像是真正到了春天，而纯正清高的龙井香气，可能正是中国人心中对春天最美的注解。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '畅销单品,', 0, 0, ''),
(8, 8, '0001:0008:', 0, 11, 'shop', 'C001', '西湖龙井', '<P>&nbsp;</P>', '', 756.00, 630.00, '袋', 500, 0, 100, 0, 0, 10, 1, 1, 0, '0', 'gif', 'shop/pics/20091020/1256044952.jpg', 1256044952, 1286950853, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上市,', 0, 0, ''),
(23, 70, '0005:0070:', 0, 12, 'shop', 'SE45', '普洱散茶', '', '', 480.00, 400.00, '罐', 60, 0, 100, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286951381.jpg', 1286951381, 1286951381, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(24, 72, '0005:0072:', 0, 12, 'shop', 'DC85', '普洱沱茶', '', '', 240.00, 200.00, '盒', 70, 0, 100, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286951477.jpg', 1286951477, 1286951477, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(9, 57, '0003:0057:', 0, 12, 'shop', 'C009', '铁观音', '安溪铁观音是乌龙茶中的极品，属于半发酵茶类，介于绿茶和红茶之间，既有绿茶的清香和天然花香，又有红茶醇厚的滋味。安溪铁观音所含的香气成分在所有茶类中最丰富，品质上乘的铁观音具有明显的兰花香且香味持久，所谓"七泡有余香"。安溪铁观音富含茶多酚和多种抗氧化物质，对于清除自由基、减少脂肪囤积等有一定的效果。 ', '', 504.00, 420.00, '克', 200, 0, 200, 0, 0, 51, 1, 1, 0, '0', 'gif', 'shop/pics/20091020/1256050431.jpg', 1256050431, 1286951808, '管理员', '', '0', 0, '安溪铁观音是乌龙茶中的极品，属于半发酵茶类，介于绿茶和红茶之间，既有绿茶的清香和天然花香，又有红茶醇厚的滋味。安溪铁观音所含的香气成分在所有茶类中最丰富，品质上乘的铁观音具有明显的兰花香且香味持久，所谓&quot;七泡有余香&quot;。安溪铁观音富含茶多酚和多种抗氧化物质，对于清除自由基、减少脂肪囤积等有一定的效果。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上市,', 0, 0, ''),
(10, 57, '0003:0057:', 0, 12, 'shop', 'D002', '铁观音', '安溪铁观音是乌龙茶中的极品，属于半发酵茶类，介于绿茶和红茶之间，既有绿茶的清香和天然花香，又有红茶醇厚的滋味。安溪铁观音所含的香气成分在所有茶类中最丰富，品质上乘的铁观音具有明显的兰花香且香味持久，所谓"七泡有余香"。安溪铁观音富含茶多酚和多种抗氧化物质，对于清除自由基、减少脂肪囤积等有一定的效果。', '<P>\r\n<TABLE class="form_table t_hue4" style="BORDER-RIGHT: #d4d0c8 1px solid; BORDER-TOP: #d4d0c8 1px solid; BORDER-LEFT: #d4d0c8 1px solid; BORDER-BOTTOM: #d4d0c8 1px solid" cellSpacing=1 cellPadding=3 width="100%" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD class=left colSpan=2><STRONG>关键参数</STRONG></TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>额定电压(V)：</TD>\r\n<TD class=left>220V&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>频率(HZ)：</TD>\r\n<TD class=left>50Hz&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>最大容积(L)：</TD>\r\n<TD class=left>1.3L&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>适用人数：</TD>\r\n<TD class=left>2－4人&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>耗电量：</TD>\r\n<TD class=left>约0.16度&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>产地：</TD>\r\n<TD class=left>山东济南&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=left colSpan=2><STRONG>功能</STRONG></TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>功能列表：</TD>\r\n<TD class=left>采用九阳"全营养技术"，全豆豆浆，完全营养；智能全时加热程序"，豆浆乳化更充分，口感更香浓。&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=left colSpan=2><STRONG>总体规格</STRONG></TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>商品重量(Kg)：</TD>\r\n<TD class=left>680g&nbsp;</TD></TR></TBODY></TABLE></P>', 384.00, 320.00, '罐', 200, 0, 100, 0, 0, 56, 1, 1, 0, '0', 'gif', 'shop/pics/20091021/1256107643.jpg', 1256050667, 1286951717, '管理员', '', '0', 0, '安溪铁观音是乌龙茶中的极品，属于半发酵茶类，介于绿茶和红茶之间，既有绿茶的清香和天然花香，又有红茶醇厚的滋味。安溪铁观音所含的香气成分在所有茶类中最丰富，品质上乘的铁观音具有明显的兰花香且香味持久，所谓&quot;七泡有余香&quot;。安溪铁观音富含茶多酚和多种抗氧化物质，对于清除自由基、减少脂肪囤积等有一定的效果。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '|150|'),
(11, 134, '0128:0134:', 0, 0, 'shop', 'GD552', '太平猴魁', '<P>&nbsp;</P>', '', 264.00, 220.00, '罐', 600, 0, 150, 0, 0, 4, 1, 1, 0, '0', 'gif', 'shop/pics/20100910/1284099592.jpg', 1284099592, 1286950833, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(12, 136, '0128:0136:', 0, 12, 'shop', 'PS52', '铁观音', '绿绿的茶芽，清绿的茶汤，清透的茶香；一瞬间，我眼前的高楼大厦，立即幻化成了森林；而我，身心舒畅，忘记了什么叫电脑辐射。 ', '', 381.60, 318.00, '克', 300, 0, 500, 0, 0, 4, 1, 1, 0, '0', 'gif', 'shop/pics/20100910/1284099740.jpg', 1284099740, 1286951784, '管理员', '', '0', 0, '绿绿的茶芽，清绿的茶汤，清透的茶香；一瞬间，我眼前的高楼大厦，立即幻化成了森林；而我，身心舒畅，忘记了什么叫电脑辐射。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(13, 72, '0005:0072:', 0, 2, 'shop', 'SE45', '普洱沱茶', '', '', 480.00, 400.00, '罐', 100, 0, 210, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286948844.jpg', 1286948844, 1286949480, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(14, 57, '0003:0057:', 0, 2, 'shop', 'GD552', '铁观音', '', '', 480.00, 400.00, '盒', 200, 0, 240, 0, 0, 4, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286948882.jpg', 1286948882, 1286949453, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(15, 131, '0126:0131:', 0, 0, 'shop', 'GE43', '保健茶', '', '', 648.00, 540.00, '份', 140, 0, 180, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286948916.jpg', 1286948916, 1286949432, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(16, 71, '0005:0071:', 0, 2, 'shop', 'SE85', '普洱饼茶', '', '', 540.00, 450.00, '份', 100, 0, 200, 0, 0, 1, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286948954.jpg', 1286948954, 1286949391, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(17, 70, '0005:0070:', 0, 12, 'shop', 'E523', '普洱散茶', '', '', 480.00, 400.00, '罐', 100, 0, 100, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286948986.jpg', 1286948986, 1286951409, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(18, 140, '0129:0140:', 0, 0, 'shop', 'DS41', '茶具套装', '', '', 336.00, 280.00, '套', 140, 0, 200, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286949056.jpg', 1286949056, 1286949056, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(19, 140, '0129:0140:', 0, 0, 'shop', 'DR409', '茶具', '', '', 240.00, 200.00, '套', 40, 0, 260, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286949085.jpg', 1286949085, 1286949085, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(20, 140, '0129:0140:', 0, 0, 'shop', 'KE65', '茶具', '', '', 240.00, 200.00, '套', 100, 0, 260, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286949128.jpg', 1286949128, 1286949128, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(21, 140, '0129:0140:', 0, 0, 'shop', 'KE65', '茶具', '', '', 420.00, 350.00, '套', 60, 0, 300, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286949179.jpg', 1286949179, 1286949179, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(22, 140, '0129:0140:', 0, 0, 'shop', 'PS52', '茶具', '', '', 336.00, 280.00, '套', 40, 0, 270, 0, 0, 0, 1, 1, 0, '0', 'gif', 'shop/pics/20101013/1286949213.jpg', 1286949213, 1286949213, '管理员', '', '0', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(25, 86, '0007:0086:', 0, 12, 'shop', 'GD552', '原叶茶', '浙江原产名茶之一，拥有典型的绿茶气质，香气怡人，口味清新。开化龙顶历史背景不深，创造与上世纪五十年代，是年轻绿茶的典型代表。', '', 288.00, 240.00, '袋', 60, 0, 100, 0, 0, 0, 0, 1, 0, '0', 'gif', 'shop/pics/20101013/1286952076.jpg', 1286952076, 1286952076, '管理员', '', '0', 0, '浙江原产名茶之一，拥有典型的绿茶气质，香气怡人，口味清新。开化龙顶历史背景不深，创造与上世纪五十年代，是年轻绿茶的典型代表。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, ''),
(26, 134, '0128:0134:', 0, 7, 'shop', 'DE25', '龙井', '绿绿的茶芽，清绿的茶汤，清透的茶香；一瞬间，我眼前的高楼大厦，立即幻化成了森林；而我，身心舒畅，忘记了什么叫电脑辐射。 ', '', 600.00, 500.00, '盒', 100, 0, 200, 0, 0, 0, 0, 1, 0, '0', 'gif', 'shop/pics/20101108/1289184175.jpg', 1289184175, 1289185237, '管理员', '', '0', 0, '绿绿的茶芽，清绿的茶汤，清透的茶香；一瞬间，我眼前的高楼大厦，立即幻化成了森林；而我，身心舒畅，忘记了什么叫电脑辐射。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '热销商品,', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_config`
--

CREATE TABLE IF NOT EXISTS `dev_shop_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dev_shop_config`
--

INSERT INTO `dev_shop_config` (`xuhao`, `vname`, `settype`, `colwidth`, `variable`, `value`, `intro`) VALUES
(1, '模块频道名称', 'input', '30', 'ChannelName', '网上购物', '本模块对应的频道名称，如“网上购物”；用于显示在网页标题、当前位置提示条等处'),
(2, '是否在当前位置提示条显示模块频道名称', 'YN', '30', 'ChannelNameInNav', '1', '是否在当前位置提示条显示模块频道名称'),
(3, '商品默认计量单位', 'input', '30', 'DefaultDanwei', '个', '发布商品时显示的默认计量单位'),
(5, '是否允许非会员订购', 'YN', '30', 'NoMemberOrder', '1', '开启非会员订购时,不需要会员登录即可直接提交订单，非会员订单不产生会员付款和消费记录，直接处理订单'),
(6, '会员定价规则', 'pricerule', '30', 'PriceRule', '2', '选择按折扣率自动计算会员价格，发布商品时不填写会员价，在订购商品时系统根据折扣率自动计算会员价格；选择发布商品时按折扣率预填会员价格，在发布商品时系统按以下折扣率预填会员价，订购时按实际填写的会员价计算；折扣率设定方式：1.00为无折扣，0.85为85折，依此类推'),
(7, '市场参考价默认比例', 'input', '30', 'MarketPrice', '1.2', '发布商品时，根据商品销售价格自动填写市场参考价的计算比例。如：1.2就是市场参考价为销售价格的1.2倍'),
(21, '是否启用商品订购积分', 'YN', '30', 'CentOpen', '1', '会员在商品订购付款时，是否计算积分'),
(22, '商品订购积分的类型', 'centlist', '30', 'CentId', '5', '商品订购积分所采用的积分类型'),
(23, '商品订购积分的计算方法', 'centmodle', '30', 'CentModle', '2', '请选择按商品固定的积分值计算积分，或按商品实际购买价格计算积分'),
(24, '商品购买价格和积分的计算比例', 'input', '30', 'CentRate', '1.0', '在按商品实际购买价格计算积分时，商品实际购买价格和积分的兑换比例。如：2.0表示购买1元商品获得2个积分，依此类推');

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_memberprice`
--

CREATE TABLE IF NOT EXISTS `dev_shop_memberprice` (
  `id` int(12) NOT NULL auto_increment,
  `gid` int(10) NOT NULL default '0',
  `membertypeid` int(6) NOT NULL default '0',
  `price` decimal(8,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- 转存表中的数据 `dev_shop_memberprice`
--

INSERT INTO `dev_shop_memberprice` (`id`, `gid`, `membertypeid`, `price`) VALUES
(1, 1, 26, 620.00),
(2, 2, 26, 360.00),
(3, 2, 35, 324.00),
(4, 1, 35, 558.00),
(5, 1, 36, 465.00),
(6, 2, 36, 270.00),
(7, 3, 26, 432.00),
(8, 3, 35, 388.80),
(9, 3, 36, 324.00),
(10, 4, 26, 515.00),
(11, 4, 35, 463.50),
(12, 4, 36, 386.25),
(13, 5, 26, 180.00),
(14, 5, 35, 162.00),
(15, 5, 36, 135.00),
(16, 6, 26, 326.00),
(17, 6, 35, 293.40),
(18, 6, 36, 244.50),
(19, 7, 26, 214.00),
(20, 7, 35, 192.60),
(21, 7, 36, 160.50),
(22, 8, 26, 630.00),
(23, 8, 35, 567.00),
(24, 8, 36, 472.50),
(25, 9, 26, 420.00),
(26, 9, 35, 378.00),
(27, 9, 36, 315.00),
(28, 10, 26, 320.00),
(29, 10, 35, 288.00),
(30, 10, 36, 240.00),
(31, 11, 26, 220.00),
(32, 11, 35, 198.00),
(33, 11, 36, 165.00),
(34, 12, 26, 318.00),
(35, 12, 35, 286.20),
(36, 12, 36, 238.50),
(37, 13, 26, 400.00),
(38, 13, 35, 360.00),
(39, 13, 36, 300.00),
(40, 14, 26, 400.00),
(41, 14, 35, 360.00),
(42, 14, 36, 300.00),
(43, 15, 26, 540.00),
(44, 15, 35, 486.00),
(45, 15, 36, 405.00),
(46, 16, 26, 450.00),
(47, 16, 35, 405.00),
(48, 16, 36, 337.50),
(49, 18, 26, 280.00),
(50, 18, 35, 252.00),
(51, 18, 36, 210.00),
(52, 19, 26, 200.00),
(53, 19, 35, 180.00),
(54, 19, 36, 150.00),
(55, 20, 26, 200.00),
(56, 20, 35, 180.00),
(57, 20, 36, 150.00),
(58, 21, 26, 350.00),
(59, 21, 35, 315.00),
(60, 21, 36, 262.50),
(61, 22, 26, 280.00),
(62, 22, 35, 252.00),
(63, 22, 36, 210.00),
(64, 17, 26, 400.00),
(65, 17, 35, 360.00),
(66, 17, 36, 300.00),
(67, 23, 26, 400.00),
(68, 23, 35, 360.00),
(69, 23, 36, 300.00),
(70, 24, 26, 200.00),
(71, 24, 35, 180.00),
(72, 24, 36, 150.00),
(73, 25, 26, 240.00),
(74, 25, 35, 216.00),
(75, 25, 36, 180.00),
(76, 26, 26, 500.00),
(77, 26, 35, 450.00),
(78, 26, 36, 375.00);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_order`
--

CREATE TABLE IF NOT EXISTS `dev_shop_order` (
  `orderid` int(8) NOT NULL auto_increment,
  `OrderNo` varchar(30) NOT NULL default '',
  `memberid` int(6) NOT NULL default '0',
  `user` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `tel` varchar(50) NOT NULL,
  `mobi` varchar(50) NOT NULL,
  `qq` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `s_name` varchar(50) NOT NULL default '',
  `s_tel` varchar(100) NOT NULL default '',
  `s_addr` varchar(100) NOT NULL default '',
  `s_postcode` varchar(20) NOT NULL,
  `s_mobi` varchar(30) NOT NULL default '',
  `s_qq` varchar(50) NOT NULL,
  `s_time` varchar(50) NOT NULL default '',
  `goodstotal` decimal(12,2) NOT NULL default '0.00',
  `yunzoneid` int(10) NOT NULL default '0',
  `yunid` int(8) NOT NULL default '0',
  `yuntype` varchar(100) NOT NULL default '',
  `yunifbao` int(1) NOT NULL default '0',
  `yunbaofei` decimal(12,2) NOT NULL default '0.00',
  `yunfei` decimal(12,2) NOT NULL default '0.00',
  `totaloof` decimal(12,2) NOT NULL default '0.00',
  `totalcent` int(10) NOT NULL default '0',
  `totalweight` int(10) NOT NULL default '0',
  `payid` int(12) NOT NULL default '0',
  `paytype` varchar(50) NOT NULL default '0',
  `paytotal` decimal(12,2) NOT NULL default '0.00',
  `iflook` int(1) NOT NULL default '0',
  `ifyun` int(1) NOT NULL default '0',
  `ifpay` int(1) NOT NULL default '0',
  `ifok` int(1) NOT NULL default '0',
  `iftui` int(1) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  `dtime` int(11) NOT NULL default '0',
  `paytime` int(11) NOT NULL default '0',
  `yuntime` int(11) NOT NULL default '0',
  `bz` text,
  `items` text,
  PRIMARY KEY  (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `dev_shop_order`
--

INSERT INTO `dev_shop_order` (`orderid`, `OrderNo`, `memberid`, `user`, `name`, `tel`, `mobi`, `qq`, `email`, `s_name`, `s_tel`, `s_addr`, `s_postcode`, `s_mobi`, `s_qq`, `s_time`, `goodstotal`, `yunzoneid`, `yunid`, `yuntype`, `yunifbao`, `yunbaofei`, `yunfei`, `totaloof`, `totalcent`, `totalweight`, `payid`, `paytype`, `paytotal`, `iflook`, `ifyun`, `ifpay`, `ifok`, `iftui`, `ip`, `dtime`, `paytime`, `yuntime`, `bz`, `items`) VALUES
(7, '100007', 0, '', 'google', '0573', '', '', 'gg@gg.com', 'gg', 'gg', 'gg', 'gg', '', '', '', 214.00, 2, 2, '中国邮政EMS', 0, 0.00, 20.00, 234.00, 0, 100, 1, '送货上门收款', 234.00, 1, 0, 0, 0, 0, '192.168.1.123', 1288939938, 0, 0, '', '六安瓜片(1) '),
(8, '100008', 0, '', 'google', '0573', '', '', 'gg@gg.com', 'gg', 'gg', 'gg', 'gg', '', '', '', 515.00, 14, 2, '中国邮政EMS', 0, 0.00, 20.00, 535.00, 0, 500, 2, '支付宝', 535.00, 1, 0, 0, 0, 0, '192.168.1.123', 1288940011, 0, 0, '', '安吉白茶(1) '),
(9, '100009', 159, '66666', 'sss', 'ssss', '22222222', '22222', '666@www.cn', 'weewew', 'wewewee', 'wewewe', 'wewewe', '232323', '', '', 360.00, 2, 2, '中国邮政EMS', 0, 0.00, 20.00, 380.00, 360, 150, 1, '送货上门收款', 380.00, 1, 0, 0, 0, 0, '192.168.1.7', 1289185945, 0, 0, '', '武夷岩茶(1) ');

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_orderitems`
--

CREATE TABLE IF NOT EXISTS `dev_shop_orderitems` (
  `id` int(8) NOT NULL auto_increment,
  `memberid` int(6) NOT NULL default '0',
  `orderid` int(6) NOT NULL default '0',
  `gid` int(6) NOT NULL default '0',
  `bn` varchar(100) NOT NULL default '',
  `goods` varchar(100) NOT NULL default '0',
  `price` decimal(12,2) NOT NULL default '0.00',
  `weight` int(10) NOT NULL default '0',
  `nums` int(6) NOT NULL default '0',
  `danwei` varchar(30) NOT NULL default '',
  `jine` decimal(9,2) NOT NULL default '0.00',
  `cent` int(10) NOT NULL default '0',
  `ifyun` int(1) NOT NULL default '0',
  `iftui` int(1) NOT NULL default '0',
  `dtime` int(11) NOT NULL default '0',
  `yuntime` int(11) NOT NULL default '0',
  `msg` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `dev_shop_orderitems`
--

INSERT INTO `dev_shop_orderitems` (`id`, `memberid`, `orderid`, `gid`, `bn`, `goods`, `price`, `weight`, `nums`, `danwei`, `jine`, `cent`, `ifyun`, `iftui`, `dtime`, `yuntime`, `msg`) VALUES
(7, 0, 7, 7, 'D009', '六安瓜片', 214.00, 100, 1, '克', 214.00, 0, 0, 0, 1288939938, 0, NULL),
(8, 0, 8, 4, 'A005', '安吉白茶', 515.00, 500, 1, '盒', 515.00, 0, 0, 0, 1288940011, 0, NULL),
(9, 159, 9, 2, 'A002', '武夷岩茶', 360.00, 150, 1, '盒', 360.00, 360, 0, 0, 1289185945, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_pages`
--

CREATE TABLE IF NOT EXISTS `dev_shop_pages` (
  `id` int(12) NOT NULL auto_increment,
  `gid` int(12) NOT NULL default '0',
  `src` varchar(150) NOT NULL default '',
  `xuhao` int(5) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dev_shop_pages`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_pricerule`
--

CREATE TABLE IF NOT EXISTS `dev_shop_pricerule` (
  `id` int(12) NOT NULL auto_increment,
  `membertypeid` int(6) NOT NULL default '0',
  `pr` decimal(5,2) NOT NULL default '1.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dev_shop_pricerule`
--

INSERT INTO `dev_shop_pricerule` (`id`, `membertypeid`, `pr`) VALUES
(1, 26, 1.00),
(2, 35, 0.90),
(3, 36, 0.75);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_prop`
--

CREATE TABLE IF NOT EXISTS `dev_shop_prop` (
  `id` int(20) NOT NULL auto_increment,
  `catid` int(20) NOT NULL default '0',
  `propname` char(30) default NULL,
  `xuhao` int(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `xuhao` (`xuhao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=745 ;

--
-- 转存表中的数据 `dev_shop_prop`
--

INSERT INTO `dev_shop_prop` (`id`, `catid`, `propname`, `xuhao`) VALUES
(398, 11, '保修', 5),
(397, 11, '厂商', 4),
(396, 11, '功率', 3),
(403, 13, '保修', 5),
(402, 13, '厂商', 4),
(401, 13, '功率', 3),
(418, 17, '保修', 5),
(417, 17, '厂商', 4),
(416, 17, '功率', 3),
(423, 20, '保修', 5),
(422, 20, '厂商', 4),
(421, 20, '功率', 3),
(428, 21, '保修', 5),
(427, 21, '厂商', 4),
(426, 21, '功率', 3),
(433, 22, '保修', 5),
(432, 22, '厂商', 4),
(431, 22, '功率', 3),
(438, 25, '保修', 5),
(437, 25, '厂商', 4),
(436, 25, '功率', 3),
(443, 26, '保修', 5),
(442, 26, '厂商', 4),
(441, 26, '功率', 3),
(448, 27, '保修', 5),
(447, 27, '厂商', 4),
(446, 27, '功率', 3),
(453, 28, '保修', 5),
(452, 28, '厂商', 4),
(451, 28, '功率', 3),
(458, 31, '保修', 5),
(457, 31, '厂商', 4),
(456, 31, '功率', 3),
(463, 32, '保修', 5),
(462, 32, '厂商', 4),
(461, 32, '功率', 3),
(468, 33, '保修', 5),
(467, 33, '厂商', 4),
(466, 33, '功率', 3),
(473, 34, '保修', 5),
(472, 34, '厂商', 4),
(471, 34, '功率', 3),
(478, 98, '保修', 5),
(477, 98, '厂商', 4),
(476, 98, '功率', 3),
(513, 41, '厂商', 4),
(512, 41, '功率', 3),
(511, 41, '颜色', 2),
(518, 43, '厂商', 4),
(517, 43, '功率', 3),
(516, 43, '颜色', 2),
(523, 44, '厂商', 4),
(522, 44, '功率', 3),
(521, 44, '颜色', 2),
(528, 45, '厂商', 4),
(527, 45, '功率', 3),
(526, 45, '颜色', 2),
(533, 47, '厂商', 4),
(532, 47, '功率', 3),
(531, 47, '颜色', 2),
(538, 48, '厂商', 4),
(537, 48, '功率', 3),
(536, 48, '颜色', 2),
(543, 49, '厂商', 4),
(542, 49, '功率', 3),
(541, 49, '颜色', 2),
(548, 55, '厂商', 4),
(547, 55, '功率', 3),
(546, 55, '颜色', 2),
(553, 56, '厂商', 4),
(552, 56, '功率', 3),
(551, 56, '颜色', 2),
(558, 73, '厂商', 4),
(557, 73, '功率', 3),
(556, 73, '颜色', 2),
(395, 11, '颜色', 2),
(400, 13, '颜色', 2),
(415, 17, '颜色', 2),
(420, 20, '颜色', 2),
(425, 21, '颜色', 2),
(430, 22, '颜色', 2),
(435, 25, '颜色', 2),
(440, 26, '颜色', 2),
(445, 27, '颜色', 2),
(450, 28, '颜色', 2),
(455, 31, '颜色', 2),
(460, 32, '颜色', 2),
(465, 33, '颜色', 2),
(470, 34, '颜色', 2),
(475, 98, '颜色', 2),
(510, 41, '型号', 1),
(515, 43, '型号', 1),
(520, 44, '型号', 1),
(525, 45, '型号', 1),
(530, 47, '型号', 1),
(535, 48, '型号', 1),
(540, 49, '型号', 1),
(545, 55, '型号', 1),
(550, 56, '型号', 1),
(555, 73, '型号', 1),
(394, 11, '型号', 1),
(399, 13, '型号', 1),
(414, 17, '型号', 1),
(419, 20, '型号', 1),
(424, 21, '型号', 1),
(429, 22, '型号', 1),
(434, 25, '型号', 1),
(439, 26, '型号', 1),
(444, 27, '型号', 1),
(449, 28, '型号', 1),
(454, 31, '型号', 1),
(459, 32, '型号', 1),
(464, 33, '型号', 1),
(469, 34, '型号', 1),
(474, 98, '型号', 1),
(514, 41, '保修', 5),
(519, 43, '保修', 5),
(524, 44, '保修', 5),
(529, 45, '保修', 5),
(534, 47, '保修', 5),
(539, 48, '保修', 5),
(544, 49, '保修', 5),
(549, 55, '保修', 5),
(554, 56, '保修', 5),
(559, 73, '保修', 5),
(565, 64, '型号', 1),
(566, 64, '颜色', 2),
(567, 64, '功率', 3),
(568, 64, '厂商', 4),
(569, 64, '保修', 5),
(570, 63, '型号', 1),
(571, 63, '颜色', 2),
(572, 63, '功率', 3),
(573, 63, '厂商', 4),
(574, 63, '保修', 5),
(575, 61, '型号', 1),
(576, 61, '颜色', 2),
(577, 61, '功率', 3),
(578, 61, '厂商', 4),
(579, 61, '保修', 5),
(580, 62, '型号', 1),
(581, 62, '颜色', 2),
(582, 62, '功率', 3),
(583, 62, '厂商', 4),
(584, 62, '保修', 5),
(605, 67, '型号', 1),
(606, 67, '颜色', 2),
(607, 67, '功率', 3),
(608, 67, '厂商', 4),
(609, 67, '保修', 5),
(610, 65, '型号', 1),
(611, 65, '颜色', 2),
(612, 65, '功率', 3),
(613, 65, '厂商', 4),
(614, 65, '保修', 5),
(615, 66, '型号', 1),
(616, 66, '颜色', 2),
(617, 66, '功率', 3),
(618, 66, '厂商', 4),
(619, 66, '保修', 5),
(690, 92, '型号', 1),
(691, 92, '颜色', 2),
(692, 92, '功率', 3),
(693, 92, '厂商', 4),
(694, 92, '保修', 5),
(695, 93, '型号', 1),
(696, 93, '颜色', 2),
(697, 93, '功率', 3),
(698, 93, '厂商', 4),
(699, 93, '保修', 5),
(700, 94, '型号', 1),
(701, 94, '颜色', 2),
(702, 94, '功率', 3),
(703, 94, '厂商', 4),
(704, 94, '保修', 5),
(705, 95, '型号', 1),
(706, 95, '颜色', 2),
(707, 95, '功率', 3),
(708, 95, '厂商', 4),
(709, 95, '保修', 5),
(710, 96, '型号', 1),
(711, 96, '颜色', 2),
(712, 96, '功率', 3),
(713, 96, '厂商', 4),
(714, 96, '保修', 5),
(715, 97, '型号', 1),
(716, 97, '颜色', 2),
(717, 97, '功率', 3),
(718, 97, '厂商', 4),
(719, 97, '保修', 5);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_vcat`
--

CREATE TABLE IF NOT EXISTS `dev_shop_vcat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) NOT NULL default '0',
  `cat` char(100) NOT NULL default '',
  `url` char(200) NOT NULL default '',
  `xuhao` int(12) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_shop_vcat`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_yun`
--

CREATE TABLE IF NOT EXISTS `dev_shop_yun` (
  `id` int(12) NOT NULL auto_increment,
  `yunname` varchar(50) NOT NULL default '',
  `spec` varchar(50) NOT NULL default '',
  `dinge` int(1) NOT NULL default '0',
  `yunfei` decimal(12,2) NOT NULL default '0.00',
  `gs` varchar(255) NOT NULL default '',
  `dgs` varchar(255) NOT NULL default '',
  `sgs` varchar(255) NOT NULL default '',
  `baojia` int(1) NOT NULL default '0',
  `baofei` decimal(5,2) NOT NULL default '0.00',
  `baodi` decimal(12,2) NOT NULL default '0.00',
  `zonestr` text,
  `memo` text,
  `xuhao` int(12) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dev_shop_yun`
--

INSERT INTO `dev_shop_yun` (`id`, `yunname`, `spec`, `dinge`, `yunfei`, `gs`, `dgs`, `sgs`, `baojia`, `baofei`, `baodi`, `zonestr`, `memo`, `xuhao`) VALUES
(1, '上海本地送货上门', '', 1, 30.00, '||||||1||||1||||', '||||||||', '', 0, 0.00, 1.00, '|4|10|11|12|13|', '上海本地送货上门,固定运费30元', 1),
(2, '中国邮政EMS', '国内', 0, 0.00, '0|500|20||||1|500|500|6|1||||', '||||||||', '', 0, 0.00, 1.00, '|1|2|3|4|10|11|12|13|5|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|', '中国邮政EMS国内除港澳台以外地区', 2),
(3, '中国邮政EMS', '港澳台', 0, 0.00, '|500|20||||1|500|500|150|1||||', '||||||||', '', 1, 1.00, 1.00, '', '', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dev_shop_yunzone`
--

CREATE TABLE IF NOT EXISTS `dev_shop_yunzone` (
  `id` int(12) NOT NULL auto_increment,
  `pid` int(6) NOT NULL default '0',
  `zone` char(50) NOT NULL default '',
  `xuhao` int(6) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `dev_shop_yunzone`
--

INSERT INTO `dev_shop_yunzone` (`id`, `pid`, `zone`, `xuhao`) VALUES
(1, 0, '北京市', 1),
(2, 1, '海淀区', 1),
(3, 1, '丰台区', 2),
(4, 0, '上海市', 2),
(5, 0, '浙江省', 3),
(14, 5, '杭州市', 1),
(15, 5, '宁波市', 2),
(16, 5, '温州市', 3),
(10, 4, '徐汇区', 1),
(11, 4, '静安区', 2),
(12, 4, '闵行区', 3),
(13, 4, '宝山区', 4),
(17, 5, '嘉兴市', 4),
(18, 5, '舟山市', 5),
(19, 5, '绍兴市', 6),
(20, 0, '江苏省', 7),
(21, 20, '南京市', 1),
(22, 20, '无锡市', 2),
(23, 20, '苏州市', 3),
(24, 20, '常州市', 4),
(25, 0, '广东省', 8),
(26, 25, '广州市', 1),
(27, 25, '深圳市', 2),
(28, 25, '中山市', 3);

-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_code`
--

CREATE TABLE IF NOT EXISTS `dev_tools_code` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `cat` varchar(100) NOT NULL,
  `groupid` int(11) NOT NULL default '0',
  `groupname` varchar(100) NOT NULL,
  `qq` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `xuhao` int(11) NOT NULL default '0',
  `iffb` int(1) NOT NULL default '1',
  `tj` int(1) NOT NULL default '0',
  `dtime` int(11) NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  `author` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_tools_code`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_photopolldata`
--

CREATE TABLE IF NOT EXISTS `dev_tools_photopolldata` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `poll_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL,
  `body` text,
  `iffb` int(1) NOT NULL default '0',
  `tj` int(1) default NULL,
  `secure` int(11) NOT NULL default '0',
  `dtime` int(11) NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  `author` varchar(100) default NULL,
  `type` varchar(30) NOT NULL,
  `src` varchar(150) NOT NULL,
  `color` varchar(20) NOT NULL default '',
  `votes` int(14) NOT NULL default '0',
  `votesinfo1` text NOT NULL,
  `votesinfo2` text NOT NULL,
  `votesinfo3` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_tools_photopolldata`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_photopollindex`
--

CREATE TABLE IF NOT EXISTS `dev_tools_photopollindex` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(12) NOT NULL,
  `catpath` char(255) default NULL,
  `cat` varchar(100) NOT NULL,
  `groupname` varchar(100) NOT NULL default '',
  `timestamp` int(11) NOT NULL default '0',
  `status` smallint(2) NOT NULL default '0',
  `exp_time` int(11) NOT NULL default '0',
  `expire` smallint(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `dev_tools_photopollindex`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_pollconfig`
--

CREATE TABLE IF NOT EXISTS `dev_tools_pollconfig` (
  `config_id` smallint(5) unsigned NOT NULL auto_increment,
  `img_height` int(5) NOT NULL default '0',
  `img_length` int(5) NOT NULL default '0',
  `vodinfo` varchar(225) NOT NULL default '0',
  `def_options` smallint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dev_tools_pollconfig`
--

INSERT INTO `dev_tools_pollconfig` (`config_id`, `img_height`, `img_length`, `vodinfo`, `def_options`) VALUES
(1, 20, 10, '对不起,您已经投过票了', 10);

-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_polldata`
--

CREATE TABLE IF NOT EXISTS `dev_tools_polldata` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `poll_id` int(11) NOT NULL default '0',
  `option_id` int(11) NOT NULL default '0',
  `option_text` varchar(200) NOT NULL default '',
  `color` varchar(20) NOT NULL default '',
  `votes` int(14) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `dev_tools_polldata`
--

INSERT INTO `dev_tools_polldata` (`id`, `poll_id`, `option_id`, `option_text`, `color`, `votes`) VALUES
(29, 11, 3, '护理电器', 'brown', 0),
(28, 11, 2, '生活电器', 'aqua', 0),
(27, 11, 1, '厨房电器', 'gold', 1),
(30, 11, 4, '健康电器', 'grey', 0),
(32, 12, 1, '我愿意为包装花钱', 'aqua', 0),
(33, 12, 2, '要华丽，可以送礼', 'aqua', 0),
(34, 12, 3, '不要过度包装，会很浪费', 'aqua', 0),
(35, 12, 4, '包装要特别一些', 'aqua', 0),
(36, 12, 5, '能保护和存储茶叶就好', 'aqua', 0),
(37, 12, 6, '我不愿意为包装花钱', 'aqua', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_pollindex`
--

CREATE TABLE IF NOT EXISTS `dev_tools_pollindex` (
  `id` int(11) NOT NULL auto_increment,
  `groupname` varchar(100) NOT NULL default '',
  `timestamp` int(11) NOT NULL default '0',
  `status` smallint(2) NOT NULL default '0',
  `exp_time` int(11) NOT NULL default '0',
  `expire` smallint(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `dev_tools_pollindex`
--

INSERT INTO `dev_tools_pollindex` (`id`, `groupname`, `timestamp`, `status`, `exp_time`, `expire`) VALUES
(11, '您最希望购买什么产品', 1256046826, 1, 1271598826, 1),
(12, '茶叶产品的包装，您的看法是？', 1286853089, 1, 1289445089, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_statbase`
--

CREATE TABLE IF NOT EXISTS `dev_tools_statbase` (
  `id` int(8) NOT NULL auto_increment,
  `ShowCountType` int(1) default NULL,
  `ShowCountSize` int(1) default NULL,
  `ShowCount` int(1) default NULL,
  `ShowCountStat` int(1) default NULL,
  `starttime` int(11) default NULL,
  `CountIpExp` int(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dev_tools_statbase`
--

INSERT INTO `dev_tools_statbase` (`id`, `ShowCountType`, `ShowCountSize`, `ShowCount`, `ShowCountStat`, `starttime`, `CountIpExp`) VALUES
(1, 17, 8, 2, 0, 1234728185, 5);

-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_statcome`
--

CREATE TABLE IF NOT EXISTS `dev_tools_statcome` (
  `id` int(12) NOT NULL auto_increment,
  `url` varchar(255) NOT NULL default '',
  `count` int(5) NOT NULL default '0',
  `begingtime` int(11) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `dev_tools_statcome`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_statcount`
--

CREATE TABLE IF NOT EXISTS `dev_tools_statcount` (
  `id` int(21) NOT NULL auto_increment,
  `ip` varchar(17) NOT NULL default '',
  `os` varchar(40) NOT NULL default '',
  `browse` varchar(30) NOT NULL default '',
  `urlform` varchar(255) NOT NULL default '',
  `time` int(11) NOT NULL default '0',
  `nowpage` varchar(255) default NULL,
  `member` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16307 ;

--
-- 转存表中的数据 `dev_tools_statcount`
--


-- --------------------------------------------------------

--
-- 表的结构 `dev_tools_statdate`
--

CREATE TABLE IF NOT EXISTS `dev_tools_statdate` (
  `id` int(2) NOT NULL auto_increment,
  `1th_day` int(5) NOT NULL default '0',
  `2th_day` int(5) NOT NULL default '0',
  `3th_day` int(5) NOT NULL default '0',
  `4th_day` int(5) NOT NULL default '0',
  `5th_day` int(5) NOT NULL default '0',
  `6th_day` int(5) NOT NULL default '0',
  `7th_day` int(5) NOT NULL default '0',
  `8th_day` int(5) NOT NULL default '0',
  `9th_day` int(5) NOT NULL default '0',
  `10th_day` int(5) NOT NULL default '0',
  `11th_day` int(5) NOT NULL default '0',
  `12th_day` int(5) NOT NULL default '0',
  `13th_day` int(5) NOT NULL default '0',
  `14th_day` int(5) NOT NULL default '0',
  `15th_day` int(5) NOT NULL default '0',
  `16th_day` int(5) NOT NULL default '0',
  `17th_day` int(5) NOT NULL default '0',
  `18th_day` int(5) NOT NULL default '0',
  `19th_day` int(5) NOT NULL default '0',
  `20th_day` int(5) NOT NULL default '0',
  `21th_day` int(5) NOT NULL default '0',
  `22th_day` int(5) NOT NULL default '0',
  `23th_day` int(5) NOT NULL default '0',
  `24th_day` int(5) NOT NULL default '0',
  `25th_day` int(5) NOT NULL default '0',
  `26th_day` int(5) NOT NULL default '0',
  `27th_day` int(5) NOT NULL default '0',
  `28th_day` int(5) NOT NULL default '0',
  `29th_day` int(5) NOT NULL default '0',
  `30th_day` int(5) NOT NULL default '0',
  `31th_day` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `dev_tools_statdate`
--

INSERT INTO `dev_tools_statdate` (`id`, `1th_day`, `2th_day`, `3th_day`, `4th_day`, `5th_day`, `6th_day`, `7th_day`, `8th_day`, `9th_day`, `10th_day`, `11th_day`, `12th_day`, `13th_day`, `14th_day`, `15th_day`, `16th_day`, `17th_day`, `18th_day`, `19th_day`, `20th_day`, `21th_day`, `22th_day`, `23th_day`, `24th_day`, `25th_day`, `26th_day`, `27th_day`, `28th_day`, `29th_day`, `30th_day`, `31th_day`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
