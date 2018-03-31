<?php
namespace WebServer;

use WebServer\Interfaces\HttpResponseInterface;

class HttpResponse implements HttpResponseInterface
{
    /**
     * @var
     */
    private $codeStatus;

    /**
     * @param $code
     */
    public function setHTTPCode($code)
    {
        $this->codeStatus = $code;
    }

    /**
     * @return $this
     */
    public function getHTTPCode()
    {
        http_response_code($this->codeStatus);

        return $this;
    }
}