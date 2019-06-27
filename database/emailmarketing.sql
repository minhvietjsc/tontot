/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : emailmarketing

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-20 01:55:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `category_id` int(10) unsigned DEFAULT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(10) unsigned DEFAULT NULL,
  `price_option` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_email` tinyint(3) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `visit` int(10) unsigned DEFAULT '0',
  `message` int(10) unsigned DEFAULT NULL,
  `is_img` tinyint(3) unsigned DEFAULT NULL,
  `is_login` tinyint(3) unsigned DEFAULT NULL,
  `unique` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ads
-- ----------------------------

-- ----------------------------
-- Table structure for ads_images
-- ----------------------------
DROP TABLE IF EXISTS `ads_images`;
CREATE TABLE `ads_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned DEFAULT NULL,
  `orignal_filename` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ads_images
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', 'Mobiles1', 'mobiles', 'fa fa-mobile', '', '1', '2018-05-08 16:42:04', '2018-05-08 16:42:04');
INSERT INTO `categories` VALUES ('2', '1', 'Mobile Phones', 'mobile-phones', null, '', '1', '2018-05-08 16:44:11', '2018-05-08 16:44:11');
INSERT INTO `categories` VALUES ('3', '1', 'Tablets', 'tablets', null, '', '1', '2018-05-08 16:44:38', '2018-05-08 16:44:38');
INSERT INTO `categories` VALUES ('4', '1', 'Accessories', 'accessories', null, '', '1', '2018-05-08 16:44:53', '2018-05-08 16:44:53');
INSERT INTO `categories` VALUES ('5', '2', 'Alcatel', 'Alcatel', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('6', '2', 'Apple', 'Apple', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('7', '2', 'BlackBerry', 'BlackBerry', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('8', '2', 'Calme', 'Calme', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('9', '2', 'Club', 'Club', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('10', '2', 'G\'Five', 'G\'Five', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('11', '2', 'Gright', 'Gright', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('12', '2', 'Haier', 'Haier', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('13', '2', 'HTC', 'HTC', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('14', '2', 'Huawei', 'Huawei', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('15', '2', 'iNew', 'iNew', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('16', '2', 'Infinix', 'Infinix', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('17', '2', 'Lenovo', 'Lenovo', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('18', '2', 'LG', 'LG', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('19', '2', 'Mobilink JazzX', 'Mobilink JazzX', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('20', '2', 'Motorola', 'Motorola', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('21', '2', 'Nokia', 'Nokia', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('22', '2', 'OPPO', 'OPPO', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('23', '2', 'QMobile', 'QMobile', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('24', '2', 'RIVO', 'RIVO', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('25', '2', 'Samsung', 'Samsung', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('26', '2', 'Sony', 'Sony', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('27', '2', 'Sony Ericsson', 'Sony Ericsson', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('28', '2', 'Vivo', 'Vivo', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('29', '2', 'VOICE', 'VOICE', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('30', '2', 'Xiaomi', 'Xiaomi', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('31', '2', 'Other Mobiles', 'Other Mobiles', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('32', '3', 'Samsung', 'Samsung', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('33', '3', 'Apple', 'Apple', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('34', '3', 'Q Tabs', 'Q Tabs', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('35', '3', 'Danny Tabs', 'Danny Tabs', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('36', '3', 'Other Tablets', 'Other Tablets', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('37', '4', 'Mobile', 'Mobile', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('38', '4', 'Tablets', 'Tablets', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('39', '0', 'Xe', 'vehicles', 'fa fa-car', '', '1', '2018-05-08 17:03:42', '2018-05-08 17:03:42');
INSERT INTO `categories` VALUES ('40', '39', 'Cars', 'Cars', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('41', '39', 'Buses, Vans & Trucks, Buses, Vans', 'Trucks', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('42', '39', 'Rickshaw & Chingchi', 'Rickshaw  & Chingchi', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('43', '39', 'Cars Accessories', 'Cars Accessories', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('44', '39', 'Spare Parts', 'Spare Parts', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('45', '39', 'Boats', 'Boats', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('46', '39', 'Tractors & Trailers', 'Tractors & Trailers', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('47', '39', 'Other Vehicles', 'Other Vehicles', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('48', '40', 'Audi', 'Audi', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('49', '40', 'BMW', 'BMW', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('50', '40', 'Changan', 'Changan', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('51', '40', 'Chevrolet', 'Chevrolet', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('52', '40', 'Classic & Antiques', 'Classic & Antiques', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('53', '40', 'Daewoo', 'Daewoo', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('54', '40', 'Daihatsu', 'Daihatsu', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('55', '40', 'FAW', 'FAW', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('56', '40', 'Honda', 'Honda', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('57', '40', 'Hyundai', 'Hyundai', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('58', '40', 'KIA', 'KIA', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('59', '40', 'Lexus', 'Lexus', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('60', '40', 'Mazda', 'Mazda', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('61', '40', 'Mercedes', 'Mercedes', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('62', '40', 'Mitsubishi', 'Mitsubishi', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('63', '40', 'Nissan', 'Nissan', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('64', '40', 'Porsche', 'Porsche', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('65', '40', 'Range Rover', 'Range Rover', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('66', '40', 'Suzuki', 'Suzuki', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('67', '40', 'Toyota', 'Toyota', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('68', '40', 'Other Brands', 'Other Brands', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('69', '44', 'Car Parts', 'Car Parts', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('70', '44', 'Other Parts', 'Other Parts', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('71', '0', 'Property for Sale', 'property-for-sale', 'fa fa-building', '', '1', '2018-05-08 17:13:05', '2018-05-08 17:13:05');
INSERT INTO `categories` VALUES ('72', '71', 'Apartments & Flats', 'Apartments  & Flats', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('73', '71', 'Houses', 'Houses', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('74', '71', 'Land & Plots', 'Land & Plots', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('75', '71', 'Portions & Floors', 'Portions  & Floors', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('76', '71', 'Shops - Offices - Commercial Space', 'Shops - Offices-Commercial Space', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('77', '74', 'Agricultural Land', 'Agricultural Land', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('78', '74', 'Commercial Plots', 'Commercial Plots', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('79', '74', 'Files', 'Files', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('80', '74', 'Industrial Land', 'Industrial Land', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('81', '74', 'Residential Plots', 'Residential Plots', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('82', '0', 'Property for Rent', 'property-for-rent', 'fa  fa-building-o', '', '1', '2018-05-08 17:18:29', '2018-05-08 17:18:29');
INSERT INTO `categories` VALUES ('83', '82', 'Apartments & Flats', 'Apartments & Flats', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('84', '82', 'Houses', 'Houses', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('85', '82', 'Land & Plots', 'Land & Plots', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('86', '82', 'Portions & Floors', 'Portions & Floors', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('87', '82', 'Roommates & Paying Guests', 'Roommates  & Paying Guests', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('88', '82', 'Shops - Offices - Commercial Space', 'Shops - Offices - Commercial Space', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('89', '82', 'Vacation Rentals - Guest Houses', 'Vacation Rentals  - Guest Houses', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('90', '0', 'Jobs', 'jobs', 'fa fa-briefcase', '', '1', '2018-05-08 17:28:53', '2018-05-08 17:28:53');
INSERT INTO `categories` VALUES ('91', '90', 'Online', 'Online', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('92', '90', 'Marketing', 'Marketing', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('93', '90', 'Advertising & PR', ' Advertising & PR', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('94', '90', 'Education', 'Education', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('95', '90', 'Customer Service', 'Customer Service', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('96', '90', 'Sales', 'Sales', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('97', '90', 'IT & Networking', 'IT & Networking', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('98', '90', 'Hotels & Tourism', 'Hotels & Tourism', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('99', '90', 'Clerical & Administration', 'Clerical & Administration', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('100', '90', 'Human Resources', 'Human Resources', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('101', '90', 'Accounting & Finance', ' Accounting & Finance', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('102', '90', 'Manufacturing', 'Manufacturing', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('103', '90', 'Medical', 'Medical', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('104', '90', 'Domestic Staff', 'Domestic Staff', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('105', '90', 'Other Jobs', 'Other Jobs', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('106', '104', 'Baby Sitter', 'Baby Sitter', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('107', '104', 'Cook', 'Cook', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('108', '104', 'Driver', 'Driver', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('109', '104', 'Gardener', 'Gardener', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('110', '104', 'Maid', 'Maid', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('111', '104', 'Patient Attendant', 'Patient Attendant', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('112', '104', 'Security Guard', 'Security Guard', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('113', '104', 'Other', 'Other', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('114', '0', 'Services', 'services', 'fa fa-user-md', '', '1', '2018-05-08 18:12:27', '2018-05-08 18:12:27');
INSERT INTO `categories` VALUES ('115', '114', 'Drivers & Taxi', 'Drivers & Taxi', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('116', '114', 'Education & Classes', ' Education & Classes', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('117', '114', 'Electronics & Computer Repair', 'Electronics  & Computer Repair', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('118', '114', 'Event Services', 'Event Services', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('119', '114', 'Health & Beauty', ' Health & Beauty', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('120', '114', 'Maids & Domestic Help', 'Maids  & Domestic Help', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('121', '114', 'Movers & Packers', ' Movers & Packers', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('122', '114', 'Other Services', 'Other Services', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('123', '114', 'Travel & Visa', ' Travel & Visa', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('124', '114', 'Web Development', 'Web Development', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('125', '114', 'Home & Office Repair', 'Home & Office Repair', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('126', '114', 'Catering & Restaurant', 'Catering & Restaurant', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('127', '114', 'Farm & Fresh Food', 'Farm  & Fresh Food', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('128', '114', 'Car Rental', 'Car Rental', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('129', '116', 'Computer', 'Computer', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('130', '116', 'Language Classes', 'Language Classes', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('131', '116', 'Music & Dance', 'Music & Dance', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('132', '116', 'Tutoring', 'Tutoring', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('133', '116', 'Other', 'Other', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('134', '117', 'Computer', 'Computer', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('135', '117', 'Home Appliances', 'Home Appliances', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('136', '117', 'Mobile', 'Mobile', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('137', '117', 'Other Electronics', 'Other Electronics', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('138', '126', 'Catering', 'Catering', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('139', '126', 'Cooked Food', 'Cooked Food', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('140', '126', 'Other', 'Other', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('141', '127', 'Eggs', 'Eggs', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('142', '127', 'Milk', 'Milk', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('143', '127', 'Fruits & Vegetables', 'Fruits & Vegetables', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('144', '127', 'Other', 'Other', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('145', '0', 'Furniture & Home Decor', 'furniture-&-home-decor', 'fa fa-bed', '', '1', '2018-05-08 18:28:40', '2018-05-08 18:28:40');
INSERT INTO `categories` VALUES ('146', '145', 'Sofa & Chairs', 'Sofa & Chairs', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('147', '145', 'Beds & Wardrobes', ' Beds & Wardrobes', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('148', '145', 'Home Decor', 'Home Decor', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('149', '145', 'Tables & Dining', 'Tables & Dining', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('150', '145', 'Garden & Outdoor', 'Garden & Outdoor', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('151', '145', 'Painting & Mirrors', 'Painting & Mirrors', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('152', '145', 'Rugs & Carpets', 'Rugs & Carpets', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('153', '145', 'Curtains & Blinds', 'Curtains & Blinds', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('154', '145', 'Office Furniture', 'Office Furniture', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('155', '145', 'Other Household Items', 'Other Household Items', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('156', '0', 'Animals', 'animals', '', '1525786511.png', '1', '2018-05-08 18:35:11', '2018-05-08 18:35:11');
INSERT INTO `categories` VALUES ('157', '156', 'Fish & Aquariums', 'Fish & Aquariums', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('158', '156', 'Birds', 'Birds', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('159', '156', 'Hens & Aseel', 'Hens & Aseel', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('160', '156', 'Cats', 'Cats', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('161', '156', 'Dogs', 'Dogs', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('162', '156', 'Livestock', 'Livestock', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('163', '156', 'Horses', 'Horses', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('164', '156', 'Pet Food & Accessories', 'Pet  Food & Accessories', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('165', '156', 'Other Animals', 'Other Animals', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('166', '161', 'Beagle', 'Beagle', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('167', '161', 'Boxer', 'Boxer', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('168', '161', 'Bulldog', 'Bulldog', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('169', '161', 'Cocker Spaniel', 'Cocker Spaniel', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('170', '161', 'Dalmatian', 'Dalmatian', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('171', '161', 'Doberman', 'Doberman', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('172', '161', 'German Shepherd', 'German Shepherd', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('173', '161', 'Golden Retriever', 'Golden Retriever', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('174', '161', 'Labrador', 'Labrador', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('175', '161', 'Other Breeds', 'Other Breeds', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('176', '161', 'Pomeranian', 'Pomeranian', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('177', '161', 'Pug', 'Pug', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('178', '161', 'Rottweiler', 'Rottweiler', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('179', '161', 'Russian Dogs', 'Russian Dogs', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('180', '162', 'Buffaloes', 'Buffaloes', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('181', '162', 'Bulls', 'Bulls', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('182', '162', 'Cows', 'Cows', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('183', '162', 'Goats', 'Goats', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('184', '162', 'Other Livestock', 'Other Livestock', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');
INSERT INTO `categories` VALUES ('185', '162', 'Sheep', 'Sheep', '', '', '1', '2018-04-30 13:08:29', '2018-04-30 13:08:29');

-- ----------------------------
-- Table structure for category_customfields
-- ----------------------------
DROP TABLE IF EXISTS `category_customfields`;
CREATE TABLE `category_customfields` (
  `category_id` int(10) unsigned DEFAULT NULL,
  `customfields_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category_customfields
-- ----------------------------
INSERT INTO `category_customfields` VALUES ('1', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('2', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('5', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('6', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('7', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('8', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('9', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('10', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('11', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('12', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('13', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('14', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('15', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('16', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('17', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('18', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('19', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('20', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('21', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('22', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('23', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('24', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('25', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('26', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('27', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('28', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('29', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('30', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('31', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('3', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('32', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('33', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('34', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('35', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('36', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('4', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('37', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('38', '2', '2018-05-09 09:50:10', '2018-05-09 09:50:10');
INSERT INTO `category_customfields` VALUES ('39', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('40', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('48', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('49', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('50', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('51', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('52', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('53', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('54', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('55', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('56', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('57', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('58', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('59', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('60', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('61', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('62', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('63', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('64', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('65', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('66', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('67', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('68', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('41', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('42', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('43', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('44', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('69', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('70', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('45', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('46', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('47', '3', '2018-05-09 09:59:56', '2018-05-09 09:59:56');
INSERT INTO `category_customfields` VALUES ('39', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('40', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('48', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('49', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('50', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('51', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('52', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('53', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('54', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('55', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('56', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('57', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('58', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('59', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('60', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('61', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('62', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('63', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('64', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('65', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('66', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('67', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('68', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('41', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('42', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('43', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('44', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('69', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('70', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('45', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('46', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('47', '4', '2018-05-09 10:01:27', '2018-05-09 10:01:27');
INSERT INTO `category_customfields` VALUES ('39', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('40', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('48', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('49', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('50', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('51', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('52', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('53', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('54', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('55', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('56', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('57', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('58', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('59', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('60', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('61', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('62', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('63', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('64', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('65', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('66', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('67', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('68', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('41', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('42', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('43', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('44', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('69', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('70', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('45', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('46', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('47', '5', '2018-05-09 10:03:15', '2018-05-09 10:03:15');
INSERT INTO `category_customfields` VALUES ('39', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('40', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('48', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('49', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('50', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('51', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('52', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('53', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('54', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('55', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('56', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('57', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('58', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('59', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('60', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('61', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('62', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('63', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('64', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('65', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('66', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('67', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('68', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('41', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('42', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('45', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('46', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('47', '9', '2018-05-09 10:08:46', '2018-05-09 10:08:46');
INSERT INTO `category_customfields` VALUES ('1', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('2', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('5', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('6', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('7', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('8', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('9', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('10', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('11', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('12', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('13', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('14', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('15', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('16', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('17', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('18', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('19', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('20', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('21', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('22', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('23', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('24', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('25', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('26', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('27', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('28', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('29', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('30', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('31', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('3', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('32', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('33', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('34', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('35', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('36', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('39', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('40', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('48', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('49', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('50', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('51', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('52', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('53', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('54', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('55', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('56', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('57', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('58', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('59', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('60', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('61', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('62', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('63', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('64', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('65', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('66', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('67', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('68', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('41', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('42', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('43', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('45', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('46', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('47', '10', '2018-05-09 10:12:16', '2018-05-09 10:12:16');
INSERT INTO `category_customfields` VALUES ('39', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('40', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('48', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('49', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('50', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('51', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('52', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('53', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('54', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('55', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('56', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('57', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('58', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('59', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('60', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('61', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('62', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('63', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('64', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('65', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('66', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('67', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('68', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('41', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('42', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('43', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('45', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('46', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('47', '11', '2018-05-09 10:21:34', '2018-05-09 10:21:34');
INSERT INTO `category_customfields` VALUES ('39', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('40', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('48', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('49', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('50', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('51', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('52', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('53', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('54', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('55', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('56', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('57', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('58', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('59', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('60', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('61', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('62', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('63', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('64', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('65', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('66', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('67', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('68', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('41', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('42', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('43', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('45', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('46', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('47', '7', '2018-05-09 11:02:51', '2018-05-09 11:02:51');
INSERT INTO `category_customfields` VALUES ('39', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('40', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('48', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('49', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('50', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('51', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('52', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('53', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('54', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('55', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('56', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('57', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('58', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('59', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('60', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('61', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('62', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('63', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('64', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('65', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('66', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('67', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('68', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('41', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('42', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('43', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('45', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('46', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('47', '6', '2018-05-09 11:04:27', '2018-05-09 11:04:27');
INSERT INTO `category_customfields` VALUES ('71', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('72', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('73', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('75', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('82', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('83', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('84', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('86', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('87', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('89', '13', '2018-05-22 14:40:46', '2018-05-22 14:40:46');
INSERT INTO `category_customfields` VALUES ('71', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('72', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('73', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('75', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('76', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('82', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('83', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('84', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('86', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('87', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('88', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('89', '14', '2018-05-22 14:42:07', '2018-05-22 14:42:07');
INSERT INTO `category_customfields` VALUES ('71', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('72', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('73', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('75', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('76', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('82', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('83', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('84', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('86', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('87', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('88', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('89', '15', '2018-05-22 14:43:03', '2018-05-22 14:43:03');
INSERT INTO `category_customfields` VALUES ('71', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('72', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('73', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('74', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('77', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('78', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('79', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('80', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('81', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('75', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('76', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('82', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('83', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('84', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('85', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('86', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('87', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('88', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('89', '16', '2018-05-22 14:45:39', '2018-05-22 14:45:39');
INSERT INTO `category_customfields` VALUES ('71', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('72', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('73', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('74', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('77', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('78', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('79', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('80', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('81', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('75', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('76', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('82', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('83', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('84', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('85', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('86', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('87', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('88', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('89', '17', '2018-05-22 14:46:07', '2018-05-22 14:46:07');
INSERT INTO `category_customfields` VALUES ('71', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('72', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('73', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('75', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('76', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('82', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('83', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('84', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('86', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('87', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('88', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('89', '12', '2018-05-22 15:42:21', '2018-05-22 15:42:21');
INSERT INTO `category_customfields` VALUES ('1', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('2', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('5', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('6', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('7', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('8', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('9', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('10', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('11', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('12', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('13', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('14', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('15', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('16', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('17', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('18', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('19', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('20', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('21', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('22', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('23', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('24', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('25', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('26', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('27', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('28', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('29', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('30', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('31', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('3', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('32', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('33', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('34', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('35', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('36', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('4', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('37', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('38', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('39', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('40', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('48', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('49', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('50', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('51', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('52', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('53', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('54', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('55', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('56', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('57', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('58', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('59', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('60', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('61', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('62', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('63', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('64', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('65', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('66', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('67', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('68', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('41', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('42', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('43', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('44', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('69', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('70', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('45', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('46', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('47', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('145', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('146', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('147', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('148', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('149', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('150', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('151', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('152', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('153', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('154', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');
INSERT INTO `category_customfields` VALUES ('155', '1', '2018-05-22 16:28:35', '2018-05-22 16:28:35');

-- ----------------------------
-- Table structure for category_groups
-- ----------------------------
DROP TABLE IF EXISTS `category_groups`;
CREATE TABLE `category_groups` (
  `category_id` int(10) unsigned DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category_groups
-- ----------------------------
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `category_groups` VALUES ('39', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from` int(10) unsigned DEFAULT NULL,
  `to` int(10) unsigned DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `user_type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_checked` tinyint(3) unsigned DEFAULT '0',
  `is_notify` tinyint(3) unsigned DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chat
-- ----------------------------

-- ----------------------------
-- Table structure for chat_setting
-- ----------------------------
DROP TABLE IF EXISTS `chat_setting`;
CREATE TABLE `chat_setting` (
  `user_id` int(10) unsigned DEFAULT NULL,
  `blocked_user` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chat_setting
-- ----------------------------

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', '1', 'HN', '2018-09-19 18:37:03', '2018-09-19 18:37:03');

-- ----------------------------
-- Table structure for customfields
-- ----------------------------
DROP TABLE IF EXISTS `customfields`;
CREATE TABLE `customfields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `user_type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inscription` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_shown` tinyint(3) unsigned DEFAULT NULL,
  `required_field` tinyint(3) unsigned DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `search` tinyint(3) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customfields
-- ----------------------------
INSERT INTO `customfields` VALUES ('1', 'Condition', 'dropdown', 'New,Used', null, null, null, null, '1', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('2', 'Warranty', 'dropdown', 'Yes,No', null, null, null, null, '1', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('3', 'Model', 'text', null, null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('4', 'Transaction Type', 'dropdown', 'Cash,Installment/Leasing', null, null, null, null, '1', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('5', 'Model Year', 'date', null, null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('6', 'Engine Capacity', 'text', null, null, null, null, null, '0', null, null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('7', 'Fuel Type', 'dropdown', 'Diesel,Petrol,CNG,Petrol & Cng,LPG,Other Fuel Type', null, null, null, null, '1', null, null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('9', 'Doors', 'dropdown', '2 Door,3 Door,4 Door, 5+ Door', null, null, null, null, '0', null, null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('10', 'Color', 'dropdown', 'Black,Blue,Brown,Burgundy,Gold,Grey,Green,Purple,Red,Silver,Tan,Teal,White,Other', null, null, null, null, '0', null, null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('11', 'KM\'s driven', 'text', null, null, null, 'numeric', 'Km', '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('12', 'Furnished', 'dropdown', 'Yes,No', null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('13', 'Bedrooms', 'dropdown', '1,2,3,4,5,6+', null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('14', 'Bathrooms', 'dropdown', '1,2,3,4,5,6,7+', null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('15', 'Floor Level', 'dropdown', 'Ground,1,2,3,4,5,6,7+', null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('16', 'Area unit', 'dropdown', 'sqfeet,sqyards,sqmeter', null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `customfields` VALUES ('17', 'Area', 'text', null, null, null, null, null, '0', '1', null, null, null, null, '2018-09-19 20:35:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for custom_field_data
-- ----------------------------
DROP TABLE IF EXISTS `custom_field_data`;
CREATE TABLE `custom_field_data` (
  `cf_data_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned DEFAULT NULL,
  `cf_id` int(10) unsigned DEFAULT NULL,
  `column_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `column_value` text COLLATE utf8_unicode_ci,
  `type` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cf_data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of custom_field_data
-- ----------------------------

-- ----------------------------
-- Table structure for custom_page
-- ----------------------------
DROP TABLE IF EXISTS `custom_page`;
CREATE TABLE `custom_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `contents` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of custom_page
-- ----------------------------

-- ----------------------------
-- Table structure for email_settings
-- ----------------------------
DROP TABLE IF EXISTS `email_settings`;
CREATE TABLE `email_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `registration_subject` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_content` text COLLATE utf8_unicode_ci,
  `status_subject` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_content` text COLLATE utf8_unicode_ci,
  `verify_success_subject` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_success_content` text COLLATE utf8_unicode_ci,
  `verify_danger_subject` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_danger_content` text COLLATE utf8_unicode_ci,
  `expiry_ads_subject` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiry_ads_content` text COLLATE utf8_unicode_ci,
  `status` tinyint(3) unsigned DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of email_settings
-- ----------------------------
INSERT INTO `email_settings` VALUES ('1', '1', 'Registration Notification', '<p>Dear <strong><span class=\"label label-info\"> %name%</span>,</strong><br /><br />Thank you for registering <strong>Your web</strong></p> <p></p> <p>Your Registration Informations are as<br /><span class=\"label label-success\">Name: %name%<br />Email:</span> <span class=\"label label-info\"> %email% </span><br /><span class=\"label label-success\">Password: </span> <span class=\"label label-danger\"> %password% </span></p>', 'Status Change Notification', '<p>Dear <strong><span class=\"label label-info\"> %name%</span>,</strong><br />Your status change to&nbsp; <span class=\"label label-warning\"> %status% </span></p> <p></p> <p>for more information contact at .....</p>', 'Identity Verified Notification', '<p>Dear&nbsp; <strong><span class=\"label label-success\"> %name% </span> </strong></p> <p></p> <p>Our team reviewed your provided information. we found your are resident of USA and now we are gooing to change your status to verified user.<br />&nbsp;</p>', 'Identity Un-verified Notification', '<p>Dear&nbsp; <strong><span class=\"label label-success\"> %name% </span> </strong></p> <p></p> <p>Our team reviewed your provided information. we found that your provided information is not correct ..</p> <p></p> <p>please resubmit your information to become verified user.</p>', null, null, '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for featured_ads
-- ----------------------------
DROP TABLE IF EXISTS `featured_ads`;
CREATE TABLE `featured_ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `normal_listing_price` int(10) unsigned DEFAULT NULL,
  `home_page_price` int(10) unsigned DEFAULT NULL,
  `home_page_days` int(10) unsigned DEFAULT NULL,
  `top_page_price` int(10) unsigned DEFAULT NULL,
  `top_page_days` int(10) unsigned DEFAULT NULL,
  `urgent_price` int(10) unsigned DEFAULT NULL,
  `urgent_days` int(10) unsigned DEFAULT NULL,
  `urgent_top_price` int(10) unsigned DEFAULT NULL,
  `urgent_top_days` int(10) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of featured_ads
-- ----------------------------

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', '39', 'TÍNH NĂNG', '', '', '2018-09-19 20:35:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for group_data
-- ----------------------------
DROP TABLE IF EXISTS `group_data`;
CREATE TABLE `group_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `group_field_id` int(10) unsigned DEFAULT NULL,
  `column_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `column_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of group_data
-- ----------------------------

-- ----------------------------
-- Table structure for group_fields
-- ----------------------------
DROP TABLE IF EXISTS `group_fields`;
CREATE TABLE `group_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of group_fields
-- ----------------------------
INSERT INTO `group_fields` VALUES ('1', '1', 'ABS', '', '1526990338.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('2', '1', 'AM/FM Radio', '', '1527049222.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('3', '1', 'Sun Roof', '', '1527049266.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('4', '1', 'Air Conditioning', '', '1527049303.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('5', '1', 'Power Windows', '', '1527049350.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('6', '1', 'Air Bags', '', '1527049399.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('7', '1', 'DVD Player', '', '1527049433.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('8', '1', 'Power Steering', '', '1527049458.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('9', '1', 'Power Locks', '', '1527049493.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('10', '1', 'Alloy Rims', '', '1527049536.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('11', '1', 'Navigation System', '', '1527049561.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');
INSERT INTO `group_fields` VALUES ('12', '1', 'Power Mirrors', '', '1527049715.png', '1', '2018-09-19 20:35:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned DEFAULT NULL,
  `identifier` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from` int(10) unsigned DEFAULT NULL,
  `to` int(10) unsigned DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `user_type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_checked` tinyint(3) unsigned DEFAULT '0',
  `is_notify` tinyint(3) unsigned DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_02_06_075523_create_ads_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_02_06_081520_create_ads_images_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_02_06_082603_create_categories_table', '1');
INSERT INTO `migrations` VALUES ('6', '2018_02_06_093447_create_category_customfields_table', '1');
INSERT INTO `migrations` VALUES ('7', '2018_02_06_093830_create_category_groups_table', '1');
INSERT INTO `migrations` VALUES ('8', '2018_02_06_094104_create_chat_table', '1');
INSERT INTO `migrations` VALUES ('9', '2018_02_06_095018_create_chat_setting_table', '1');
INSERT INTO `migrations` VALUES ('10', '2018_02_06_095428_create_city_table', '1');
INSERT INTO `migrations` VALUES ('11', '2018_02_06_095746_create_custom_field_data_table', '1');
INSERT INTO `migrations` VALUES ('12', '2018_02_06_100330_create_customfields_table', '1');
INSERT INTO `migrations` VALUES ('13', '2018_02_06_100824_create_email_settings_table', '1');
INSERT INTO `migrations` VALUES ('14', '2018_02_06_101323_create_group_data_table', '1');
INSERT INTO `migrations` VALUES ('15', '2018_02_06_101617_create_group_fields_table', '1');
INSERT INTO `migrations` VALUES ('16', '2018_02_06_102038_create_groups_table', '1');
INSERT INTO `migrations` VALUES ('17', '2018_02_06_102252_create_message_table', '1');
INSERT INTO `migrations` VALUES ('18', '2018_02_06_102500_create_price_options_table', '1');
INSERT INTO `migrations` VALUES ('19', '2018_02_06_102645_create_profile_visit_table', '1');
INSERT INTO `migrations` VALUES ('20', '2018_02_06_103121_create_region_table', '1');
INSERT INTO `migrations` VALUES ('21', '2018_02_06_103233_create_save_add_table', '1');
INSERT INTO `migrations` VALUES ('22', '2018_02_06_103634_create_setting_table', '1');
INSERT INTO `migrations` VALUES ('23', '2018_06_26_082441_create_featured_ads_table', '1');
INSERT INTO `migrations` VALUES ('24', '2018_06_27_051414_create_paypal_table', '1');
INSERT INTO `migrations` VALUES ('25', '2018_07_09_111813_create_custom_page_table', '1');
INSERT INTO `migrations` VALUES ('26', '2018_08_03_060143_create_user_rating_table', '1');
INSERT INTO `migrations` VALUES ('27', '2018_08_29_071023_create_payment_gatway_table', '1');
INSERT INTO `migrations` VALUES ('28', '2018_09_07_064944_create_mobile_verify_table', '1');
INSERT INTO `migrations` VALUES ('29', '2018_09_12_094335_create_mobile_code_table', '1');

-- ----------------------------
-- Table structure for mobile_code
-- ----------------------------
DROP TABLE IF EXISTS `mobile_code`;
CREATE TABLE `mobile_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mobile_code
-- ----------------------------

-- ----------------------------
-- Table structure for mobile_verify
-- ----------------------------
DROP TABLE IF EXISTS `mobile_verify`;
CREATE TABLE `mobile_verify` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `twilio_sid` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `twilio_token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `twilio_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `twilio_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mobile_verify
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for payment_gatway
-- ----------------------------
DROP TABLE IF EXISTS `payment_gatway`;
CREATE TABLE `payment_gatway` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stripe_publishable_key` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of payment_gatway
-- ----------------------------

-- ----------------------------
-- Table structure for paypal
-- ----------------------------
DROP TABLE IF EXISTS `paypal`;
CREATE TABLE `paypal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of paypal
-- ----------------------------

-- ----------------------------
-- Table structure for price_options
-- ----------------------------
DROP TABLE IF EXISTS `price_options`;
CREATE TABLE `price_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `options` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of price_options
-- ----------------------------

-- ----------------------------
-- Table structure for profile_visit
-- ----------------------------
DROP TABLE IF EXISTS `profile_visit`;
CREATE TABLE `profile_visit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ads_view` int(10) unsigned DEFAULT NULL,
  `profile_view` int(10) unsigned DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profile_visit
-- ----------------------------

-- ----------------------------
-- Table structure for region
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES ('1', 'Miền bắc', '2018-09-19 18:34:22', '2018-09-19 18:34:22');

-- ----------------------------
-- Table structure for save_add
-- ----------------------------
DROP TABLE IF EXISTS `save_add`;
CREATE TABLE `save_add` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of save_add
-- ----------------------------

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nav_bg` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body_bg` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_bg` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copy_right_text` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `live_chat` tinyint(3) unsigned DEFAULT '1',
  `search_ads` tinyint(3) unsigned DEFAULT '1',
  `search_ads_p` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `search_adsense` text COLLATE utf8_unicode_ci,
  `profile_ads` tinyint(3) unsigned DEFAULT '1',
  `profile_ads_p` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_adsense` text COLLATE utf8_unicode_ci,
  `single_ads` tinyint(3) unsigned DEFAULT '1',
  `single_ads_p` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `single_adsense` text COLLATE utf8_unicode_ci,
  `home_ads` tinyint(3) unsigned DEFAULT '1',
  `home_ads_p` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_adsense` text COLLATE utf8_unicode_ci,
  `footer_head_color` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_link_color` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_place` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(199) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_conf` tinyint(4) DEFAULT NULL,
  `map_listings` tinyint(4) DEFAULT NULL,
  `hide_price` tinyint(4) DEFAULT NULL,
  `translate` tinyint(4) DEFAULT NULL,
  `social_links` tinyint(4) DEFAULT '0',
  `facebook` varchar(199) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(199) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(199) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleplus` varchar(199) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_verify` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'Xephao.vn', '1527489290.png', '#e8e8e8', '#ffffff', '#ebebeb', '© 2018 Nimble Ads All  rights reserved', '1', '1', null, null, '1', null, null, '1', null, null, '1', null, null, '#000000', '#000000', '1.10', '$', 'left', 'info@mail.com', null, '1', '0', '0', '0', null, null, null, null, '1', '2018-09-19 20:35:00', '2018-09-19 15:05:53');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('u','adm','c') COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `comune_id` int(10) unsigned DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('f','m') COLLATE utf8_unicode_ci NOT NULL,
  `plain_password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `is_login` tinyint(3) unsigned DEFAULT NULL,
  `id_card` longtext COLLATE utf8_unicode_ci,
  `is_verified` tinyint(3) unsigned DEFAULT NULL,
  `chat_lock` tinyint(3) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT NULL,
  `mobile_verify` tinyint(3) unsigned DEFAULT NULL,
  `login_update` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Supper Admin', 'admin@xephao.vn', '$2y$10$UWRvFt8OHEyH3DolmFCwHefs8q3dOhAkJNi2qJ5Ys5uMjhhvcii0m', null, null, null, 'adm', null, null, null, null, null, null, null, 'f', '', '1', null, null, null, '1', '1', '2018-09-19 15:33:24', 'KSJB3u567qC7vuoRTqBSFyqzERfS0BsiqpRJznapRCTjYbsuI55ybohZt5X3', '2018-09-19 21:01:27', '2018-09-19 15:33:24');
INSERT INTO `users` VALUES ('2', 'Test1', 'test@gmail.com', '$2y$10$U8VzKDdeRNtpIHHM5R.4o.ub8e/B/o35eG30mU1P3aYraVb9zqG86', null, null, null, 'u', null, null, null, null, null, null, null, 'f', 'admin!@#', null, null, null, null, '0', null, null, null, '2018-09-19 16:18:09', '2018-09-19 16:42:33');

-- ----------------------------
-- Table structure for user_rating
-- ----------------------------
DROP TABLE IF EXISTS `user_rating`;
CREATE TABLE `user_rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `by_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_rating
-- ----------------------------
