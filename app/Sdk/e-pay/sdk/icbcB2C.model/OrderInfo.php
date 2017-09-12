<?php 
	/*
	 * <p>tranData中的订单列表数据定义类</p>
	 * <br/>
	 *<p>此类提供读取和设置tranData中的订单列表数据的方法，通过get方法获取字段值，set方法设置字段值</P>
	 *@see <p>《中国工商银行网上银行新B2C在线支付接口说明V1.0.0.11》</p>
	 *@author 贾晓桐
	 */
class OrderInfo {
	
	 private $orderid;
	 
	 private $amount;
	 
	 private $installmentTimes;
	 
	 private $goodsID;
	 
	 private $goodsName;
	 
	 private $goodsNum;
	 
	 private $carriageAmt;

	 /*
	  * <p>获取订单号</p>
	  * @return String
	  * 返回值为支付信息列表中的订单号
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
	  * @return String
	  * 返回值为支付信息列表中的订单金额
	  */
	public function getAmount() {
		return $this->amount;
	}

	/*
	 * <p>设置订单金额</p>
	 * @param amount
	 * 订单金额	 
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	 /*
	  * <p>获取分期付款期数</p>
	  * @return String
	  * 返回值为支付信息列表中的分期付款期数
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
	  * <p>获取商品编号</p>
	  * @return String
	  * 返回值为支付信息列表中的商品编号
	  */
	public function getGoodsID() {
		return $this->goodsID;
	}

	/*
	 * <p>设置商品编号</p>
	 * @param goodsID
	 * 商品编号	 
	 */
	public function setGoodsID($goodsID) {
		$this->goodsID = $goodsID;
	}

	 /*
	  * <p>获取商品名称</p>
	  * @return String
	  * 返回值为支付信息列表中的商品名称
	  */
	public function getGoodsName() {
		return $this->goodsName;
	}

	/*
	 * <p>设置商品名称</p>
	 * @param goodsName
	 * 商品名称	 
	 */
	public function setGoodsName($goodsName) {
		$this->goodsName = $goodsName;
	}

	 /*
	  * <p>获取商品数量</p>
	  * @return String
	  * 返回值为支付信息列表中的商品数量
	  */
	public function getGoodsNum() {
		return $this->goodsNum;
	}

	/*
	 * <p>设置商品数量</p>
	 * @param goodsNum
	 * 商品数量	 
	 */
	public function setGoodsNum($goodsNum) {
		$this->goodsNum = $goodsNum;
	}

	 /*
	  * <p>获取已含运费金额</p>
	  * @return String
	  * 返回值为支付信息列表中的已含运费金额
	  */
	public function getCarriageAmt() {
		return $this->carriageAmt;
	}

	/*
	 * <p>设置已含运费金额</p>
	 * @param carriageAmt
	 * 已含运费金额	 
	 */
	public function setCarriageAmt($carriageAmt) {
		$this->carriageAmt = $carriageAmt;
	}
}
?>