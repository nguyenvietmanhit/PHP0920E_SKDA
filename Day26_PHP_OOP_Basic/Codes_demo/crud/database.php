<?php
/**
 * crud/database.php
 * Mục đích: khai báo các hằng số kết nối tới CSDL và tạo ra
 * biến kết nối để sử dụng cho các chức năng khác
 * CSDL php0720e_demo
 */
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0720e_demo';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,
    DB_NAME, DB_PORT);
if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}
echo "<h1>Kết nối CSDL thành công</h1>";