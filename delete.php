<?php
 include "connect.php";

// $pdo = require 'connect.php';

if(isset($_GET["id"])){

    $id = $_GET["id"];
    // echo $id;


    // $sql = "DELETE FROM 2_route_de_montaigu WHERE id_intervention=:id_inter";

    // $statement = $db->prepare($sql);
    // $statement->bindParam(':id_inter', $id, PDO::PARAM_INT);
    // $statement->execute();


    $statement = connect()->prepare('DELETE FROM 2_route_de_montaigu WHERE id_intervention=:id_inter');
    $statement->bindParam(':id_inter', $id, PDO::PARAM_INT);
    // $statement->execute();
    if ($statement->execute()) {
        echo 'row with id ' . $id . ' was deleted successfully.';
        header('Location: interface.php');
    }
}



// construct the delete statement
// $sql = 'DELETE FROM publishers
//         WHERE publisher_id = :publisher_id';

// prepare the statement for execution
// $statement = $pdo->prepare($sql);
// $statement->bindParam(':publisher_id', $publisher_id, PDO::PARAM_INT);

// execute the statement




?>