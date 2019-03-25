<?php

include_once('smarty/Smarty.class.php');
$s = new Smarty();

$s->template_dir = 'templates/';
$s->assign('hello', '社会');
$s->display('smarty.html');