<?php
require_once 'database.php';
/**
 * crud/sql_injection.php
 * Lỗi bảo mật SQL Injection trong câu truy
 * vấn
 * - Là lỗi tấn công vào câu truy vấn SQL
 * - VD: Demo chức năng tìm kiếm theo tên sp
 */
// Xử lý submit form
if (isset($_POST['submit'])) {
    // Fix lỗi bảo mật SQL Injection bằng cách lọc
  //dữ liệu từ form = hàm sau
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($connection, $name);

  //cần tim iphone -> ne, ph -> dùng LIKE
  // + Viết truy vấn:
  $sql_select_all = "SELECT * FROM products 
WHERE name LIKE '%$name%'";
  var_dump($sql_select_all);
  // + Thực thi truy vấn
$result_all = mysqli_query($connection, $sql_select_all);
  // + Trả về mảng kết hợp tự obj trung gian trên
$products = mysqli_fetch_all($result_all,
    MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
}
// Thử nhập chuỗi tìm kiếm sau:
//  123456' OR name != ' -> show ra hết bản ghi
//-> dính lỗi bảo mật SQL Injection
?>
<form action="" method="post">
  Nhập tên sp:
  <input type="text" name="name"
value="<?php echo isset($_POST['name']) ? $_POST['name']
: '' ?>" />
  <br />
  <input type="submit" name="submit" value="Tìm kiếm" />
</form>
