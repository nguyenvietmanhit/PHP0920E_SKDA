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
    $params = [
        'total' => 42,
        'limit' => 5,
        'controller' => 'category',
        'action' => 'index',
        'full_mode' => TRUE
    ];
    // Do class PAgination có hàm khởi tạo với 1 tham số
    //truyền vào,nên lúc khởi tạo đối tượng cần phải
    //truyền vào tương ứng
    $pagination = new Pagination($params);
    $data = $pagination->getPagination();
    echo $data;

    // Gọi model lấy tất cả danh mục
    $category_model = new Category();
    $categories = $category_model->getCategories();
    // - Gọi view để hiển thị ra
    $this->content = $this
        ->render('views/categories/index.php', [
            'categories' => $categories
        ]);
    require_once 'views/layouts/main.php';
  }
}


