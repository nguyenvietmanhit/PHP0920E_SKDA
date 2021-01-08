<?php
/**
 * controllers/ProductController.php
 * - Controller xử lý logic cho product
 * - Chứa class controller cùng tên với tên file
 * tương ứng -> ProductController.php ->
 * ProductController
 */
// Nhúng file Controller.php
// Chú ý: với mô hình MVC, khi nhúng file luôn phải tư
//duy là đứng từ file index.php gốc của ứng dụng để nhúng
//file
require_once 'controllers/Controller.php';

//index.php?controller=product&action=create
class ProductController extends Controller {

  // Xử lý thêm mới sp
  public function create() {
    echo "Hàm create";

    //Gọi view để hiển thị
    //Lấy nội dung view tương ứng, đổ vào thuộc tính
    //content của class cha
    $this->content =
    $this->render('views/products/create.php');
    echo "<pre>";
    print_r($this->content);
    echo "</pre>";

    //Nhờ model tương với CSDL
  }

  // Hiển thị ds sp
  //index.php?controller=product
  public function index() {
    echo "Hàm index";
  }
}