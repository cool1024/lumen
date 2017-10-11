<?php 
	
	require_once __DIR__ . '/../icbcB2C.model/B2cConfig.php';
	require_once __DIR__ . '/../icbcB2C.model/FormData.php';
	require_once __DIR__ . '/../icbcB2C.model/TranData.php';

	/*
	 * <p>icbcB2C֧���ӿ�</p>
	 * <br/>
	 *<p>�˽ӿ����ڽ��̻��ύ��֧����Ϣ��װ��FormData����Ҫ����Ϣ</P>
	 *@see <p>���й�������������������B2C����֧���ӿ�˵��V1.0.0.11��</p>
	 *@author ����ͩ
	 */
interface IcbcB2CPay {
	
	/*
	 * <p>��װtranData����</p>
	 * @param b2cConfig
	 * ��B2C�̻������ļ��ж�ȡ��������Ϣ
	 * @param tranData
	 * �̻��ύ��tranData����
	 * @return String
	 * @throws Exception
	 */
	public function packTranData($b2cConfig, $tranData);
	
	/*
	 * <p>��װ������</p>
	 * @param xmlPath
	 * �����ļ����·��
	 * @param tranData
	 * �̻��ύ��tranData����
	 * @return formData
	 * @throws Exception
	 */
	public function createFormData($xmlPath, $tranData);
}

?>
