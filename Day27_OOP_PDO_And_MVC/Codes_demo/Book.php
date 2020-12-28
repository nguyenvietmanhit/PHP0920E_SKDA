<?php
/**
 * Book.php
 * Tạo ứng dụng CRUD sách  theo OOP
 * + Tạo CSDL: php0920e_oop
    CREATE DATABASE php0920e_oop
    CHARACTER SET utf8 COLLATE utf8_general_ci;
 * + Tạo bảng books: id, name, amount
    CREATE TABLE books(
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(100),
    amount INT(11),
    PRIMARY KEY (id)
   );
 */
// - Dựa theo OOP -> lấy đối tượng book làm trọng tâm
//để phân tích thuộc tính/phương thức có thể có
// + Thuộc tính: id, name, amount, connection
// + Phương thức: crud, kết  nối csdl
class Book {
  // Khai báo hằng cho class, bắt buộc phải dùng const
  const DB_HOST = 'localhost';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
  const DB_NAME = 'php0920e_oop';
  const DB_PORT = 3306;

  // Khai báo các thuộc tính, có bao nhiêu trường trong
  //bảng -> bấy nhiêu thuộc tính
  public $id; // mã sách
  public $name; // tên sách
  public $amount; //số sách trong kho
  public $connection; //biến kết nối
  // Khai báo phương thức

  // Phương thức khởi tạo để khởi tạo kết nối CSDL
  //cho chính thuộc tính connection của class
  public function __construct() {
    $this->connection = $this->connect();
  }
  // Thêm mới sách
  public function create() {
    // - Viết câu truy vấn
    $sql_insert = "INSERT INTO books(name, amount)
VALUES('$this->name', $this->amount)";
    // - Thực thi truy vấn
    $is_insert = mysqli_query($this->connection,
        $sql_insert);
    return $is_insert;
  }
  // Sửa
  public function edit($id) {

  }
  // Xóa
  public function delete($id) {
    // - Viết truy vấn
    $sql_delete = "DELETE FROM books WHERE id = $id";
    // - Thực thi
    $is_delete = mysqli_query($this->connection,
        $sql_delete);
    return $is_delete;
  }
  // Liệt kê
  public function index() {

  }

  //Kết nối CSDL theo MySQLi
  public function connect() {
    // Gọi hằng trong nội bộ class giống hệt gọi tt/pt
    // static
    $connection = mysqli_connect(Book::DB_HOST,
        Book::DB_USERNAME, Book::DB_PASSWORD,
        Book::DB_NAME, Book::DB_PORT);
    if (!$connection) {
      die('Lỗi: ' . mysqli_connect_error());
    }
    echo "<h2>Kết nối thành công</h2>";
    return $connection;
  }
}
// Khởi tọa đối tượng
$book = new Book();
// Test kết nối tới CSDL
$book->connect();


// Thêm mới dữ liệu
// Truyền dữ liệu thật cho $book

$book->name = 'Book 1';
$book->amount = 30;
$is_insert = $book->create();
var_dump($is_insert);

// Xóa 1 vài dữ liệu
$is_delete1 = $book->delete(1);
$is_delete2 = $book->delete(2);

