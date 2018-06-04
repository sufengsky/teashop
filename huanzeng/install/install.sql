INSERT INTO `{P}_base_coltype` VALUES (0, 'huanzeng', '积分换赠', '换赠', 1, 1, 1, 1, 1, '_hz_cat');

INSERT INTO `{P}_base_pageset` VALUES (0, '换赠首页', 'huanzeng', 'main', 230, 451, 151, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'transparent', '900', 'transparent', '900', 10, 'transparent', '900', 'index', 0);
INSERT INTO `{P}_base_pageset` VALUES (0, '赠品检索', 'huanzeng', 'query', 226, 522, 137, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'transparent', '900', 'transparent', '900', 10, 'transparent', '900', 'catid', 2);
INSERT INTO `{P}_base_pageset` VALUES (0, '赠品详情', 'huanzeng', 'detail', 228, 741, 139, '', '0', '0', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'transparent', '900', 'transparent', '900', 10, 'transparent', '900', 'id', 3);
INSERT INTO `{P}_base_pageset` VALUES (0, '购物车', 'huanzeng', 'cart', 164, 332, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 6);
INSERT INTO `{P}_base_pageset` VALUES (0, '赠品兑换', 'huanzeng', 'startorder', 166, 1250, 30, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 6);
INSERT INTO `{P}_base_pageset` VALUES (0, '订单详情', 'huanzeng', 'orderdetail', 166, 543, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 9);
INSERT INTO `{P}_base_pageset` VALUES (0, '订单查询', 'member', 'hzorder', 164, 543, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 8);


INSERT INTO `{P}_base_adminauth` VALUES (0, 'huanzeng', 720, '换赠参数设置', '', 0, 72, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'huanzeng', 721, '赠品管理权限', '', 1, 72, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'huanzeng', 722, '赠品订单管理权限', '', 2, 72, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'huanzeng', 723, '赠品换购统计权限', '', 3, 72, '');


INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzNavPath', '当前位置提示条', 'huanzeng', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzSearchForm', '赠品搜索表单', 'huanzeng', 'all', 'tpl_hz_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 200, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '赠品搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzQuery', '赠品检索搜索', 'huanzeng', 'query', 'tpl_hz_query.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 500, 30, 200, 90, 5, 20, '-1', '-1', -1, 30, '_self', -1, 30, 120, 120, 'fill', '赠品检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'visible', 'content', 'block', 0, 1);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzDetail', '赠品详情', 'huanzeng', 'detail', 'tpl_hz_detail.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 350, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '赠品详情', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzPaiHang', '赠品兑换排行', 'huanzeng', 'all', 'tpl_hz_paihang.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', 'http://', 200, 300, 0, 0, 90, 10, 6, '-1', '-1', 0, 12, '_self', 0, -1, 100, 100, 'fill', '赠品兑换排行', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzCart', '购物车', 'huanzeng', 'cart', 'tpl_hz_cart.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '购物车', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzStartOrder', '赠品兑换', 'huanzeng', 'startorder', 'tpl_hz_startorder.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '赠品兑换', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 1);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzOrderDetail', '订单详情', 'huanzeng', 'orderdetail', 'tpl_hz_orderdetail.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzMemberOrder', '会员订单查询', 'member', 'hzorder', 'tpl_hz_order.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '订单查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzClass', '赠品一级分类', 'all', 'all', 'tpl_hzclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '赠品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'huanzeng', 'modHzTwoClass', '赠品二级分类', 'all', 'all', 'tpl_hztwoclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '赠品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_hz_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);


