<?php
class Database
{
    private $server = "localhost";
    private $user = "root";
    private $db = "medicina";
    private $port = "3306";
    public $conn;

    public function connect()

    {
        try {
            $this->conn = new mysqli($this->server, $this->user,  $this->db, $this->port);
        }
        
        catch (Exception $ex) {
            die("Error connecting to database $ex\n\n");
        }
        return $this->conn;
    }
}
?>