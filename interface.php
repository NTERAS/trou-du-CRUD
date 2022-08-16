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
<body onload="check()">
<main>
    <div>
        <button>
            <a class="white" href="probleme.php">new probleme</a>
        </button>
        <button>
            <a class="white" href="filtre.php">filtre</a>
        </button>

        <table>
            <thead>
            <tr>
                <th>CASE#</th>
                <th>DATE</th>
                <th>DETAILS</th>
                <th>ETAGE</th>
                <th>STATE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
// $findUser = connect()->prepare('SELECT * FROM 2_route_de_montaigu');
// $stmt = $pdo->query("SELECT * FROM 2_route_de_montaigu");

// $findUser->execute();
// $user = $findUser->fetch();
// ---------------------------------------------------------------------------------------------------------------------------

$findUser = connect()->prepare('SELECT * FROM 2_route_de_montaigu');
$findUser->execute();
$count = $findUser->rowCount();

/* styles PDOStatement::fetch */
// $nRows = $findUser->query('select count(*) from 2_route_de_montaigu')->fetchColumn(); 
// echo $count;

for($i=0; $i< $count; $i++){
    $result = $findUser->fetch(PDO::FETCH_ASSOC);
// print_r($result);
// print("\n");
    $get_case = $result["id_intervention"];
    $get_date = $result["date"];
    $get_detail = $result["detail"];
    $get_etage = $result["etage"];
    $get_state = $result["state"];
    if($get_state=="pas complet"){
        $image="check.png";
    }else{
        $image="check2.png";
    }
// echo "$state";
echo "<tr>
<td>".$get_case."</td>
<td>".$get_date."</td>
<td>".$get_detail."</td>
<td>".$get_etage."</td>
<td>".$get_state."</td>
<td><button class=\"modify\"><a  href=\"modify.php?id=$get_case\">Modify</a></button>
    <button class=\"delete\"><a  href=\"delete.php?id=$get_case\">Delete</a></button>
    <a  href=\"check.php?id=$get_case\"><img src=\"$image\" alt=\"\"></a>
</td>
</tr>";

}

 ?>
        
        </tbody>
            
  <!-- <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr> -->
</table> 
    </div>
</main>
</body>

</html>