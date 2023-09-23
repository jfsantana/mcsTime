<?php 

require '../../clases/consumoApi.class.php';
//definir los parametros array        
$parametrosIN =  array (
   "rangCodArea" => 
   array (
     "codAreaInic" => "000",
     "codAreaFin" => "",
   ),
   "rangSolp" => 
   array (
     "banfnInic" => "",
     "banfnFin" => "",
   ),
   "rangNroAlc" => 
   array (
     "nroAlcInic" => "",
     "nroAlcFin" => "",
   ),
   "rangFechas" => 
   array (
     "fechaInic" => "2023-01-01",
     "fechaFin" => "2023-12-31",
   ),
);


 //print("<pre>".print_r($parametrosIN,true)."</pre>"); die;
//pasas el array a json
        $parametros = json_encode($parametrosIN);
//echo $parametros; die;
        //print_r($parametros);die;
        $token = '';
        $URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordControlTabReqMM';
        $rs = API::POSTSAP($URL, $token, $parametros);
        $rs = API::JSON_TO_ARRAY($rs);
        


       //print("<pre>".print_r($rs,true)."</pre>");die;
       
        foreach($rs['ZFM_GET_RECORDS_CONTROL_TAB.Response'] as $datos){
                //print_r($datos);
                print("<pre>".print_r($datos,true)."</pre>");
        }


       
       ?>