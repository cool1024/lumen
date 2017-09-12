<?php
	require_once dirname(__FILE__).'./getBytes.php';
	
	/*
	 * 此类提供证书byte方式读取功能
	 */
	class ReadBytesFile{
		/*
		 * 以byte方式读取证书，返回byte数组
		 * @param filePath
		 * 证书路径
		 * @return bytes
		 * 读取后的byte数组
		 */
		public static function readFile($filePath){
			if(!file_exists($filePath))
				return null;
			else{
				$file = fopen($filePath, "r");
				$bytes = array();
				while(!feof($file)){
					$bytes[] = Bytes::getByte(fgetc($file));
//$bytes[] = getByte(fgetc($file));
				}
				fclose($file);
				$bytes = array_slice($bytes, 0, count($bytes)-1);
				return $bytes;
			}
		}
		public static function getByte($char){
			if(ord($char) >= 128)
				return ord($char)-256;
			else
				return ord($char);
		}	
	}
?>