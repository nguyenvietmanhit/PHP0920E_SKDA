<?php
/**
 * form.php
 * PHương thức GET và POST trong form
 */
?>
<!--
Phương thức GET
Url sau khi submit form:
form.php?fullname=nvmanh&age=1&submit=Submit
+ Dấu hiệu nhận biết 1 form sử dụng phương thức GET là nhìn
vào url của nó sau khi submit, với GET thì toàn bộ giá trị
của các input form sẽ đổ lên hết URL theo cặp name=value, nếu
có nhiều input thì sẽ ngăn cách bởi ký tự &
+ Không sử dụng GET cho các dữ liệu nhạy cảm như password, thông
tin thẻ ngân hàng ...
+ Để lấy đc dữ liệu gửi từ GET, PHP có sẵn 1 biến lưu tất cả
các thông tin của GET, là $_GET, là 1 mảng
+ Để debug mảng sử dụng cấu trúc sau
 -->
<?php
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
?>
<!--<form action="" method="GET">-->
<!--  Tên:-->
<!--  <input type="text" name="fullname" />-->
<!--  <br />-->
<!--  Tuổi:-->
<!--  <input type="number" name="age" />-->
<!--  <br />-->
<!--  <input type="submit" name="submit" value="Submit" />-->
<!--</form>-->


<!--
Phương thức POST
+ Dữ liệu gửi đi ko truyền lên URL như GET
+ Bảo mật hơn GET
+ PHP có sẵn 1 mảng $_POST để lưu toàn bộ dữ liệu gửi lên
từ form có phương thức post
-->
<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
<!--
Biến $_REQUEST:
+ Đây là biến mà PHP tạo ra sẵn, chứa tất cả các thông tin của
$_GET, $_POST, $_COOKIE
+ Ko dùng $_REQUEST để lấy dữ liệu từ form, cần dùng $_GET hoặc
$_POST để lấy dữ liệu
-->
<!--
Biến $_SERVER
+ Là 1 mảng đc PHP tạo ra sẵn, chứa các thông tin liên quan
đến máy chủ của bạn
-->
<?php
echo "<pre>";
print_r($_SERVER);
//print_r($_REQUEST);
echo "</pre>";
?>
<form action="" method="POST">
  Số thứ nhất:
  <input type="number" name="number1" />
  <br />
  Số thứ 2:
  <input type="number" name="number2" />
  <br />
  <input type="submit" name="submit" value="Submit" />
</form>
