<?php
namespace DB;
require 'Database.php';

class Query
{

    public $connection;

    public function __construct()
    {
        $this->connection = Database::instance();
    }

    public function getAllFrom($table)
    {
        $qry = $this->connection->query("SELECT distinct * FROM $table ORDER BY id DESC");

        return $qry;
    }

    public function getById($table, $id)
    {
        $qry = $this->connection->query("SELECT * FROM $table WHERE id = $id");

        return $qry;
    }

    public function storeData($table, $nama, $lokasi)
    {
        $qry = $this->connection->query("INSERT INTO $table (nama, lokasi) VALUES ('$nama','$lokasi')");

        return $qry;
    }

    public function deleteById($table, $id)
    {
        $qry = $this->connection->query("DELETE FROM $table WHERE id = $id");

        return $qry;
    }
}