<?php

class Sql
{
    public $host;
    public $port;
    public $user;
    public $pass;
    public $dbname;
    public $charset;

    public function __construct(array $info = array())
    {
        $this->host = $info['host'] ?? 'localhost';
        $this->port = $info['port'] ?? '3306';
        $this->user = $info['user'] ?? 'root';
        $this->pass = $info['pass'] ?? 'root';
        $this->dbname = $info['dbname'] ?? 'my_database';
        $this->charset = $info['charset'] ?? 'utf8';

        $this->sql_connect();
        $this->sql_charset();
    }

    public $link;
    public function sql_connect()
    {
        $this->link = @new Mysqli($this->host,$this->user,$this->pass,$this->dbname,$this->port);
        if ($this->link->connect_error) {
            die('Connect Error(' . $this->link->connect_errno . ')' . $this->link->connect_error);
        }
    }

    public function sql_charset()
    {
        $sql = "set names {$this->charset}";
        $res = $this->link->query($sql);
        if (!$res) {
            die('Charset Error(' . $this->link->errno . ')' . $this->link->error);
        }
    }

    public function sql_exec($sql)
    {
        $res = $this->link->query($sql);
        if (!$res) {
            die('Charset Error(' . $this->link->errno . ')' . $this->link->error);
        }
        return $res;
    }

    public function sql_query($sql,$all = false)
    {
        $res = $this->link->query($sql);
        if (!$res) {
            die('Charset Error(' . $this->link->errno . ')' . $this->link->error);
        }
        
        if($all){
            return $res->fetch_all(MYSQLI_ASSOC);
        }else{
            return $res->fetch_assoc();
        }
    }
}

$s = new Sql(array('pass'=>'','charset'=>'utf8'));
// $s->sql_connect();
// var_dump($s);

//查询测试
$sql = 'select * from student';
$res = $s->sql_query($sql,true);

echo '<pre>';
var_dump($res);
