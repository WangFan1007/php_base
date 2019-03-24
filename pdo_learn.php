<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=my_database','root','',[]);
$pdo->exec('set names utf8');
// var_dump($pdo);
// $sql = 'delete from student limit = 1';
function writeDB($pdo)
{
    $sql = 'DELETE FROM student ORDER BY id DESC LIMIT 1;';
    $res = $pdo->exec($sql);
    if ($res === false) {
        print_r($pdo->errorInfo());
        exit;
    }
    var_dump($res);
}

function readDB($pdo)
{
    $sql = 'SELECT * FROM student';
    $res = $pdo->query($sql);
    if ($res === false) {
        print_r($pdo->errorInfo());
        exit;
    }else{
        // var_dump($res);
        $stmt = $res;
        // $res1 = $stmt->fetch(PDO::FETCH_ASSOC);
        $res2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>';
        var_dump($res2);
        
    }
}

readDB($pdo);