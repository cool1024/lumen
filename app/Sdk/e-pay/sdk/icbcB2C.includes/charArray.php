<?php
	/*
	 * 字符串转换数组类
	 */
	class CharArray{
		/*
		 * 将字符串转换为字符数组
		 * @param str
		 * 字符串
		 * @return charArray
		 * 转换后的字符数组
		 */
		public static function toCharArray($str){
			$charArray = array();
			$len = strlen($str);
			for($i=0;$i<$len;$i++){
				$charArray[] = $str[$i];
			}
			return $charArray;
		}
	}
?>