<?php
//* florian koning
//! niet vergeten om een session te hebben om het accountID te krijgen

require_once 'connect.php';

class klacht
{

    public function __construct()
    {
        
    }

    //* Create klant
    public function create(string $titel, string $omschrijving, string $tijdstip, string $latitude, string $longitude, int $accountID)
    {
        // de sql code en de prepare om een nieuwe klacht te maken
        $db = new Database("localhost", "root", "", "project_10");
        
        $db->SQLCommando('INSERT INTO klacht (Titel, Omschrijving, Tijdstip, latitude, longitude, accountID) VALUES (?, ?, ?, ?, ?, ?)', 
        [$titel, $omschrijving, $tijdstip, $latitude, $longitude, $accountID]);

        // Redirect naar klachtGelukt.php
        header("Location: http://localhost/Project10/includes/html/klachtGelukt.php");
    }

    //* Admin read klachten
    public function readAdmin(){
        
        $db = new Database("localhost","root","","project_10");
        $klachtList = $db->SQLCommando("select * from klacht where 1",[]);
        
        // Alle klacht gegevens laten zien
        foreach($klachtList as $klacht){
            $titel = json_encode($klacht['Titel']);
            $omschrijving = json_encode($klacht['Omschrijving']);
            $latitude = $klacht['latitude'];
            $longitude = $klacht['longitude'];

            $jsTitel = str_replace('"', "'", $titel);
            $jsOmschrijving = str_replace('"', "'", $omschrijving);
            
            echo "<script> 
                    ReadCreateMarker($jsTitel, $jsOmschrijving, $latitude, $longitude);
                </script>";
        }
    }

    //* Read klacht
    public function readKlacht($accountID)
    {
        $db = new Database("localhost","root","","project_10");
        $rowCount = 1;

        // Alle klacht gegevens in de database
        $klachtlijst = $db->SQLCommando("select * from klacht where accountID = ?",[$accountID]);

        echo "<thead>";
        echo "<th scope='col'>#</th>";  
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Titel</th>";
        echo "<th scope='col'>Omschrijving</th>";
        echo "<th scope='col'>Tijdstip</th>";
        echo "<th scope='col'>Update</th>";
        echo "<th scope='col'>Delete</th>";
        echo "</tr>";   
        echo "</thead>";

        echo "<tbody>";
        foreach($klachtlijst as $klacht){
            echo "<tr>";
            echo "<th scope='row'>" . $rowCount . "</th>";
            echo "<td>" . $klacht["ID"] . "</td>";
            echo "<td>" . $klacht["Titel"] . "</td>";
            echo "<td>" . $klacht["Omschrijving"] . "</td>";
            echo "<td>" . $klacht["Tijdstip"] . "</td>";
            echo "<td> <form action='klachtUpdate.php' method='POST'><button class='btn btn-primary' type='submit' name='UPDATE' value='" . $klacht["ID"] . "'>Update</button></form></td>";
            echo "<td> <form action='klachtDelete.php' method='POST'><button class='btn btn-primary' type='submit' name='DELETE' value='" . $klacht["ID"] . "'>Delete</button></form></td>";
            echo "</tr>";
            $rowCount++;
        }
    }

    //* Update klant
    public function update(string $titel, string $omschrijving, string $tijdstip, string $latitude, string $longitude, $ID)
    {
        // de sql code en de prepare om een klacht te updaten
        $db = new Database("localhost", "root", "", "project_10");

        $db->SQLCommando('UPDATE klacht SET Titel = ?, Omschrijving = ?, Tijdstip = ?, latitude = ?, longitude = ? WHERE ID = ?', 
        [$titel, $omschrijving, $tijdstip, $latitude, $longitude, $ID]);

        // Redirect naar klachtGelukt.php
        header("Location: http://localhost/Project10/includes/html/klachtGelukt.php");
    }

    //* Delte alleen 1 account met ID van de klacht
    public function delete($ID) {
        // de sql code voor delete
        $db = new Database("localhost", "root", "", "project_10");
        $db->SQLCommando('DELETE FROM klacht WHERE ID = ?', [$ID]);
    }

    //* Delete alle klachten dat de accountID hebben dat woord gegeven
    public static function deleteAllAccountId($accountID) {
        // de sql code voor de delete all met account id
        $db = new Database("localhost", "root", "", "project_10");
        $db->SQLCommando('DELETE FROM klacht WHERE accountID = ?', [$accountID]);
    }

    function readKlachtTijd($accountID){

        $db = new Database("localhost","root","","project_10");
        $rowCount = 1;

        // Alle klacht gegevens in de database
        $klachtlijst = $db->SQLCommando("select * from klacht where accountID = ? ORDER BY `klacht`.`Tijdstip` ASC",[$accountID]);

        echo "<thead>";
        echo "<th scope='col'>#</th>";  
        echo "<th scope='col'>ID</th>";
        echo "<th scope='col'>Titel</th>";
        echo "<th scope='col'>Omschrijving</th>";
        echo "<th scope='col'>Tijdstip</th>";
        echo "<th scope='col'>Update</th>";
        echo "<th scope='col'>Delete</th>";
        echo "</tr>";   
        echo "</thead>";

        echo "<tbody>";
        foreach($klachtlijst as $klacht){
            echo "<tr>";
            echo "<th scope='row'>" . $rowCount . "</th>";
            echo "<td>" . $klacht["ID"] . "</td>";
            echo "<td>" . $klacht["Titel"] . "</td>";
            echo "<td>" . $klacht["Omschrijving"] . "</td>";
            echo "<td>" . $klacht["Tijdstip"] . "</td>";
            echo "<td> <form action='klachtUpdate.php' method='POST'><button class='btn btn-primary' type='submit' name='UPDATE' value='" . $klacht["ID"] . "'>Update</button></form></td>";
            echo "<td> <form action='klachtDelete.php' method='POST'><button class='btn btn-primary' type='submit' name='DELETE' value='" . $klacht["ID"] . "'>Delete</button></form></td>";
            echo "</tr>";
            $rowCount++;
        }
    }
}
