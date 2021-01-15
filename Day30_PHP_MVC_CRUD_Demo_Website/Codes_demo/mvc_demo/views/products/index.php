<?php
/**
 * views/products/index.php
 * Liệt kê sp
 */
// Thử xem view có hiểu đc biến ở controller ko ?
echo "<pre>";
print_r($products);
echo "</pre>";
?>
<a href="index.php?controller=product&action=create">
    Thêm mới sp
</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Avatar</th>
        <th>Created at</th>
        <th></th>
    </tr>
  <?php foreach ($products AS $product): ?>
      <tr>
          <td><?php echo $product['id']; ?></td>
          <td><?php echo $product['name']?></td>
          <td>
          <?php echo number_format($product['price'],
              0, '.', '.'); ?>
              đ
          </td>
          <td>
              <img
  src="assets/uploads/<?php echo $product['avatar']; ?>"
                      height="80"/>
          </td>
          <td>
<!--              11/01/2021 12:12:12-->
              <?php
              echo date('d/m/Y H:i:s',
                  strtotime($product['created_at']));
              ?>
          </td>
          <td>
              <?php
$url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
$url_update = "index.php?controller=product&action=update&id=" . $product['id'];
$url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
              ?>
              <a href="<?php echo $url_detail; ?>">Chi tiết</a>
              <a href="<?php echo $url_update; ?>">Sửa</a>
              <a href="<?php echo $url_delete; ?>" onclick="return confirm('Xóa ko?')">
                  Xóa
              </a>
          </td>
      </tr>
  <?php endforeach; ?>
</table>
