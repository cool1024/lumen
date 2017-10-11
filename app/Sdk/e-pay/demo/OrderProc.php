<?php header("Content-Type:text/html; charset=utf-8");

require 'PackFormData.php';


class OrderProc {

        // ��ȡ֤��
        private function readCert($filePath) {
                if ($filePath==NULL) {
			echo "filepath is null".PHP_EOL;
                        return NULL;
                }
                $file=fopen($filePath,"rb");
                if($file==NULL)
                {
                        echo "��֤��ʧ��!".PHP_EOL;
                        return NULL;
                }


		fseek($file,0,SEEK_END);
		$filelen2=ftell($file);
		fseek($file,0,SEEK_SET);
		$bsc = fread($file,$filelen2);
		fclose($file);
        return $bsc;
        }




        private function getKeyData($orderEntity) {
                $orderEntity->setUserCrt($this->readCert($orderEntity->getUserCrtPath()));
                $orderEntity->setUserKey($this->readCert($orderEntity->getUserKeyPath()));
        }

        private function getKeyData11($orderEntity) {
                $orderEntity->setUserCrt($this->readCert($orderEntity->getUserCrtPath()));
                $orderEntity->setUserKey($this->readCert($orderEntity->getUserKeyPath()));
        }



	/**
	 * �����̻����Ͷ�����Ϣ����֧֯�������
	 * 
	 * @param orderEntity
	 * @return FormData
	 * @throws Exception
	 */
	public function orderProcess($orderEntity){		
//		$orderEntity->perpareData();
		$this->getKeyData($orderEntity);
		if ((PackTranData::verifyOrderData($orderEntity))==0) {
			$formData = PackFormData::createFormData($orderEntity);
		} else {
			echo "���ɶ���֧��������ʧ�ܣ�".PHP_EOL;
		}
		return $formData;
	}
	
	public function orderProcess11($orderEntity){
//		$orderEntity->perpareData();
		$this->getKeyData($orderEntity);

		if ((PackTranData::verifyOrderData11($orderEntity))==0) {
			$formData = PackFormData::createFormData11($orderEntity);
		} else {
			echo "���ɶ���֧��������ʧ�ܣ�".PHP_EOL;
		}
		return $formData;
	}

}

?>
