<?php
/**
 * Chữa bài tập 6 ngày 18
 */
// + Debug mảng liên quan đến phương thức của form
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Khai báo các biến chứa lỗi và thành công
$error = '';
$result = '';
// + Kiểm tra nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo các biến trung gian cho dễ thao tác
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $url = $_POST['url'];
  $message = $_POST['message'];
  // + Validate form:
  // - Tất cả các trường ko đc để trống: empty
  // - Email phải đúng định dạng: filter_var FILTER_VALIDATE_EMAIL
  // - Mobile phải là số: is_numeric
  // - Url phải đúng định dạng: https://google.vn: filter_var
  // - Message phải nhập ít nhất 5 ký tự trở lên: strlen
  if (empty($fullname) || empty($email) || empty($mobile)
  || empty($url) || empty($message)) {
    $error = 'Các trường ko đc để trống';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Email ko đúng định dạng';
  } elseif (!is_numeric($mobile)) {
    $error = 'Mobile phải là số';
  } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
    $error = 'Url không đúng định dạng';
  } elseif (strlen($message) < 5) {
    $error = 'Biến message phải > 5= ký tự';
  }
  // + Xử lý logic bài toán chỉ khi nào ko có lỗi xảy ra
  if (empty($error)) {
    // Hiển thị các giá trị vừa nhập
    $result = "Các bạn sẽ tự code phần này";
  }
}
?>
<!--Hiển thị 2 biến error và result ra màn hình-->
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!--Đổ lại giá trị đã nhập ra form-->
<form method="post" action="" >
  <input type="text" name="fullname" placeholder="Your name"
  value=
"<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''; ?>" />
  <br />
  <input type="text" name="email"
         placeholder="Your Email Address" value="" />  <br />
  <input type="text" name="mobile"
         placeholder="Your Phone Number" value="" />  <br />
  <input type="text" name="url"
         placeholder="Url website" value="" />  <br />
  <textarea name="message" placeholder="Type message"></textarea>  <br />
  <input type="submit" name="submit" value="Submit" />
</form>
