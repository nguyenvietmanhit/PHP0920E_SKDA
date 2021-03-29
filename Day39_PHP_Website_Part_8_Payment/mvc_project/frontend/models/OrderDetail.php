<?php
require_once 'models/Model.php';

class OrderDetail extends Model
{
  public $order_id;
  public $product_name;
  public $product_price;
  public $quantity;

  public function insert()
  {
    // + Viết truy vấn:
    $sql_insert = "INSERT INTO 
order_details(order_id,product_name,
product_price,quantity)
VALUES(:order_id,:product_name,:product_price,
:quantity)";
    // + Cbi obj truy vấn
    $obj_insert = $this->connection
        ->prepare($sql_insert);
    // + Tạo mảng
    $inserts = [
        ':order_id' => $this->order_id,
        ':product_name' => $this->product_name,
        ':product_price' => $this->product_price,
        ':quantity' => $this->quantity,
    ];
    // + Thực thi
    return $obj_insert->execute($inserts);
  }
}