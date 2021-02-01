<?php
require_once 'models/Model.php';
class User extends Model {

  public function isExistsUsername($username) {
    // + Viết truy vấn dạng tham số, vì có giá trị
    // truyền vào là chuỗi -> SQL Injection
    $sql_select_one = "SELECT * FROM users 
    WHERE username = :username";
    // + Tạo obj truy vấn
    $obj_select_one = $this->connection
        ->prepare($sql_select_one);
    // + Tạo mảng truyền giá trị vào tham số câu truy vấn
    $selects = [
        ':username' => $username
    ];
    // + Thực thi obj truy vấn
    $obj_select_one->execute($selects);
    // + Lấy mảng kết hợp
    $user = $obj_select_one
        ->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      return TRUE;
    }
    return FALSE;
  }

  public function register($username, $password) {
    // + Viết truy vấn dạng tham số
    $sql_insert = "INSERT INTO users(username, password)
    VALUES(:username, :password)";
    // + Cbi obj truy vấn
    $obj_insert = $this->connection->prepare($sql_insert);
    // + Tạo mảng truyền giá trị cho tham số truy vấn
    $inserts = [
        ':username' => $username,
        ':password' => $password
    ];
    // + Thực thi obj truy vấn
    $is_insert = $obj_insert->execute($inserts);
    return $is_insert;
  }

  public function getUser($username, $password) {
    // + Viết truy vấn có tham số
    $sql_select_one = "SELECT * FROM users 
WHERE username=:username AND password=:password";
    // + Cbi obj truy vấn
    $obj_select_one = $this->connection
        ->prepare($sql_select_one);
    // + Tạo mảng
    $selects = [
        ':username' => $username,
        ':password' => $password
    ];
    // + Thực thi
    $obj_select_one->execute($selects);
    // + Trả về mảng kết hợp 1 chiều
    $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
}