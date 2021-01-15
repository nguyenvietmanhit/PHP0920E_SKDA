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
require_once 'models/Product.php';
//index.php?controller=product&action=create
class ProductController extends Controller {

  // Xử lý thêm mới sp
  public function create() {
    // Xử lý submit form phía trên view
    // + Debug $_POST, $_FILES
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
    // + Thuộc tính lỗi đã đc khai báo ở controller cha
    // + Xử lý submit form
    if (isset($_POST['submit'])) {
      // + Tạo biến trung gian
      $name = $_POST['name'];
      $price = $_POST['price'];
      $avatar_arr = $_FILES['avatar'];
      // + Validate form:
      // Tên và giá ko dc để trống
      // File upload phải là ảnh, dung lượng <= 2Mb
      if (empty($name) || empty($price)) {
        $this->error = 'Tên hoặc giá ko đc để trống';
      } elseif ($avatar_arr['error'] == 0) {
        // + Validate phải là ảnh
        // Lấy đuôi file
        $extension = pathinfo($avatar_arr['name'],
            PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        // Tạo mảng các đuôi file ảnh hợp lệ
        $allowed = ['jpg', 'png', 'gif', 'jpeg'];
        if (!in_array($extension, $allowed)) {
          $this->error = 'Phải upload file ảnh';
        }
        // + Dung lượng phải <= 2Mb
        // 1Mb = 1024KB = 1024 * 1024 B;
        $size_mb = $avatar_arr['size'] / 1024 / 1024;
        $size_mb = round($size_mb, 2);
        if ($size_mb > 2) {
          $this->error = 'File dung lượng phải <= 2Mb';
        }
      }

      // Upload file nếu có và insert vào bảng chỉ khi
      //ko có lỗi nào
      if (empty($this->error)) {
        // + Xử lý upload file nếu có
        $avatar = '';
        if ($avatar_arr['error'] == 0) {
          // Tạo thư mục uploads
          $dir_uploads = 'assets/uploads';
          // Chỉ tạo thư mục nếu chưa tồn tại
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          // Tạo tên file upload ở dạng duy nhất
          $avatar = time() . "-" . $avatar_arr['name'];
          // Upload từ thư mục tạm của XAMPP -> đích
          move_uploaded_file($avatar_arr['tmp_name'],
              $dir_uploads . "/" . $avatar);
        }
        // + Lưu vào bảng products
        // Gọi model Product để nhờ lưu vào CSDL
        $product_model = new Product();
        // Gán giá trị từ form cho thuộc tính của model
        $product_model->name = $name;
        $product_model->price = $price;
        
        $product_model->avatar = $avatar;
        $is_insert = $product_model->insert();
//        var_dump($is_insert);
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới sp thành công';
          header
('Location: index.php?controller=product&action=index');
          exit();
        } else {
          $this->error = 'Thêm sp thất bại';
        }
      }
    }

    //Gọi view để hiển thị
    //Lấy nội dung view tương ứng, đổ vào thuộc tính
    //content của class cha
    $this->content =
    $this->render('views/products/create.php');
    // Set tiêu đề trang
    $this->page_title = 'Trang thêm mới sản phẩm';
    // Gọi layout để hiển thị các nội dung động đã set
    require_once 'views/layouts/main.php';

    //Nhờ model tương với CSDL
  }

  // Hiển thị ds sp
  //index.php?controller=product
  public function index() {
//    echo "Hàm index";
    // Gọi model lấy tất cả bản ghi đang có
    $product_model = new Product();
    $products = $product_model->getAll();
    // Tạo mảng dể truyền ra view 1 cách tường minh
    $arr_view = [
      // Key là tên biến sẽ dùng ở view
      // Value là giá trị của biến sẽ truyền ra view
      'products' => $products
    ];
    // - Lấy nội dung view tương ứng
    $this->content =
    $this->render('views/products/index.php',
        $arr_view);
    // - Gọi layout để hiển thị view vừa lấy đc
    require_once 'views/layouts/main.php';
  }

  //Xem chi tiết sp
  public function detail() {
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    // Validate tham số id
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'Id ko hợp lệ';
    header('Location: index.php?controller=product');
    exit();
    }
    $id = $_GET['id'];
    // Gọi model để lấy bản ghi tương ứng dựa theo id
    $product_model = new Product();
    $product = $product_model->getOne($id);
//    echo "<pre>";
//    print_r($product);
//    echo "</pre>";
    // Tạo mảng để truyền biến ra view
    $arr_view = [
        'product' => $product
    ];
    // LẤy nội dung view detail
    $this->content =
  $this->render('views/products/detail.php',
      $arr_view);
    // Gọi layout hiển thị nội dung view vừa lấy đc
    require_once 'views/layouts/main.php';
  }
}