<?php
//controllers/CategoryController.php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
class CategoryController extends Controller {

  public function index() {
    // Xử lý tìm kiếm
    // Debug
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    // + Tạo mảng chứa các tham số search nếu có
    $params = [];
    if (isset($_GET['search'])) {
      $params['name'] = $_GET['name'];
    }
    // Nhờ model lấy bản ghi category
    $category_model = new Category();
    // Truyền mảng param vào getAll
    $categories = $category_model->getAll($params);
    // Lấy nội dung view
    $this->content =
    $this->render('views/categories/index.php', [
        'categories' => $categories
    ]);
    // Gọi layout để hiển thị
    require_once 'views/layouts/main.php';
  }
}


