<?php

namespace Alhoqbani\MobilyWs;

use Alhoqbani\Mobilyws\Exception\ServiceIsNotAvaliableException;
use GuzzleHttp\Client;
use Alhoqbani\Mobilyws\ResponseMsg;


class Account
{
    public function __construct(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function forgetPassword()
    {
        $endpoint = 'forgetPassword';
        $params = [
                'mobile' => $this->mobile,
                'sendType' => $this->sendType,
            ];
        $response = $this->postRequest($endpoint, $params);

        return $this->getResponseMessage($endpoint, $response);
    }

    public function changePassword($newPassword) {
        $response = $this->client()->post('changePassword.php', [
            'form_params' => [
                'mobile' => $this->mobile,
                'oldPasswoed' => $this->oldPassword,
                'newPassword' => $newPassword,
            ]
        ]);

        return $this->getResponseMessage($endpoint = 'changePassword', $response);
    }

}
