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
print("<p>Det är den " . date("d") . " idag</p>");
print("<p>Det är vecka " . date("W") . " idag</p>");
print("<p>Det är månad " . date("m") . " idag</p>");
//skapa en array för dagar
$dagar = array("Null", "Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag", "Söndag");
$dag = date("d");
//TODO: Skapa en array av månaderna och välj den nuvarande
$manader = array("Null", "Januari", "Februari", "Mars", "April", "Maj", "Juni", "Juli", "Augusti", "September", "Oktober", "November", "December");
//hur kan vi använda 01 från date("m") som index? Svar: lag till en Null variabel I början av Arrayn, eftersom den anars börjar frå 0, inte 1
$manad = date("m");
// Tyvärr verkar $manad vara en sträng inte en Number
//Type cast str till int:
$dagInt = (int) $dag;
$manadInt = (int) $manad;
print("<p>På Svenska är det: " . $dagar[$dagInt] . " idag, och månaden är: " . $manader[$manadInt]);
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
    $framtiddate = mktime(0, 0, 0, $man, $dag, $ar);
    $idag = time();
    $skillnad = $framtiddate - $idag;
    print("Du vill veta hur länge det är till " . $dag . "." . $man . "." . $ar);
    print("<p>Det är: " . floor($skillnad) . " sekunder, " . floor($skillnad / 60) . " minuter, " . floor($skillnad / 60 / 60) . " timmar eller " . floor($skillnad / 60 / 60 / 24) . " dagar tills det datum</p>");
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
function randomPassword()
{
    $alfabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $passwordran = array();
    $längdpass = strlen($alfabet) - 1;
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $längdpass);
        $passwordran[$i] = $alfabet[$n];
    }
    return implode($passwordran);
}
if (isset($_REQUEST['username']) && isset($_REQUEST['email'])) {
    //Uppg 4 - Skicka confirmation email
    $username = test_input($_GET['username']);
    $email = test_input($_GET['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $strpasswordran = randomPassword();
        print($email . " är en valid email address, din password är " . $strpasswordran . ", welcome");
        mail($email, "Randomised password", "Ditt password är: " . $strpasswordran . ", welcome");
    } else {
        print("$email är inte en valid email address");
    }
    print("<p>" . $username . "</p>");

}

?>

        </article>

        <article>
            <h2>Uppg 5</h2>
            <p>Cookies</p>
            <?php

//Ge användaren en cookie
$cookie_name = "username";
$cookie_value = date('Y-m-d H:i:s', time());


//Kolla ifall användaren har en cookie
if (!isset($_COOKIE[$cookie_name])) {
    print("Cookie named '" . $cookie_name . "' is not set!");
    setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");
    
} else {
    print("Welcome back, we saved you a cookie " . $cookie_name. "!<br>");
    print("You joined at: " . $_COOKIE[$cookie_name]);
}

?>
        </article>
        <article>
            <h2>Uppg 6</h2>
            <!--Glöm inte att ändra method="get" till method="post"-->
            <form action="index.php" method="post">
                Login: <input type="text" name="login"><br>
                Password: <input type="text" name="password"><br>
                <input type="submit" value="Logga in">
            </form>
            <?php
//Upp6 - Spara användarens data på servern
$login = test_input($_REQUEST["login"]);
$password = test_input($_REQUEST["password"]);

if ($login == "Admin") {

//"Sessionen abc123 == $SESSION['user'] = Admin"
    $_SESSION['user'] = "Admin";
    $_SESSION["favcolor"] = "grön";
    print("<p>Endast Admin har Dark Webb tillgång</p>");
    print("<a href='darkweb.php'>DARK WEB</a></br>");
    print("<a href='OtherDarkWebb.php'>A secret place</a>");
} else if ($login == "Hacker") {
    $_SESSION['user'] = "Hacker";
    print("<p>Endast Admin har Dark Webb tillgång</p>");
    print("<a href='darkweb.php'>DARK WEB</a></br>");
    print("<a href='OtherDarkWebb.php'>A secret place</a>");
} else {
    print("<p>Not logged in with admin privlige</p>");
}
?>
        </article>
        <article>
            <h2>Uppg 7</h2>

            <form action="index.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
            <?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        print("File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
        print("File is not an image.");
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    print("Sorry, file already exists.<br>");
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    print("Sorry, your file is too large.<br>");
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    print("Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>");
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    print("Sorry, your file was not uploaded.<br>");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        print("The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>");
    } else {
        print("Sorry, there was an error uploading your file.<br>");
    }
}
$dirctoryscan = scandir($target_dir);
print_r($dirctoryscan);
?>
        </article>

        <article>
            <h2>Uppg 8</h2>
            <?php
//TODO: Hitta användaren i $_SERVER och skriv in den
//TODO: Formatera tiden i nåt mänkoläsligt format
$myfile = fopen("besok.log", "a+") or die("Unable to open file!");
fwrite($myfile, "Hello World, time is " . time() . "\n");
fclose($myfile);
?>
        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>