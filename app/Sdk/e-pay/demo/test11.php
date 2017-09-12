<?php header("Content-Type:text/html; charset=utf-8"); ?>
<html>
	<head>
	<meta http-equiv="Content-Type"content="text/html; charset=utf-8">
	<TITLE> 工商银行电子商务测试页面 </TITLE>
	</head>
	
<?php
require 'OrderProc.php';

$interfaceName =$_POST["interfaceName"];
$interfaceVersion =$_POST["interfaceVersion"];
$orderDate =$_POST["orderDate"];
$orderid =$_POST["orderid"];
$amount =$_POST["amount"];
$installmentTimes =$_POST["installmentTimes"];
$merAcct =$_POST["merAcct"];
$goodsID =$_POST["goodsID"];
$goodsName =$_POST["goodsName"];
$goodsNum =$_POST["goodsNum"];
$carriageAmt =$_POST["carriageAmt"];
$verifyJoinFlag =$_POST["verifyJoinFlag"];
$Language =$_POST["Language"];
$curType =$_POST["curType"];
$merID =$_POST["merID"];
$creditType =$_POST["creditType"];
$notifyType =$_POST["notifyType"];
$resultType =$_POST["resultType"];
$merReference =$_POST["merReference"];
$merCustomIp =$_POST["merCustomIp"];
$goodsType =$_POST["goodsType"];
$merCustomID =$_POST["merCustomID"];
$merCustomPhone =$_POST["merCustomPhone"];
$goodsAddress =$_POST["goodsAddress"];
$merOrderRemark =$_POST["merOrderRemark"];
$merHint =$_POST["merHint"];
$remark1 =$_POST["remark1"];
$remark2 =$_POST["remark2"];
$merURL =$_POST["merURL"];
$merVAR =$_POST["merVAR"];
$e_isMerFlag =$_POST["e_isMerFlag"];
$e_Name =$_POST["e_Name"];
$e_TelNum =$_POST["e_TelNum"];
$e_CredType =$_POST["e_CredType"];
$e_CredNum =$_POST["e_CredNum"];
$e_CardNo =$_POST["e_CardNo"];
$orderFlag_ztb =$_POST["orderFlag_ztb"];

$userCrt;
$userKey;
$userCrtPath=$_POST["userCrtPath"];
$userKeyPath=$_POST["userKeyPath"];
$userKeyPassword =$_POST["userKeyPassword"];
$apiQueryHost =$_POST["apiQueryHost"];
$apiQueryHostPort =$_POST["apiQueryHostPort"];

//echo $userCrtPath.PHP_EOL;
//echo $userKeyPath.PHP_EOL;

$orderentity11=new OrderEntity11;
$orderentity11->perpareData();

$orderentity11->set("USER_CRTPATH", $userCrtPath);		//公钥数据
$orderentity11->set("USER_KEYPATH", $userKeyPath);		//私钥数据
$orderentity11->set("USER_KEYPASSWORD", $userKeyPassword);				//证书密码
$orderentity11->set("API_QUERY_HOST", $apiQueryHost);		//请求地址
$orderentity11->set("API_QUERY_HOST_PORT", $apiQueryHostPort);		//请求端口
		
