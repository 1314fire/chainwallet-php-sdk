<?php
    require_once 'method.php';
    $method = new method();
    $method->appid = "20202112233";
    $method->domain = "http://127.0.0.1:8802/finance";
    $method->token = "YnQGCbCurtNuQEDGKbUAXQktH372lbFW";

    # 获取网络和币的配置表
    $res = $method->getChainAndCoin("20202112233", "1");
    var_dump($res);


    # 转账
    $res = $method->toTransfer("OrderSn-001", "0001", 1, 1, "1", "aabc");
    var_dump($res);


    # 获取用户地址
    $res = $method->getUserAddress("104725", 2, 3);
    var_dump($res);

    # 获取服务商地址
    $res = $method->getHotAddress(1);
    var_dump($res);

    # 获取建议油费地址
    $res = $method->suggestGasPrice();
    var_dump($res);

    # 获取余额
    $res = $method->getBalance("TYxpVgdRs7FURtgtX8p4tcRk14z5VAzdX5", 2, 3);
    var_dump($res);

    # 查询支持的所有链类型和币类型
    $res = $method->getChainAndCoinList();
    var_dump($res);

    # 更新商户
    $res = $method->updateMerchant("", "https://japi.dev.acebetsabo.com/usdtcallback", "http://127.0.0.1", 0);
    var_dump($res);

    # 获取商户归集余额
    $res = $method->getMerchantCollectBalance("20202112233", "1");
    var_dump($res);

    # 获取用户余额
    $res = $method->getUserBalance("20202112233", '104725');
    var_dump($res);

    # 获取提币订单详情
    $res = $method->getWithdrawOrderInfo("wdcd4jv5973rhrf6o6bs00");
    var_dump($res);

    # 获取提币订单列表
    $res = $method->findWithdrawOrderList("", "", 0);
    var_dump($res);

    # 获取存款订单列表
    $res = $method->findDeposOrderList("", "", "");
    var_dump($res);


    # 获取收银台地址
    $res = $method->getPayment("10000", "200", 1, 2, "123321123");
    var_dump($res);

    # 查询收银台订单
    $res = $method->checkPayment("8cpaycefgk9o48dr1u92957rg");
    var_dump($res);
