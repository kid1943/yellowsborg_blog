<?php
require 'BaseModel.php';

class UserInfoModel extends BaseModel{	
    public function get_blogger_name(){
 	    $result = parent::$db_util->getOneRow("select*from blogger_info");
 	    return $result;
	}
}