CREATE TABLE `{P}_hz_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `{P}_hz_config` VALUES (1, '模块频道名称', 'input', '30', 'ChannelName', '积分换赠', '本模块对应的频道名称，如“积分换赠”；用于显示在网页标题、当前位置提示条等处');
INSERT INTO `{P}_hz_config` VALUES (2, '是否在当前位置提示条显示模块频道名称', 'YN', '30', 'ChannelNameInNav', '1', '是否在当前位置提示条显示模块频道名称');
INSERT INTO `{P}_hz_config` VALUES (3, '积分换赠时采用的积分类型', 'select', '30', 'CentType', '5', '请选择积分换赠积分的类型');


CREATE TABLE `{P}_hz_cat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) default NULL,
  `cat` char(100) default NULL,
  `xuhao` int(12) default NULL,
  `catpath` char(255) default NULL,
  `nums` int(20) default NULL,
  `tj` int(1) NOT NULL default '0',
  `ifchannel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_hz_con` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_hz_mzone` (
  `id` int(6) NOT NULL auto_increment,
  `memberid` int(12) NOT NULL default '0',
  `name` varchar(50) NOT NULL,
  `zone` varchar(100) default NULL,
  `postcode` varchar(20) NOT NULL,
  `tel` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_hz_order` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_hz_orderitems` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_hz_pages` (
  `id` int(12) NOT NULL auto_increment,
  `productid` int(12) NOT NULL default '0',
  `src` varchar(150) NOT NULL default '',
  `xuhao` int(5) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_hz_prop` (
  `id` int(20) NOT NULL auto_increment,
  `catid` int(20) NOT NULL default '0',
  `propname` char(30) default NULL,
  `xuhao` int(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `xuhao` (`xuhao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



INSERT INTO `{P}_hz_cat` VALUES(1, 0, '玩具', 1, '0001:', 0, 0, 0);
INSERT INTO `{P}_hz_cat` VALUES(2, 1, '电动玩具', 1, '0001:0002:', 0, 0, 0);
INSERT INTO `{P}_hz_cat` VALUES(3, 1, '毛绒玩具', 2, '0001:0003:', 0, 0, 0);
INSERT INTO `{P}_hz_cat` VALUES(4, 0, '数码通讯', 2, '0004:', 0, 0, 0);
INSERT INTO `{P}_hz_cat` VALUES(5, 2, '触电玩具', 1, '0001:0002:0005:', 0, 0, 0);

INSERT INTO `{P}_hz_con` VALUES(1, 2, '0001:0002:', 0, 'huanzeng', '翻滚遥控车', 300, 20, 0, '<p>会跳舞的火球特技<b>遥控车翻滚</b>*有音乐</p>', 1254194415, 0, 13, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20090929/1254194415.jpg', 1257841862, '系统管理员', '', '0', '', 0, '会跳舞的火球特技遥控车翻滚*有音乐', '5号', '塑料', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');
INSERT INTO `{P}_hz_con` VALUES(2, 3, '0001:0003:', 0, 'huanzeng', '布绒狗狗', 200, 20, 0, '布绒狗狗的介绍 ', 1254204709, 0, 89, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20091023/1256260916.jpg', 1257841784, '系统管理员', '', '0', '', 0, '布绒狗狗的简述', '100*45*30(mm)', '650g', '黄色', '绒布', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');
INSERT INTO `{P}_hz_con` VALUES(4, 2, '0001:0002:', 0, 'huanzeng', '电动玩具警车', 300, 20, 0, '<p>电动玩具警车的介绍</p>', 1254205119, 0, 77, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20090929/1254206267.jpg', 1254206267, '系统管理员', '', '0', '', 0, '电动玩具警车的简述', '5号', '塑料', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');
INSERT INTO `{P}_hz_con` VALUES(6, 1, '0001:', 0, 'huanzeng', '变形金刚－大黄蜂', 500, 30, 0, '大黄蜂的赠品介绍', 1257842529, 0, 0, 0, 1, 0, '0', 'gif', 'huanzeng/pics/20091110/1257842529.jpg', 1257842529, '系统管理员', '', '0', '', 0, '大黄蜂的简述', '150×30×25', 'JG－526', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');

INSERT INTO `{P}_hz_prop` VALUES(3, 2, '使用电池型号', 1);
INSERT INTO `{P}_hz_prop` VALUES(4, 2, '材质', 2);
INSERT INTO `{P}_hz_prop` VALUES(5, 3, '大小', 1);
INSERT INTO `{P}_hz_prop` VALUES(6, 3, '重量', 2);
INSERT INTO `{P}_hz_prop` VALUES(7, 3, '颜色', 3);
INSERT INTO `{P}_hz_prop` VALUES(8, 3, '布质', 4);
INSERT INTO `{P}_hz_prop` VALUES(9, 1, '规格', 1);
INSERT INTO `{P}_hz_prop` VALUES(10, 1, '型号', 2);
