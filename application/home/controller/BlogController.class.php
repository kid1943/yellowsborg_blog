<?php
require "BaseController.class.php";
class BlogController extends BaseController{
	
	public function indexAction(){
		require './view/blog_index.html';
//         echo "funck youuuuuuuuuuuuu"; 
	}
	
    public function index0Action(){
    	require './view/blog_index0.html';
    }	
}

