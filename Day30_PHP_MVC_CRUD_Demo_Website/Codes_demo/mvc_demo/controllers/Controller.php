<?php
/**
 * controllers/Controller.php
 * Đóng vai trò là controller cha, chứa tt/pt dùng chung
 * cho mọi controller con
 */
class Controller {
  // Chứa nội dung view
  public $content;
  // Chứa lỗi
  public $error;
  // Chứa tiêu đề trang
  public $page_title;

 //Lấy nội dung view, theo cơ chế truyền biến vào view
  //1 cách tường minh
  // $file_path: đường dẫn tới file view
  // $variables: mảng dữ liệu truyền ra view
  public function render($file_path, $variables = []) {
    // Giải nén mảng các biến để dùng trong file view
    extract($variables);
    // Dùng cơ chế bộ nhớ đệm để lưu nội dung file
    // Mở bộ nhớ đệm để đánh dấu lưu nội dung file
    ob_start();
    // Nhúng file cần lấy nội dung
    require $file_path;
    // Kết thúc ghi nội dung file, trả về chuỗi chứa nội
    //dung file
    $view = ob_get_clean();
    return $view;
  }
}