<?php
 class MySQLUtil{
 	
 	private $link = null;	//用于存储连接之后的资源！
 	//设定6个私有的属性，以存储6个对应的常规连接信息
 	private $host;
 	private $port;
 	private $user;
 	private $pass;
 	private $charset;
 	private $dbname;
 	
 	//单例化第1步：设定一个私有静态属性以存储该单例对象：
 	private static $instance = null; 
 	//单例化第2步：将构造方法私有化
   public function __construct($conf){
 	  //将这些数据存储到“自己”的属性中去
		$this->host = $conf['host'] ? $conf['host'] : "localhost";
		$this->port = $conf['port'] ? $conf['port'] : "3306";
		$this->user = $conf['user'] ? $conf['user'] : "root";
		$this->pass = $conf['pass'] ? $conf['pass'] : "123";
		$this->charset = $conf['charset'] ? $conf['charset'] : "utf8";
		$this->dbname = $conf['dbname'] ? $conf['dbname'] : "blogger_info";
		
		$this->connect();
 	}
 	
 	//单例化第4步：禁止克隆：
	private function __clone(){}

	//可以单独来修改要使用的数据库
	function select_database( $db ){
		//mysql_query("use $db", $this->link);
		$this->query( "use $db" );	//同样用这一行代替上一行，更专业！
		$this->dbname = $db;	//如果更换了数据，也得保存起来
	}
	//可以单独来修改要使用的连接编码
	function select_charset( $charset ){
		//mysql_query("set names $charset", $this->link);
		$this->query( "set names $charset" );	//同样用这一行代替上一行，更专业！
		$this->charset = $charset;	//如果更换了编码，也得保存起来
	}
	function close(){
		mysql_close( $this->link );
	}

	//该方法专门执行sql语句，并：
	//如果失败，就处理错误，然后结束；
	//如果成功，就“直接返回”，对直接结果不做任何处理
	private function query( $sql ){
		$result = mysql_query($sql, $this->link);
		if( $result === false ){
			echo "<p>发生错误了，详细请参考：";
			echo "<br />错误语句：" . $sql ;
			echo "<br />错误提示：" . mysql_error();
			echo "<br />错误代号：" . mysql_errno();
			die();	//同时，失败之后，直接终止
		}
		else{
			return $result;
		}
	}

	//该方法用于执行一条没有返回结果的增删改语句：
	function exec( $sql ){
		$result = $this->query($sql);
		return true;
	}
	
	//单例化第3步：设定一个静态方法，判断是否需要new一个对象，并返回
	public static function getDB( $conf1 ){
		//if( empty( self::$instance ) ) {改造为以下更为严谨的写法：
		if( !(self::$instance instanceof self) ){//如果不是自身的实例
			self::$instance = new self( $conf1 );
		}
		return self::$instance;
	}
	
	//该方法可以执行一条返回多行数据的select语句，
	//并将数据以“二维数组”的形式返回
	//此select语句类似这样： select *  from XXX  where id < 8;
	function getRows( $sql ){
		$result = $this->query($sql);

		//这里才准备返回二维数组
		//此时，$result 是“结果集”（数据集）
		$arr = array();	//空数组，目的是为了装该fetch出来的多行数据（$rec，是一维数组)
		while($rec = mysql_fetch_assoc( $result ) ){
			$arr[] = $rec;	//
		}
		return $arr;

	}
	//该方法可以返回一行多列数据（实际是一维数组）；
	//此select语句类似这样： select *  from XXX  where id = 8;
	function getOneRow( $sql ){
		$result = $this->query($sql);

		//这里才准备返回一维数组
		//此时，$result 是“结果集”（数据集）
		if( $rec = mysql_fetch_assoc ( $result ) ){
			return $rec;	//如果有数据，则返回该行
		}
		return array();		//否则，返回空数组
				
	}
	//该方法可以返回一行一列数据（实际是一个标量数据）；
	//此select语句类似这样： select age  from XXX  where id = 8;
	function getOneData( $sql ){
		$result = $this->query($sql);

		//这里才准备返回一个
		//此时，$result 是“结果集”（数据集）
		if( $rec = mysql_fetch_row ( $result ) ){
			return $rec[0];	//如果有数据，则返回该唯一数据
		}
		return false;	//否则，返回false，表示没有数据！
	}
	function __sleep(){
		//只要如下6个数据进行序列化
		return array('host','port','user','pass','charset','dbname');
	}
	function __wakeup(){
		//反序列化时立即完成连接工作
		$this->connect();
	}
   
   public function connect(){     	
   	 $this->link = mysql_connect("{$this->host}:{$this->port}","{$this->user}","{$this->pass}") or die('数据库服务器连接失败！');
   	 $this->select_charset($this->charset);
   	 $this->select_database($this->dbname);
   
   }
   
 }