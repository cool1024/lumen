<?php
require_once ("sdk/icbcB2C.pay/IcbcB2CPayImpl.php");
require_once ('sdk/icbcB2C.includes/javaBridge.php');
require_once ('sdk/icbcB2C.includes/getBytes.php');
// require_once ('demo/OrderProc.php');

class EPayService
{

    public function getPayOrder($params)
    {

        $interfaceName = "ICBC_WAPB_B2C";

        $interfaceVersion = "1.0.0.6";

        $orderInfo = [
            'orderDate' => date('YmdHis'),//交易日期时间
            'orderid' => $params['ordersn'],//订单ID(客户支付后商户网站产生的一个唯一的定单号)
            'amount' => $params['amount'],//订单金额（分）
            'installmentTimes' => '1',//分期付款期数
            'curType' => '001',//人民币（001）支付
            'merID' => $params['merID'],//唯一确定一个商户的代码，由商户在工行开户时，由工行告知商户
            'merAcct' => $params['merAcct'],//入账银行卡号
        ];

        $custom = [
            'verifyJoinFlag' => '0',//手机银行订单必输0
            'Language' => 'zh_CN'//语言
        ];

        $message = [
            "goodsID" => $params['goodsID'],
            "goodsName" => $params['goodsName'],
            "goodsNum" => $params['goodsNum'],
            "carriageAmt" => "NULL",
            "merHint" => $params['merHint'],
            "remark1" => "NULL",
            "remark2" => "NULL",
            "merURL" => $params['merURL'],
            "merVAR" => "NULL",//选输,商户自定义
            "notifyType" => "HS",//取值“HS”：在交易完成后实时将通知信息以HTTP协议POST方式，主动发送给商户
            "resultType" => "0",//取值“0”：无论支付成功或者失败，银行都向商户发送交易通知信息
            "backup1" => "NULL",
            "backup2" => "NULL",
            "backup3" => "NULL",
            "backup4" => "NULL",
        ];

        $b2cConfig = [
            'userCrtPath' => 'D:\SERVER\nginx\www\icbcB2C4PHP\bankKey\dckj.cer',
            'userKeyPath' => 'D:\SERVER\nginx\www\icbcB2C4PHP\bankKey\dckj.key',
            'password' => 'Abcd1234',
            'interfaceName' => $interfaceName,
            'interfaceVersion' => $interfaceVersion
        ];

        $orderentity = new OrderEntity;
        $orderentity->perpareData();

        //API配置
        $orderentity->set("USER_CRTPATH", $b2cConfig['userCrtPath']);//公钥数据
        $orderentity->set("USER_KEYPATH", $b2cConfig['userKeyPath']);//私钥数据
        $orderentity->set("USER_KEYPASSWORD", $b2cConfig['password']);//证书密码
        $orderentity->set("API_QUERY_HOST", 'https://mywap2.icbc.com.cn/ICBCWAPBank/servlet/ICBCWAPEBizServlet');//请求地址
        $orderentity->set("API_QUERY_HOST_PORT", '80');//请求端口

        //订单配置
        $orderentity->set("ORDER_DATE", $orderInfo['orderDate']);//订单日期，格式yyyyMMddHHmmss
        $orderentity->set("ORDER_ID", $orderInfo['orderid']);//订单号, 30位，数字
        $orderentity->set("AMOUNT", $orderInfo['amount']);//订单金额
        $orderentity->set("INSTALLMENT_TIMES", $orderInfo['installmentTimes']);//分期期数
        $orderentity->set("CUR_TYPE", $orderInfo['curType']);//币种
        $orderentity->set("MER_ID", $orderInfo['merID']);//商城代码
        $orderentity->set("MER_ACCT", $orderInfo['merAcct']);//商城账号	

        //商品配置
        $orderentity->set("GOODS_ID", $message['goodsID']);//商品ID
        $orderentity->set("GOODS_NAME", $message['goodsName']);//商品名称
        $orderentity->set("GOODS_NUM", $message['goodsNum']);//商品数量
        $orderentity->set("CARRIAGE_AMT", $message['carriageAmt']);//运费
        $orderentity->set("REMARK1", $message['remark1']);//备注1
        $orderentity->set("REMARK2", $message['remark2']);//备注2
        $orderentity->set("MER_HINT", $message['merHint']);//商城提示
        $orderentity->set("MER_URL", $message['merURL']);//商城通知地址
        $orderentity->set("MER_VAR", $message['merVAR']);//商城备注
        $orderentity->set("NOTIFY_TYPE", $message['notifyType']);//通知类型
        $orderentity->set("RESULT_TYPE", $message['resultType']);//通知结果类型
        $orderentity->set("BACKUP1", $message['backup1']);//备用1
        $orderentity->set("BACKUP2", $message['backup2']);//备用2
        $orderentity->set("BACKUP3", $message['backup3']);//备用3
        $orderentity->set("BACKUP4", $message['backup4']);//备用4

        //其他配置
        $orderentity->set("VERIFY_JOIN_FLAG", $custom['verifyJoinFlag']);//联名校验标志
        $orderentity->set("LANGUAGE", $custom['Language']);//语言

        $orderproc = new OrderProc;
        $formData = $orderproc->orderProcess($orderentity);
        
        //dd($formData);
        /*
        echo $formData->getInterfaceName();
        echo PHP_EOL;
        echo $formData->getInterfaceVersion();
        echo PHP_EOL;
        echo $formData->getApiQueryHost();
        echo PHP_EOL;
        echo $formData->getApiQueryHostPort();
        echo PHP_EOL;
        echo $formData->getTranData();
        echo PHP_EOL;
        echo $formData->getMerCert();
        echo PHP_EOL;
        echo $formData->getMerSignMsg();
        echo PHP_EOL;
         */

    }

