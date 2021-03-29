<?php
require_once 'models/Model.php';
class Order extends Model {
  public $id;
  public $fullname;
  public $address;
  public $mobile;
  public $email;
  public $note;
  public $price_total;
  public $payment_status;

  public function insert() {
    // + Viết truy vấn insert
    $sql_insert =
"INSERT INTO 
orders(fullname,address,mobile,email,
note,price_total,payment_status) 
VALUES(:fullname,:address,:mobile,
:email,:note,:price_total,:payment_status)";
    // + Cbi obj truy vấn:
    $obj_insert = $this->connection
        ->prepare($sql_insert);
    // + Tạo mảng truyền giá trị
    $inserts = [
        ':fullname' => $this->fullname,
        ':address' => $this->address,
        ':mobile' => $this->mobile,
        ':email' => $this->email,
        ':note' => $this->note,
        ':price_total' => $this->price_total,
        ':payment_status' => $this->payment_status,
    ];
    // + Thực thi
    $obj_insert->execute($inserts);
    // + Trả về id vừa insert
    $order_id = $this->connection->lastInsertId();
    return $order_id;
  }

}