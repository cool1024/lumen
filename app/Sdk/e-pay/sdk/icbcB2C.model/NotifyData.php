<?php 

	/*
	 * <p>icbcB2C-notifyData数据定义类</p>
	 * <br/>
	 *<p>此类提供读取和设置icbcB2C工行返回通知消息中notifyData数据的方法，通过get方法获取字段值，set方法设置字段值</P>
	 *@see <p>《中国工商银行网上银行新B2C在线支付接口说明V1.0.0.11》</p>
	 *@author 贾晓桐
	 */
class NotifyData {
	
	 private $interfaceName;
	 
	 private $interfaceVersion;
	 
	 private $orderDate;
	 
	 private $subOrderInfoList;
	 
	 private $curType;
	 
	 private $merID;
	 
	 private $verifyJoinFlag;
	 
	 private $joinFlag;
	 
	 private $userNum;
	 
	 private $tranBatchNo;
	 
	 private $notifyDate;
	 
	 private $tranStat;
	 
	 private $comment;
	 
	 private $notifyData;
	 	 
	 /*
	  * <p>获取notifyData的XML明文串</p>
	  * @return string
	  * 返回值为工行通知消息的XML明文形式
	  */
	 public function getNotifyData() {
		return $this->notifyData;
	}

	/*
	 * <p>设置notifyData的XML明文串</p>
	 * @param notifyData
	 * 工行通知消息的XML明文形式	 
	 */
	public function setNotifyData($notifyData) {
		$this->notifyData = $notifyData;
	}

	 /*
	  * <p>获取接口名称</p>
	  * @return string
	  * 返回值为工行通知消息中的接口名称
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
	  * <p>获取接口版本</p>
	  * @return string
	  * 返回值为工行通知消息中的接口版本
	  */
	public function getInterfaceVersion() {
		return $this->interfaceVersion;
	}

	/*
	 * <p>设置接口版本</p>
	 * @param interfaceVersion
	 * 接口版本
	 */
	public function setInterfaceVersion($interfaceVersion) {
		$this->interfaceVersion = $interfaceVersion;
	}

	 /*
	  * <p>获取交易日期时间</p>
	  * @return string
	  * 返回值为工行通知消息中的交易日期时间
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
	  * <p>获取订单列表信息</p>
	  * @return array
	  * 返回值为工行通知消息中的订单列表信息
	  */
	public function getSubOrderInfoList() {
		return $this->subOrderInfoList;
	}

	/*
	 * <p>设置订单列表信息</p>
	 * @param subOrderInfoList
	 * 订单列表信息	 
	 */
	public function setSubOrderInfoList($subOrderInfoList) {
		$this->subOrderInfoList = $subOrderInfoList;
	}

	 /*
	  * <p>获取支付币种</p>
	  * @return string
	  * 返回值为工行通知消息中的支付币种
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
	  * @return string
	  * 返回值为工行通知消息中的商户代码
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
	  * <p>获取检验联名标志</p>
	  * @return string
	  * 返回值为工行通知消息中的检验联名标志
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
	  * <p>获取客户联名标志</p>
	  * @return string
	  * 返回值为工行通知消息中的客户联名标志
	  */
	public function getJoinFlag() {
		return $this->joinFlag;
	}

	/*
	 * <p>设置客户联名标志</p>
	 * @param joinFlag
	 * 客户联名标志	 
	 */
	public function setJoinFlag($joinFlag) {
		$this->joinFlag = $joinFlag;
	}

	 /*
	  * <p>获取联名会员号</p>
	  * @return string
	  * 返回值为工行通知消息中的联名会员号
	  */
	public function getUserNum() {
		return $this->userNum;
	}

	/*
	 * <p>设置联名会员号</p>
	 * @param userNum
	 * 联名会员号	 
	 */
	public function setUserNum($userNum) {
		$this->userNum = $userNum;
	}

	 /*
	  * <p>获取批次号</p>
	  * @return string
	  * 返回值为工行通知消息中的批次号
	  */
	public function getTranBatchNo() {
		return $this->tranBatchNo;
	}

	/*
	 * <p>设置批次号</p>
	 * @param tranBatchNo
	 * 批次号	 
	 */
	public function setTranBatchNo($tranBatchNo) {
		$this->tranBatchNo = $tranBatchNo;
	}

	 /*
	  * <p>获取返回通知日期时间</p>
	  * @return string
	  * 返回值为工行通知消息中的返回通知日期时间
	  */
	public function getNotifyDate() {
		return $this->notifyDate;
	}

	/*
	 * <p>设置返回通知日期时间</p>
	 * @param notifyDate
	 * 返回通知日期时间	 
	 */
	public function setNotifyDate($notifyDate) {
		$this->notifyDate = $notifyDate;
	}

	 /*
	  * <p>获取订单处理状态</p>
	  * @return string
	  * 返回值为工行通知消息中的订单处理状态
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
	  * <p>获取错误描述</p>
	  * @return string
	  * 返回值为工行通知消息中的错误描述
	  */
	public function getComment() {
		return $this->comment;
	}

	/*
	 * <p>设置错误描述</p>
	 * @param comment
	 * 错误描述 
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	} 
}
?>