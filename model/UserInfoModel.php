<?php
require 'BaseModel.php';

class UserInfoModel extends BaseModel{	
    public function get_blogger_name(){
 	    $result = parent::$db->exec("select*from blogger_info");
 	    $count = parent::$db->exec("insert into blogger_info blogger_name = 'zengbo',blog_name='博客'");
		echo $result;
		echo $count;
 	    return $count;
	}
}