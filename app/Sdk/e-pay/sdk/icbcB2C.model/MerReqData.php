<?php 
	/*
	 * <p>icbcB2C电子商务API查询上送信息类</p>
	 * <br/>
	 *<p>此类提供读取和设置cbcB2C电子商务API查询上送信息的方法，通过get方法获取字段值，set方法设置字段值</P>
	 *@see <p>《网上银行系统商户API查询接口手册V1.1》</p>
	 *@author 贾晓桐
	 */
class MerReqData {
	
	private $orderNum;
	
	private $tranDate;
	
	private $shopCode;
	
	private $shopAccount;

	 /*
	  * <p>获取订单号</p>
	  * @return String
	  * 返回值为商户传入的订单号
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
	  * 返回值为商户传入的交易日期
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
	  * 返回值为商户传入的商家号码
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
	  * 返回值为商户传入的商城账号
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
}
?>