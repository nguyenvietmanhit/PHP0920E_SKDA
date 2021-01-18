<?php
/**
 * backend/models/Category.php
 * Model quản lý tương tác với CSDL với bảng categories
 */
require_once 'models/Model.php';
class Category extends Model {
  public $id;
  public $name;
  public $avatar;

  public function insert() {}
  public function update($id) {}
  public function delete($id) {}
  public function getAll() {}
  public function getOne($id) {}
}