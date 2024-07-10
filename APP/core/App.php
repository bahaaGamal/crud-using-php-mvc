<?php

// ######################## Front End Controler ###################3 //

class App
{
  protected $controler = "homeControler";
  protected $action ="index";
  protected $params = [];

  public function __construct()
  {
    $this->prepareURL();
    $this->render();
  }

  /**
     * extract controller and method and all parameters
     * @param string $url -> request from url path 
     * @return 
  */
  private function prepareURL(){

    $url = $_SERVER['REQUEST_URI'];
    $url = trim($url,"/");

    if(!empty($url)){
      $url =explode("/",$url);

      // Define the controler
      $this->controler = isset($url[0]) ? ucwords($url[0]).'Controler': 'homeControler';

      // Define the action
      $this->action = isset($url[1]) ? $url[1] : 'index';

      // Define the params
      unset($url[0],$url[1]);
      $this->params = !empty($url) ? array_values($url) : [];
    }
  }


  private function render(){
    if(class_exists($this->controler)){
      $controler = new $this->controler;
      if(method_exists($controler,$this->action)){
        call_user_func_array([$controler,$this->action],$this->params);
      }else{
        echo "Method : " . $this->action ." does not Exist";
      }
    }else{
      echo "Class : ". $this->controler ." Not Found";
    }
  }
}