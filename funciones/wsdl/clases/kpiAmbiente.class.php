<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE EMPLEADOS 
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 * 
 * 'clases/empleados.class.php';
 *************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';


//hereda de la clase conexion
class kpiAmbiente extends conexion {

    //Tabla Principal de Empleados
    private $tabla = "dm_complejo";

    //Activaciond e token
  //  private $token = '';//b43bbfc8bcf8625eed413d91186e8534

    public function listaKPI(){


        $KpiResult = array();

        $KpiResult = [
            "area" => "Ambiente",
            "kpi" =>    [
                            [
                                "id" => 1,
                                "nombre" => "Manejo y la disposición final de desechos peligrosos",
                                "tipo" => "charLine",
                                "datos" => [
                                            "labels"=> ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                                            "dataset"=> [
                                                [
                                                "label"=> 'Digital Goods',
                                                "data"=> [28, 48, 40, 19, 86, 27, 90]           
                                                ],
                                                [
                                                "label"=> 'Electronics',
                                                "data"=> [65, 59, 80, 81, 56, 55, 40]
                                                ]
                                            ]
                                            ]
                            ]   ,
                            [
                                "id" => 2,
                                "nombre" => "Indicadores de Situación Ambiental (ISAs)",
                                "tipo" => "charLine",
                                "datos" => [
                                    "labels"=> ['AMC', 'CJAA', 'CPHC'],
                                    "dataset"=> [
                                        [
                                        "label"=>'AIM',
                                        "data"=> [28, 48, 40, 19, 86, 27, 90],
                                        ],
                                        [
                                        "label"=>'EFL',
                                        "data"=> [65, 59, 80, 81, 56, 55, 40],
                                        ]
                                    ]
                                ]
                            ] ,
                            [
                                "id" => 3,
                                "nombre" => "Indicadores de Situación Ambiental (ISAs)",
                                "tipo" => "charLine",
                                "datos" => [
                                    "labels"=> ['1erTrim', '2do Trim', '3er Trim', '4to Trim'],
                                    "dataset"=> [
                                        [
                                        "label"=>'Este',
                                        "data"=> [28, 48, 40, 19, 86, 27, 90],
                                        ],
                                        [
                                        "label"=>'Oeste',
                                        "data"=> [65, 59, 80, 81, 56, 55, 40],
                                        ],
                                        [
                                        "label"=>'Norte',
                                        "data"=> [65, 59, 80, 81, 56, 55, 40],
                                        ]
                                    ]
                                ]
                            ] ,



                        ]
            ,
        ];




        /* COMPLEJO ES LO  MISMO QUE CENTRO DE EMPLAZAMIENTO
        salesChartData = {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
        [
                "foo" => "bar",
                "bar" => "foo",
            ]


        $query = "SELECT dm_complejo.id_complejo, dm_complejo.siglas_complejo, FROM dm_complejo LEFT JOIN dm_complejo_custodio ON dm_complejo_custodio.complejoId = dm_complejo.id_complejo ORDER BY 3";
        $datos = parent::ObtenerDatos($query);
        */
        return ($KpiResult);
    }

    public function datoComplejo($complejoid){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_complejo.id_complejo,
        dm_complejo.siglas_complejo,
        dm_complejo.id_sap,
        dm_complejo.nombre_complejo,
        dm_complejo.ciudad_reporte,
        dm_complejo.ciudad_origen,
        dm_complejo.dato_extra,
        dm_complejo.fecha_crea,
        dm_complejo.fecha_mod,
        dm_complejo.user_crea,
        dm_complejo.user_mod,
        dm_complejo_custodio.custodioNumPersonal as 'numPersonalCustodio',
        dm_complejo_custodio.nombre as 'nombreCustodio'
        FROM
            dm_complejo
            left JOIN dm_complejo_custodio ON dm_complejo.id_complejo = dm_complejo_custodio.complejoId
        WHERE
        dm_complejo.id_complejo = $complejoid";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    public function listaGerencia($complejoid){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_gerencia.gerencia_id,
        dm_gerencia.nombre,
        dm_gerencia.localidad,
        dm_gerencia.centro_costo,
        dm_gerencia.cod_proceso,
        dm_gerencia.cod_seip,
        dm_gerencia.nivelCod_seip,
        dm_gerencia_custodio_copy.custodioNumPersonal as 'numPersonalCustodio',
        dm_gerencia_custodio_copy.nombre as 'nombreCustorio'
        FROM    dm_gerencia
                left JOIN dm_gerencia_custodio_copy ON dm_gerencia_custodio_copy.gerenciaId = dm_gerencia.gerencia_id
        WHERE
        dm_gerencia.complejoid = $complejoid ORDER BY 2";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    public function listaPlanta($complejoid){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_planta.plantaId,
        dm_planta.complejoId,
        dm_planta.complejoIDSAP,
        dm_planta.plantaIdSAP,
        dm_planta.nombre,
        dm_planta.descripcion,
        dm_planta.fecha,
        dm_planta_custodio.custodioNumPersonal as 'numPersonalCustodio',
        dm_planta_custodio.nombre as 'nombreCustodio'
        FROM
            dm_planta
            LEFT JOIN dm_planta_custodio ON dm_planta.plantaId = dm_planta_custodio.plantaId
        WHERE
        dm_planta.complejoId= $complejoid ORDER BY 5";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }


    public function datoEquipos($complejoid,$plantaId){
        // COMPLEJO ES LO  MISMO QUE gerencias
        $query = "SELECT
        dm_equipos.equipoId,
        dm_equipos.complejoId,
        dm_equipos.localidad,
        dm_equipos.plantaId,
        dm_equipos.plantaIdSap,
        dm_equipos.EquipoCodSap,
        dm_equipos.nombre,
        dm_equipos.descripcion,
        dm_equipos.custorio
        FROM
        dm_equipos
        WHERE
        dm_equipos.complejoId=$complejoid
        and dm_equipos.plantaId = $plantaId ORDER BY 7";

        $datos = parent::ObtenerDatos($query);
        return ($datos);
    }

    





}


?>