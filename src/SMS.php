<?php

namespace Alhoqbani\MobilyWs;

class SMS extends Handler
{
    
    private $deleteKey;
    private $numbers = [];
    private $msg;
    private $dataSend = 0;
    private $timeSend = 0;
    private $results = [];
    private $remove_duplicate;
    
    public function text($msg = NULL)
    {
        if( ! $msg)
            return $this->msg;
        $this->msg = $msg;
        
        return $this;
    }
    
    public function to($to = NULL)
    {
        if( ! $to)
            return $this->numbers;
        if(is_array($to)) {
            $this->numbers = array_merge($to, $this->numbers);
            
            return $this;
        }
        $this->numbers[] = $to;
        
        return $this;
    }
    
    public function removeDuplicate() {
        $this->remove_duplicate = true;
        return $this;
    }
    
    public function when($dataSend = NULL, $timeSend = NULL)
    {
        $this->dataSend = $dataSend;
        $this->timeSend = $timeSend;
        $this->setDeleteKey();
        
        return $this;
    }
    
    public function result()
    {
        return $this->results['api'];
    }
    
    public function send()
    {
        if ($this->remove_duplicate) {
            $this->numbers = array_unique($this->numbers);
        }
        $this->results['totalNumbers'] = count($this->numbers);
        $this->numbers = implode(', ', $this->numbers);
        
        $params = [
            'numbers'   => $this->numbers,
            'msg'       => $this->msg,
            'dateSend'  => $this->dataSend,
            'timeSend'  => $this->timeSend,
            'deleteKey' => $this->deleteKey,
            'notRepeat' => $this->remove_duplicate,
        ];
        
        $responseMessage = $this->sendMessage($params);
        $this->results['api'] = $responseMessage;
        $this->results['newBalance'] = $this->availableBalance;
        if($this->debug) {
            var_dump($this);
        }
        
        return $this->results;
    }
    
    public function balance()
    {
        return $this->getBalance();
    }
    
    protected function setDeleteKey()
    {
        $this->deleteKey = mt_rand(1000, 9999);
        $this->results['deleteKey'] = $this->deleteKey;
    }
    
}
