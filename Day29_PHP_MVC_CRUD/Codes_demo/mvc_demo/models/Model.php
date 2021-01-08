<?php
require_once 'configs/Database.php';
/**
 * models/Model.php
 * Model cha, chứa thuộc tính kết nối dùng chung
 * cho các model con
 */
class Model {
  // Đối tượng kết nối CSDL
  public $connection;

  // Khởi tạo thuộc tính connection bằng hàm khởi tạo
  public function __construct() {
    $this->connection = $this->getConnection();
  }

  // Phương thức kết nối CSDL theo PDO
  public function getConnection() {
    // Sử dụng try catch khi dùng PDO
    try {
      $connection = new PDO(Database::DB_DSN,
          Database::DB_USERNAME,
          Database::DB_PASSWORD);

      return $connection;
    } catch (PDOException $e) {
      die("Lỗi kết nối: " . $e->getMessage());
    }
  }
}