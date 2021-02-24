<form action="profile.php" method="get">
    Lösenord <br><input type="password" name="psw"></br>
    <input type="hidden" name="stage" value="delete">
    <input type="submit" value="Radera Profil">
</form>
<?php
if (isset($_REQUEST['psw'])) {
        $password = test_input($_REQUEST['psw']);
        $password = hash("sha256", $password);
        $conn = create_conn();
        $_GET['id'] = $userID;
        print("Your id is " . $_GET['id'] . " !");
        $sql = "SELECT * FROM `users` WHERE username='$username' and password = '$password' and id = ?";
        $stmt = $conn->prepare($sql); // Returnerar mysqli_stmt objekt
        $stmt->bind_param("s", $username, $password); //skick nu först iväg användar inmatad data i sql
        $stmt->execute(); 
        $result = $stmt->get_result();
        //$find = $conn->query ("SELECT * FROM `users` WHERE username='$username' and password = '$password'");
        
        }

?>