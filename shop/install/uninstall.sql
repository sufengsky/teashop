delete from `{P}_base_pageset` where `coltype`='shop';
delete from `{P}_base_pageset` where `coltype`='member' and `pagename`='shoporder';

delete from `{P}_base_adminauth` where `coltype`='shop';
delete from `{P}_member_secure` where `coltype`='shop';
delete from `{P}_member_centrule` where `coltype`='shop';

delete from `{P}_comment_cat` where `coltype`='shop';

delete from `{P}_base_plusdefault` where `coltype`='shop';
delete from `{P}_base_plustemp` where `pluslable` regexp 'modShop';

delete from `{P}_base_plus` where `coltype`='shop';
delete from `{P}_base_plus` where `plustype`='shop';
delete from `{P}_base_plus` where `plustype`='member' and `pluslocat`='shoporder';

delete from `{P}_base_plusplan` where `coltype`='shop';
delete from `{P}_base_plusplan` where `plustype`='shop';
delete from `{P}_base_plusplanid` where `plustype`='shop';

DROP TABLE IF EXISTS `{P}_shop_brand`;
DROP TABLE IF EXISTS `{P}_shop_brandcat`;
DROP TABLE IF EXISTS `{P}_shop_cat`;
DROP TABLE IF EXISTS `{P}_shop_con`;
DROP TABLE IF EXISTS `{P}_shop_config`;
DROP TABLE IF EXISTS `{P}_shop_memberprice`;
DROP TABLE IF EXISTS `{P}_shop_order`;
DROP TABLE IF EXISTS `{P}_shop_orderitems`;
DROP TABLE IF EXISTS `{P}_shop_pages`;
DROP TABLE IF EXISTS `{P}_shop_pricerule`;
DROP TABLE IF EXISTS `{P}_shop_prop`;
DROP TABLE IF EXISTS `{P}_shop_vcat`;
DROP TABLE IF EXISTS `{P}_shop_yun`;
DROP TABLE IF EXISTS `{P}_shop_yunzone`;

delete from `{P}_base_coltype` where `coltype`='shop';
