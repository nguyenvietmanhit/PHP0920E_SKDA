<?php
require_once 'models/Model.php';
/**
 * models/Product.php
 * Tương tác với bảng products
 */
class Product extends Model {
  // 1 model -> 1 bảng, lấy các trường của bảng làm
  //các thuộc tính của nó
  public $id;
  public $name;
  public $price;
  public $avatar;
  public $created_at;
  // Phương thức thêm sp vào bảng
  public function insert() {
    // + Viết câu truy vấn, áp dụng truyền tham số vào
    //câu truy vấn -> SQLInjection
    $sql_insert =
    "INSERT INTO products(name, price, avatar)
    VALUES(:name, :price, :avatar)";
    // + Cb đối tượng truy vấn
    $obj_insert = $this->connection
                ->prepare($sql_insert);
    // + Tạo mảng để truyền giá trị thật cho tham số
    //trong câu truy vấn nếu có
    $inserts = [
        ':name' => $this->name,
        ':price' => $this->price,
        ':avatar' => $this->avatar
    ];
    // + Thực thi
    $is_insert = $obj_insert->execute($inserts);
    return $is_insert;
  }
}