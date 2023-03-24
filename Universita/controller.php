<?php
require_once("base.php");
class Medicina extends BaseController
{
    function getArchieveActivity() 
    {
        $sql = "SELECT p.codice, p.nome, p.CFU
        FROM formativa_didattica f
        RIGHT JOIN piano_di_studi p ON p.codice = f.didattica
        WHERE f.didattica IS NULL;";
        $result = $this->conn->query($sql);
        $this->SendOutput($result, JSON_OK);
    }
    function getActivity($codice) 
    {
        $sql = sprintf(
            "SELECT p.codice, p.nome, p.CFU
            FROM formativa_didattica f
            RIGHT JOIN piano_di_studi p ON p.codice = f.didattica
            WHERE f.didattica IS NULL AND p.codice = '%s';",
            $codice
        );
        $result = $this->conn->query($sql);
        $this->SendOutput($result, JSON_OK);
    }
    function ReturnArchieveActivity()
    {
        $sql = "SELECT p.codice, p.nome, p.CFU
        FROM formativa_didattica f
        RIGHT JOIN piano_di_studi p ON p.codice = f.didattica
        WHERE f.didattica IS NULL;";
        $result = $this->conn->query($sql);
        return $result;
    }
    function getArchieveUnity()
    {
        $sql = "SELECT p1.codice AS 'a_codice', p1.nome AS 'a_nome', p2.codice AS 'u_codice', p2.nome AS 'u_nome' 
        FROM piano_di_studi p1
        INNER JOIN formativa_didattica fd ON p1.codice = fd.formativa
        INNER JOIN piano_di_studi p2 ON p2.codice = fd.didattica
        WHERE 1=1;";
        $result = $this->conn->query($sql);
        $this->SendOutput($result, JSON_OK);
    }
    function getUnities()
    {
        $sql = "SELECT p.codice, p.nome, p.CFU
            FROM formativa_didattica f
            LEFT JOIN piano_di_studi p ON p.codice = f.didattica
            WHERE 1=1;";
        $result = $this->conn->query($sql);
        $this->SendOutput($result, JSON_OK);
    }
    function getSingleUnity($codice_u)
    {
        $sql = sprintf("SELECT p.codice, p.nome, p.CFU
            FROM formativa_didattica f
            LEFT JOIN piano_di_studi p ON p.codice = f.didattica
            WHERE f.didattica = '%s';",
            $codice_u
        );
        $result = $this->conn->query($sql);
        $this->SendOutput($result, JSON_OK);
    }
    function deleteActivity($codice)
    {
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
    function deleteUnity($codice)
    {
        $sql = sprintf(
            "SELECT fd.formativa
            FROM formativa_didattica fd 
            INNER JOIN piano_di_studi pd ON pd.codice = fd.didattica
            WHERE pd.codice = '%s'",
            $codice
        );
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            unset($sql);
            $sql = sprintf(
                "DELETE FROM formativa_didattica 
                WHERE didattica = '%s'",
                $codice
            );
            $this->conn->query($sql);
        }

        unset($sql);
        $sql = sprintf(
            "DELETE FROM piano_di_studi 
            WHERE codice = '%s'",
            $codice
        );
        $this->conn->query($sql);
    }
    function AddActivity($codice, $nome, $CFU)
    {
        $sql = sprintf(
            "INSERT INTO piano_di_studi (codice, nome, cfu)
            VALUES('%s', '%s', '%s')",
            $codice,
            $nome,
            $CFU
        );
        $this->conn->query($sql);
    }
    function UpdateActivity($codice, $nome, $CFU)
    {
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
    function LinkUnity($attivita, $unita)
    {
        $sql = sprintf(
            "INSERT INTO formativa_didattica (formativa, didattica)
            VALUES('%s', '%s')",
            $attivita,
            $unita
        );
        $this->conn->query($sql);
    }
    function UnLinkUnity($unita)
    {
        $sql = sprintf(
            "DELETE FROM formativa_didattica WHERE didattica = '%s';",
            $unita
        );
        $this->conn->query($sql);
    }
}
?>