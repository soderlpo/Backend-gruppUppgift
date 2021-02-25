<?php include "init.php"?>
<?php include "head.php"?>

<article>
    <h1>Profilsidan</h1>
    <?php
//Här hämtar vi användarens data
//print($_SESSION['user']);
if (isset($_SESSION['user'])){
$conn = create_conn(); //mysqli objektet skapas
$user = $_SESSION['user']; //Kolla vem som är inloggad
$sql = "SELECT * FROM users WHERE username = ?"; //?placeholder för data

$stmt = $conn->prepare($sql); // Returnerar mysqli_stmt objekt
$stmt->bind_param("s", $user); //skick nu först iväg användar inmatad data i sql
$stmt->execute(); //returnerar true eller false

$result = $stmt->get_result(); //Returnerar datan i form av ett mysql_result objekt
$row = $result->fetch_assoc();
print("<form action='profile.php' method='get'");
print("<p>Riktiga namnet: <input type='text' name='realnametxt' value='" . $row['realname'] . "'></br>");
print("Annonstext: <textarea name='biotxt'>" . $row['bio'] . "</textarea></p>");
print("<input type='submit' value ='Updatera'>");
print("</form>");
include "delete.php";
//TODO skriv ut tidigare komentarer på ens profil
}
else {
    print("Du försöker se på nån annans profil");
    //TODO: Kommentars formulär
    //SELECT id, username FROM users WHERE username = $_REQUEST['user'];
    //SELECT comment FROM Comments WHERE profile_id = $row['id'];
}
if (isset($_SESSION['user']) && isset($_REQUEST['realnametxt']) || isset($_REQUEST['biotxt'])){
    $conn = create_conn(); //mysqli objektet skapas
$user = $_SESSION['user']; //Kolla vem som är inloggad
$newName = test_input($_REQUEST['realnametxt']);
$newBio = test_input($_REQUEST['biotxt']);
$namesql = "UPDATE users SET realname = ? WHERE username = ?" ; 
$biosql = "UPDATE users SET bio = ? WHERE username = ?" ; 

$stmt = $conn->prepare($namesql); // Returnerar mysqli_stmt objekt
$stmt->bind_param("ss", $newName,$user); //skick nu först iväg användar inmatad data i sql
$stmt->execute(); //returnerar true eller false
$stmt->close();

$stmt = $conn->prepare($biosql);
$stmt->bind_param("ss",$newBio,$user);
$stmt->execute();
$stmt->close();

$result = $stmt->get_result(); //Returnerar datan i form av ett mysql_result objekt
$row = $result->fetch_assoc();
}
?>

    <!--<input type="button" value="Modifiera"-->

</article>

<?php include "footer.php"?>