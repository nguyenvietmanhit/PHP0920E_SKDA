<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';
//frontend/controllers/PaymentController.php
class PaymentController extends Controller {
  public function index() {
    // Xử lý logic submit form khi user
    //click Thanh toán
    // + Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    //
    if (isset($_POST['submit'])) {
      // - Tạo biến
      $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      $note = $_POST['note'];
      $method = $_POST['method'];
      // - Validate
      // - Xử lý logic Thanh toán chỉ khi ko
      // có lỗi xảy ra
      if (empty($this->error)) {
        // - Logic thanh toán sẽ như sau:
        // + Lưu vào bảng orders trước
        // + Lưu vào bảng order_details sau
        // + Dựa vào phương thức thanh toán để
        // chuyển hướng cho phù hợp
        // - Gọi model để lưu vào bảng orders
        $order_model = new Order();
        // Do cần lưu tiếp vào bảng order_details,
        // nên cần trả về id của order vừa insert
        // + Gán giá trị form cho thuộc tính model
        $order_model->fullname = $fullname;
        $order_model->address = $address;
        $order_model->mobile = $mobile;
        $order_model->email = $email;
        $order_model->note = $note;
        // + Tính tổng giá trị đơn hàng từ giỏ hàng
        $price_total = 0;
        foreach ($_SESSION['cart'] AS $cart) {
          $price_total +=
              $cart['quantity'] * $cart['price'];
        }
        $order_model->price_total = $price_total;
        // + Tính trạng thái đơn hàng, giả sử đơn
        //hàng khi mới đặt ở trạng thái Chưa thanh toán
        $order_model->payment_status = 0;

        $order_id = $order_model->insert();
        // - Insert tiếp vào order_details
        // 1 orders có thể có nhiều order_details
        $order_detail_model = new OrderDetail();
        foreach ($_SESSION['cart'] AS $cart) {
          // Gán các giá trị cho model
          $order_detail_model->order_id = $order_id;
          $order_detail_model->product_name = $cart['title'];
          $order_detail_model->product_price = $cart['price'];
          $order_detail_model->quantity = $cart['quantity'];
          // Lưu vào bảng order_details
          $is_insert = $order_detail_model->insert();
//          var_dump($is_insert);
        }

        // - Gửi mail cho user vừa đặt hàng

        // - Dựa vào phương thức thanh toán, để
        //chuyển hướng cho phù hợp
        // + Nếu là thanh toán trực tuyến, chuyển
        //hướng sang Ngân lượng
        // Demo: chạy thẳng file:
        //libraries/nganluong/index.php
        if ($method == 0) {
          // Tạo session lưu thông tin cần thiết
          $_SESSION['payment_info'] = [
              'price_total' => $price_total,
              'fullname' => $fullname,
              'mobile' => $mobile,
              'email' => $email,
          ];
          header
          ('Location: index.php?controller=payment&action=online');
          exit();
        }
        // + Nếu chọn COD
        else {
          // Chuyển hướng về trang cảm ơn
          header
          ('Location: index.php?controller=payment
          &action=thank');
          exit();
        }
      }
    }


    // - Lấy nội dung view
    $this->content =
    $this->render('views/payments/index.php');
    // - Gọi layout để hiển thị view
    require_once 'views/layouts/main.php';
  }

  public function online() {
    // - Lấy nội dung view
    $this->content =
    $this->render('libraries/nganluong/index.php');
    // - Ko gọi layout vì giao diện của trang thanh
    //toán là của bên thứ 3
    echo $this->content;
  }

  public function thank() {
    // Tại trang thank, cần xóa tất cả thông tin
    //về giỏ hàng
    unset($_SESSION['cart']);

    $this->content =
    $this->render('views/payments/thank.php');
    require_once 'views/layouts/main.php';
  }
}