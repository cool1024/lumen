<?php
require 'OrderEntity11.php';

class TranData11 {

	private $interfaceName = "ICBC_PERBANK_B2C"; // 接口名称
	private $interfaceVersion = "1.0.0.11"; // 接口版本号
	private $orderInfo;
	private $orderDate = "";
	private $orderid = "";
	private $amount = "0";
	private $installmentTimes = "1";
	private $merAcct = "";
	private $goodsID = "";
	private $goodsName = "";
	private $goodsNum = "";
	private $carriageAmt = "";
	private $verifyJoinFlag = "";
	private $Language = "";
	private $curType = "";
	private $merID = "";
	private $creditType = "";
	private $notifyType = "";
	private $resultType = "";
	private $merReference = "";
	private $merCustomIp = "";
	private $goodsType = "";
	private $merCustomID = "";
	private $merCustomPhone = "";
	private $goodsAddress = "";
	private $merOrderRemark = "";
	private $merHint = "";
	private $remark1 = "";
	private $remark2 = "";
	private $merURL = "";
	private $merVAR = "";
	private $e_isMerFlag = "";
	private $e_Name = "";
	private $e_TelNum = "";
	private $e_CredType = "";
	private $e_CredNum = "";
	private $e_CardNo = "";
	private $orderFlag_ztb = "";

	public function __construct($orderEntity) {
		if ($orderEntity != NULL) {
			$this->setInterfaceName($orderEntity->getInterfaceName());
			$this->setInterfaceVersion($orderEntity->getInterfaceVersion());
			$this->setOrderDate($orderEntity->getOrderDate());
			$this->setOrderid($orderEntity->getOrderid());
			$this->setAmount($orderEntity->getAmount());
			$this->setInstallmentTimes($orderEntity->getInstallmentTimes());
			$this->setMerAcct($orderEntity->getMerAcct());
			$this->setGoodsID($orderEntity->getGoodsID());
			$this->setGoodsName($orderEntity->getGoodsName());
			$this->setGoodsNum($orderEntity->getGoodsNum());
			$this->setCarriageAmt($orderEntity->getCarriageAmt());
			$this->setVerifyJoinFlag($orderEntity->getVerifyJoinFlag());
			$this->setLanguage($orderEntity->getLanguage());
			$this->setCurType($orderEntity->getCurType());
			$this->setMerID($orderEntity->getMerID());
			$this->setCreditType($orderEntity->getCreditType());
			$this->setNotifyType($orderEntity->getNotifyType());
			$this->setResultType($orderEntity->getResultType());
			$this->setMerReference($orderEntity->getMerReference());
			$this->setMerCustomIp($orderEntity->getMerCustomIp());
			$this->setGoodsType($orderEntity->getGoodsType());
			$this->setMerCustomID($orderEntity->getMerCustomID());
			$this->setMerCustomPhone($orderEntity->getMerCustomPhone());
			$this->setGoodsAddress($orderEntity->getGoodsAddress());
			$this->setMerOrderRemark($orderEntity->getMerOrderRemark());
			$this->setMerHint($orderEntity->getMerHint());
			$this->setRemark1($orderEntity->getRemark1());
			$this->setRemark2($orderEntity->getRemark2());
			$this->setMerURL($orderEntity->getMerURL());
			$this->setMerVAR($orderEntity->getMerVAR());
			$this->setE_isMerFlag($orderEntity->getE_isMerFlag());
			$this->setE_Name($orderEntity->getE_Name());
			$this->setE_TelNum($orderEntity->getE_TelNum());
			$this->setE_CredType($orderEntity->getE_CredType());
			$this->setE_CredNum($orderEntity->getE_CredNum());
			$this->setE_CardNo($orderEntity->getE_CardNo());
			$this->setOrderFlag_ztb($orderEntity->getOrderFlag_ztb());
		} else {

		}
	}

	public function getInterfaceName() {
		return $this->interfaceName;
	}

	public function setInterfaceName($interfaceName) {
		$this->interfaceName = $interfaceName;
	}

	public function getInterfaceVersion() {
		return $this->interfaceVersion;
	}

	public function setInterfaceVersion($interfaceVersion) {
		$this->interfaceVersion = $interfaceVersion;
	}

        public function setOrderInfo() {
                $this->orderInfo = new OrderInfo();
                return $this->orderInfo;
        }


	public function getOrderDate() {
		return $this->orderDate;
	}
	public function setOrderDate($orderDate) {
		$this->orderDate = $orderDate;
	}
	
	public function getOrderid() {
		return $this->orderid;
	}

	public function getAmount() {
		return $this->amount;
	}

	public function getInstallmentTimes() {
		return $this->installmentTimes;
	}

	public function getMerAcct() {
		return $this->merAcct;
	}

	public function getGoodsID() {
		return $this->goodsID;
	}

	public function getGoodsName() {
		return $this->goodsName;
	}

	public function getGoodsNum() {
		return $this->goodsNum;
	}

	public function getCarriageAmt() {
		return $this->carriageAmt;
	}

