<?php

class Product extends DB
{
  private $table = 'products';
  private $conn;

  public function __construct()
  {
    $this->conn = $this->connect();
  }

  public function getAllProducts()
  {
    return $this->conn->get($this->table);
  }

  public function insertProduct($data)
  {
    return $this->conn->insert ($this->table, $data);
  }

  public function deleteProduct($id)
  {
    $del= $this->conn->where('id', $id);
    return $del->delete($this->table);
  }

  public function getRow($id)
  {
    $row= $this->conn->where('id', $id);
    return $row->getOne($this->table);
  }

  public function updateProduct($id,$data)
  {
    $update= $this->conn->where('id', $id);
    return $update->update($this->table,$data);
  }
  
}