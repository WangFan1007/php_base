<?php

// $client = new \MongoDB\Client("mongodb://192.168.8.222:27017");
require '../vendor/autoload.php';

//mongodb://[username:password@]host1[:port1][,host2[:port2],...[,hostN[:portN]]][/[database][?options]]
// $client = new MongoDB\Client("mongodb://192.168.8.222:27017/php61");
$client = new MongoDB\Client("mongodb://192.168.8.222:27017/");
// $collection = $client->php61->goods;
// $result = $collection->find();
$collection = $client->php61->goods;
$cursor = $collection->find([],[]);

echo '<pre>';
foreach ($cursor as $document) {
    var_dump($document);
}

