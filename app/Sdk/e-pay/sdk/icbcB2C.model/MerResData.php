<?php 
	/*
	 * <p>icbcB2C工行返回查询信息类</p>
	 * <br/>
	 *<p>此类提供读取和设置icbcB2C工行返回查询信息类的方法，通过get方法获取字段值，set方法设置字段值</P>
	 *@see <p>《网上银行系统商户API查询接口手册V1.1》</p>
	 *@author 贾晓桐
	 */
class MerResData {
	
	private $apiName;
	
	private $apiVersion;
	
	private $orderNum;
	
	private $tranDate;
	
	private $shopCode;
	
	private $shopAccount;
	
	private $tranSerialNum;
	
	private $tranStat;
	
	private $bankRem;
	
	private $amount;
	
	private $currType;
	
	private $tranTime;
	
	private $payeeName;
	
	private $joinFlag;
	
	private $merJoinFlag;
	
	private $custJoinFlag;
	
	private $custJoinNum;
	
	private $certID;
	
	 /*
	  * <p>获取接口名称</p>
	  * @return String
	  * 返回值为工行返回的API查询接口名称
	  */
	public function getApiName() {
		return $this->apiName;
	}
	
	/*
	 * <p>设置接口名称</p>
	 * @param name
	 * 接口名称 
	 */
	public function setApiName($name) {
		$this->apiName = $name;
	}
	
	 /*
	  * <p>获取接口版本号</p>
	  * @return String
	  * 返回值为工行返回的API查询接口版本号
	  */
	public function getApiVersion() {
		return $this->apiVersion;
	}
	
	/*
	 * <p>设置接口版本号</p>
	 * @param version
	 * 接口版本号
	 */
	public function setApiVersion($version) {
		$this->apiVersion = $version;
	}
	
	 /*
	  * <p>获取订单号</p>
	  * @return String
	  * 返回值为工行返回的订单号
	  */
	public function getOrderNum() {
		return $this->orderNum;
	}
	
	/*
	 * <p>设置订单号</p>
	 * @param orderNum
	 * 订单号
	 */
	public function setOrderNum($orderNum) {
		$this->orderNum = $orderNum;
	}
	
	 /*
	  * <p>获取交易日期</p>
	  * @return String
	  * 返回值为工行返回的交易日期
	  */
	public function getTranDate() {
		return $this->tranDate;
	}
	
	/*
	 * <p>设置交易日期</p>
	 * @param tranDate
	 * 交易日期
	 */
	public function setTranDate($tranDate) {
		$this->tranDate = $tranDate;
	}
	
	 /*
	  * <p>获取商家号码</p>
	  * @return String
	  * 返回值为工行返回的商家号码
	  */
	public function getShopCode() {
		return $this->shopCode;
	}
	
	/*
	 * <p>设置商家号码</p>
	 * @param shopCode
	 * 商家号码
	 */
	public function setShopCode($shopCode) {
		$this->shopCode = $shopCode;
	}
	
	 /*
	  * <p>获取商城账号</p>
	  * @return String
	  * 返回值为工行返回的商城账号
	  */
	public function getShopAccount() {
		return $this->shopAccount;
	}
	
	/*
	 * <p>设置商城账号</p>
	 * @param shopAccount
	 * 商城账号 
	 */
	public function setShopAccount($shopAccount) {
		$this->shopAccount = $shopAccount;
	}
	
	 /*
	  * <p>获取指令序号</p>
	  * @return String
	  * 返回值为工行返回的指令序号
	  */
	public function getTranSerialNum() {
		return $this->tranSerialNum;
	}
	
	/*
	 * <p>设置指令序号</p>
	 * @param tranSerialNum
	 * 指令序号
	 
	 */
	public function setTranSerialNum($tranSerialNum) {
		$this->tranSerialNum = $tranSerialNum;
	}
	
	/*
	  * <p>获取订单处理状态</p>
	  * @return String
	  * 返回值为工行返回的订单处理状态
	  */
	public function getTranStat() {
		return $this->tranStat;
	}
	
	/*
	 * <p>设置订单处理状态</p>
	 * @param tranStat
	 * 订单处理状态
	 */
	public function setTranStat($tranStat) {
		$this->tranStat = $tranStat;
	}
	
