<?php
session_start();
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;

include 'vendor/autoload.php';


$bag = CertificationBagFactory::integrationWebpayNormal();
$webpay=TransbankServiceFactory::normal($bag);

$result =$webpay->getTransactionResult();

$_SESSION['responseCode']=$result->detailOutput->responseCode;
if($result->detailOutput->responseCode==0){
	//GUARDAR RESULTADO
}else{
	//MARCAR ORDEN EN BASE DE DATOS COMO RECHAZADA
}
$webpay->acknowledgeTransaction();

echo RedirectorHelper::redirectBackNormal($result->urlRedirection);

?>