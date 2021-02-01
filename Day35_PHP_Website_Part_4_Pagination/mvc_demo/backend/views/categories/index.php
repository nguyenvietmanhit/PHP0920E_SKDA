<!--Form tìm kiếm, thường nằm chung với trang liệt kê
cho tiện-->
<!--Form GEt truyền lên URL các tham số lấy từ input
bên trong form của nó, nếu url trc đó mà có các tham
số khác -> mất hết, thay bằng các tham số mới này
NẾu dùng form GET, cần thêm các tham số controller
và action tương ứng trong form dưới dạng ẩn-->
<form method="get" action="">
    <input type="hidden" name="controller"
           value="category" />
    <input type="hidden" name="action"
           value="index" />
    <div class="form-group">
        <label for="name">Nhập name</label>
        <input type="text" name="name" id="name"
               class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" name="search"
               value="Tìm kiếm" class="btn btn-info" />
        <a href="index.php?controller=category"
           class="btn btn-default">
            Hủy tìm kiếm
        </a>
    </div>
</form>

<!--views/categoris/index.php-->
<h1>Trang liệt kê danh mục</h1>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th></th>
    </tr>
    <?php foreach($categories AS $category): ?>
        <tr>
            <td><?php echo $category['id']?></td>
            <td><?php echo $category['name']?></td>
            <td>
                <a href="#">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="#">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                <a href="#">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>