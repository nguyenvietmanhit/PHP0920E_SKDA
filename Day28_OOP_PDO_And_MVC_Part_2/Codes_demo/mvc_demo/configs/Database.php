<?php
/**
 * configs/Database.php
 * - Là class chứa các hằng số kết nối CSLD theo PDO
 * - Tạo CSDL: php0920e_mvc
 CREATE DATABASE IF NOT EXISTS php0920e_mvc
 CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Tạo 1 bảng products:
 * id, name, price, avatar, created_at
   CREATE TABLE IF NOT EXISTS products(
   id INT(11) AUTO_INCREMENT,
   name VARCHAR(150),
   price INT(11),
   avatar VARCHAR(100),
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id)
   );
 *
 */
class Database {
  const DB_DSN = 'mysql:host=localhost;dbname=php0920e_mvc;port=3306;charset=utf8';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
}