<?php

include_once('smarty/Smarty.class.php');


$smarty = new Smarty();
$smarty->assign('hello','你好');

$smarty->display('smarty.html');
