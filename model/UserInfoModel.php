<?php
require 'BaseModel.php';

class UserModel extends BaseModel{	
 public	function getBloggerName(){
 	    $result = $db->exec("select*from blogger_info");
		return $result;
	}
}