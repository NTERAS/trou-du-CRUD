<?php
include "connect.php";
$word = $_GET["word"];
$id = $_GET["id"];
// echo $word;
// echo $id;

if($word =="date"){
    // echo "word";
    $statement = connect()->prepare('SELECT * FROM 2_route_de_montaigu WHERE date=:find');
    $statement->bindParam(':find', $id, PDO::PARAM_STR);
    $statement->execute();
    $count = $statement->rowCount();
    // $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    // echo $result;
    echo $count;
}
if($word =="detail"){
    $statement = connect()->prepare('SELECT * FROM 2_route_de_montaigu WHERE detail=:find');
    $statement->bindParam(':find', $id, PDO::PARAM_STR);
    $statement->execute();
    $count = $statement->rowCount();
}
if($word =="etage"){
    $statement = connect()->prepare('SELECT * FROM 2_route_de_montaigu WHERE etage=:find');
    $statement->bindParam(':find', $id, PDO::PARAM_INT);
    $statement->execute();
    $count = $statement->rowCount();
}
if($word =="etat"){
    $statement = connect()->prepare('SELECT * FROM 2_route_de_montaigu WHERE state=:find');
    $statement->bindParam(':find', $id, PDO::PARAM_STR);
    $statement->execute();
    $count = $statement->rowCount();
}

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
            <tr>
                <th>CASE#</th>
                <th>DATE</th>
                <th>DETAILS</th>
                <th>ETAGE</th>
                <th>STATE</th>
            </tr>
        </thead>
        <tbody>
            <?php
// $findUser = connect()->prepare('SELECT * FROM 2_route_de_montaigu');
// $stmt = $pdo->query("SELECT * FROM 2_route_de_montaigu");

// $findUser->execute();
// $user = $findUser->fetch();
// ---------------------------------------------------------------------------------------------------------------------------

// $findUser = connect()->prepare('SELECT * FROM 2_route_de_montaigu');
// $findUser->execute();
// $count = $findUser->rowCount();

/* styles PDOStatement::fetch */
// $nRows = $findUser->query('select count(*) from 2_route_de_montaigu')->fetchColumn(); 
// echo $count;

for($i=0; $i< $count; $i++){
    $result = $statement->fetch(PDO::FETCH_ASSOC);
// print_r($result);
// print("\n");
    $get_case = $result["id_intervention"];
    $get_date = $result["date"];
    $get_detail = $result["detail"];
    $get_etage = $result["etage"];
    $get_state = $result["state"];
// echo "$state";
echo "<tr>
<td>".$get_case."</td>
<td>".$get_date."</td>
<td>".$get_detail."</td>
<td>".$get_etage."</td>
<td>".$get_state."</td>
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