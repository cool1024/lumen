<?php 
	/*
	 * <p>icbcB2C-tranData数据定义类</p>
	 * <br/>
	 *<p>此类提供读取和设置tranData数据的方法，通过get方法获取字段值，set方法设置字段值</P>
	 *@author 贾晓桐
	 *@date 2013-9-10
	 */
class TranData {

	 private $interfaceName;
	 
	 private $interfaceVersion;
	 
	 private $orderDate;
	 
	 private $verifyJoinFlag;
	 
	 private $language;
	 
	 private $curType;
	 
	 private $merID;
	 
	 private $creditType;
	 
	 private $notifyType;
	 
	 private $resultType;
	 
	 private $merReference;
	 
	 private $merCustomIp;
	 
	 private $goodsType;
	 
	 private $merCustomID;
	 
	 private $merCustomPhone;
	 
	 private $goodsAddress;
	 
	 private $merOrderRemark;
	 
	 private $merHint;
	 
	 private $remark1;
	 
	 private $remark2;
	 
	 private $merURL;
	 
	 private $merVAR;
	 
	 private $orderInfoVector;
	 
	 private $merAcct;
	 
	 
	/*
	 * <p>获取商户账号</p>
	 * @return String
	 * 返回值为tranData中的商户账号
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
	  * <p>获取接口名称</p>
	  * @return String
	  * 返回值为tranData中的接口名称
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
	  * 返回值为tranData中的接口版本号
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
	  * <p>获取交易日期时间</p>
	  * @return String
	  * 返回值为tranData中的交易日期时间
	  */
	public function getOrderDate() {
		return $this->orderDate;
	}

	/*
	 * <p>设置交易日期时间</p>
	 * @param orderDate
	 * 交易日期时间  
	 */
	public function setOrderDate($orderDate) {
		$this->orderDate = $orderDate;
	}
	
	 /*
	  * <p>获取检验联名标志</p>
	  * @return String
	  * 返回值为tranData中的检验联名标志
	  */
	public function getVerifyJoinFlag() {
		return $this->verifyJoinFlag;
	}

	/*
	 * <p>设置检验联名标志</p>
	 * @param verifyJoinFlag
	 * 检验联名标志	 
	 */
	public function setVerifyJoinFlag($verifyJoinFlag) {
		$this->verifyJoinFlag = $verifyJoinFlag;
	}

	 /*
	  * <p>获取语言版本</p>
	  * @return String
	  * 返回值为tranData中的语言版本
	  */
	public function getLanguage() {
		return $this->language;
	}

	/*
	 * <p>设置语言版本</p>
	 * @param language
	 * 语言版本	 
	 */
	public function setLanguage($language) {
		$this->language = $language;
	}

	 /*
	  * <p>获取支付币种</p>
	  * @return String
	  * 返回值为tranData中的语言版本
	  */
	public function getCurType() {
		return $this->curType;
	}

	/*
	 * <p>设置支付币种</p>
	 * @param curType
	 * 支付币种
	 */
	public function setCurType($curType) {
		$this->curType = $curType;
	}

	 /*
	  * <p>获取商户代码</p>
	  * @return String
	  * 返回值为tranData中的商户代码
	  */
	public function getMerID() {
		return $this->merID;
	}

	/*
	 * <p>设置商户代码</p>
	 * @param merID
	 * 商户代码
	 
	 */
	public function setMerID($merID) {
		$this->merID = $merID;
	}

	 /*
	  * <p>获取支持订单支付的银行卡种类</p>
	  * @return String
	  * 返回值为tranData中的支持订单支付的银行卡种类
	  */
	public function getCreditType() {
		return $this->creditType;
	}

	/*
	 * <p>设置支持订单支付的银行卡种类</p>
	 * @param creditType
	 * 支持订单支付的银行卡种类	 
	 */
	public function setCreditType($creditType) {
		$this->creditType = $creditType;
	}

	 /*
	  * <p>获取通知类型</p>
	  * @return String
	  * 返回值为tranData中的支持订单支付的银行卡种类
	  */
	public function getNotifyType() {
		return $this->notifyType;
	}

	/*
	 * <p>设置通知类型</p>
	 * @param notifyType
	 * 通知类型	 
	 */
	public function setNotifyType($notifyType) {
		$this->notifyType = $notifyType;
	}

	 /*
	  * <p>获取结果发送类型</p>
	  * @return String
	  * 返回值为tranData中的结果发送类型
	  */
	public function getResultType() {
		return $this->resultType;
	}

	/*
	 * <p>设置结果发送类型</p>
	 * @param resultType
	 * 结果发送类型	 
	 */
	public function setResultType($resultType) {
		$this->resultType = $resultType;
	}

	 /*
	  * <p>获取商户reference</p>
	  * @return String
	  * 返回值为tranData中的商户reference
	  */
	public function getMerReference() {
		return $this->merReference;
	}

	/*
	 * <p>设置商户reference</p>
	 * @param merReference
	 * 商户reference 
	 */
	public function setMerReference($merReference) {
		$this->merReference = $merReference;
	}
	
