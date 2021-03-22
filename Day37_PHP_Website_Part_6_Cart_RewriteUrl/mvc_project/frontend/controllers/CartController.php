<?php
//controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
  // Thêm sp vào giỏ hàng từ ajax
  public function add() {
    // Debug dựa vào method khi gọi ajax
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    $product_id = $_GET['product_id'];
    // Gọi model để lấy sp theo id
    $product_model = new Product();
    $product = $product_model->getById($product_id);
//    echo "<pre>";
//    print_r($product);
//    echo "</pre>";
    // Tạo mảng chứa các thông tin sp sẽ lưu trong
    //giỏ
    $product_cart = [
      'title' => $product['title'],
      'price' => $product['price'],
      'avatar' => $product['avatar'],
      // Số lượng sp mặc định trong giỏ
      'quantity' => 1
    ];
    // + Xử lý logic thêm sp vào giỏ
    // + Kiểm tra xem sp thêm vào giỏ đã tồn tại
    //trong giỏ hay chưa, nếu chưa -> thêm phần
    //tử mới cho giỏ, ngược lại update số lượng
    //cho sp đó
    // - Nếu Giỏ hàng chưa từng tồn tại, thì thêm
    // mới sp vào giỏ
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'][$product_id] = $product_cart;
    }
    else {
      // TH1: SP đang thêm đã tồn tại trong giỏ
      if (array_key_exists
      ($product_id, $_SESSION['cart'])) {
        // TĂng số lượng sp hiện tại lên 1
        $_SESSION['cart'][$product_id]['quantity']++;
      }
      // TH2: SP đang thêm chưa tồn tại trong giỏ
      else {
        $_SESSION['cart'][$product_id] = $product_cart;
      }
    }
    //Debug mảng giỏ hàng
//    echo "<pre>";
//    print_r($_SESSION['cart']);
//    echo "</pre>";

  }

  //Giỏ hàng của bạn
  public function index() {
    // Gọi layout để hiển thị view
    $this->content =
    $this->render('views/carts/index.php');
    require_once 'views/layouts/main.php';
  }
}