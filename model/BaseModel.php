<?php

class BaseModel{
	public static  $db;
	public static  $dsn = "mysql:host=localhost;dbname=yellowsb_blog";
	
	function __construct(){
		self::$db = new PDO(self::$dsn, 'root', '');
		/* self::$conn = mysqli_connect(self::$conn, self::$db_config['db_user'], self::$db_config['psw']) or die("error connecting") ; //连接数据库
		mysqli_select_db("localhost", self::$conn); */
	}
}