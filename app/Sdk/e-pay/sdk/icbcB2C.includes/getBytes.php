<?php
	/*
	 * 此类提供byte类型转换功能
	 */
	class Bytes{
		/*
		 * 将字符串转换为byte类型数组
		 * @param str
		 * 字符串
		 * @return bytes
		 * 转换后的byte数组
		 */
		public static function getBytes($str){
			$len = strlen($str);
			$bytes = array();
			for($i=0;$i<$len;$i++){
				if(ord($str[$i]) >= 128){
					$byte = ord($str[$i])-256;
				}
				else{
					$byte = ord($str[$i]);
				}
				$bytes[] = $byte;
			}
			return $bytes;
		}
		
		/*
		 * 将字符转换为byte字节
		 * @param char
		 * 字符
		 * @return char
		 * 转换后的byte字节
		 */
		public static function getByte($char){
			if(ord($char) >= 128)
				return ord($char)-256;
			else
				return ord($char);
		}
		
		/*
		 * 将byte数组转换为字符串
		 * @param bytes
		 * byte数组
		 * @return str
		 * 转换后的字符串
		 */
		public static function getString($bytes){
			$str = "";
			foreach ($bytes as $c){
				$str .= chr($c);
			}
			return $str;
		}
	}
?>