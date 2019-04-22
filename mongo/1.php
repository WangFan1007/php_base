<?php

// $client = new \MongoDB\Client("mongodb://192.168.8.222:27017");
require '../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://192.168.8.222:27017");
$collection = $client->php61->goods;
$result = $collection->find();

vardump($result);

