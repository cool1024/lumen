<?php
	require_once dirname(__FILE__)."/../icbcB2C.model/MerResData.php";
	require_once dirname(__FILE__)."/../icbcB2C.model/MerReqData.php";
	/*
	 * <p>icbcB2CAPI查询接口</p>
	 * <br/>
	 *<p>此接口用于按订单号、订单日期查询具体订单状态</P>
	 *@see <p>《网上银行系统商户API查询接口手册V1.1》</p>
	 *@author 贾晓桐
	 */
interface IcbcB2CQuery {
	
	/*
	 * <p>封装MerResData报文</p>
	 * @param xmlDoc
	 * 总行反回的B2CAPIxml明文串
	 * @return MerResData
	 * @throws Exception
	 */
	public function xmlElements($xmlDoc);
	
	/*
	 * <p>查询ICBCApi报文</p>
	 * @param xmlPath
	 * 配置文件路径
	 * @param merReqData
	 * 返回的总行返回的各种场
	 * @return MerResData
	 * @throws Exception
	 */
	public function getICBCApiData($xmlPath, $merReqData);
}
?>