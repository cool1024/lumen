<?php

require 'OrderInfo.php';

class EbizSign {
	
	/**
	 * ֤�鹫Կ����MerCert����
	 * @param orderEntity
	 * @return
	 */
	public static function merCertProcess($orderEntity){
		
		$userCert = $orderEntity->getUserCrt();
		$CertBase64 = base64enc($userCert);

		if($CertBase64==-1)
		{
			echo "֤�����ݼ���ʧ��".PHP_EOL;
			return NULL;
		}
		$CertBase64value=current($CertBase64);
		return $CertBase64value;
	}
	
	/**
	 * ���ɶ���ǩ������MerSignMsg
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
	 * ֤�鹫Կ����MerCert����
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
	 * ���ɶ���ǩ������MerSignMsg
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
