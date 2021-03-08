<?php
//models/Category
require_once 'models/Model.php';
class Category extends Model {
  public function getCategories($params_model = []) {
    // Tạo biến trung gian
    $start = $params_model['start'];
    $limit = $params_model['limit'];
    // - Viết truy vấn lấy dữ liệu
    $sql_select_all = "SELECT * FROM categories 
    ORDER BY created_at DESC LIMIT $start, $limit";
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

  public function getTotalCategory() {
    // - Viết truy vấn
    $sql_select_count = "SELECT COUNT(id) AS count_id
FROM categories";
    // - Cbi obj truy vấn
    $obj_select_count = $this->connection
        ->prepare($sql_select_count);
    // - Thưc thi
    $obj_select_count->execute();
    // - Trả về mảng kết hợp
//    $category = $obj_select_count
//        ->fetch(PDO::FETCH_ASSOC);
    // - Nếu kết quả trả về chỉ có 1 cột duy nhất, muốn
    //lấy ra giá trị của cột này thì dùng cách sau
    $total = $obj_select_count->fetchColumn();
    return $total;
  }
}