<?php
	require_once __DIR__ . '/../icbcB2C.model/B2cConfig.php';
	/*
	 * <p>icbcB2C������</p>
	 * <br/>
	 * �����ṩ����B2C֧��ͨ�ڲ����õ�һЩ����������
	 * @author ����ͩ
	 */

class IcbcB2CUtil{
	
	/*
	 * <p>����B2C�̻������ļ�</p>
	 * @see <p>������B2C�̻������ļ�˵���ĵ���</p>
	 * @param path
	 * �����ļ����·��
	 * @return b2cConfig
	 */
	public static function loadXML($path){
		$b2cConfig = null;	//����B2cConfig����
		try{
			$b2cConfig = new B2cConfig();
			$xml = simplexml_load_file($path);
			$xml = $xml->children();
			foreach ($xml->children() as $child){
				$array[$child->getName()] = $child;
			}
			//�ӿ�����
			$b2cConfig->setInterfaceName(trim($array["interfaceName"]));
			//�ӿڰ汾��
			$b2cConfig->setInterfaceVersion(trim($array["interfaceVersion"]));
			//�̻��˺�
			$b2cConfig->setMerAcct(trim($array["merAcct"]));
			//����������־
			$b2cConfig->setVerifyJoinFlag(trim($array["verifyJoinFlag"]));
			//���԰汾
			$b2cConfig->setLanguage(trim($array["Language"]));
			//֧������
			$b2cConfig->setCurType(trim($array["curType"]));
			//�̻�����
			$b2cConfig->setMerID(trim($array["merID"]));
			//֧�ֶ���֧�������п�����
			$b2cConfig->setCreditType(trim($array["creditType"]));
			//֪ͨ����
			$b2cConfig->setNotifyType(trim($array["notifyType"]));
			//�����������
			$b2cConfig->setResultType(trim($array["resultType"]));
			//�̻�reference
			$b2cConfig->setMerReference(trim($array["merReference"]));
			//�ͻ���IP
			$b2cConfig->setMerCustomIp(trim($array["merCustomIp"]));
			//�̳���ʾ
			$b2cConfig->setMerHint(trim($array["merHint"]));
			//��ע�ֶ�1
			$b2cConfig->setRemark1(trim($array["remark1"]));
			//��ע�ֶ�2
			$b2cConfig->setRemark2(trim($array["remark2"]));
			//�����̻�URL
			$b2cConfig->setMerURL(trim($array["merURL"]));
			//�����̻�����
			$b2cConfig->setMerVAR(trim($array["merVAR"]));
			//����֤����·��
			$b2cConfig->setUserCrtPath(trim($array["userCrtPath"]));
			//�����̻�˽Կ���·��
			$b2cConfig->setUserKeyPath(trim($array["userKeyPath"]));
			//����˽Կ���·��
			$b2cConfig->setPassword(trim($array["password"]));
			//�����̻�֤����·��
			$b2cConfig->setPemPath(trim($array["pemPath"]));
			//�����̻�API��ѯ�ύ�ķ�����IP������
			$b2cConfig->setApiQueryHost(trim($array["apiQueryHost"]));
			//�����̻�API��ѯ�ύ�ķ������˿ں�
			$strPort = trim($array["apiQueryHostPort"]);
			$b2cConfig->setApiQueryHostPort((int)$strPort);
			//�������й�Կ��ŵ�ַ
			$b2cConfig->setPublicCrtPath(trim($array["publicCrtPath"]));
			
		}
		catch (Exception $e){
			$logger->fatal($e->getMessage(), $e);
		}
		return $b2cConfig;
	}
	
	/*
	 * <p>У������</p>
	 * �˷������ڶ��̻��ύ���е�һЩ������ֽ���У�飬���ֹ淶Ϊ�������ֲ���Ϊ0������������ַ���ֻ����0-9��������ϣ������������ַ���
	 * @param str
	 * ҪУ��������ַ���
	 * @return Boolean
	 * ����ֵΪtrue��ʾ���ַ���Ҫ�󣬷���ֵΪfalse��ʾ���ָ�ʽ������Ҫ��
	 */
	public static function checkNum($str){
		if($str != null){
			$firstC = ord($str);	//����$str��һ���ַ���ASCII��
			if($firstC == 80){		//��Ϊ80����ʾΪ0������false
				return false;			
			}
			for($i=0; $i<strlen($str); $i++){
				$char = $str[$i];
				if($char != ' '){
					if($char < '0' || '9'<$char){
						return false;
					}
				}
			}	
			return true;
		}
		else{
			return false;
		}
	}
}
?>