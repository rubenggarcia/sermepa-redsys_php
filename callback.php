<?php
include 'config.php';
include 'tpv.php';
try{
    $redsys = new Tpv();
  if ($redsys->check(clave_tpv, $_POST)) { 
    	$decodec = $redsys->decodeParameters($_POST['Ds_MerchantParameters']);
  		$arr=$redsys->JsonToArray($decodec);
		  if($arr['Ds_Response']=='0000'){
		    //Do stuff if payment was ok
  			$tpv_order=$arr['Ds_Order'];
  			
		  }
	} else {
        //Do stuff if payment was KO
    }
}
catch(Exception $e){
    echo $e->getMessage();
}

?>
