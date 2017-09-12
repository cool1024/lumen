<?php 
require_once __DIR__ . '\..\icbcB2C.common\IcbcB2CUtil.php';
require_once __DIR__ . '\..\icbcB2C.includes\icbcB2C.errorInfo\ErrBean.php';
require_once __DIR__ . '\..\icbcB2C.model\B2cConfig.php';
require_once __DIR__ . '\..\icbcB2C.model\FormData.php';
require_once __DIR__ . '\..\icbcB2C.model\MerReqData.php';
require_once __DIR__ . '\..\icbcB2C.model\MerResData.php';
require_once __DIR__ . '\..\icbcB2C.model\OrderInfo.php';
require_once __DIR__ . '\..\icbcB2C.model\tranData.php';
require_once __DIR__ . '\..\icbcB2C.pay\IcbcB2CPay.php';
require_once __DIR__ . '\..\icbcB2C.includes\javaBridge.php';

class IcbcB2CPayImpl implements IcbcB2CPay
{

	public function packTranData($b2cConfig, $tranData)
	{
	}

	public function createFormData($b2cConfig, $tranData)
	{
		$tranDataxmlStr = $tranData;
		$formdata = new FormData();
		$pwd = $b2cConfig['password'];
		$userCrtPath = $b2cConfig['userCrtPath'];
		$userKeyPath = $b2cConfig['userKeyPath'];
		$bytetranData = Bytes::getBytes($tranDataxmlStr);
		$ReturnValue = new Java("cn.com.infosec.icbc.ReturnValue");
		$Base64tranData = java_values($ReturnValue->base64enc($bytetranData));
		$StrBase64tranData = $Base64tranData;
		$keyPass = CharArray::toCharArray($pwd);
		$bcert = ReadBytesFile::readFile($userCrtPath);
		$bkey = ReadBytesFile::readFile($userKeyPath);
		$sign = $ReturnValue->sign($bytetranData, count($bytetranData), $bkey, $keyPass);
		if ($sign == null) return null;
		$EncSign = java_values($ReturnValue->base64enc($sign));
		$SignMsgBase64 = $EncSign;
		$EncCert = java_values($ReturnValue->base64enc($bcert));
		$CertBase64 = $EncCert;
		$formdata->setInterfaceName($b2cConfig['interfaceName']);
		$formdata->setInterfaceVersion($b2cConfig['interfaceVersion']);
		$formdata->setTranData($StrBase64tranData);
		$formdata->setMerSignMsg($SignMsgBase64);
		$formdata->setMerCert($CertBase64);
		$formdata->settranDataMingWen($tranDataxmlStr);
		return $formdata;
	}
}
?>
