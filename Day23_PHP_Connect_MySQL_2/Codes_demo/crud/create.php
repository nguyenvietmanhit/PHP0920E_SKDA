<?php
session_start();
//Nhúng file database.php để sử dụng dc biến $connection
require_once 'database.php';
/**
 * crud/create.php
 * Chức năng thêm mới sản phẩm, là chức nwang đầu tiên
 * sẽ code của ứng dụng CRUD
 * + THêm mới sản phẩm:
 * id, name, avatar, price, created_at
 */
// Xử lý submit form
// + Debug các biến $_POST, $_FILES
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Khai báo biến chứa lỗi
$error = '';
// + Nếu user submit form thì mới xử lý đc
if (isset($_POST['submit'])) {
    // + Gán biến trung gian
    $name = $_POST['name'];
    $price = $_POST['price'];
    $avatars = $_FILES['avatar'];
    // + Validate form:
    // Tên, giá ko đc để trống: empty
    // Tên ít nhất 3 ký tự: strlen
    // File upload nếu có phải là ảnh, dung lượng <= 2Mb
    if (empty($name) || empty($price)) {
        $error = 'Tên hoặc giá ko đc để trống';
    } elseif (strlen($name) < 3) {
        $error = 'Tên ít nhất 3 ký tự';
    } elseif ($avatars['error'] == 0) {
        // + Validate ảnh
        // + Valiate dung lượng
    }
    // + Lưu vào CSDL khi ko có lỗi nào xảy ra
    if (empty($error)) {
        // + Xử lý upload file nếu user có chọn file
        if ($avatars['error'] == 0) {
            // + Code xử lý upload file
        }
        // + Lưu vào bảng products
        // Quay lại các bước tương tác với CSDL:
        // - Tạo câu truy vấn:
        $sql_insert =
    "INSERT INTO products(name, avatar, price)
     VALUES('$name', '', $price)";
        // - Thực thi truy vấn
        $is_insert = mysqli_query($connection, $sql_insert);
        if ($is_insert) {
            $_SESSION['success'] = 'Thêm mới thành công';
            header('Location: index.php');
            exit();
        } else {
            $error = "Thêm thất bại";
        }
    }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h1>Form thêm mới sản phẩm</h1>
<!--Do form có file nên bắt buộc phải khai báo như sau-->
<form action="" method="post"
      enctype="multipart/form-data">
    Tên sp:
    <input type="text" name="name" value=""/>
    <br/>
    Ảnh đại diện:
    <input type="file" name="avatar" />
    <br />
    Giá sp:
    <input type="number" name="price" value="" />
    <br />
    <input type="submit" name="submit" value="Lưu" />
</form>

