<?php
/**
 * demo_security_form.php
 * Giới thiệu sơ qua về 2 lỗi bảo mật phổ biến
 * trong form:
 * - XSS
 * - CSRF
 * + Với beginner, chắc chắc form sẽ bị 2 lỗi
 * bảo mật này
 * - XSS: Cross-site scripting: thông qua form,
 * hacker nhập các mã javascript, nếu ko validate
 * đúng -> dính XSS, nhiều trình duyệt hiện đại
 * tự có cơ chế chống XSS
 * - CSRF - Cross-site request forgery: lỗi bảo
 * mật liên quan đến giả mạo người dùng. VD:
 * bạn có 1 url để xóa user: user/delete?id=3,
 * nếu hacker biết đc urlr này của bạn, gửi qua
 * mail 1 ảnh đc bao bởi 1 thẻ <a> có url =
 * user/delete?id=1. Cách chống: tạo ra các token
 * cho form (mã duy nhất cho từng form)
 * + Các framework và CMS của PHP đều chống rất
 * tốt 2 lỗi bảo mật này
 */
// + Debug thông tin mảng $_POST
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
// + Tạo biến chữa lỗi, kết quả
$error = '';
$result = '';
// + Kiểm tra nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian
  $fullname = $_POST['fullname'];
  // + Validate form
  // + Chỉ xử lý logic bài toán khi ko có lỗi
  //xảy ra
  if (empty($error)) {
    //   <script>alert('Hello');</script>
    // Nếu nhập chuỗi trên -> sẽ hiển thị 1 alert
    //thay vì hiển thị ra chuỗi -> XSS
    // + Để fix XSS rất đơn giản: sẽ sử dụng 1 hàm
    //sau trước khi hiển thị ra thông tin:
    //htmlspecialchars
    $fullname = htmlspecialchars($fullname);
//    var_dump($fullname);
    $result = "Tên của bạn: $fullname";
    echo $result;
  }
}
?>
<form action="" method="post">
  Nhập tên:
  <input type="text" name="fullname" value="" />
  <input type="submit" name="submit"
         value="Show" />
</form>

