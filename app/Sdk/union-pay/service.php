<?php
namespace com\unionpay\acp\sdk;

include_once __DIR__ . '/sdk/acp_service.php';

class UnionPayService
{
    /*
     *exp:      获取网银支付订单
     *params:   array[app_id:商户号,price:交易金额（分）,order_sn:订单编号,created_at:订单创建时间，lasted_at:订单超时时间]
     *return:   string(order:HTML订单数据串，带表单)
     */
    public function getHtmlPayOrder($params)
    {
        $order = [
            //以下信息非特殊情况不需要改动








            'version' => \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->version,                 //版本号
            'encoding' => 'utf-8',				  //编码方式
            'txnType' => '01',				      //交易类型
            'txnSubType' => '01',				  //交易子类
            'bizType' => '000201',				  //业务类型
            'frontUrl' => \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->frontUrl,  //前台通知地址
            'backUrl' => \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->backUrl,	  //后台通知地址
            'signMethod' => \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->signMethod,	              //签名方法
            'channelType' => '08',	              //渠道类型，07-PC，08-手机
            'accessType' => '0',		          //接入类型
            'currencyCode' => '156',	          //交易币种，境内商户固定156
		
		    //TODO 以下信息需要填写
            'merId' => $params['app_id'],		//商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
            'orderId' => $params['order_sn'],	//商户订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数，可以自行定制规则
            'txnTime' => $params['created_at'],	//订单发送时间，格式为YYYYMMDDhhmmss，取北京时间，此处默认取demo演示页面传递的参数
            'txnAmt' => $params['price'],	//交易金额，单位分，此处默认取demo演示页面传递的参数
		
		    // 订单超时时间。
		    // 超过此时间后，除网银交易外，其他交易银联系统会拒绝受理，提示超时。 跳转银行网银交易如果超时后交易成功，会自动退款，大约5个工作日金额返还到持卡人账户。
		    // 此时间建议取支付时的北京时间加15分钟。
            'payTimeout' => $params['lasted_at'],

        ];

        //签名参数
        \com\unionpay\acp\sdk\AcpService::sign($order);

        //获取api地址
        $url = \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->frontTransUrl;

        //获取请求订单
        $html_form = \com\unionpay\acp\sdk\AcpService::createAutoFormHtml($order, $url);

        return $html_form;
    }

    /*
     *exp:      校验同步通知/异步通知参数正确性
     *params:   none
     *return:   boolean(result:验证结果)
     */
    public function checkNotifyMessage()
    {
        if (isset($_POST['signature'])) {
            return \com\unionpay\acp\sdk\AcpService::validate($_POST);
        }
        else {
            return false;
        }
    }

    /*
     *exp:      查询交易订单状态
     *params:   array[app_id:商户号,order_sn:订单编号,created_at:订单创建时间]
     *return:   array[...查询结果]
     */
    public function getOrderStaus($params)
    {
        $params = [
            //以下信息非特殊情况不需要改动


            'version' => \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->version,//版本号
            'encoding' => 'utf-8',		  //编码方式
            'signMethod' => \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->signMethod,//签名方法
            'txnType' => '00',		      //交易类型
            'txnSubType' => '00',		  //交易子类
            'bizType' => '000000',		  //业务类型
            'accessType' => '0',		  //接入类型
            'channelType' => '07',		  //渠道类型
    
            //TODO 以下信息需要填写
            'orderId' => $params["order_sn"],	//请修改被查询的交易的订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数
            'merId' => $params["app_id"],	    //商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
            'txnTime' => $params["created_at"],	//请修改被查询的交易的订单发送时间，格式为YYYYMMDDhhmmss，此处默认取demo演示页面传递的参数
        ];

        \com\unionpay\acp\sdk\AcpService::sign($params); // 签名

        $url = \com\unionpay\acp\sdk\SDKConfig::getSDKConfig()->singleQueryUrl;

        $result_arr = \com\unionpay\acp\sdk\AcpService::post($params, $url);

        if (count($result_arr) <= 0) { //没收到200应答的情况
            return "server error";
        }

        if (!\com\unionpay\acp\sdk\AcpService::validate($result_arr)) {
            return "sign error";
        }

        if ($result_arr["respCode"] == "00") {
            if ($result_arr["origRespCode"] == "00") {
            //交易成功
            //TODO
                return "order success";
            }
            else if ($result_arr["origRespCode"] == "03"
                || $result_arr["origRespCode"] == "04"
                || $result_arr["origRespCode"] == "05") {
            //后续需发起交易状态查询交易确定交易状态
            //TODO
                echo "order wait";
            }
            else {
            //其他应答码做以失败处理
            //TODO
                echo "order error 00";
            }
        }
        else if ($result_arr["respCode"] == "03"
            || $result_arr["respCode"] == "04"
            || $result_arr["respCode"] == "05") {
        //后续需发起交易状态查询交易确定交易状态
        //TODO
            return "order timeout";
        }
        else {
        //其他应答码做以失败处理
        //TODO
            echo "order error other";
        }
    }
}
