<?php
include "connect.php";

if(isset($_POST["ajoute"])){

    $date = $_POST["give_date"];
    $detail = $_POST["give_detail"];
    $etage = $_POST["give_etage"];
    $state = "pas complet";

    // $sql = "INSERT INTO `2 route de montaigu`(`date`, `detail`, `etage`, `state`) VALUES ('$date','$detail','$etage','$state')";

    $ajouter = connect()->prepare('INSERT INTO 2_route_de_montaigu (date, detail, etage, state ) VALUES (:date, :detail, :etage, :state)');
    $ajouter->bindParam(':date', $date, PDO::PARAM_STR);
    $ajouter->bindParam(':detail', $detail,  PDO::PARAM_STR);
    $ajouter->bindParam(':etage', $etage,  PDO::PARAM_STR);
    $ajouter->bindParam(':state', $state,  PDO::PARAM_STR);
    $estceok = $ajouter->execute();
    $ajouter->debugDumpParams();
    if($estceok){
        echo "tres bien mon petit karolos" ;
        header('Location: interface.php');
    } else {
        echo 'Error during registration';
    }
}


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Register</title>
</head>
<body>

<main>
    <form method="post">
        <h1>ajouter un probleme</h1>
        <div>
            <label for="username">date:</label>
            <input type="date" name="give_date">
        </div>
        <div>
            <label for="fullname">details: </label>
            <textarea type="text" name="give_detail" id="enter-text" cols="30" rows="10" placeholder="entrer les details ici.."></textarea>
        </div>

        <div>
            <label for="password">etage:</label>
            <input type="number" name="give_etage" min="0" max="10" >
        </div>

        <section>
        <button type="submit" name="ajoute" value="add">ajouter</button>
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