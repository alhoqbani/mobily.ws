<?php

namespace Alhoqbani\MobilyWs;

class SMS extends Handler
{
    private $numbers = [];
    private $msg;
    private $dataSend = 0;
    private $timeSend = 0;
    private $result;
    
    public function text($msg = null) {
        if(!$msg) return $this->msg;
        $this->msg = $msg;
        return $this;
    }

    public function to($to = null) {
        if(!$to) return $this->numbers;
        if (is_array($to)) {
            $this->numbers = array_merge($to, $this->numbers);
            return $this;
        }
        $this->numbers[] = $to;
        return $this;
    }

    public function when($dataSend= NULL, $timeSend = null ) {
        $this->dataSend = $dataSend;
        $this->timeSend = $timeSend;

        return $this;
    }

    public function result() {
        return $this->result;
    }

    public function send() {
        $this->numbers = implode(', ' , $this->numbers);
        $params = [
            'numbers' => $this->numbers,
            'msg' => $this->msg,
            'dateSend' => $this->dataSend,
            'timeSend' => $this->timeSend,
        ];

        $responseMessage = $this->sendMessage($params);
        $this->result = $responseMessage;

        return $this;
    }
    
    public function balance()
    {
        return $this->getBalance();
    }

}
