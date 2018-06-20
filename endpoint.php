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
        if($this->method == 'GET' && isset($this->verb)){
            $data = new \Movestar\Shipment($this->verb);
        }elseif($this->method == 'GET' && !isset($this->verb)){
            $data = \Movestar\Shipment::get('Deleted',0);
        }elseif($this->method == 'POST' && !isset($this->verb)){
            $data = 'New Shipments will be provided by movestar. You cannot post here';
        }else{
            throw new \Exception('Unsupported request');
        }
        return $data;
    }
}