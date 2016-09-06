<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 2016/9/6
 * Time: 14:15
 */

namespace Skyling\Alidayu;

require_once __DIR__.'/TopSdk.php';

class Alidayu
{
    private $topClient;
    private $response;
    private $receiver;
    private $templateCode;
    private $msgParams;

    public function __construct()
    {
        $appKey = env('ALIDAYU_APP_KEY', '');
        $secretKey = env('ALIDAYU_SECRET_KEY', '');
        $this->topClient = new \TopClient($appKey, $secretKey);
        $this->topClient->format = 'json';
    }

    public function sendSms($receiver, $templateCode, Array $msgParams = null)
    {
        $this->receiver = $receiver;
        $this->templateCode = $templateCode;
        $this->msgParams = $msgParams;
        $req = new \AlibabaAliqinFcSmsNumSendRequest();
        $req->setSmsType('normal');
        $req->setSmsFreeSignName(env('ALIDAYU_SIGN'));

        if($this->msgParams) {
            $msg_param_json = json_encode($this->msgParams);
            $req->setSmsParam($msg_param_json);
        }
        $req->setRecNum($this->receiver);
        $req->setSmsTemplateCode($this->templateCode);
        $this->response =  $this->topClient->execute($req);
        return $this->response;
    }

    /**
     * 是否成功
     * @return bool
     */
    public function isSuccess()
    {
        if (isset($this->response->result, $this->response->result->err_code) && $this->response->result->err_code == 0) {
            return true;
        }
        return false;
    }

    /**
     * 获取返回信息
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     *  获取错误信息
     * @return string
     */
    public function getErrorInfo()
    {
        if ($this->isSuccess()) {
            $error = '';
        } else {
            $error = json_encode($this->response->error_response, JSON_UNESCAPED_UNICODE);
        }
        return $error;
    }


    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getTemplateCode()
    {
        return $this->templateCode;
    }

    /**
     * @param mixed $templateCode
     */
    public function setTemplateCode($templateCode)
    {
        $this->templateCode = $templateCode;
    }

    /**
     * @return mixed
     */
    public function getMsgParams()
    {
        return $this->msgParams;
    }

    /**
     * @param mixed $msgParams
     */
    public function setMsgParams($msgParams)
    {
        $this->msgParams = $msgParams;
    }
}