<!-- Loginformulär -->
<form action="index.php" method="get">
    Användarnamn <br><input type="text" name="usr"></br>
    Lösenord <br><input type="password" name="psw"></br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" value="Logga in">
</form>
<?php
if (    isset($_REQUEST['usr']) && 
        isset($_REQUEST['psw'])) {
            $username = test_input($_REQUEST['usr']);
            $password = test_input($_REQUEST['psw']);
            $password = hash("sha256", $password);
            $conn = create_conn();
            $_SESSION['user'] = $username;
            $sql = "SELECT * FROM `users` WHERE username='$username' and password = '$password'";
            $stmt = $conn->prepare($sql); // Returnerar mysqli_stmt objekt
            $stmt->bind_param("ss", $username, $password); //skick nu först iväg användar inmatad data i sql
            $stmt->execute(); 
            $result = $stmt->get_result();
            print("logging in om 2 sekunder...");
            header("refresh:2;url=./profile.php");
            //$find = $conn->query ("SELECT * FROM `users` WHERE username='$username' and password = '$password'");
        }

?>