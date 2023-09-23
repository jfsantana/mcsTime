<?php 

include '../../clases/consumoApi.class.php';
//definir los parametros array        
$parametrosIN=array (
        'updateReg' => 
        array (
          'codArea' => '001',
          'denArea' => 'Siaho',
          'nroCtrlAlcan' => 'CLALC_0100003473',
          'banfn' => '0100003473',
          'ernam' => 'POUSER',
          'evaluador' => 'EVAL_WEB',
          'fechaValidacion' => '2023-11-02',
          'estatusValidacion' => 'NO TRATADO',
        ),
        'Respuestas' => 
        array (
          'item' => 
          array (
            'quest01' => 'AP',
            'observ01' => '01_oa',
            'quest02' => 'RZ',
            'quest03' => 'RZ',
            'quest04' => 'RZ',
            'quest05' => 'RZ',
            'quest06' => 'RZ',
            'quest07' => 'RZ',
            'quest08' => 'RZ',
            'quest09' => 'RZ',
            'quest10' => 'RZ',
            'observ02' => '02_o',
            'observ03' => '03_o',
            'observ04' => '123',
            'observ05' => '4',
            'observ06' => '12',
            'observ07' => '234',
            'observ08' => '123',
            'observ09' => '1231',
            'observ10' => '12312',
          ),
        ),
);

//pasas el array a json
        $parametros = json_encode($parametrosIN);
      //print_r($parametros);die;
        $token = '';
        $URL = 'http://pqvmorsap03.pequiven.com:50000/RESTAdapter/Portal_SIAHO/updateRecordControlTabReqMM';
        $rs = API::POSTSAP($URL, $token, $parametros);
        $rs = API::JSON_TO_ARRAY($rs);


       // print("<pre>".print_r($rs,true)."</pre>");
       
        foreach($rs as $actualiza){
                //print_r($datos);
                print("<pre>".print_r($actualiza,true)."</pre>");
        }


       
       ?>