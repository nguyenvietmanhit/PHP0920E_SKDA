<?php
require_once 'database.php';
/**
 * crud/get_product.php
 * Url sẽ xử lý ajax
 * Mục đích: truy vấn CSDL, lấy ra toàn bộ sản phẩm, trả về
 * 1 bảng HTML chứa ds sản phẩm cho nơi gọi ajax
 */
// + Thử debug mảng $_POST hoặc $_GET dựa vào phương thức gửi
// dữ liệu truyền lên từ ajax
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
// + Thực hiện truy vấn CSDL:
// - Tạo câu truy vấn
$sql_select_all = "SELECT * FROM products 
ORDER BY created_at DESC";
// - Thực thi truy vấn
$obj_result_all = mysqli_query($connection, $sql_select_all);
// - Lấy kết quả trả về dưới dạng mảng
$products = mysqli_fetch_all($obj_result_all,
    MYSQLI_ASSOC);
//echo "<pre>";
//print_r($products);
//echo "</pre>";
?>
<table border="1" cellspacing="0" cellpadding="6">
  <tr>
    <th>ID</th>
    <th>Name</th>
  </tr>
  <?php foreach($products AS $product): ?>
    <tr>
      <td><?php echo $product['id']; ?></td>
      <td><?php echo $product['name']; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<!--Mặc định kiểu dữ liệu trả về cho ajax là text/html, nếu như
ko khai báo kiểu dữ liệu trả về khi gọi ajax (json)-->
