<?php

class OrderEntity11 {
	public $INTERFACE_NAME = "interfaceName"; 
	public $INTERFACE_VERSION = "interfaceVersion"; 
	public $ORDER_DATE = "orderDate";
	public $ORDER_ID = "orderid";
	public $AMOUNT = "amount";
	public $INSTALLMENT_TIMES = "installmentTimes";
	public $MER_ACCT = "merAcct";
	public $GOODS_ID = "goodsID";
	public $GOODS_NAME = "goodsName";
	public $GOODS_NUM = "goodsNum";
	public $CARRIAGE_AMT = "carriageAmt";
	public $VERIFY_JOIN_FLAG = "verifyJoinFlag";
	public $LANGUAGE = "Language";
	public $CUR_TYPE = "curType";
	public $MER_ID = "merID";
	public $CREDIT_TYPE = "creditType";
	public $NOTIFY_TYPE = "notifyType";
	public $RESULT_TYPE = "resultType";
	public $MER_REFERENCE = "merReference";
	public $MER_CUSTOMIP = "merCustomIp";
	public $GOODS_TYPE = "goodsType";
	public $MER_CUSTOMID = "merCustomID";
	public $MER_CUSTOMPHONE = "merCustomPhone";
	public $GOODS_ADDRESS = "goodsAddress";
	public $MER_ORDER_REMARK = "merOrderRemark";
	public $MER_HINT = "merHint";
	public $REMARK1 = "remark1";
	public $REMARK2 = "remark2";
	public $MER_URL = "merURL";
	public $MER_VAR = "merVAR";
	public $E_ISMERFLAG = "e_isMerFlag";
	public $E_NAME = "e_Name";
	public $E_TELNUM = "e_TelNum";
	public $E_CREDTYPE = "e_CredType";
	public $E_CREDNUM = "e_CredNum";
	public $E_CARDNO = "e_CardNo";
	public $ORDERFLAG_ZTB = "orderFlag_ztb";
	public $USER_CRTPATH = "userCrtPath"; 
	public $USER_KEYPATH = "userKeyPath"; 
	public $USER_KEYPASSWORD = "userKeyPassword"; 
	public $API_QUERY_HOST = "apiQueryHost"; 
	public $API_QUERY_HOST_PORT = "apiQueryHostPort"; 

	private $interfaceName = "ICBC_WAPB_B2C"; 
	private $interfaceVersion = "1.0.0.11"; 
	private $orderDate = "20170222145555";
	private $orderid = "8113361";
	private $amount = "1234";
	private $installmentTimes = "1";
	private $merAcct = "6225000124455884124";
	private $goodsID = "10000312";
	private $goodsName = "1";
	private $goodsNum = "1";
	private $carriageAmt = "0";
	private $verifyJoinFlag = "0";
	private $Language = "zh_CN";
	private $curType = "001";
	private $merID = "0200EG0000025";
	private $creditType = "HS";
	private $notifyType = "0";
	private $resultType = "0";
	private $merReference = "1";
	private $merCustomIp = "";
	private $goodsType = "1";
	private $merCustomID = "";
	private $merCustomPhone = "";
	private $goodsAddress = "";
	private $merOrderRemark = "";
	private $merHint = "";
	private $remark1 = "";
	private $remark2 = "";
	private $merURL = "http://122.19.141.83/emulator/notifyBack_mer.jsp";
	private $merVAR = "beifen";
	private $e_isMerFlag = "";
	private $e_Name = "";
	private $e_TelNum = "";
	private $e_CredType = "";
	private $e_CredNum = "";
	private $e_CardNo = "";
	private $orderFlag_ztb = "";

	private $userCrt; 							// 公钥数据
	private $userKey; 							// 私钥数据
	private $userCrtPath="./cert/2.cer"; 		// 公钥地址
	private $userKeyPath="./cert/2.key"; 		// 私钥地址
	private $userKeyPassword = "1"; 			// 证书密码
	private $apiQueryHost = "122.16.173.77"; 	// 请求地址
	private $apiQueryHostPort = "11452"; 		// 请求端口


	public function getUserKeyPassword() {
		return $this->userKeyPassword;
	}

	private function setUserKeyPassword($userKeyPassword) {
		$this->userKeyPassword = $userKeyPassword;
	}

	public function getApiQueryHost() {
		return $this->apiQueryHost;
	}

	private function setApiQueryHost($apiQueryHost) {
		$this->apiQueryHost = $apiQueryHost;
	}

	public function getApiQueryHostPort() {
		return $this->apiQueryHostPort;
	}

