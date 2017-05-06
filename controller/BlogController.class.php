<?php
require "BaseController.class.php";
class BlogController.class extends BaseController{
	
	public function indexAction(){
		require './view/blog_index.html';
	}
	
    public function index0Action(){
    	require './view/blog_index0.html';
    }	
}

