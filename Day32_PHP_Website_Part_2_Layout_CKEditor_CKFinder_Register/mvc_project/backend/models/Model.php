<?php
/**
 * backend/models/Model.php
 * Model cha, tạo 1 thuộc tính dùng kết nối
 * CSDL cho các lớp con kế thừa tù nó
 */
require_once 'configs/Database.php';
class Model {
  public $connection;

  public function __construct() {
    $this->connection = $this->getConnection();
  }

  public function getConnection() {
    try {
      $connection = new PDO(Database::DB_DSN,
          Database::DB_USERNAME,
          Database::DB_PASSWORD);

     return $connection;
    } catch (PDOException $e) {
      die('Lỗi kết nối: ' . $e->getMessage());
    }
  }
}