<?php
/**
* Classe para enviar, receber e pesquisar SMS no papo Webservice
*
* https://www.paposms.com/webservice/1.0/
*/

class PapoSMS
{
    private $webservice = 'https://www.paposms.com/webservice/1.0/';
    private $user = '';
    private $pass = '';
    private $numbers = '';
    private $message = '';
    private $date = '';
    private $ids = '';
    private $data_start = '';
    private $data_end = '';
    private $lido = '';
    private $status = '';
    private $entregue = '';
    private $data_confirmacao = '';
    private $return_format = '';
    private $fields = array();

    public function __construct($user = '', $pass = '', $numbers = '', $message = '')
    {
        $this->setUser($user);
        $this->setPass($pass);
        $this->setNumbers($numbers);
        $this->setMessage($message);
    }

    public function setUser($value)
    {
        $this->user = $value;
    }

    public function setPass($value)
    {
        $this->pass = $value;
    }

    public function setNumbers($value)
    {
        $this->numbers = preg_replace("/[^0-9;]/", "", $value);
    }

    public function setMessage($value)
    {
        if ($value !== '')  {
            $value = substr($value, 0, 160);
        }
        $this->message = $value;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function setIds($value)
    {
        $this->ids = $value;
    }

    public function setDataStart($value)
    {
        $this->data_start = $value;
    }

    public function setDataEnd($value)
    {
        $this->data_end = $value;
    }

    public function setLido($value)
    {
        $this->lido = $value;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function setEntregue($value)
    {
        $this->entregue = $value;
    }

    public function setDataConfirmacao($value)
    {
        $this->data_confirmacao = $value;
    }

    public function setReturnFormat($value)
    {
        $this->return_format = $value;
    }

    public function send()
    {
        $url = $this->webservice.'send/';

        // Dados para o SMS
        $fields = $this->checkFields();

        // Organizar dados para URL
        $postvars = http_build_query($fields);

        // Pedido de envio de SMS ao WebService
        $result = file_get_contents($url."?".$postvars);

        return $result;
    }

    public function receive()
    {
        $url = $this->webservice.'get/';

        // Dados para o SMS
        $fields = $this->checkFields();

        // Organizar dados para URL
        $postvars = http_build_query($fields);

        // Pedido de dados ao WebService
        $result = file_get_contents($url."?".$postvars);

        return $result;
    }

    public function search()
    {
        $url = $this->webservice.'search/';

        // Dados para o SMS
        $fields = $this->checkFields();

        // Organizar dados para URL
        $postvars = http_build_query($fields);

        // Pedido de dados ao WebService
        $result = file_get_contents($url."?".$postvars);

        return $result;
    }

    private function checkFields()
    {
        // Apenas usa parametros com valor, senao gera erro
        $vars = array('user', 'pass', 'numbers', 'message', 'date', 'ids', 'data_start', 'data_end',
                        'lido', 'status', 'entregue', 'data_confirmacao', 'return_format'
                    );

        $final = array();
        foreach ($vars as $key => $value) {
            if ($this->$value !== '') {
                $final[$value] = $this->$value;
            }
        }
        return $final;
    }
}