	/*
	  * <p>获取指令错误信息</p>
	  * @return String
	  * 返回值为工行返回的指令错误信息
	  */
	public function getBankRem() {
		return $this->bankRem;
	}
	
	/*
	 * <p>设置指令错误信息</p>
	 * @param bankRem
	 * 指令错误信息	 
	 */
	public function setBankRem($bankRem) {
		$this->bankRem = $bankRem;
	}
	
	/*
	  * <p>获取订单总金额</p>
	  * @return String
	  * 返回值为工行返回的订单总金额
	  */
	public function getAmount() {
		return $this->amount;
	}
	
	/*
	 * <p>设置订单总金额</p>
	 * @param amount
	 * 订单总金额	 
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	
	/*
	  * <p>获取支付币种</p>
	  * @return String
	  * 返回值为工行返回的支付币种
	  */
	public function getCurrType() {
		return $this->currType;
	}
	
	/*
	 * <p>设置支付币种</p>
	 * @param currType
	 * 支付币种	 
	 */
	public function setCurrType($currType) {
		$this->currType = $currType;
	}
	
	/*
	  * <p>获取返回通知日期时间</p>
	  * @return String
	  * 返回值为工行返回的返回通知日期时间
	  */
	public function getTranTime() {
		return $this->tranTime;
	}
	
	/*
	 * <p>设置返回通知日期时间</p>
	 * @param tranTime
	 * 返回通知日期时间	 
	 */
	public function setTranTime($tranTime) {
		$this->tranTime = $tranTime;
	}
	
	/*
	  * <p>获取商城户名</p>
	  * @return String
	  * 返回值为工行返回的商城户名
	  */
	public function getPayeeName() {
		return $this->payeeName;
	}
	
	/*
	 * <p>设置商城户名/p>
	 * @param payeeName
	 * 返回商城户名	 
	 */
	public function setPayeeName($payeeName) {
		$this->payeeName = $payeeName;
	}
	
	/*
	  * <p>获取校验联名标志</p>
	  * @return String
	  * 返回值为工行返回的校验联名标志
	  */
	public function getJoinFlag() {
		return $this->joinFlag;
	}
	
	/*
	 * <p>设置校验联名标志/p>
	 * @param joinFlag
	 * 返回校验联名标志	 
	 */
	public function setJoinFlag($joinFlag) {
		$this->joinFlag = $joinFlag;
	}
	
	/*
	  * <p>获取商城联名标志</p>
	  * @return String
	  * 返回值为工行返回的商城联名标志
	  */
	public function getMerJoinFlag() {
		return $this->merJoinFlag;
	}
	
	/*
	 * <p>设置商城联名标志/p>
	 * @param merJoinFlag
	 * 返回商城联名标志 
	 */
	public function setMerJoinFlag($merJoinFlag) {
		$this->merJoinFlag = $merJoinFlag;
	}
	
	/*
	  * <p>获取客户联名标志</p>
	  * @return String
	  * 返回值为工行返回的客户联名标志
	  */
	public function getCustJoinFlag() {
		return $this->custJoinFlag;
	}
	
	/*
	 * <p>设置客户联名标志/p>
	 * @param custJoinFlag
	 * 返回客户联名标志	 
	 */
	public function setCustJoinFlag($custJoinFlag) {
		$this->custJoinFlag = $custJoinFlag;
	}
	
	/*
	  * <p>获取联名会员号</p>
	  * @return String
	  * 返回值为工行返回的联名会员号
	  */
	public function getCustJoinNum() {
		return $this->custJoinNum;
	}
	
	/*
	 * <p>设置联名会员号/p>
	 * @param custJoinNum
	 * 返回联名会员号	 
	 */
	public function setCustJoinNum($custJoinNum) {
		$this->custJoinNum = $custJoinNum;
	}
	
	/*
	  * <p>获取商户签名证书id</p>
	  * @return String
	  * 返回值为工行返回的商户签名证书id
	  */
	public function getCertID() {
		return $this->certID;
	}
	
	/*
	 * <p>商户签名证书id/p>
	 * @param certID
	 * 商户签名证书id	 
	 */
	public function setCertID($certID) {
		$this->certID = $certID;
	}

}
?>
