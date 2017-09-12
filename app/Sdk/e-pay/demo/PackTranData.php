<?php

require 'IcbcB2CUtil.php';
require 'EbizSign.php';

class PackTranData {
	
	/**
	 * 生成tranData
	 * @param tranData
	 * @return
	 */
	public static function packTranData06($tranData,$orderEntity){
		$orderInfo = $tranData->setOrderInfo();
		$orderInfo->perpareData_OrderInfo($orderEntity);







			//接口名称
	      if (strcmp("ICBC_WAPB_B2C",($tranData->getInterfaceName()))!=0){
	    	  echo "错误：接口名称不正确，取值必须为ICBC_WAPB_B2C".PHP_EOL;
	    	  return NULL;
	      }
			//接口号
	      if (strcmp("1.0.0.6",($tranData->getInterfaceVersion()))!=0){
	    	  echo "错误：接口版本号不正确，取值必须为1.0.0.6".PHP_EOL;
	    	  return NULL;
	      }

			// 订单信息
	      if (strcmp("1.0.0.6",($tranData->getInterfaceVersion()))!=0)
	    	  
	    	if($orderInfo==NULL){
	    		echo "检查商户上送订单信息是否合法出错：orderInfo==null".PHP_EOL;
		    	return NULL;
	    	}
	      	$amount = $orderInfo->getAmount();
            if (($amount == NULL) || (strlen(trim($amount))== 0)) {
            	echo "订单金额不能为空!".PHP_EOL;
                return NULL;
            }
            if (strstr($amount,'.')!=NULL) {
            	echo "订单金额以分为单位，不应该含有小数点。amount=$amount".PHP_EOL;
                return NULL;
            }	
			
	    	//判断是否是19-9商户账号
			$merAcct = $orderInfo->getMerAcct();
			if($merAcct==NULL || (IcbcB2CUtil::merAcctCheck($merAcct))==-1){
				echo "商城账号有误：merAcct=$merAcct".PHP_EOL;
		        return NULL;
			}
			// 设置联名标志
			$verifyJoinFlag = $tranData->getVerifyJoinFlag();
			if ( $verifyJoinFlag==NULL || strcmp($verifyJoinFlag,'0')!=0) {
				echo "联名标志错误：verifyJoinFlag=$verifyJoinFlag".PHP_EOL;
		        return NULL;
			}
			// 设置数据区的语言标志
			if ($tranData->getLanguage() == NULL || strcmp($tranData->getLanguage(),"zh_CN")!=0) {
				echo "订提交语言不是中文!".PHP_EOL;
				return NULL;
			}
			//安心子账户仅支持全额付款
			$isSafeSubAccount = "0";
			if(substr_compare($merAcct,"35",9,2) || substr_compare($merAcct,"38",9,2)){
				$isSafeSubAccount="1";
			}
			$installmentTimes = $orderInfo->getInstallmentTimes();
			if(strcmp($isSafeSubAccount,"1") && strcmp($installmentTimes,"1")!=0){
				echo "商户上送订单信息有误，安心子账户不支持商户分期。 installmentTimes=$installmentTimes".PHP_EOL;
				return NULL;
			}
			// 分期期数的检查，取值：1、3、6、9、12、18、24；1代表全额付款，必须为以上数值，否则订单校验不通过。
			if((strlen($installmentTimes)==0) ||
			(
				strcmp($installmentTimes,"1")!=0  && 
				strcmp($installmentTimes,"3")!=0  &&
				strcmp($installmentTimes,"6")!=0  && 
				strcmp($installmentTimes,"9")!=0  &&
				strcmp($installmentTimes,"12")!=0 && 
				strcmp($installmentTimes,"18")!=0 &&
				strcmp($installmentTimes,"24")!=0
			)
			)
			{
				echo "商户上送订单信息中分期付款期数项错误。installmentTimes=$installmentTimes".PHP_EOL;
				return NULL;
			}
			
			
		// 币种校验，目前接口只支持人民币001
			$curType = $orderInfo->getCurType();
			if (strcmp($curType,"001")!=0) {
				echo "商户上送订单信息中币种项错误。curType=$curType".PHP_EOL;
				return NULL;
			}
			// 商户通知地址
			$merURL = $tranData->getMerURL();
			if (($merURL == null) || strlen(trim($merURL)) == 0) {
				echo "商户上送订单信息中通知地址项不能为空".PHP_EOL;
				return NULL;
			}
			// 检查通知地址		
			if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$merURL)){
				echo "商户上送订单信息中通知地址项错误。merURL=$merURL".PHP_EOL;
				return NULL;
			}

			//检查通知类型
			$notifyType = $tranData->getNotifyType();
			if (strcmp($notifyType,"HS")!=0 && strcmp($notifyType,"AG")!=0) {
				echo "商户上送订单信息中通知类型错误。 notifyType=$notifyType".PHP_EOL;
				return NULL;
			}
			// 检查通知类型
			$resultType = $tranData->getResultType();
			if (strcmp($resultType,"0")!=0 && strcmp($resultType,"1")!=0) {
				echo "商户上送订单信息中通知结果类型错误。 resultType=$resultType".PHP_EOL;
				return NULL;
			}
			// 检查含运费金额是否符合格式
			$carriageAmt = $tranData->getCarriageAmt();
			if (($carriageAmt != NULL) && strcmp($carriageAmt,"")!=0) {
				if ($carriageAmt < 0) {
					echo "无效的含运费金额。carriageAmt=$carriageAmt".PHP_EOL;
					return NULL;
				}
			} else {
				echo "含运费金额金额必须大于零。carriageAmt=$carriageAmt".PHP_EOL;
				return NULL;
			}
			// 检查订单数量是否符合格式
			$goodsNum = $tranData->getGoodsNum();
			if (($goodsNum != NULL) && (strcmp($goodsNum,""))!=0) {
				if ($goodsNum <= 0) {
					echo "订单数量必须大于零。goodsNum=$goodsNum".PHP_EOL;
					return NULL;
				}
			} else {
				echo "无效的订单数量。goodsNum=$goodsNum".PHP_EOL;
				return NULL;
			}





			$xml ="<?xml version=\"1.0\" encoding=\"GBK\" standalone=\"no\"?>";
			$xml.="<B2CReq>";
			$xml.="<interfaceName>";
			$xml.=$tranData->getInterfaceName(); 
			$xml.="</interfaceName>";
		    $xml.="<interfaceVersion>"; 
			$xml.=$tranData->getInterfaceVersion(); 
			$xml.="</interfaceVersion>";
		    $xml.="<orderInfo>";
		    $xml.="<orderDate>";
			$xml.=$orderInfo->getOrderDate();
			$xml.="</orderDate>";
		    $xml.="<orderid>";
			$xml.=$orderInfo->getOrderid(); 
			$xml.="</orderid>";
		    $xml.="<amount>";
			$xml.=$orderInfo->getAmount();
			$xml.="</amount>";
		    $xml.="<installmentTimes>"; 
			$xml.=$orderInfo->getInstallmentTimes(); 
			$xml.="</installmentTimes>";
		    $xml.="<curType>"; 
			$xml.=$orderInfo->getCurType(); 
			$xml.="</curType>";
		    $xml.="<merID>"; 
			$xml.=$orderInfo->getMerID(); 
			$xml.="</merID>";
		    $xml.="<merAcct>"; 
			$xml.=$orderInfo->getMerAcct();
			$xml.="</merAcct>";
		    $xml.="</orderInfo>";
		    $xml.="<custom>";
		    $xml.="<verifyJoinFlag>"; 
			$xml.=$tranData->getVerifyJoinFlag(); 
			$xml.="</verifyJoinFlag>";
		    $xml.="<Language>"; 
			$xml.=$tranData->getLanguage();
			$xml.="</Language>";
		    $xml.="</custom>";
		    $xml.="<message>";
		    $xml.="<goodsID>"; 
			$xml.=IcbcB2CUtil::judgeNull($tranData->getGoodsID(), "");
			$xml.="</goodsID>";
		    $xml.="<goodsName>";
			$xml.=IcbcB2CUtil::judgeNull($tranData->getGoodsName(), ""); 
			$xml.="</goodsName>";
		    $xml.="<goodsNum>";
			$xml.=$tranData->getGoodsNum();
			$xml.="</goodsNum>";
		    $xml.="<carriageAmt>";
			$xml.=$tranData->getCarriageAmt();
			$xml.="</carriageAmt>";
		    $xml.="<merHint>"; 
			$xml.=IcbcB2CUtil::judgeNull($tranData->getMerHint(), ""); 
			$xml.="</merHint>";
		    $xml.="<remark1>";
			$xml.=IcbcB2CUtil::judgeNull($tranData->getRemark1(), ""); 
			$xml.="</remark1>";
		    $xml.="<remark2>";
			$xml.=IcbcB2CUtil::judgeNull($tranData->getRemark2(), "");
			$xml.="</remark2>";
		    $xml.="<merURL>";
			$xml.=$tranData->getMerURL(); 
			$xml.="</merURL>";
		    $xml.="<merVAR>"; 
			$xml.=IcbcB2CUtil::judgeNull($tranData->getMerVAR(), "");
			$xml.="</merVAR>";
		    $xml.="<notifyType>";
			$xml.=$tranData->getNotifyType(); 
			$xml.="</notifyType>";
		    $xml.="<resultType>";
			$xml.=$tranData->getResultType(); 
			$xml.="</resultType>";
		    $xml.="<backup1>"; 
			$xml.=IcbcB2CUtil::judgeNull($tranData->getBackup1(), ""); 
			$xml.="</backup1>";
		    $xml.="<backup2>"; 
			$xml.=IcbcB2CUtil::judgeNull($tranData->getBackup2(), "");
			$xml.="</backup2>";
		    $xml.="<backup3>"; 
			$xml.=IcbcB2CUtil::judgeNull($tranData->getBackup3(), ""); 
			$xml.="</backup3>";
		    $xml.="<backup4>"; 
			$xml.=IcbcB2CUtil::judgeNull($tranData->getBackup4(), ""); 
			$xml.="</backup4>";
		    $xml.="</message>";
		    $xml.="</B2CReq>";
			 
		return $xml;
	}
	
	/**
	 * 检查商户上送订单信息是否合法
	 * @return
	 */
	public static function verifyOrderData($orderEntity){
		if($orderEntity==NULL){
			echo "检查商户上送订单信息是否合法出错：orderEntity==null".PHP_EOL;
			return NULL;
		}
			
			//检查输入项是否为空，长度是否超限。
			$CheckNames0 = array("interfaceName", "interfaceVersion", "orderid", "amount", "curType", "merID", "merAcct", "orderDate", "installmentTimes", "verifyJoinFlag", "notifyType" );
			$CheckValue0 = array($orderEntity->getInterfaceName(),$orderEntity->getInterfaceVersion(),$orderEntity->getOrderid(),$orderEntity->getAmount(),
								$orderEntity->getCurType(),$orderEntity->getMerID(),$orderEntity->getMerAcct(),$orderEntity->getOrderDate(),$orderEntity->getInstallmentTimes(),
								$orderEntity->getVerifyJoinFlag(),$orderEntity->getNotifyType()
							);
			$limit = array( 30, 15, 30, 10, 3, 20, 29, 14, 2, 1, 2 );
			$i=0;
			for ($i = 0; $i < count($CheckNames0); $i++) {
				$tmp = $CheckValue0[$i];
				if ($tmp == NULL || strlen($tmp)==0) {
					echo "商户上送订单信息中$CheckNames0[$i]项不能为空。".PHP_EOL;
					return NULL;
				} else if (($limit[$i] != -1) && (strlen($CheckValue0[$i]) > $limit[$i])) {
					echo "商户上送订单信息中$CheckNames0[$i]项值过长。".PHP_EOL;
					return NULL;
				}
			}
			$CheckNames1 = array("goodsName", "goodsNum", "goodsID", "remark1", "remark2", "carriageAmt", "merHint", "merURL", "resultType", "backup1", "backup2", "backup3", "backup4" );
			$CheckValue1 = array($orderEntity->getGoodsName(),$orderEntity->getGoodsNum(),$orderEntity->getGoodsID(),$orderEntity->getRemark1(),$orderEntity->getRemark2(),
					$orderEntity->getCarriageAmt(),$orderEntity->getMerHint(),$orderEntity->getMerURL(),$orderEntity->getResultType(),
					$orderEntity->getBackup1(),$orderEntity->getBackup2(),$orderEntity->getBackup3(),$orderEntity->getBackup4());
			$limit2 = array( 60, 10, 10, 100, 100, 10, 40, 1024, 1, 2000, 1000, 1000, 1000 );
			$i=0;
			for ($i = 0; $i < count($CheckNames1); $i++) {
				$tmp = $CheckValue1[$i];
				if ($tmp == NULL) {
					
				} else if (strlen($CheckValue1[$i]) > $limit2[$i]) {
					echo "商户上送订单信息中$CheckNames1[$i]项值过长。".PHP_EOL;
					return NULL;
				}
			}
			
			$userCrt = $orderEntity->getUserCrt();			
			if($userCrt==NULL || strlen($userCrt)<1){
				echo "商户上送订单信息中，商城公钥userCrt不能为空。".PHP_EOL;
				return NULL;
			}
			$userKey = $orderEntity->getUserKey();			
			if($userKey==NULL || strlen($userKey)<1){
				echo "商户上送订单信息中，商城私钥userKey不能为空。".PHP_EOL;
				return NULL;
			}
			$userKeyPassword = $orderEntity->getUserKeyPassword();	
			if($userKeyPassword==NULL || strlen($userKeyPassword)<1){
				echo "商户上送订单信息中，商城私钥密码$userKeyPassword不能为空".PHP_EOL;
				return NULL;
			}
			$apiQueryHost = $orderEntity->getApiQueryHost();			
			if (($apiQueryHost == NULL) || (strlen(trim($apiQueryHost)) == 0)) {
				echo "商户上送订单信息中，请求地址apiQueryHost不能为空。".PHP_EOL;
				return NULL;
			}
			$apiQueryHostPort = $orderEntity->getApiQueryHostPort();	
			if($apiQueryHostPort!=NULL && strcmp($apiQueryHostPort,"")!=0){
				if(IcbcB2CUtil::checkNum($apiQueryHostPort)==-1){
					echo "商户上送订单信息中请求地址端口apiQueryHostPort错误。apiQueryHostPort=$apiQueryHostPort".PHP_EOL;
					return NULL;
				}
			}
			return 0;
	
	}	
	
	/**
	 * 生成tranData
	 * @param tranData
	 * @return
	 */
	public static function packTranData11($tranData,$orderEntity){
		$orderInfo = $tranData->setOrderInfo();
        $orderInfo->perpareData_OrderInfo($orderEntity);
		
		  // 接口名称
		if (strcmp("ICBC_WAPB_B2C",($tranData->getInterfaceName()))!=0){
	    	  echo "错误：接口名称不正确，取值必须为ICBC_WAPB_B2C".PHP_EOL;
	    	  return NULL;
	      }
	     // 接口号
	      if (strcmp("1.0.0.11",($tranData->getInterfaceVersion()))!=0){
	    	  echo "错误：接口版本号不正确，取值必须为1.0.0.11".PHP_EOL;
	    	  return NULL;
	      }
		  
		  
	      	$amount = $orderInfo->getAmount();
            if (($amount == NULL) || (strlen(trim($amount))== 0)) {
            	echo "订单金额不能为空!".PHP_EOL;
                return NULL;
            }

            if (strstr($amount,".")!=NULL) {
            	echo "订单金额以分为单位，不应该含有小数点。amount=$amount".PHP_EOL;
                return NULL;
            }	
	      
	   
			// 设置联名标志
			$verifyJoinFlag = $tranData->getVerifyJoinFlag();
			if ( $verifyJoinFlag==NULL || strcmp($verifyJoinFlag,'0')!=0) {
				echo "联名标志错误：verifyJoinFlag=$verifyJoinFlag".PHP_EOL;
		        return NULL;
			}
			// 设置数据区的语言标志
			if ($tranData->getLanguage() == NULL || strcmp($tranData->getLanguage(),"zh_CN")!=0) {
				echo "订提交语言不是中文!".PHP_EOL;
				return NULL;
			}
			// 分期期数的检查，取值：1、3、6、9、12、18、24；1代表全额付款，必须为以上数值，否则订单校验不通过。
			$installmentTimes = $orderInfo->getInstallmentTimes();
			if((strlen($installmentTimes)==0) ||
			(
				strcmp($installmentTimes,"1")!=0  && 
				strcmp($installmentTimes,"3")!=0  &&
				strcmp($installmentTimes,"6")!=0  && 
				strcmp($installmentTimes,"9")!=0  &&
				strcmp($installmentTimes,"12")!=0 && 
				strcmp($installmentTimes,"18")!=0 &&
				strcmp($installmentTimes,"24")!=0
			)
			)
			{
				echo "商户上送订单信息中分期付款期数项错误。 installmentTimes=$installmentTimes".PHP_EOL;
				return NULL;
			}
			//币种校验，目前接口只支持人民币001
			$curType = $orderInfo->getCurType();
			if (strcmp($curType,"001")!=0) {
				echo "商户上送订单信息中币种项错误。curType=$curType".PHP_EOL;
				return NULL;
			}
			// 商户通知地址
			$merURL = $tranData->getMerURL();
			if (($merURL == null) || strlen(trim($merURL)) == 0) {
				echo "商户上送订单信息中通知地址项不能为空。".PHP_EOL;
				return NULL;
			}

			// 检查通知地址	
			if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$merURL)){
				echo "商户上送订单信息中通知地址项错误。merURL=$merURL".PHP_EOL;
				return NULL;
			}
			
			
			// 检查通知结果类型
			$resultType = $tranData->getResultType();
			if (strcmp($resultType,"0")!=0 && strcmp($resultType,"1")!=0) {
				echo "商户上送订单信息中通知结果类型错误。resultType=$resultType".PHP_EOL;
				return NULL;
			}

			// 检查含运费金额是否符合格式
			$carriageAmt = $tranData->getCarriageAmt();
			if (($carriageAmt != NULL) && strcmp($carriageAmt,"")!=0) {
				if ($carriageAmt < 0) {
					echo "含运费金额金额必须大于零。carriageAmt=$carriageAmt".PHP_EOL;
					return NULL;
				}
			} else {
				echo "无效的含运费金额。carriageAmt=$carriageAmt".PHP_EOL;
				return NULL;
			}
			// 检查订单数量是否符合格式
			$goodsNum = $tranData->getGoodsNum();
			if (($goodsNum != NULL) && (strcmp($goodsNum,"")!=0)) {
				if ($goodsNum <= 0) {
					echo "订单数量必须大于零。goodsNum=$goodsNum".PHP_EOL;
					return NULL;
				}
			} else {
				echo "无效的订单数量。goodsNum=$goodsNum".PHP_EOL;
				return NULL;
			}	
			
			$xml  = "<?xml version=\"1.0\" encoding=\"GBK\"  standalone=\"no\"?>";
			$xml .= "<B2CReq>";
			$xml .= "<interfaceName>ICBC_PERBANK_B2C</interfaceName>";
			$xml .= "<interfaceVersion>1.0.0.11</interfaceVersion>";
			$xml .= "<orderInfo>";
			$xml .= "<orderDate>";
			$xml .= $orderInfo->getOrderDate();
			$xml .= "</orderDate>";
			
			$xml .= "<curType>";
			$xml .= $orderInfo->getCurType();
			$xml .= "</curType>";
			
			$xml .= "<merID>";
			$xml .= $orderInfo->getMerID();
			$xml .= "</merID>";	
			
			$xml .= "<subOrderInfoList>";
			$xml .= "<subOrderInfo>";

			$xml .= "<orderid>";
			$xml .= $orderInfo->getOrderid();
			$xml .= "</orderid>";
			
			$xml .= "<amount>";
			$xml .= $orderInfo->getAmount();
			$xml .= "</amount>";
			
			$xml .= "<installmentTimes>";
			$xml .= $orderInfo->getInstallmentTimes();
			$xml .= "</installmentTimes>";	

			$xml .= "<merAcct>";
			$xml .= $orderInfo->getMerAcct();
			$xml .= "</merAcct>";

			$xml .= "<goodsID>";
			$xml .= $tranData->getGoodsID();
			$xml .= "</goodsID>";

			$xml .= "<goodsName>";
			$xml .= $tranData->getGoodsName();
			$xml .= "</goodsName>";

			$xml .= "<goodsNum>";
			$xml .= $tranData->getGoodsNum();
			$xml .= "</goodsNum>";

			$xml .= "<carriageAmt>";
			$xml .= $tranData->getCarriageAmt();
			$xml .= "</carriageAmt>";
			
			$xml .= "</subOrderInfo>";	
			$xml .= "</subOrderInfoList>";
			$xml .= "</orderInfo>";	
			
			$xml .= "<custom>";	

			$xml .= "<verifyJoinFlag>";
			$xml .= $tranData->getVerifyJoinFlag();
			$xml .= "</verifyJoinFlag>";

			$xml .= "<Language>";
			$xml .= $tranData->getLanguage();
			$xml .= "</Language>";	
			
			$xml .= "</custom>";
			
			$xml .= "<message>";	

			$xml .= "<creditType>";
			$xml .= $tranData->getCreditType();
			$xml .= "</creditType>";

			$xml .= "<notifyType>";
			$xml .= $tranData->getNotifyType();
			$xml .= "</notifyType>";	

			$xml .= "<resultType>";
			$xml .= $tranData->getResultType();
			$xml .= "</resultType>";
			
			$xml .= "<merReference>";
			$xml .= $tranData->getMerReference();
			$xml .= "</merReference>";

			$xml .= "<merCustomIp>";
			$xml .= $tranData->getMerCustomIp();
			$xml .= "</merCustomIp>";
			
			$xml .= "<goodsType>";
			$xml .= $tranData->getGoodsType();
			$xml .= "</goodsType>";

			$xml .= "<merCustomID>";
			$xml .= $tranData->getMerCustomID();
			$xml .= "</merCustomID>";	
			
			$xml .= "<merCustomPhone>";
			$xml .= $tranData->getMerCustomPhone();
			$xml .= "</merCustomPhone>";
			
			$xml .= "<goodsAddress>";
			$xml .= $tranData->getGoodsAddress();
			$xml .= "</goodsAddress>";

			$xml .= "<merOrderRemark>";
			$xml .= $tranData->getMerOrderRemark();
			$xml .= "</merOrderRemark>";
			
			$xml .= "<merHint>";
			$xml .= $tranData->getMerHint();
			$xml .= "</merHint>";

			$xml .= "<remark1>";
			$xml .= $tranData->getRemark1();
			$xml .= "</remark1>";

			$xml .= "<remark2>";
			$xml .= $tranData->getRemark2();
			$xml .= "</remark2>";

			$xml .= "<merURL>";
			$xml .= $tranData->getMerURL();
			$xml .= "</merURL>";

			$xml .= "<merVAR>";
			$xml .= $tranData->getMerVAR();
			$xml .= "</merVAR>";
			
			$xml .= "</message>";	
			
			$xml .= "<extend>";	

			$xml .= "<e_isMerFlag>";
			$xml .= $tranData->getE_isMerFlag();
			$xml .= "</e_isMerFlag>";

			$xml .= "<e_Name>";
			$xml .= $tranData->getE_Name();
			$xml .= "</e_Name>";	

			$xml .= "<e_TelNum>";
			$xml .= $tranData->getE_TelNum();
			$xml .= "</e_TelNum>";
			
			$xml .= "<e_CredType>";
			$xml .= $tranData->getE_CredType();
			$xml .= "</e_CredType>";

			$xml .= "<e_CredNum>";
			$xml .= $tranData->getE_CredNum();
			$xml .= "</e_CredNum>";

			$xml .= "<e_CardNo>";
			$xml .= $tranData->getE_CardNo();
			$xml .= "</e_CardNo>";

			$xml .= "<orderFlag_ztb>";
			$xml .= $tranData->getOrderFlag_ztb();
			$xml .= "</orderFlag_ztb>";	
			
			$xml .= "</extend>";	
			
			$xml .= "</B2CReq>";
			 
		return $xml;
	}
	
	/**
	 * 检查商户上送订单信息是否合法
	 * @return
	 */
	public static function verifyOrderData11($orderEntity){
		if($orderEntity==NULL){
			echo "检查商户上送订单信息是否合法出错：orderEntity==null".PHP_EOL;
			return NULL;
		}
			
			// 靠靠靠靠靠靠靠靠?
			$CheckNames0 = array( "interfaceName", "interfaceVersion", "orderid", "amount", "curType", "merID", "merAcct", "orderDate", "installmentTimes", "verifyJoinFlag", "notifyType" );
			$CheckValue0 = array($orderEntity->getInterfaceName(),$orderEntity->getInterfaceVersion(),$orderEntity->getOrderid(),$orderEntity->getAmount(),
								$orderEntity->getCurType(),$orderEntity->getMerID(),$orderEntity->getMerAcct(),$orderEntity->getOrderDate(),$orderEntity->getInstallmentTimes(),
								$orderEntity->getVerifyJoinFlag(),$orderEntity->getNotifyType()
							);
			$limit = array( 30, 15, 30, 10, 3, 20, 29, 14, 2, 1, 2 );
			$i=0;
			for ($i = 0; $i < count($CheckNames0); $i++) {
				$tmp = $CheckValue0[$i];
				if ($tmp == NULL || strlen($tmp) == 0) {
					echo "商户上送订单信息中$CheckNames0[$i]项不能为空。".PHP_EOL;
					return NULL;
				} else if (($limit[$i] != -1) && (strlen($CheckValue0[$i])> $limit[$i])) {
					echo "商户上送订单信息中$CheckNames0[$i]项值过长。".PHP_EOL;
					return NULL;
				}
			}
			$CheckNames1 = array( "goodsName", "goodsNum", "goodsID", "remark1", "remark2", "carriageAmt", "merHint", "merURL", "resultType");
			$CheckValue1 = array($orderEntity->getGoodsName(),$orderEntity->getGoodsNum(),$orderEntity->getGoodsID(),$orderEntity->getRemark1(),$orderEntity->getRemark2(),
					$orderEntity->getCarriageAmt(),$orderEntity->getMerHint(),$orderEntity->getMerURL(),$orderEntity->getResultType()
					);
			$limit2 = array( 60, 10, 10, 100, 100, 10, 40, 1024, 1);
			$i=0;
			for ($i = 0; $i < count($CheckNames1); $i++) {
				$tmp = $CheckValue1[$i];
				if ($tmp == NULL) {
					
				} else if (strlen($CheckValue1[$i]) > $limit2[$i]) {
					echo "商户上送订单信息中$CheckNames1[$i]项值过长。".PHP_EOL;
					return NULL;
				}
			}
			
			$userCrt = $orderEntity->getUserCrt();							//靠靠
			if($userCrt==NULL || strlen($userCrt)<1){
				echo "商户上送订单信息中，商城公钥userCrt不能为空。".PHP_EOL;
				return NULL;
			}
			$userKey = $orderEntity->getUserKey();							//靠靠
			if($userKey==NULL || strlen($userKey)<1){
				echo "商户上送订单信息中，商城私钥userKey不能为空。".PHP_EOL;
				return NULL;
			}
			$userKeyPassword = $orderEntity->getUserKeyPassword();			//靠靠
			if($userKeyPassword==NULL || strlen($userKeyPassword)<1){
				echo "商户上送订单信息中，商城私钥密码userKeyPassword不能为空。".PHP_EOL;
				return NULL;
			}
			$apiQueryHost = $orderEntity->getApiQueryHost();				//靠靠
			if (($apiQueryHost == NULL) || (strlen(trim($apiQueryHost)) == 0)) {
				echo "商户上送订单信息中，请求地址apiQueryHost不能为空。".PHP_EOL;
				return NULL;
			}

			$apiQueryHostPort = $orderEntity->getApiQueryHostPort();		//靠靠 
			if($apiQueryHostPort!=NULL && strcmp($apiQueryHostPort,"")!=0){
				if(IcbcB2CUtil::checkNum($apiQueryHostPort)==-1){
					echo "商户上送订单信息中请求地址端口apiQueryHostPort错误。apiQueryHostPort=$apiQueryHostPort".PHP_EOL;
					return NULL;
				}
			}
			
		return NULL;
	}

	
}


?>
