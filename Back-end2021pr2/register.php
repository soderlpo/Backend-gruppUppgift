<!-- registreringsformulär -->
<form action="index.php" method="post">
        Användarnamn <br><input type="text" name="usr"></br>
        Password <br><input type="password" name="psw"></br>
        Real Name <br><input type="text" name="rean"></br>
        Email <br><input type="text" name="eml"></br>
        Adress <br><input type="text" name="zip"></br>
        Bio <br><input type="text" name="bio"></br>
        Inkomst <br><input type="text" name="sal"></br>
        Preferens <br><input type="text" name="pref"></br>
        <input type="submit" value="Registrera dig">
        <input type="hidden" name="stage" value="register">
    </form>
<?php
// Kolla att man kan clicka submit
if (    isset($_REQUEST['usr']) && 
        isset($_REQUEST['psw']) && 
        isset($_REQUEST['rean']) && 
        isset($_REQUEST['eml']) && 
        isset($_REQUEST['zip']) && 
        isset($_REQUEST['bio']) && 
        isset($_REQUEST['sal']) && 
        isset($_REQUEST['pref'])  ) {
    //Hämta data från formuläret
    //Kom ihåg XSS protection
    $username = test_input($_REQUEST['usr']);
    $password = test_input($_REQUEST['psw']);
    $password = hash("sha256", $password);
    //envägs algoritm
    $realname = test_input($_REQUEST['rean']);
    $email = test_input($_REQUEST['eml']);
    $zipcode = test_input($_REQUEST['zip']);
    $bio = test_input($_REQUEST['bio']);
    $salary = test_input($_REQUEST['sal']);
    $preference = test_input($_REQUEST['pref']);

    //TODO Börja med att checka ifall användaren finns i databasen
    //TODO Slutför registrerings formuläret
    //TODO Skapa inloggnings formuläret
    // Prepared statements går snabbare att köra och skyddar mot SQL Injection!
    $statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference) VALUES (?,?,?,?,?,?,?,?)");
    $statement->bind_param("ssssisii", $username, $realname, $password, $email, $zipcode, $bio, $salary, $preference);
    // De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
    if ($statement->execute()) {    
        print("Du har registrerats!");
    }


}