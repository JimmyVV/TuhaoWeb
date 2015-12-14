/*!用户注册表*/
CREATE TABLE `tuhao_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `token` varchar(50) NOT NULL,
  `token_exptime` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `auto_token` varchar(50) NOT NULL DEFAULT '0',
  `reg_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*!用户信息详情表*/
CREATE TABLE `tuhao_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sex` enum('男','女') NOT NULL DEFAULT '男',
  `college` varchar(30) NOT NULL,
  `enroll_year` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `head_photo` varchar(50),
  `levell` int(2) NOT NULL,
  `score` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*!物品信息表*/
CREATE TABLE `tuhao_pro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) NOT NULL,
  `parent_cate` varchar(30)  NOT NULL,
  `son_cate` varchar(30),
  `contact` varchar(40) NOT NULL,
  `pro_desc` text,
  `desire` text,
  `username` varchar(20) NOT NULL,
  `hot` int(10) NOT NULL,
  `receiver` varchar(20),
  `is_send` int(2),
  `reg_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*!图片表*/
CREATE TABLE `tuhao_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `album_path` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `tuhao_comm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `sender_id` int(11)  NOT NULL,
  `receiver_id` int(11),
  `content` varchar(100) NOT NULL,
  `status` int(2) unsigned NOT NULL,
  `reg_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

