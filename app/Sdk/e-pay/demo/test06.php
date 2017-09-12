<?php header("Content-Type:text/html; charset=utf-8"); ?>
<html>
	<head>
	<meta http-equiv="Content-Type"content="text/html; charset=utf-8">
	<TITLE> 工商银行电子商务测试页面 </TITLE>
	</head>

<?php
require 'OrderProc.php';

$interfaceName=$_POST["interfaceName"];
$interfaceVersion=$_POST["interfaceVersion"];
$orderDate=$_POST["orderDate"];
$orderid=$_POST["orderid"];
$amount=$_POST["amount"];
$installmentTimes=$_POST["installmentTimes"];
$curType=$_POST["curType"];
$merID=$_POST["merID"];
$merAcct=$_POST["merAcct"];
$verifyJoinFlag=$_POST["verifyJoinFlag"];
$Language=$_POST["Language"];
$goodsID=$_POST["goodsID"];
$goodsName=$_POST["goodsName"];
$goodsNum=$_POST["goodsNum"];
$carriageAmt=$_POST["carriageAmt"];
$merHint=$_POST["merHint"];
$remark1=$_POST["remark1"];
$remark2=$_POST["remark2"];
$merURL=$_POST["merURL"];
$merVAR=$_POST["merVAR"];
$notifyType=$_POST["notifyType"];
$resultType=$_POST["resultType"];
$backup1=$_POST["backup1"];
$backup2=$_POST["backup2"];
$backup3=$_POST["backup3"];
$backup4=$_POST["backup4"];
$userCrt;
$userKey;
$userCrtPath=$_POST["userCrtPath"];
$userKeyPath=$_POST["userKeyPath"];
$userKeyPassword=$_POST["userKeyPassword"];
$apiQueryHost=$_POST["apiQueryHost"];
$apiQueryHostPort=$_POST["apiQueryHostPort"];

$orderentity=new OrderEntity;
$orderentity->perpareData();

$orderentity->set("USER_CRTPATH",$userCrtPath);				//公钥数据
$orderentity->set("USER_KEYPATH",$userKeyPath);				//私钥数据
$orderentity->set("USER_KEYPASSWORD",$userKeyPassword);						//证书密码
$orderentity->set("API_QUERY_HOST",$apiQueryHost);			//请求地址
$orderentity->set("API_QUERY_HOST_PORT",$apiQueryHostPort);				//请求端口
		
$orderentity->set("ORDER_DATE",$orderDate);  				//订单日期，格式yyyyMMddHHmmss
$orderentity->set("ORDER_ID",$orderid);						//订单号, 30位，数字
$orderentity->set("AMOUNT",$amount);								//订单金额
$orderentity->set("INSTALLMENT_TIMES",$installmentTimes);						//分期期数
$orderentity->set("MER_ACCT",$merAcct);			//商城账号
$orderentity->set("GOODS_ID",$goodsID);						//商品ID
$orderentity->set("GOODS_NAME",$goodsName);							//商品名称
$orderentity->set("GOODS_NUM",$goodsNum);								//商品数量
$orderentity->set("CARRIAGE_AMT",$carriageAmt);							//运费
$orderentity->set("VERIFY_JOIN_FLAG",$verifyJoinFlag);						//联名校验标志
$orderentity->set("LANGUAGE",$Language);							//语言
$orderentity->set("CUR_TYPE",$curType);							//币种
$orderentity->set("MER_ID",$merID);					//商城代码	
$orderentity->set("NOTIFY_TYPE",$notifyType);							//通知类型
$orderentity->set("RESULT_TYPE",$resultType);							//通知结果类型
$orderentity->set("MER_HINT",$merHint);						//商城提示
$orderentity->set("REMARK1",$remark1);							//备注1
$orderentity->set("REMARK2",$remark2);							//备注2
$orderentity->set("MER_URL",$merURL);	//商城通知地址
$orderentity->set("MER_VAR",$merVAR);							//商城备注
$orderentity->set("BACKUP1",$backup1);							//备用1
$orderentity->set("BACKUP2",$backup2);							//备用2
$orderentity->set("BACKUP3",$backup3);							//备用3
$orderentity->set("BACKUP4",$backup4);							//备用4





$orderproc=new OrderProc;
$formData=$orderproc->orderProcess($orderentity);



/*
echo $formData->getInterfaceName();
echo PHP_EOL;
echo $formData->getInterfaceVersion();
echo PHP_EOL;
echo $formData->getApiQueryHost();
echo PHP_EOL;
echo $formData->getApiQueryHostPort();
echo PHP_EOL;
echo $formData->getTranData();
echo PHP_EOL;
echo $formData->getMerCert();
echo PHP_EOL;
echo $formData->getMerSignMsg();
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
					<td width="91%"><INPUT ID="interfaceVersion" NAME="interfaceVersion" TYPE="text" value="1.0.0.6" size="120"></td>
				</tr>
				<tr>
					<td width="9%">接口数据</td>
					<td width="91%"><textarea ID="tranData" name="tranData" cols="120" rows="5"><?php echo $formData->getTranData(); ?></textarea>
				</tr>
				<tr>
					<td width="9%">签名数据</td>
					<td width="91%"><INPUT ID="merSignMsg" NAME="merSignMsg" TYPE="text" size="120" value="<?php echo $formData->getMerSignMsg(); ?>">
				</tr>
				<tr>
					<td width="9%">证书数据</td>
					<td width="91%"><INPUT ID="merCert" NAME="merCert" TYPE="text" size="120" value="<?php echo $formData->getMerCert();?>">
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
