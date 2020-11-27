<?php
session_start();
/**
 * form_login.php
 * login/
 *      /form_login.php:
 *      form đăng nhập: username,pass,ghi nhớ đăng nhập
 *      /welcome.php: hiển thị username vừa đăng nhập
 *      /logout.php: đăng xuất user
 */
// Nếu đăng nhập rồi thì ko cho truy cập lại form
//login nữa
if (isset($_SESSION['username'])) {
  $_SESSION['success'] = 'Bạn đã đăng nhập';
  header('Location: welcome.php');
  exit();
}

//XỬ LÝ FORM LOGIN
// + Debug $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo biến chứa lỗi, ko cần biến kết quả vì hiển thị
//kết quả sẽ ở 1 trang khác
$error = '';
// + Nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian
  $username = $_POST['username'];
  $password = $_POST['password'];
  //gán sau sẽ báo lỗi nếu ko tích vào checkbox
//  $remember = $_POST['remember'];
  // + Validate form:
  // Username phải là email: filter_var
  // Password ko đc để trống: empty
  if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $error = "Username phải là email";
  } elseif (empty($password)) {
    $error = 'Phải nhập password';
  }
  // + Xử lý logic bài toán chỉ ko có lỗi xảy ra
  if (empty($error)) {
    // Xử lý login, giả sử login thành công nếu thỏa mãn:
    // + Username, password đều có ít nhất 3 ký tự: strlen
    // Sau khi login thành công, chuyển hướng sang file
    //welcome.php, hiển thị message tại file đó
    if (strlen($username) >= 3 && strlen($password) >= 3) {
//      $result = 'Đăng nhập thành công';
//      Do giá trị đc sinh ra ở file hiện tại, nhưng lại
      // dc sử dụng ở 1 file khác, nên sẽ dùng biến
      //dạng session để lưu
      $_SESSION['success'] = 'Đăng nhập thành công';
      $_SESSION['username'] = $username;
      // Hàm chuyển hướng sang url khác
      header('Location: welcome.php');
      //Luôn sử dụng exit() sau header
      exit();
    } else {
      $error = 'Sai tài khoản hoặc mật khẩu';
    }
  }
}
?>
<?php
//Hiển thị session error
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
  //Sau khi hiển thị -> xóa
  unset($_SESSION['error']);
}
?>
<!--- Hiển thị lỗi ra màn hình-->
<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
  Username:
  <input type="text" name="username" value="" />
  <br />
  Password:
  <input type="password" name="password" />
  <br />
  Ghi nhớ mật khẩu
<!--  Nếu chỉ có 1 checkbox duy nhất trong form thì
ko cần name dạng mảng-->
  <input type="checkbox" name="remember" value="1" />
  <br />
  <input type="submit" name="submit" value="Login" />
</form>
