<?php
session_start();
require_once 'database.php';
/**
 * crud/create.php
 * Chức năng Thêm mới thường là chức năng xây dựng đầu tiên trong ứng dụng CRUD
 * Tạo form thêm mới
 * Bảng products: id, name, avatar, description, created
 */
// XỬ LÝ SUBMIT FORM
// + Tạo biến chứa lỗi và thành công nếu có
$error = '';
$result = '';
// + Debug các mảng liên quan dựa vào phương thức của form
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
    // + Gán các biến trung gian cho dễ thao tác
    $name = $_POST['name'];
    $description = $_POST['description'];
    $avatars = $_FILES['avatar'];
    // + Validate form:
    // - Name ko đc để trống: empty
    // - Name phải nhập ít nhất 3 ký tự trở lên: strlen
    // - File upload phải có định dạng ảnh, dung lượng ko vượt quá 2Mb
    if (empty($name)) {
        $error = 'Name ko đc để trống';
    } else if (strlen($name) < 3) {
        $error = 'Name phải nhập ít nhất 3 ký tự';
    }
    // - Khi xử lý với file, luôn cần kiểm tra nếu có file đc upload thành công
    // thì mới xử lý -> error = 0 -> có file upload, ngược lại là có lỗi
    else if ($avatars['error'] == 0) {
        // - Xử lý validate file dạng ảnh
        // Lấy ra đuôi file dựa vào tên file upload
        $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
        // Chuyển đuôi file về chữ thường
        $extension = strtolower($extension);
        $extension_allowed = ['png', 'jpg', 'jpeg', 'gif'];
        // - Xử lý validate dung lượng file upload ko đc vượt quá 2Mb
        $size_b = $avatars['size'];
        // Đổi về đơn vị MB từ B
        $size_mb = $size_b / 1024 / 1024;
        // Chỉ giữ lại 2 số sau phần thập phân nhìn cho gon
        $size_mb = round($size_mb, 2);
        if (!in_array($extension, $extension_allowed)) {
            $error = "File upload phải có dạng ảnh";
        } elseif ($size_mb > 2) {
            $error = "File upload ko đc vượt quá 2MB";
        }
    }

    // + Lưu các thông tin vào bảng products chỉ khi ko có lỗi xảy ra
    if (empty($error)) {
        // - Xử lý upload file nếu có file đc upload
        // Đẩy hết các file vào thư mục uploads, ngang hàng với file hiện tại
        if ($avatars['error'] == 0) {
            $dir_upload = 'uploads';
            // Kiểm tra nếu như thư mục chưa tồn tại thì mới tạo
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // Tạo file mang tính duy nhất trên hệ thống, để tránh upload đè ảnh
            //trùng tên
            $filename = time() . $avatars['name'];
            // Upload file vào thư mục chỉ định
            move_uploaded_file($avatars['tmp_name'],
                $dir_upload . '/' . $filename);
        }

        // - Xử lý thêm vào CSDL
        // 1/ Viết câu truy vấn, cần truyền các giá trị phải đúng với kiểu dữ liệu
        //tương ứng của trường đó
        $sql_insert = "INSERT INTO products(name, avatar, description) 
                       VALUES ('$name', '$filename', '$description')";
        // 2/ Thực thi câu truy vấn vừa tạo:
        $is_insert = mysqli_query($connection, $sql_insert);
        // Chuyển hướng về trang danh sách nếu thêm thành công
        if ($is_insert) {
            $_SESSION['success'] = "Thêm mới sản phẩm thành công";
            header("Location: index.php");
            exit();
        } else {
            $error = 'Thêm mới thất bại';
        }
    }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<!--Do form có input upload file nên bắt buộc method=post và thêm enctype-->
<form action="" method="post" enctype="multipart/form-data">
    Nhập tên: <input type="text" name="name" value="" />
    <br />
    Upload ảnh
    <input type="file" name="avatar" />
    <br />
    Mô tả chi tiết:
    <textarea name="description"></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <input type="reset" name="reset" value="Reset form" />
</form>

