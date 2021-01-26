<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
print("<p>Här är innehållet av din session</p>");
print_r($_SESSION);
?>

</body>

</html>