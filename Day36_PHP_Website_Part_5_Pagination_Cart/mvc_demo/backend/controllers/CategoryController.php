<?php
//controllers/CategoryController.php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class CategoryController extends Controller {

  public function index() {
    // Demo chức năng phân trang
    // - Không thể thiếu với các màn hình danh sách
    // - NẾu ko phân trang, có 1 triệu bản ghi -> hiển thị
    // -> site die
    // - Nếu có phân trang, thì mỗi lần truy vấn chỉ lấy
    // tầm 10 bản ghi, chia thành các trang
    // - Dựng 1 class chuyên dùng cho phân trang, sử dụng
    // component phân trang của bootstrap

    // Hiển thị cấu trúc phân trang với dữ liệu tĩnh từ
    // class Pagination vừa xây dựng
    // controllers/CategoryController.php

    // - Đếm tất cả bản ghi đang có trong bảng categories
    $category_model = new Category();
    $total = $category_model->getTotalCategory();
//    var_dump($total);
    $limit = 1;
    $params = [
        'total' => $total, // tổng số bản ghi
        'limit' => $limit, // số bản ghi hiển thị trên 1 trang
        'controller' => 'category',
        'action' => 'index',
        'full_mode' => FALSE
    ];
    // Do class PAgination có hàm khởi tạo với 1 tham số
    //truyền vào,nên lúc khởi tạo đối tượng cần phải
    //truyền vào tương ứng
    $pagination = new Pagination($params);
    $data = $pagination->getPagination();
//    echo $data;

    // - Cần xử lý lại cơ chế lấy dữ liệu khi có
    // phân trang bằng cách truyền tham số nào đó
    // vào phương thức lấy dữ liệu
    // - VD: tổng = 10 bản ghi, mỗi trang có 2 bản ghi
    // -> 5 trang
    // - Trang đầu tiên = 1: 1 - 2
    // - Trang thứ 2: 3 - 4
    // - Trang thứ 3: 5 - 6
    // => sử dụng truy vấn LIMIT để lấy bản ghi từ vị
    //trí nào
    // SELECT * FROM categories LIMIT 0,2 => lấy 2 bản
    //ghi tính từ vị trí đầu tiên
    // - Số bản ghi sẽ lấy = limit = 2
    // - Tính vị trí bắt đầu lấy bản ghi dựa vào tham số
    // page truyền lên url
    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    // Tính vị trí lấy bản ghi dựa vào trang hiện tại
    // page = 1, start = 0 - 1, limit = 2
    // page = 2, start = 2 - 3, limit = 2
    // page = 3, start = 4 - 5, limit = 2
    // -> công thức start = (page - 1) * limit
    $start = ($page - 1) * $limit;
    // Tạo 1 mảng tham số để truyền vào phương thức lấy
    //dữ liệu
    $params_model = [
      'limit' => $limit,
      'start' => $start
    ];
    // Gọi model lấy tất cả danh mục
    $category_model = new Category();
    $categories = $category_model
        ->getCategories($params_model);
    // - Gọi view để hiển thị ra
    $this->content = $this
        ->render('views/categories/index.php', [
            'categories' => $categories,
            'data' => $data
        ]);
    require_once 'views/layouts/main.php';
  }
}


