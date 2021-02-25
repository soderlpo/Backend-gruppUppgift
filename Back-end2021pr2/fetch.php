<?php

//Om man har sorterat/filtrerat
if (isset($_REQUEST['salary'] )&& $_REQUEST['salary'] == 'rich' ) {
    print("filtrerar..."); 
    // Skapa SQL kommando
    $sql = "SELECT * FROM users ORDER BY salary DESC";
    FetchAndWrite($sql);
}
else if (isset($_REQUEST['salary'] )&& $_REQUEST['salary'] == 'poor' ) {
    print("filtrerar..."); 
    // Skapa SQL kommando
    $sql = "SELECT * FROM users ORDER BY salary ASC";
    FetchAndWrite($sql);
} 

//Om man inte har filtrerat
else if(!isset($_REQUEST['salary'])) {
    // Skapa SQL kommando
    $sql = "SELECT * FROM users";
    FetchAndWrite($sql);
}
function FetchAndWrite($sql){
    // Koppla oss till databasen
    $conn = create_conn();
    if ($result = $conn->query($sql)){
        //Skapa en while loop för att hämta varje rad
        while ($row = $result->fetch_assoc()) {
            // Skriv ut endast ett värde (en kolumn och en rad -- en cell)
            print("<p class='ad'>");
            print("Användare i databasen: " . $row['username'] . "</br>");
            print("Lön: " . $row['salary']. "<br>");
            $prefArr = ['Manlig','Kvinlig','Båda','Annan','All'];
            print("Preferens: " . $prefArr[$row['preference']] . "<br>");
            print("<a href='./profile.php?user=" . $row['username'] . "'>Kommentera</a></p>");
        }
    }   else {
        print("Något gick fel, senaste felet: " . $conn->error);
    }

}