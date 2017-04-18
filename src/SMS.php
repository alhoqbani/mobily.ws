<?php

namespace Alhoqbani\MobilyWs;

class SMS
{
    private $numbers;
    private $msg;
    private $dataSend = 0;
    private $timeSend = 0;
    private $result;

    /**
     * Mobilyws constructor.
     * @internal param Client $client
     */
    public function __construct()
    {
    }

    public function msg($msg = null) {
        if(!$msg) return $this->msg;
        $this->msg = $msg;
        return $this;
    }

    public function to($to = null) {
        if(!$to) return $this->numbers;
        $this->numbers = $to;
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
        $params = [
            'numbers' => $this->numbers,
            'msg' => $this->msg,
            'dateSend' => $this->dataSend,
            'timeSend' => $this->timeSend,
        ];
        $handler = new Handler();
        $responseMessage = $handler->sendMessage($params);
        $this->result = $responseMessage;

        return $this;
    }

}
