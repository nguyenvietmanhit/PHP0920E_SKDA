<?php
/**
 * create.php
 * Thêm mới sản phẩm
 * products: id, name, avatar, price, created_at
 */
// Xử lý submit form
// + Debug các biến liên quan: $_POST, $_FILES
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Khai báo biến chữa thông tin lỗi/kết quả
$error = '';
// + Xử lý submit form
if (isset($_POST['submit'])) {
  // + Gán biến trung gian
  $name = $_POST['name'];
  $price = $_POST['price'];
  $avatar_arr = $_FILES['avatar'];
}
?>
<h2>Form thêm mới sp</h2>
<form action="" method="post"
      enctype="multipart/form-data">
  Nhập tên:
  <input type="text" name="name" value="" />
  <br />
  Ảnh sản phẩm
  <input type="file" name="avatar" />
  <br />
  Giá
  <input type="text" name="price" value="" />
  <br />
  <input type="submit" name="submit" value="Lưu sp" />
</form>
