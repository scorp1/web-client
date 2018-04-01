<?php
namespace WebServer\Interfaces;

interface HttpResponseInterface
{
    public function setHTTPCodeAndMessage($code, $message);

    public function getHTTPCodeAndMessage();
}
