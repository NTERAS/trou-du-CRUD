<!-- <?php 
// session_start();
// if(isset($_SESSION['nom_user'])){
// echo "Bienvenue ".$_SESSION['nom_user']." <a href='./logout.php'>Se déconnecter</a>";
// }
// else{
//     header('Location: ./login.php');     
// }

?> -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Login</title>
</head>
<body>
<main>
    <form action="connect.php" method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Nom:</label>
            <input type="text" name="name" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit" name="action" value="login">Login</button>
            <!-- <a href="register.php">Register</a> -->
        </section>
    </form>
</main>
</body>

</html>