<?php

$dsn = 'mysql:host=localhost;port=3306;dbname=my_database';
$user = 'root';
$pwd = '';
$drivers = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$pdo = new PDO($dsn, $user, $pwd, $drivers);
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
    $sql = 'SELECT * FROM studentwrea';
    try {
        $stmt = $pdo->query($sql);
        if ($stmt === false) { } else {
            echo '<pre>';
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            var_dump($res);
        }
        
        
    } catch (PDOException $e) {
        echo $e;
    }
}

readDB($pdo);

