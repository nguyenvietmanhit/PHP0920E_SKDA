<?php
session_start();
//Nhúng file vào để sử dụng đc biến kết nối $connection
require_once 'database.php';
/**
 * crud/update.php
 * Hiển thị form update sản phẩm dựa theo id
 * crud/update.php?id=17
 */

// Validate dữ liệu từ url: bắt buộc phải truyền tham số id lên url
// và id phải là số, vì url user có thể chỉnh sửa đc
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Tham số id ko hợp lệ';
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];
// + LẤy thông tin sản phẩm dựa vào id để đổ dữ liệu ra form
// - Tạo câu truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = $id";
// - Thưc thi truy vấn vừa tạo, với truy vấn SELECT thì sẽ trả về 1 đối
//tượng trung gian, chứ ko phải kiểu boolean như INSERT, UPDATE, DELETE
$obj_result_one = mysqli_query($connection, $sql_select_one);
// - LẤy ra mảng kết quả
$product = mysqli_fetch_assoc($obj_result_one);
echo "<pre>";
print_r($product);
echo "</pre>";
// + Xử lý submit form nếu user click nút Submit
// - Debug mảng $_POST và $_FILES
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// - Tạo biến chứa thông tin lỗi và kết quả
$error = '';
$result = '';
// - Nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
    // Gán biến trung gian để thao tác cho dễ
    $name = $_POST['name'];
    $description = $_POST['description'];
    $avatar_arr = $_FILES['avatar'];
    // - Validate form: Tên ko đc để trống
    if (empty($name)) {
        $error = 'Name ko đc để trống';
    }
    // - Xử lý logic bài toán chỉ khi nào ko có lỗi
    if (empty($error)) {
        // + Xử lý upload file nếu có file tải lên
        //Mặc định giữ lại tên file cũ
        $avatar = $product['avatar'];
        if ($avatar_arr['error'] == 0) {
            $dir_uploads = 'uploads';
            // Nếu chưa tồn tại thư mục uploads thì tạo mới
            if (!file_exists($dir_uploads)) {
                mkdir($dir_uploads);
            }
            // Xóa bỏ file ảnh cũ đi để tránh file rác, thêm @ trước tên hàm để
            //tránh báo lỗi warning khi xóa file ko tồn tại
            @unlink($dir_uploads . "/" . $product['avatar']);
            // Tạo ra file mang tính duy nhất để tránh trường upload đè
            //file bị trùng tên
            $avatar = time() . $avatar_arr['name'];
            // Upload file:
            move_uploaded_file($avatar_arr['tmp_name'],
                $dir_uploads . "/$avatar");
        }

        // + Xử lý logic update sản phẩm
        // - Tạo câu truy vấn, với truy vấn UPDATE/DELETE bắt buộc phải
        // có WHERE
        $sql_update = "UPDATE products SET name = '$name',
        avatar = '$avatar', description = '$description' 
        WHERE id = $id";

        // - Thực thi truy vấn vừa tạo
        $is_update = mysqli_query($connection, $sql_update);
        if ($is_update) {
            $_SESSION['success'] = "Update bản ghi $id thành công";
            header('Location: index.php');
            exit();
        } else {
            $error = "Update bản ghi $id thất bại";
        }
    }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<!-- Copy HTML form thêm mới (create.php) paste sang làm form update-->
<form action="" method="post" enctype="multipart/form-data">
    Tên: <input type="text" name="name"
                value="<?php echo $product['name'] ?>" />
    <br />
    Upload ảnh
    <input type="file" name="avatar" />
    <img src="uploads/<?php echo $product['avatar']; ?>"
         height="80px" />
    <br />
    Mô tả chi tiết:
    <textarea name="description"><?php echo $product['description']; ?></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <a href="index.php">Back</a>
</form>

