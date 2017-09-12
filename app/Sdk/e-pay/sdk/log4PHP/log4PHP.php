<?php
	require_once dirname(__FILE__).'/../log4PHP/php/Logger.php';	//引入log4php配置文件
	Logger::configure(dirname(__FILE__).'/../log4PHP/log4PHPConfig.xml');
	
	//返回日志对象，$name为生成日志对象的类名
	class Log{
		public static function getLogger($name){
			return Logger::getLogger($name);
		}
	}
?>