	private function setApiQueryHostPort($apiQueryHostPort) {
		$this->apiQueryHostPort = $apiQueryHostPort;
	}

	public function getInterfaceName() {
		return $this->interfaceName;
	}

	private function setInterfaceName($interfaceName) {
		$this->interfaceName = $interfaceName;
	}

	public function getInterfaceVersion() {
		return $this->interfaceVersion;
	}

	private function setInterfaceVersion($interfaceVersion) {
		$this->interfaceVersion = $interfaceVersion;
	}

	public function getOrderDate() {
		return $this->orderDate;
	}

	private function setOrderDate($orderDate) {
		$this->orderDate = $orderDate;
	}

	public function getOrderid() {
		return $this->orderid;
	}

	private function setOrderid($orderid) {
		$this->orderid = $orderid;
	}

	public function getAmount() {
		return $this->amount;
	}

	private function setAmount($amount) {
		$this->amount = $amount;
	}

	public function getInstallmentTimes() {
		return $this->installmentTimes;
	}

	private function setInstallmentTimes($installmentTimes) {
		$this->installmentTimes = $installmentTimes;
	}

	public function getCurType() {
		return $this->curType;
	}

	private function setCurType($curType) {
		$this->curType = $curType;
	}

	public function getMerID() {
		return $this->merID;
	}

	private function setMerID($merID) {
		$this->merID = $merID;
	}

	public function getMerAcct() {
		return $this->merAcct;
	}

	private function setMerAcct($merAcct) {
		$this->merAcct = $merAcct;
	}

	public function getVerifyJoinFlag() {
		return $this->verifyJoinFlag;
	}

	private function setVerifyJoinFlag($verifyJoinFlag) {
		$this->verifyJoinFlag = $verifyJoinFlag;
	}

	public function getLanguage() {
		return $this->Language;
	}

	private function setLanguage($language) {
		$this->Language = $language;
	}

	public function getGoodsID() {
		return $this->goodsID;
	}

	private function setGoodsID($goodsID) {
		$this->goodsID = $goodsID;
	}

	public function getGoodsName() {
		return $this->goodsName;
	}

	private function setGoodsName($goodsName) {
		$this->goodsName = $goodsName;
	}

	public function getGoodsNum() {
		return $this->goodsNum;
	}

	private function setGoodsNum($goodsNum) {
		$this->goodsNum = $goodsNum;
	}

	public function getCarriageAmt() {
		return $this->carriageAmt;
	}

	private function setCarriageAmt($carriageAmt) {
		$this->carriageAmt = $carriageAmt;
	}

	public function getMerHint() {
		return $this->merHint;
	}

	private function setMerHint($merHint) {
		$this->merHint = $merHint;
	}

	public function getRemark1() {
		return $this->remark1;
	}

	private function setRemark1($remark1) {
		$this->remark1 = $remark1;
	}

	public function getRemark2() {
		return $this->remark2;
	}

	private function setRemark2($remark2) {
		$this->remark2 = $remark2;
	}

	public function getMerURL() {
		return $this->merURL;
	}

	private function setMerURL($merURL) {
		$this->merURL = $merURL;
	}

	public function getMerVAR() {
		return $this->merVAR;
	}

	private function setMerVAR($merVAR) {
		$this->merVAR = $merVAR;
	}

	public function getNotifyType() {
		return $this->notifyType;
	}

	private function setNotifyType($notifyType) {
		$this->notifyType = $notifyType;
	}

	public function getResultType() {
		return $this->resultType;
	}

	private function setResultType($resultType) {
		$this->resultType = $resultType;
	}

	public function getUserCrt() {
		return $this->userCrt;
	}

	public function setUserCrt($userCrt) {
		$this->userCrt = $userCrt;
	}

	public function getUserKey() {
		return $this->userKey;
	}

	public function setUserKey($userKey) {
		$this->userKey = $userKey;
	}

	public function getUserCrtPath() {
		return $this->userCrtPath;
	}

	public function getUserKeyPath() {
		return $this->userKeyPath;
	}

	private function setUserCrtPath($userCrtPath) {
		$this->userCrtPath = $userCrtPath;
	}

	private function setUserKeyPath($userKeyPath) {
		$this->userKeyPath = $userKeyPath;
	}

