/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mvc_project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-03-22 19:52:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `type` tinyint(3) DEFAULT '0' COMMENT 'Loại danh mục: 0 - Product, 1 - News',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of categories
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(255) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_name` varchar(150) DEFAULT NULL COMMENT 'Tên sp tại thời điểm đặt hàng',
  `product_price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm tương ứng tại thời điểm đặt hàng',
  `quantity` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm tương ứng tại thời điểm đặt hàng',
  KEY `order_id` (`order_id`) USING BTREE,
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of order_details
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `amount` int(11) DEFAULT NULL COMMENT 'Số lượng sản phẩm trong kho',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `seo_title` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(255) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(255) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `first_name` varchar(255) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'Last name',
  `phone` int(11) DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(255) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint(3) DEFAULT '0' COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
