<?php 
	require_once dirname(__FILE__).'/../icbcB2C.model/NotifyData.php';

	/*
	 * <p>icbcB2C接收工行通知消息接口</p>
	 * <br/>
	 *<p>此接口用于将接收到的工行通知消息密文串验签解密，生成商户需要的通知消息内容</P>
	 *@see <p>《中国工商银行网上银行新B2C在线支付接口说明V1.0.0.11》</p>
	 *@author 贾晓桐
	 */
interface IcbcB2CNotify {
	
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
	public function createNotifyData($notifyData, $signMsg, $xmlPath);
	
	/*
	 * <p>从xml字符串解析出notifyData</p>
	 * @param xmlDoc
	 * notifyData的xml字符串
	 * @return notifyData 
	 * @throws Exception
	 */
	public function xmlElements($xmlDoc);

}
?>