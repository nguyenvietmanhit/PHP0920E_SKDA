<?php
session_start();
require_once 'database.php';
/**
 * crud/index.php: Trang danh sách sản phẩm
 * DEMO ứng dụng CRUD - Create - Read - Update - Delete sản phẩm đơn giản
 * - Tạo cấu trúc file/thư mục như sau:
 * crud/
 *     /database.php:  khai báo các hằng số kết nối CSDL, tạo biến kết nối để
 *                      sử dụng cho các chức năng CRUD
 *     /create.php: C - chức năng thêm mới từ form
 *     /index.php:  R - Chức năng liệt kê
 *     /update.php: U - Update bản ghi từ form
 *     /delete.php: D - Xóa bản ghi
 *
 */
// Lấy tất cả sản phẩm từ bảng products, đổ dữ liệu ra bảng
// + Viết câu truy vấn lấy sản phẩm theo ngày tạo gần nhất
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// + Thực thi truy vấn, chú ý với truy vấn SELECT sẽ trả về đối tượng
//trung gian
$obj_result_all = mysqli_query($connection, $sql_select_all);
// + Lấy mảng các sản phẩm từ đối tượng trung gian
$products = mysqli_fetch_all($obj_result_all, MYSQLI_ASSOC);
//echo "<pre>";
//print_r($products);
//echo "</pre>";
?>
<?php
// Hiển thị các session thông báo
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    //Sau khi hiển thị cần xóa đi để ko hiển thị lại
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<a href="create.php">Thêm mới sản phẩm</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Description</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach ($products AS $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td>
                <img src="uploads/<?php echo $product['avatar']?>"
                height="80"
                />
            </td>
            <td><?php echo $product['description']; ?></td>
            <td>
<!--                08/10/2020 20:27:27-->
                <?php
                // Thay đổi lại format của ngày tháng
                // Mặc định kiểu ngày giờ (DATETIME, TIMESTAMP) có format
                // như sau: Y-m-d H:i:s , vd: 2020-10-08 20:22:33
        $created_at = $product['created_at'];
        $date_format = date('d/m/Y H:i:s',strtotime($created_at));
        echo $date_format;
                ?>
            </td>
            <td>
<!--               Với link sửa và xóa, cần phải biết đang sửa/xóa trên
                    bản ghi nào-->
                <a href="update.php?id=<?php echo $product['id']; ?>">
                    Sửa
                </a>
                <a href="delete.php?id=<?php echo $product['id']; ?>"
                onclick="return confirm('Are you delete?')"
                >
                    Xóa
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
