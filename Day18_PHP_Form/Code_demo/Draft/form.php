<?php
/**
 * form.php
 * Demo quy trình xử lý form trong PHP, thường sẽ gồm các bước
 * như sau:
 * + Debug biến liên quan đến phương thức gửi form
 * ($_GET, $_POST)
 * + Tạo các biến chứa thông tin lỗi và thông báo thành công
 * + Xử lý submit form chỉ khi user click nút Submit
 * + Tạo biến trung gian để gán lại giá trị lấy đc từ
 * $_POST, $_GET
 * + Validate dữ liệu: đây là bước ko thể thiếu trong xử lý form
 * , có thể kết hợp validate = javascript, tuy nhiên luôn phải
 * validate lại bằng PHP
 * + Xử lý submit form theo logic bài toán chỉ khi nào ko có
 * lỗi validate xảy ra
 * + Luôn hiển thị lỗi hoặc thành công nếu có ra màn hình sau
 * khi xử lý form
 * + [Option] Đổ lại các dữ liệu đúng ra form trong trường hợp
 * validate sai
 *
 */
?>
<?php
//BẮT ĐẦU XỬ LÝ SUBMIT FORM
// Chú ý: code xử lý form nên viết phía trên khai báo form, để
//có thể linh hoạt sử dụng các biến cho các vị trí phía sau
// + Debug biến $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo các biến chứa thông tin lỗi và thành công
$error = '';
$result = '';
// + Kiểm tra nếu user click nút Submit thì mới xử lý, dựa vào
//name của nút Submit, sử dụng hàm isset của PHP để kiểm tra
//mảng có tồn tại phần tử với key cho trước hay ko
if (isset($_POST['show'])) {
  // + Tạo biến trung gian
  $fullname = $_POST['fullname'];
  // + Validate form:
  // - Tên ko đc để trống: empty
  // - Tên phải có ít nhất 6 ký tự: strlen
  if (empty($fullname)) {
    $error = 'Tên ko đc để trống';
  } elseif (strlen($fullname) < 6) {
    $error = 'Tên phải có ít nhất 6 ký tự';
  }
  // + Xử lý logic bài toán chỉ khi nào ko có lỗi xảy ra
  if (empty($error)) {
    $result = "Tên của bạn: $fullname";
  }
}
?>
<!--Hiển thị thông báo lỗi/thành công ra màn hình-->
<h3 style="color: red">
  <?php echo $error; ?>
</h3>
<h3 style="color: green">
  <?php echo $result; ?>
</h3>
<!--+ Đổ lại dữ liệu user đã nhập vào các input tương ứng-->
<form action="" method="post">
  Nhập tên của bạn: <br />
  <input type="text" name="fullname"
 value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>" />
  <input type="submit" name="show" value="Show thông tin" />
</form>
