<?php

include_once dirname(__FILE__) . '/../DB/connect.php';

function login($data)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = sprintf("SELECT u.id
            FROM utente u
            WHERE u.email = '%s' AND u.password = '%s'", $conn->real_escape_string($data["email"]), $conn->real_escape_string(hash("sha256", $data["password"])));

     $response = $conn->query($sql);


     if ($response->num_rows > 0)
     {
        $_SESSION['user_id'] = $response->fetch_assoc()["id"];
        var_dump($_SESSION);
        header('Location: index.php?page=1');
     }
     else
     {
        return -1;
     }
}

?>
