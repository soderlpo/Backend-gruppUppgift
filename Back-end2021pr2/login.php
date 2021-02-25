<!-- Loginformulär -->
<form action="index.php" method="get">
    Användarnamn <br><input type="text" name="usr"></br>
    Lösenord <br><input type="password" name="psw"></br>
    <input type="hidden" name="stage" value="login">
    <input type="submit" value="Logga in">
</form>
<?php

        if(isset($_REQUEST['usr']) && isset($_REQUEST['psw'])){
            $username = test_input($_REQUEST['usr']);
            $password = test_input($_REQUEST['psw']);
            $password = hash("sha256",$password);
          
            $conn = create_conn();
            $sql = "SELECT * FROM users WHERE username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$username);
            $stmt->execute();
          
            $result = $stmt->get_result();
            $data = mysqli_fetch_array($result);
            
            if($data){
              if($password == $data["password"]){
                // Lösenordet e rätt, lets do stuff
                $_SESSION['user'] = $username;
                print("logging in...");
                header("refresh:1.5;url=./profile.php");
              }else{
                // Lösenordet e fel, lets do error
                print("logg in misslyckades");
              }
            }
          }

?>