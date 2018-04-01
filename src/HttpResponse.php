<?php
namespace WebServer;

use WebServer\Interfaces\HttpResponseInterface;

class HttpResponse implements HttpResponseInterface
{
    /**
     * @var array
     */
    private $arrayCodeStatus = [];

    /**
     * @param $code
     * @param $message
     */
    public function setHTTPCodeAndMessage($code, $message)
    {
        $this->arrayCodeStatus[code] = $code;
        $this->arrayCodeStatus[message] = $message;
    }

    /**
     * @return $this
     */
    public function getHTTPCodeAndMessage()
    {
        http_response_code($this->arrayCodeStatus[code]);
        print_r($this->arrayCodeStatus[message]);

        return $this;
    }

}