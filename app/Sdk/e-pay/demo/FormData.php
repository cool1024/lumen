<?php

class FormData {
	
	private $interfaceName;				//调用接口名称
	private $interfaceVersion;			//调用接口版本号
	private $tranData;					//订单明文信息
	private $merSignMsg;				//签名数据
	private $merCert;					//公钥
	private $apiQueryHost;				//请求地址
	private $apiQueryHostPort;			//请求端口
	
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
	public function getTranData() {
		return $this->tranData;
	}
	public function setTranData($tranData) {
		$this->tranData = $tranData;
	}
	public function getMerSignMsg() {
		return $this->merSignMsg;
	}
	public function setMerSignMsg($merSignMsg) {
		$this->merSignMsg = $merSignMsg;
	}
	public function getMerCert() {
		return $this->merCert;
	}
	public function setMerCert($merCert) {
		$this->merCert = $merCert;
	}
	public function getApiQueryHost() {
		return $this->apiQueryHost;
	}
	public function setApiQueryHost($apiQueryHost) {
		$this->apiQueryHost = $apiQueryHost;
	}
	public function getApiQueryHostPort() {
		return $this->apiQueryHostPort;
	}
	public function setApiQueryHostPort($apiQueryHostPort) {
		$this->apiQueryHostPort = $apiQueryHostPort;
	}

}

?>
