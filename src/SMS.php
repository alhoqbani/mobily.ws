<?php

namespace Alhoqbani\MobilyWs;

class SMS extends Handler
{
    private $deleteKey;
    private $numbers = [];
    private $msg;
    private $dataSend = 0;
    private $timeSend = 0;
    private $results= [];
    
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
        $this->setDeleteKey();

        return $this;
    }

    public function result() {
        return $this->results['api'];
    }

    public function send() {
        $this->numbers = implode(', ' , $this->numbers);

        $params = [
            'numbers' => $this->numbers,
            'msg' => $this->msg,
            'dateSend' => $this->dataSend,
            'timeSend' => $this->timeSend,
            'deleteKey' => $this->deleteKey
        ];

        $responseMessage = $this->sendMessage($params);
        $this->results['api'] = $responseMessage;
        $this->results['newBalance'] = $this->availableBalance;
        if ($this->debug) { var_dump($this); }
        
        return $this->results;
    }
    
    public function balance()
    {
        return $this->getBalance();
    }
    
    protected function setDeleteKey() {
        $this->deleteKey = mt_rand(1000, 9999);
        $this->results['deleteKey'] = $this->deleteKey;
    }

}
