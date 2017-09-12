<?php

require 'OrderInfo.php';

/*加载PHP签名模块，详细参加部署文档*/
if (!extension_loaded('infosec'))
{
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
	{
		dl('php_infosec.dll');
	}
else
	{
		dl('infosec.so');
	}
}

class EbizSign {
	
	/**
	 * 证书公钥数据MerCert处理
	 * @param orderEntity
	 * @return
	 */
	public static function merCertProcess($orderEntity){
		
		$userCert = $orderEntity->getUserCrt();
		$CertBase64 = base64enc($userCert);

		if($CertBase64==-1)
		{
			echo "证书数据加密失败".PHP_EOL;
			return NULL;
		}
		$CertBase64value=current($CertBase64);
		return $CertBase64value;
	}
	
	/**
	 * 生成订单签名数据MerSignMsg
	 * @param orderEntity
	 * @return
	 */
	public static function sign($orderEntity,$tranData_xml){
		$userKey = $orderEntity->getUserKey();
		$userKeyPwd = $orderEntity->getUserKeyPassword();

		$key = substr($userKey,2);
		$sign = sign($tranData_xml,$key,$userKeyPwd);
		$signvalue=current($sign);
		$SignMsgBase64 = base64enc($signvalue);
		$SignMsgBase64value = current($SignMsgBase64);
		return $SignMsgBase64value;
	}
	
	
	/**
	 * 证书公钥数据MerCert处理
	 * @param orderEntity
	 * @return
	 */
	public static function merCertProcess11($orderEntity){
		$userCert = $orderEntity->getUserCrt();
		$CertBase64 = base64enc($userCert);
		$CertBase64value=current($CertBase64);
		return $CertBase64value;
	}
	/**
	 * 生成订单签名数据MerSignMsg
	 * @param orderEntity
	 * @return
	 */
	public static function sign11($orderEntity,$tranData_xml){
		$userKey = $orderEntity->getUserKey();
		$userKeyPwd = $orderEntity->getUserKeyPassword();
		$key = substr($userKey,2);
	
		$sign = sign($tranData_xml,$key,$userKeyPwd);
		$signvalue=current($sign);
		$SignMsgBase64 = base64enc($signvalue);
		$SignMsgBase64value = current($SignMsgBase64); 

		return $SignMsgBase64value;
	}
	
}


?>
