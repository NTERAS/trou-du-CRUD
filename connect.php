

<?php
session_start();
function connect(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=concierge', 'root', '');
        // echo "succeed";
        // print "succeed <br>";
        return $db;
        }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}


// function register(){
//         $pass = password_hash($_POST['password'],  PASSWORD_DEFAULT);
//         $name = $_POST['name'];
//         $surname = $_POST['surname'];

//         $ajouter = connect()->prepare('INSERT INTO janitors (nom, prenom, password ) VALUES (:name_user, :surname_user, :password_user)');
//         $ajouter->bindParam(':name_user', $name, PDO::PARAM_STR);
//         $ajouter->bindParam(':password_user', $pass,  PDO::PARAM_STR);
//         $ajouter->bindParam(':surname_user', $surname,  PDO::PARAM_STR);
//         $estceok = $ajouter->execute();
//         $ajouter->debugDumpParams();
//             if($estceok){
//                 header('Location: ./index.php');   
//             } else {
//                 echo 'Error during registration';
//             }
//         }


function login(){
    echo "inside function login <br>";
    $findUser = connect()->prepare('SELECT * FROM janitors WHERE nom = :login_user');
    $findUser->bindParam(':login_user', $_POST['name'], PDO::PARAM_STR);
    $test=$_POST['name'];
    $code = $_POST['password'];

    echo "$test <br>";
    echo "$code <br>";
    $findUser->execute();
    $user = $findUser->fetch();


    // $what = $user['password'];
 
    //$user && password_verify($_POST['password'], $user['password_user'])
    //le mot de passe est alex
    //$user && password_verify(alex, $2y$10$6BcBM4oinhbyHIL09w.j/eIFwYkCc499VDIZIy7LJ1PRU4GO2ynQS])
    if ($user && password_verify($_POST['password'], $user['password'])) {
        echo "inside if";
        $_SESSION['nom_user'] = $user['nom']; 
        header('Location: interface.php');  
        
    } else {
        echo 'Invalid username or password';
    }


}

// if(isset($_POST['action']) && !empty($_POST['name'])  && !empty($_POST['password'])  && $_POST['action']=="register"){
//     register();
// }

if(isset($_POST['action']) && !empty($_POST['name'])  && !empty($_POST['password'])  && $_POST['action']=="login"){
    login();
}
   







?>


