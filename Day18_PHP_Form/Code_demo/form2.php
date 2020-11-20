<?php
/**
 * form2.php
 * Xử lý form với các input phức tạp
 */
// XỬ LÝ SUBMIT FORM
// - Khai báo biến lỗi và kết quả
$error = '';
$result = '';
// - Debug $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
// - Kiểm tra nếu submit form thì mới xử lý, dựa vào name
// của nút submit
if (isset($_POST['submit'])) {
  // - Tạo biến trung gian để thao tác cho dễ (option)
  $email = $_POST['email'];
  $password = $_POST['password'];
  // Chú ý: với input radio và checkbox, sẽ có trường hợp
  // ko tích vào mà submit form -> PHP sẽ ko bắt được
  // các giá trị này
  // Nên 2 khai báo sau là chưa an toàn, sẽ báo lỗi khi
  //ko có radio hoặc checkbox đc tích
//  $gender = $_POST['gender'];
//  $jobs = $_POST['jobs'];
  $country = $_POST['country'];
  // - Validate form:
  // + Email phải đúng định dạng: filter_var
  // + Password phải tối thiểu 6 ký tự: strlen
  // + Phải chọn ít nhất 1 radio: isset
  // + Phải chọn ít nhất 1 checkbox: isset
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Email phải đúng định dạng';
  } elseif (strlen($password) < 6) {
    $error = 'Password phải > 6 ký tự';
  } elseif (!isset($_POST['gender'])) {
    $error = 'Phải chọn ít nhất 1 gender';
  } elseif (!isset($_POST['jobs'])) {
    $error = 'Phải chọn ít nhất 1 jobs';
  }
  // - Xử lý logic bài toán chỉ khi ko có lỗi
  if (empty($error)) {
    $result .= "Email: $email <br />";
    $result .= "Password: $password <br />";
    //Với radio và checkbox, cần kiểm tra nếu tồn tại
    //thì mới thao tác
    if (isset($_POST['gender'])) {
      $gender = $_POST['gender'];
//      $result .= "Gender: $gender";
      // Chuyển value từ số -> text dễ hiểu với user
      switch ($gender) {
        case 1: $result .= "Gender: Nam";break;
        case 2: $result .= "Gender: Nữ"; break;
        case 3: $result .= "Gender: Khác";
      }
    }
    // Xử lý với checkbox jobs
    if (isset($_POST['jobs'])) {
      $jobs = $_POST['jobs'];
      foreach ($jobs AS $job) {
        switch ($job) {
          case 1: $result .= "Jobs: Dev";break;
          case 2: $result .= "Jobs: Tester";break;
          case 3: $result .= "Jobs: BA";
        }
      }
    }
  }
}
?>
<!--Hiển thị error và result và màn hình-->
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
  Email:
  <input type="text" name="email" value="" />
  <br />
  Mật khẩu:
  <input type="password" name="password" value="" />
  <br />
  Giới tính:
  <input type="radio" name="gender" value="1" /> Nam
  <input type="radio" name="gender" value="2" /> Nữ
  <input type="radio" name="gender" value="3" /> Khác
  <br />
  Chọn nghề nghiệp:
  <input type="checkbox" name="jobs[]" value="1" /> Dev
  <input type="checkbox" name="jobs[]" value="2" /> Tester
  <input type="checkbox" name="jobs[]" value="3" /> BA
  <br />
  Quốc gia:
  <select name="country">
    <option value="1">VN</option>
    <option value="2">Japan</option>
  </select>
  <br />
  <input type="submit" name="submit" value="Show" />
</form>
