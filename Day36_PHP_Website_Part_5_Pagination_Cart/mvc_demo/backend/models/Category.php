<?php
//models/Category
require_once 'models/Model.php';
class Category extends Model {
  public function getCategories() {
    // - Viết truy vấn lấy dữ liệu
    $sql_select_all = "SELECT * FROM categories 
    ORDER BY created_at DESC";
    // - Cbi obj truy vấn
    $obj_select_all = $this->connection
                    ->prepare($sql_select_all);
    // - Thực thi truy vấn:
    $obj_select_all->execute();
    // - Lấy mảng dữ liệu
    $categories = $obj_select_all
        ->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }

}