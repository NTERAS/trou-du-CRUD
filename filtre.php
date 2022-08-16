<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>interface</title>
</head>
<body>
<main>
    <div>
        <button>
            <a class="white" href="interface.php">Tout</a>
        </button>
        

        <table>
            <thead>
            <tr><form method="post">
            <th><button name="action" value="date">par date</button></th>
                <th><button name="action" value="detail">par detail</button></th>
                <th><button name="action" value="etage">par etage</button></th>
                <th><button name="action" value="etat">par etat</button></th>
            </form>
                
            </tr>
        </thead>
        <tbody>
            <?php

// ---------------------------------------------------------------------------------------------------------------------------
// echo "before love";
if(isset($_POST['action']) && $_POST['action']=="date"){
    // echo "love";
    $findUser = connect()->prepare('SELECT DISTINCT date FROM 2_route_de_montaigu');
    $findUser->execute();
    $count = $findUser->rowCount();
    // echo $count;

    for($i=0; $i< $count; $i++){
        $result = $findUser->fetch(PDO::FETCH_ASSOC);
    // print_r($result);
    // print("\n");
    $get_date = $result["date"];
    // echo "$get_date";
    echo "<tr>
    <td><a href=\"filtre_result.php?word=date&id=$get_date\">".$get_date."</a></td>
    
    </tr>";
    
    }
}
if(isset($_POST['action']) && $_POST['action']=="detail"){

    $findUser = connect()->prepare('SELECT DISTINCT detail FROM 2_route_de_montaigu');
    $findUser->execute();
    $count = $findUser->rowCount();

    for($i=0; $i< $count; $i++){
        $result = $findUser->fetch(PDO::FETCH_ASSOC);

    $get_detail = $result["detail"];

    echo "<tr><td></td>
    <td><a href=\"filtre_result.php?word=detail&id=$get_detail\">".$get_detail."</a></td>
    
    </tr>";
    }
}
if(isset($_POST['action']) && $_POST['action']=="etage"){

    $findUser = connect()->prepare('SELECT DISTINCT etage FROM 2_route_de_montaigu');
    $findUser->execute();
    $count = $findUser->rowCount();

    for($i=0; $i< $count; $i++){
        $result = $findUser->fetch(PDO::FETCH_ASSOC);

    $get_etage = $result["etage"];

    echo "<tr><td></td><td></td>
    <td><a href=\"filtre_result.php?word=etage&id=$get_etage\">".$get_etage."</a></td>
    
    </tr>";
    }
}
if(isset($_POST['action']) && $_POST['action']=="etat"){

    $findUser = connect()->prepare('SELECT DISTINCT state FROM 2_route_de_montaigu');
    $findUser->execute();
    $count = $findUser->rowCount();

    for($i=0; $i< $count; $i++){
        $result = $findUser->fetch(PDO::FETCH_ASSOC);

    $get_etat = $result["state"];

    echo "<tr><td></td><td></td><td></td>
    <td><a href=\"filtre_result.php?word=etat&id=$get_etat\">".$get_etat."</a></td>
    
    </tr>";
    }
}

 ?>
        
        </tbody>
</table> 
    </div>
</main>
</body>

</html>