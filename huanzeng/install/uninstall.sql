
delete from `{P}_base_pageset` where `coltype`='huanzeng';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='hzorder';

delete from `{P}_base_adminauth` where `coltype`='huanzeng';
delete from `{P}_member_secure` where `coltype`='huanzeng';
delete from `{P}_member_centrule` where `coltype`='huanzeng';

delete from `{P}_base_plusdefault` where `coltype`='huanzeng';
delete from `{P}_base_plustemp` where `pluslable` regexp 'modHz';

delete from `{P}_base_plus` where `coltype`='huanzeng';
delete from `{P}_base_plus` where `plustype`='huanzeng';
delete from `{P}_base_plus` where `plustype`='member' and `pluslocat`='hzorder';

delete from `{P}_base_plusplan` where `coltype`='huanzeng';
delete from `{P}_base_plusplan` where `plustype`='huanzeng';
delete from `{P}_base_plusplanid` where `plustype`='huanzeng';

DROP TABLE IF EXISTS `{P}_hz_cat`;
DROP TABLE IF EXISTS `{P}_hz_con`;
DROP TABLE IF EXISTS `{P}_hz_config`;
DROP TABLE IF EXISTS `{P}_hz_mzone`;
DROP TABLE IF EXISTS `{P}_hz_order`;
DROP TABLE IF EXISTS `{P}_hz_orderitems`;
DROP TABLE IF EXISTS `{P}_hz_pages`;
DROP TABLE IF EXISTS `{P}_hz_prop`;

delete from `{P}_base_coltype` where `coltype`='huanzeng';
