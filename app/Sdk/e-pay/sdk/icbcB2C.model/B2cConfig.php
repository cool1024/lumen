<?php
	/*
	 * <p>icbcB2C配置信息类</p>
	 * <br/>
	 *<p>此类提供从工行B2C商户配置文件读取和设置字段信息的方法，通过get方法获取字段值，set方法设置字段值</p>
	 *@author 贾晓桐
	 *@date 2013-9-10
	 */
class B2cConfig {
	
	 private $interfaceName;
	 
	 private $interfaceVersion;
	 
	 private $merAcct;
	 
	 private $verifyJoinFlag;
	 
	 private $Language;
	 
	 private $curType;
	 
	 private $merID;
	 
	 private $creditType;
	 
	 private $notifyType;
	 
	 private $resultType;
	 
	 private $merReference;
	 
	 private $merCustomIp;
	 
	 private $merHint;
	 
	 private $remark1;
	 
	 private $remark2;
	 
	 private $merURL;
	 
	 private $merVAR;
	 
	 private $userCrtPath;
	 
	 private $userKeyPath;
	 
	 private $password;
	 
	 private $pemPath;
	 
	 private $apiQueryHost;
	 
	 private $apiQueryHostPort;
	 
	 private $publicCrtPath;
	 
 	/*
	 * <p>获取银行公钥存放地址</p>
	 * @return String
	 * 返回值为银行公钥存放地址
	 */
	 public function getPublicCrtPath() {
		return $this->publicCrtPath;
	}

	 /*
	 * <p>设置银行公钥存放地址</p>
	 * @param publicCrtPath
	 * 银行公钥存放地址 
	 */
	public function setPublicCrtPath($publicCrtPath) {
		$this->publicCrtPath = $publicCrtPath;
	}

	/*
	 * <p>获取接口名称</p>
	 * @return String
	 * 返回值为配置文件中的接口名称
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
	 * 返回值为配置文件中的接口版本号
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
	 * <p>获取商户账号</p>
	 * @return String
	 * 返回值为配置文件中的商户账号
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
	 * <p>获取检验联名标志</p>
	 * @return String
	 * 返回值为配置文件中的检验联名标志
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
	 * 返回值为配置文件中的语言版本
	 */
	public function getLanguage() {
		return $this->Language;
	}

	/*
	 * <p>设置语言版本</p>
	 * @param language
	 * 语言版本
	 */
	public function setLanguage($language) {
		$this->Language = $language;
	}

	/*
	 * <p>获取支付币种</p>
	 * @return String
	 * 返回值为配置文件中的支付币种
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
	 * 返回值为配置文件中的商户代码
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
	 * 返回值为配置文件中的支持订单支付的银行卡种类
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
	 * 返回值为配置文件中的通知类型
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
	 * 返回值为配置文件中的结果发送类型
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
	 * 返回值为配置文件中的商户reference
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
	 * 返回值为配置文件中的客户端IP
	 */
	public function getMerCustomIp() {
		return $this->merCustomIp;
	}

	/*
	 * <p>设置客户端IP</p>
	 * @param merCustomIp
	 * 客户端IP
	 */
	public function setMerCustomIp($merCustomIp) {
		$this->merCustomIp = $merCustomIp;
	}

	/*
	 * <p>获取商城提示</p>
	 * @return String
	 * 返回值为配置文件中的商城提示
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
	 * 返回值为配置文件中的备注字段1
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
	 * 返回值为配置文件中的备注字段2
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
	 * 返回值为配置文件中的返回商户URL
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
	 * 返回值为配置文件中的返回商户变量
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
	 * <p>获取商户证书存放路径</p>
	 * @return String
	 * 返回值为配置文件中的商户证书存放路径
	 */
	public function getUserCrtPath() {
		return $this->userCrtPath;
	}

	/*
	 * <p>设置商户证书存放路径</p>
	 * @param userCrtPath
	 * 商户证书存放路径
	 */
	public function setUserCrtPath($userCrtPath) {
		$this->userCrtPath = $userCrtPath;
	}

	/*
	 * <p>获取商户私钥存放路径</p>
	 * @return String
	 * 返回值为配置文件中的商户私钥存放路径
	 */
	public function getUserKeyPath() {
		return $this->userKeyPath;
	}

	/*
	 * <p>设置商户私钥存放路径</p>
	 * @param userKeyPath
	 * 商户私钥存放路径
	 */
	public function setUserKeyPath($userKeyPath) {
		$this->userKeyPath = $userKeyPath;
	}

	/*
	 * <p>获取商户证书拆分密码</p>
	 * @return String
	 * 返回值为配置文件中的商户证书拆分密码
	 */
	public function getPassword() {
		return $this->password;
	}

	/*
	 * <p>设置商户证书拆分密码</p>
	 * @param password
	 *商户证书拆分密码
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/*
	 * <p>获取商户密钥库文件存放路径</p>
	 * @return String
	 * 返回值为配置文件中的商户密钥库文件存放路径
	 */
	public function getPemPath() {
		return $this->pemPath;
	}

	/*
	 * <p>设置商户密钥库文件存放路径</p>
	 * @param pemPath
	 *商户密钥库文件存放路径
	 */
	public function setPemPath($pemPath) {
		$this->pemPath = $pemPath;
	}

	/*
	 * <p>获取API查询主机IP或主机域名</p>
	 * @return String
	 * 返回值为配置文件中的API查询主机IP或主机域名
	 */
	public function getApiQueryHost() {
		return $this->apiQueryHost;
	}

	/*
	 * <p>设置API查询主机IP或主机域名</p>
	 * @param apiQueryHost
	 *API查询主机IP或主机域名
	 */
	public function setApiQueryHost($apiQueryHost) {
		$this->apiQueryHost = $apiQueryHost;
	}

	/*
	 * <p>获取API查询主机端口号</p>
	 * @return int
	 * 返回值为配置文件中的API查询主机端口号
	 */
	public function getApiQueryHostPort() {
		return $this->apiQueryHostPort;
	}

	/*
	 * <p>设置API查询主机端口号</p>
	 * @param apiQueryHostPort
	 *API查询主机端口号
	 */
	public function setApiQueryHostPort($apiQueryHostPort) {
		$this->apiQueryHostPort = $apiQueryHostPort;
	} 	
}

?>