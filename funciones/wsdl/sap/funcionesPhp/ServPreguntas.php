<?php 

include '../../clases/consumoApi.class.php';
//definir los parametros array        
$parametrosIN['codArea'] = '002';

//pasas el array a jsong
        $parametros = json_encode($parametrosIN);
      //print_r($parametros);die;
        $token = '';
        $URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/getRecordsQuestTabReqMM';
        $rs = API::POSTSAP($URL, $token, $parametros);
        $rs = API::JSON_TO_ARRAY($rs);


        print("<pre>".print_r($rs,true)."</pre>");die;        
        foreach($rs['ZFM_GET_RECORDS_QUEST_TAB.Response']['EX_QUEST_TAB']['item'] as $datos){
                //print_r($datos);
               // print("<pre>".print_r($datos['TEXTO']['item'],true)."</pre>");
        }


       
       ?>