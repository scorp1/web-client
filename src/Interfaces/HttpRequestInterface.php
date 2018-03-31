<?php
namespace WebServer\Interfaces;


interface HttpRequestInterface
{
    /**
     * @return mixed
     */
    public function isPost();

    /**
     * @return mixed
     */
    public function getValue();
}