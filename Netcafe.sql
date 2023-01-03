/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : nethcafe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-04-09 21:06:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `access_right`
-- ----------------------------
DROP TABLE IF EXISTS `access_right`;
CREATE TABLE `access_right` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT 'if 1 emp,if 2 customer',
  `active_stts` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of access_right
-- ----------------------------
INSERT INTO `access_right` VALUES ('1', '1', 'manager', '1234', '1', '1');
INSERT INTO `access_right` VALUES ('2', '1', 'tera', '1234', '2', '1');
INSERT INTO `access_right` VALUES ('3', '2', 'tera@gmail.com', '1234', '2', '1');
INSERT INTO `access_right` VALUES ('4', '3', 'alex@gmail.com', '1234', '2', '1');
INSERT INTO `access_right` VALUES ('5', '2', 'saman@gmail.com', '123', '1', '1');
INSERT INTO `access_right` VALUES ('6', '3', 'sanka@gmail.com', '12345', '1', '1');

-- ----------------------------
-- Table structure for `bill`
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `bill_date` datetime DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bill
-- ----------------------------
INSERT INTO `bill` VALUES ('5', '6', '2021-04-07 04:16:39', '2220');
INSERT INTO `bill` VALUES ('6', '7', '2021-04-07 04:20:23', '2580');
INSERT INTO `bill` VALUES ('7', '8', '2021-04-07 04:23:35', '340');
INSERT INTO `bill` VALUES ('8', null, '2021-04-08 07:06:22', '970');
INSERT INTO `bill` VALUES ('9', '10', '2021-04-09 05:29:28', '1990');
INSERT INTO `bill` VALUES ('10', null, '2021-04-09 05:33:56', '640');

-- ----------------------------
-- Table structure for `bill_items`
-- ----------------------------
DROP TABLE IF EXISTS `bill_items`;
CREATE TABLE `bill_items` (
  `bill_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `itmqty` int(11) DEFAULT NULL,
  PRIMARY KEY (`bill_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bill_items
-- ----------------------------
INSERT INTO `bill_items` VALUES ('9', '5', '6', '340', '3');
INSERT INTO `bill_items` VALUES ('10', '5', '7', '850', '1');
INSERT INTO `bill_items` VALUES ('11', '5', '3', '350', '1');
INSERT INTO `bill_items` VALUES ('12', '6', '4', '290', '2');
INSERT INTO `bill_items` VALUES ('13', '6', '2', '500', '4');
INSERT INTO `bill_items` VALUES ('14', '7', '6', '340', '1');
INSERT INTO `bill_items` VALUES ('44', '8', '8', '60', '2');
INSERT INTO `bill_items` VALUES ('46', '8', '7', '850', '1');
INSERT INTO `bill_items` VALUES ('47', '9', '4', '290', '1');
INSERT INTO `bill_items` VALUES ('48', '9', '7', '850', '2');
INSERT INTO `bill_items` VALUES ('49', '10', '1', '210', '2');
INSERT INTO `bill_items` VALUES ('50', '10', '8', '60', '2');
INSERT INTO `bill_items` VALUES ('51', '10', '9', '50', '2');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'terance perera', '1988-08-27', '0773565342', '1/12,habarakada,homagama', 'mptpman1988@gmail.com');
INSERT INTO `customer` VALUES ('2', 'tera perera', null, '0773565342', null, 'mptpman1988@gmail.com');
INSERT INTO `customer` VALUES ('3', 'alex', null, '0778852222', null, 'alex@gmail.com');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `emp_type` int(11) DEFAULT NULL COMMENT 'if 1 manager,if 2 cashier,if 3 delivery',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'kalugampitiya', '1988-12-15', '.', '.', '1');
INSERT INTO `employee` VALUES ('2', 'samantha perera', null, '1/12, habarakada', '0773565342', '2');
INSERT INTO `employee` VALUES ('3', 'sanka', null, '.', '0', '3');

