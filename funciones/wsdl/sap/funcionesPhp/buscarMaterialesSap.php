<?php

// CAPTURO PARAMETROS 

if ( isset( $_REQUEST[ "materialDesde" ] ) ) {$materialDesde= $_REQUEST[ "materialDesde" ];}else{$materialDesde='';}
if ( isset( $_REQUEST[ "materialHasta" ] ) ) {$materialHasta= $_REQUEST[ "materialHasta" ];}else{$materialHasta='';}
if ( isset( $_REQUEST[ "centroDesde" ] ) ) {$centroDesde= $_REQUEST[ "centroDesde" ];}else{$centroDesde='';}
if ( isset( $_REQUEST[ "centroHasta" ] ) ) {$centroHasta= $_REQUEST[ "centroHasta" ];}else{$centroHasta='';}
if ( isset( $_REQUEST[ "almacenDesde" ] ) ) {$almacenDesde= $_REQUEST[ "almacenDesde" ];}else{$almacenDesde='';}
if ( isset( $_REQUEST[ "almacenHasta" ] ) ) {$almacenHasta= $_REQUEST[ "almacenHasta" ];}else{$almacenHasta='';}
if ( isset( $_REQUEST[ "loteDesde" ] ) ) {$loteDesde= $_REQUEST[ "loteDesde" ];}else{$loteDesde='';}
if ( isset( $_REQUEST[ "loteHasta" ] ) ) {$loteHasta= $_REQUEST[ "loteHasta" ];}else{$loteHasta='';}
if ( isset( $_REQUEST[ "tipoMatlDesde" ] ) ) {$tipoMatlDesde= $_REQUEST[ "tipoMatlDesde" ];}else{$tipoMatlDesde='';}
if ( isset( $_REQUEST[ "tipoMatlHasta" ] ) ) {$tipoMatlHasta= $_REQUEST[ "tipoMatlHasta" ];}else{$tipoMatlHasta='';}
if ( isset( $_REQUEST[ "grpoArtDesde" ] ) ) {$grpoArtDesde= $_REQUEST[ "grpoArtDesde" ];}else{$grpoArtDesde='';}
if ( isset( $_REQUEST[ "grpoArtHasta" ] ) ) {$grpoArtHasta= $_REQUEST[ "grpoArtHasta" ];}else{$grpoArtHasta='';}
if ( isset( $_REQUEST[ "grpoCompraDesde" ] ) ) {$grpoCompraDesde= $_REQUEST[ "grpoCompraDesde" ];}else{$grpoCompraDesde='';}
if ( isset( $_REQUEST[ "grpoCompraHasta" ] ) ) {$grpoCompraHasta= $_REQUEST[ "grpoCompraHasta" ];}else{$grpoCompraHasta='';}


//error_reporting(0);	
$materialDesde=1;        
$materialHasta=15;
$centroDesde='';
$centroHasta=''; 

//SETEO DE ARRAYS
if ($materialDesde!='' && $materialHasta!='') {$material = array("DESDE" => $materialDesde, "HASTA" => $materialHasta);}else{$material='';}
if ($centroDesde!='' && $centroHasta!='') {$centro = array("DESDE" => $centroDesde, "HASTA" => $centroHasta);}else{$centro='';}
if ($almacenDesde!='' && $almacenHasta!='') {$almacen = array("DESDE" => $almacenDesde, "HASTA" => $almacenHasta);}else{$almacen='';}
if ($loteDesde!='' && $loteHasta!='') {$lote = array("DESDE" => $loteDesde, "HASTA" => $loteHasta);}else{$lote='';}
if ($tipoMatlDesde!='' && $tipoMatlHasta!='') {$tipoMatl = array("DESDE" => $tipoMatlDesde, "HASTA" => $tipoMatlHasta);}else{$tipoMatl='';}
if ($grpoArtDesde!='' && $grpoArtHasta!='') {$grpoArt = array("DESDE" => $grpoArtDesde, "HASTA" => $grpoArtHasta);}else{$grpoArt='';}
if ($grpoCompraDesde!='' && $grpoCompraHasta!='') {$grpoCompra = array("DESDE" => $grpoCompraDesde, "HASTA" => $grpoCompraHasta);}else{$grpoCompra='';}

//// DIRECCION DE PLUGINS NUSOAP
             
               if ( file_exists( "../../public/plugins/nusoap/lib/nusoap.php" ) ) {
  require_once( "../../public/plugins/nusoap/lib/nusoap.php" );

} else {
  require_once( "../../../../public/plugins/nusoap/lib/nusoap.php" );

}
	


	
 //// ACCESO LOGICO AL WSDL 		
 
		$ruta =  "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/sap/out/listastockInventarios_Sync_OutService.wsdl";
    
		$oSoapClient = new nusoap_client($ruta, true);
        // USUARIO Y PASS DE AUTENTIFICACION PO
		$oSoapClient->setCredentials('PIUSERWS01', 'Pequiven21*', 'basic');
		if ($sError = $oSoapClient->getError()) 
		{
   			echo "No se pudo realizar la operación [" . $sError . "]";
   			die();
		}
// ENVIO PARAMETROS EN UN ARRAY
//		$RFC_funcion='listastockInventarios_Sync_Out';
		$RFC_funcion='ZEHS_STOCK_MATERIALES_Sync_Out';
       //$centro = array("desde" => $centroDesde,"hasta" => $materialHasta);
                             
		$aParametros = array(
							"IM_QUERY_IN" => array(),
						);
// SECCIONES DEL WSDL
		$sections = array (
				"material" => "MATNR",
				"centro" => "WERKS",
				"almacen" => "LGORT",
				"lote" => "CHARG",
				"tipoMatl" => "MTART",
				"grpoArt" => "MATKL",
				"grpoCompra" => "EKGRP",
		);
// SETEO DE PARAMETROS PARA EL WSDL
		foreach ($sections as $key => $value) {
			if (${$key} != '') {
				$aParametros["IM_QUERY_IN"][$value] = ${$key};
			}
		}
		// var_dump($aParametros);
		// die();
//print_r($aParametros);exit;
   		$aRespuesta = $oSoapClient->call($RFC_funcion, $aParametros);
	if ($oSoapClient->fault) { // Si
		 print("<pre>".print_r(($aRespuesta),true)."</pre>"); 
       //print_r($aRespuesta) ;
      echo 'No se pudo completar la operación';
      die();
   	} 
	else 
	{ // No
      $sError = $oSoapClient->getError();
      // Hay algun error ?
      if ($sError) 
	  { // Si
          print_r($aRespuesta);
         echo 'Error:' . $sError;
      }
	  else
		{	
// OPTENGO RESULTADOS 
          
			//$rows = $aRespuesta['listaInventario'];//saprfc_table_rows ($fce,"RESULTS");
			//$cont = count($aRespuesta['listaInventario']) - 1;
      }
    }
	
	print("<pre>".print_r(($aRespuesta),true)."</pre>"); 
//echo "cont ".$cont;

