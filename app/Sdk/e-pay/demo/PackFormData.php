<?php

require 'FormData.php';
require 'PackTranData.php';



class PackFormData {
	
	/**
	 * 生成请求form表单
	 * @param xmlPath
	 
	 * @param orderEntity
	 * @return 
	 */
	public static function createFormData($orderEntity){
		$tranData =new TranData();
		$tranData->perpareData_TranData($orderEntity);
		$tranData_xml = PackTranData::packTranData06($tranData,$orderEntity);
		if($tranData_xml!=NULL){
			$formData=new FormData;
			$formData->setInterfaceName($tranData->getInterfaceName());
			$formData->setInterfaceVersion($tranData->getInterfaceVersion());
			$formData->setApiQueryHost($orderEntity->getApiQueryHost());
			$formData->setApiQueryHostPort($orderEntity->getApiQueryHostPort());
			$formData->setTranData($tranData_xml);
			$formData->setMerCert(EbizSign::merCertProcess($orderEntity));
			$SignMsgBase64 = EbizSign::sign($orderEntity, $formData->getTranData());
			if($SignMsgBase64!=NULL && strlen($SignMsgBase64)>0){
				$formData->setMerSignMsg($SignMsgBase64);
			}else{
				$formData = NULL;
			}
		}else{
			$formData = NULL;
		}

		return $formData;
	}
	/**
	 * 生成11接口请求form表单
	 * @param xmlPath
	 * @param orderEntity
	 * @return 
	 */
	public static function createFormData11($orderEntity){
		$tranData =new TranData11($orderEntity);
		$tranData_xml = PackTranData::packTranData11($tranData,$orderEntity);
		if($tranData_xml!=NULL){
			$formData11 = new FormData;
			$formData11->setInterfaceName($tranData->getInterfaceName());
			$formData11->setInterfaceVersion($tranData->getInterfaceVersion());
			$formData11->setApiQueryHost($orderEntity->getApiQueryHost());
			$formData11->setApiQueryHostPort($orderEntity->getApiQueryHostPort());
			$formData11->setTranData($tranData_xml);
			$formData11->setMerCert(EbizSign::merCertProcess11($orderEntity));
			$SignMsgBase64 = EbizSign::sign11($orderEntity, $formData11->getTranData());
			if($SignMsgBase64!=NULL && strlen($SignMsgBase64)>0){
				$formData11->setMerSignMsg($SignMsgBase64);
			}else{
				$formData11 = NULL;
			}
		}else{
			$formData = NULL;
		}
		return $formData11;
	}
	
}
?>