    private function array_to_xml($array, &$xml_element)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml_element->addChild("$key");
                    self::array_to_xml($value, $subnode);
                }
                else {
                    $subnode = $xml_element->addChild("$key");
                    self::array_to_xml($value, $subnode);
                }
            }
            else {
                $xml_element->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    /*
     *exp:      获取工银E支付订单数据
     *params:   array[ordersn:唯一订单号,amount:订单价格（分），merID:商户ID,merAcct:商户收账银行卡号，merURL：异步通知地址，goodsID：商品编号，goodsName：商品名称,goodsNum：商品数量，merHint:商城提示信息]
     *return:   string(order:HTML订单数据串，带表单)
     */
    public function getHtmlPayOrder($params)
    {
        $interfaceName = "ICBC_WAPB_B2C";

        $interfaceVersion = "1.0.0.6";

        $orderInfo = [
            'orderDate' => date('YmdHis'),//交易日期时间
            'orderid' => $params['ordersn'],//订单ID(客户支付后商户网站产生的一个唯一的定单号)
            'amount' => $params['amount'],//订单金额（分）
            'installmentTimes' => '1',//分期付款期数
            'curType' => '001',//人民币（001）支付
            'merID' => $params['merID'],//唯一确定一个商户的代码，由商户在工行开户时，由工行告知商户
            'merAcct' => $params['merAcct'],//入账银行卡号
        ];

        $custom = [
            'verifyJoinFlag' => '0',//手机银行订单必输0
            'Language' => 'ZH_CN'//语言
        ];

        $message = [
            "goodsID" => $params['goodsID'],
            "goodsName" => $params['goodsName'],
            "goodsNum" => $params['goodsNum'],
            "carriageAmt" => "NULL",
            "merHint" => $params['merHint'],
            "remark1" => "NULL",
            "remark2" => "NULL",
            "merURL" => $params['merURL'],
            "merVAR" => "NULL",//选输,商户自定义
            "notifyType" => "HS",//取值“HS”：在交易完成后实时将通知信息以HTTP协议POST方式，主动发送给商户
            "resultType" => "0",//取值“0”：无论支付成功或者失败，银行都向商户发送交易通知信息
            "backup1" => "NULL",
            "backup2" => "NULL",
            "backup3" => "NULL",
            "backup4" => "NULL",
        ];

        $xml_array = [
            'interfaceName' => $interfaceName,
            'interfaceVersion' => $interfaceVersion,
            'orderInfo' => $orderInfo,
            'custom' => $custom,
            'message' => $message,
        ];

        $xml_element = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"GBK\" standalone=\"no\" ?><B2CReq></B2CReq>");

        self::array_to_xml($xml_array, $xml_element);

        $xml = $xml_element->asXML();

        $xml = str_ireplace("NULL", "", $xml);
        $xml = str_replace(array("\r\n", "\r", "\n"), "", $xml);

        $payImpl = new IcbcB2CPayImpl();
        $b2cConfig = [
            'userCrtPath' => __DIR__.'\sdk\key\dckj.cer',
            'userKeyPath' =>  __DIR__.'\sdk\key\dckj.key',
            'password' => 'Abcd1234',
            'interfaceName' => $interfaceName,
            'interfaceVersion' => $interfaceVersion
        ];

        $form = $payImpl->createFormData($b2cConfig, $xml);
        if (isset($form)) {
            return
                '<html><head><meta http-equiv="Content-Type" content="text/html;" charset="utf-8" /></head><body onload="javascript:document.getElementById(\'pay_form\').submit();">' .
                '<form id="pay_form" action="https://mywap2.icbc.com.cn/ICBCWAPBank/servlet/ICBCWAPEBizServlet" method="post">' .
                "<input name='interfaceName' type='hidden' value='" . $form->getInterfaceName() . "'/>" .
                "<input name='interfaceVersion' type='text' value='" . $form->getInterfaceVersion() . "' />" .
                "<input name='clientType' TYPE='text' value='0'>" .
                "<input name='tranData' type='text' value='" . $form->getTranData() . "' />" .
                "<input name='merSignMsg' type='text' value='" . $form->getMerSignMsg() . "' />" .
                "<input name='merCert' type='text' value='" . $form->getMerCert() . "' /></form></body></html>";
        }
        else {
            return null;
        }
    }

    /*
     *exp:      获取工银E支付订单数据
     *params:   none
     *return:   boolean(result:验签结果)|string(result:失败原因)
     */
    public function checkNotifyMessage()
    {
        $merVAR = $_POST["merVAR"];
        $notifyData = $_POST["notifyData"];
        $signMsg = $_POST["signMsg"];

        if (!isset($notifyData, $signMsg) || empty($notifyData) || empty($signMsg)) {
            return "params lost";
        }

        $ReturnValue = new Java("cn.com.infosec.icbc.ReturnValue");
        $publicCrtPath = "E:/Git/lumen/app/Sdk/e-pay/sdk/key/admin.crt";

        //读取签名文件
        // $fp = fopen($publicCrtPath, "rb");
        // fseek($fp, 0, SEEK_END);
        // $filelen = ftell($fp);
        // fseek($fp, 0, SEEK_SET);
        // $bcert = fread($fp, $filelen);
        // fclose($fp);
        $bcert = ReadBytesFile::readFile($publicCrtPath);

        //获取签名
        $sign = Bytes::getBytes(base64_decode($signMsg));

        //获取通知数据
        $notifyData = Bytes::getBytes(base64_decode($notifyData));

        $rv = java_values($ReturnValue->verifySign($notifyData, count($notifyData), $bcert, $sign));

        return $rv;
        //return $rv == 0 ? true : "verify error";
    }

}
