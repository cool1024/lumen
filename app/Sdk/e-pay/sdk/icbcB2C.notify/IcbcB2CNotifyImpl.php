<?php 
	require_once dirname(__FILE__).'/../icbcB2C.common/IcbcB2CUtil.php';
	require_once dirname(__FILE__).'/../icbcB2C.errorInfo/ErrBean.php';
	require_once dirname(__FILE__).'/../icbcB2C.model/B2cConfig.php';
	require_once dirname(__FILE__).'/../icbcB2C.model/NotifyData.php';
	require_once dirname(__FILE__).'/../icbcB2C.model/NotifyOrderInfo.php';
	require_once dirname(__FILE__).'/../icbcB2C.notify/IcbcB2CNotify.php';

	require_once dirname(__FILE__).'/../log4PHP/log4PHP.php';
	require_once dirname(__FILE__).'/../icbcB2C.includes/javaBridge.php';

	
/*
 * <p>icbcB2C接收工行通知消息类</p>
 * <br/>
 *<p>此类用于将接收到的工行通知消息密文串验签解密，生成商户需要的通知消息内容</P>
 *@see <p>《中国工商银行网上银行新B2C在线支付接口说明V1.0.0.11》</p>
 */
class IcbcB2CNotifyImpl implements IcbcB2CNotify {
	
	/*
	 * <p>生成通知接口信息</p>
	 * @param notifyData
	 * base64编码的银行通知消息
	 * @param signMsg
	 * 对notifyData先签名，后base64编码的结果
	 * @param xmlPath
	 * 配置文件存放路径
	 * @return notifyData
	 * @throws Exception
	 */	
	public function createNotifyData($notifyData, $signMsg, $xmlPath){ 
		$logger = Log::getLogger(__CLASS__);
		try {
			$b2cConfig = IcbcB2CUtil::loadXML($xmlPath);
			if($b2cConfig != null)
			{
				//取银行证书
				$publicCrtPath = $b2cConfig->getPublicCrtPath();
				$logger->info("银行证书存放路径:".$publicCrtPath);
				//byte方式读取银行证书				
				$bcert = ReadBytesFile::readFile($publicCrtPath);
				//byte方式读取signMsg
				$byteSignMsg = Bytes::getBytes(urldecode($signMsg));
				//初始化ReturnValue
				$ReturnValue = new Java("cn.com.infosec.icbc.ReturnValue");
				$DecSignMsg = $ReturnValue->base64dec($byteSignMsg);
				if($DecSignMsg == null)
				{
					$logger->error(ErrBean::$const_Err_DecSignMsg);
					return null;
				}
				$byteNotifyData = Bytes::getBytes(urldecode($notifyData));
				$DecNotifyData = $ReturnValue->base64dec($byteNotifyData);
				if($DecNotifyData == null)
				{
					$logger->error(ErrBean::$const_Err_DesNotify);
					return null;
				}
				
				$logger->info("银行对通知结果的签名数据：" . urldecode($signMsg));
				
				$result = java_values($ReturnValue->verifySign($DecNotifyData, count($DecNotifyData), $bcert, $DecSignMsg));		
				if($result == 0)//验签成功
				{	
					$DecNotifyData1 = base64_decode(urldecode($notifyData));
					$logger->info("base64解码SignMsg：" . $DecNotifyData1);
					$nd = self::xmlElements($DecNotifyData1);
					$logger->info("验签成功！");
				}
				else
				{
					$logger->error("验签失败！");	
					return null;
				}			
			}
			else
			{
				$logger->error(ErrBean::$const_Err_Config);
				return null;
			}	
		} catch (Exception $e) {
			$logger->fatal($e->getMessage(), $e);
			return null;
		}
        return $nd; 
    } 
	
	/*
	 * <p>从xml字符串解析出notifyData</p>
	 * @param xmlDoc
	 * notifyData的xml字符串
	 * @return notifyData 
	 * @throws Exception
	 */
	public function xmlElements($xmlDoc) { 
        
		$notifyData = new NotifyData();
        try { 
        	//获取notify明文xml串
        	$notifyData->setNotifyData($xmlDoc);
        	$dom = new DOMDocument;
			$dom->loadXML($xmlDoc);
			$xml = simplexml_import_dom($dom);
			//取interfaceName...
			$notifyData->setInterfaceName(trim($xml->interfaceName));
			$notifyData->setInterfaceVersion(trim($xml->interfaceVersion));
			$notifyData->setOrderDate(trim($xml->orderInfo->orderDate));
			$notifyData->setCurType(trim($xml->orderInfo->curType));
			$notifyData->setMerID(trim($xml->orderInfo->merID));
			$notifyData->setVerifyJoinFlag(trim($xml->custom->verifyJoinFlag));
			$notifyData->setJoinFlag(trim($xml->custom->JoinFlag));
			$notifyData->setUserNum(trim($xml->custom->UserNum));
			$notifyData->setTranBatchNo(trim($xml->bank->TranBatchNo));
			$notifyData->setNotifyDate(trim($xml->bank->notifyDate));
			$notifyData->setTranStat(trim($xml->bank->tranStat));
			$notifyData->setComment(iconv("utf-8", "gbk", trim($xml->bank->comment)));
			$orderInfoList = array();
			foreach ($xml->orderInfo->subOrderInfoList->subOrderInfo as $subOrderInfo){
				$notifyOrderInfo = new NotifyOrderInfo();
				$notifyOrderInfo->setOrderid(trim($subOrderInfo->orderid));
				$notifyOrderInfo->setAmount(trim($subOrderInfo->amount));
				$notifyOrderInfo->setInstallmentTimes(trim($subOrderInfo->installmentTimes));
				$notifyOrderInfo->setMerAcct(trim($subOrderInfo->merAcct));
				$notifyOrderInfo->setTranSerialNo(trim($subOrderInfo->tranSerialNo));
				$orderInfoList[] = $notifyOrderInfo;
			}
			$notifyData->setSubOrderInfoList($orderInfoList);
            
        } catch (Exception $e) { 
            $logger->fatal($e->getMessage(), $e);
            return null;
        }
        return $notifyData; 
    } 
}
?>