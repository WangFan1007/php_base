<?php

namespace core;

use \PDO, \PDOStatement, \PDOException;

class DAO
{
    private $pdo;
    private $fetch_mode;

    private function dao_exception(PDOException $e)
    {
        // echo '<pre>';
        echo '错误文件:'. $e->getFile().'<br>';
        echo '错误行:'. $e->getLine().'<br>';
        echo '错误信息:'. $e->getMessage().'<br>';
        die();
    }

    public function __construct($info = array(), $drivers = array())
    {
        $type = $info['type'] ?? 'mysql';
        $host = $info['host'] ?? 'localhost';
        $port = $info['port'] ?? '3306';
        $user = $info['user'] ?? 'root';
        $pass = $info['pass'] ?? '';
        $dbname = $info['dbname'] ?? 'my_database';
        $charset = $info['charset'] ?? 'utf8';
        $this->fetch_mode = $info['fetch_mode'] ?? PDO::FETCH_ASSOC;


        $drivers[PDO::ATTR_ERRMODE] = $drivers[PDO::ATTR_ERRMODE] ?? PDO::ERRMODE_EXCEPTION;

        try{
            $this->pdo = new PDO($type . ':host=' . $host . ';port='.$port.';dbname='.$dbname,$user,$pass,$drivers);
        }catch(PDOException $e){
            $this->dao_exception($e);
        }

        try {
            $this->pdo->exec('set names '.$charset);
        } catch (PDOException $e) {
            $this->dao_exception($e);
        }
    }

    public function dao_exec($sql)
    {
        try {
            return $this->pdo->exec($sql);
        } catch (PDOException $e) {
            $this->dao_exception($e);
        }
    }

    public function dao_insert_id()
    {
        return $this->pdo->lastInsertId();
    }

    public function dao_query($sql, $only = true)
    {
        try {
            $stmt = $this->pdo->query($sql);
            $stmt->setFetchMode($this->fetch_mode);
            $res = false;
            if ($only) {
                $res = $stmt->fetch();
            }else{
                $res = $stmt->fetchAll();
            }

            if (!$res) {
                throw new PDOException("当前查询无数据");
                
            }else{
                return $res;
            }
            

        } catch (PDOException $e) {
            $this->dao_exception($e);
        }
    }
}

$dao = new Dao(array('charset'=>'utf8'));
// var_dump($dao);
$res = $dao->dao_query('select * from student where id = 1',false);
echo '<pre>';
var_dump($res);
