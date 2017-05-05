<?php

class BlogController{
	
	public function indexAction(){
		include '../view/blog_index.html';
	}
	
    public function index0Action(){
    	include '../view/blog_index0.html';
    }	
}

$controller = new BlogController();
$action = !empty($_GET['a'])?$_GET['a']:"Index";
$action = $action."Action";
$controller->$action();//可变方法




