<?php
//models/Pagination.php
// Dùng cho chức năng phân trang
class Pagination {
  public $params = [
      // Tổng số bản ghi đang có
      'total' => 0,
      // Số bản ghi hiển thị trên 1 trang
      'limit' => 0,
      // controller của chức năng tương ứng
      'controller' => '',
      // action của chức năng tương ứng
      'action' => '',
      // kiểu hiển thị phân trang, nếu = FALSE là phần
      //trang có dấu ..., ngược lại hiển thị hết
      'full_mode' => FALSE
  ];

  public function __construct($params) {
    $this->params = $params;
  }

  // Tính tổng số trang hiện tại dựa vào thuộc tính param
  public function getTotalPage() {
    // Giả sử có 42 bản ghi, hiển thị 5 bản ghi / 1 trang
    // -> 9 trang
    $total = $this->params['total']
        / $this->params['limit']; //8.4
    // Làm tròn lên 1 đơn vị
    $total = ceil($total);
    return $total;
  }

  // Lấy ra trang hiện tại
  // Dựa vào url để biết đang đứng ở trang nào
  // MVC hiện tại, url phân trang sẽ có dạng sau:
  // index.php?controller=category&action=index&page=2
  public function getCurrentPage() {
    // Mặc định nếu ko truyền tham số page lên url, thì
    //là trang đầu tiên
    $page = 1;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = $_GET['page'];
      // Validate nếu nhập số trang > tổng số trang đang có
      // gán lại bằng tổng số trang
      $total_page = $this->getTotalPage();
      if ($page >= $total_page) {
        $page = $total_page;
      }
    }
    return $page;
  }

  // Lấy ra link Trang trước / Prev
  // vd: trang hiện tại = 3, click Prev -> trang 2
  public function getPrevPage() {
    $prev_link = '';
    $page_current = $this->getCurrentPage();
    // Chỉ hiển thị link Prev nếu như trang hiện tại > 1
    if ($page_current > 1) {
      // Do sử dụng bootstrap pagination nên link cũng
      //cần theo đúng HTML của bootstrap
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      $url_prev = "index.php?controller=$controller&action=$action&page=".($page_current - 1);
      $prev_link .= "<li>";
      $prev_link .= "<a href='$url_prev'>Prev</a>";
      $prev_link .= "</li>";
    }
    return $prev_link;
  }

  // Hiển thị link Next
  public function getNextPage() {
    // Chỉ hiển thị link Next nếu như trang hiện tại
    // ko phải là trang cuối cùng
    $next_link = '';
    $current_page = $this->getCurrentPage();
    $total_page = $this->getTotalPage();
    if ($current_page < $total_page) {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      $url_next = "index.php?controller=$controller&action=$action&page=" . ($current_page + 1);
      $next_link .= "<li>";
      $next_link .= "<a href='$url_next'>Next</a>";
      $next_link .= "</li>";
    }
    return $next_link;
  }

  // Tạo cấu trúc phân trang bootrstrap
  public function getPagination() {
    $data = '';
    // Nếu chỉ có 1 trang duy nhất thì ko show phân trang
    $total_page = $this->getTotalPage();
    if ($total_page == 1) {
      return $data;
    }
    // Xây dựng cấu trúc pagination
    $data .= "<ul class='pagination'>";
    // Link phân trang đầu tiên luôn là Prev
    $prev_page = $this->getPrevPage();
    $data .= $prev_page;

    // Hiển thị các link cụ thể
    // Dựa vào full_mode để tùy chọn hiển thị phân trang
    $full_mode = $this->params['full_mode'];
    // Trường hợp hiển thị full page
    if ($full_mode) {
      for ($page = 1; $page <= $total_page; $page++) {
        // Lấy trang hiện tại, so sánh với biến lặp
        $current_page = $this->getCurrentPage();
        if ($current_page == $page) {
          $data .= "<li class='active'>";
          $data .= "<a href='#'>Trang $page</a>";
          $data .= "</li>";
        } else {
          $controller = $this->params['controller'];
          $action = $this->params['action'];
          $url_page = "index.php?controller=$controller&action=$action&page=$page";
          $data .= "<li>";
          $data .= "<a href='$url_page'>Trang $page</a>";
          $data .= "</li>";
        }
      }
    }
    // Link phân trang cuối cùng luôn là Next
    $next_page = $this->getNextPage();
    $data .= $next_page;
    $data .= "</ul>";

    return $data;
  }
}