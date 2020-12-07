<?php
/**
 * crud/database.php
 * Kết nối CSDL dùng thư viện MySQLi, dùng cho các chức
 * năng khác
 */
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0920e_crud';
const DB_PORT = 3306;
// Kết nối
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die('Lỗi kết nối: ' . mysqli_connect_error());
}
echo "<h2>Kết nối thành công</h2>";
/**
 * - Tạo CSDL php0920e_crud
 * CREATE DATABASE IF NOT EXISTS php0920e_crud
 * CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Tạo bảng products: id, name, avatar, price,
 * created_at (lưu tên file ảnh vào trường avatar)
 *
 * CREATE TABLE products(
 *   id INT(11) AUTO_INCREMENT,
 *   name VARCHAR(150),
 *   avatar VARCHAR(100),
 *   price INT(11) DEFAULT 0,
 *   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 *   PRIMARY KEY (id)
 * );
 */