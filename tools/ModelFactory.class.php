<?php
 class ModelFactory{
 	static $arr = array();
 	static function getModel($class_name){
 		if(empty(self::$arr[$class_name])){
 			$arr[$class_name] = new $class_name();
 		}
 		return self::$arr[$class_name];
 	}	
 }