	public function getVerifyJoinFlag() {
		return $this->verifyJoinFlag;
	}

	public function getLanguage() {
		return $this->Language;
	}

	public function getCurType() {
		return $this->curType;
	}

	public function getMerID() {
		return $this->merID;
	}

	public function getCreditType() {
		return $this->creditType;
	}

	public function getNotifyType() {
		return $this->notifyType;
	}

	public function getResultType() {
		return $this->resultType;
	}

	public function getMerReference() {
		return $this->merReference;
	}

	public function getMerCustomIp() {
		return $this->merCustomIp;
	}

	public function getGoodsType() {
		return $this->goodsType;
	}

	public function getMerCustomID() {
		return $this->merCustomID;
	}

	public function getMerCustomPhone() {
		return $this->merCustomPhone;
	}

	public function getGoodsAddress() {
		return $this->goodsAddress;
	}

	public function getMerOrderRemark() {
		return $this->merOrderRemark;
	}

	public function getMerHint() {
		return $this->merHint;
	}

	public function getRemark1() {
		return $this->remark1;
	}

	public function getRemark2() {
		return $this->remark2;
	}

	public function getMerURL() {
		return $this->merURL;
	}

	public function getMerVAR() {
		return $this->merVAR;
	}

	public function getE_isMerFlag() {
		return $this->e_isMerFlag;
	}

	public function getE_Name() {
		return $this->e_Name;
	}

	public function getE_TelNum() {
		return $this->e_TelNum;
	}

	public function getE_CredType() {
		return $this->e_CredType;
	}

	public function getE_CredNum() {
		return $this->e_CredNum;
	}

	public function getE_CardNo() {
		return $this->e_CardNo;
	}

	public function getOrderFlag_ztb() {
		return $this->orderFlag_ztb;
	}

	public function setOrderid($orderid) {
		$this->orderid = $orderid;
	}

	public function setAmount($amount) {
		$this->amount = $amount;
	}

	public function setInstallmentTimes($installmentTimes) {
		$this->installmentTimes = $installmentTimes;
	}

	public function setMerAcct($merAcct) {
		$this->merAcct = $merAcct;
	}

	public function setGoodsID($goodsID) {
		$this->goodsID = $goodsID;
	}

	public function setGoodsName($goodsName) {
		$this->goodsName = $goodsName;
	}

	public function setGoodsNum($goodsNum) {
		$this->goodsNum = $goodsNum;
	}

	public function setCarriageAmt($carriageAmt) {
		$this->carriageAmt = $carriageAmt;
	}

	public function setVerifyJoinFlag($verifyJoinFlag) {
		$this->verifyJoinFlag = $verifyJoinFlag;
	}

	public function setLanguage($language) {
		$this->Language = $language;
	}

	public function setCurType($curType) {
		$this->curType = $curType;
	}

	public function setMerID($merID) {
		$this->merID = $merID;
	}

	public function setCreditType($creditType) {
		$this->creditType = $creditType;
	}

	public function setNotifyType($notifyType) {
		$this->notifyType = $notifyType;
	}

	public function setResultType($resultType) {
		$this->resultType = $resultType;
	}

	public function setMerReference($merReference) {
		$this->merReference = $merReference;
	}

	public function setMerCustomIp($merCustomIp) {
		$this->merCustomIp = $merCustomIp;
	}

	public function setGoodsType($goodsType) {
		$this->goodsType = $goodsType;
	}

	public function setMerCustomID($merCustomID) {
		$this->merCustomID = $merCustomID;
	}

	public function setMerCustomPhone($merCustomPhone) {
		$this->merCustomPhone = $merCustomPhone;
	}

	public function setGoodsAddress($goodsAddress) {
		$this->goodsAddress = $goodsAddress;
	}

	public function setMerOrderRemark($merOrderRemark) {
		$this->merOrderRemark = $merOrderRemark;
	}

	public function setMerHint($merHint) {
		$this->merHint = $merHint;
	}

	public function setRemark1($remark1) {
		$this->remark1 = $remark1;
	}

	public function setRemark2($remark2) {
		$this->remark2 = $remark2;
	}

	public function setMerURL($merURL) {
		$this->merURL = $merURL;
	}

	public function setMerVAR($merVAR) {
		$this->merVAR = $merVAR;
	}

	public function setE_isMerFlag($e_isMerFlag) {
		$this->e_isMerFlag = $e_isMerFlag;
	}

	public function setE_Name($e_Name) {
		$this->e_Name = $e_Name;
	}

	public function setE_TelNum($e_TelNum) {
		$this->e_TelNum = $e_TelNum;
	}

	public function setE_CredType($e_CredType) {
		$this->e_CredType = $e_CredType;
	}

	public function setE_CredNum($e_CredNum) {
		$this->e_CredNum = $e_CredNum;
	}

	public function setE_CardNo($e_CardNo) {
		$this->e_CardNo = $e_CardNo;
	}

	public function setOrderFlag_ztb($orderFlag_ztb) {
		$this->orderFlag_ztb = $orderFlag_ztb;
	}

}

?>