	public function getCreditType() {
		return $this->creditType;
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

	private function setCreditType($creditType) {
		$this->creditType = $creditType;
	}

	private function setMerReference($merReference) {
		$this->merReference = $merReference;
	}

	private function setMerCustomIp($merCustomIp) {
		$this->merCustomIp = $merCustomIp;
	}

	private function setGoodsType($goodsType) {
		$this->goodsType = $goodsType;
	}

	private function setMerCustomID($merCustomID) {
		$this->merCustomID = $merCustomID;
	}

	private function setMerCustomPhone($merCustomPhone) {
		$this->merCustomPhone = $merCustomPhone;
	}

	private function setGoodsAddress($goodsAddress) {
		$this->goodsAddress = $goodsAddress;
	}

	private function setMerOrderRemark($merOrderRemark) {
		$this->merOrderRemark = $merOrderRemark;
	}

	private function setE_isMerFlag($e_isMerFlag) {
		$this->e_isMerFlag = $e_isMerFlag;
	}

	private function setE_Name($e_Name) {
		$this->e_Name = $e_Name;
	}

	private function setE_TelNum($e_TelNum) {
		$this->e_TelNum = $e_TelNum;
	}

	private function setE_CredType($e_CredType) {
		$this->e_CredType = $e_CredType;
	}

	private function setE_CredNum($e_CredNum) {
		$this->e_CredNum = $e_CredNum;
	}

	private function setE_CardNo($e_CardNo) {
		$this->e_CardNo = $e_CardNo;
	}

	private function setOrderFlag_ztb($orderFlag_ztb) {
		$this->orderFlag_ztb = $orderFlag_ztb;
	}
	
        public function set($property_name,$property_value)
        {
        $name=$this->$property_name;
        $this->$name= $property_value;
        }

        public function __get($property_name)
        {
                if(isset($this->property_name))
                {
                return $this->property_name;
                }else{
                return NULL;
                }
        }




	
	public function perpareData(){
		$this->setUserCrtPath($this->getUserCrtPath());							//公钥数据
		$this->setUserKeyPath($this->getUserKeyPath());							//私钥数据
		$this->setUserKeyPassword($this->getUserKeyPassword());					//证书密码
		$this->setApiQueryHost($this->getApiQueryHost());						//请求地址
		$this->setApiQueryHostPort($this->getApiQueryHostPort());				//请求端口
		
		$this->setOrderDate($this->getOrderDate());								//订单日期，格式yyyyMMddHHmmss
		$this->setOrderid($this->getOrderid());									//订单号
		$this->setAmount($this->getAmount());									//订单金额
		$this->setInstallmentTimes($this->getInstallmentTimes());				//分期期数
		$this->setMerAcct($this->getMerAcct());									//商城账号
		$this->setGoodsID($this->getGoodsID());									//商品ID
		$this->setGoodsName($this->getGoodsName());								//商品名称
		$this->setGoodsNum($this->getGoodsNum());								//商品数量
		$this->setCarriageAmt($this->getCarriageAmt());							//运费
		$this->setVerifyJoinFlag($this->getVerifyJoinFlag());					//联名校验标志
		$this->setLanguage($this->getLanguage());								//语言
		$this->setCurType($this->getCurType());									//币种
		$this->setMerID($this->getMerID());										//商城代码		
		$this->setCreditType($this->getCreditType());
		$this->setNotifyType($this->getNotifyType());							//通知类型
		$this->setResultType($this->getResultType());							//通知结果类型
		$this->setMerReference($this->getMerReference());        				//商户reference
		$this->setMerCustomIp($this->getMerCustomIp());         				//客户端IP
		$this->setGoodsType($this->getGoodsType());                  			//虚拟商品/实物商品标志
		$this->setMerCustomID($this->getMerCustomID());           				//买家用户号
		$this->setMerCustomPhone($this->getMerCustomPhone());           		//买家联系电话
		$this->setGoodsAddress($this->getGoodsAddress());                       //收货地址
		$this->setMerOrderRemark($this->getMerOrderRemark());                   //订单备注
		$this->setMerHint($this->getMerHint());									//商城提示
		$this->setRemark1($this->getRemark1());									//备注1
		$this->setRemark2($this->getRemark2());									//备注2
		$this->setMerURL($this->getMerURL());									//商城通知地址
		$this->setMerVAR($this->getMerVAR());									//商城备注
		$this->setE_isMerFlag($this->getE_isMerFlag());         				//工银e支付注册标志
		$this->setE_Name($this->getE_Name());                 					//客户姓名
		$this->setE_TelNum($this->getE_TelNum());        						//客户手机号
		$this->setE_CredType($this->getE_CredType());                    		//客户证件类型
		$this->setE_CredNum($this->getE_CredNum());       						//客户证件号
		$this->setE_CardNo($this->getE_CardNo());    							//待注册工银e支付的卡/账号
		$this->setOrderFlag_ztb($this->getOrderFlag_ztb());            			//招投标订单标志
	}

}

?>
