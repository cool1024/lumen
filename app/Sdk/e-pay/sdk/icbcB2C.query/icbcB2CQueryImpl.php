<?php 
	require_once dirname(__FILE__)."/../icbcB2C.common/IcbcB2CUtil.php";
	require_once dirname(__FILE__)."/../icbcB2C.model/MerReqData.php";
	require_once dirname(__FILE__)."/../icbcB2C.model/MerResData.php";
	require_once dirname(__FILE__)."/../icbcB2C.model/B2cConfig.php";
	require_once dirname(__FILE__)."/../icbcB2C.query/icbcB2CQuery.php";
	
	require_once dirname(__FILE__).'/../log4PHP/log4PHP.php';	//引入日志配置文件
	/*
	 * <p>icbcB2CAPI查询类</p>
	 * <br/>
	 *<p>此类用于按订单号、订单日期查询具体订单状态</P>
	 *@see <p>《网上银行系统商户API查询接口手册V1.1》</p>
	 *@author 贾晓桐
	 */
class IcbcB2CQueryImpl implements IcbcB2CQuery{
	/*
	 * <p>封装MerResData报文</p>
	 * @param xmlDoc
	 * 总行反回的B2CAPIxml明文串
	 * @return MerResData
	 * @throws Exception
	 */
	public function xmlElements($xmlDoc) {
		$logger = Log::getLogger(__CLASS__);
		
        $merResData = new MerResData();
        
        try {
        	$dom = new DOMDocument;
			$dom->loadXML($xmlDoc);
			$xml = simplexml_import_dom($dom);
			
			$merResData->setApiName(trim($xml->pub->APIName));
			$merResData->setApiVersion(trim($xml->pub->APIVersion));
			
			$merResData->setOrderNum(trim($xml->in->orderNum));
			$merResData->setTranDate(trim($xml->in->tranDate));
			$merResData->setShopCode(trim($xml->in->ShopCode));
			//$merResData->setShopAccount(trim($xml->in->ShopAccount));
			
			$merResData->setTranSerialNum(trim($xml->out->tranSerialNum));
			$merResData->setTranStat(trim($xml->out->tranStat));
			$merResData->setBankRem(trim($xml->out->bankRem));
			$merResData->setAmount(trim($xml->out->amount));
			$merResData->setCurrType(trim($xml->out->currType));
			$merResData->setTranTime(trim($xml->out->tranTime));
			$merResData->setShopAccount(trim($xml->out->ShopAccount));
			$merResData->setPayeeName(iconv("utf-8","gbk",trim($xml->out->PayeeName)));
			$merResData->setJoinFlag(trim($xml->out->JoinFlag));
			$merResData->setMerJoinFlag(trim($xml->out->MerJoinFlag));
			$merResData->setCustJoinFlag(trim($xml->out->CustJoinFlag));
			$merResData->setCustJoinNum(trim($xml->out->CustJoinNum));
			$merResData->setCertID(trim($xml->out->CertID));

        } catch (Exception $e) { 
            $logger->fatal($e->getMessage(), $e);
            return null;
        } 
        return $merResData; 
    }
    
	/*
	 * <p>查询ICBCApi报文</p>
	 * @param xmlPath
	 * 配置文件路径
	 * @param merReqData
	 * 返回的总行返回的各种场
	 * @return MerResData
	 * @throws Exception
	 */
	public function getICBCApiData($xmlPath, $merReqData){
		$logger = Log::getLogger(__CLASS__);
		$merResData = null;		//查询返回值
		try{
			$b2cConfig = IcbcB2CUtil::loadXML($xmlPath);
			//生成POST数据
			$data = "APIName=EAPI".
					"&APIVersion=001.001.002.001".
					"&MerReqData=<?xml version=\"1.0\" encoding=\"GBK\" standalone=\"no\" ?>".
						"<ICBCAPI><in><orderNum>".trim($merReqData->getOrderNum())."</orderNum>".
						"<tranDate>".trim($merReqData->getTranDate())."</tranDate>".
						"<ShopCode>".trim($merReqData->getShopCode())."</ShopCode>".
						"<ShopAccount>".trim($merReqData->getShopAccount())."</ShopAccount></in></ICBCAPI>";
			$logger->info("上送查询表单数据：".$data);
			$curl = curl_init();		//初始化curl句柄
			curl_setopt($curl, CURLOPT_URL, $b2cConfig->getApiQueryHost());		//设置域名
			curl_setopt($curl, CURLOPT_PORT, $b2cConfig->getApiQueryHostPort());		//设置端口号	
			//检查服务器SSL证书中是否存在一个公用名，检查公用名是否存在，并且是否和与提供的主机名匹配
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);		//不验证服务器端	
			curl_setopt($curl, CURLOPT_SSLCERT, $b2cConfig->getPemPath());		//PEM格式商户证书
			curl_setopt($curl, CURLOPT_SSLCERTPASSWD, $b2cConfig->getPassword());
			curl_setopt($curl, CURLOPT_POST, TRUE);		//POST请求
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);		//POST数据
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);		//将获取信息以文件流方式返回，而不是直接输出
			$returnInfo = urldecode(curl_exec($curl)); 	//执行操作，进行url解码		
			if(curl_errno($curl)){
				$logger->info("cURL错误代码：".curl_errno($curl));
				return null;
			}
			curl_close($curl);		//关闭句柄，释放资源	
			
			if(IcbcB2CUtil::checkNum($returnInfo))		//返回错误代码
			{
				$logger->error("支付指令查询报错，错误代码：".$returnInfo);
				return null;
			}
			else
			{
				$logger->error("支付指令查询返回值：".$returnInfo);
				$merResData = self::xmlElements($returnInfo);
			}																	
		}
		catch (Exception $e) {			
			$logger->fatal($e->getMessage(), $e);
		}
		return $merResData;
	}
}
?>