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
        <nav>
            <!-- Logo och meny finns i nav -->
            <ul>
                <a id="current" href="home/">Home</a>
                <a href="projekt1/">Projekt 1</a>
                <a href="projekt2/">Projekt 2</a>
            </ul>
        </nav>

        <!-- Artiklar placerar sig snyggt efter varann -->
        <article>
            <h1>Project 1</h1>
        </article>
        <article>
            <h2>Uppgift 1</h2>
            <p>Xampp server info</p>

        <?php
print(3 + 6);
// Uppg1 - Superglobals
//phpinfo(); sök upg info här
print($_SERVER['REMOTE_USER']);
$serverPort = $_SERVER['SERVER_PORT'];
// Konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Servern snurrar på port :" . $serverPort . "</p>");
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
$manader = array("Null", "Januari", "Februari", "Mars");
//hur kan vi använda 01 från date("m") som index?
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
            // Kom åt GET från URLen
            $dag = $_GET["dag"];
            $man = $_GET["manad"];
            $ar = $_GET["ar"];
                print("Du vill veta hur länge det är till " . $dag . "." . $man . "." . $ar);
            ?>

        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>