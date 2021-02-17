<!-- Loginformulär -->
<form action="index.php" method="get">
    Användarnamn <br><input type="text" name="usr"></br>
    Lösenord <br><input type="password" name="psw"></br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" value="Logga in">
</form>
<?php
if (isset($_REQUEST['stage']) && $_REQUEST['stage'] == 'login'){
    print("logging in om 2 sekunder...");
    //fusk login för att fortsätta
    $_SESSION['user'] = "Hacker";
    header("refresh:2;url=./profile.php");
    //header("Location: ./profile.php"); //Redirect user on login
}

?>