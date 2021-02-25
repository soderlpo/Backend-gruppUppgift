<!-- registreringsformulär -->
<form action="index.php" method="post">
        Användarnamn <br><input type="text" name="usr"></br>
        Password <br><input type="password" name="psw"></br>
        Real Name <br><input type="text" name="rean"></br>
        Email <br><input type="text" name="eml"></br>
        Adress <br><input type="text" name="zip"></br>
        Bio <br><input type="text" name="bio"></br>
        Inkomst <br><input type="text" name="sal"></br>
        <br><label for="pref">Preference:</label>

        <select name="pref">
            <option value="0">Manlig</option>
            <option value="1">Kvinlig</option>
            <option value="2">Båda</option>
            <option value="3">Annan</option>
            <option value="4">Alla</option>
        </select>
        <br><input type="submit" value="Registrera dig">
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
    // Prepared statements går snabbare att köra och skyddar mot SQL Injection!
    $conn = create_conn();
    $statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference) VALUES (?,?,?,?,?,?,?,?)");
    $statement->bind_param("ssssisii", $username, $realname, $password, $email, $zipcode, $bio, $salary, $preference);
    // De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
    if ($statement->execute()) {    
        print("Du har registrerats!");
    } else {
        print("Någonting gick fel!");
    }


}