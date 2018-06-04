
delete from `{P}_base_pageset` where `coltype`='news';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='newsgl';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='newsfabu';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='newsmodify';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='newscat';

delete from `{P}_base_adminauth` where `coltype`='news';
delete from `{P}_member_secure` where `coltype`='news';
delete from `{P}_member_centrule` where `coltype`='news';

delete from `{P}_comment_cat` where `coltype`='news';

delete from `{P}_base_plusdefault` where `coltype`='news';
delete from `{P}_base_plustemp` where `pluslable` regexp 'modNews';

delete from `{P}_base_plus` where `coltype`='news';
delete from `{P}_base_plus` where `plustype`='news';
delete from `{P}_base_plus` where `plustype`='member' and `pluslocat`='newsgl';
delete from `{P}_base_plus` where `plustype`='member' and `pluslocat`='newsfabu';
delete from `{P}_base_plus` where `plustype`='member' and `pluslocat`='newsmodify';
delete from `{P}_base_plus` where `plustype`='member' and `pluslocat`='newscat';

delete from `{P}_base_plusplan` where `coltype`='news';
delete from `{P}_base_plusplan` where `plustype`='news';
delete from `{P}_base_plusplanid` where `plustype`='news';

DROP TABLE IF EXISTS `{P}_news_cat`;
DROP TABLE IF EXISTS `{P}_news_con`;
DROP TABLE IF EXISTS `{P}_news_config`;
DROP TABLE IF EXISTS `{P}_news_downlog`;
DROP TABLE IF EXISTS `{P}_news_pages`;
DROP TABLE IF EXISTS `{P}_news_pcat`;
DROP TABLE IF EXISTS `{P}_news_proj`;
DROP TABLE IF EXISTS `{P}_news_prop`;

delete from `{P}_base_coltype` where `coltype`='news';
