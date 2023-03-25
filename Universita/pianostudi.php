<?php

require_once('./connect.php');
header("Content-Type: application/json; charset=UTF-8");

class Piano_studi{

    protected $conn;
    protected $table_name = "`piano_di_studi`";
    function __construct($db) {
        $this->conn = $db;
    }
    function get_all_activity(){
        $sql = "SELECT p.codice, p.nome, p.CFU
        FROM formativa_didattica f
        RIGHT JOIN piano_di_studi p ON p.codice = f.didattica
        WHERE f.didattica IS NULL;";
        $result = $this->conn->query($sql);
    }
    function get_activity($codice){
        $sql = sprintf(
            "SELECT p.codice, p.nome, p.CFU
            FROM formativa_didattica f
            RIGHT JOIN piano_di_studi p ON p.codice = f.didattica
            WHERE f.didattica IS NULL AND p.codice = '%s';", $codice
        );
        $result = $this->conn->query($sql);
    }
    function add_activity($codice, $nome, $CFU){
        $sql = sprintf(
            "INSERT INTO piano_di_studi (codice, nome, cfu)
            VALUES('%s', '%s', '%s')",
            $codice,
            $nome,
            $CFU
        );
        $this->conn->query($sql);
    }
    function modify_activity($codice, $nome, $CFU){
        $sql = sprintf(
            "UPDATE piano_di_studi
            SET nome = '%s', cfu = %d
            WHERE codice = '%s'",
            $nome,
            $CFU,
            $codice
        );
        $this->conn->query($sql);
    }
    function delete_activity($codice){
        $sql = sprintf(
            "SELECT fd.didattica 
            FROM formativa_didattica fd 
            INNER JOIN piano_di_studi pd ON pd.codice = fd.formativa
            WHERE pd.codice = '%s'",
            $codice
        );
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            unset($sql);
            $sql = sprintf(
                "DELETE FROM formativa_didattica 
                WHERE formativa = '%s'",
                $codice
            );
            $this->conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                unset($sql);
                $sql = sprintf(
                    "DELETE FROM piano_di_studi 
                    WHERE codice = '%s'",
                    $row['didattica']
                );
                $this->conn->query($sql);
            }
        }

        unset($sql);
        $sql = sprintf(
            "DELETE FROM piano_di_studi 
            WHERE codice = '%s'",
            $codice
        );
        $this->conn->query($sql);
    }
}
    
?>