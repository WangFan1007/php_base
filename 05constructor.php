<?php

class Saler{
    public $count;
    public function __construct($count)
    {
        echo __CLASS__;
        $this->count = $count;
    }
}

$s1 = new Saler(12);

var_dump($s1);


