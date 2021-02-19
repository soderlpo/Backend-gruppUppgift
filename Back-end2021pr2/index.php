<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h2>Logga in</h2>
    <p>För att se emailen på annonserna, logga in eller registrera dig.</p>
    <a href="index.php?stage=signin"><input type="button" value="Logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="Registrera dig"></a>

    <?php 
    //stage change based on register button press
    if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup'||$_REQUEST['stage'] == 'register') ){
        include "register.php";
    }
    //TODO: // Include login.php if press login button
    else if (isset($_REQUEST['stage']) && 
            ($_REQUEST['stage'] == 'signin' || $_REQUEST['stage'] == 'login')
            )   {
        include "login.php";
    }
    ?>

</article>




<?php include "footer.php" ?>