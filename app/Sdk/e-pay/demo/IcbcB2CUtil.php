<?php

class IcbcB2CUtil {


		public static function checkNum($s)
		{
		$i=0;
		$buff=str_split($s,1);
		for($i=0;$i<count($buff);$i++)
		{
			if(!is_numeric($buff[$i]))
			{
			return -1;
			}
		}
		return 0;
		}


			
		/*
		 * 商户账号格式校验(19||19-9)
		 * 账户管家项目 14.11
		 * @return
		 * @throws Exception
		 */
		public static function merAcctCheck($merAcct)
		{
			$i=0;
			$buff=str_split($merAcct,1);
			$buff1='-';
			if(count($buff)==19)
			{
				for($i=0;$i<19;$i++)
				{
					if(!is_numeric($buff[$i]))
					{
						return -1;
					}
				}
			}
			else if(count($buff)==29)
			{
				for($i=0;$i<count($buff);$i++)
				{
					if($i<19)
					{
						if(!is_numeric($buff[$i]))
						{
							return -1;
						}
					}
					if($i==19)
					{
						if($buff[$i]!=$buff1)
						{	
							return -1;
						}
					}
					if($i>19)
					{
						if(!isdigit($buff[$i]))
						{
							return -1;
						}
					}
				}
			}
			else
			{
			return -1;
			}
			return 0;
		}
		/**
		 * 空判断
		 * @param src
		 * @param des
		 * @return
		 */
		public static function judgeNull($src,$des){
			if($src==NULL){
				return $des;
			}else{
				return $src;
			}
		}
	
}

?>
