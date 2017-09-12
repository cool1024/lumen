<?php

require 'OrderEntity.php';

class TranData {
	
		private $interfaceName="ICBC_WAPB_B2C";		//接口名称	
		private $interfaceVersion="1.0.0.6";		//接口版本号
		private $orderInfo;
		private $verifyJoinFlag="0";				//联名校验标志
		private $Language="zh_CN";					//语言
		private $goodsID="";						//商品ID
		private $goodsName="";						//商品名称
		private $goodsNum="";						//商品数量
		private $carriageAmt="0";					//运费
		private $merHint="";						//商城提示
		private $remark1="";						//备注1
		private $remark2="";						//备注2
		private $merURL="";							//商城通知地址
		private $merVAR="";							//商城备注
		private $notifyType="";						//通知类型
		private $resultType="";						//通知结果类型
		private $backup1="";						//备用1
		private $backup2="";						//备用2
		private $backup3="";						//备用3
		private $backup4="";						//备用4 
	  
	
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


	public function getVerifyJoinFlag() {
		return $this->verifyJoinFlag;
	}


	public function setVerifyJoinFlag($verifyJoinFlag) {
		$this->verifyJoinFlag = $verifyJoinFlag;
	}


	public function getLanguage() {
		return $this->Language;
	}


	public function setLanguage($language) {
		$this->Language = $language;
	}


	public function getGoodsID() {
		return $this->goodsID;
	}


	public function setGoodsID($goodsID) {
		$this->goodsID = $goodsID;
	}


	public function getGoodsName() {
		return $this->goodsName;
	}


	public function setGoodsName($goodsName) {
		$this->goodsName = $goodsName;
	}


	public function getGoodsNum() {
		return $this->goodsNum;
	}


	public function setGoodsNum($goodsNum) {
		$this->goodsNum = $goodsNum;
	}


	public function getCarriageAmt() {
		return $this->carriageAmt;
	}


	public function setCarriageAmt($carriageAmt) {
		$this->carriageAmt = $carriageAmt;
	}


	public function getMerHint() {
		return $this->merHint;
	}


	public function setMerHint($merHint) {
		$this->merHint = $merHint;
	}


	public function getRemark1() {
		return $this->remark1;
	}


	public function setRemark1($remark1) {
		$this->remark1 = $remark1;
	}


	public function getRemark2() {
		return $this->remark2;
	}


	public function setRemark2($remark2) {
		$this->remark2 = $remark2;
	}


	public function getMerURL() {
		return $this->merURL;
	}


	public function setMerURL($merURL) {
		$this->merURL = $merURL;
	}


	public function getMerVAR() {
		return $this->merVAR;
	}


	public function setMerVAR($merVAR) {
		$this->merVAR = $merVAR;
	}


	public function getNotifyType() {
		return $this->notifyType;
	}


	public function setNotifyType($notifyType) {
		$this->notifyType = $notifyType;
	}


	public function getResultType() {
		return $this->resultType;
	}


	public function setResultType($resultType) {
		$this->resultType = $resultType;
	}


	public function getBackup1() {
		return $this->backup1;
	}


	public function setBackup1($backup1) {
		$this->backup1 = $backup1;
	}


	public function getBackup2() {
		return $this->backup2;
	}


	public function setBackup2($backup2) {
		$this->backup2 = $backup2;
	}


	public function getBackup3() {
		return $this->backup3;
	}


	public function setBackup3($backup3) {
		$this->backup3 = $backup3;
	}


	public function getBackup4() {
		return $this->backup4;
	}


	public function setBackup4($backup4) {
		$this->backup4 = $backup4;
	}
	  
        public function perpareData_TranData($orderEntity){
                if($orderEntity!=NULL){
                        $this->setInterfaceName($orderEntity->getInterfaceName());
                        $this->setInterfaceVersion($orderEntity->getInterfaceVersion());
                        $this->orderInfo=$this->setOrderInfo();
                        $this->setVerifyJoinFlag($orderEntity->getVerifyJoinFlag());
                        $this->setLanguage($orderEntity->getLanguage());
                        $this->setGoodsID($orderEntity->getGoodsID());
                        $this->setGoodsName($orderEntity->getGoodsName());
                        $this->setGoodsNum($orderEntity->getGoodsNum());
                        $this->setCarriageAmt($orderEntity->getCarriageAmt());
                        $this->setMerHint($orderEntity->getMerHint());
                        $this->setRemark1($orderEntity->getRemark1());
                        $this->setRemark2($orderEntity->getRemark2());
                        $this->setMerURL($orderEntity->getMerURL());
                        $this->setMerVAR($orderEntity->getMerVAR());
                        $this->setNotifyType($orderEntity->getNotifyType());
                        $this->setResultType($orderEntity->getResultType());
                        $this->setBackup1($orderEntity->getBackup1());
                        $this->setBackup2($orderEntity->getBackup2());
                        $this->setBackup3($orderEntity->getBackup3());
                        $this->setBackup4($orderEntity->getBackup4());
                }else{

                }
        }




}


?>
