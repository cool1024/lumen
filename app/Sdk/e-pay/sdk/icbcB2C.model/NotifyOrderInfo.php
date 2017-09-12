<?php 

	/*
	 * <p>notifyData中订单列表数据类</p>
	 * <br/>
	 *<p>此类提供读取和设置icbcB2C工行返回通知消息notifyData数据中的订单列表数据的方法，通过get方法获取字段值，set方法设置字段值</P>
	 *@see <p>《中国工商银行网上银行新B2C在线支付接口说明V1.0.0.11》</p>
	 *@author 贾晓桐
	 */
class NotifyOrderInfo {
	
	 private $orderid;
	 
	 private $amount;
	 
	 private $installmentTimes;
	 
	 private $merAcct;
	 
	 private $tranSerialNo;

	 /*
	  * <p>获取订单号</p>
	  * @return string
	  * 返回值为工行通知消息中的订单号
	  */
	public function getOrderid() {
		return $this->orderid;
	}

	/*
	 * <p>设置订单号</p>
	 * @param orderid
	 * 订单号	 
	 */
	public function setOrderid($orderid) {
		$this->orderid = $orderid;
	}

	 /*
	  * <p>获取订单金额</p>
	  * @return string
	  * 返回值为工行通知消息中的订单金额
	  */
	public function getAmount() {
		return $this->amount;
	}

	/*
	 * <p>设置获取订单金额</p>
	 * @param amount
	 * 获取订单金额	 
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	 /*
	  * <p>获取分期付款期数</p>
	  * @return string
	  * 返回值为工行通知消息中的分期付款期数
	  */
	public function getInstallmentTimes() {
		return $this->installmentTimes;
	}

	/*
	 * <p>设置分期付款期数</p>
	 * @param installmentTimes
	 * 分期付款期数	 
	 */
	public function setInstallmentTimes($installmentTimes) {
		$this->installmentTimes = $installmentTimes;
	}

	 /*
	  * <p>获取商户账号</p>
	  * @return string
	  * 返回值为工行通知消息中的商户账号
	  */
	public function getMerAcct() {
		return $this->merAcct;
	}

	/*
	 * <p>设置商户账号</p>
	 * @param merAcct
	 * 商户账号	 
	 */
	public function setMerAcct($merAcct) {
		$this->merAcct = $merAcct;
	}

	 /*
	  * <p>获取银行指令序号</p>
	  * @return string
	  * 返回值为工行通知消息中的银行指令序号
	  */
	public function getTranSerialNo() {
		return $this->tranSerialNo;
	}

	/*
	 * <p>设置银行指令序号</p>
	 * @param tranSerialNo
	 * 银行指令序号 
	 */
	public function setTranSerialNo($tranSerialNo) {
		$this->tranSerialNo = $tranSerialNo;
	}
}
?>