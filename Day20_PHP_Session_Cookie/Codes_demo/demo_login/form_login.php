<?php
session_start();
/**
 * form_login.php
 * Tạo cấu trúc file/thư mục như sau:
 * demo_login
 *           /form_login.php: hiển thị form login:
 * username, password, ghi nhớ đăng nhập
 *           /home.php: hiển thị username vừa
 * đăng nhập và thời gian hiện tại + Link Logout
 */

// + xử lý nếu đã tồn tại cookie username và password, tương
//đương chức năng Ghi nhớ đăng nhập, cho phép user đăng nhập
if (isset($_COOKIE['username'])
    && isset($_COOKIE['password'])) {
    //cần set session username nếu ko sẽ bị chuyển hướng
  //vô hạn -> die trang
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['success'] = 'Tự động login thành công';
    header('Location: home.php');
    exit();
}

// + Xử lý hiển thị session success nếu có
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

// + Xử lý nếu user đăng nhập r thì ko cho truy cập lại form
//login, dựa vào session username
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
    header('Location: home.php');
    exit();
}

// XỬ LÝ SUBMIT FORM
// + Debug mảng $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + Kiểm tra nếu submit form thì mới xử lý
if (isset($_POST['login'])) {
  // + Gán biến trung gian
  $username = $_POST['username'];
  $password = $_POST['password'];
  //chú ý với radio và checkbox sẽ có trường hợp
  //ko tích -> PHP ko bắt đc key tương ứng
//  $remember_me = $_POST['remember_me'];
  // + Validate form:
  // - username, password ko đc để trống
  // - username phải nhập ít nhất 3 ký tự
  if (empty($username) || empty($password)) {
    $error = 'Username, password ko đc để trống';
  } elseif (strlen($username) < 3) {
    $error = 'Username phải nhập ít nhất 3 ký tự';
  }
  // + Xử lý login chỉ khi nào ko có lỗi xảy ra
  if (empty($error)) {
    //Giả sử login thành công khi password = 123
    if ($password == 123) {
      //+ Xử lý checkbox ghi nhớ đăng nhập chỉ khi user đăng
      //nhập thành công, dùng cookie để lưu lại 2 thông tin
      //username và password chỉ khi checkbox đc tích
      if (isset($_POST['remember_me'])) {
          setcookie('username', $username, time() + 3600);
          //demo dùng mã hóa md5 để mã hóa password trc khi lưu cookie
          setcookie('password', md5($password),
              time() + 3600);
      }
//      die;

      //Hiển thị username tại file home.php, sử
      //dụng session để lưu lại username sau đó
      // mới chuyển hướng sang file home.php
      $_SESSION['username'] = $username;
      $_SESSION['success'] = 'Login thành công';
      //chuyển hướng
      header('Location: home.php');
      //kết thúc chuyển hướng luôn dùng hàm exit
      //để đảm bảo chuyển hướng thành công trong
      //mọi trường hợp
      exit();
    } else {
      $error = 'Sai username/password';
    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
  Username:
  <input type="text" name="username" value="" />
  <br />
  Password:
  <input type="password" name="password" value="" />
  <br />
<!-- Nếu checkbox mà chỉ có đúng 1 giá trị, thì
 ko cần name ở dạng mảng-->
  <input type="checkbox" name="remember_me"
         value="1" /> Ghi nhớ đăng nhập
  <br />
  <input type="submit" name="login"
         value="Đăng nhập" />
</form>
