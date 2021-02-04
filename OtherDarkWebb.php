<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
print("<p>Här är inget specielt, men nu vet vi att min favorit färg är " . $_SESSION["favcolor"] . "</p>");
print("<br>Användaren:" . $_SESSION['user']);

if ($_SESSION['user'] == "Admin") {
// Vissa en text ändast om $_SESSION['user'] == "Admin"
print("<br>This is secret information");
}
else  {
// Annars, styr användaren till loginsidan (index.php)
header("Location: index.php");
die();
}
?>

</body>

</html>