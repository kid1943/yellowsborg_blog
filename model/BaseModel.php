<?php

require './tools/MySQLUtil.class.php';

class BaseModel{
	public static $db_util;
	public static $conf = array(
		"host" => "localhost",
		"port" => "3306",
		"user" => "root",
		"pass" => "",
		"charset" => "utf8",
		"dbname" => "yellowsb_blog",
			
	);
	
	
	function __construct(){
		self::$db_util = MySQLUtil::getDB(self::$conf);
	}
}