<?php
include "connect.php";
$id = $_GET["id"];


if(isset($_POST["update"])){
    $date = $_POST["give_date"];
    $detail = $_POST["give_detail"];
    $etage = $_POST["give_etage"];
    $state = "pas complet";
    echo $date;
    echo $detail;
    echo $etage;
    echo $id;

    $statement = connect()->prepare('UPDATE 2_route_de_montaigu SET date = :date, detail=:detail, etage=:etage WHERE id_intervention=:id_inter');
    $statement->bindParam(':id_inter', $id, PDO::PARAM_INT);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':etage', $etage, PDO::PARAM_INT);
    $statement->bindParam(':detail', $detail, PDO::PARAM_STR);
    $statement->execute();
    header('Location: interface.php');

    die("im dead");
  
}

if(isset($_GET["id"])){

    // $id = $_GET["id"];
    // ECHO $id;

    $statement = connect()->prepare('SELECT * FROM 2_route_de_montaigu WHERE id_intervention=:id_inter');
    $statement->bindParam(':id_inter', $id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    // print_r($result);
    $get_case = $result["id_intervention"];
    $get_date = $result["date"];
    $get_detail = $result["detail"];
    $get_etage = $result["etage"];
    $get_state = $result["state"];
    // echo $get_case;
    // echo $get_date;
    // echo $get_detail;
    // echo $get_etage;
    // echo $get_state;
    // if ($statement->execute()) {
    //     echo 'row with id ' . $id . ' was deleted successfully.';
    //     header('Location: interface.php');
    // }
}
// if(isset($_GET["etat"]) && $get_state=="pas complet" ){
//     echo "love";
//     $get_state = "complet";
//     echo $get_state;
// }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Modify</title>
</head>
<body >

<main>
    <form method="post">
        <h1>Modifier cette probleme</h1>
        <div>
            <label for="username">date:</label>
            <input type="date" name="give_date" <?php echo "value= $get_date"; ?> >
        </div>
        <div>
            <label for="fullname">details:</label>
            <textarea type="text" name="give_detail" id="enter-text" cols="30" rows="10" placeholder="entrer les details ici.." value="">
                <?php echo "$get_detail"; ?></textarea>
        </div>

        <div>
            <label for="password">etage:</label>
            <input type="number" name="give_etage" min="0" max="10"<?php echo "value= $get_etage"; ?> >
        </div>

        <section>
        <button type="submit" name="update" value="add">update</button>
        <div class="order">
        <label >Etat: <?php echo "$get_state"; ?></label>
        <!-- <button type="submit" name="etat" value="add">Etat: <?php echo "$get_state"; ?></button> -->
        </div>
        
        </section>
    </form>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Suggestions Rapides</button>
        <div id="myDropdown" class="dropdown-content">
            <!-- <a href="#sr-1">changement ampoule</a> -->
            <button class="menu-btn" onclick="addText(1)">changement ampoule</button>
            <button class="menu-btn" onclick="addText(2)">remplacement serrure</button>
            <button class="menu-btn" onclick="addText(3)">rituel satanique</button>
            <!-- <a href="#sr-2">remplacement serrure</a> -->
            <!-- <a href="#sr-3">rituel satanique</a> -->
        </div>
    </div>


</main>
<script src="app.js"></script>
</body>
</html>