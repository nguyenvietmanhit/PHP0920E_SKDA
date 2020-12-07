<?php
/**
 * php_connect_mysql.php
 * Cách PHP tương tác với CSDL MySQL sử dụng thư viên
 * MySQLi-improve để kết nối
 * + Ngoài thư viện MySQLi này, còn có cơ chế kết nối
 * khác là PDO (PHP Data Object)
 * + MySQLi hỗ trợ cả 2 hướng code: thuần và hướng đối
 * tượng -> hướng dẫn trước, còn PDO hoàn toàn hướng
 * đối tượng
 * + MySQLi chỉ hỗ trợ kết nối tới CSDL là MySQL,
 * PDO kết nối đc hết
 * + Demo dùng code PHP để insert, select, update, delete
 * vào CSDL
 * - Tạo CSDL php0920e_mysqli:
 * CREATE DATABASE IF NOT EXISTS php0920e_mysqli
 * CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Refresh lại trình duyệt, click vào CSDL vừa tạo
 * để tạo bảng products:
 * id: khóa chính, INT(11)
 * name: tên sp
 * description: chi tiết
 * price: giá sp
 * created_at: ngày tạo
 * CREATE TABLE products(
 *   id INT(11) AUTO_INCREMENT,
 *   name VARCHAR(150),
 *   description TEXT,
 *   price INT(11) DEFAULT 0,
 *   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 *   PRIMARY KEY (id)
 * )
 *
 *
 */
// Các bước kết nối CSDL MySQL bằng PHP dùng thư viện
//MySQLi
// 1 - Khởi tạo kết nối
// Khai báo các hằng số kết nối:
// Tên server đang lưu trữ CSDL: 127.0.0.1
const DB_HOST = 'localhost';
// Username đăng nhập vào CSDL, do XAMPP tự sinh ra lúc
//cài đặt
const DB_USERNAME = 'root';
// Password đăng nhập vào CSDL, giá trị rỗng do XAMPP
//tạo ra sẵn
const DB_PASSWORD = '';
// Tên CSDL sẽ kết nối
const DB_NAME = 'php0920e_mysqli';
// Cổng kết nối CSDL
const DB_PORT = 3306;
// Các hàm mà thư viện MySQLi cung cấp có tiền tố là:
//mysqli_
$connection = mysqli_connect(DB_HOST,
    DB_USERNAME, DB_PASSWORD,
    DB_NAME,DB_PORT);
if (!$connection) {
  die('Kết nối thất bại: ' . mysqli_connect_error());
}
echo "Kết nối CSDL thành công";

// 2 - Demo truy vấn thêm dữ liệu vào bảng products
//id, name, description, price, created_at
// + Viết câu truy vấn:
$sql_insert = "
INSERT INTO products(name, description, price)
VALUES('Điện thoại Samsung', 'Mô tả chi tiết samsung', 10) 
";
// + Thực thi câu truy vấn vừa tạo, với các truy vấn
// INSERT, UPDATE, DELETE thì kết quả sau khi thực thi
// luôn là true/false
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// Cách debug khi trả về false: copy câu truy vấn vừa tạo
//, paste lên tab SQL của PHPMyadmin xem có chạy đc ko?

// 3 - Demo truy vấn cập nhật
// vd: cập nhật bản ghi có id = 1
// + Viết câu truy vấn, luôn sử dụng WHERE khi
// update/delete
$sql_update = "
UPDATE products 
SET name = 'New name', description = 'New des', price = 2
WHERE id = 1
";
// + Thực thi truy vấn, giống INSERT => true/false
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);

// 4 - Truy vấn xóa
// VD: xóa các bản ghi có id > 10
// + Viết truy vấn, với DELETE luôn phải kèm WHERE
$sql_delete = "DELETE FROM products WHERE id > 10";
// + Thực thi truy vấn, giống INSERT/UPDATE -> true/false
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);

// 5 - Truy vấn lấy dữ liệu, phức tạp nhất
// a/ Lấy nhiều bản ghi: lấy tất cả sản phẩm sắp xếp theo
// id giảm dần
// + Viết câu truy vấn
$sql_select_all = "
SELECT * FROM products ORDER BY id DESC
";
// + Thực thi truy vấn, tuy nhiên kết quả trả về ko phải
//là true/false như INSERT/UPDATE/DELETE, mà là 1 đối
//tương trung gian
$result_all = mysqli_query($connection, $sql_select_all);
//echo "<pre>";
//print_r($result_all);
//echo "</pre>";
// + Trả về mảng các sản phẩm dưới dạng mảng kết hợp,
//phải truyền hằng sau vào tham số thứ 2 của hàm
$products = mysqli_fetch_all($result_all,
    MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
foreach ($products AS $product) {
 echo
"<br /> Tên: {$product['name']}, Giá: {$product['price']}";
}

// b/ Lấy ra 1 phần tử duy nhất
//vd: lấy thông tin sản phẩm có id = 1
// + Viết câu truy vấn
$sql_select_one = "SELECT * FROM products WHERE id = 1";
// + Thực thi truy vấn, trả về đối tượng trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// + Trả về mảng 1 chiều
$product = mysqli_fetch_assoc($result_one);
echo "<pre>";
print_r($product);
echo "</pre>";
echo "<br /> 
Tên: {$product['name']}
, Giá: {$product['price']}";