$orderentity11->set("ORDER_DATE", $orderDate);  		//订单日期，格式yyyyMMddHHmmss
$orderentity11->set("ORDER_ID",$orderid);					//订单号, 30位，数字
$orderentity11->set("AMOUNT",$amount);						//订单金额
$orderentity11->set("INSTALLMENT_TIMES",$installmentTimes);				//分期期数
$orderentity11->set("MER_ACCT",$merAcct);		//商城账号
$orderentity11->set("GOODS_ID",$goodsID);					//商品ID
$orderentity11->set("GOODS_NAME",$goodsName);					//商品名称
$orderentity11->set("GOODS_NUM",$goodsNum);						//商品数量
$orderentity11->set("CARRIAGE_AMT",$carriageAmt);					//运费
$orderentity11->set("VERIFY_JOIN_FLAG",$verifyJoinFlag);				//联名校验标志
$orderentity11->set("LANGUAGE",$Language);					//语言
$orderentity11->set("CUR_TYPE",$curType);						//币种
$orderentity11->set("MER_ID",$merID);				//商城代码		
$orderentity11->set("CREDIT_TYPE",$creditType);
$orderentity11->set("NOTIFY_TYPE",$notifyType);					//通知类型
$orderentity11->set("RESULT_TYPE",$resultType);						//通知结果类型
$orderentity11->set("MER_REFERENCE",$merReference);        	//商户reference
$orderentity11->set("MER_CUSTOMIP",$merCustomIp);         	//客户端IP
$orderentity11->set("GOODS_TYPE",$goodsType);                  	//虚拟商品/实物商品标志
$orderentity11->set("MER_CUSTOMID",$merCustomID);           	//买家用户号
$orderentity11->set("MER_CUSTOMPHONE",$merCustomPhone);       //买家联系电话
$orderentity11->set("GOODS_ADDRESS",$goodsAddress);              //收货地址
$orderentity11->set("MER_ORDER_REMARK",$merOrderRemark);           //订单备注
$orderentity11->set("MER_HINT",$merHint);					//商城提示
$orderentity11->set("REMARK1",$remark1);							//备注1
$orderentity11->set("REMARK2",$remark2);							//备注2
$orderentity11->set("MER_URL",$merURL);		//商城通知地址
$orderentity11->set("MER_VAR",$merVAR);						//商城备注
$orderentity11->set("E_ISMERFLAG",$e_isMerFlag);         			//工银e支付注册标志
$orderentity11->set("E_NAME",$e_Name);                	 		//客户姓名
$orderentity11->set("E_TELNUM",$e_TelNum);       		//客户手机号
$orderentity11->set("E_CREDTYPE",$e_CredType);                    	//客户证件类型
$orderentity11->set("E_CREDNUM",$e_CredNum);       	//客户证件号
$orderentity11->set("E_CARDNO",$e_CardNo);    	//待注册工银e支付的卡/账号
$orderentity11->set("ORDERFLAG_ZTB",$orderFlag_ztb);            		//招投标订单标志

$orderproc=new OrderProc;
$formData11=$orderproc->orderProcess11($orderentity11);

/*
echo $formData11->getInterfaceName();
echo PHP_EOL;
echo $formData11->getInterfaceVersion();
echo PHP_EOL;
echo $formData11->getApiQueryHost();
echo PHP_EOL;
echo $formData11->getApiQueryHostPort();
echo PHP_EOL;
echo $formData11->getTranData();
echo PHP_EOL;
echo $formData11->getMerCert();
echo PHP_EOL;
echo $formData11->getMerSignMsg();
echo PHP_EOL;
*/
?>


<body>
		<!-- 测试地址需向电子银行申请，将签名的数据提交银行，此处修改action中的url地址为实际url地址 -->
		<FORM id=FORM1 name=FORM1 action="https://83.252.46.200:11491/servlet/NewB2cMerPayReqServlet" method="post" >
			<font face='Arial' size='4' color='white'>商户订单数据签名页面</font>
			<table width="98%"  border="1">
				<tr>
					<td width="9%">接口名称</td>
					<td width="91%"><INPUT ID="interfaceName" NAME="interfaceName" TYPE="text" value="ICBC_WAPB_B2C" size="120" ></td>
				</tr>
				<tr>
					<td width="9%">接口版本号</td>
					<td width="91%"><INPUT ID="interfaceVersion" NAME="interfaceVersion" TYPE="text" value="1.0.0.11" size="120"></td>
				</tr>
				<tr>
					<td width="9%">接口数据</td>
					<td width="91%"><textarea ID="tranData" name="tranData" cols="120" rows="5"><?php echo $formData11->getTranData(); ?></textarea>
				</tr>
				<tr>
					<td width="9%">签名数据</td>
					<td width="91%"><INPUT ID="merSignMsg" NAME="merSignMsg" TYPE="text" size="120" value="<?php echo $formData11->getMerSignMsg(); ?>">
				</tr>
				<tr>
					<td width="9%">证书数据</td>
					<td width="91%"><INPUT ID="merCert" NAME="merCert" TYPE="text" size="120" value="<?php echo $formData11->getMerCert();?>">
				</tr>
			</table>
			<table>
				<tr>
					<td><INPUT TYPE="submit" value=" 提 交 订 单 "></td>
					<td><INPUT  type="button" value=" 返 回 修 改 " onClick="self.history.back();"></td>
				</tr>
			</table>
		</FORM>
	</body>
</html>

