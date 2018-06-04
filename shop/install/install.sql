
INSERT INTO `{P}_base_coltype` VALUES (0, 'shop', '网上购物', '购物', 1, 1, 1, 1, 1, '_shop_cat');

INSERT INTO `{P}_base_pageset` VALUES (0, '频道首页', 'shop', 'main', 147, 1410, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', 'index', 1);
INSERT INTO `{P}_base_pageset` VALUES (0, '商品查询', 'shop', 'query', 147, 717, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', 'catid', 2);
INSERT INTO `{P}_base_pageset` VALUES (0, '商品详情', 'shop', 'detail', 149, 1831, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', 'id', 3);
INSERT INTO `{P}_base_pageset` VALUES (0, '品牌查询', 'shop', 'brandquery', 149, 691, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 4);
INSERT INTO `{P}_base_pageset` VALUES (0, '品牌详情', 'shop', 'branddetail', 149, 512, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 5);
INSERT INTO `{P}_base_pageset` VALUES (0, '购物车', 'shop', 'cart', 164, 332, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 6);
INSERT INTO `{P}_base_pageset` VALUES (0, '订单详情', 'shop', 'shoporderdetail', 166, 543, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 9);
INSERT INTO `{P}_base_pageset` VALUES (0, '品牌首页', 'shop', 'brand', 147, 647, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 4);
INSERT INTO `{P}_base_pageset` VALUES (0, '商品订购', 'shop', 'startorder', 166, 1250, 30, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 6);
INSERT INTO `{P}_base_pageset` VALUES (0, '订单付款', 'shop', 'shoporderpay', 164, 332, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 9);
INSERT INTO `{P}_base_pageset` VALUES (0, '订单查询', 'member', 'shoporder', 164, 543, 0, '', '', '', 'rgb(112,128,144)', 'none', '0% 0%', 'repeat', 'scroll', 900, 'rgb(255,255,255)', '', 10, 10, 'auto', 'none transparent scroll repeat 0% 0%', '900', 'none transparent scroll repeat 0% 0%', '900', 10, 'none transparent scroll repeat 0% 0%', '900', '0', 8);


INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 310, '网店参数设置', '', 0, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 311, '配送方法设置', '', 1, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 313, '商品分类管理', '', 4, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 316, '品牌管理', '', 4, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 317, '商品管理', '', 5, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 319, '商品发布', '', 7, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 320, '商品修改', '', 8, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 321, '订单查询管理', '', 9, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 322, '订单调价权限', '', 9, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 323, '订单付款确认', '', 11, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 324, '订单配送确认', '', 12, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 325, '订单完成确认', '', 13, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 326, '订单退款确认', '', 14, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 327, '订单退货确认', '', 15, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 330, '订单查询统计', '', 16, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 331, '商品销售统计', '', 16, 31, '');
INSERT INTO `{P}_base_adminauth` VALUES (0, 'shop', 328, '订单退订确认', '', 15, 31, '');


INSERT INTO `{P}_member_centrule` VALUES (0, 'shop', '订单付款', 313, 10, 0, 0, 0, 0);
INSERT INTO `{P}_comment_cat` VALUES (11, 0, '商品点评', '0011:', 'shop', 11, 0, 0, 1);



INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopNavPath', '当前位置提示条', 'shop', 'all', 'tpl_navpath.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 650, 30, 0, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '当前位置', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopQuery', '商品检索搜索', 'shop', 'query', 'tpl_shop_query.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 220, 90, 5, 10, '-1', '-1', -1, 30, '_self', -1, 30, 120, 120, 'fill', '商品检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 1);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopTwoClassBrand', '分类品牌组合查询', 'all', 'all', 'tpl_shoptwoclass_brand.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 180, 300, 0, 0, 90, 0, -1, '-1', '-1', 0, -1, '_self', -1, -1, 140, 50, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopGlobalQuery', '全站翻页商品列表', 'all', 'all', 'tpl_shop_query_1.htm', '-1', 'A001', '', 1, 'solid', '', '', 'block', '', '', '#fff', '-1', 650, 350, 0, 0, 90, 15, 10, 'id|xuhao|dtime|uptime|bn|prop1|prop2|price0|price|cl', 'desc', 0, 12, '_self', 0, -1, 100, 100, 'fill', '商品列表', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopBrandAll', '分类品牌列表', 'shop', 'brand', 'tpl_shop_brandall.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 500, 30, 200, 90, 5, -1, '-1', '-1', 0, -1, '_self', -1, -1, 140, 50, 'fill', '品牌查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopContent', '商品详情', 'shop', 'detail', 'tpl_shop_content.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 350, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '商品详情', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopClass', '商品一级分类', 'all', 'all', 'tpl_shopclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopTwoClass', '商品二级分类', 'all', 'all', 'tpl_shoptwoclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', 0, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopCart', '购物车', 'shop', 'cart', 'tpl_shop_cart.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '购物车', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopList', '自选商品列表', 'all', 'all', 'tpl_shoplist.htm', '-1', 'A001', '', 1, 'solid', '', '', 'none', '', '', '#fff', '{#RP#}shop/class/', 300, 350, 0, 0, 90, 10, 6, 'id|xuhao|dtime|uptime|prop1|prop2|price0|price|cl', 'desc', 0, 12, '_self', 0, 30, 100, 100, 'fill', '最新商品', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopSearchForm', '商品搜索表单', 'all', 'all', 'tpl_shop_searchform.htm', '-1', 'A500', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 30, 0, 200, 90, 3, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '商品搜索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopClassFc', '商品逐级分类', 'shop', 'query', 'tpl_shopclass.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 200, 0, 0, 90, 5, 99, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopSameClass', '商品同级分类', 'shop', 'query', 'tpl_shopclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopComment', '商品点评', 'shop', 'detail', 'tpl_shop_comment.htm', '-1', '1000', '#dddddd', 1, 'solid', '', '', 'none', '', '', '#fff', 'http://', 650, 350, 350, 0, 90, 1, 5, '-1', '-1', -1, 20, '_self', -1, 120, -1, -1, '-1', '商品评论', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopSameTagList', '同标签相关商品', 'shop', 'detail', 'tpl_shoplist.htm', '-1', 'A001', '', 0, 'solid', '', '', 'none', '', '', '#fff', 'http://', 200, 300, 0, 0, 90, 10, 6, '-1', '-1', 0, 12, '_self', -1, -1, 100, 100, 'fill', '相关商品', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopHotList', '热门商品排行榜', 'all', 'all', 'tpl_shop_hotlist.htm', '-1', 'A001', '', 1, 'solid', '', '', 'none', '', '', '#fff', '{#RP#}shop/class/', 300, 350, 0, 0, 90, 10, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '热门商品排行榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopSaleList', '热卖商品排行榜', 'all', 'all', 'tpl_shop_hotlist.htm', '-1', 'A001', '', 1, 'solid', '', '', 'none', '', '', '#fff', '{#RP#}shop/class/', 300, 350, 0, 0, 90, 10, 10, '-1', '-1', 0, 12, '_self', 0, -1, -1, -1, '-1', '热卖商品排行榜', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '_shop_cat', '', '', -1, 'hidden', 'content', 'block', 1, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopBrandTwoClass', '品牌商品二级分类', 'all', 'branddetail', 'tpl_shoptwoclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 300, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '品牌商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopBrandClass', '品牌商品一级分类', 'all', 'branddetail', 'tpl_shopclass.htm', '-1', 'A001', '#dddddd', 1, 'solid', '', '', 'block', '#cccccc', '#fff', '#fff', '-1', 200, 200, 0, 0, 90, 12, -1, '-1', '-1', 0, -1, '_self', -1, -1, -1, -1, '-1', '品牌商品分类', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'hidden', 'content', 'block', 1, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopBrandDetail', '品牌介绍', 'shop', 'branddetail', 'tpl_shop_branddetail.htm', '-1', '1000', '', 0, 'solid', '', '', 'none', '', '', '', '-1', 650, 300, 30, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '品牌介绍', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopBrandGoodsQuery', '品牌相关商品检索', 'shop', 'branddetail', 'tpl_shop_query_1.htm', '-1', 'A001', '', 1, 'solid', '', '', 'block', '', '', '#fff', '-1', 650, 350, 0, 0, 90, 15, 10, 'id|xuhao|dtime|uptime|bn|prop1|prop2|price0|price|cl', 'desc', 0, 12, '_self', -1, -1, 100, 100, 'fill', '品牌商品', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopStartOrder', '商品订购', 'shop', 'startorder', 'tpl_shop_startorder.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '商品订购', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 1);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopOrderPay', '订单付款', 'shop', 'shoporderpay', 'tpl_shop_orderpay.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopMemberOrder', '会员订单查询', 'member', 'shoporder', 'tpl_shop_order.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '订单查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopOrderDetail', '订单详情', 'shop', 'shoporderdetail', 'tpl_shop_orderdetail.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 680, 500, 30, 200, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopOrderSearch', '非会员订单查询', 'all', 'all', 'tpl_shop_ordersearch.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 150, 0, 0, 90, 0, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '订单查询', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopSmallCart', '购物车提示信息', 'all', 'all', 'tpl_shop_smallcart.htm', '-1', 'A001', '#dddddd', 0, 'solid', '', '', 'none', '', '', '#fff', '-1', 200, 180, 0, 0, 90, 12, -1, '-1', '-1', -1, -1, '-1', -1, -1, -1, -1, '-1', '购物车', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);
INSERT INTO `{P}_base_plusdefault` VALUES (0, 'shop', 'modShopBrandQuery', '品牌检索', 'shop', 'brandquery', 'tpl_shop_brandquery.htm', '-1', '1000', '#dddddd', 0, 'solid', '', '', 'none', '#cccccc', '#fff', '#fff', '-1', 680, 500, 30, 200, 90, 5, 10, '-1', '-1', -1, -1, '_self', -1, -1, 140, 50, 'fill', '品牌检索', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', 1, '', '', '', -1, 'visible', 'content', 'block', 0, 0);


INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopTwoClass', '商品二级分类树型风格', 'tpl_shoptwoclass_1.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopTwoClass', '商品二级分类收放式菜单', 'tpl_shoptwoclass_1030.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopSmallCart', '顶部购物车提示式样', 'tpl_shop_smallcart_top.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/图片/简介单列', 'tpl_shoplist_1.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/图片/品牌/价格', 'tpl_shoplist_2.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/图片/参数列/价格', 'tpl_shoplist_3.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/图片/简介/价格', 'tpl_shoplist_4.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/图片/价格(上下布局)', 'tpl_shoplist_5.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/图片/品牌/参数列/价格(上下布局)', 'tpl_shoplist_6.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/图片/简介/价格(上下布局)', 'tpl_shoplist_7.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '商品名/价格纯文字列表', 'tpl_shoplist_8.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '230*230橱窗式商品展示', 'tpl_shoplist_9.htm');
INSERT INTO `{P}_base_plustemp` VALUES (0, 'modShopList', '150*150橱窗式商品展示', 'tpl_shoplist_10.htm');


CREATE TABLE `{P}_shop_brand` (
  `id` int(12) NOT NULL auto_increment,
  `brand` char(100) NOT NULL default '',
  `logo` char(100) NOT NULL default '',
  `url` char(100) NOT NULL default '',
  `intro` text,
  `xuhao` int(5) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_shop_brandcat` (
  `id` int(12) NOT NULL auto_increment,
  `brandid` int(10) NOT NULL default '0',
  `catid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_shop_cat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) NOT NULL default '0',
  `cat` char(100) NOT NULL default '',
  `xuhao` int(12) NOT NULL default '0',
  `catpath` char(255) NOT NULL default '',
  `nums` int(20) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  `ifchannel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `{P}_shop_con` (
  `id` int(12) NOT NULL auto_increment,
  `catid` int(12) NOT NULL default '0',
  `catpath` varchar(255) NOT NULL default '',
  `pcatid` int(12) NOT NULL default '0',
  `brandid` int(12) NOT NULL default '0',
  `contype` varchar(20) NOT NULL default 'shop',
  `bn` varchar(30) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `body` text,
  `canshu` text,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_shop_config` (
  `xuhao` int(3) NOT NULL default '0',
  `vname` varchar(50) NOT NULL default '',
  `settype` varchar(30) NOT NULL default 'input',
  `colwidth` varchar(3) NOT NULL default '30',
  `variable` varchar(32) NOT NULL default '',
  `value` text NOT NULL,
  `intro` text NOT NULL,
  PRIMARY KEY  (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




CREATE TABLE `{P}_shop_memberprice` (
  `id` int(12) NOT NULL auto_increment,
  `gid` int(10) NOT NULL default '0',
  `membertypeid` int(6) NOT NULL default '0',
  `price` decimal(8,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `{P}_shop_order` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `{P}_shop_orderitems` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `{P}_shop_pages` (
  `id` int(12) NOT NULL auto_increment,
  `gid` int(12) NOT NULL default '0',
  `src` varchar(150) NOT NULL default '',
  `xuhao` int(5) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `{P}_shop_pricerule` (
  `id` int(12) NOT NULL auto_increment,
  `membertypeid` int(6) NOT NULL default '0',
  `pr` decimal(5,2) NOT NULL default '1.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_shop_prop` (
  `id` int(20) NOT NULL auto_increment,
  `catid` int(20) NOT NULL default '0',
  `propname` char(30) default NULL,
  `xuhao` int(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `xuhao` (`xuhao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `{P}_shop_vcat` (
  `catid` int(12) NOT NULL auto_increment,
  `pid` int(12) NOT NULL default '0',
  `cat` char(100) NOT NULL default '',
  `url` char(200) NOT NULL default '',
  `xuhao` int(12) NOT NULL default '0',
  `tj` int(1) NOT NULL default '0',
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_shop_yun` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `{P}_shop_yunzone` (
  `id` int(12) NOT NULL auto_increment,
  `pid` int(6) NOT NULL default '0',
  `zone` char(50) NOT NULL default '',
  `xuhao` int(6) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `{P}_shop_config` VALUES (1, '模块频道名称', 'input', '30', 'ChannelName', '网上购物', '本模块对应的频道名称，如“网上购物”；用于显示在网页标题、当前位置提示条等处');
INSERT INTO `{P}_shop_config` VALUES (2, '是否在当前位置提示条显示模块频道名称', 'YN', '30', 'ChannelNameInNav', '1', '是否在当前位置提示条显示模块频道名称');
INSERT INTO `{P}_shop_config` VALUES (3, '商品默认计量单位', 'input', '30', 'DefaultDanwei', '个', '发布商品时显示的默认计量单位');
INSERT INTO `{P}_shop_config` VALUES (5, '是否允许非会员订购', 'YN', '30', 'NoMemberOrder', '1', '开启非会员订购时,不需要会员登录即可直接提交订单，非会员订单不产生会员付款和消费记录，直接处理订单');
INSERT INTO `{P}_shop_config` VALUES (6, '会员定价规则', 'pricerule', '30', 'PriceRule', '2', '选择按折扣率自动计算会员价格，发布商品时不填写会员价，在订购商品时系统根据折扣率自动计算会员价格；选择发布商品时按折扣率预填会员价格，在发布商品时系统按以下折扣率预填会员价，订购时按实际填写的会员价计算；折扣率设定方式：1.00为无折扣，0.85为85折，依此类推');
INSERT INTO `{P}_shop_config` VALUES (7, '市场参考价默认比例', 'input', '30', 'MarketPrice', '1.2', '发布商品时，根据商品销售价格自动填写市场参考价的计算比例。如：1.2就是市场参考价为销售价格的1.2倍');
INSERT INTO `{P}_shop_config` VALUES (21, '是否启用商品订购积分', 'YN', '30', 'CentOpen', '1', '会员在商品订购付款时，是否计算积分');
INSERT INTO `{P}_shop_config` VALUES (22, '商品订购积分的类型', 'centlist', '30', 'CentId', '5', '商品订购积分所采用的积分类型');
INSERT INTO `{P}_shop_config` VALUES (23, '商品订购积分的计算方法', 'centmodle', '30', 'CentModle', '2', '请选择按商品固定的积分值计算积分，或按商品实际购买价格计算积分');
INSERT INTO `{P}_shop_config` VALUES (24, '商品购买价格和积分的计算比例', 'input', '30', 'CentRate', '1.0', '在按商品实际购买价格计算积分时，商品实际购买价格和积分的兑换比例。如：2.0表示购买1元商品获得2个积分，依此类推');


INSERT INTO `{P}_shop_cat` VALUES (1, 0, '厨房电器', 1, '0001:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (2, 0, '生活电器', 2, '0002:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (3, 0, '护理电器', 3, '0003:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (5, 0, '健康电器', 5, '0005:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (6, 0, '手机数码', 7, '0006:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (7, 0, '电脑网络', 8, '0007:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (8, 1, '电饭煲', 1, '0001:0008:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (9, 1, '电磁炉', 2, '0001:0009:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (10, 1, '电炖锅', 3, '0001:0010:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (11, 1, '电烤箱', 4, '0001:0011:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (13, 1, '焖烧锅', 6, '0001:0013:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (14, 1, '电蒸笼', 7, '0001:0014:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (15, 1, '电压力锅', 8, '0001:0015:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (17, 1, '煮蛋器', 10, '0001:0017:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (20, 1, '烤面包机', 13, '0001:0020:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (21, 1, '微波炉', 14, '0001:0021:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (22, 1, '消毒柜', 15, '0001:0022:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (25, 1, '绞肉机', 18, '0001:0025:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (26, 1, '咖啡壶', 19, '0001:0026:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (27, 1, '烘碗机', 20, '0001:0027:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (28, 1, '燃气灶', 21, '0001:0028:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (31, 1, '榨汁机', 24, '0001:0031:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (32, 1, '燃气热水器', 25, '0001:0032:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (33, 1, '电热水器', 26, '0001:0033:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (35, 2, '电水壶', 1, '0002:0035:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (36, 2, '电风扇', 2, '0002:0036:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (37, 2, '电熨斗', 3, '0002:0037:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (38, 2, '吸尘器', 4, '0002:0038:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (39, 2, '加湿器', 5, '0002:0039:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (40, 2, '电暖器', 6, '0002:0040:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (41, 2, '豆浆机', 7, '0002:0041:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (43, 2, '饮水机', 9, '0002:0043:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (44, 2, '热水瓶', 10, '0002:0044:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (45, 2, '保温杯', 11, '0002:0045:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (47, 2, '电话机', 13, '0002:0047:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (48, 2, '活氧机', 14, '0002:0048:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (49, 2, '电蚊香', 15, '0002:0049:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (55, 2, '空气净化器', 21, '0002:0055:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (56, 2, '电源插座', 22, '0002:0056:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (57, 3, '电吹风', 1, '0003:0057:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (58, 3, '剃须刀', 2, '0003:0058:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (59, 3, '剃须刀配件', 3, '0003:0059:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (60, 3, '理发器', 4, '0003:0060:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (61, 3, '脱毛器', 5, '0003:0061:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (62, 3, '美发造型器', 6, '0003:0062:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (63, 3, '浴霸', 7, '0003:0063:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (64, 3, '修剪器', 8, '0003:0064:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (65, 3, '健身器材', 9, '0003:0065:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (66, 3, '时尚氧吧', 10, '0003:0066:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (67, 3, '睫毛卷翘器', 11, '0003:0067:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (70, 5, '电子秤', 1, '0005:0070:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (71, 5, '止鼾器', 2, '0005:0071:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (72, 5, '助眠器', 3, '0005:0072:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (73, 2, '台灯', 23, '0002:0073:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (74, 5, '按摩器', 4, '0005:0074:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (75, 5, '电子血压计', 5, '0005:0075:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (76, 5, '座便器', 6, '0005:0076:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (77, 6, '手机', 1, '0006:0077:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (78, 6, '手机配件', 2, '0006:0078:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (79, 6, '数码相机', 3, '0006:0079:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (80, 6, '数码摄像机', 4, '0006:0080:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (81, 6, '数码配件', 13, '0006:0081:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (82, 6, '录音笔', 6, '0006:0082:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (83, 6, 'MP3/4/5', 12, '0006:0083:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (84, 6, 'GPS导航', 8, '0006:0084:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (85, 6, '数码相框', 9, '0006:0085:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (86, 7, ' U盘', 1, '0007:0086:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (87, 7, '鼠标', 2, '0007:0087:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (88, 7, '键盘', 3, '0007:0088:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (89, 7, '音箱', 4, '0007:0089:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (90, 7, '机箱', 5, '0007:0090:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (91, 7, '摄像头', 6, '0007:0091:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (92, 7, '显示器', 7, '0007:0092:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (93, 7, '键鼠套装', 8, '0007:0093:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (94, 7, '机箱电源', 9, '0007:0094:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (95, 7, '散热底座', 10, '0007:0095:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (96, 7, '耳机/耳麦', 11, '0007:0096:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (97, 7, '笔记本电脑', 12, '0007:0097:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (98, 1, '料理机', 16, '0001:0098:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (99, 0, '大家电', 6, '0099:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (100, 99, '电视机', 1, '0099:0100:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (101, 99, '空调', 2, '0099:0101:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (102, 99, '洗衣机', 3, '0099:0102:', 0, 0, 0);
INSERT INTO `{P}_shop_cat` VALUES (103, 99, '电冰箱', 4, '0099:0103:', 0, 0, 0);


INSERT INTO `{P}_shop_brand` VALUES (1, '格力', 'shop/pics/20091014/1255497918.gif', 'http://www.gree.com.cn/', '<font color=#cc0033>格力电器</font>独创的以资产为纽带、以<font color=#cc0033>品牌</font>为旗帜、以"三个代表"（代表厂家的利益、代表商家的利益、代表消费者的利益）为灵魂的区域性销售公司模式 ', 11, 0);
INSERT INTO `{P}_shop_brand` VALUES (2, '九阳', 'shop/pics/20091014/1255498026.gif', 'http://www.joyoung.com.cn/', '<font color=#cc0033>九阳</font>公司致力于新鲜健康小型家用<font color=#cc0033>电器</font>的研发、生产与销售，主导产品有<font color=#cc0033>九阳</font>全自动家用豆浆机、电磁炉、电火锅、榨汁机等系列小家电', 2, 0);
INSERT INTO `{P}_shop_brand` VALUES (3, '美的', 'shop/pics/20091014/1255498132.gif', 'http://www.midea.com.cn/', '是一家以家电业为主，涉足房产、物流等领域的大型综合性现代化企业集团， <b>...</b> 照明 · 美的地产 · 家用<font color=#cc0033>电器</font>电机、变压器 · 工业电机 · 空气压缩机', 3, 0);
INSERT INTO `{P}_shop_brand` VALUES (4, '三星', 'shop/pics/20091014/1255498199.gif', 'http://www.samsung.com.cn/', '想象<font color=#cc0033>三星</font>能为您做什么！您可以为电视、手机、视频、音频、计算机和其他产品找到产品和支持信息。这里有关于我们公司的信息。', 4, 0);
INSERT INTO `{P}_shop_brand` VALUES (5, '飞利浦', 'shop/pics/20091014/1255498272.gif', 'http://www.philips.com.cn/', '<font color=#cc0033>飞利浦</font>家电高性价比,出众效果 全球领先技术,激动人心的体验 ', 5, 0);
INSERT INTO `{P}_shop_brand` VALUES (6, '美斯凯', 'shop/pics/20091014/1255498705.gif', 'http://www.maxcare.com.cn/', '<font color=#cc0033>美斯凯品牌</font>价值', 6, 0);
INSERT INTO `{P}_shop_brand` VALUES (7, '艾美特', 'shop/pics/20091014/1255498809.gif', 'http://www.airmate-china.com/', '艾美特产品畅销英国、法国、美国、加拿大、日本、韩国等全球60余国和地区，30多年来与10余家国际知名品牌的合作经验，使艾美特成为自制率高达95％的全球知名小家电企业 ', 1, 0);
INSERT INTO `{P}_shop_brand` VALUES (8, '苏泊尔', 'shop/pics/20091014/1255499186.gif', 'http://www.supor.com.cn/', '苏泊尔公司成立于1994 年8 月27 日，创立伊始就率先推出符合国家新标准的压力锅产品，并独创“ 安全到家” 的品牌诉求 ', 8, 0);
INSERT INTO `{P}_shop_brand` VALUES (9, '东菱', 'shop/pics/20091014/1255502950.gif', 'http://www.donlim.com', '公司以“东菱”为核心自有品牌，专业生产、研发、销售电热水壶、咖啡壶、面包机、烤箱、多士炉、电烫斗及各种食物处理器等小家电及相关产业配套。 <br />', 7, 0);
INSERT INTO `{P}_shop_brand` VALUES (10, '松下', 'shop/pics/20091020/1256045069.gif', 'http://panasonic.cn/', 'Panasonic作为全球最大的电子厂商之一，以“实现星罗棋布的网络社会”和“与地球环境共存”为企业愿景', 9, 0);

INSERT INTO `{P}_shop_brandcat` VALUES (48, 2, 41);
INSERT INTO `{P}_shop_brandcat` VALUES (47, 2, 35);
INSERT INTO `{P}_shop_brandcat` VALUES (46, 2, 2);
INSERT INTO `{P}_shop_brandcat` VALUES (45, 2, 98);
INSERT INTO `{P}_shop_brandcat` VALUES (239, 10, 11);
INSERT INTO `{P}_shop_brandcat` VALUES (43, 2, 33);
INSERT INTO `{P}_shop_brandcat` VALUES (42, 2, 32);
INSERT INTO `{P}_shop_brandcat` VALUES (41, 2, 31);
INSERT INTO `{P}_shop_brandcat` VALUES (40, 2, 28);
INSERT INTO `{P}_shop_brandcat` VALUES (39, 2, 27);
INSERT INTO `{P}_shop_brandcat` VALUES (38, 2, 26);
INSERT INTO `{P}_shop_brandcat` VALUES (37, 2, 25);
INSERT INTO `{P}_shop_brandcat` VALUES (36, 2, 22);
INSERT INTO `{P}_shop_brandcat` VALUES (35, 2, 21);
INSERT INTO `{P}_shop_brandcat` VALUES (34, 2, 20);
INSERT INTO `{P}_shop_brandcat` VALUES (33, 2, 17);
INSERT INTO `{P}_shop_brandcat` VALUES (32, 2, 15);
INSERT INTO `{P}_shop_brandcat` VALUES (31, 2, 14);
INSERT INTO `{P}_shop_brandcat` VALUES (30, 2, 13);
INSERT INTO `{P}_shop_brandcat` VALUES (29, 2, 11);
INSERT INTO `{P}_shop_brandcat` VALUES (28, 2, 10);
INSERT INTO `{P}_shop_brandcat` VALUES (27, 2, 9);
INSERT INTO `{P}_shop_brandcat` VALUES (26, 2, 8);
INSERT INTO `{P}_shop_brandcat` VALUES (25, 2, 1);
INSERT INTO `{P}_shop_brandcat` VALUES (49, 2, 43);
INSERT INTO `{P}_shop_brandcat` VALUES (50, 9, 1);
INSERT INTO `{P}_shop_brandcat` VALUES (51, 9, 8);
INSERT INTO `{P}_shop_brandcat` VALUES (52, 9, 9);
INSERT INTO `{P}_shop_brandcat` VALUES (53, 9, 10);
INSERT INTO `{P}_shop_brandcat` VALUES (54, 9, 11);
INSERT INTO `{P}_shop_brandcat` VALUES (55, 9, 13);
INSERT INTO `{P}_shop_brandcat` VALUES (56, 9, 14);
INSERT INTO `{P}_shop_brandcat` VALUES (57, 9, 15);
INSERT INTO `{P}_shop_brandcat` VALUES (58, 9, 17);
INSERT INTO `{P}_shop_brandcat` VALUES (59, 9, 20);
INSERT INTO `{P}_shop_brandcat` VALUES (60, 9, 21);
INSERT INTO `{P}_shop_brandcat` VALUES (61, 9, 22);
INSERT INTO `{P}_shop_brandcat` VALUES (62, 9, 25);
INSERT INTO `{P}_shop_brandcat` VALUES (63, 9, 26);
INSERT INTO `{P}_shop_brandcat` VALUES (64, 9, 27);
INSERT INTO `{P}_shop_brandcat` VALUES (65, 9, 28);
INSERT INTO `{P}_shop_brandcat` VALUES (66, 9, 31);
INSERT INTO `{P}_shop_brandcat` VALUES (67, 9, 32);
INSERT INTO `{P}_shop_brandcat` VALUES (68, 9, 33);
INSERT INTO `{P}_shop_brandcat` VALUES (238, 10, 10);
INSERT INTO `{P}_shop_brandcat` VALUES (70, 9, 98);
INSERT INTO `{P}_shop_brandcat` VALUES (71, 9, 2);
INSERT INTO `{P}_shop_brandcat` VALUES (72, 9, 35);
INSERT INTO `{P}_shop_brandcat` VALUES (73, 9, 41);
INSERT INTO `{P}_shop_brandcat` VALUES (74, 9, 43);
INSERT INTO `{P}_shop_brandcat` VALUES (75, 9, 45);
INSERT INTO `{P}_shop_brandcat` VALUES (76, 4, 6);
INSERT INTO `{P}_shop_brandcat` VALUES (77, 4, 77);
INSERT INTO `{P}_shop_brandcat` VALUES (78, 4, 78);
INSERT INTO `{P}_shop_brandcat` VALUES (79, 4, 7);
INSERT INTO `{P}_shop_brandcat` VALUES (80, 4, 92);
INSERT INTO `{P}_shop_brandcat` VALUES (81, 4, 96);
INSERT INTO `{P}_shop_brandcat` VALUES (82, 4, 97);
INSERT INTO `{P}_shop_brandcat` VALUES (83, 5, 1);
INSERT INTO `{P}_shop_brandcat` VALUES (84, 5, 8);
INSERT INTO `{P}_shop_brandcat` VALUES (85, 5, 9);
INSERT INTO `{P}_shop_brandcat` VALUES (86, 5, 10);
INSERT INTO `{P}_shop_brandcat` VALUES (87, 5, 11);
INSERT INTO `{P}_shop_brandcat` VALUES (88, 5, 13);
INSERT INTO `{P}_shop_brandcat` VALUES (89, 5, 14);
INSERT INTO `{P}_shop_brandcat` VALUES (90, 5, 15);
INSERT INTO `{P}_shop_brandcat` VALUES (91, 5, 17);
INSERT INTO `{P}_shop_brandcat` VALUES (92, 5, 20);
INSERT INTO `{P}_shop_brandcat` VALUES (93, 5, 21);
INSERT INTO `{P}_shop_brandcat` VALUES (94, 5, 22);
INSERT INTO `{P}_shop_brandcat` VALUES (95, 5, 25);
INSERT INTO `{P}_shop_brandcat` VALUES (96, 5, 26);
INSERT INTO `{P}_shop_brandcat` VALUES (97, 5, 27);
INSERT INTO `{P}_shop_brandcat` VALUES (98, 5, 28);
INSERT INTO `{P}_shop_brandcat` VALUES (99, 5, 31);
INSERT INTO `{P}_shop_brandcat` VALUES (100, 5, 32);
INSERT INTO `{P}_shop_brandcat` VALUES (101, 5, 33);
INSERT INTO `{P}_shop_brandcat` VALUES (237, 10, 9);
INSERT INTO `{P}_shop_brandcat` VALUES (103, 5, 98);
INSERT INTO `{P}_shop_brandcat` VALUES (104, 5, 2);
INSERT INTO `{P}_shop_brandcat` VALUES (105, 5, 35);
INSERT INTO `{P}_shop_brandcat` VALUES (106, 5, 36);
INSERT INTO `{P}_shop_brandcat` VALUES (107, 5, 37);
INSERT INTO `{P}_shop_brandcat` VALUES (108, 5, 38);
INSERT INTO `{P}_shop_brandcat` VALUES (109, 5, 39);
INSERT INTO `{P}_shop_brandcat` VALUES (110, 5, 40);
INSERT INTO `{P}_shop_brandcat` VALUES (111, 5, 41);
INSERT INTO `{P}_shop_brandcat` VALUES (112, 5, 43);
INSERT INTO `{P}_shop_brandcat` VALUES (113, 5, 44);
INSERT INTO `{P}_shop_brandcat` VALUES (114, 5, 45);
INSERT INTO `{P}_shop_brandcat` VALUES (115, 5, 47);
INSERT INTO `{P}_shop_brandcat` VALUES (116, 5, 48);
INSERT INTO `{P}_shop_brandcat` VALUES (117, 5, 49);
INSERT INTO `{P}_shop_brandcat` VALUES (118, 5, 55);
INSERT INTO `{P}_shop_brandcat` VALUES (119, 5, 56);
INSERT INTO `{P}_shop_brandcat` VALUES (120, 5, 73);
INSERT INTO `{P}_shop_brandcat` VALUES (121, 5, 3);
INSERT INTO `{P}_shop_brandcat` VALUES (122, 5, 57);
INSERT INTO `{P}_shop_brandcat` VALUES (123, 5, 58);
INSERT INTO `{P}_shop_brandcat` VALUES (124, 5, 59);
INSERT INTO `{P}_shop_brandcat` VALUES (125, 5, 60);
INSERT INTO `{P}_shop_brandcat` VALUES (126, 5, 61);
INSERT INTO `{P}_shop_brandcat` VALUES (127, 5, 62);
INSERT INTO `{P}_shop_brandcat` VALUES (128, 5, 63);
INSERT INTO `{P}_shop_brandcat` VALUES (129, 5, 64);
INSERT INTO `{P}_shop_brandcat` VALUES (130, 5, 65);
INSERT INTO `{P}_shop_brandcat` VALUES (131, 5, 66);
INSERT INTO `{P}_shop_brandcat` VALUES (132, 5, 67);
INSERT INTO `{P}_shop_brandcat` VALUES (133, 5, 5);
INSERT INTO `{P}_shop_brandcat` VALUES (134, 5, 70);
INSERT INTO `{P}_shop_brandcat` VALUES (135, 5, 71);
INSERT INTO `{P}_shop_brandcat` VALUES (136, 5, 72);
INSERT INTO `{P}_shop_brandcat` VALUES (137, 5, 74);
INSERT INTO `{P}_shop_brandcat` VALUES (138, 5, 75);
INSERT INTO `{P}_shop_brandcat` VALUES (139, 5, 76);
INSERT INTO `{P}_shop_brandcat` VALUES (140, 5, 6);
INSERT INTO `{P}_shop_brandcat` VALUES (141, 5, 77);
INSERT INTO `{P}_shop_brandcat` VALUES (142, 5, 78);
INSERT INTO `{P}_shop_brandcat` VALUES (143, 5, 79);
INSERT INTO `{P}_shop_brandcat` VALUES (144, 5, 80);
INSERT INTO `{P}_shop_brandcat` VALUES (145, 5, 81);
INSERT INTO `{P}_shop_brandcat` VALUES (146, 5, 82);
INSERT INTO `{P}_shop_brandcat` VALUES (147, 5, 83);
INSERT INTO `{P}_shop_brandcat` VALUES (148, 5, 84);
INSERT INTO `{P}_shop_brandcat` VALUES (149, 5, 85);
INSERT INTO `{P}_shop_brandcat` VALUES (150, 6, 5);
INSERT INTO `{P}_shop_brandcat` VALUES (151, 6, 70);
INSERT INTO `{P}_shop_brandcat` VALUES (152, 6, 71);
INSERT INTO `{P}_shop_brandcat` VALUES (153, 6, 72);
INSERT INTO `{P}_shop_brandcat` VALUES (154, 6, 74);
INSERT INTO `{P}_shop_brandcat` VALUES (155, 6, 75);
INSERT INTO `{P}_shop_brandcat` VALUES (156, 6, 76);
INSERT INTO `{P}_shop_brandcat` VALUES (157, 8, 1);
INSERT INTO `{P}_shop_brandcat` VALUES (158, 8, 8);
INSERT INTO `{P}_shop_brandcat` VALUES (159, 8, 9);
INSERT INTO `{P}_shop_brandcat` VALUES (160, 8, 10);
INSERT INTO `{P}_shop_brandcat` VALUES (161, 8, 11);
INSERT INTO `{P}_shop_brandcat` VALUES (162, 8, 13);
INSERT INTO `{P}_shop_brandcat` VALUES (163, 8, 14);
INSERT INTO `{P}_shop_brandcat` VALUES (164, 8, 15);
INSERT INTO `{P}_shop_brandcat` VALUES (165, 8, 17);
INSERT INTO `{P}_shop_brandcat` VALUES (166, 8, 20);
INSERT INTO `{P}_shop_brandcat` VALUES (167, 8, 21);
INSERT INTO `{P}_shop_brandcat` VALUES (168, 8, 22);
INSERT INTO `{P}_shop_brandcat` VALUES (169, 8, 25);
INSERT INTO `{P}_shop_brandcat` VALUES (170, 8, 26);
INSERT INTO `{P}_shop_brandcat` VALUES (171, 8, 27);
INSERT INTO `{P}_shop_brandcat` VALUES (172, 8, 28);
INSERT INTO `{P}_shop_brandcat` VALUES (173, 8, 31);
INSERT INTO `{P}_shop_brandcat` VALUES (174, 8, 32);
INSERT INTO `{P}_shop_brandcat` VALUES (175, 8, 33);
INSERT INTO `{P}_shop_brandcat` VALUES (236, 10, 8);
INSERT INTO `{P}_shop_brandcat` VALUES (177, 8, 98);
INSERT INTO `{P}_shop_brandcat` VALUES (178, 8, 2);
INSERT INTO `{P}_shop_brandcat` VALUES (179, 8, 35);
INSERT INTO `{P}_shop_brandcat` VALUES (180, 8, 36);
INSERT INTO `{P}_shop_brandcat` VALUES (181, 8, 37);
INSERT INTO `{P}_shop_brandcat` VALUES (182, 8, 38);
INSERT INTO `{P}_shop_brandcat` VALUES (183, 8, 39);
INSERT INTO `{P}_shop_brandcat` VALUES (184, 8, 40);
INSERT INTO `{P}_shop_brandcat` VALUES (185, 8, 41);
INSERT INTO `{P}_shop_brandcat` VALUES (186, 8, 43);
INSERT INTO `{P}_shop_brandcat` VALUES (187, 8, 44);
INSERT INTO `{P}_shop_brandcat` VALUES (188, 8, 45);
INSERT INTO `{P}_shop_brandcat` VALUES (189, 8, 47);
INSERT INTO `{P}_shop_brandcat` VALUES (190, 8, 48);
INSERT INTO `{P}_shop_brandcat` VALUES (191, 8, 49);
INSERT INTO `{P}_shop_brandcat` VALUES (192, 8, 55);
INSERT INTO `{P}_shop_brandcat` VALUES (193, 8, 56);
INSERT INTO `{P}_shop_brandcat` VALUES (194, 8, 73);
INSERT INTO `{P}_shop_brandcat` VALUES (195, 1, 2);
INSERT INTO `{P}_shop_brandcat` VALUES (196, 1, 56);
INSERT INTO `{P}_shop_brandcat` VALUES (197, 3, 1);
INSERT INTO `{P}_shop_brandcat` VALUES (198, 3, 8);
INSERT INTO `{P}_shop_brandcat` VALUES (199, 3, 9);
INSERT INTO `{P}_shop_brandcat` VALUES (200, 3, 10);
INSERT INTO `{P}_shop_brandcat` VALUES (201, 3, 11);
INSERT INTO `{P}_shop_brandcat` VALUES (202, 3, 13);
INSERT INTO `{P}_shop_brandcat` VALUES (203, 3, 14);
INSERT INTO `{P}_shop_brandcat` VALUES (204, 3, 15);
INSERT INTO `{P}_shop_brandcat` VALUES (205, 3, 17);
INSERT INTO `{P}_shop_brandcat` VALUES (206, 3, 20);
INSERT INTO `{P}_shop_brandcat` VALUES (207, 3, 21);
INSERT INTO `{P}_shop_brandcat` VALUES (208, 3, 22);
INSERT INTO `{P}_shop_brandcat` VALUES (209, 3, 25);
INSERT INTO `{P}_shop_brandcat` VALUES (210, 3, 26);
INSERT INTO `{P}_shop_brandcat` VALUES (211, 3, 27);
INSERT INTO `{P}_shop_brandcat` VALUES (212, 3, 28);
INSERT INTO `{P}_shop_brandcat` VALUES (213, 3, 31);
INSERT INTO `{P}_shop_brandcat` VALUES (214, 3, 32);
INSERT INTO `{P}_shop_brandcat` VALUES (215, 3, 33);
INSERT INTO `{P}_shop_brandcat` VALUES (235, 10, 1);
INSERT INTO `{P}_shop_brandcat` VALUES (217, 3, 98);
INSERT INTO `{P}_shop_brandcat` VALUES (218, 3, 2);
INSERT INTO `{P}_shop_brandcat` VALUES (219, 3, 35);
INSERT INTO `{P}_shop_brandcat` VALUES (220, 3, 36);
INSERT INTO `{P}_shop_brandcat` VALUES (221, 3, 37);
INSERT INTO `{P}_shop_brandcat` VALUES (222, 3, 38);
INSERT INTO `{P}_shop_brandcat` VALUES (223, 3, 39);
INSERT INTO `{P}_shop_brandcat` VALUES (224, 3, 40);
INSERT INTO `{P}_shop_brandcat` VALUES (225, 3, 41);
INSERT INTO `{P}_shop_brandcat` VALUES (226, 3, 43);
INSERT INTO `{P}_shop_brandcat` VALUES (227, 3, 44);
INSERT INTO `{P}_shop_brandcat` VALUES (228, 3, 45);
INSERT INTO `{P}_shop_brandcat` VALUES (229, 3, 47);
INSERT INTO `{P}_shop_brandcat` VALUES (230, 3, 48);
INSERT INTO `{P}_shop_brandcat` VALUES (231, 3, 49);
INSERT INTO `{P}_shop_brandcat` VALUES (232, 3, 55);
INSERT INTO `{P}_shop_brandcat` VALUES (233, 3, 56);
INSERT INTO `{P}_shop_brandcat` VALUES (234, 3, 73);
INSERT INTO `{P}_shop_brandcat` VALUES (240, 10, 13);
INSERT INTO `{P}_shop_brandcat` VALUES (241, 10, 14);
INSERT INTO `{P}_shop_brandcat` VALUES (242, 10, 15);
INSERT INTO `{P}_shop_brandcat` VALUES (243, 10, 17);
INSERT INTO `{P}_shop_brandcat` VALUES (244, 10, 20);
INSERT INTO `{P}_shop_brandcat` VALUES (245, 10, 21);
INSERT INTO `{P}_shop_brandcat` VALUES (246, 10, 22);
INSERT INTO `{P}_shop_brandcat` VALUES (247, 10, 25);
INSERT INTO `{P}_shop_brandcat` VALUES (248, 10, 26);
INSERT INTO `{P}_shop_brandcat` VALUES (249, 10, 27);
INSERT INTO `{P}_shop_brandcat` VALUES (250, 10, 28);
INSERT INTO `{P}_shop_brandcat` VALUES (251, 10, 31);
INSERT INTO `{P}_shop_brandcat` VALUES (252, 10, 32);
INSERT INTO `{P}_shop_brandcat` VALUES (253, 10, 33);
INSERT INTO `{P}_shop_brandcat` VALUES (254, 10, 98);
INSERT INTO `{P}_shop_brandcat` VALUES (255, 10, 2);
INSERT INTO `{P}_shop_brandcat` VALUES (256, 10, 35);
INSERT INTO `{P}_shop_brandcat` VALUES (257, 10, 36);
INSERT INTO `{P}_shop_brandcat` VALUES (258, 10, 37);
INSERT INTO `{P}_shop_brandcat` VALUES (259, 10, 38);
INSERT INTO `{P}_shop_brandcat` VALUES (260, 10, 39);
INSERT INTO `{P}_shop_brandcat` VALUES (261, 10, 40);
INSERT INTO `{P}_shop_brandcat` VALUES (262, 10, 41);
INSERT INTO `{P}_shop_brandcat` VALUES (263, 10, 43);
INSERT INTO `{P}_shop_brandcat` VALUES (264, 10, 44);
INSERT INTO `{P}_shop_brandcat` VALUES (265, 10, 45);
INSERT INTO `{P}_shop_brandcat` VALUES (266, 10, 47);
INSERT INTO `{P}_shop_brandcat` VALUES (267, 10, 48);
INSERT INTO `{P}_shop_brandcat` VALUES (268, 10, 49);
INSERT INTO `{P}_shop_brandcat` VALUES (269, 10, 55);
INSERT INTO `{P}_shop_brandcat` VALUES (270, 10, 56);
INSERT INTO `{P}_shop_brandcat` VALUES (271, 10, 73);
INSERT INTO `{P}_shop_brandcat` VALUES (272, 10, 3);
INSERT INTO `{P}_shop_brandcat` VALUES (273, 10, 57);
INSERT INTO `{P}_shop_brandcat` VALUES (274, 10, 58);
INSERT INTO `{P}_shop_brandcat` VALUES (275, 10, 59);
INSERT INTO `{P}_shop_brandcat` VALUES (276, 10, 60);
INSERT INTO `{P}_shop_brandcat` VALUES (277, 10, 61);
INSERT INTO `{P}_shop_brandcat` VALUES (278, 10, 62);
INSERT INTO `{P}_shop_brandcat` VALUES (279, 10, 63);
INSERT INTO `{P}_shop_brandcat` VALUES (280, 10, 64);
INSERT INTO `{P}_shop_brandcat` VALUES (281, 10, 65);
INSERT INTO `{P}_shop_brandcat` VALUES (282, 10, 66);
INSERT INTO `{P}_shop_brandcat` VALUES (283, 10, 67);
INSERT INTO `{P}_shop_brandcat` VALUES (284, 10, 5);
INSERT INTO `{P}_shop_brandcat` VALUES (285, 10, 70);
INSERT INTO `{P}_shop_brandcat` VALUES (286, 10, 71);
INSERT INTO `{P}_shop_brandcat` VALUES (287, 10, 72);
INSERT INTO `{P}_shop_brandcat` VALUES (288, 10, 74);
INSERT INTO `{P}_shop_brandcat` VALUES (289, 10, 75);
INSERT INTO `{P}_shop_brandcat` VALUES (290, 10, 76);
INSERT INTO `{P}_shop_brandcat` VALUES (291, 10, 6);
INSERT INTO `{P}_shop_brandcat` VALUES (292, 10, 77);
INSERT INTO `{P}_shop_brandcat` VALUES (293, 10, 78);
INSERT INTO `{P}_shop_brandcat` VALUES (294, 10, 79);
INSERT INTO `{P}_shop_brandcat` VALUES (295, 10, 80);
INSERT INTO `{P}_shop_brandcat` VALUES (296, 10, 81);
INSERT INTO `{P}_shop_brandcat` VALUES (297, 10, 82);
INSERT INTO `{P}_shop_brandcat` VALUES (298, 10, 83);
INSERT INTO `{P}_shop_brandcat` VALUES (299, 10, 84);
INSERT INTO `{P}_shop_brandcat` VALUES (300, 10, 85);
INSERT INTO `{P}_shop_brandcat` VALUES (301, 10, 7);
INSERT INTO `{P}_shop_brandcat` VALUES (302, 10, 86);
INSERT INTO `{P}_shop_brandcat` VALUES (303, 10, 87);
INSERT INTO `{P}_shop_brandcat` VALUES (304, 10, 88);
INSERT INTO `{P}_shop_brandcat` VALUES (305, 10, 89);
INSERT INTO `{P}_shop_brandcat` VALUES (306, 10, 90);
INSERT INTO `{P}_shop_brandcat` VALUES (307, 10, 91);
INSERT INTO `{P}_shop_brandcat` VALUES (308, 10, 92);
INSERT INTO `{P}_shop_brandcat` VALUES (309, 10, 93);
INSERT INTO `{P}_shop_brandcat` VALUES (310, 10, 94);
INSERT INTO `{P}_shop_brandcat` VALUES (311, 10, 95);
INSERT INTO `{P}_shop_brandcat` VALUES (312, 10, 96);
INSERT INTO `{P}_shop_brandcat` VALUES (313, 10, 97);
INSERT INTO `{P}_shop_brandcat` VALUES (314, 10, 99);
INSERT INTO `{P}_shop_brandcat` VALUES (315, 10, 100);
INSERT INTO `{P}_shop_brandcat` VALUES (316, 10, 101);
INSERT INTO `{P}_shop_brandcat` VALUES (317, 10, 102);
INSERT INTO `{P}_shop_brandcat` VALUES (318, 10, 103);


INSERT INTO `{P}_shop_con` VALUES (1, 8, '0001:0008:', 0, 2, 'shop', 'A001', '九阳电压力锅JYY-M50 ', '独创全营养技术，营养百分百 <br />九阳安全盾，十重安全保护更放心&nbsp;<br /><br />硬氧内胆，不含涂层 <br />旋钮式设计，营养美味一旋即得 <br />靓丽防指纹不锈钢外壳，美观大方<br />', '', 550.00, 500.00, '个', 199, 0, 3000, 1, 0, 4, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255501953.jpg', 1255501707, 1256042162, '系统管理员', '', '0', 0, '独创全营养技术，营养百分百,煲、煮、焖、炖、蒸，样样都精通,硬氧内胆，不含涂层', 'JYY-M50', '银灰', '1500W', '九阳', '全国联保，享受国家三包服务，质保期一年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (2, 98, '0001:0098:', 0, 2, 'shop', 'A002', '九阳料理机JYL-A021 ', '<p><span style="COLOR: rgb(255,0,0)"><strong><span style="FONT-SIZE: medium"><font size=3>产品介绍?</font></span></strong></span></p>\r\n<p><span style="COLOR: rgb(0,0,255)"><span style="FONT-SIZE: small"><font size=2>样样精通</font></span></span><span style="FONT-SIZE: small"><br /><font size=2>豆浆、搅拌、干磨、料理、绞肉多功能五合一<br />肉馅、菜馅、肉泥，样样精通 <br /><span style="COLOR: rgb(0,0,255)">料理轻松</span><br />人性化设计，操作更方便<br />可拆卸式部件，清洗更方便 <br /><span style="COLOR: rgb(0,0,255)">安全可靠</span><br />多重安全防护，使用更放心<br />食品级健康材质，使用更安心 <br /><span style="COLOR: rgb(0,0,255)">品质高贵</span><br />欧式风格，尊显高贵<br />高质感材质，彰显品质 <br />功率：300W&nbsp;&nbsp;&nbsp; <br />电压：AC220V&nbsp;&nbsp; <br />频率：50Hz&nbsp;&nbsp; <br />转速：15000—20000转/分</font></span></p>', '', 330.00, 300.00, '套', 199, 0, 3000, 1, 0, 15, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255502238.jpg', 1255502238, 1256046316, '系统管理员', '', '0', 0, '豆浆、搅拌、干磨、料理、绞肉多功能五合一，肉馅、菜馅、肉泥，样样精通', 'JYL-A021', '橘红', '1000W', '九阳', '全国联保，享受国家三包服务，质保期一年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上架,', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (3, 41, '0002:0041:', 0, 9, 'shop', 'A004', '东菱水果豆浆机XB-9186A ', '<strong>五大功能:&nbsp; 玉米汁/花生奶，豆浆，榨汁，米糊、开水功能，加热管是完全可以拆出来洗，整个机器清洁没死角了！</strong> \r\n<p><span style="COLOR: rgb(255,0,0)"><strong><img alt="" hspace=10 src="http://pics.woye.com/mps2/m5538/u5538-%7B099CBE25-09EF-4FC2-A13E-18AE97256579%7D.jpg" align=left vspace=10 />一、玉米汁/花生奶键：</strong></span><span style="COLOR: rgb(0,0,255)"><br />1、将大杯放到机座上，并确保将其放到位，否则机器不会工作。<br />2、把滤网放入大杯并顺时针旋转，将其下边缘的两凸点扣入大杯底部两扣位置处，使其固定。<br />3、参照大杯上的刻度线，往大杯中注入适量的水，不可低于最小刻度（800ml),也不可高于最大刻度（1500ml)若低于最小刻度机器是不能启动的，会有蜂鸣报警声。<br />4、盖上杯盖，并顺时针旋转使其扣入大杯中固定。<br />5、用量杯量适量的玉米粒（花生），倒入大杯内的滤网中。<br />注意：往滤网中倒玉米粒（花生）时，建议从杯盖中心的孔内倒入，以免玉米粒（花生）漏到滤网外面。<br />6、装上量杯，让量杯的两条突出特和顶盖相对应的槽对齐放下来，然后顺时针转动，直到完全扣入杯盖上。<br />7、插上电源。<br />8、触按：玉米汁/花生奶 键，批示灯亮起，机器开始工作。<br />&nbsp;<br />厂家推荐：纯玉米汁和纯花生奶味道更醇，但您可以根据个人口味加牛奶和白糖等配料。<br />小贴士：豆浆机停止工作后，如果还有部分玉米粒（花生）没有充分搅碎可以使用推料杆将未搅碎的玉米粒（花生）搅到下面，然后再按“果汁”键继续搅拌。这样可以使玉米汁（花生奶）更香浓可口。<br /></span></p>', '', 480.00, 450.00, '台', 200, 0, 2000, 0, 0, 32, 0, 1, 0, '0', 'gif', 'shop/pics/20091014/1255502834.jpg', 1255502834, 1255936373, '系统管理员', '', '0', 0, '夏季的到来，你拥有了它就可以在家轻松做冰凉的饮品啦，快快行动吧！', 'XB-9186A', '银灰', '东菱', '全国联保，享受国家三包服务，质保期一年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上架,', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (4, 41, '0002:0041:', 0, 2, 'shop', 'A005', '九阳豆浆机JYDZ-29', '<strong><font color=#000000>产品特点<br /><br /></font></strong><font color=#0000ff>&nbsp; &nbsp; *颜色：橘红、蓝色<br />&nbsp;&nbsp;&nbsp; *制浆量：1000-1200ml<br />&nbsp;&nbsp;&nbsp; *适用范围：2-4人<br /></font><span style="COLOR: rgb(0,0,255)">&nbsp;&nbsp;&nbsp; *可制作：五谷豆浆、全豆豆浆、<br />&nbsp;&nbsp;&nbsp;&nbsp; 果蔬豆浆、玉米汁<br />&nbsp;&nbsp;&nbsp; *专利易清洗多功能豆浆机<br />&nbsp;&nbsp;&nbsp; *专利文火熬煮技术，熬得透、喝着香<br />&nbsp;&nbsp;&nbsp; *采用五谷精磨器，粉碎效果高，易吸收，易清洗<br />&nbsp;&nbsp;&nbsp; *轻触按键，蓝色背景光显示，声光报警<br />&nbsp;&nbsp;&nbsp; *6大智能安全保护</span><br />', '', 360.00, 300.00, '台', 200, 0, 3000, 0, 0, 20, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255503667.jpg', 1255503667, 1256046337, '系统管理员', '', '0', 0, '采用五谷精磨器，粉碎效果高，易吸收，易清洗，可制作五谷豆浆、全豆豆浆', 'JYDZ-29', '橘红', '1500W', '九阳', '全国联保，享受国家三包服务，质保期一年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上架,', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (5, 41, '0002:0041:', 0, 2, 'shop', 'D009', '美的豆浆机', '<p>制浆容量：1000-1300ml<br />适用范围：2-4人<br />可制作：干豆豆浆、湿豆豆浆、八宝、米糊、绿豆沙、果汁、搅拌<br /></p>\r\n<p>◆干豆功能：解决：浸泡时间长；长时间浸泡，营养流失；长时间浸泡滋生细菌导致健康问题。<br /></p>\r\n<p>◆无网功能：先进技术，好清洗；无卫生死角，不会产生豆浆污染的隐患；专业打磨干豆豆浆，更营养。<br /></p>\r\n<p>◆机身医用不锈钢：杯身防指纹设计，防刮耐磨，易清洗；抗菌，无毒，无异味，更健康；使用寿命更长久。<br /></p>\r\n<p>◆不锈钢发热底盘加热：底盘加热：加热器具在杯体底部更安全；不易损伤寿命高、更耐用；热对流加热更透彻，不易糊底。<br /></p>\r\n<p>◆智能醇化技术：先将干豆预热激活营养打磨精细；再转入高温100°沸腾使营养释放与转换；最后进行真正的高温文火煲熟熬香。</p>', '', 600.00, 500.00, '只', 200, 0, 3000, 0, 0, 27, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255508631.jpg', 1255508631, 1255936382, '系统管理员', '', '0', 0, '五谷  米糊  八宝  湿豆  干豆  果蔬  其他', 'DS13A11', '银灰', '750W', '美的', '全国联保，享受国家三包服务，质保期一年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上架,', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (6, 41, '0002:0041:', 0, 2, 'shop', 'A009', '九阳豆浆机JYDZ-32B ', '<img style="WIDTH: 543px; HEIGHT: 714px" height=915 alt="" src="http://img.mall.taobaocdn.com/malli/product/seller/1545/i2/cc0/2d0/T1qndcXX4xDQBXXXXX.jpg" width=552 /> ', '', 600.00, 500.00, '只', 200, 0, 3000, 0, 0, 20, 1, 1, 0, '0', 'gif', 'shop/pics/20091014/1255511091.jpg', 1255511091, 1255936362, '系统管理员', '', '0', 0, '运动型  精明理财型  时尚爱美型  小资型  事业型', 'JYDZ-32B', '橘红', '750W', '九阳', '全国联保，享受国家三包服务，质保期一年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上架,', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (7, 35, '0002:0035:', 0, 3, 'shop', 'D009', '美的电热水壶17P12D ', '<p><font face=宋体 size=3>名称：电水壶<br />品牌：美的（midea）<br />家电分类：电热水煲<br />家电型号：17P12D<br />功率：1800W<br />材质：塑料<br />容量：1.7L<br />可选颜色：实物<br />1.电源线直接连接温控器，可插拔，简洁实用；<br />2.电源开关与指示灯一体，简单方便；<br />3.超低价格，超级实惠；<br />4.国家食品级塑料，安全卫生；<br />5.1800W功率，1.7升容量。<br />————————————————————————————————————<br />1.电源线直接连接温控器，可插拔，简洁实用；<br />2.电源开关与指示灯一体，简单方便；<br />3.超低价格，超级实惠；<br />4.国家食品级塑料，安全卫生；<br />5.1800W功率，1.7升容量。</font></p>', '', 60.00, 50.00, '只', 199, 0, 2000, 1, 0, 18, 0, 1, 0, '0', 'gif', 'shop/pics/20091014/1255511388.jpg', 1255511388, 1255511388, '系统管理员', '', '0', 0, '电源线直接连接温控器，可插拔，简洁实用', '17P12D', '白色', '1000W', '美的', '全国联保，享受国家三包服务，质保期一年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (8, 8, '0001:0008:', 0, 10, 'shop', 'C001', '松下SR-MS182电饭煲', '', '', 960.00, 800.00, '只', 0, 0, 2000, 0, 0, 7, 1, 1, 0, '0', 'gif', 'shop/pics/20091020/1256044952.jpg', 1256044952, 1256050306, '管理员', '', '0', 0, '满足了人们口味的需要,更倡导着食用粗粮、均衡营养的新饮食文化,是健康生活的回归。', 'SR-MS182/1.8L', '白色', '1500W', '松下', '全国联保，享受国家三包服务，质保期为：整机保修二年', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '新品上架,', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (9, 8, '0001:0008:', 0, 10, 'shop', 'C009', '松下SR-CCK05-N电饭煲', '<SPAN style="COLOR: #ff0000"><STRONG>松下电饭煲SR-CCK05-N</STRONG></SPAN><BR><SPAN style="COLOR: #0000ff">功能：保养功能--驱除烹饪残留异味、保持高度清洁，24小时时钟式预约，预约记忆，12小时自动保温；<BR>这是一款具有24小时时钟式预约，预约记忆，12小时自动保温功能的电饭煲 SR-CCK05&nbsp; 面板颜色:香槟金/蓝色&nbsp; 0.54L(1-3人)<BR></SPAN>', '', 960.00, 800.00, '只', 200, 0, 3000, 0, 0, 45, 1, 1, 0, '0', 'gif', 'shop/pics/20091020/1256050431.jpg', 1256050431, 1256107504, '管理员', '', '0', 0, '驱除烹饪残留异味、保持高度清洁，24小时时钟式预约，预约记忆', 'SR-CCK05-N/0.54L', '蓝色', '1000W', '松下', '全国联保，享受国家三包服务，质保期为：整机保修二年。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');
INSERT INTO `{P}_shop_con` VALUES (10, 41, '0002:0041:', 0, 2, 'shop', 'D002', '九阳豆浆机JYDZ-21', '<P><SPAN style="COLOR: rgb(255,0,0)"><STRONG>主要功能特性</STRONG></SPAN><BR>● 创维L05系列：47/42L05HF&nbsp; 37/32L05HR<BR>● 3G酷影（支持720P RM/RMVB、1080P H.264）<BR>● Uplayer多媒体播放平台<BR>● VII第二代数字引擎<BR>● 10Bit色彩提升技术 ＊<BR>● 第Ⅲ代六基色<BR>● 屏变科技<BR>● HDMI1.3高清数字端口<BR>● （＊表示部分型号功能）<BR></P>', '<P>\r\n<TABLE class="form_table t_hue4" style="BORDER-RIGHT: #d4d0c8 1px solid; BORDER-TOP: #d4d0c8 1px solid; BORDER-LEFT: #d4d0c8 1px solid; BORDER-BOTTOM: #d4d0c8 1px solid" cellSpacing=1 cellPadding=3 width="100%" border=0>\r\n<TBODY>\r\n<TR>\r\n<TD class=left colSpan=2><STRONG>关键参数</STRONG></TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>额定电压(V)：</TD>\r\n<TD class=left>220V&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>频率(HZ)：</TD>\r\n<TD class=left>50Hz&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>最大容积(L)：</TD>\r\n<TD class=left>1.3L&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>适用人数：</TD>\r\n<TD class=left>2－4人&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>耗电量：</TD>\r\n<TD class=left>约0.16度&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>产地：</TD>\r\n<TD class=left>山东济南&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=left colSpan=2><STRONG>功能</STRONG></TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>功能列表：</TD>\r\n<TD class=left>采用九阳"全营养技术"，全豆豆浆，完全营养；智能全时加热程序"，豆浆乳化更充分，口感更香浓。&nbsp;</TD></TR>\r\n<TR>\r\n<TD class=left colSpan=2><STRONG>总体规格</STRONG></TD></TR>\r\n<TR>\r\n<TD class=right width=150 bgColor=#f1f1f1>商品重量(Kg)：</TD>\r\n<TD class=left>680g&nbsp;</TD></TR></TBODY></TABLE></P>', 360.00, 300.00, '只', 200, 0, 2000, 0, 0, 54, 0, 1, 0, '0', 'gif', 'shop/pics/20091021/1256107643.jpg', 1256050667, 1256107786, '管理员', '', '0', 0, '微电脑控制，全自动制浆，十几分钟做出新鲜香浓熟豆浆', 'JYDZ-21', '绿色', '500W', '九阳', '全国联保，享受国家三包服务，质保期一年。', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, '|150|');

INSERT INTO `{P}_shop_prop` VALUES (1, 1, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (2, 1, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (3, 1, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (383, 8, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (382, 8, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (381, 8, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (388, 9, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (387, 9, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (386, 9, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (393, 10, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (392, 10, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (391, 10, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (398, 11, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (397, 11, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (396, 11, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (403, 13, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (402, 13, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (401, 13, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (408, 14, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (407, 14, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (406, 14, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (413, 15, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (412, 15, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (411, 15, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (418, 17, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (417, 17, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (416, 17, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (423, 20, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (422, 20, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (421, 20, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (428, 21, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (427, 21, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (426, 21, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (433, 22, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (432, 22, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (431, 22, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (438, 25, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (437, 25, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (436, 25, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (443, 26, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (442, 26, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (441, 26, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (448, 27, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (447, 27, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (446, 27, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (453, 28, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (452, 28, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (451, 28, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (458, 31, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (457, 31, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (456, 31, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (463, 32, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (462, 32, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (461, 32, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (468, 33, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (467, 33, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (466, 33, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (473, 34, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (472, 34, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (471, 34, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (478, 98, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (477, 98, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (476, 98, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (503, 39, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (502, 39, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (498, 38, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (497, 38, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (496, 38, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (493, 37, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (492, 37, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (491, 37, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (488, 36, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (487, 36, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (486, 36, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (483, 35, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (482, 35, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (481, 35, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (83, 2, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (82, 2, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (81, 2, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (501, 39, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (508, 40, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (507, 40, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (506, 40, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (513, 41, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (512, 41, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (511, 41, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (518, 43, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (517, 43, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (516, 43, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (523, 44, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (522, 44, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (521, 44, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (528, 45, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (527, 45, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (526, 45, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (533, 47, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (532, 47, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (531, 47, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (538, 48, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (537, 48, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (536, 48, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (543, 49, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (542, 49, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (541, 49, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (548, 55, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (547, 55, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (546, 55, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (553, 56, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (552, 56, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (551, 56, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (558, 73, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (557, 73, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (556, 73, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (132, 1, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (380, 8, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (385, 9, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (390, 10, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (395, 11, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (400, 13, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (405, 14, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (410, 15, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (415, 17, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (420, 20, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (425, 21, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (430, 22, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (435, 25, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (440, 26, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (445, 27, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (450, 28, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (455, 31, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (460, 32, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (465, 33, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (470, 34, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (475, 98, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (213, 2, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (480, 35, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (485, 36, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (490, 37, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (495, 38, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (500, 39, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (505, 40, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (510, 41, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (515, 43, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (520, 44, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (525, 45, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (530, 47, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (535, 48, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (540, 49, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (545, 55, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (550, 56, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (555, 73, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (278, 1, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (379, 8, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (384, 9, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (389, 10, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (394, 11, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (399, 13, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (404, 14, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (409, 15, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (414, 17, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (419, 20, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (424, 21, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (429, 22, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (434, 25, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (439, 26, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (444, 27, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (449, 28, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (454, 31, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (459, 32, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (464, 33, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (469, 34, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (474, 98, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (479, 2, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (484, 35, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (489, 36, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (494, 37, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (499, 38, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (504, 39, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (509, 40, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (514, 41, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (519, 43, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (524, 44, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (529, 45, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (534, 47, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (539, 48, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (544, 49, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (549, 55, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (554, 56, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (559, 73, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (560, 3, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (561, 3, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (562, 3, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (563, 3, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (564, 3, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (565, 64, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (566, 64, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (567, 64, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (568, 64, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (569, 64, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (570, 63, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (571, 63, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (572, 63, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (573, 63, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (574, 63, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (575, 61, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (576, 61, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (577, 61, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (578, 61, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (579, 61, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (580, 62, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (581, 62, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (582, 62, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (583, 62, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (584, 62, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (585, 60, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (586, 60, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (587, 60, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (588, 60, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (589, 60, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (590, 59, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (591, 59, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (592, 59, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (593, 59, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (594, 59, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (595, 58, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (596, 58, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (597, 58, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (598, 58, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (599, 58, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (600, 57, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (601, 57, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (602, 57, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (603, 57, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (604, 57, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (605, 67, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (606, 67, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (607, 67, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (608, 67, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (609, 67, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (610, 65, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (611, 65, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (612, 65, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (613, 65, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (614, 65, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (615, 66, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (616, 66, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (617, 66, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (618, 66, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (619, 66, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (620, 5, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (621, 5, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (622, 5, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (623, 5, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (624, 5, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (625, 70, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (626, 70, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (627, 70, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (628, 70, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (629, 70, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (630, 71, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (631, 71, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (632, 71, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (633, 71, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (634, 71, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (635, 72, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (636, 72, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (637, 72, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (638, 72, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (639, 72, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (640, 74, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (641, 74, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (642, 74, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (643, 74, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (644, 74, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (645, 75, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (646, 75, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (647, 75, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (648, 75, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (649, 75, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (650, 76, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (651, 76, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (652, 76, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (653, 76, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (654, 76, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (655, 7, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (656, 7, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (657, 7, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (658, 7, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (659, 7, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (660, 86, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (661, 86, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (662, 86, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (663, 86, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (664, 86, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (665, 87, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (666, 87, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (667, 87, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (668, 87, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (669, 87, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (670, 88, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (671, 88, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (672, 88, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (673, 88, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (674, 88, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (675, 89, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (676, 89, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (677, 89, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (678, 89, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (679, 89, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (680, 90, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (681, 90, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (682, 90, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (683, 90, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (684, 90, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (685, 91, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (686, 91, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (687, 91, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (688, 91, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (689, 91, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (690, 92, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (691, 92, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (692, 92, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (693, 92, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (694, 92, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (695, 93, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (696, 93, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (697, 93, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (698, 93, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (699, 93, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (700, 94, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (701, 94, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (702, 94, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (703, 94, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (704, 94, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (705, 95, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (706, 95, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (707, 95, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (708, 95, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (709, 95, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (710, 96, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (711, 96, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (712, 96, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (713, 96, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (714, 96, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (715, 97, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (716, 97, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (717, 97, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (718, 97, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (719, 97, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (720, 99, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (721, 99, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (722, 99, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (723, 99, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (724, 99, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (725, 100, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (726, 100, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (727, 100, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (728, 100, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (729, 100, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (730, 101, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (731, 101, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (732, 101, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (733, 101, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (734, 101, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (735, 102, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (736, 102, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (737, 102, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (738, 102, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (739, 102, '保修', 5);
INSERT INTO `{P}_shop_prop` VALUES (740, 103, '型号', 1);
INSERT INTO `{P}_shop_prop` VALUES (741, 103, '颜色', 2);
INSERT INTO `{P}_shop_prop` VALUES (742, 103, '功率', 3);
INSERT INTO `{P}_shop_prop` VALUES (743, 103, '厂商', 4);
INSERT INTO `{P}_shop_prop` VALUES (744, 103, '保修', 5);


INSERT INTO `{P}_shop_yun` VALUES (1, '上海本地送货上门', '', 1, 30.00, '||||||1||||1||||', '||||||||', '', 0, 0.00, 1.00, '|4|10|11|12|13|', '上海本地送货上门,固定运费30元', 1);
INSERT INTO `{P}_shop_yun` VALUES (2, '中国邮政EMS', '国内', 0, 0.00, '0|500|20||||1|500|500|6|1||||', '||||||||', '', 0, 0.00, 1.00, '|1|2|3|4|10|11|12|13|5|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|', '中国邮政EMS国内除港澳台以外地区', 2);
INSERT INTO `{P}_shop_yun` VALUES (3, '中国邮政EMS', '港澳台', 0, 0.00, '|500|20||||1|500|500|150|1||||', '||||||||', '', 1, 1.00, 1.00, '', '', 3);


INSERT INTO `{P}_shop_yunzone` VALUES (1, 0, '北京市', 1);
INSERT INTO `{P}_shop_yunzone` VALUES (2, 1, '海淀区', 1);
INSERT INTO `{P}_shop_yunzone` VALUES (3, 1, '丰台区', 2);
INSERT INTO `{P}_shop_yunzone` VALUES (4, 0, '上海市', 2);
INSERT INTO `{P}_shop_yunzone` VALUES (5, 0, '浙江省', 3);
INSERT INTO `{P}_shop_yunzone` VALUES (14, 5, '杭州市', 1);
INSERT INTO `{P}_shop_yunzone` VALUES (15, 5, '宁波市', 2);
INSERT INTO `{P}_shop_yunzone` VALUES (16, 5, '温州市', 3);
INSERT INTO `{P}_shop_yunzone` VALUES (10, 4, '徐汇区', 1);
INSERT INTO `{P}_shop_yunzone` VALUES (11, 4, '静安区', 2);
INSERT INTO `{P}_shop_yunzone` VALUES (12, 4, '闵行区', 3);
INSERT INTO `{P}_shop_yunzone` VALUES (13, 4, '宝山区', 4);
INSERT INTO `{P}_shop_yunzone` VALUES (17, 5, '嘉兴市', 4);
INSERT INTO `{P}_shop_yunzone` VALUES (18, 5, '舟山市', 5);
INSERT INTO `{P}_shop_yunzone` VALUES (19, 5, '绍兴市', 6);
INSERT INTO `{P}_shop_yunzone` VALUES (20, 0, '江苏省', 7);
INSERT INTO `{P}_shop_yunzone` VALUES (21, 20, '南京市', 1);
INSERT INTO `{P}_shop_yunzone` VALUES (22, 20, '无锡市', 2);
INSERT INTO `{P}_shop_yunzone` VALUES (23, 20, '苏州市', 3);
INSERT INTO `{P}_shop_yunzone` VALUES (24, 20, '常州市', 4);
INSERT INTO `{P}_shop_yunzone` VALUES (25, 0, '广东省', 8);
INSERT INTO `{P}_shop_yunzone` VALUES (26, 25, '广州市', 1);
INSERT INTO `{P}_shop_yunzone` VALUES (27, 25, '深圳市', 2);
INSERT INTO `{P}_shop_yunzone` VALUES (28, 25, '中山市', 3);
