CREATE database bespeak;
use bespeak;
/*场馆预约表*/
DROP TABLE IF EXISTS `venue`;
CREATE TABLE `venue`(
	`id` MEDIUMINT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
	`createtime` DATE  NOT NULL comment '添加时间',
	`starttime` varchar(15)  NOT NULL DEFAULT '0' comment '开始时间',
	`endtime`varchar(10) NOT NULL DEFAULT '0',
	`coaches` varchar(20) NOT NULL comment '教练',
	`name` varchar(20) NOT NULL comment '客户名字',
	`phone`  varchar(15)  NOT NULL comment '手机号',
	`botton` int(2) not null default '1' comment '状态',
	 PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*周赛，季赛表*/
use bespeak;
DROP TABLE IF EXISTS `matchs`;
CREATE TABLE `matchs`(
 `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
 `groups` mediumint(6) unsigned NOT NULL DEFAULT '0' comment '分组',
 `subgroup` varchar(20) NOT NULL comment '组别',
 `name` varchar(20) NOT NULL comment '客户名字',
 `phone`  varchar(15)  NOT NULL comment '手机号',
 `createtime` date NOT NULL comment '添加时间',
 `botton` int(2) not null default '1' comment '状态',
  PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*管理员表*/
use bespeak;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(40) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

insert into admin values (1,'hanmeimei','hanmeimei','1531630636@qq.com');

/*教练表*/
use bespeak;
DROP TABLE IF EXISTS `coach`;
CREATE TABLE `coach`(
   `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL DEFAULT '' comment '教练名字',
	`picture`  varchar(100) NOT NULL DEFAULT '' comment '照片',
	`description` text NOT NULL comment '教练描述',
	PRIMARY KEY(`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*班级介绍列表*/
use bespeak;
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`(
   `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
    `status` tinyint(1) NOT NULL DEFAULT '1' comment '文章分类',
   `title` varchar(80) NOT NULL DEFAULT '',
   `description` text NOT NULL comment '文章描述',
	PRIMARY KEY(`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

use bespeak;
DROP TABLE IF EXISTS `culture`;
CREATE TABLE `culture`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`classroom`  varchar(15) NOT NULL comment '班级类型',
	`come_class` varchar(25) NOT NULL DEFAULT '' comment '上课时间',
	`name` varchar(20) NOT NULL DEFAULT '' comment '学员名字',
	`age` int(6) NOT NULL DEFAULT '1' comment '年龄',
	`parent` varchar(20) NOT NULL DEFAULT '' comment '家长名字',
	`phone`  varchar(15)  NOT NULL comment '手机号',
	`groups` int(5) NOT NULL  comment '分组，1为启蒙2为基础3为提高4为高级',
	`createtime` date NOT NULL comment '添加时间',
	`status` int(2) not null default '1' comment '状态',
	PRIMARY KEY(`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




