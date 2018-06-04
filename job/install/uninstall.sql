
delete from `{P}_base_pageset` where `coltype`='job';
delete from `{P}_base_adminauth` where `coltype`='job';
delete from `{P}_base_plusdefault` where `coltype`='job';

delete from `{P}_base_plus` where `coltype`='job';
delete from `{P}_base_plus` where `plustype`='job';

delete from `{P}_base_plusplan` where `coltype`='job';
delete from `{P}_base_plusplan` where `plustype`='job';
delete from `{P}_base_plusplanid` where `plustype`='job';

DROP TABLE IF EXISTS `{P}_job`;
DROP TABLE IF EXISTS `{P}_job_form`;
DROP TABLE IF EXISTS `{P}_job_telent`;

delete from `{P}_base_coltype` where `coltype`='job';
