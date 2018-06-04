
delete from `{P}_base_pageset` where `coltype`='feedback';
delete from `{P}_base_adminauth` where `coltype`='feedback';
delete from `{P}_base_plusdefault` where `coltype`='feedback';
delete from `{P}_base_plustemp` where `pluslable` regexp 'modFeedBack';

delete from `{P}_base_plus` where `coltype`='feedback';
delete from `{P}_base_plus` where `plustype`='feedback';

delete from `{P}_base_plusplan` where `coltype`='feedback';
delete from `{P}_base_plusplan` where `plustype`='feedback';
delete from `{P}_base_plusplanid` where `plustype`='feedback';

DROP TABLE IF EXISTS `{P}_feedback`;
DROP TABLE IF EXISTS `{P}_feedback_info`;
DROP TABLE IF EXISTS `{P}_feedback_group`;


delete from `{P}_base_coltype` where `coltype`='feedback';


