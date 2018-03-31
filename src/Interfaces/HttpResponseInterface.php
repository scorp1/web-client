<?php
namespace WebServer\Interfaces;


interface HttpResponseInterface
{
    public function setHTTPCode($code);

    public function getHTTPCode();
}
