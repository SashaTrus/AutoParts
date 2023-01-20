<?php

class workwithDB
{
    private static $instance;
    public $user = "root";
    public $pass = "root";
    public $db = "autoparts";
    public $host = "localhost";
    public $port = 3306;
    public static function getInstance(){
        if (self::$instance==null){
            self::$instance=new workwithDB();
        }
        return self::$instance;
    }
    public function __construct()
    {
        mysqli_connect($this->host, $this->user, $this->pass, $this->db) or die ('We can\'t access to DB');
    }

    public function select($queryselect){
        $sql_queryselect = "SELECT";
        $sql_queryselect .= $queryselect;
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        $query= mysqli_query($mysqli,$sql_queryselect);
        $row=array();
        if(!empty($query)){
            $row = mysqli_fetch_row($query);
            return $row;
        }
        return null;
    }
    public function insert($queryinsert){
        $sql_queryinsert = "INSERT";
        $sql_queryinsert .= $queryinsert;
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        mysqli_query($mysqli, $sql_queryinsert);
    }
    public function update($queryupdate){
        $sql_queryupdate = "UPDATE";
        $sql_queryupdate .= $queryupdate;
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        mysqli_query($mysqli, $sql_queryupdate);
    }
    public function delete($querydelete){
        $sql_querydelete = "DELETE";
        $sql_querydelete .= $querydelete;
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        mysqli_query($mysqli, $sql_querydelete);
    }
    public function __destruct()
    {
        mysqli_close();
        // TODO: Implement __destruct() method.
    }
}