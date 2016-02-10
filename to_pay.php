<?php
include 'config.php';
include 'tpv.php';

$tpv_order=date('ymdHis');

try{

$redsys = new Tpv();
//Asignar nombre a id y name del formulario
$redsys->setNameForm('nombre_formulario');
$redsys->setIdForm('id_formulario');

//Asignar nombre, id, value y style (css) al botón submit, si usáis redirección podéis ocultar el botón con display:none
$redsys->setAttributesSubmit('btn_submit','btn_id','Enviar','font-size:14px; color:#ff00c1; display:none;');

//Generar formulario
$redsys->createForm();
	  $redsys->setAmount('0.10');
    $redsys->setOrder($tpv_order);
    $redsys->setMerchantcode('MERCHANTCODE'); //Merchant code
    $redsys->setCurrency('978');
    $redsys->setTransactiontype('0');
    $redsys->setTerminal('001');
    $redsys->setNotification('NOTIF_URL'); //Callback url
    $redsys->setUrlOk('OK_URL'); //Url OK
    $redsys->setUrlKo('KO_URL'); //Url KO
    $redsys->setVersion('HMAC_SHA256_V1');
    $redsys->setTradeName('MERCHANT NAME');
    $redsys->setTitular('MERCHANT TITLE');
    $redsys->setProductDescription('PRODUCT_DESCRIPTION');
    $redsys->setEnviroment(entorno_tpv); //Usamos OTHER de momento hasta tener bien las URL de test

    $signature = $redsys->generateMerchantSignature(clave_tpv);
    $redsys->setMerchantSignature($signature);
  	$redsys->executeRedirection();
}
catch(Exception $e){
    echo $e->getMessage();   
}
?>
Processing...

