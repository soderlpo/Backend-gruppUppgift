<?php
// Kolla att man kan clicka submit
if (    isset($_REQUEST['usr']) && isset($_REQUEST['psw'])  ) {
    //Hämta data från formuläret
    //Kom ihåg XSS protection
    $username = test_input($_REQUEST['usr']);
    $password = test_input($_REQUEST['psw']);
    $password = hash("sha256", $password);
    //envägs algoritm
    $realname = "asd";
    $email ="aasd";
    $zipcode = 00560;
    $bio = "bäst";
    $salary = 100;
    $preference = 2;

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