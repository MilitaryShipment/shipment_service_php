<?php

require_once __DIR__ . '/api.php';
require_once __DIR__ . '/models/shipment.php';

class EndPoint extends API{

    public function __construct($request,$origin)
    {
        parent::__construct($request);
    }
    protected function example(){
        return array("endPoint"=>$this->endpoint,"verb"=>$this->verb,"args"=>$this->args,"request"=>$this->request);
    }
    protected function shipment(){
        $data = null;
        if(!isset($this->verb) && !isset($this->args[0]) && $this->method == 'POST'){ //create
            $data = new \Movestar\Shipment();
            $data->setFields($this->request)->create();
        }elseif(!isset($this->verb) && !isset($this->args[0]) && $this->method == 'GET'){ //get all
            $data = '';
        }elseif(!isset($this->verb) &&(int)$this->args[0] && $this->method == 'GET'){ //get by id
            $data = new \Movestar\Shipment($this->args[0]);
        }elseif((int)$this->args[0] && $this->method == 'PUT'){ //update by id
            $data = new \Movestar\Shipment($this->args[0]);
            $data->setFields($this->file)->update();
        }elseif(isset($this->verb)){
            $data = $this->_parseVerb();
        }else{
            throw new \Exception('Malformed Request');
        }
        return $data;
    }
}