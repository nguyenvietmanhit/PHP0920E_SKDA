<?php
/**
 * controllers/ProductController.php
 * - Controller xử lý logic cho product
 * - Chứa class controller cùng tên với tên file
 * tương ứng -> ProductController.php ->
 * ProductController
 */
//index.php?controller=product&action=create
class ProductController {

  // Xử lý thêm mới sp
  public function create() {
    echo "Hàm create";
  }

  // Hiển thị ds sp
  //index.php?controller=product
  public function index() {
    echo "Hàm index";
  }
}