<?php
namespace DB;
class Database
{
    private static $isInstance;
    private $conn;
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'file_upload';

    private function __construct(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    }

     public function getConn()
    {
        return $this->conn;
    }

    public static function instance(){
        if (is_null(self::$isInstance)){
            return self::$isInstance = new Database();
        }
        return self::$isInstance;
    }

    public function query($query)
    {
        $qry = mysqli_query($this->conn, $query);
//        $qry = mysqli_fetch_assoc($qry);

//        $rows = [];
//        foreach($qry as $k => $v){
//            $rows[$k] = $v;
//        }
//        return $rows;
        return $qry;
    }


}
