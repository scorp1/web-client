<?php
namespace WebServer\Service;

use Beloplotov\Balance;

class BracketFactory
{
    /**
     * @param $string
     * @return array|bool
     */
    public function setBracket($string)
    {
        $checkBracket = new \Beloplotov\Balance();

        return $checkBracket->balanceBrackets($string);
    }

}