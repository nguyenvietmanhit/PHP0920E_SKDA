<?php
//controllers/UserController.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {

  // Đăng ký tài khoản user
  // index.php?controller=user&action=register
  public function register() {
    // Xử lý đăng ký user
    // + Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['register'])) {
      // + Tạo biến và gán giá trị
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password_confirm = $_POST['password_confirm'];
      // + Validate:
      // Tất cả các trường ko đc để trống
      // Password phải trùng nhau
      if (empty($username) || empty($password) ||
      empty($password_confirm)) {
        $this->error = 'Phải nhập tất cả trường';
      } else if ($password != $password_confirm) {
        $this->error = 'Password nhập lại chưa đúng';
      }
      // + Xử lý logic bài toán chỉ ko có lỗi
      if (empty($this->error)) {
        // Gọi model User để nhờ Model tương tác với
        // CSDL -> theo đúng mô hình MVC
        $user_model = new User();
        // + CHeck nếu username chưa tồn tại trong bảng
//        users thì mới đky
        $is_username_exists =
            $user_model->isExistsUsername($username);
//        var_dump($is_username_exists);
        if ($is_username_exists) {
          $this->error = 'Username đã tồn tại, ko thể đky';
        } else {
          // + Đky user
          // Cần mã hóa mật khẩu trước khi lưu, sử dụng
          //cơ chế dạng md5 để mã hóa, md5 chỉ dùng để
          //demo, ko có tính ứng dụng thực tế
          $password = md5($password);
          $is_register = $user_model
              ->resgiter($username, $password);
          var_dump($is_register);
          if ($is_register) {
            $_SESSION['success'] = 'Đăng ký thành công';
            header('Location: index.php?controller=user&action=login');
            exit();
          }
        }
      }
    }

    // - Lấy nội dung view
    $this->content =
    $this->render('views/users/register.php');
    // - Gọi layout để hiển thị  nội dung view trên
    require_once 'views/layouts/main_login.php';
  }
}