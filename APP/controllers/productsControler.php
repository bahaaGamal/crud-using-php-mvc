<?php

class ProductsControler
{
  public function index(){
    $p = new Product();
    $data['products'] = $p->getAllProducts();
    View::load('products/index',$data);
  }


  //  View Add Page
  public function add()
  {
    View::load('products/add');
  }

  
  // Add New Product
  public function store()
  {
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $qty = $_POST['qty'];

      $data = Array ( "name" => $name ,
                      "description" => $description ,
                      "price" => $price ,
                      "qty" => $qty 
                      );
      $p = new Product();
      if($p->insertProduct($data)){
        View::load('products/add',["success"=>"Data Added Successfully"]);
      }else{
        View::load('products/add');
      }
    }
  }

  //  Edit Product
  public function edit($id){
    $p = new Product();
    if($p->getRow($id)){
      $data['row']=$p->getRow($id);
      View::load('products/edit',$data);
    }else{
      echo "error";
    }
  }

  //  Update Product
  public function update($id){
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $qty = $_POST['qty'];

      $data = Array ( "name" => $name ,
                      "description" => $description ,
                      "price" => $price ,
                      "qty" => $qty 
                      );
      $p = new Product();
      if($p->updateProduct($id,$data)){
        View::load('products/edit',["success"=>"Data Updated Successfully",'row'=> $p->getRow($id)]);
      }else{
        View::load('products/edit');
      }
    }
  }


  //  Delete Product
  public function delete($id)
  {
    $p = new Product();
    if($p->deleteProduct($id)){
      View::load('products/delete',["success"=>"Data Deleted Successfully"]);
    }else{
      echo "error";
    }
  }
}