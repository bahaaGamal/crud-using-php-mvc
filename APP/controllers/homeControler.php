<?php

class HomeControler
{
  public function __construct()
  {

  }

  public function index()
  {
    View::load("home");
  }
 
}