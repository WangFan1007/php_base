<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=my_database','root','',[]);
$pdo->exec('set names utf8');
// var_dump($pdo);
// $sql = 'delete from student limit = 1';

$pre_sql = 'SELECT * FROM student WHERE id = :id';
$stmt = $pdo->prepare($pre_sql);
$stmt->bindValue(':id',1);
$stmt->execute();

$res = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($res);