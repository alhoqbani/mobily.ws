<?php

namespace Alhoqbani\MobilyWs;

use Alhoqbani\MobilyWs\Exceptions\ServiceIsNotAvaliableException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;


class Handler
{
    
    protected $availableBalance;
    protected $fullBalance;
    protected $errorMessages = [];
    private $applicationType;
    private $mobile;
    private $password;
    
    public function __construct(HandlerStack $handler = NULL)
    {
        $config = config('SMS');
        foreach ($config as $key => $value) {
            $this->{$key} = $value;
        }
        $this->handler = $handler;
    }
    
    public static function getClient($handler = null)
    {
        $client = new static();
        $client->handler = $handler;
        if($client->serviceIsActive()) {
            $client = $client->client();
        }
        
        return $client;
    }
    
    /**
     * Get the avaliable blanace on the account
     *
     * @return string
     * @throws \Exception
     */
    protected function getBalance()
    {
        if($this->setBalance()) {
            return (int) $this->availableBalance;
        };
        
        return $this->errorMessages['balance'];
    }
    
    protected function sendMessage($message)
    {
        $endpoint = 'msgSend';
        $params = [
            'mobile'          => $this->mobile,
            'password'        => $this->password,
            'applicationType' => $this->applicationType,
            'lang'            => $this->lang,
            'sender'          => $this->sender,
        ];
        $params = array_merge($params, $message);
        $response = $this->postRequest($endpoint, $params);
        $message = $this->getResponseMessage($endpoint, $response);
        $this->setBalance();
        
        return $message;
    }
    
    protected function deleteMessages($deleteKey)
    {
        $endpoint = 'deleteMsg';
        $params = [
            'mobile'    => $this->mobile,
            'password'  => $this->password,
            'deleteKey' => $deleteKey,
        ];
        $response = $this->postRequest($endpoint, $params);
        $message = $this->getResponseMessage($endpoint, $response);
        $this->setBalance();
        
        return $message;
        
        
    }
    
    
    /**
     * @return bool
     * @throws \Exception
     */
    private function setBalance()
    {
        $endpoint = 'balance';
        $params = [
            'mobile' => $this->mobile, 'password' => $this->password,
        ];
        $response = $this->postRequest($endpoint, $params);
        $bodySize = $response->getBody()->getSize();
        if($bodySize == 1) {
            $this->errorMessages['balance'] = $this->getResponseMessage($endpoint, $response);
            
            return false;
        }
        $balanceFromApi = (string) $response->getBody();
        $balance = explode("/", $balanceFromApi);
        if(count($balance) !== 2) {
            throw new \Exception("Balance could not be parsed.
                        <b> Api sent: </b>" . $balanceFromApi);
        }
        $this->fullBalance = (int) $balance[0];
        $this->availableBalance = (int) $balance[1];
        
        return true;
    }
    
    /**
     * @param $endpoint
     * @param $response
     *
     * @return string
     */
    private function getResponseMessage($endpoint, $response)
    {
        $code = (string) $response->getBody();
        // TODO Check if there s method == $endpoint. Else, return Body
        $message = ResponseMsg::{$endpoint}($code);
        
        return $message;
    }
    
    /**
     * Send the request to Api using Post method
     *
     * @param string $endpoint
     * @param array  $parmas
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function postRequest($endpoint, array $parmas)
    {
        $response = $this->client()->post($endpoint . '.php', ['form_params' => $parmas]);
        
        return $response;
    }
    
    private function serviceIsActive()
    {
        $body = $this->client()->get('sendStatus.php')->getBody();
        $status = (string) $body;
        
        if($status !== '1')
            throw new ServiceIsNotAvaliableException(
                "\n The Service is Not Avilable. returned Api status code : $status"
            );
        
        return ($status) ? true : false;
    }
    
    private function client()
    {
        // TODO Put this in a try catch block
        return new Client([
            'base_uri' => $this->base_uri,
//            'options'  => $this->options,
            // For testing to mock requests
            'handler'  => isset($this->handler) ?  $this->handler : NULL
        ]);
    }
}
