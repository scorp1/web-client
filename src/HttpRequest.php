<?php
namespace WebServer;


class HttpRequest
{

    /**
     * @return bool
     */
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getValue($key)
    {
        return $_POST[$key];
    }

}