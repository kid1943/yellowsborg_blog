<?php
//   require './view/index.html';
  
  $ctrl = empty($_GET['c'])? "Introduce" : $_GET['c'];
  $action = empty($_GET['a']) ? "index" : $_GET['a'];
  require_once "./controller/$ctrl"."Controller.class.php";
//   require_once "./model/$ctrl"."Model.php";
  
  $ctrl = $ctrl."Controller";
  $action = $action."Action";
  
  $controller = new $ctrl;
  $controller->$action();

  
  
  
  
  
  
  
  
  