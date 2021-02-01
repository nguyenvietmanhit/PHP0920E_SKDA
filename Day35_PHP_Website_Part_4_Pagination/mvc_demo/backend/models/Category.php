<?php
//models/Category
require_once 'models/Model.php';
class Category extends Model {
  public function getAll($params = []) {
    // Nếu tồn tại phần tử search, thì tạo chuỗi chứa
    //truy vấn LIKE
    $str_where = ' WHERE TRUE ';
    // Nếu có search thì gắn thêm điều kiện vào
    //chuỗi Where ban đầu
    if (isset($params['name'])) {
      $name = $params['name'];
      $str_where .= " AND name LIKE '%$name%' ";
    }

    // + Viết truy vấn
    $sql_select_all = "SELECT * FROM categories $str_where
ORDER BY created_at DESC";
    $obj_select_all = $this->connection
        ->prepare($sql_select_all);
    $obj_select_all->execute();
    $categories = $obj_select_all
        ->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }
}