<?php
/**
 * form.php
 * - Có 2 phương thức:
 * POST
 * GET
 * - Khai báo form HTML
 */
?>
<!--
+ action của form: url/file xử lý submit form:
action='' -> chính url/file hiện tại sẽ xử lý submit form
+ method: phương thức gửi dữ liệu: GET và POST
- GET: form.php?fullname=abcdef
Dữ liệu của form sẽ đổ hết lên url theo dạng sau:
<URL>?param1=value1&param2=value2&param3=value3....
URL với GET chỉ max = 1024 ký tự
PHP có sẵn 1 biến dạng mảng lưu toàn bộ thông tin form
gửi lên: $_GET
GET ko đc dùng cho các form có dữ liệu nhạy cảm: mật khẩu
- POST: URL trước và sau khi submit form ko thay đổi
POST bảo mật hơn GET
PHP có sẵn 1 biến $_POST lưu đc toàn bộ thông tin form
+ Biến $_REQUEST: biến có sẵn của PHP, chứa thông tin của
$_POST, $_GET và $_COOKIE - lưu cookie hệ thống, ko nên
sử dụng biến này để lấy dữ liệu từ form
+ Bắt buộc các input của form phải khai báo thuộc tính
name -> để PHP biết đc dữ liệu gửi lên là của input nào
+ Chú ý về cách khai báo name cho input:
- Với các input mà chỉ có 1 giá trị duy nhất tại 1 thời
điểm -> name dạng text đơn. VD: name='fullname'
- Input nhập đc nhiều giá trị -> name ở dạng mảng. VD
name='jobs[]'
-->
<?php
// Thử debug biến mảng $_POST để xem cấu trúc của biến
//này, với các dữ liệu của form hiện tại
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//echo $_POST['email'];//

// + Debug biến chứa thông tin của server đang chạy file
//hiện tại: $_SERVER
echo "<pre>";
print_r($_SERVER);
echo "</pre>";


?>
<form action="" method="POST">
  Tên:
  <input type="text" name="fullname" /><br />
  Mật khẩu:
  <input type="password" name="password" /><br />
  Email:
  <input type="email" name="email" /><br />
  Giới tính:
<!-- Input radio dựa vào value để biết đc tích vào
 raio nào-->
  <input type="radio" name="gender" value="0" /> Nam
  <input type="radio" name="gender" value="1" /> Nữ
  <input type="radio" name="gender" value="2" />Khác
  <br />
<!-- Checkbox dựa vào value để PHP biết đc
tích vào checkbox nào -->
  Chọn nghề nghiệp
  <input type="checkbox" name="jobs[]" value="0" />Dev
  <input type="checkbox" name="jobs[]" value="1" />Tester
  <input type="checkbox" name="jobs[]" value="2" />Homer
  <br />
  Upload 1 ảnh tại 1 thời điểm:
  <input type="file" name="upload" /><br />
  Upload nhiều file tại 1 thời điểm:
  <input type="file" multiple name="uploads[]" />
  <br />
  Chọn quốc gia:
  <select name="country">
    <option value="0">VN</option>
    <option value="1">VN1</option>
    <option value="2">VN2</option>
  </select>
  <br />
  Select dạng multiple:
  <select multiple name="countries[]">
    <option value="0">Country0</option>
    <option value="1">Country1</option>
    <option value="2">Country2</option>
  </select>
  <br />
  Ghi chú:
  <textarea name="note"></textarea>
  <br />
  <input type="submit" name="submit" value="Gửi" />
</form>


<!--<form action="" method="GET">-->
<!--  Tên:-->
<!--  <input type="text" name="fullname" />-->
<!--  <input type="submit" name="submit" value="Gửi" />-->
<!--</form>-->
