<?php 

require_once "connect.php";

// Vincent Kroon

class Klant{
    private int $klantID;
    private string $klantNaam;
    private string $klantEmail;
    private string $klantWachtwoord;

    // wanneer de class wordt aangemaakt met | new Klant() | dan worden er standaard gegevens ingezet op de variabelen bovenaan
    public function __construct($klantNaam="", $klantWachtwoord="", $klantEmail="", $klantID=0){
        $this->klantNaam = $klantNaam;
        $this->klantEmail = $klantEmail;
        $this->klantWachtwoord = $klantWachtwoord;
        $this->klantID = $klantID;
    }

    // Getters
    public function getKlantID(){
        return $this->klantID;
    }
    public function getKlantNaam(){
        return $this->klantNaam;
    }
    public function getKlantEmail(){
        return $this->klantEmail;
    }
    public function getKlantWachtwoord(){
        return $this->klantWachtwoord;
    }

    // Setters
    public function setKlantID($klantID){
        $this->klantID = $klantID;
    }
    public function setKlantNaam($klantNaam){
        $this->klantNaam = $klantNaam;
    }
    public function setKlantEmail($klantEmail){
        $this->klantEmail = $klantEmail;
    }
    public function setKlantWachtwoord($klantWachtwoord){
        $this->klantWachtwoord = $klantWachtwoord;
    }

    // CRUD
    public function createKlant(){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        // gegevens in variabelen zetten via de getters
        $klantID = NULL;
        $klantNaam = $this->getKlantNaam();
        $klantEmail = $this->getKlantEmail();
        $klantWachtwoord = $this->getKlantWachtwoord();

        // gegevens in de juiste database tabel zetten
        $db->SQLCommando("insert into klant values 
        (:ID, :Naam, :Email, :Wachtwoord)
        ",[
            "ID" => $klantID,
            "Naam" => $klantNaam,
            "Email" => $klantEmail,
            "Wachtwoord" => $klantWachtwoord
        ]);
    }

    public function readKlanten(){
        $db = new Database("localhost","root","","donkey_travel");

        // Alle klanten gegevens in de database opvragen
        $klantList = $db->SQLCommando("select * from klanten where 1",[]);

        echo "<table>"; 
        echo "<th>ID</th>";
        echo "<th>Naam</th>";
        echo "<th>Email</th>";
        echo "<th>Telefoon nummer</th>";
        echo "<th>Laatst gewijzigd</th>";
        echo "</tr>";

        // Alle klanten gegevens laten zien
        foreach($klantList as $klant){
            echo "<tr>";
            echo "<td>" . $klant["ID"] . "</td>";
            echo "<td>" . $klant["naam"] . "</td>";
            echo "<td>" . $klant["email"] . "</td>";
            echo "<td>" . $klant["telefoon"] . "</td>";
            echo "<td>" . $klant["gewijzigd"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function updateKlant($klantID){
        $db = new Database("localhost","root","","project_10");

        $klantID = $this->getKlantID();
        $klantNaam = $this->getKlantNaam();
        $klantEmail = $this->getKlantEmail();
        $klantWachtwoord = $this->getKlantWachtwoord();

        // Veranderen van de gegevens in de database gebaseerd op de gegeven supplier id
        $db->SQLCommando(
        "update klant set
                ID           = :ID,
                Naam         = :Naam,
                Email        = :Email,
                Wachtwoord   = :Wachtwoord
        where   ID = :ID"
        ,[
            "ID" => $klantID,
            "Naam" => $klantNaam,
            "Email" => $klantEmail,
            "Wachtwoord" => $klantWachtwoord
        ]);
    }

    public function deleteKlant($klantNaam){
        $db = new Database("localhost","root","","donkey_travel");
        
        // Checken waar de supplier id in de database overeenkomt met de gegeven supplier id
        $db->SQLCommando("delete from klanten where naam  = :naam", ["naam" => $klantNaam]);
    }

    public function logInCheckKlant($klantEmail, $klantWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from klant where Email = :Email", ["Email" => $klantEmail]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        $TheSame = password_verify($klantWachtwoord, $HashedWachtwoord);

        if($TheSame){
            header("Location: http://localhost/Donkey_Travel/homePagina.php");
        } else{
            echo "We hebben u niet gevonden, probeer opnieuw.";
        }
    }

    public function GegevenVeranderenWachtWoordCheck($klantEmail, $klantWachtwoord, $klantID){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from klant where Email = :Email", ["Email" => $klantEmail]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        $TheSame = password_verify($klantWachtwoord, $HashedWachtwoord);

        if($TheSame){
            $this->klantWachtwoord = $HashedWachtwoord;
            $this->klantID = $klantID;
            $this->updateKlant($this->klantID);

            echo "Uw nieuwe gegevens <br>";
            $this->afdrukkenKlant();
        } else{
            echo "Verkeerd wachtwoord ingevoerd, probeer opnieuw.";
        }
    }

    public function VerwijderCheck($klantNaam, $klantWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from klant where Naam = :Naam", ["Naam" => $klantNaam]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        $TheSame = password_verify($klantWachtwoord, $HashedWachtwoord);

        if($TheSame){
            return true;
        } else{
            return false;
        }
    }
    
    public function searchKlantNaam($klantNaam){
        $db = new Database("localhost","root","","project_10");

        // Zoeken op klant Naam in de database
        $klantList = $db->SQLCommando("select * from klant where Naam = :Naam", ["Naam" => $klantNaam]);
    
        // klant gegevens opvragen
        foreach ($klantList as $klant) {
            $this->klantID = $klant["ID"];
            $this->klantNaam = $klant["Naam"];
            $this->klantEmail = $klant["Email"];
            $this->klantWachtwoord = $klant["Wachtwoord"];
        }
    }

    public function searchKlantEmail($klantEmail){
        $db = new Database("localhost","root","","project_10");

        // checken waar de email in de database overeenkomt met de gegeven adress
        $klantList = $db->SQLCommando("select * from klant where Email = :Email", ["Email" => $klantEmail]);
    
        // supplier gegevens opvragen
        foreach ($klantList as $klant) {
            $this->klantID = $klant["ID"];
            $this->klantNaam = $klant["Naam"];
            $this->klantEmail = $klant["Email"];
        }
    }

    // Het laten zien van de huidige gegevens in de class met gebruik van getters
    public function afdrukkenKlant(){
        echo "<p>ID: " . $this->getKlantID() . "<br>";
        echo "Naam: " . $this->getKlantNaam() . "<br>";
        echo "Email: " . $this->getKlantEmail() . "<br></p>";
    }
}