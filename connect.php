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
        
        catch (Exception $e) {
            die("Error connecting to database $e\n\n");
        }
        return $this->conn;
    }
}
?>