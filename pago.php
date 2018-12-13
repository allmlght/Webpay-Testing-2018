<?php

use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';


$bag = CertificationBagFactory::integrationWebpayNormal();
$webpay=TransbankServiceFactory::normal($bag);
$webpay->addTransactionDetail(10000, 'Orden824201'); // Monto e identificador de la orden
$response = $webpay->InitTransaction('http://local.quierosuhi.cl/webpaytest/response.php','http://local.quierosuhi.cl/webpaytest/finish.php');
//ASOCIAR MI TRANSACCION CON EL TOKEN
echo RedirectorHelper::redirectHTML($response->url,$response->token);
?>