	 /*
	  * <p>获取客户端IP</p>
	  * @return String
	  * 返回值为tranData中的客户端IP
	  */
	public function getMerCustomIp() {
		return $this->merCustomIp;
	}

	/*
	 * <p>设置客户端IPe</p>
	 * @param merCustomIp
	 * 客户端IP	 
	 */
	public function setMerCustomIp($merCustomIp) {
		$this->merCustomIp = $merCustomIp;
	}

	 /*
	  * <p>获取虚拟商品/实物商品标志位</p>
	  * @return String
	  * 返回值为tranData中的虚拟商品/实物商品标志位
	  */
	public function getGoodsType() {
		return $this->goodsType;
	}

	/*
	 * <p>设置虚拟商品/实物商品标志位</p>
	 * @param goodsType
	 * 虚拟商品/实物商品标志位	 
	 */
	public function setGoodsType($goodsType) {
		$this->goodsType = $goodsType;
	}

	 /*
	  * <p>获取买家用户号</p>
	  * @return String
	  * 返回值为tranData中的买家用户号
	  */
	public function getMerCustomID() {
		return $this->merCustomID;
	}

	/*
	 * <p>设置买家用户号</p>
	 * @param merCustomID
	 * 买家用户号	 
	 */
	public function setMerCustomID($merCustomID) {
		$this->merCustomID = $merCustomID;
	}

	/*
	  * <p>获取买家联系电话</p>
	  * @return String
	  * 返回值为tranData中的买家联系电话
	  */
	public function getMerCustomPhone() {
		return $this->merCustomPhone;
	}

	/*
	 * <p>设置买家联系电话</p>
	 * @param merCustomPhone
	 * 买家联系电话 
	 */
	public function setMerCustomPhone($merCustomPhone) {
		$this->merCustomPhone = $merCustomPhone;
	}

	/*
	  * <p>获取收货地址</p>
	  * @return String
	  * 返回值为tranData中的收货地址
	  */
	public function getGoodsAddress() {
		return $this->goodsAddress;
	}

	/*
	 * <p>设置收货地址</p>
	 * @param goodsAddress
	 * 收货地址	 
	 */
	public function setGoodsAddress($goodsAddress) {
		$this->goodsAddress = $goodsAddress;
	}

	 /*
	  * <p>获取订单备注</p>
	  * @return String
	  * 返回值为tranData中的订单备注
	  */
	public function getMerOrderRemark() {
		return $this->merOrderRemark;
	}

	/*
	 * <p>设置订单备注</p>
	 * @param merOrderRemark
	 * 订单备注 
	 */
	public function setMerOrderRemark($merOrderRemark) {
		$this->merOrderRemark = $merOrderRemark;
	}

	 /*
	  * <p>获取商城提示</p>
	  * @return String
	  * 返回值为tranData中的商城提示
	  */
	public function getMerHint() {
		return $this->merHint;
	}

	/*
	 * <p>设置商城提示</p>
	 * @param merHint
	 * 商城提示	 
	 */
	public function setMerHint($merHint) {
		$this->merHint = $merHint;
	}

	 /*
	  * <p>获取备注字段1</p>
	  * @return String
	  * 返回值为tranData中的备注字段1
	  */
	public function getRemark1() {
		return $this->remark1;
	}

	/*
	 * <p>设置备注字段1</p>
	 * @param remark1
	 * 备注字段1 
	 */
	public function setRemark1($remark1) {
		$this->remark1 = $remark1;
	}

	 /*
	  * <p>获取备注字段2</p>
	  * @return String
	  * 返回值为tranData中的备注字段2
	  */
	public function getRemark2() {
		return $this->remark2;
	}

	/*
	 * <p>设置备注字段2</p>
	 * @param remark2
	 * 备注字段2 
	 */
	public function setRemark2($remark2) {
		$this->remark2 = $remark2;
	}

	 /*
	  * <p>获取返回商户URL</p>
	  * @return String
	  * 返回值为tranData中的返回商户URL
	  */
	public function getMerURL() {
		return $this->merURL;
	}

	/*
	 * <p>设置返回商户URL</p>
	 * @param merURL
	 * 返回商户URL 
	 */
	public function setMerURL($merURL) {
		$this->merURL = $merURL;
	}

	 /*
	  * <p>获取返回商户变量</p>
	  * @return String
	  * 返回值为tranData中的返回商户变量
	  */
	public function getMerVAR() {
		return $this->merVAR;
	}

	/*
	 * <p>设置返回商户变量</p>
	 * @param merVAR
	 * 返回商户变量	 
	 */
	public function setMerVAR($merVAR) {
		$this->merVAR = $merVAR;
	}

	 /*
	  * <p>获取tranData中的订单列表信息</p>
	  * @return array
	  * 返回值为tranData中的订单列表信息
	  */
	public function getOrderInfoVector() {
		return $this->orderInfoVector;
	}

	/*
	 * <p>设置tranData中的订单列表信息</p>
	 * @param orderInfoVector
	 * tranData中的订单列表信息	 
	 */
	public function setOrderInfoVector($orderInfoVector) {
		$this->orderInfoVector = $orderInfoVector;
	}
}

?>