<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Profilsidan</h1>
    <?php
    //Här hämtar vi användarens data
    //print($_SESSION['user']);

    $conn = create_conn(); //mysqli objektet skapas
    $user = $_SESSION['user']; //Kolla vem som är inloggad
    $sql = "SELECT * FROM users WHERE username = ?"; //?placeholder för data

    $stmt = $conn->prepare($sql); // Returnerar mysqli_stmt objekt
    $stmt->bind_param("s",$user); //skick nu först iväg användar inmatad data i sql
    $stmt->execute(); //returnerar true eller false
    
    $result = $stmt->get_result(); //Returnerar datan i form av ett mysql_result objekt
    $row = $result->fetch_assoc() ; 
    print("<p>Riktiga namnet: <input type='text' value='" . $row['realname']. "'></br>");
    print("Annonstext: <textarea>" . $row['bio']. "</textarea></p>");
    
    ?>
    <input type="button" value="Modifiera">
    <?php
    print("Lite till info från databasen: " . $row['preference']);
    
    ?>
</article>

<?php include "footer.php" ?>