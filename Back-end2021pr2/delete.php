
<form action="profile.php" method="get">
    Lösenord <br><input type="password" name="psw"></br>
    <input type="hidden" name="stage" value="delete">
    <input type="submit" value="Radera Profil">
</form>
<?php
if (isset($_REQUEST['psw'])) {
        $password = test_input($_REQUEST['psw']);
        $password = hash("sha256", $password);
        $dsql = "DELETE FROM `users` WHERE `users`.`password` = '$password'";
        $stmt = $conn->prepare($dsql);
        $stmt->execute();
        print("Deleting profile...");
        header("refresh:0.5;url=./index.php");
        
        }

?>