-- ----------------------------
-- Table structure for `grn`
-- ----------------------------
DROP TABLE IF EXISTS `grn`;
CREATE TABLE `grn` (
  `grn_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `grn_qty` int(11) DEFAULT NULL,
  `grn_date` date DEFAULT NULL,
  PRIMARY KEY (`grn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grn
-- ----------------------------
INSERT INTO `grn` VALUES ('1', '8', '200', '2021-04-07');
INSERT INTO `grn` VALUES ('2', '8', '20', '2021-04-07');
INSERT INTO `grn` VALUES ('3', '9', '500', '2021-04-09');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `delivery_address` varchar(100) DEFAULT NULL,
  `date_and_time` datetime DEFAULT NULL,
  `is_processed` int(11) DEFAULT NULL COMMENT 'if 0 pending,if 1 procesing,if 2 ready to delivery,if 3cashier process,if 4 delivered',
  `pickup_stts` int(11) DEFAULT NULL COMMENT 'if 1 pickup,if 2 delivery',
  `delivery_person` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('6', '1', '2220', 'fgfgdgdf', '2021-04-07 04:15:49', '4', '2', '1');
INSERT INTO `order` VALUES ('7', '1', '2580', 'xcxcxc', '2021-04-07 04:19:54', '4', '2', '1');
INSERT INTO `order` VALUES ('8', '1', '340', '', '2021-04-07 04:23:08', '4', '1', null);
INSERT INTO `order` VALUES ('9', '3', '850', '.', '2021-04-09 05:00:32', '0', '1', null);
INSERT INTO `order` VALUES ('10', '3', '1990', '20 melborne avanue col 4', '2021-04-09 05:25:35', '4', '2', '1');

-- ----------------------------
-- Table structure for `order_items`
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `itmqty` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES ('9', '6', '6', '340', '3');
INSERT INTO `order_items` VALUES ('10', '6', '7', '850', '1');
INSERT INTO `order_items` VALUES ('11', '6', '3', '350', '1');
INSERT INTO `order_items` VALUES ('12', '7', '4', '290', '2');
INSERT INTO `order_items` VALUES ('13', '7', '2', '500', '4');
INSERT INTO `order_items` VALUES ('14', '8', '6', '340', '1');
INSERT INTO `order_items` VALUES ('15', '9', '7', '850', '1');
INSERT INTO `order_items` VALUES ('16', '10', '4', '290', '1');
INSERT INTO `order_items` VALUES ('17', '10', '7', '850', '2');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_category` int(11) DEFAULT NULL COMMENT 'if 1 breakfast,if 2 lunch,if 3 dinner',
  `product_name` varchar(60) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `active_stts` int(11) DEFAULT NULL,
  `is_stock_item` int(11) DEFAULT NULL COMMENT 'if 1 not stock item,if 2 stock item',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', 'RiceEgg', '210', '20', '0', '1');
INSERT INTO `product` VALUES ('2', '5', 'burgers', '500', '50', '1', '1');
INSERT INTO `product` VALUES ('3', '3', 'Wegi Kottu Half', '350', '10', '1', '1');
INSERT INTO `product` VALUES ('4', '1', 'Rice Chicken', '290', '20', '1', '1');
INSERT INTO `product` VALUES ('5', '1', 'Rice Vegi', '200', '20', '1', '1');
INSERT INTO `product` VALUES ('6', '1', 'Rice Mix', '340', '20', '1', '1');
INSERT INTO `product` VALUES ('7', '1', 'Sea food Rice L', '850', '15', '1', '1');
INSERT INTO `product` VALUES ('8', '0', 'Water bottle 500ml', '60', '0', '1', '2');
INSERT INTO `product` VALUES ('9', '0', 'Ambewela Yoghurt', '50', '0', '1', '2');

-- ----------------------------
-- Table structure for `product_category`
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `prod_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prod_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('1', 'Rice');
INSERT INTO `product_category` VALUES ('2', 'Noodles');
INSERT INTO `product_category` VALUES ('3', 'Kottu');
INSERT INTO `product_category` VALUES ('4', 'soups');
INSERT INTO `product_category` VALUES ('5', 'Backery');
INSERT INTO `product_category` VALUES ('6', 'Desserts');

-- ----------------------------
-- Table structure for `stock`
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `stock_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES ('1', '8', '214');
INSERT INTO `stock` VALUES ('2', '9', '498');
