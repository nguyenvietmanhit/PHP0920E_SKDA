<?php
/**
 * controllers/CategoryController.php
 * Controller quản lý category
 */
require_once 'controllers/Controller.php';
class CategoryController extends Controller {
  public function create() {
    // Lấy nội dung view
    $this->content =
    $this->render('views/categories/create.php');
    // Gọi layout để hiển thị view
    require_once 'views/layouts/main.php';
  }
}