<?php
/**
 * pdo.php
 * KẾT NỐI CSDL THEO CƠ CHẾ PDO
 * - PHP Data Object -> cơ chế kết nối CSDL
 * - PDO kết nối nhiều CSDL, MySQLi chỉ kết nối đc
 * với CSDL MySQL
 * - PDO viết hoàn toàn theo OOP -> khó nhớ hơn MySQLi
 * - PDO bảo mật hơn MySQLi bởi cơ chế bind param vào
 * câu truy vấn
 * - Các framework/cms thường dùng PDO
 * - Các bước kết nối giống với MySQLi
 */
// 1 - Khởi tạo kết nối
// + DSN - Data source name - chuỗi kết nối theo PDO
// ko chứa dấu cách
const DB_DSN = 'mysql:host=localhost;dbname=php0920e_oop;port=3306;charset=utf8';
// + Username
const DB_USERNAME = 'root';
// + Password
const DB_PASSWORD = '';

// Với PDO nên khởi tạo kết nối trong try catch
try {
  $connection = new PDO(DB_DSN,
      DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
  die("Lỗi: " . $e->getMessage());
}
echo "<h2>Kết nối theo PDO thành công</h2>";

// 2 - Truy vấn INSERT
// + Viết câu truy vấn, với các trường có kiểu dữ liệu
//là chuỗi bắt buộc cần phải chống SQLInjection, bằng
//cách bind param/tạo tham số trong câu truy vấn
// Ko cần thể hiện giá trị của tham số trong chuỗi
$sql_insert = "INSERT INTO books(name, amount)
VALUES (:name, :amount)";

// + Chuẩn bị đối tượng truy vấn
$obj_insert = $connection->prepare($sql_insert);

// + Tạo mảng để truyền giá trị thật cho tham số trong
//câu truy vấn
//Là bước trung gian, chỉ sinh ra nếu câu truy vấn
//có tham số
// Số phần tử mảng đúng bằng số lượng tham số trong câu
//truy vấn
$inserts = [
    ':name' => 'Book PDO 1',
    ':amount' => 100
];
// + Thực thi đối tượng truy vấn, với INSERT/UPDATE/
//DELETE -> boolean
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);
// 3 - Truy vấn UPDATE
// + Viết câu truy vấn, sử dụng tham số trong câu
//truy vấn cho giá trị của trường name
$sql_update = "UPDATE books SET name=:name, amount=20
WHERE id=1";
// + Cbi đối tượng truy vấn
$obj_update = $connection->prepare($sql_update);
// + Tạo mảng để truyền giá trị thật cho câu truy vấn
$updates = [
    ':name' => 'Name 1 PDO'
];
// + Thực thi đối tượng truy vấn trên
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 4 - Truy vấn DELETE: xóa bản ghi có id > 5
// + Viết truy vấn: ko cần tham số
$sql_delete = "DELETE FROM books WHERE id > 5 ";
// + Cbi đối tượng truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// + Bỏ qua bước tạo mảng trung gian vì câu truy vấn
// ko có tham số nào
// + Thực thi đối tượng truy vấn
$is_delete = $obj_delete->execute();
var_dump($is_delete);