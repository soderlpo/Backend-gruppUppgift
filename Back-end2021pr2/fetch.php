<?php
// Koppla oss till databasen
$conn = create_conn();
// Skapa SQL kommando
$sql = "SELECT * FROM users";
// Kör SQL kommando på databasen
if ($result = $conn->query($sql)){
    //Skapa en while loop för att hämta varje rad
    while ($row = $result->fetch_assoc()) {
        // Skriv ut endast ett värde (en kolumn och en rad -- en cell)
        print("Användare i databasen: " . $row['username'] . "</br>");
    }
}   else {
    print("Något gick fel, senaste felet: " . $conn->error);
}