<?php
session_start();
include "functions.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pontus JS Demo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">
        <?php include "navbar.php"?>

        <!-- Artiklar placerar sig snyggt efter varann -->
        <article>
            <h1>Project 1</h1>
        </article>
        <article>
            <h2>Uppgift 1</h2>
            <p>Xampp server info</p>

            <?php
// Uppg1 - Superglobals
//phpinfo();
//sök upg info här
$userName = $_SERVER['REMOTE_USER'];
$userIP = $_SERVER['REMOTE_ADDR'];
$serverPort = $_SERVER['SERVER_PORT'];
$serverName = $_SERVER['SERVER_NAME'];
$serverApaVers = $_SERVER['SERVER_SOFTWARE'];
$serverPHPVers = phpversion();
$serverIP = $_SERVER['SERVER_ADDR'];
// Konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Hello " . $userName . " , din IP adress är: " . $userIP . "</p>");
print("<p>Servern snurrar på port :" . $serverPort . "</p>");
print("<p>Serverns namn är : " . $serverName . " och IP addressen är " . $serverIP . "</p>");
print("<p>Apache och PHP versonerna är: " . $serverApaVers . " och " . $serverPHPVers . "</p>");
?>
        </article>

        <article>
            <h2>Uppgift 2</h2>
            <p>Tid och datum</p>
            <?php
//Upg 2 här
print("<p>Klockan är " . date("h:i:s") . " just nu</p>");
print("<p>Det är den " . date("d") . " i dag</p>");
print("<p>Det är månad " . date("m") . " idag</p>");
//TODO: Skapa en array av månaderna och välj den nuvarande
$manader = array("Null", "Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December");
//hur kan vi använda 01 från date("m") som index? Svar: lag till en Null variabel I början av Arrayn, eftersom den anars börjar frå 0, inte 1
$manad = date("m");
// Tyvärr verkar $manad vara en sträng inte en Number
//Type cast str till int:
$manadInt = (int) $manad;
print("<p>På Svenska heter den månaden: " . $manader[$manadInt]);
?>
        </article>

        <article>
            <h2>Uppgift 3</h2>
            <p>Formulär</p>
            <form action="index.php" method="get">
                Dag: <input type="text" name="dag"><br>
                Månad: <input type="text" name="manad"><br>
                År: <input type="text" name="ar"><br>
                <input type="submit">
            </form>
            <?php
//Kolla om man tryckt submit
if (isset($_REQUEST["dag"]) && isset($_REQUEST["manad"]) && isset($_REQUEST["ar"])) {
// Kom åt GET från URLen
    $dag = $_GET["dag"];
    $man = $_GET["manad"];
    $ar = $_GET["ar"];
    print("Du vill veta hur länge det är till " . $dag . "." . $man . "." . $ar);
}
?>

        </article>

        <article>
            <h2>Uppgift 4</h2>
            <form action="index.php" method="get">
                Username: <input type="text" name="username"><br>
                E-mail: <input type="text" name="email"><br>
                <input type="submit" value="Registrera dig">
            </form>

            <?php
if (isset($_REQUEST['username']) && isset($_REQUEST['email'])) {
    //Uppg 4 - Skicka confirmation email
    $username = test_input($_GET['username']);
    print($username);
}
?>

        </article>

        <article>
            <h2>Uppg 5</h2>
            <p>Cookies</p>
            <?php

//Ge användaren en cookie
$cookie_name = "username";
$cookie_value = "soderlpo";
setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");

//Kolla ifall användaren har en cookie
if (isset($_COOKIE["username"])) {
    print("<p>Welcome " . $cookie_value . "!</p>");
}

?>
        </article>
        <article>
            <h2>Uppg 6</h2>
            <?php
//Upp6 - Spara användarens data på servern
$_SESSION['user'] = "Candles";
print("<p>Endast Candles har Dark Webb tillgång</p>");
print("<a href='darkweb.php'>DARK WEB</a>");
?>
        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>