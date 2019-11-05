/*
 Navicat Premium Data Transfer

 Source Server         : 3306
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost:3306
 Source Schema         : retail

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : 65001

 Date: 05/11/2019 10:31:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for r_admin
-- ----------------------------
DROP TABLE IF EXISTS `r_admin`;
CREATE TABLE `r_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL DEFAULT '' COMMENT '账号',
  `pwd` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `money_pwd` varchar(255) NOT NULL DEFAULT '' COMMENT '取款密码',
  `real_name` varchar(255) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `phone` varchar(255) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `qq` varchar(255) NOT NULL DEFAULT '' COMMENT 'qq',
  `wechat` varchar(255) NOT NULL DEFAULT '' COMMENT '微信',
  `login_ip` varchar(255) NOT NULL DEFAULT '' COMMENT '登录ip',
  `login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `position_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '职位id',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 1正常 2 停用',
  `examine_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '审核状态 1未审核 2通过 3不通过',
  `is_delete` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否删除 1是2否',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建人',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改人',
  `up_agent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级代理',
  `down_agent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '下级代理',
  `domain` varchar(255) NOT NULL DEFAULT '' COMMENT '域名',
  `create_ip` varchar(255) NOT NULL DEFAULT '' COMMENT '注册ip',
  `bank_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '银行卡号',
  `agent_level` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '代理级别',
  `stop_login_start` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '禁止登陆时间开始',
  `stop_login_end` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '禁止登陆时间结束',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of r_admin
-- ----------------------------
BEGIN;
INSERT INTO `r_admin` VALUES (1, 'agent_1', 'MTIzNDU2', '', '代理1', '123', '123', '123', '23', '172.19.0.1', 1558362723, 3, 1, 2, 2, 0, 1558362723, 14, 15, 0, 0, 'www.baidu.com	', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (2, 'agent_2', 'MTIzNDU2', '', '代理2', '18878786553', '234', '3', '3', '172.19.0.1', 1557575289, 3, 1, 2, 2, 1557142913, 1558187397, 14, 19, 1, 0, 'www.qq.com', '172.19.0.1', '0', 2, 0, 0);
INSERT INTO `r_admin` VALUES (3, 'agent_3', 'MTIzNDU2', '', '代理3', '18878786553', '234', '3', '3', '', 0, 3, 1, 2, 2, 1557143257, 1558187418, 0, 19, 1, 0, '', '172.19.0.1', '0', 2, 1553529600, 1559232000);
INSERT INTO `r_admin` VALUES (4, 'agent_4', 'MTIzNDU2', '', '代理4', '18878786553', '234', '3', '3', '', 0, 3, 1, 2, 2, 1557143380, 1557143465, 0, 1, 1, 0, '', '172.19.0.1', '0', 2, 0, 0);
INSERT INTO `r_admin` VALUES (5, 'agent_5', 'MTIzNDU2', 'MTIzNDU2', '代理5', '18878786553', '', '6786867867867', '', '', 0, 3, 1, 2, 2, 1557668232, 0, 0, 0, 2, 0, '', '172.19.0.1', '0', 3, 0, 0);
INSERT INTO `r_admin` VALUES (6, 'agent_6', 'MTIzNDU2', '', '代理6', '18877778888', '', '', '', '172.19.0.1', 1558358994, 3, 1, 2, 2, 0, 1558358994, 0, 0, 2, 0, '', '172.19.0.1', '0', 3, 0, 0);
INSERT INTO `r_admin` VALUES (7, 'agent_7', 'MTIzNDU2', 'MTIzNDU2', '代理7', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 2, 0, '', '172.19.0.1', '0', 3, 0, 0);
INSERT INTO `r_admin` VALUES (8, 'agent_8', 'MTIzNDU2', 'MTIzNDU2', '代理8', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 0, 0, '', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (9, 'agent_9', 'MTIzNDU2', 'MTIzNDU2', '代理9', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 0, 0, '', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (10, 'agent_10', 'MTIzNDU2', 'MTIzNDU2', '代理10', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 0, 0, '', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (11, 'agent_11', 'MTIzNDU2', 'MTIzNDU2', '代理11', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 0, 0, '', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (12, 'agent_12', 'MTIzNDU2', 'MTIzNDU2', '代理12', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 0, 0, '', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (13, 'agent_13', 'MTIzNDU2', 'MTIzNDU2', '未审核代理13', '19988877722', '', '', '', '', 0, 3, 1, 1, 2, 1558354853, 1558355945, 0, 19, 15, 0, '', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (14, 'agent_14', 'MTIzNDU2', 'MTIzNDU2', '二级代理14', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 12, 0, '', '172.19.0.1', '0', 2, 0, 0);
INSERT INTO `r_admin` VALUES (15, 'agent_15', 'MTIzNDU2', 'MTIzNDU2', '二级代理15', '19988877722', '', '', '', '', 0, 3, 1, 2, 2, 1558354853, 1558355945, 0, 19, 12, 0, '', '172.19.0.1', '0', 2, 0, 0);
INSERT INTO `r_admin` VALUES (16, 'agent_16', 'MTIzNDU2', 'MTIzNDU2', '三级代理16', '19988877722', '', '123', '33', '', 0, 3, 1, 2, 2, 1558354853, 1561450236, 0, 100, 0, 0, '', '172.19.0.1', '0', 3, 0, 0);
INSERT INTO `r_admin` VALUES (27, 'customer1', 'MTIzNDU2', 'MTIzNDU2', '客服1', '18878786553', '22333', '', '222', '127.0.0.1', 1572260148, 4, 1, 2, 2, 0, 1572260148, 0, 100, 0, 0, '', '', '0', 1, 1551801600, 1551888000);
INSERT INTO `r_admin` VALUES (28, 'director1', 'MTIzNDU2', '', '主管1', '18878786553', '', '', '', '', 0, 5, 1, 2, 2, 0, 0, 0, 0, 0, 0, '', '', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (100, 'admin1', 'MTIzNDU2', '', '管理员1', '18878786553', '444@qq.com', '4444', '555', '127.0.0.1', 1572870185, 1, 1, 2, 2, 1557142666, 1572870185, 14, 13, 0, 0, 'www.baidu.com	', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (101, 'agent100', 'MTIz', '', '123', '13', '123', '123', '123', '', 0, 3, 1, 1, 2, 1559562252, 0, 100, 0, 2, 0, '13', '172.19.0.1', '123', 2, 0, 0);
INSERT INTO `r_admin` VALUES (102, '123', 'Mw==', '', '', '', '', '', '', '', 0, 3, 2, 2, 1, 1560170103, 1560170127, 100, 100, 2, 0, '', '172.19.0.1', '', 2, 0, 0);
INSERT INTO `r_admin` VALUES (103, '234', 'MjM0', '', '', '', '', '', '', '', 0, 4, 1, 1, 1, 1560170144, 1572265642, 100, 100, 0, 0, '', '172.19.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (104, '', '', '', '', '', '', '', '', '', 0, 3, 1, 2, 1, 1561378807, 1561554239, 100, 100, 7, 0, '', '172.19.0.1', '', 1, 0, 0);
INSERT INTO `r_admin` VALUES (105, '', '', '', '', '', '', '', '', '', 0, 3, 1, 1, 2, 1561450274, 0, 100, 0, 8, 0, '', '172.19.0.1', '', 2, 0, 0);
INSERT INTO `r_admin` VALUES (106, 'rrr', 'd2Vy', '', 'werw', 'erww', 'er', 'wer', 'wer', '', 0, 3, 1, 2, 1, 1561554258, 1561554284, 100, 100, 9, 0, 'wer', '172.19.0.1', 'wer', 2, 0, 0);
INSERT INTO `r_admin` VALUES (107, '23123', 'MTIzNDU2', 'MTIzMTIz', 'FFF', '18778786767', '', '234234', '', '', 0, 3, 1, 1, 2, 1572143267, 0, 0, 0, 0, 0, '', '127.0.0.1', '0', 1, 0, 0);
INSERT INTO `r_admin` VALUES (108, 'kefu001', 'MTIzNDU2', '', 'kefu001', '18878786633', '333@qq.com', 'ewrw', 'erwer', '', 0, 4, 1, 1, 2, 1572260200, 0, 100, 0, 0, 0, '', '127.0.0.1', '0', 1, 0, 0);
COMMIT;

-- ----------------------------
-- Table structure for r_bet
-- ----------------------------
DROP TABLE IF EXISTS `r_bet`;
CREATE TABLE `r_bet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game_record_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '游戏记录类型',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `bet_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投注时间',
  `bet_door` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投注 1 庄 2 闲 3和 4庄对 5闲对',
  `bet_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投注金额',
  `bet_result` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投注结果 1 庄 2 闲 3和 4庄对 5闲对',
  `result_money` int(11) NOT NULL DEFAULT '0' COMMENT '输赢金额',
  `code_clear_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '洗码量',
  `settlement_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '结算时间',
  `settlement_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '结算金额',
  `account_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '账号余额',
  `ip` varchar(255) NOT NULL DEFAULT '' COMMENT '区域ip',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_bet
-- ----------------------------
BEGIN;
INSERT INTO `r_bet` VALUES (1, 1, 1, 1554479999, 3, 10, 5, -66630, 4102, 1554479999, 1033, 4410, '122.21.22.33', 1554479999, 10, 10, 10);
COMMIT;

-- ----------------------------
-- Table structure for r_game
-- ----------------------------
DROP TABLE IF EXISTS `r_game`;
CREATE TABLE `r_game` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '游戏名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='游戏表';

-- ----------------------------
-- Records of r_game
-- ----------------------------
BEGIN;
INSERT INTO `r_game` VALUES (1, '腾龙厅');
INSERT INTO `r_game` VALUES (2, '百胜厅');
COMMIT;

-- ----------------------------
-- Table structure for r_game_record
-- ----------------------------
DROP TABLE IF EXISTS `r_game_record`;
CREATE TABLE `r_game_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '游戏类型id',
  `game_area_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '游戏厅id',
  `series_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '卓号',
  `platform_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '场号',
  `inning_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '次号',
  `banker` varchar(255) NOT NULL DEFAULT '' COMMENT '庄家',
  `player` varchar(255) NOT NULL DEFAULT '' COMMENT '闲家',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='游戏记录';

-- ----------------------------
-- Records of r_game_record
-- ----------------------------
BEGIN;
INSERT INTO `r_game_record` VALUES (1, 1, 1, 2, 3, 4, '43', '23', 1676756544);
COMMIT;

-- ----------------------------
-- Table structure for r_notice
-- ----------------------------
DROP TABLE IF EXISTS `r_notice`;
CREATE TABLE `r_notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `is_read` tinyint(4) unsigned NOT NULL DEFAULT '2' COMMENT '是否阅读 1是 2否',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_notice
-- ----------------------------
BEGIN;
INSERT INTO `r_notice` VALUES (1, 15, '发生的范德萨', 1, 166664544, 1557587739);
INSERT INTO `r_notice` VALUES (2, 13, '新用户user10注册了', 2, 1558354761, 0);
INSERT INTO `r_notice` VALUES (3, 15, '新用户user10注册了', 2, 1558354761, 0);
INSERT INTO `r_notice` VALUES (4, 16, '新用户user10注册了', 2, 1558354761, 0);
INSERT INTO `r_notice` VALUES (5, 17, '新用户user10注册了', 2, 1558354761, 0);
INSERT INTO `r_notice` VALUES (6, 18, '新用户user10注册了', 2, 1558354761, 0);
INSERT INTO `r_notice` VALUES (7, 19, '新用户user10注册了', 1, 1558354761, 1558359489);
INSERT INTO `r_notice` VALUES (8, 1, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (9, 2, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (10, 3, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (11, 4, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (12, 5, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (13, 6, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (14, 7, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (15, 8, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (16, 9, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (17, 10, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (18, 11, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (19, 12, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (20, 13, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (21, 14, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (22, 15, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (23, 16, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (24, 27, '新用户ying01注册了', 1, 1572142965, 1572260148);
INSERT INTO `r_notice` VALUES (25, 28, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (26, 100, '新用户ying01注册了', 1, 1572142965, 1572870563);
INSERT INTO `r_notice` VALUES (27, 101, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (28, 103, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (29, 105, '新用户ying01注册了', 2, 1572142965, 0);
INSERT INTO `r_notice` VALUES (30, 1, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (31, 2, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (32, 3, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (33, 4, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (34, 5, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (35, 6, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (36, 7, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (37, 8, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (38, 9, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (39, 10, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (40, 11, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (41, 12, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (42, 13, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (43, 14, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (44, 15, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (45, 16, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (46, 27, '新用户yinrr注册了', 1, 1572146333, 1572260148);
INSERT INTO `r_notice` VALUES (47, 28, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (48, 100, '新用户yinrr注册了', 1, 1572146333, 1572870563);
INSERT INTO `r_notice` VALUES (49, 101, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (50, 103, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (51, 105, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (52, 107, '新用户yinrr注册了', 2, 1572146333, 0);
INSERT INTO `r_notice` VALUES (53, 1, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (54, 2, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (55, 3, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (56, 4, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (57, 5, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (58, 6, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (59, 7, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (60, 8, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (61, 9, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (62, 10, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (63, 11, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (64, 12, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (65, 13, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (66, 14, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (67, 15, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (68, 16, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (69, 27, '新用户yinrr注册了', 1, 1572146346, 1572260148);
INSERT INTO `r_notice` VALUES (70, 28, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (71, 100, '新用户yinrr注册了', 1, 1572146346, 1572870563);
INSERT INTO `r_notice` VALUES (72, 101, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (73, 103, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (74, 105, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (75, 107, '新用户yinrr注册了', 2, 1572146346, 0);
INSERT INTO `r_notice` VALUES (76, 1, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (77, 2, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (78, 3, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (79, 4, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (80, 5, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (81, 6, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (82, 7, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (83, 8, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (84, 9, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (85, 10, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (86, 11, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (87, 12, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (88, 13, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (89, 14, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (90, 15, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (91, 16, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (92, 27, '新用户fwfwe注册了', 1, 1572146501, 1572260148);
INSERT INTO `r_notice` VALUES (93, 28, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (94, 100, '新用户fwfwe注册了', 1, 1572146501, 1572870563);
INSERT INTO `r_notice` VALUES (95, 101, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (96, 103, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (97, 105, '新用户fwfwe注册了', 2, 1572146501, 0);
INSERT INTO `r_notice` VALUES (98, 107, '新用户fwfwe注册了', 2, 1572146501, 0);
COMMIT;

-- ----------------------------
-- Table structure for r_notice_agent
-- ----------------------------
DROP TABLE IF EXISTS `r_notice_agent`;
CREATE TABLE `r_notice_agent` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL COMMENT '状态 1 正常 2禁用 3 删除',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  `update_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_notice_agent
-- ----------------------------
BEGIN;
INSERT INTO `r_notice_agent` VALUES (16, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (17, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (18, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (19, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (20, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (21, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (22, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (23, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (24, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (25, '新增代理后台', '新增代理后台新增代理后台', 1, 1557140754, 1557140754, 1, 1);
INSERT INTO `r_notice_agent` VALUES (26, '新增代理后台222', '新增代理后台新增代理后台', 3, 1557140754, 1560167736, 1, 1);
INSERT INTO `r_notice_agent` VALUES (28, '测试新增代理后台2', '测试新增代理后台测试新增代理后台测试新增代理后台测试新增代理后台2', 1, 1560167719, 1560167734, 100, 100);
COMMIT;

-- ----------------------------
-- Table structure for r_notice_game
-- ----------------------------
DROP TABLE IF EXISTS `r_notice_game`;
CREATE TABLE `r_notice_game` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL COMMENT '状态 1 正常 2禁用 3 删除',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  `update_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_notice_game
-- ----------------------------
BEGIN;
INSERT INTO `r_notice_game` VALUES (16, '测试游戏大厅16', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140713, 1, 1);
INSERT INTO `r_notice_game` VALUES (17, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (18, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (19, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (20, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (21, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (22, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (23, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (24, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (25, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 1, 1557140605, 1557140605, 1, 1);
INSERT INTO `r_notice_game` VALUES (26, '测试游戏大厅', '测试游戏大厅测试游戏大厅', 3, 1557140605, 1560167695, 1, 1);
INSERT INTO `r_notice_game` VALUES (27, '测试新增游戏大厅2', 'hahahahahhahahahaha', 1, 1560167680, 1572269004, 100, 100);
COMMIT;

-- ----------------------------
-- Table structure for r_notice_system
-- ----------------------------
DROP TABLE IF EXISTS `r_notice_system`;
CREATE TABLE `r_notice_system` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL COMMENT '状态 1 正常 2禁用 3 删除',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  `update_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_notice_system
-- ----------------------------
BEGIN;
INSERT INTO `r_notice_system` VALUES (16, '测试新增会员后台', '测试新增会员后台', 1, 1557061662, 1557061662, 1, 1);
INSERT INTO `r_notice_system` VALUES (17, '测试新增会员后台2', '测试新增会员后台2', 1, 1557061670, 1557061670, 1, 1);
INSERT INTO `r_notice_system` VALUES (20, '测试新增会员后台', '测试新增会员后台', 1, 1557061662, 1557061662, 1, 1);
INSERT INTO `r_notice_system` VALUES (21, '测试新增会员后台2', '测试新增会员后台2', 1, 1557061670, 1557061670, 1, 1);
INSERT INTO `r_notice_system` VALUES (22, '测试新增会员后台', '测试新增会员后台', 1, 1557061662, 1557061662, 1, 1);
INSERT INTO `r_notice_system` VALUES (23, '测试新增会员后台2', '测试新增会员后台2', 1, 1557061670, 1557061670, 1, 1);
INSERT INTO `r_notice_system` VALUES (24, '测试新增会员后台', '测试新增会员后台', 1, 1557061662, 1557061662, 1, 1);
INSERT INTO `r_notice_system` VALUES (25, '测试新增会员后台2', '测试新增会员后台2', 1, 1557061670, 1557061670, 1, 1);
INSERT INTO `r_notice_system` VALUES (26, '测试新增会员后台', '测试新增会员后台', 1, 1557061662, 1557061662, 1, 1);
INSERT INTO `r_notice_system` VALUES (27, '测试新增会员后台2', '测试新增会员后台2', 1, 1557061670, 1557061670, 1, 1);
INSERT INTO `r_notice_system` VALUES (28, '测试新增会员后台', '测试新增会员后台', 1, 1557061662, 1557061662, 1, 1);
INSERT INTO `r_notice_system` VALUES (29, '测试新增会员后台2', '测试新增会员后台2', 1, 1557061670, 1557061670, 1, 1);
INSERT INTO `r_notice_system` VALUES (30, '测试新增会员后台', '测试新增会员后台', 1, 1557061662, 1557061662, 1, 1);
INSERT INTO `r_notice_system` VALUES (31, '测试新增会员后台2', '测试新增会员后台2', 3, 1557061670, 1560167657, 1, 1);
INSERT INTO `r_notice_system` VALUES (32, '测试新增会员后台2', '测试新增会员后台测试新增会员后台2', 1, 1560167641, 1560167655, 100, 1);
COMMIT;

-- ----------------------------
-- Table structure for r_notice_website
-- ----------------------------
DROP TABLE IF EXISTS `r_notice_website`;
CREATE TABLE `r_notice_website` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` varchar(255) NOT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL COMMENT '状态 1 正常 2禁用 3 删除',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_person` int(11) NOT NULL,
  `update_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_notice_website
-- ----------------------------
BEGIN;
INSERT INTO `r_notice_website` VALUES (20, '测试新增网站公告', '测试新增网站公告', 1, 1557061336, 1557061336, 1, 1);
INSERT INTO `r_notice_website` VALUES (21, '测试新增网站公告2', '测试新增网站公告2', 2, 1557061355, 1557061364, 1, 1);
INSERT INTO `r_notice_website` VALUES (22, '测试新增网站公告', '测试新增网站公告', 1, 1557061336, 1557061336, 1, 1);
INSERT INTO `r_notice_website` VALUES (23, '测试新增网站公告2', '测试新增网站公告2', 2, 1557061355, 1557061364, 1, 1);
INSERT INTO `r_notice_website` VALUES (24, '测试新增网站公告', '测试新增网站公告', 1, 1557061336, 1557061336, 1, 1);
INSERT INTO `r_notice_website` VALUES (25, '测试新增网站公告2', '测试新增网站公告2', 2, 1557061355, 1557061364, 1, 1);
INSERT INTO `r_notice_website` VALUES (26, '测试新增网站公告', '测试新增网站公告', 1, 1557061336, 1557061336, 1, 1);
INSERT INTO `r_notice_website` VALUES (27, '测试新增网站公告2', '测试新增网站公告2', 2, 1557061355, 1557061364, 1, 1);
INSERT INTO `r_notice_website` VALUES (28, '测试新增网站公告', '测试新增网站公告', 1, 1557061336, 1557061336, 1, 1);
INSERT INTO `r_notice_website` VALUES (29, '测试新增网站公告2', '测试新增网站公告2', 2, 1557061355, 1557061364, 1, 1);
INSERT INTO `r_notice_website` VALUES (30, '测试新增网站公告', '测试新增网站公告', 2, 1557061336, 1557570583, 1, 1);
INSERT INTO `r_notice_website` VALUES (31, '测试新增网站公告2', '测试新增网站公告2', 3, 1557061355, 1557570592, 1, 1);
INSERT INTO `r_notice_website` VALUES (32, '测试新增网站公告', '测试新增网站公告', 3, 1557061336, 1560167621, 1, 1);
INSERT INTO `r_notice_website` VALUES (33, '测试新增网站公告33', '测试新增网站公告33', 3, 1557061355, 1557570270, 1, 1);
INSERT INTO `r_notice_website` VALUES (52, '测试新增网站公告2', '测试新增网站公告测试新增网站公告2', 1, 1560167555, 1560167611, 100, 1);
INSERT INTO `r_notice_website` VALUES (53, '测试112', '测试112', 3, 1561548807, 1561548829, 100, 1);
COMMIT;

-- ----------------------------
-- Table structure for r_position
-- ----------------------------
DROP TABLE IF EXISTS `r_position`;
CREATE TABLE `r_position` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '职位名称',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_position
-- ----------------------------
BEGIN;
INSERT INTO `r_position` VALUES (1, '超级管理员', 0, 0, 0, 0);
INSERT INTO `r_position` VALUES (2, '管理员', 0, 0, 0, 0);
INSERT INTO `r_position` VALUES (3, '代理', 0, 0, 0, 0);
INSERT INTO `r_position` VALUES (4, '客服', 0, 0, 0, 0);
INSERT INTO `r_position` VALUES (5, '主管', 0, 0, 0, 0);
COMMIT;

-- ----------------------------
-- Table structure for r_position_power
-- ----------------------------
DROP TABLE IF EXISTS `r_position_power`;
CREATE TABLE `r_position_power` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL COMMENT '职位id',
  `power_id` int(11) NOT NULL COMMENT '权限id',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2084 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_position_power
-- ----------------------------
BEGIN;
INSERT INTO `r_position_power` VALUES (1740, 3, 105, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1741, 3, 106, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1742, 3, 17, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1743, 3, 109, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1744, 3, 110, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1745, 3, 24, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1746, 3, 112, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1747, 3, 113, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1748, 3, 29, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1749, 3, 146, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1750, 3, 147, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1751, 3, 148, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1752, 3, 149, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1753, 3, 150, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1856, 5, 100, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1857, 5, 101, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1858, 5, 1, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1859, 5, 102, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1860, 5, 5, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1861, 5, 103, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1862, 5, 9, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1863, 5, 104, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1864, 5, 13, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1865, 5, 105, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1866, 5, 106, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1867, 5, 17, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1868, 5, 18, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1869, 5, 19, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1870, 5, 21, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1871, 5, 125, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1872, 5, 107, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1873, 5, 20, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1874, 5, 108, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1875, 5, 22, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1876, 5, 109, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1877, 5, 110, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1878, 5, 24, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1879, 5, 25, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1880, 5, 26, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1881, 5, 28, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1882, 5, 126, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1883, 5, 111, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1884, 5, 27, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1885, 5, 112, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1886, 5, 113, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1887, 5, 29, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1888, 5, 30, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1889, 5, 31, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1890, 5, 32, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1891, 5, 127, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1892, 5, 114, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1893, 5, 115, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1894, 5, 33, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1895, 5, 34, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1896, 5, 35, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1897, 5, 36, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1898, 5, 134, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1899, 5, 116, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1900, 5, 117, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1901, 5, 37, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1902, 5, 118, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1903, 5, 38, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1904, 5, 119, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1905, 5, 39, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1906, 5, 120, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1907, 5, 40, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1908, 5, 121, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1909, 5, 41, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1910, 5, 146, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1911, 5, 147, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1912, 5, 148, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1913, 5, 149, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1914, 5, 150, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1995, 2, 100, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1996, 2, 101, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1997, 2, 1, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1998, 2, 102, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (1999, 2, 5, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2000, 2, 103, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2001, 2, 9, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2002, 2, 104, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2003, 2, 13, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2004, 2, 105, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2005, 2, 106, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2006, 2, 17, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2007, 2, 18, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2008, 2, 19, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2009, 2, 21, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2010, 2, 125, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2011, 2, 128, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2012, 2, 107, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2013, 2, 20, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2014, 2, 108, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2015, 2, 22, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2016, 2, 23, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2017, 2, 109, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2018, 2, 110, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2019, 2, 24, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2020, 2, 25, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2021, 2, 26, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2022, 2, 28, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2023, 2, 126, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2024, 2, 129, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2025, 2, 111, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2026, 2, 27, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2027, 2, 112, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2028, 2, 113, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2029, 2, 29, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2030, 2, 30, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2031, 2, 31, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2032, 2, 32, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2033, 2, 127, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2034, 2, 154, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2035, 2, 114, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2036, 2, 115, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2037, 2, 33, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2038, 2, 34, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2039, 2, 35, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2040, 2, 36, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2041, 2, 134, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2042, 2, 155, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2043, 2, 116, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2044, 2, 117, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2045, 2, 37, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2046, 2, 118, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2047, 2, 38, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2048, 2, 119, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2049, 2, 39, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2050, 2, 120, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2051, 2, 40, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2052, 2, 121, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2053, 2, 41, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2054, 2, 122, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2055, 2, 123, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2056, 2, 124, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2057, 2, 151, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2058, 2, 146, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2059, 2, 147, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2060, 2, 148, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2061, 2, 149, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2062, 2, 150, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2063, 4, 105, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2064, 4, 106, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2065, 4, 17, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2066, 4, 19, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2067, 4, 153, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2068, 4, 107, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2069, 4, 20, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2070, 4, 108, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2071, 4, 22, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2072, 4, 109, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2073, 4, 110, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2074, 4, 24, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2075, 4, 112, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2076, 4, 113, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2077, 4, 29, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2078, 4, 31, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2079, 4, 146, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2080, 4, 147, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2081, 4, 148, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2082, 4, 149, 0, 0, 0, 0);
INSERT INTO `r_position_power` VALUES (2083, 4, 150, 0, 0, 0, 0);
COMMIT;

-- ----------------------------
-- Table structure for r_power
-- ----------------------------
DROP TABLE IF EXISTS `r_power`;
CREATE TABLE `r_power` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL DEFAULT '' COMMENT '模块',
  `controller` varchar(255) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(255) NOT NULL DEFAULT '' COMMENT '方法',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `pid` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_power
-- ----------------------------
BEGIN;
INSERT INTO `r_power` VALUES (1, 'notice', 'website', 'list', '列表', 101);
INSERT INTO `r_power` VALUES (2, 'notice', 'website', 'create', '创建', 101);
INSERT INTO `r_power` VALUES (3, 'notice', 'website', 'edit', '编辑', 101);
INSERT INTO `r_power` VALUES (4, 'notice', 'website', 'change-status', '修改状态', 101);
INSERT INTO `r_power` VALUES (5, 'notice', 'system', 'list', '列表', 102);
INSERT INTO `r_power` VALUES (6, 'notice', 'system', 'create', '创建', 102);
INSERT INTO `r_power` VALUES (7, 'notice', 'system', 'edit', '编辑', 102);
INSERT INTO `r_power` VALUES (8, 'notice', 'system', 'change-status', '修改状态', 102);
INSERT INTO `r_power` VALUES (9, 'notice', 'game', 'list', '列表', 103);
INSERT INTO `r_power` VALUES (10, 'notice', 'game', 'create', '创建', 103);
INSERT INTO `r_power` VALUES (11, 'notice', 'game', 'edit', '编辑', 103);
INSERT INTO `r_power` VALUES (12, 'notice', 'game', 'change-status', '修改状态', 103);
INSERT INTO `r_power` VALUES (13, 'notice', 'agent', 'list', '列表', 104);
INSERT INTO `r_power` VALUES (14, 'notice', 'agent', 'create', '创建', 104);
INSERT INTO `r_power` VALUES (15, 'notice', 'agent', 'edit', '编辑', 104);
INSERT INTO `r_power` VALUES (16, 'notice', 'agent', 'change-status', '修改状态', 104);
INSERT INTO `r_power` VALUES (17, 'user', 'user', 'list', '会员列表', 106);
INSERT INTO `r_power` VALUES (18, 'user', 'user', 'create', '创建', 106);
INSERT INTO `r_power` VALUES (19, 'user', 'user', 'edit', '编辑', 106);
INSERT INTO `r_power` VALUES (20, 'user', 'examine', 'examine', '审核列表', 107);
INSERT INTO `r_power` VALUES (21, 'user', 'user', 'change-stop', '修改状态', 106);
INSERT INTO `r_power` VALUES (22, 'user', 'online', 'online', '在线列表', 108);
INSERT INTO `r_power` VALUES (23, 'user', 'online', 'kick-out', '踢出登录', 108);
INSERT INTO `r_power` VALUES (24, 'agent', 'agent', 'list', '代理列表', 110);
INSERT INTO `r_power` VALUES (25, 'agent', 'agent', 'create', '创建', 110);
INSERT INTO `r_power` VALUES (26, 'agent', 'agent', 'edit', '编辑', 110);
INSERT INTO `r_power` VALUES (27, 'agent', 'examine', 'examine', '审核', 111);
INSERT INTO `r_power` VALUES (28, 'agent', 'agent', 'change-status', '修改状态', 110);
INSERT INTO `r_power` VALUES (29, 'customer', 'customer', 'list', '客服列表', 113);
INSERT INTO `r_power` VALUES (30, 'customer', 'customer', 'create', '创建', 113);
INSERT INTO `r_power` VALUES (31, 'customer', 'customer', 'edit', '编辑', 113);
INSERT INTO `r_power` VALUES (32, 'customer', 'customer', 'change-status', '修改状态', 113);
INSERT INTO `r_power` VALUES (33, 'director', 'director', 'list', '主管列表', 115);
INSERT INTO `r_power` VALUES (34, 'director', 'director', 'create', '创建', 115);
INSERT INTO `r_power` VALUES (35, 'director', 'director', 'edit', '编辑', 115);
INSERT INTO `r_power` VALUES (36, 'director', 'director', 'change-status', '修改状态', 115);
INSERT INTO `r_power` VALUES (37, 'report', 'user', 'user-add-record', '会员新增记录', 117);
INSERT INTO `r_power` VALUES (38, 'report', 'agent', 'agent-add-record', '代理新增记录', 118);
INSERT INTO `r_power` VALUES (39, 'report', 'bet', 'bet-record', '投注记录', 119);
INSERT INTO `r_power` VALUES (40, 'report', 'recharge', 'recharge-record', '充值记录', 120);
INSERT INTO `r_power` VALUES (41, 'report', 'result', 'result-record', '输赢记录', 121);
INSERT INTO `r_power` VALUES (42, 'super', 'power', 'power-list', '权限列表', 123);
INSERT INTO `r_power` VALUES (100, 'notice', '', '', '通知管理', 0);
INSERT INTO `r_power` VALUES (101, 'notice', 'website', 'list', '网站公告', 100);
INSERT INTO `r_power` VALUES (102, 'notice', 'system', 'list', '会员后台', 100);
INSERT INTO `r_power` VALUES (103, 'notice', 'game', 'list', '游戏大厅', 100);
INSERT INTO `r_power` VALUES (104, 'notice', 'agent', 'list', '代理后台', 100);
INSERT INTO `r_power` VALUES (105, 'user', '', '', '会员管理', 0);
INSERT INTO `r_power` VALUES (106, 'user', 'user', 'list', '会员列表', 105);
INSERT INTO `r_power` VALUES (107, 'user', 'examine', 'examine', '会员审核', 105);
INSERT INTO `r_power` VALUES (108, 'user', 'online', 'online', '会员在线', 105);
INSERT INTO `r_power` VALUES (109, 'agent', '', '', '代理管理', 0);
INSERT INTO `r_power` VALUES (110, 'agent', 'agent', 'list', '代理列表', 109);
INSERT INTO `r_power` VALUES (111, 'agent', 'examine', 'examine', '代理审核', 109);
INSERT INTO `r_power` VALUES (112, 'customer', '', '', '客服管理', 0);
INSERT INTO `r_power` VALUES (113, 'customer', 'customer', 'list', '客服列表', 112);
INSERT INTO `r_power` VALUES (114, 'director', '', '', '主管管理', 0);
INSERT INTO `r_power` VALUES (115, 'director', 'director', 'list', '主管列表', 114);
INSERT INTO `r_power` VALUES (116, 'report', '', '', '报表管理', 0);
INSERT INTO `r_power` VALUES (117, 'report', 'user', 'user-add-record', '会员新增记录', 116);
INSERT INTO `r_power` VALUES (118, 'report', 'agent', 'agent-add-record', '代理新增记录', 116);
INSERT INTO `r_power` VALUES (119, 'report', 'bet', 'bet-record', '投注记录', 116);
INSERT INTO `r_power` VALUES (120, 'report', 'recharge', 'recharge-record', '充值记录', 116);
INSERT INTO `r_power` VALUES (121, 'report', 'result', 'result-record', '输赢记录', 116);
INSERT INTO `r_power` VALUES (122, 'super', '', '', '超级管理', 0);
INSERT INTO `r_power` VALUES (123, 'super', 'power', 'power-list', '权限列表', 122);
INSERT INTO `r_power` VALUES (124, 'super', 'export', 'list', '数据导出', 122);
INSERT INTO `r_power` VALUES (125, 'user', 'user', 'export-user', '导出会员列表', 106);
INSERT INTO `r_power` VALUES (126, 'agent', 'agent', 'export-agent', '导出代理列表', 110);
INSERT INTO `r_power` VALUES (127, 'customer', 'customer', 'export-customer', '导出客服列表', 113);
INSERT INTO `r_power` VALUES (128, 'user', 'user', 'del', '删除', 106);
INSERT INTO `r_power` VALUES (129, 'agent', 'agent', 'del', '删除', 110);
INSERT INTO `r_power` VALUES (134, 'director', 'director', 'export-director', '导出主管列表', 115);
INSERT INTO `r_power` VALUES (136, 'super', 'power', 'position-power', '职位权限', 123);
INSERT INTO `r_power` VALUES (137, 'super', 'power', 'save-power', '修改权限', 123);
INSERT INTO `r_power` VALUES (138, 'super', 'export', 'list', '列表', 124);
INSERT INTO `r_power` VALUES (139, 'super', 'export', 'export-user', '导出会员', 124);
INSERT INTO `r_power` VALUES (140, 'super', 'export', 'export-agent', '导出代理', 124);
INSERT INTO `r_power` VALUES (141, 'super', 'export', 'export-customer', '导出客服', 124);
INSERT INTO `r_power` VALUES (142, 'super', 'export', 'export-director', '导出主管', 124);
INSERT INTO `r_power` VALUES (143, 'super', 'export', 'export-bet', '导出投注记录', 124);
INSERT INTO `r_power` VALUES (144, 'super', 'export', 'export-recharge', '导出充值记录', 124);
INSERT INTO `r_power` VALUES (145, 'super', 'export', 'export-result', '导出输赢记录', 124);
INSERT INTO `r_power` VALUES (146, 'center', '', '', '个人中心', 0);
INSERT INTO `r_power` VALUES (147, 'center', 'notice', 'list', '消息通知', 146);
INSERT INTO `r_power` VALUES (148, 'center', 'notice', 'list', '消息通知', 147);
INSERT INTO `r_power` VALUES (149, 'center', 'info', 'info', '个人资料', 146);
INSERT INTO `r_power` VALUES (150, 'center', 'info', 'info', '个人资料', 149);
INSERT INTO `r_power` VALUES (151, 'super', 'user', 'list', '操作记录', 122);
INSERT INTO `r_power` VALUES (152, 'super', 'user', 'list', '操作记录', 151);
INSERT INTO `r_power` VALUES (153, 'user', 'user', 'add-game-account', '添加游戏账号', 106);
INSERT INTO `r_power` VALUES (154, 'customer', 'customer', 'del', '删除客服', 113);
INSERT INTO `r_power` VALUES (155, 'director', 'director', 'del', '删除主管', 115);
COMMIT;

-- ----------------------------
-- Table structure for r_recharge_record
-- ----------------------------
DROP TABLE IF EXISTS `r_recharge_record`;
CREATE TABLE `r_recharge_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '游戏类型',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '充值类型',
  `money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '充值金额',
  `balance` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '余额',
  `operator_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '操作员',
  `ip` varchar(255) NOT NULL COMMENT 'ip',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='充值记录';

-- ----------------------------
-- Records of r_recharge_record
-- ----------------------------
BEGIN;
INSERT INTO `r_recharge_record` VALUES (1, 1, 1, 1, 10000, 19990, 15, '127.0.0.1', 1557936000, 10, 10, 10);
INSERT INTO `r_recharge_record` VALUES (2, 1, 1, 0, 120, 120, 0, '127.0.0.1', 1557936000, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (3, 1, 1, 0, 330, 3, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (4, 1, 1, 0, 312, 123, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (5, 1, 1, 0, 123, 1230, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (6, 1, 1, 0, 123, 0, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (7, 1, 1, 0, 10000, 30000, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (8, 1, 5, 0, 0, 0, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (9, 1, 5, 0, 0, 0, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (10, 1, 5, 0, 0, 0, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (11, 1, 5, 0, 0, 0, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (12, 1, 5, 0, 0, 0, 0, '127.0.0.1', 1560614399, 0, 0, 0);
INSERT INTO `r_recharge_record` VALUES (13, 1, 5, 0, 200000, 30000, 0, '127.0.0.1', 1560614399, 0, 0, 0);
COMMIT;

-- ----------------------------
-- Table structure for r_result
-- ----------------------------
DROP TABLE IF EXISTS `r_result`;
CREATE TABLE `r_result` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '游戏类型',
  `game_area_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '游戏厅id',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '余额',
  `bet_times` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投注次数',
  `bet_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投注金额',
  `success_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '有效金额',
  `all_clear_code_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '总洗码量',
  `success_clear_code_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '有效洗码',
  `clear_code_type` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '洗码类型',
  `clear_code_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '洗码金额',
  `clear_code_lv` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '洗码率',
  `person_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '个人上水金额',
  `company_money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '公司上水金额',
  `success_times` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '有效次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_result
-- ----------------------------
BEGIN;
INSERT INTO `r_result` VALUES (1, 1, 1, 1, 220, 3, 20, 1, 130, 23, 1, 31, 20, 30, 20, 1, 1554479999, 1554479999, 13, 13);
COMMIT;

-- ----------------------------
-- Table structure for r_user
-- ----------------------------
DROP TABLE IF EXISTS `r_user`;
CREATE TABLE `r_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL COMMENT '账号',
  `pwd` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `game_account` varchar(255) NOT NULL DEFAULT '' COMMENT '游戏账号',
  `game_pwd` varchar(255) NOT NULL DEFAULT '' COMMENT '游戏密码',
  `money_pwd` varchar(255) NOT NULL DEFAULT '' COMMENT '取款密码',
  `money` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '余额',
  `real_name` varchar(255) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `phone` varchar(255) NOT NULL DEFAULT '' COMMENT '手机',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `qq` varchar(255) NOT NULL DEFAULT '' COMMENT 'qq',
  `bank_id` varchar(255) NOT NULL DEFAULT '' COMMENT '银行账号',
  `agent_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级代理',
  `create_ip` varchar(255) NOT NULL DEFAULT '0' COMMENT '注册ip',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0',
  `domain` varchar(255) NOT NULL DEFAULT '' COMMENT '域名',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1 待审核 2通过 3拒绝',
  `is_stop` tinyint(4) unsigned NOT NULL DEFAULT '2' COMMENT '是否停用 1是 2否',
  `is_delete` tinyint(4) unsigned NOT NULL DEFAULT '2' COMMENT '是否删除 1是2否',
  `expire_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '超时时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_user
-- ----------------------------
BEGIN;
INSERT INTO `r_user` VALUES (1, 'user1', 'MTIzNDU2', '', '', 'MTIzNDU2', 10000, '张一1', '18878786553', '234@qq.com2', '456356677', '', 16, '0', 1557667402, 1572870033, 0, 100, '', 2, 2, 2, 1572873633);
INSERT INTO `r_user` VALUES (2, 'user2', 'MTIzNDU2', '', '', 'MTIzNDU2', 20000, '李二', '18768908765', '444@qq.com', '3232323', '', 16, '0', 1558173554, 1558186921, 0, 19, '', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (3, 'user3', 'MTIzNDU2', '', '', 'MTIzNDU2MQ==', 30000, '王三', '188787865531', '1444@qq.com1', '44441', '71241241241241241241', 16, '172.19.0.1', 1558185695, 1558186574, 13, 19, 'www.baidu.com1', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (4, 'user4', 'MTIzNDU2', '', '', 'MTIzNDU2', 0, '未审核陈四', '18876568521', '1444@qq.com1', '13123123', '', 16, '0', 1558354761, 1560148161, 0, 100, 'jdasdas', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (5, 'user5', 'MQ==', '1', 'MQ==', 'MQ==', 0, '1', '1', '1', '1', '1', 16, '172.19.0.1', 1559226172, 1559226186, 100, 100, '111', 2, 1, 2, 0);
INSERT INTO `r_user` VALUES (6, 'user6', 'Nzc=', '', '', 'NjY=', 0, '22', '22', '22', '22', '55', 16, '172.19.0.1', 1559556725, 1560148258, 100, 100, '55', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (7, 'user10', 'MTIzNDU2', '', '', 'MTIzNDU2', 0, 'user10', '18878887777', '33@qq.com', '453198888', '62284817767222333', 16, '172.19.0.1', 1560167886, 1561554192, 100, 100, 'www.jjjf.com', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (8, 'user8', '', '', '', '', 0, '', '', '', '', '', 16, '172.19.0.1', 1560168981, 1560170041, 100, 100, '', 2, 1, 1, 0);
INSERT INTO `r_user` VALUES (9, '43', '', '', '', '', 0, '', '', '', '', '', 16, '172.19.0.1', 1560169878, 1560169889, 100, 100, '', 3, 2, 2, 0);
INSERT INTO `r_user` VALUES (10, 'user3', 'MTIzNDU2', '', '', 'MTIzNDU2MQ==', 30000, '王三', '188787865531', '1444@qq.com1', '44441', '71241241241241241241', 16, '172.19.0.1', 1558185695, 1558186574, 13, 19, 'www.baidu.com1', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (11, 'user4', 'MTIzNDU2', '', '', 'MTIzNDU2', 0, '未审核陈四', '18876568521', '1444@qq.com1', '13123123', '', 16, '0', 1558354761, 1560148161, 0, 100, 'jdasdas', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (12, 'user5', 'MQ==', '1', 'MQ==', 'MQ==', 0, '1', '1', '1', '1', '1', 16, '172.19.0.1', 1559226172, 1561554153, 100, 100, '111', 2, 1, 1, 0);
INSERT INTO `r_user` VALUES (13, 'user6', 'Nzc=', '', '', 'NjY=', 0, '22', '22', '22', '22', '55', 4, '172.19.0.1', 1559556725, 1561554161, 100, 100, '55', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (14, 'user10', 'MTIzNDU2', '', '', 'MTIzNDU2', 0, 'user10', '18878887777', '33@qq.com', '453198888', '62284817767222333', 16, '172.19.0.1', 1560167886, 1560167886, 100, 100, 'www.jjjf.com', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (15, 'user8', '', '', '', '', 0, '', '', '', '', '', 16, '172.19.0.1', 1560168981, 1560170041, 100, 100, '', 2, 1, 1, 0);
INSERT INTO `r_user` VALUES (16, '43', '', '', '', '', 0, '', '', '', '', '', 16, '172.19.0.1', 1560169878, 1560169889, 100, 100, '', 3, 2, 2, 0);
INSERT INTO `r_user` VALUES (17, '2', 'Mg==', '', '', 'Mg==', 0, '2', '2', '2', '2', '2', 5, '172.19.0.1', 1561543121, 1561543121, 100, 100, '2', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (18, 'asdasd', 'YXNkYXM=', '', '', 'ZGFzZA==', 0, 'asd', 'asd', 'asd', 'asd', 'asd', 0, '172.19.0.1', 1561548897, 1561548918, 100, 100, 'asd', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (19, 'er', 'cmZk', '', '', 'Z2Zn', 0, 'dfg', 'dfg', 'dfg', 'df', 'gdfg', 1, '172.19.0.1', 1561553492, 1561553492, 100, 100, 'dfg', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (20, 'er', 'cmZk', '', '', 'Z2Zn', 0, 'dfg', 'dfg', 'dfg', 'df', 'gdfg', 1, '172.19.0.1', 1561553516, 1561553516, 100, 100, 'dfg', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (21, 'qweqw', 'ZXF3ZQ==', '', '', 'cXdl', 0, 'qwe', 'qwe', 'qwe', '', '', 1, '172.19.0.1', 1561553563, 1561553597, 100, 100, '', 3, 2, 2, 0);
INSERT INTO `r_user` VALUES (22, 'fsdf', 'ZHNm', '', '', 'c2Rm', 0, 'sdf', '22', '22', '2', '2', 1, '172.19.0.1', 1561553646, 1561554186, 100, 100, '2', 3, 2, 2, 0);
INSERT INTO `r_user` VALUES (23, 'dfgd', 'ZmdkZmc=', '', '', 'ZGZn', 0, 'dfg', 'dfg', 'f', 'f', 'd', 1, '172.19.0.1', 1561553690, 1561553690, 100, 100, 'd', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (24, 'dfgd', 'ZmdkZmc=', '', '', 'ZGZn', 0, 'dfg', 'dfg', 'f', 'f', 'd', 1, '172.19.0.1', 1561553715, 1561554119, 100, 100, 'd', 2, 2, 2, 0);
INSERT INTO `r_user` VALUES (25, 'ying01', 'cXFxMTIz', '', '', 'cXFxMTIzMTIz', 0, 'fff', '12233332222', '', '13123123', '', 0, '0', 1572142965, 0, 0, 0, '', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (26, 'yinrr', 'NDQ0NDQ0', '', '', 'NDQ0NDQ0NA==', 0, '234', '18767675252', '', '234234', '', 0, '127.0.0.1', 1572146333, 0, 0, 0, '', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (27, 'yinrr', 'NDQ0NDQ0', '', '', 'NDQ0NDQ0NA==', 0, '234', '18767675252', '', '234234', '', 0, '127.0.0.1', 1572146346, 0, 0, 0, '', 1, 2, 2, 0);
INSERT INTO `r_user` VALUES (28, 'fwfwe', 'cXFxcXFx', '', '', 'cXFxcXFx', 0, 'qw', '18787872727', '', '123', '', 0, '127.0.0.1', 1572146501, 0, 0, 0, '', 1, 2, 2, 0);
COMMIT;

-- ----------------------------
-- Table structure for r_user_exec_record
-- ----------------------------
DROP TABLE IF EXISTS `r_user_exec_record`;
CREATE TABLE `r_user_exec_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1管理 2会员',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员/管理id',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '内容',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COMMENT='会员操作记录表';

-- ----------------------------
-- Records of r_user_exec_record
-- ----------------------------
BEGIN;
INSERT INTO `r_user_exec_record` VALUES (32, 1, 100, '创建了序号为52的网站公告通知', '172.19.0.1', 1560167555);
INSERT INTO `r_user_exec_record` VALUES (33, 1, 100, '编辑了序号为52的网站公告通知:标题修改为测试新增网站公告2,内容修改为:测试新增网站公告测试新增网站公告2,状态修改为禁用', '172.19.0.1', 1560167599);
INSERT INTO `r_user_exec_record` VALUES (34, 1, 100, '编辑了序号为52的网站公告通知:状态修改为正常', '172.19.0.1', 1560167611);
INSERT INTO `r_user_exec_record` VALUES (35, 1, 100, '编辑了序号为32的网站公告通知:状态修改为删除', '172.19.0.1', 1560167621);
INSERT INTO `r_user_exec_record` VALUES (36, 1, 100, '创建了序号为32的会员后台通知', '172.19.0.1', 1560167641);
INSERT INTO `r_user_exec_record` VALUES (37, 1, 100, '编辑了序号为32的会员后台通知:标题修改为测试新增会员后台2,内容修改为:测试新增会员后台测试新增会员后台2,状态修改为禁用', '172.19.0.1', 1560167652);
INSERT INTO `r_user_exec_record` VALUES (38, 1, 100, '编辑了序号为32的会员后台通知:状态修改为正常', '172.19.0.1', 1560167655);
INSERT INTO `r_user_exec_record` VALUES (39, 1, 100, '编辑了序号为31的会员后台通知:状态修改为删除', '172.19.0.1', 1560167657);
INSERT INTO `r_user_exec_record` VALUES (40, 1, 100, '创建了序号为27的游戏大厅通知', '172.19.0.1', 1560167680);
INSERT INTO `r_user_exec_record` VALUES (41, 1, 100, '编辑了序号为27的游戏大厅通知:标题修改为测试新增游戏大厅2,内容修改为:测试新增游戏大厅测试新增游戏大厅2,状态修改为禁用', '172.19.0.1', 1560167689);
INSERT INTO `r_user_exec_record` VALUES (42, 1, 100, '编辑了序号为27的游戏大厅通知:状态修改为正常', '172.19.0.1', 1560167692);
INSERT INTO `r_user_exec_record` VALUES (43, 1, 100, '编辑了序号为26的游戏大厅通知:状态修改为删除', '172.19.0.1', 1560167695);
INSERT INTO `r_user_exec_record` VALUES (44, 1, 100, '创建了序号为28的代理后台通知', '172.19.0.1', 1560167719);
INSERT INTO `r_user_exec_record` VALUES (45, 1, 100, '编辑了序号为28的代理后台通知:状态修改为禁用', '172.19.0.1', 1560167725);
INSERT INTO `r_user_exec_record` VALUES (46, 1, 100, '编辑了序号为28的代理后台通知:状态修改为正常', '172.19.0.1', 1560167727);
INSERT INTO `r_user_exec_record` VALUES (47, 1, 100, '编辑了序号为28的代理后台通知:标题修改为测试新增代理后台2,内容修改为:测试新增代理后台测试新增代理后台测试新增代理后台测试新增代理后台2,状态修改为正常', '172.19.0.1', 1560167734);
INSERT INTO `r_user_exec_record` VALUES (48, 1, 100, '编辑了序号为26的代理后台通知:状态修改为删除', '172.19.0.1', 1560167736);
INSERT INTO `r_user_exec_record` VALUES (49, 1, 100, '创建了序号为7的会员', '172.19.0.1', 1560167886);
INSERT INTO `r_user_exec_record` VALUES (50, 1, 100, '创建了序号为8的会员', '172.19.0.1', 1560168981);
INSERT INTO `r_user_exec_record` VALUES (51, 1, 100, '审核了序号为8的会员:审核状态修改为通过', '172.19.0.1', 1560168987);
INSERT INTO `r_user_exec_record` VALUES (52, 1, 100, '编辑了序号为8的会员:百家乐修改为ddd3,', '172.19.0.1', 1560169854);
INSERT INTO `r_user_exec_record` VALUES (53, 1, 100, '创建了序号为9的会员', '172.19.0.1', 1560169878);
INSERT INTO `r_user_exec_record` VALUES (54, 1, 100, '审核了序号为9的会员:审核状态修改为拒绝', '172.19.0.1', 1560169889);
INSERT INTO `r_user_exec_record` VALUES (55, 1, 100, '修改了序号为8的会员:状态修改为正常', '172.19.0.1', 1560169977);
INSERT INTO `r_user_exec_record` VALUES (56, 1, 100, '修改了序号为8的会员:状态修改为正常', '172.19.0.1', 1560170016);
INSERT INTO `r_user_exec_record` VALUES (57, 1, 100, '修改了序号为8的会员:状态修改为禁用', '172.19.0.1', 1560170023);
INSERT INTO `r_user_exec_record` VALUES (58, 1, 100, '删除了序号为8的会员', '172.19.0.1', 1560170041);
INSERT INTO `r_user_exec_record` VALUES (59, 1, 100, '创建了序号为102的代理', '172.19.0.1', 1560170103);
INSERT INTO `r_user_exec_record` VALUES (60, 1, 100, '审核了序号为102的代理:审核状态修改为通过', '172.19.0.1', 1560170106);
INSERT INTO `r_user_exec_record` VALUES (61, 1, 100, '修改了序号为102的代理:状态修改为停用', '172.19.0.1', 1560170113);
INSERT INTO `r_user_exec_record` VALUES (62, 1, 100, '编辑了序号为102的代理:登录密码修改为3,', '172.19.0.1', 1560170119);
INSERT INTO `r_user_exec_record` VALUES (63, 1, 100, '删除了序号为102的代理', '172.19.0.1', 1560170127);
INSERT INTO `r_user_exec_record` VALUES (64, 1, 100, '创建了序号为103的客服', '172.19.0.1', 1560170144);
INSERT INTO `r_user_exec_record` VALUES (65, 1, 100, '修改了序号为103的客服:状态修改为停用', '172.19.0.1', 1560170148);
INSERT INTO `r_user_exec_record` VALUES (66, 1, 100, '编辑了序号为103的客服:登录密码修改为234,', '172.19.0.1', 1560170153);
INSERT INTO `r_user_exec_record` VALUES (67, 1, 100, '创建了序号为104的代理', '172.19.0.1', 1561378808);
INSERT INTO `r_user_exec_record` VALUES (68, 1, 100, '审核了序号为104的代理:审核状态修改为通过', '172.19.0.1', 1561378814);
INSERT INTO `r_user_exec_record` VALUES (69, 1, 100, '编辑了序号为16的代理:上级代理修改为agent_3,', '172.19.0.1', 1561450226);
INSERT INTO `r_user_exec_record` VALUES (70, 1, 100, '编辑了序号为16的代理:上级代理修改为,', '172.19.0.1', 1561450236);
INSERT INTO `r_user_exec_record` VALUES (71, 1, 100, '编辑了序号为104的代理:上级代理修改为agent_7,', '172.19.0.1', 1561450254);
INSERT INTO `r_user_exec_record` VALUES (72, 1, 100, '创建了序号为105的代理', '172.19.0.1', 1561450274);
INSERT INTO `r_user_exec_record` VALUES (73, 1, 100, '创建了序号为17的会员', '172.19.0.1', 1561543121);
INSERT INTO `r_user_exec_record` VALUES (74, 1, 100, '编辑了序号为13的会员:', '172.19.0.1', 1561543488);
INSERT INTO `r_user_exec_record` VALUES (75, 1, 100, '创建了序号为53的网站公告通知', '172.19.0.1', 1561548807);
INSERT INTO `r_user_exec_record` VALUES (76, 1, 100, '编辑了序号为53的网站公告通知:标题修改为测试112,内容修改为:测试112,状态修改为禁用', '172.19.0.1', 1561548817);
INSERT INTO `r_user_exec_record` VALUES (77, 1, 100, '编辑了序号为53的网站公告通知:状态修改为正常', '172.19.0.1', 1561548824);
INSERT INTO `r_user_exec_record` VALUES (78, 1, 100, '编辑了序号为53的网站公告通知:状态修改为删除', '172.19.0.1', 1561548829);
INSERT INTO `r_user_exec_record` VALUES (79, 1, 100, '创建了序号为18的会员', '172.19.0.1', 1561548897);
INSERT INTO `r_user_exec_record` VALUES (80, 1, 100, '审核了序号为18的会员:审核状态修改为通过', '172.19.0.1', 1561548901);
INSERT INTO `r_user_exec_record` VALUES (81, 1, 100, '修改了序号为18的会员:状态修改为正常', '172.19.0.1', 1561548908);
INSERT INTO `r_user_exec_record` VALUES (82, 1, 100, '编辑了序号为18的会员:', '172.19.0.1', 1561548918);
INSERT INTO `r_user_exec_record` VALUES (83, 1, 100, '创建了序号为20的会员', '172.19.0.1', 1561553516);
INSERT INTO `r_user_exec_record` VALUES (84, 1, 100, '创建了序号为21的会员', '172.19.0.1', 1561553563);
INSERT INTO `r_user_exec_record` VALUES (85, 1, 100, '审核了序号为21的会员:审核状态修改为拒绝', '172.19.0.1', 1561553597);
INSERT INTO `r_user_exec_record` VALUES (86, 1, 100, '创建了序号为22的会员', '172.19.0.1', 1561553646);
INSERT INTO `r_user_exec_record` VALUES (87, 1, 100, '创建了序号为24的会员', '172.19.0.1', 1561553715);
INSERT INTO `r_user_exec_record` VALUES (88, 1, 100, '审核了序号为24的会员:审核状态修改为通过', '172.19.0.1', 1561553735);
INSERT INTO `r_user_exec_record` VALUES (89, 1, 100, '编辑了序号为24的会员:百家乐修改为fffff,六合彩修改为rrrrr,', '172.19.0.1', 1561553811);
INSERT INTO `r_user_exec_record` VALUES (90, 1, 100, '编辑了序号为24的会员:百家乐修改为rrrr,六合彩修改为ffffsasa,', '172.19.0.1', 1561553935);
INSERT INTO `r_user_exec_record` VALUES (91, 1, 100, '编辑了序号为24的会员:百家乐修改为rrrr,六合彩修改为sdfsdfsd,', '172.19.0.1', 1561554066);
INSERT INTO `r_user_exec_record` VALUES (92, 1, 100, '编辑了序号为24的会员:百家乐修改为rrrr,', '172.19.0.1', 1561554075);
INSERT INTO `r_user_exec_record` VALUES (93, 1, 100, '编辑了序号为24的会员:百家乐修改为rrrr,六合彩修改为sdfsdfsd,', '172.19.0.1', 1561554119);
INSERT INTO `r_user_exec_record` VALUES (94, 1, 100, '删除了序号为12的会员', '172.19.0.1', 1561554153);
INSERT INTO `r_user_exec_record` VALUES (95, 1, 100, '修改了序号为13的会员:状态修改为禁用', '172.19.0.1', 1561554157);
INSERT INTO `r_user_exec_record` VALUES (96, 1, 100, '修改了序号为13的会员:状态修改为正常', '172.19.0.1', 1561554161);
INSERT INTO `r_user_exec_record` VALUES (97, 1, 100, '审核了序号为22的会员:审核状态修改为拒绝', '172.19.0.1', 1561554186);
INSERT INTO `r_user_exec_record` VALUES (98, 1, 100, '审核了序号为7的会员:审核状态修改为通过', '172.19.0.1', 1561554192);
INSERT INTO `r_user_exec_record` VALUES (99, 1, 100, '删除了序号为104的代理', '172.19.0.1', 1561554239);
INSERT INTO `r_user_exec_record` VALUES (100, 1, 100, '创建了序号为106的代理', '172.19.0.1', 1561554258);
INSERT INTO `r_user_exec_record` VALUES (101, 1, 100, '审核了序号为106的代理:审核状态修改为通过', '172.19.0.1', 1561554262);
INSERT INTO `r_user_exec_record` VALUES (102, 1, 100, '修改了序号为106的代理:状态修改为停用', '172.19.0.1', 1561554271);
INSERT INTO `r_user_exec_record` VALUES (103, 1, 100, '修改了序号为106的代理:状态修改为正常', '172.19.0.1', 1561554274);
INSERT INTO `r_user_exec_record` VALUES (104, 1, 100, '删除了序号为106的代理', '172.19.0.1', 1561554284);
INSERT INTO `r_user_exec_record` VALUES (105, 1, 100, '修改了序号为103的客服:状态修改为正常', '172.19.0.1', 1561554293);
INSERT INTO `r_user_exec_record` VALUES (106, 1, 100, '创建了序号为108的客服', '127.0.0.1', 1572260200);
INSERT INTO `r_user_exec_record` VALUES (107, 1, 100, '删除了序号为103的客服', '127.0.0.1', 1572265642);
INSERT INTO `r_user_exec_record` VALUES (108, 1, 100, '编辑了序号为27的游戏大厅通知:标题修改为测试新增游戏大厅2,内容修改为:hahahahahhahahahaha,状态修改为正常', '127.0.0.1', 1572269004);
INSERT INTO `r_user_exec_record` VALUES (109, 2, 1, '密码修改:TVRJek5EVTI=->KioqKioq', '127.0.0.1', 1572772120);
INSERT INTO `r_user_exec_record` VALUES (110, 2, 1, '密码修改:S2lvcUtpb3E=->MTIzNDU2', '127.0.0.1', 1572772138);
INSERT INTO `r_user_exec_record` VALUES (111, 2, 1, '取款密码修改:TVRJek5EVTI=->MTIzNDU2', '127.0.0.1', 1572772185);
INSERT INTO `r_user_exec_record` VALUES (112, 2, 1, '密码修改:TVRJek5EVTI=->MTIzNDU2Nw==', '127.0.0.1', 1572772297);
COMMIT;

-- ----------------------------
-- Table structure for r_user_game
-- ----------------------------
DROP TABLE IF EXISTS `r_user_game`;
CREATE TABLE `r_user_game` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID',
  `game_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '游戏id',
  `game_account` varchar(255) NOT NULL DEFAULT '' COMMENT '游戏账号',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `create_person` int(11) unsigned NOT NULL DEFAULT '0',
  `update_person` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_user_game
-- ----------------------------
BEGIN;
INSERT INTO `r_user_game` VALUES (1, 1, 1, 'sdsdf斤斤计较', 0, 1558441960, 0, 100);
INSERT INTO `r_user_game` VALUES (2, 1, 2, 'sdfsd水电费水电费fsdf', 0, 1558441960, 0, 100);
INSERT INTO `r_user_game` VALUES (3, 2, 1, 'lierlier', 1558442001, 0, 100, 0);
INSERT INTO `r_user_game` VALUES (4, 2, 2, 'lierjinfsdf', 1558442001, 0, 100, 0);
INSERT INTO `r_user_game` VALUES (5, 8, 1, 'ddd44', 1560168981, 1560169914, 100, 100);
INSERT INTO `r_user_game` VALUES (6, 9, 2, '', 1560169878, 0, 100, 0);
INSERT INTO `r_user_game` VALUES (7, 8, 2, '', 1560169914, 0, 100, 0);
INSERT INTO `r_user_game` VALUES (8, 24, 1, 'sdsdsd', 1561553715, 1561554143, 100, 100);
INSERT INTO `r_user_game` VALUES (9, 24, 2, 'kikiki', 1561553715, 1561554143, 100, 100);
COMMIT;

-- ----------------------------
-- Table structure for r_user_login_record
-- ----------------------------
DROP TABLE IF EXISTS `r_user_login_record`;
CREATE TABLE `r_user_login_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `login_time` int(11) NOT NULL COMMENT '登录时间',
  `login_ip` varchar(255) NOT NULL COMMENT '登录ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_user_login_record
-- ----------------------------
BEGIN;
INSERT INTO `r_user_login_record` VALUES (1, 39, 1234567891, '192.182.12.12');
INSERT INTO `r_user_login_record` VALUES (2, 39, 1876577863, '187.22.12.19');
INSERT INTO `r_user_login_record` VALUES (3, 39, 1234567891, '192.182.12.12');
INSERT INTO `r_user_login_record` VALUES (4, 39, 1876577863, '187.22.12.19');
INSERT INTO `r_user_login_record` VALUES (5, 39, 1234567891, '192.182.12.12');
INSERT INTO `r_user_login_record` VALUES (6, 39, 1876577863, '187.22.12.19');
INSERT INTO `r_user_login_record` VALUES (7, 39, 1234567891, '192.182.12.12');
INSERT INTO `r_user_login_record` VALUES (8, 39, 1876577863, '187.22.12.19');
INSERT INTO `r_user_login_record` VALUES (9, 39, 1234567891, '192.182.12.12');
INSERT INTO `r_user_login_record` VALUES (10, 39, 1876577863, '187.22.12.19');
INSERT INTO `r_user_login_record` VALUES (11, 39, 1234567891, '192.182.12.12');
INSERT INTO `r_user_login_record` VALUES (12, 39, 1876577863, '187.22.12.19');
INSERT INTO `r_user_login_record` VALUES (13, 39, 1558170997, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (14, 39, 1558171804, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (15, 39, 1558171902, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (16, 39, 1558171983, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (17, 40, 1558173696, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (18, 40, 1558187613, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (19, 39, 1558244866, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (20, 39, 1558245666, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (21, 1, 1558361623, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (22, 1, 1559561570, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (23, 1, 1559650016, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (24, 1, 1560167363, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (25, 1, 1560170260, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (26, 1, 1561554214, '172.19.0.1');
INSERT INTO `r_user_login_record` VALUES (27, 1, 1572141552, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (28, 1, 1572142507, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (29, 1, 1572143148, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (30, 1, 1572755690, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (31, 1, 1572760982, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (32, 1, 1572771854, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (33, 1, 1572864974, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (34, 1, 1572869367, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (35, 1, 1572869797, '127.0.0.1');
INSERT INTO `r_user_login_record` VALUES (36, 1, 1572870033, '127.0.0.1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
