<?php


include('Loader.php'); // 引入加载器
spl_autoload_register('Loader::autoload'); // 注册自动加载

use \test1\Test1;
use \test2\Test2;


$t1 = new Test1();
$t2 = new Test2();

$t1->display();