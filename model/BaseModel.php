<?php

require './tools/MySQLUtil.class.php';

class BaseModel{
	public static $conf = array(
		"host" => "localhost",
		"port" => "3306",
		"user" => "root",
		"pass" => "",
		"charset" => "utf8",
		"dbname" => "blogger_info",
			
	);
	public $db_util;
	
	function __construct(){
		$this->$db_util = MySQLUtil::getDB(self::$conf);
	}
}