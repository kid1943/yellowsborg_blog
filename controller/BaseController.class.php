<?php
   
  class BaseController{
  	
    function __construct(){   	
    	header("content-type:text/html;charset=utf-8");
    }
  	
  	protected function msgGo($msg, $url, $time = 3){
  		echo $msg;
  		//还可以做一个专门的更好看的视图页，来显示该$msg信息
  		//include './show_msg.html';
  		header("refresh:$time;url=$url");
  	}
  }