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

        $query = "SELECT * FROM medicine";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $current_date = date('Y-m-d');
                $current_date = strtotime($current_date);
                $expire_date = strtotime($row["expire"]);
                if ($current_date >= $expire_date) {
                    $data[] = $row;
                }

            }
        }

        return $data;
    }

    public function date_range($start_date, $end_date)
    {

        $data = [];

        if (isset($start_date) && isset($end_date)) {
            $query = "SELECT * FROM `medicine` WHERE `expire` > '$start_date' AND `expire` < '$end_date' ";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }

        }

        return $data;
    }
}