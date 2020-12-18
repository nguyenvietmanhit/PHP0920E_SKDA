<?php
session_start();
require_once 'database.php';
/**
 * crud/index.php
 *     /create.php
 *     /update.php
 *     /detail.php
 *     /delete.php
 *     /database.php
 *
 * /index.php: Danh sách sản phẩm
 */
// + Hiển thị session của message nếu có
if (isset($_SESSION['success'])) {
  echo $_SESSION['success'];
  //Session dạng flash
  unset($_SESSION['success']);
}
// + crud/index.php: Hiển thị session dạng error
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
  //Session dạng flash
  unset($_SESSION['error']);
}

// Lấy dữ liệu từ bảng products để đổ ra table
// + Tạo câu truy vấn: lấy danh sách theo thứ tự mới nhất
$sql_select_all = "SELECT * FROM products 
ORDER BY created_at DESC";
// + Thực thi truy vấn,
// với SELECT sẽ trả về đối tượng trung gian
$obj_result_all = mysqli_query($connection, $sql_select_all);
// + Trả về mảng kết hợp
$products = mysqli_fetch_all($obj_result_all,
    MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
?>
<a href="create.php">
    Thêm mới sp
</a>
<h2>Danh sách sp</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Created_at</th>
        <th></th>
    </tr>
  <?php
  // Đổ dữ liệu lấy từ db vào từng hàng
  foreach ($products AS $product):
    ?>
      <tr>
          <td><?php echo $product['id']; ?></td>
          <td><?php echo $product['name']; ?></td>
          <td>
              <img
  src="uploads/<?php echo $product['avatar']; ?>"
  height="80px"/>
          </td>
          <td>
              <?php
              $price = $product['price'];
              // Hiển thị giá tiền ngăn cách bởi ,
//              $price = number_format($price);
              // Hiển thị giá ngắn cách bởi ký tự .
              $price = number_format($price, 0,
                  '.', '.');
              echo $price;
              ?>
              vnđ
          </td>
          <td>
              <?php
              $created_at = $product['created_at'];
              $created_at = date('d/m/Y H:i:s',
                  strtotime($created_at));
              echo $created_at;
              ?>
<!--              11/12/2020 20:31:31-->
          </td>
          <td>
              <?php
              // Gắn link cho từng chức năng
              $link_detail = "detail.php?id={$product['id']}";
              $link_update = "update.php?id={$product['id']}";
              $link_delete = "delete.php?id={$product['id']}";
              ?>
              <a href="<?php echo $link_detail; ?>">
                  Xem
              </a> &nbsp;
              <a href="<?php echo $link_update; ?>">
                  Sửa
              </a> &nbsp;
              <a href="<?php echo $link_delete; ?>"
                 onclick="return confirm('Chắc chắn xóa?')">
                  Xóa
              </a>
          </td>
      </tr>
  <?php endforeach; ?>
</table>
