<?php
/**
 * process_form.php
 * Quy trình xử lý form
 * - Khai báo HTML form
 */

// Luôn viết code xử lý form trên khai báo HTML form, để
//form html có thể sử dụng lại các biến từ PHP nếu cần
// - Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// - Debug biến chứa thông tin form gửi lên: $_GET
echo "<pre>";
print_r($_GET);
echo "</pre>";
// - Kiểm tra nếu submit form thì mới xử lý, dựa vào
// name của input submit để biết submit form hay chưa
// Sử dụng hàm isset: kiểm tra 1 mảng có tồn tại với key
//cho trước hay ko
// Nếu biểu thức trả về true thì ko cần viết tường minh
// là == true
if (isset($_GET['submit'])) {
  // + Tạo biến trung gian để thao tác cho dễ
  $fullname = $_GET['fullname'];
  // + Validate form: lọc dữ liệu từ user, nếu có lỗi đổ
  //message lỗi vào biến error
  // - Tên ko đc để trống: empty
  // - Tên ít nhất có 3 ký tự: strlen
  if (empty($fullname)) {
    $error = 'Phải nhập tên';
  } elseif (strlen($fullname) < 3) {
    $error = 'Tên phải ít nhất 3 ký tự';
  }
  // - Xử lý logic bài toán chỉ khi ko có lỗi xảy ra
  if ($error == '') {
    $result = "Tên vừa nhập: $fullname";
  }
}
// - Hiển thị error và result ra màn hình
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!-- - Hiển thị lại các giá trị đã nhập cho form -->
<form action="" method="get">
  Nhập tên của bạn:
  <input type="text" name="fullname"
 value="<?php echo isset($_GET['fullname']) ?
     $_GET['fullname'] : ''; ?>" />
  <br />
  <input type="submit" name="submit"
         value="Show thông tin" />
</form>
