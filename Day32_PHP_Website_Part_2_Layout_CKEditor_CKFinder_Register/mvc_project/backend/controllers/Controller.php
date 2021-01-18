<?php
/**
 * controllers/Controller.php
 * Controller cha, chứa thuộc tính/phương thức dùng chung
 * cho controller con
 */
class Controller {
  public $error;
  public $page_title;
  public $content; //nội dung view tương ứng

  // Lấy nội dung theo đường dẫn, có truyền biến ra view
  //1 cách tường minh
  public function render($file_path, $variables = []) {
    // - Giải nén biến để sử dụng trong view
    extract($variables);
    // - Đánh dấu bắt đầu lưu nội dung file theo cơ chế
    // dùng bộ nhớ đệm
    ob_start();
    require "$file_path";
    // - Kết thúc việc lưu file, trả về nội dung view
    return ob_get_clean();
  }
}