<?php

class BaseModel{
	public static  $db;
	public static  $dsn = "mysql:host=localhost:3306;dbname=yellowsb_blog";
	
	function __construct(){
		self::$db = new PDO(self::$dsn, 'root', '', array(PDO::ATTR_PERSISTENT => true));
		if(self::$db){
			echo '连接成功';
		}else{
			echo '连接失败';
		}
	}
}