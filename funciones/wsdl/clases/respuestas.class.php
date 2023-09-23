<?php
/*
    200 OK
    201 Created (Creado)
    304 Not Modified (No modificado)
    400 Bad Request (Error de consulta)
    401 Unauthorized (No autorizado)
    403 Forbidden (Prohibido)
    404 Not Found (No encontrado)
    422 (Unprocessable Entity (Entidad no procesable)
    500 Internal Server Error (Error Interno de Servidor)
*/
class respuestas
{
    public $response = [
        'status' => 'ok',
        'result' => [],
    ];

    public function error_405()
    {
        $this->response['status'] = 'error';
        $this->response['result'] = [
            'error_id' => '405',
            'error_msg' => 'Metodo no permitido',
        ];

        return $this->response;
    }

    public function error_200($valor = 'Datos incorrectos')
    {
        $this->response['status'] = 'error';
        $this->response['result'] = [
            'error_id' => '200',
            'error_msg' => $valor,
        ];

        return $this->response;
    }

    public function error_201($valor = 'Datos incorrectos')
    {
        $this->response['status'] = 'OK';
        $this->response['result'] = [
            'id' => '200',
            'MSG' => $valor,
        ];

        return $this->response;
    }

    public function error_400()
    {
        $this->response['status'] = 'error';
        $this->response['result'] = [
            'error_id' => '400',
            'error_msg' => 'Datos enviados incompletos o con formato incorrecto',
        ];

        return $this->response;
    }

    public function error_500($valor = 'Error Interno del Servidor')
    {
        $this->response['status'] = 'error';
        $this->response['result'] = [
            'error_id' => '500',
            'error_msg' => $valor,
        ];

        return $this->response;
    }

    public function error_401($valor = 'Token NO autorizado')
    {
        $this->response['status'] = 'error';
        $this->response['result'] = [
            'error_id' => '401',
            'error_msg' => $valor,
        ];

        return $this->response;
    }
}
