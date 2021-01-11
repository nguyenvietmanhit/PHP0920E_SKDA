<?php
/**
 * views/products/create.php
 * Form thêm mới sản phẩm
 * Bảng products: id, name, price, avatar, created_at
 */
?>
<h1>Form thêm mới sản phẩm</h1>
<form action="" method="post"
      enctype="multipart/form-data">
    Nhập tên sp:
    <input type="text" name="name" value=""/>
    <br/>
    Nhập giá sp:
    <input type="number" name="price" min="0" />
    <br />
    Upload ảnh sản phẩm:
    <input type="file" name="avatar" />
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <a href="index.php?controller=product&action=index">
        Back
    </a>
</form>