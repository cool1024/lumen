<?php
require_once dirname(__FILE__) . "/JavaBridge/Java.inc";		//����JavaBridge�����ļ�
java_set_library_path(dirname(__FILE__) . "/JavaBridge/jar");	//����jar����ŵ�classPath·��
	//����������õ�jar��
java_require(dirname(__FILE__) . "/JavaBridge/jar/icbc.jar");	//֧���ӿ�ʵ����
java_require(dirname(__FILE__) . "/JavaBridge/jar/ISFJ.jar");	//֧���ӿ�ʵ����
	
	//����Java2PHP��ʽת������
require_once dirname(__FILE__) . '/../icbcB2C.includes/getBytes.php';
require_once dirname(__FILE__) . '/../icbcB2C.includes/charArray.php';
require_once dirname(__FILE__) . '/../icbcB2C.includes/ReadBytesFile.php';
?>
	