<?php
include "connect.php";
$id = $_GET["id"];

echo $id;

if(isset($_GET["id"])){

    // $id = $_GET["id"];
    // ECHO $id;

    $statement = connect()->prepare('SELECT * FROM 2_route_de_montaigu WHERE id_intervention=:find');
    $statement->bindParam(':find', $id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    // print_r($result);
    $get_state = $result["state"];
    // echo $get_state;

    if($get_state=="pas complet"){
        $get_state="complet!";
        $statement = connect()->prepare('UPDATE 2_route_de_montaigu SET state = :state WHERE id_intervention=:id_inter');
    $statement->bindParam(':id_inter', $id, PDO::PARAM_INT);
    $statement->bindParam(':state', $get_state, PDO::PARAM_STR);
    $statement->execute();
    header('Location: interface.php');
    die("im dead");
    }
    if($get_state=="complet!"){
        $get_state="pas complet";
        $statement = connect()->prepare('UPDATE 2_route_de_montaigu SET state = :state WHERE id_intervention=:id_inter');
    $statement->bindParam(':id_inter', $id, PDO::PARAM_INT);
    $statement->bindParam(':state', $get_state, PDO::PARAM_STR);
    $statement->execute();
    header('Location: interface.php');
    }


}



?>