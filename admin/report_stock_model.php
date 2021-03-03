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
               $quantity = $row["quantity"];
                if ($quantity <= 0) {
                    $data[] = $row;
                }

            }
        }

        return $data;
    }

}