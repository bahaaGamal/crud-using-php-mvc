<?php

require_once(LIBS."DB/MysqliDb.php");

class DB
{
  protected $db;

  public function connect()
  {
    $dataBase = new MysqliDb (DB_HOST, DB_USER, DB_PASS, DB_NAME);
     if(!$dataBase->connect()){
      $this->db= $dataBase;
      return $this->db;
     }else{
      echo "error";
     }
  }


}