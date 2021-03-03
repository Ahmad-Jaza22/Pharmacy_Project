<?php

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "pharmacy1";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (\Throwable $th) {
            //throw $th;
            echo "Connection error " . $th->getMessage();
        }
    }

    public function fetch()
    {
        $data = [];

        $query = "SELECT * FROM order_tbl";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

}