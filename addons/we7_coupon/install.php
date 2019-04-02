<?php
pdo_query("CREATE TABLE IF NOT EXISTS `` (
) ENGINE= DEFAULT CHARSET=;

CREATE TABLE IF NOT EXISTS `` (
) ENGINE= DEFAULT CHARSET=;

CREATE TABLE IF NOT EXISTS `` (
) ENGINE= DEFAULT CHARSET=;

CREATE TABLE IF NOT EXISTS `ims_cgc_ad_couponc` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`weid` int(11) NOT NULL,
`quan_id` int(11) NOT NULL,
`advid` int(11) NOT NULL,
`mid` int(11) NOT NULL,
`openid` varchar(50) NOT NULL,
`nickname` varchar(255) NOT NULL,
`avatar` varchar(255) NOT NULL,
`company_name` varchar(255) NOT NULL COMMENT '商家名称',
`couponc_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '卡券类型1:打折券，2:代金券，3礼品券(卡券模式)',
`couponc_name` varchar(255) NOT NULL COMMENT '卡券名称(卡券模式)',
`couponc_valid_date` int(11) NOT NULL DEFAULT '0' COMMENT '卡券有效期(卡券模式)',
`couponc_discount` int(11) NOT NULL DEFAULT '0' COMMENT '卡券折扣(卡券模式:打折券)',
`couponc_money` int(11) NOT NULL DEFAULT '0' COMMENT '代金券面值(卡券模式:代金券)',
`couponc_gift` varchar(255) NOT NULL COMMENT '礼品名称(卡券模式:礼品券)',
`couponc_shoper` varchar(255) NOT NULL COMMENT '商家名称(卡券模式:礼品券)',
`couponc_add` varchar(500) NOT NULL COMMENT '商家地址(卡券模式:礼品券)',
`couponc_tel` varchar(255) NOT NULL COMMENT '商家电话(卡券模式:礼品券)',
`couponc_detail` varchar(255) NOT NULL COMMENT '商家名称(卡券模式)',
`couponc_rule` text NOT NULL COMMENT '卡券使用规则(卡券模式)',
`couponc_images` text NOT NULL COMMENT '卡券图片(卡券模式)',
`couponc_miaosha` varchar(255) NOT NULL COMMENT '秒杀商品(卡券模式:秒杀券)',
`create_time` int(11) NOT NULL,
`update_time` int(11) NOT NULL,
`status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：未核销 1：核销通过 ',
`status_time` int(11) NOT NULL,
`ip` varchar(100) NOT NULL COMMENT 'ip',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_coupon` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) unsigned NOT NULL,
`acid` int(10) unsigned NOT NULL,
`card_id` varchar(50) NOT NULL,
`type` varchar(15) NOT NULL,
`logo_url` varchar(150) NOT NULL,
`code_type` tinyint(3) unsigned NOT NULL,
`brand_name` varchar(15) NOT NULL,
`title` varchar(15) NOT NULL,
`sub_title` varchar(20) NOT NULL,
`color` varchar(15) NOT NULL,
`notice` varchar(15) NOT NULL,
`description` varchar(1000) NOT NULL,
`date_info` varchar(200) NOT NULL,
`quantity` int(10) unsigned NOT NULL,
`use_custom_code` tinyint(3) NOT NULL,
`bind_openid` tinyint(3) unsigned NOT NULL,
`can_share` tinyint(3) unsigned NOT NULL,
`can_give_friend` tinyint(3) unsigned NOT NULL,
`get_limit` tinyint(3) unsigned NOT NULL,
`service_phone` varchar(20) NOT NULL,
`extra` varchar(1000) NOT NULL,
`status` tinyint(3) unsigned NOT NULL,
`is_display` tinyint(3) unsigned NOT NULL,
`is_selfconsume` tinyint(3) unsigned NOT NULL,
`promotion_url_name` varchar(10) NOT NULL,
`promotion_url` varchar(100) NOT NULL,
`promotion_url_sub_title` varchar(10) NOT NULL,
`source` tinyint(3) unsigned NOT NULL,
`dosage` int(10) unsigned,
PRIMARY KEY (`id`),
KEY `uniacid` (`uniacid`,`acid`),
KEY `card_id` (`card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_coupon_activity` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) NOT NULL,
`msg_id` int(10) NOT NULL,
`status` int(10) NOT NULL,
`title` varchar(255) NOT NULL,
`type` int(3) NOT NULL,
`thumb` varchar(255) NOT NULL,
`coupons` varchar(255) NOT NULL,
`description` varchar(255) NOT NULL,
`members` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_coupon_groups` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) NOT NULL,
`couponid` varchar(255) NOT NULL,
`groupid` int(10) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_coupon_location` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) unsigned NOT NULL,
`acid` int(10) unsigned NOT NULL,
`sid` int(10) unsigned NOT NULL,
`location_id` int(10) unsigned NOT NULL,
`business_name` varchar(50) NOT NULL,
`branch_name` varchar(50) NOT NULL,
`category` varchar(255) NOT NULL,
`province` varchar(15) NOT NULL,
`city` varchar(15) NOT NULL,
`district` varchar(15) NOT NULL,
`address` varchar(50) NOT NULL,
`longitude` varchar(15) NOT NULL,
`latitude` varchar(15) NOT NULL,
`telephone` varchar(20) NOT NULL,
`photo_list` varchar(10000) NOT NULL,
`avg_price` int(10) unsigned NOT NULL,
`open_time` varchar(50) NOT NULL,
`recommend` varchar(255) NOT NULL,
`special` varchar(255) NOT NULL,
`introduction` varchar(255) NOT NULL,
`offset_type` tinyint(3) unsigned NOT NULL,
`status` tinyint(3) unsigned NOT NULL,
`message` varchar(255) NOT NULL,
PRIMARY KEY (`id`),
KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_coupon_modules` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) unsigned NOT NULL,
`acid` int(10) unsigned NOT NULL,
`couponid` int(10) unsigned NOT NULL,
`module` varchar(30) NOT NULL,
PRIMARY KEY (`id`),
KEY `cid` (`couponid`),
KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_coupon_record` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) unsigned NOT NULL,
`acid` int(10) unsigned NOT NULL,
`card_id` varchar(50) NOT NULL,
`openid` varchar(50) NOT NULL,
`friend_openid` varchar(50) NOT NULL,
`givebyfriend` tinyint(3) unsigned NOT NULL,
`code` varchar(50) NOT NULL,
`hash` varchar(32) NOT NULL,
`addtime` int(10) unsigned NOT NULL,
`usetime` int(10) unsigned NOT NULL,
`status` tinyint(3) NOT NULL,
`clerk_name` varchar(15) NOT NULL,
`clerk_id` int(10) unsigned NOT NULL,
`store_id` int(10) unsigned NOT NULL,
`clerk_type` tinyint(3) unsigned NOT NULL,
`couponid` int(10) unsigned NOT NULL,
`uid` int(10) unsigned NOT NULL,
`grantmodule` varchar(255) NOT NULL,
`remark` varchar(255) NOT NULL,
PRIMARY KEY (`id`),
KEY `uniacid` (`uniacid`,`acid`),
KEY `card_id` (`card_id`),
KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_coupon_store` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) NOT NULL,
`couponid` varchar(255) NOT NULL,
`storeid` int(10) unsigned NOT NULL,
PRIMARY KEY (`id`),
KEY `couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) DEFAULT '0',
`catid` int(11) DEFAULT '0',
`couponname` varchar(255),
`gettype` tinyint(3) DEFAULT '0',
`getmax` int(11) DEFAULT '0',
`usetype` tinyint(3) DEFAULT '0',
`returntype` tinyint(3) DEFAULT '0',
`bgcolor` varchar(255),
`enough` decimal(10,2) DEFAULT '0.00',
`timelimit` tinyint(3) DEFAULT '0',
`coupontype` tinyint(3) DEFAULT '0',
`timedays` int(11) DEFAULT '0',
`timestart` int(11) DEFAULT '0',
`timeend` int(11) DEFAULT '0',
`discount` decimal(10,2) DEFAULT '0.00',
`deduct` decimal(10,2) DEFAULT '0.00',
`backtype` tinyint(3) DEFAULT '0',
`backmoney` varchar(50),
`backcredit` varchar(50),
`backredpack` varchar(50),
`backwhen` tinyint(3) DEFAULT '0',
`thumb` varchar(255),
`desc` text,
`createtime` int(11) DEFAULT '0',
`total` int(11) DEFAULT '0',
`status` tinyint(3) DEFAULT '0',
`money` decimal(10,2) DEFAULT '0.00',
`respdesc` text,
`respthumb` varchar(255),
`resptitle` varchar(255),
`respurl` varchar(255),
`credit` int(11) DEFAULT '0',
`usecredit2` tinyint(3) DEFAULT '0',
`remark` varchar(1000),
`descnoset` tinyint(3) DEFAULT '0',
`pwdkey` varchar(255),
`pwdsuc` text,
`pwdfail` text,
`pwdurl` varchar(255),
`pwdask` text,
`pwdstatus` tinyint(3) DEFAULT '0',
`pwdtimes` int(11) DEFAULT '0',
`pwdfull` text,
`pwdwords` text,
`pwdopen` tinyint(3) DEFAULT '0',
`pwdown` text,
`pwdexit` varchar(255),
`pwdexitstr` text,
`displayorder` int(11) DEFAULT '0',
`pwdkey2` varchar(255),
`merchid` int(11) DEFAULT '0',
`limitgoodtype` tinyint(1) DEFAULT '0',
`limitgoodcatetype` tinyint(1) DEFAULT '0',
`limitgoodcateids` varchar(500),
`limitgoodids` varchar(500),
`islimitlevel` tinyint(1) DEFAULT '0',
`limitmemberlevels` varchar(500),
`limitagentlevels` varchar(500),
`limitpartnerlevels` varchar(500),
`limitaagentlevels` varchar(500),
`tagtitle` varchar(20),
`settitlecolor` tinyint(1) DEFAULT '0',
`titlecolor` varchar(10),
`limitdiscounttype` tinyint(1) DEFAULT '1',
`quickget` tinyint(1) DEFAULT '0',
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_coupontype` (`coupontype`),
KEY `idx_timestart` (`timestart`),
KEY `idx_timeend` (`timeend`),
KEY `idx_timelimit` (`timelimit`),
KEY `idx_status` (`status`),
KEY `idx_givetype` (`backtype`),
KEY `idx_catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_category` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) DEFAULT '0',
`name` varchar(255),
`displayorder` int(11) DEFAULT '0',
`status` int(11) DEFAULT '0',
`merchid` int(11) DEFAULT '0',
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_displayorder` (`displayorder`),
KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_data` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) DEFAULT '0',
`openid` varchar(255),
`couponid` int(11) DEFAULT '0',
`gettype` tinyint(3) DEFAULT '0',
`used` int(11) DEFAULT '0',
`usetime` int(11) DEFAULT '0',
`gettime` int(11) DEFAULT '0',
`senduid` int(11) DEFAULT '0',
`ordersn` varchar(255),
`back` tinyint(3) DEFAULT '0',
`backtime` int(11) DEFAULT '0',
`merchid` int(11) DEFAULT '0',
`isnew` tinyint(1) DEFAULT '1',
`nocount` tinyint(1) DEFAULT '1',
`shareident` varchar(50),
`textkey` int(11),
PRIMARY KEY (`id`),
KEY `idx_couponid` (`couponid`),
KEY `idx_gettype` (`gettype`),
KEY `idx_used` (`used`),
KEY `idx_gettime` (`gettime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_goodsendtask` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`goodsid` int(11) DEFAULT '0',
`couponid` int(11) DEFAULT '0',
`starttime` int(11) DEFAULT '0',
`endtime` int(11) DEFAULT '0',
`sendnum` int(11) DEFAULT '1',
`num` int(11) DEFAULT '0',
`sendpoint` tinyint(1) DEFAULT '0',
`status` tinyint(1) DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_guess` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) DEFAULT '0',
`couponid` int(11) DEFAULT '0',
`openid` varchar(255),
`times` int(11) DEFAULT '0',
`pwdkey` varchar(255),
`ok` tinyint(3) DEFAULT '0',
`merchid` int(11) DEFAULT '0',
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_log` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) DEFAULT '0',
`logno` varchar(255),
`openid` varchar(255),
`couponid` int(11) DEFAULT '0',
`status` int(11) DEFAULT '0',
`paystatus` tinyint(3) DEFAULT '0',
`creditstatus` tinyint(3) DEFAULT '0',
`createtime` int(11) DEFAULT '0',
`paytype` tinyint(3) DEFAULT '0',
`getfrom` tinyint(3) DEFAULT '0',
`merchid` int(11) DEFAULT '0',
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_couponid` (`couponid`),
KEY `idx_status` (`status`),
KEY `idx_paystatus` (`paystatus`),
KEY `idx_createtime` (`createtime`),
KEY `idx_getfrom` (`getfrom`),
KEY `idx_logno` (`logno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_record` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`coupon_id` int(11) NOT NULL,
`openid` varchar(60) NOT NULL,
`mid` int(11) NOT NULL,
`record_id` int(11) NOT NULL,
`add_time` int(11) NOT NULL,
PRIMARY KEY (`id`),
KEY `coupon_id` (`coupon_id`),
KEY `coupon_id_2` (`coupon_id`),
KEY `record_id` (`record_id`),
KEY `add_time` (`add_time`),
KEY `openid` (`openid`),
KEY `openid_2` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_sendshow` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`showkey` varchar(20) NOT NULL,
`uniacid` int(11) NOT NULL,
`openid` varchar(255) NOT NULL,
`coupondataid` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_sendtasks` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`enough` decimal(10,2) DEFAULT '0.00',
`couponid` int(11) DEFAULT '0',
`starttime` int(11) DEFAULT '0',
`endtime` int(11) DEFAULT '0',
`sendnum` int(11) DEFAULT '1',
`num` int(11) DEFAULT '0',
`sendpoint` tinyint(1) DEFAULT '0',
`status` tinyint(1) DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_taskdata` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`openid` varchar(50),
`taskid` int(11) DEFAULT '0',
`couponid` int(11) DEFAULT '0',
`sendnum` int(11) DEFAULT '0',
`tasktype` tinyint(1) DEFAULT '0',
`orderid` int(11) DEFAULT '0',
`parentorderid` int(11) DEFAULT '0',
`createtime` int(11) DEFAULT '0',
`status` tinyint(1) DEFAULT '0',
`sendpoint` tinyint(1) DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_usesendtasks` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`usecouponid` int(11) DEFAULT '0',
`couponid` int(11) DEFAULT '0',
`starttime` int(11) DEFAULT '0',
`endtime` int(11) DEFAULT '0',
`sendnum` int(11) DEFAULT '1',
`num` int(11) DEFAULT '0',
`status` tinyint(1) DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_coupon` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL DEFAULT '0',
`roomid` int(11) NOT NULL DEFAULT '0',
`couponid` int(11) NOT NULL DEFAULT '0',
`coupontotal` int(11) NOT NULL DEFAULT '0',
`couponlimit` int(11) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_roomid` (`roomid`),
KEY `idx_couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sale_coupon` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) DEFAULT '0',
`name` varchar(255),
`type` tinyint(3) DEFAULT '0',
`ckey` decimal(10,2) DEFAULT '0.00',
`cvalue` decimal(10,2) DEFAULT '0.00',
`nums` int(11) DEFAULT '0',
`createtime` int(11) DEFAULT '0',
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sale_coupon_data` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11) DEFAULT '0',
`openid` varchar(255),
`couponid` int(11) DEFAULT '0',
`gettime` int(11) DEFAULT '0',
`gettype` tinyint(3) DEFAULT '0',
`usedtime` int(11) DEFAULT '0',
`orderid` int(11) DEFAULT '0',
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_couponid` (`couponid`),
KEY `idx_gettime` (`gettime`),
KEY `idx_gettype` (`gettype`),
KEY `idx_usedtime` (`usedtime`),
KEY `idx_orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");
