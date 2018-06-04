
INSERT INTO `{P}_base_coltype` VALUES (0, 'job', '企业招聘', '招聘', 1, 1, 1, 1, 1, '');

INSERT INTO `{P}_base_pageset` VALUES (0, '招聘职位查询', 'job', 'main', 226, 522, 137, '企业招聘', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'transparent', '900', 'transparent', '900', 10, 'transparent', '900', 'index', 2);
INSERT INTO `{P}_base_pageset` VALUES (0, '招聘职位详情', 'job', 'detail', 228, 741, 139, '', '0', '0', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'transparent', '900', 'transparent', '900', 10, 'transparent', '900', 'id', 3);

INSERT INTO `{P}_base_adminauth` VALUES (0, 'job', 221, '招聘职位发布', '', 1, 22, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'job', 222, '招聘职位管理', '', 2, 22, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'job', 223, '求职申请处理', '', 3, 22, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'job', 224, '企业人才库查询', '', 4, 22, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'job', 225, '应聘表单设置', '', 7, 22, '');

INSERT INTO `{P}_base_plusdefault` VALUES (0, 'job', 'modJobQuery', '职位翻页检索', 'all', 'all', 'tpl_jobquery.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '#ffffff', '-1', 650, 350, 0, 0, 90, 15, 10, '-1', '-1', -1, 30, '_self', -1, 100, -1, -1, '-1', '职位查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'job', 'modJobList', '最新职位列表', 'all', 'all', 'tpl_joblist.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '{#RP#}job/', 200, 200, 0, 0, 90, 12, 5, '-1', '-1', -1, 12, '_self', -1, -1, -1, -1, '-1', '最新职位', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'job', 'modJobContent', '职位信息详情', 'job', 'detail', 'tpl_jobcontent.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 630, 300, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '职位信息', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'job', 'modJobSearchForm', '职位搜索表单', 'job', 'all', 'tpl_job_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 0, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '职位搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'job', 'modJobNavPath', '当前位置提示条', 'job', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'job', 'modJobForm', '应聘申请表单', 'job', 'detail', 'tpl_job_form.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#f5f5f5', '#505050', '#fff', '-1', 650, 500, 0, 0, 99, 20, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '应聘申请', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);



CREATE TABLE `{P}_job` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `{P}_job_form` (
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;


INSERT INTO `{P}_job_form` VALUES (1, '姓　　名', 1, 200, 'title', '', 1, 1, '', 1, 1, 1);
INSERT INTO `{P}_job_form` VALUES (2, '教育经历', 2, 399, 'content', '', 1, 1, '', 1, 0, 14);
INSERT INTO `{P}_job_form` VALUES (3, '出生日期', 1, 200, 'name', '', 1, 1, '', 1, 0, 3);
INSERT INTO `{P}_job_form` VALUES (4, '性　　别', 5, 50, 'sex', '男;女', 1, 1, '', 1, 0, 2);
INSERT INTO `{P}_job_form` VALUES (5, '联系电话', 1, 200, 'tel', '', 1, 1, '', 1, 0, 9);
INSERT INTO `{P}_job_form` VALUES (6, '通信地址', 1, 300, 'address', '', 1, 1, '', 1, 0, 11);
INSERT INTO `{P}_job_form` VALUES (7, '电子邮箱', 1, 300, 'email', '', 1, 1, '', 1, 0, 12);
INSERT INTO `{P}_job_form` VALUES (8, '博客/主页', 1, 399, 'url', '', 0, 1, '', 0, 0, 18);
INSERT INTO `{P}_job_form` VALUES (9, 'QQ/MSN', 1, 399, 'qq', '', 0, 1, '', 0, 0, 19);
INSERT INTO `{P}_job_form` VALUES (10, '毕业院校', 1, 300, 'company', '', 1, 1, '', 1, 0, 5);
INSERT INTO `{P}_job_form` VALUES (11, '最高学历', 1, 200, 'company_address', '', 1, 1, '', 1, 0, 6);
INSERT INTO `{P}_job_form` VALUES (12, '邮政编码', 1, 399, 'zip', '', 0, 1, '', 0, 0, 19);
INSERT INTO `{P}_job_form` VALUES (13, '手机号码', 1, 200, 'fax', '', 0, 1, '', 1, 0, 10);
INSERT INTO `{P}_job_form` VALUES (14, '毕业专业', 1, 200, 'products_id', '', 1, 1, '', 1, 0, 7);
INSERT INTO `{P}_job_form` VALUES (15, '毕业时间', 1, 200, 'products_name', '', 1, 1, '', 1, 0, 8);
INSERT INTO `{P}_job_form` VALUES (16, '专业特长', 1, 399, 'products_num', '', 1, 1, '', 1, 0, 13);
INSERT INTO `{P}_job_form` VALUES (19, '婚姻状况', 5, 200, 'custom1', '未婚;已婚', 1, 1, '', 1, 0, 4);
INSERT INTO `{P}_job_form` VALUES (18, '工作经历', 2, 399, 'custom2', '', 1, 1, '', 1, 0, 15);
INSERT INTO `{P}_job_form` VALUES (17, '自定义三', 5, 399, 'custom3', '100;200;300;400;500', 0, 1, '', 0, 0, 19);
INSERT INTO `{P}_job_form` VALUES (20, '自定义四', 1, 399, 'custom4', '', 0, 1, '', 0, 0, 20);
INSERT INTO `{P}_job_form` VALUES (21, '自定义五', 1, 399, 'custom5', '', 0, 1, '', 0, 0, 21);
INSERT INTO `{P}_job_form` VALUES (22, '自定义六', 1, 399, 'custom6', '', 0, 1, '', 0, 0, 22);
INSERT INTO `{P}_job_form` VALUES (23, '自定义七', 1, 399, 'custom7', '', 0, 1, '', 0, 0, 23);


CREATE TABLE `{P}_job_telent` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

