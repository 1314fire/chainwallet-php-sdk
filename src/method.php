<?php
require_once './utils.php';
class method
{
    public $appid;

    public $token;

    public $domain;

    public function doPost($path, $param){
        $secret = makeToken($this->appid, $this->token, $param);
        $returnContent = httpPostJson($this->domain . $path, json_encode($param), $this->appid, $secret);
        $res = json_decode($returnContent);
        if ($res->code != 0){
            throw new Exception($res->msg);
        }
        return $res->data;
    }

    public function getChainAndCoin($appId, $merchantId){
        $res = $this->doPost("/chain_coin", array(
            "app_id"=>$appId,
            "merchant_id"=> $merchantId
        ));
        return $res;
    }

    public function toTransfer($order, $uid, $chain_type, $coin_type, $amount, $to_addr){
        $res = $this->doPost("/transfer", array(
            "order" => $order,
            "uid" => $uid,
            "chain_type" => $chain_type,
            "coin_type" => $coin_type,
            "amount" => $amount,
            "to_addr" => $to_addr
        ));
        return $res;
    }

    public function getUserAddress($uid, $chain_type, $coin_type)
    {
        $res = $this->doPost("/getAddress", array(
            "uid" => $uid,
            "chain_type" => $chain_type,
            "coin_type" => $coin_type
        ));
        return $res;
    }
    public function getHotAddress($chain_type){
        $res = $this->doPost("/getHotAddress", array(
            "chain_type" => $chain_type
        ));
        return $res;
    }

    public function suggestGasPrice(){
        $res = $this->doPost("/suggestGasPrice", array());
        return $res;
    }
    public function getBalance($addr, $chain_type, $coin_type){
        $res = $this->doPost("/balance", array(
            "addr" => $addr,
            "chain_type" => $chain_type,
            "coin_type" => $coin_type
        ));
        return $res;
    }

    public function updateMerchant($merchant_name, $callback_url, $ip_whites, $ip_white_open)
    {
        $res = $this->doPost("/update/merchant", array(
            "merchant_name" => $merchant_name,
            "callback_url" => $callback_url,
            "ip_whites" => $ip_whites,
            "ip_white_open" => $ip_white_open
        ));
        return $res;
    }
    public function getMerchantCollectBalance($app_id, $merchant_id)
    {
        $res = $this->doPost("/getMerchantCollectBalance", array(
            "app_id" => $app_id,
            "merchant_id" => $merchant_id
        ));
        return $res;
    }
    public function getUserBalance($app_id, $uid)
    {
        $res = $this->doPost("/getUserBalance", array(
            "app_id" => $app_id,
            "uid" => $uid
        ));
        return $res;
    }

    public function getWithdrawOrderInfo($order_no)
    {
        $res = $this->doPost("/getWithdrawOrderInfo", array(
            "order_no" => $order_no
        ));
        return $res;
    }

    public function findWithdrawOrderList($start_date, $end_date, $transfer_type)
    {
        $res = $this->doPost("/findWithdrawOrderList", array(
            "start_date" => $start_date,
            "end_date" => $end_date,
            "transfer_type" => $transfer_type
        ));
        return $res;
    }

    public function findDeposOrderList($start_date, $end_date, $transfer_type)
    {
        $res = $this->doPost("/findDeposOrderList", array(
            "start_date" => $start_date,
            "end_date" => $end_date,
            "transfer_type" => $transfer_type
        ));
        return $res;
    }

    public function getChainAndCoinList()
    {
        $res = $this->doPost("/getChainAndCoinList", array());
        return $res;
    }

    public function getPayment($uid, $amount, $chain_type, $coin_type, $order_no)
    {
        $res = $this->doPost("/depos", array(
            "uid" => $uid,
            "amount" => $amount,
            "chain_type" => $chain_type,
            "coin_type" => $coin_type,
            "order_no" => $order_no,
        ));
        return $res;
    }

    public function checkPayment($plat_no)
    {
        $res = $this->doPost("/checkPayment", array(
            "plat_no" => $plat_no,
        ));
        return $res;
    }

}