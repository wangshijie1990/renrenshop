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
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'id')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'weid')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `weid` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'quan_id')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `quan_id` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'advid')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `advid` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'mid')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `mid` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `openid` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'nickname')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `nickname` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'avatar')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `avatar` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'company_name')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `company_name` varchar(255) NOT NULL COMMENT '商家名称';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_type')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '卡券类型1:打折券，2:代金券，3礼品券(卡券模式)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_name')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_name` varchar(255) NOT NULL COMMENT '卡券名称(卡券模式)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_valid_date')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_valid_date` int(11) NOT NULL DEFAULT '0' COMMENT '卡券有效期(卡券模式)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_discount')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_discount` int(11) NOT NULL DEFAULT '0' COMMENT '卡券折扣(卡券模式:打折券)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_money')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_money` int(11) NOT NULL DEFAULT '0' COMMENT '代金券面值(卡券模式:代金券)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_gift')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_gift` varchar(255) NOT NULL COMMENT '礼品名称(卡券模式:礼品券)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_shoper')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_shoper` varchar(255) NOT NULL COMMENT '商家名称(卡券模式:礼品券)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_add')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_add` varchar(500) NOT NULL COMMENT '商家地址(卡券模式:礼品券)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_tel')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_tel` varchar(255) NOT NULL COMMENT '商家电话(卡券模式:礼品券)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_detail')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_detail` varchar(255) NOT NULL COMMENT '商家名称(卡券模式)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_rule')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_rule` text NOT NULL COMMENT '卡券使用规则(卡券模式)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_images')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_images` text NOT NULL COMMENT '卡券图片(卡券模式)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'couponc_miaosha')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `couponc_miaosha` varchar(255) NOT NULL COMMENT '秒杀商品(卡券模式:秒杀券)';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'create_time')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `create_time` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'update_time')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `update_time` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'status')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：未核销 1：核销通过 ';");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'status_time')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `status_time` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('cgc_ad_couponc')) {
	if(!pdo_fieldexists('cgc_ad_couponc',  'ip')) {
		pdo_query("ALTER TABLE ".tablename('cgc_ad_couponc')." ADD `ip` varchar(100) NOT NULL COMMENT 'ip';");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'id')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `uniacid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'acid')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `acid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'card_id')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `card_id` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'type')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `type` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'logo_url')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `logo_url` varchar(150) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'code_type')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `code_type` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'brand_name')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `brand_name` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'title')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `title` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'sub_title')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `sub_title` varchar(20) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'color')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `color` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'notice')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `notice` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'description')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `description` varchar(1000) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'date_info')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `date_info` varchar(200) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'quantity')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `quantity` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'use_custom_code')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `use_custom_code` tinyint(3) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'bind_openid')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `bind_openid` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'can_share')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `can_share` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'can_give_friend')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `can_give_friend` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'get_limit')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `get_limit` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'service_phone')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `service_phone` varchar(20) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'extra')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `extra` varchar(1000) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'status')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `status` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'is_display')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `is_display` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'is_selfconsume')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `is_selfconsume` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'promotion_url_name')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `promotion_url_name` varchar(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'promotion_url')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `promotion_url` varchar(100) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'promotion_url_sub_title')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `promotion_url_sub_title` varchar(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'source')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `source` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon')) {
	if(!pdo_fieldexists('coupon',  'dosage')) {
		pdo_query("ALTER TABLE ".tablename('coupon')." ADD `dosage` int(10) unsigned;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `uniacid` int(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'msg_id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `msg_id` int(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'status')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `status` int(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'title')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `title` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'type')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `type` int(3) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'thumb')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `thumb` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'coupons')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `coupons` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'description')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `description` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_activity')) {
	if(!pdo_fieldexists('coupon_activity',  'members')) {
		pdo_query("ALTER TABLE ".tablename('coupon_activity')." ADD `members` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_groups')) {
	if(!pdo_fieldexists('coupon_groups',  'id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('coupon_groups')) {
	if(!pdo_fieldexists('coupon_groups',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `uniacid` int(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_groups')) {
	if(!pdo_fieldexists('coupon_groups',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `couponid` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_groups')) {
	if(!pdo_fieldexists('coupon_groups',  'groupid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_groups')." ADD `groupid` int(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `uniacid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'acid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `acid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'sid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `sid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'location_id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `location_id` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'business_name')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `business_name` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'branch_name')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `branch_name` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'category')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `category` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'province')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `province` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'city')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `city` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'district')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `district` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'address')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `address` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'longitude')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `longitude` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'latitude')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `latitude` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'telephone')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `telephone` varchar(20) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'photo_list')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `photo_list` varchar(10000) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'avg_price')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `avg_price` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'open_time')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `open_time` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'recommend')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `recommend` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'special')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `special` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'introduction')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `introduction` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'offset_type')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `offset_type` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'status')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `status` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_location')) {
	if(!pdo_fieldexists('coupon_location',  'message')) {
		pdo_query("ALTER TABLE ".tablename('coupon_location')." ADD `message` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_modules')) {
	if(!pdo_fieldexists('coupon_modules',  'id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('coupon_modules')) {
	if(!pdo_fieldexists('coupon_modules',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `uniacid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_modules')) {
	if(!pdo_fieldexists('coupon_modules',  'acid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `acid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_modules')) {
	if(!pdo_fieldexists('coupon_modules',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `couponid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_modules')) {
	if(!pdo_fieldexists('coupon_modules',  'module')) {
		pdo_query("ALTER TABLE ".tablename('coupon_modules')." ADD `module` varchar(30) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `uniacid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'acid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `acid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'card_id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `card_id` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `openid` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'friend_openid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `friend_openid` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'givebyfriend')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `givebyfriend` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'code')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `code` varchar(50) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'hash')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `hash` varchar(32) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'addtime')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `addtime` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'usetime')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `usetime` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'status')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `status` tinyint(3) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'clerk_name')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `clerk_name` varchar(15) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'clerk_id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `clerk_id` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'store_id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `store_id` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'clerk_type')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `clerk_type` tinyint(3) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `couponid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'uid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `uid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'grantmodule')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `grantmodule` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_record')) {
	if(!pdo_fieldexists('coupon_record',  'remark')) {
		pdo_query("ALTER TABLE ".tablename('coupon_record')." ADD `remark` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_store')) {
	if(!pdo_fieldexists('coupon_store',  'id')) {
		pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `id` int(10) unsigned NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('coupon_store')) {
	if(!pdo_fieldexists('coupon_store',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `uniacid` int(10) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_store')) {
	if(!pdo_fieldexists('coupon_store',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `couponid` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('coupon_store')) {
	if(!pdo_fieldexists('coupon_store',  'storeid')) {
		pdo_query("ALTER TABLE ".tablename('coupon_store')." ADD `storeid` int(10) unsigned NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `uniacid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'catid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `catid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'couponname')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `couponname` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'gettype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `gettype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'getmax')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `getmax` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'usetype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `usetype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'returntype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `returntype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'bgcolor')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `bgcolor` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'enough')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `enough` decimal(10,2) DEFAULT '0.00';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'timelimit')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `timelimit` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'coupontype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `coupontype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'timedays')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `timedays` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'timestart')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `timestart` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'timeend')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `timeend` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'discount')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `discount` decimal(10,2) DEFAULT '0.00';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'deduct')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `deduct` decimal(10,2) DEFAULT '0.00';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'backtype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `backtype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'backmoney')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `backmoney` varchar(50);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'backcredit')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `backcredit` varchar(50);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'backredpack')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `backredpack` varchar(50);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'backwhen')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `backwhen` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'thumb')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `thumb` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'desc')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `desc` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'createtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `createtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'total')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `total` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'status')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `status` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'money')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `money` decimal(10,2) DEFAULT '0.00';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'respdesc')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `respdesc` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'respthumb')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `respthumb` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'resptitle')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `resptitle` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'respurl')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `respurl` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'credit')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `credit` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'usecredit2')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `usecredit2` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'remark')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `remark` varchar(1000);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'descnoset')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `descnoset` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdkey')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdkey` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdsuc')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdsuc` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdfail')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdfail` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdurl')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdurl` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdask')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdask` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdstatus')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdstatus` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdtimes')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdtimes` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdfull')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdfull` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdwords')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdwords` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdopen')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdopen` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdown')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdown` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdexit')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdexit` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdexitstr')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdexitstr` text;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'displayorder')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `displayorder` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'pwdkey2')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `pwdkey2` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'merchid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `merchid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitgoodtype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitgoodtype` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitgoodcatetype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitgoodcatetype` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitgoodcateids')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitgoodcateids` varchar(500);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitgoodids')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitgoodids` varchar(500);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'islimitlevel')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `islimitlevel` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitmemberlevels')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitmemberlevels` varchar(500);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitagentlevels')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitagentlevels` varchar(500);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitpartnerlevels')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitpartnerlevels` varchar(500);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitaagentlevels')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitaagentlevels` varchar(500);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'tagtitle')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `tagtitle` varchar(20);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'settitlecolor')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `settitlecolor` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'titlecolor')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `titlecolor` varchar(10);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'limitdiscounttype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `limitdiscounttype` tinyint(1) DEFAULT '1';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon')) {
	if(!pdo_fieldexists('ewei_shop_coupon',  'quickget')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." ADD `quickget` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_category')) {
	if(!pdo_fieldexists('ewei_shop_coupon_category',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_category')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_category')) {
	if(!pdo_fieldexists('ewei_shop_coupon_category',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_category')." ADD `uniacid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_category')) {
	if(!pdo_fieldexists('ewei_shop_coupon_category',  'name')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_category')." ADD `name` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_category')) {
	if(!pdo_fieldexists('ewei_shop_coupon_category',  'displayorder')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_category')." ADD `displayorder` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_category')) {
	if(!pdo_fieldexists('ewei_shop_coupon_category',  'status')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_category')." ADD `status` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_category')) {
	if(!pdo_fieldexists('ewei_shop_coupon_category',  'merchid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_category')." ADD `merchid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `uniacid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `openid` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'gettype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `gettype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'used')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `used` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'usetime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `usetime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'gettime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `gettime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'senduid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `senduid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'ordersn')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `ordersn` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'back')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `back` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'backtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `backtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'merchid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `merchid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'isnew')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `isnew` tinyint(1) DEFAULT '1';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'nocount')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `nocount` tinyint(1) DEFAULT '1';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'shareident')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `shareident` varchar(50);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_coupon_data',  'textkey')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." ADD `textkey` int(11);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `uniacid` int(11);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'goodsid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `goodsid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'starttime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `starttime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'endtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `endtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'sendnum')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `sendnum` int(11) DEFAULT '1';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'num')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `num` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'sendpoint')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `sendpoint` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_goodsendtask')) {
	if(!pdo_fieldexists('ewei_shop_coupon_goodsendtask',  'status')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_goodsendtask')." ADD `status` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `uniacid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `openid` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'times')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `times` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'pwdkey')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `pwdkey` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'ok')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `ok` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_guess')) {
	if(!pdo_fieldexists('ewei_shop_coupon_guess',  'merchid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_guess')." ADD `merchid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `uniacid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'logno')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `logno` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `openid` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'status')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `status` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'paystatus')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `paystatus` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'creditstatus')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `creditstatus` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'createtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `createtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'paytype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `paytype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'getfrom')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `getfrom` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_log')) {
	if(!pdo_fieldexists('ewei_shop_coupon_log',  'merchid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_log')." ADD `merchid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_record')) {
	if(!pdo_fieldexists('ewei_shop_coupon_record',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_record')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_record')) {
	if(!pdo_fieldexists('ewei_shop_coupon_record',  'coupon_id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_record')." ADD `coupon_id` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_record')) {
	if(!pdo_fieldexists('ewei_shop_coupon_record',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_record')." ADD `openid` varchar(60) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_record')) {
	if(!pdo_fieldexists('ewei_shop_coupon_record',  'mid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_record')." ADD `mid` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_record')) {
	if(!pdo_fieldexists('ewei_shop_coupon_record',  'record_id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_record')." ADD `record_id` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_record')) {
	if(!pdo_fieldexists('ewei_shop_coupon_record',  'add_time')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_record')." ADD `add_time` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendshow')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendshow',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendshow')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendshow')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendshow',  'showkey')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendshow')." ADD `showkey` varchar(20) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendshow')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendshow',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendshow')." ADD `uniacid` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendshow')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendshow',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendshow')." ADD `openid` varchar(255) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendshow')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendshow',  'coupondataid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendshow')." ADD `coupondataid` int(11) NOT NULL;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `uniacid` int(11);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'enough')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `enough` decimal(10,2) DEFAULT '0.00';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'starttime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `starttime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'endtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `endtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'sendnum')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `sendnum` int(11) DEFAULT '1';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'num')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `num` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'sendpoint')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `sendpoint` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_sendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_sendtasks',  'status')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_sendtasks')." ADD `status` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `uniacid` int(11);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `openid` varchar(50);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'taskid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `taskid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'sendnum')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `sendnum` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'tasktype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `tasktype` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'orderid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `orderid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'parentorderid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `parentorderid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'createtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `createtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'status')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `status` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_taskdata')) {
	if(!pdo_fieldexists('ewei_shop_coupon_taskdata',  'sendpoint')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_taskdata')." ADD `sendpoint` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `uniacid` int(11);");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'usecouponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `usecouponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'starttime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `starttime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'endtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `endtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'sendnum')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `sendnum` int(11) DEFAULT '1';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'num')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `num` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_coupon_usesendtasks')) {
	if(!pdo_fieldexists('ewei_shop_coupon_usesendtasks',  'status')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_usesendtasks')." ADD `status` tinyint(1) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_live_coupon')) {
	if(!pdo_fieldexists('ewei_shop_live_coupon',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_live_coupon')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_live_coupon')) {
	if(!pdo_fieldexists('ewei_shop_live_coupon',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_live_coupon')." ADD `uniacid` int(11) NOT NULL DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_live_coupon')) {
	if(!pdo_fieldexists('ewei_shop_live_coupon',  'roomid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_live_coupon')." ADD `roomid` int(11) NOT NULL DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_live_coupon')) {
	if(!pdo_fieldexists('ewei_shop_live_coupon',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_live_coupon')." ADD `couponid` int(11) NOT NULL DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_live_coupon')) {
	if(!pdo_fieldexists('ewei_shop_live_coupon',  'coupontotal')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_live_coupon')." ADD `coupontotal` int(11) NOT NULL DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_live_coupon')) {
	if(!pdo_fieldexists('ewei_shop_live_coupon',  'couponlimit')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_live_coupon')." ADD `couponlimit` int(11) NOT NULL DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `uniacid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'name')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `name` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'type')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `type` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'ckey')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `ckey` decimal(10,2) DEFAULT '0.00';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'cvalue')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `cvalue` decimal(10,2) DEFAULT '0.00';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'nums')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `nums` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon',  'createtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon')." ADD `createtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'id')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `id` int(11) NOT NULL AUTO_INCREMENT;");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'uniacid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `uniacid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'openid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `openid` varchar(255);");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'couponid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `couponid` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'gettime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `gettime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'gettype')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `gettype` tinyint(3) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'usedtime')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `usedtime` int(11) DEFAULT '0';");
	}	
}
if(pdo_tableexists('ewei_shop_sale_coupon_data')) {
	if(!pdo_fieldexists('ewei_shop_sale_coupon_data',  'orderid')) {
		pdo_query("ALTER TABLE ".tablename('ewei_shop_sale_coupon_data')." ADD `orderid` int(11) DEFAULT '0';");
	}	
}
