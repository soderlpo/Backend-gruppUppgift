<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dennis JS Demo</title>
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
            <h1>Uppg 1</h1>
            <p>Xampp server info (modification1)</p>
        </article>

        <?php
        print (3+6);
        // Uppg1 - Superglobals
        //phpinfo(); sök upg info här
        print ($_SERVER ['REMOTE_USER']);
        $serverPort = $_SERVER['SERVER_PORT'];
        // Konkatenering med punkt, märk att PHP kod producerar HTML resurser
        print("<p>Servern snurrar på port :" . $serverPort . "</p>");
        ?>

        <article>
            <h1>Uppg 2</h1>
            <p>Tid och datum</p>
        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>