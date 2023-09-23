<?php
//$n_personal='15258628';
$n_personal = $_REQUEST[ "cedula" ];
 empleado($n_personal);
function empleado($n_personal){
		error_reporting(0);	
        
               if ( file_exists( "../../public/plugins/nusoap/lib/nusoap.php" ) ) {
  require_once( "../../public/plugins/nusoap/lib/nusoap.php" );

} else {
  require_once( "../../../../public/plugins/nusoap/lib/nusoap.php" );

}
	
		
    
		
		$ruta = "http://" . $_SERVER['HTTP_HOST'] . "/funciones/wsdl/sap/out/ZEHS_DATOSEMPLEADO_Sync_OutService_PRD.wsdl";
		$oSoapClient = new nusoap_client($ruta, true);
		$oSoapClient->setCredentials('PIUSERWS01', 'Pequiven21*', 'basic');
		if ($sError = $oSoapClient->getError()) 
		{
   			echo "No se pudo realizar la operación [" . $sError . "]";
   			die();
		}
		// desencripto variables
		$RFC_funcion='ZEHS_DATOSEMPLEADO_Sync_Out';
		$aParametros = array("ICNUM" => $n_personal);
   		$aRespuesta = $oSoapClient->call($RFC_funcion, $aParametros);
	if ($oSoapClient->fault) { // Si
      echo 'No se pudo completar la operación';
      die();
   	} 
	else 
	{ // No
      $sError = $oSoapClient->getError();
      // Hay algun error ?
      if ($sError) 
	  { // Si
         echo 'Error:' . $sError;
      }
	  else
		{				
			$PERNR = +$aRespuesta['PERNR']; 
            $ICNUM = +$aRespuesta['ICNUM']; 
            $VORNA = htmlentities(utf8_encode($aRespuesta['VORNA']));
            $NACHN = htmlentities(utf8_encode($aRespuesta['NACHN']));
            $nombre_empleado=$VORNA." ".$NACHN;
            $GBDAT_ING= $aRespuesta['GBDAT_ING'];
            $ECIVI= $aRespuesta['ECIVI'];
            $SEXO= $aRespuesta['SEXO'];
            $NATIO= $aRespuesta['NATIO'];
            $PLANS= htmlentities(utf8_encode($aRespuesta['PLANS']));
            $ORGEH= htmlentities(utf8_encode($aRespuesta['ORGEH']));
            $WERKS= htmlentities(utf8_encode($aRespuesta['WERKS']));
            $BTRTL= $aRespuesta['BTRTL'];
            $PERSG= $aRespuesta['PERSG'];
            $PERSK= $aRespuesta['PERSK'];
            $KOSTL= +$aRespuesta['KOSTL'];
            $DIRE1= htmlentities(utf8_encode($aRespuesta['DIRE1']));
            $DIRE2= htmlentities(utf8_encode( $aRespuesta['DIRE2']));
            $TELNR= $aRespuesta['TELNR'];
            $PERNR_SUPER= $aRespuesta['PERNR_SUPER'];
            $ICNUM_SUPER= +$aRespuesta['ICNUM_SUPER'];
            $VORNA_SUPER= htmlentities(utf8_encode($aRespuesta['VORNA_SUPER']));
            $NACHN_SUPER= htmlentities(utf8_encode($aRespuesta['NACHN_SUPER']));
            $nombre_supervisor=$VORNA_SUPER." ".$NACHN_SUPER;
            $USRID= htmlentities(utf8_encode($aRespuesta['USRID']));
            //echo $ICNUM;			
          $empleado[]= array('cedula'=>$ICNUM,'nombre_empleado'=>$nombre_empleado,'nombre'=>$VORNA,'apellido'=>$NACHN,'fecha_nacimiento'=>$GBDAT,'Fecha_ingreso'=>$GBDAT_ING,'estado_civil'=>$ECIVI,'sexo'=>$SEXO,'nacionalidad'=>$NATIO,'cargo'=>$PLANS,'area_cargo'=>$ORGEH,'unidad_trabajo'=>$WERKS,'complejo'=>$BTRTL,'status_empleado'=>$PERSG,'tipo_nomina'=>$PERSK,'centro_costo'=>$KOSTL,'direccion1'=>$DIRE1,'direccion2'=>$DIRE2,'telefono'=>$TELNR,'id_supervisor'=>$PERNR_SUPER,'ci_supervisor'=>$ICNUM_SUPER,'nom_sup'=>$VORNA_SUPER,'ape_sup'=>$NACHN_SUPER,'nombre_supervisor'=>$nombre_supervisor,'numero_personal'=>$PERNR,'correo_personal'=>$USRID);
		  //print_r ($empleado);
          $json_string = json_encode($empleado);
		 //echo $json_string;  
     print("<pre>".print_r(($empleado),true)."</pre>");         
      }
    }
}
