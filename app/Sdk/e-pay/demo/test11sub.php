<?php header("Content-Type:text/html; charset=utf-8") ?>
<html>
	<head>
	<meta http-equiv="Content-Type"content="text/html; charset=utf-8">
	<TITLE> 工商银行电子商务测试页面 </TITLE>
	</head>
	<body>
		<!-- 数据提交demo页面以B2C支付接口V1.0.0.11接口-->
		<FORM  name="requestTel" METHOD=POST ACTION="test11.php">
			<font face='Arial' size='4' color='white'>商户订单数据提交页面</font>
			<table width="778"  border="1">
                                <tr>
                                        <td>接口名称</td>
                                        <td><INPUT  type="text" NAME="interfaceName" value="ICBC_WAPB_B2C"></td>
                                        <td>接口版本号</td>
                                        <td><INPUT  type="text" NAME="interfaceVersion"  value="1.0.0.11"></td>
                                </tr>
				<tr>
					<td>订单号</td>
					<td><INPUT  type="text" NAME="orderid" value="201003081416290"></td>
					<td>订单金额</td>
					<td><INPUT  type="text" NAME="amount"  value="1234"></td>
				</tr>
                                <tr>
                                        <td>订单日期</td>
                                        <td><INPUT  type="text" NAME="orderDate"  value="20170222145551"></td>
                                </tr>
				<tr>
					<td>分期付款期数</td>
					<td><INPUT  type="text" NAME="installmentTimes" value="1"></td>
					<td>商户账号</td>
					<td><INPUT  type="text" NAME="merAcct"   value="0200026009018372212"></td>
				</tr>
				<tr>
					<td>商品编号</td>
					<td><INPUT  type="text" NAME="goodsID"   value="10000312"></td>
					<td>商品名称</td>
					<td><INPUT  type="text" NAME="goodsName" value="威尼熊"></td>
				</tr>
				<tr>
					<td>商品数量</td>
					<td><INPUT  type="text" NAME="goodsNum"  value="2"></td>
					<td>已含运费金额</td>
					<td><INPUT  type="text" NAME="carriageAmt"  value="0"></td>
				</tr>
				<tr>
					<td>检验联名标志</td>
					<td><INPUT  type="text" NAME="verifyJoinFlag" value="0"></td>
					<td>语言版本</td>
					<td><INPUT  type="text" NAME="Language" value="zh_CN"></td>
				</tr>
				<tr>
					<td>支付币种</td>
					<td><INPUT  type="text" NAME="curType" value="001"></td>
					<td>商户代码</td>
					<td><INPUT  type="text" NAME="merID" value="0200EC20001119"></td>
				</tr>
				<tr>
					<td>支持订单支付的银行卡种类</td>
					<td><INPUT  type="text" NAME="creditType" value="2"></td>
					<td>通知类型</td>
					<td><INPUT  type="text" NAME="notifyType" value="HS"></td>
				</tr>
				<tr>
					<td>结果发送类型</td>
					<td><INPUT  type="text" NAME="resultType" value="1"></td>
					<td>商户reference</td>
					<td><INPUT  type="text" NAME="merReference" value="localhost"></td>
				</tr>
				<tr>
					<td>客户端IP</td>
					<td><INPUT  type="text" NAME="merCustomIp" value="127.0.0.1"></td>
					<td>虚拟商品/实物商品标志位</td>
					<td><INPUT  type="text" NAME="goodsType" value="1"></td>
				</tr>
				<tr>
					<td>买家用户号</td>
					<td><INPUT  type="text" NAME="merCustomID" value="123456"></td>
					<td>买家联系电话</td>
					<td><INPUT  type="text" NAME="merCustomPhone" value="13466780886"></td>
				</tr>
				<tr>
					<td>收货地址</td>
					<td><INPUT  type="text" NAME="goodsAddress" value="三里屯"></td>
					<td>订单备注</td>
					<td><INPUT  type="text" NAME="merOrderRemark" value="防欺诈接口专用"></td>
				</tr>
				<tr>
					<td>商城提示</td>
					<td><INPUT  type="text" NAME="merHint" value="请保留包装"></td>
					<td>备注字段1</td>
					<td><INPUT  type="text" NAME="remark1" value=""></td>
				</tr>
				<tr>
					<td>备注字段2</td>
					<td><INPUT  type="text" NAME="remark2" value=""></td>
					<td>返回商户URL</td>
					<td><INPUT  type="text" NAME="merURL"  value="http://122.19.141.83/emulator/notifyBack_mer.jsp"></td>
				</tr>
				<tr>
					<td>返回商户变量</td>
					<td><INPUT  type="text" NAME="merVAR" value="test"></td>
					<td>工银e支付注册标志</td>
					<td><INPUT  type="text" NAME="e_isMerFlag" value="001"></td>
				</tr>	
				<tr>
					<td>客户姓名</td>
					<td><INPUT  type="text" NAME="e_Name" value="屿鸦顶"></td>
					<td>客户手机号</td>
					<td><INPUT  type="text" NAME="e_TelNum" value="13814444444"></td>
				</tr>	
				<tr>
					<td>客户证件类型</td>
					<td><INPUT  type="text" NAME="e_CredType" value="0"></td>
					<td>客户证件号</td>
					<td><INPUT  type="text" NAME="e_CredNum" value="128568580210620"></td>
				</tr>	
				<tr>
					<td>待注册工银e支付的卡/账号</td>
					<td><INPUT  type="text" NAME="e_CardNo" value="9558880200005170880"></td>
					<td>招投标订单标志</td>
					<td><INPUT  type="text" NAME="orderFlag_ztb" value="0"></td>
				</tr>	
				
				<tr>
					<td></td><td></td><td></td><td></td>
				</tr>
				
			<!--
				<tr>
					<td>tranData</td>
					<td><INPUT  type="text" NAME="tranData"></td>
				</tr>
			-->
				<tr>
					<td>商城公钥文件(.crt)</td>
					<td><INPUT  type="file" NAME="userCrtPath"  value=""></td>
				</tr>
				<tr>
					<td>商城私钥文件(.key)</td>
					<td><INPUT type="file" NAME="userKeyPath"  value=""></td>
					<td>商城证书私钥密码</td>
					<td><INPUT   type="password" NAME="userKeyPassword"  value="1"></td>
				</tr>
                                <tr>
                                        <td>请求地址</td>
                                        <td><INPUT  type="text" NAME="apiQueryHost" value="122.16.173.77"></td>
                                        <td>请求端口</td>
                                        <td><INPUT  type="text" NAME="apiQueryHostPort"  value="11452"></td>
                                </tr>

			</table>			
			<input type="Submit" name="Submit" value="submit"/>
			
		</FORM>
	</body>
</html>

