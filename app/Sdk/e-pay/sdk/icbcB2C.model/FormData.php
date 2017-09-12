<?php 
	/*
	 * <p>icbcB2C支付Form表单类</p>
	 * <br/>
	 *<p>此类提供读取和设置icbcB2C支付Form表单信息的方法，通过get方法获取字段值，set方法设置字段值</P>
	 *@see <p>《中国工商银行网上银行新B2C在线支付接口说明V1.0.0.11》</p>
	 *@author 贾晓桐
	 */
class FormData {
	
	 private $interfaceName;
	 
	 private $interfaceVersion;
	 
	 private $tranData;
	 
	 private $merSignMsg;
	 
	 private $merCert;

         private $tranDataMingWen;

	 /*
	  * <p>获取接口名称</p>
	  * @return String
	  * 返回值为商户传入的接口名称
	  */
	public function gettranDataMingWen() {
		return $this->tranDataMingWen;
	}

	/*
	 * <p>设置接口名称</p>
	 * @param interfaceName
	 * 接口名称	 
	 */
	public function settranDataMingWen($tranDataMingWen) {
		$this->tranDataMingWen = $tranDataMingWen;
	}

	 /*
	  * <p>获取接口名称</p>
	  * @return String
	  * 返回值为商户传入的接口名称
	  */
	public function getInterfaceName() {
		return $this->interfaceName;
	}

	/*
	 * <p>设置接口名称</p>
	 * @param interfaceName
	 * 接口名称	 
	 */
	public function setInterfaceName($interfaceName) {
		$this->interfaceName = $interfaceName;
	}

	 /*
	  * <p>获取接口版本号</p>
	  * @return String
	  * 返回值为商户传入的接口版本号
	  */
	public function getInterfaceVersion() {
		return $this->interfaceVersion;
	}

	/*
	 * <p>设置接口版本号</p>
	 * @param interfaceVersion
	 * 接口版本号	 
	 */
	public function setInterfaceVersion($interfaceVersion) {
		$this->interfaceVersion = $interfaceVersion;
	}

	 /*
	  * <p>获取交易数据XML明文串</p>
	  * @return String
	  * 返回值为商户传入的交易数据XML明文串
	  */
	public function getTranData() {
		return $this->tranData;
	}

	/*
	 * <p>设置交易数据XML明文串</p>
	 * @param tranData
	 * 交易数据XML明文串
	 
	 */
	public function setTranData($tranData) {
		$this->tranData = $tranData;
	}

	 /*
	  * <p>获取订单签名数据</p>
	  * @return String
	  * 返回值为商户传入的订单签名数据
	  */
	public function getMerSignMsg() {
		return $this->merSignMsg;
	}

	/*
	 * <p>设置订单签名数据</p>
	 * @param merSignMsg
	 * 订单签名数据	 
	 */
	public function setMerSignMsg($merSignMsg) {
		$this->merSignMsg = $merSignMsg;
	}

	 /*
	  * <p>获取商城证书公钥</p>
	  * @return String
	  * 返回值为商户传入的商城证书公钥
	  */
	public function getMerCert() {
		return $this->merCert;
	}

	/*
	 * <p>设置商城证书公钥</p>
	 * @param merCert
	 * 商城证书公钥	 
	 */
	public function setMerCert($merCert) {
		$this->merCert = $merCert;
	}
}
?>