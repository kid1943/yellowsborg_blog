<?php
  require './model/UserInfoModel.php';
  require './view/index.html';
/*   $user_model = new UserInfoModel();
  $result = $user_model->get_blogger_name();
  if ($result) {
  	 var_dump($result);
  }else {
  	 echo "查询失败";
  } */
  
  $ctrl = empty($_GET['c'])? "Blog" : $_GET['c'];
  $action = empty($_GET['a']) ? "index" : $_GET['a'];
  require_once "./controller/$ctrl"."Controller.php";
  require_once "./model/$ctrl"."Model.php";
  
  $ctrl = $ctrl."Controller";
  $action = $action."Action";
  
  $controller = new $ctrl;
  $controller->$action();
  
  
  
  
  
  
  
  
  
  
  