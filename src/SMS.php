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
    private $notRepeat;
    
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
    
    public function removeDuplicate()
    {
        $this->notRepeat = true;
        
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
        return implode(', ', $this->results);
    }
    
    public function domain($domain)
    {
        $this->domainName = $domain;
        
        return $this;
    }
    
    public function send()
    {
        if($this->notRepeat) {
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
            'notRepeat' => $this->notRepeat,
            'domain'    => $this->domainName,
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
    
    public static function deleteSMS($deleteKey)
    {
        $sms = new static();
        $sms->deleteKey = $deleteKey;
        $sms->delete();
        
        return $sms->results;
    }
    
    public function delete($deleteKey)
    {
        $responseMessage = $this->deleteMessages($deleteKey);
        $this->results['api'] = $responseMessage;
        $this->results['newBalance'] = $this->availableBalance;
        
        return $this;
    }
    
    protected function setDeleteKey()
    {
        $this->deleteKey = substr(md5(mt_rand(1000, 9999)), 0, 7);
        $this->results['deleteKey'] = $this->deleteKey;
    }
    
}
