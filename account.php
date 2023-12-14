<?php 

require_once "connect.php";

// Vincent Kroon

class Account{
    private int $accountID;
    private string $accountNaam;
    private string $accountEmail;
    private string $accountWachtwoord;

    // wanneer de class wordt aangemaakt met | new account() | dan worden er standaard gegevens ingezet op de variabelen bovenaan
    public function __construct($accountNaam="", $accountWachtwoord="", $accountEmail="", $accountID=0){
        $this->accountNaam = $accountNaam;
        $this->accountEmail = $accountEmail;
        $this->accountWachtwoord = $accountWachtwoord;
        $this->accountID = $accountID;
    }

    // Getters
    public function getaccountID(){
        return $this->accountID;
    }
    public function getaccountNaam(){
        return $this->accountNaam;
    }
    public function getaccountEmail(){
        return $this->accountEmail;
    }
    public function getaccountWachtwoord(){
        return $this->accountWachtwoord;
    }

    // Setters
    public function setaccountID($accountID){
        $this->accountID = $accountID;
    }
    public function setaccountNaam($accountNaam){
        $this->accountNaam = $accountNaam;
    }
    public function setaccountEmail($accountEmail){
        $this->accountEmail = $accountEmail;
    }
    public function setaccountWachtwoord($accountWachtwoord){
        $this->accountWachtwoord = $accountWachtwoord;
    }

    // CRUD
    public function createaccount(){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        // gegevens in variabelen zetten via de getters
        $accountID = NULL;
        $accountNaam = $this->getaccountNaam();
        $accountEmail = $this->getaccountEmail();
        $accountWachtwoord = $this->getaccountWachtwoord();

        // gegevens in de juiste database tabel zetten
        $db->SQLCommando("insert into account values 
        (:ID, :Naam, :Email, :Wachtwoord)
        ",[
            "ID" => $accountID,
            "Naam" => $accountNaam,
            "Email" => $accountEmail,
            "Wachtwoord" => $accountWachtwoord
        ]);
    }

    public function readaccounten(){
        $db = new Database("localhost","root","","donkey_travel");

        // Alle accounten gegevens in de database opvragen
        $accountList = $db->SQLCommando("select * from accounten where 1",[]);

        echo "<table>"; 
        echo "<th>ID</th>";
        echo "<th>Naam</th>";
        echo "<th>Email</th>";
        echo "<th>Telefoon nummer</th>";
        echo "<th>Laatst gewijzigd</th>";
        echo "</tr>";

        // Alle accounten gegevens laten zien
        foreach($accountList as $account){
            echo "<tr>";
            echo "<td>" . $account["ID"] . "</td>";
            echo "<td>" . $account["naam"] . "</td>";
            echo "<td>" . $account["email"] . "</td>";
            echo "<td>" . $account["telefoon"] . "</td>";
            echo "<td>" . $account["gewijzigd"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function updateaccount($accountID){
        $db = new Database("localhost","root","","project_10");

        $accountID = $this->getaccountID();
        $accountNaam = $this->getaccountNaam();
        $accountEmail = $this->getaccountEmail();
        $accountWachtwoord = $this->getaccountWachtwoord();

        // Veranderen van de gegevens in de database gebaseerd op de gegeven supplier id
        $db->SQLCommando(
        "update account set
                ID           = :ID,
                Naam         = :Naam,
                Email        = :Email,
                Wachtwoord   = :Wachtwoord
        where   ID = :ID"
        ,[
            "ID" => $accountID,
            "Naam" => $accountNaam,
            "Email" => $accountEmail,
            "Wachtwoord" => $accountWachtwoord
        ]);
    }

    public function deleteaccount($accountNaam){
        $db = new Database("localhost","root","","donkey_travel");
        
        // Checken waar de supplier id in de database overeenkomt met de gegeven supplier id
        $db->SQLCommando("delete from accounten where naam  = :naam", ["naam" => $accountNaam]);
    }

    public function logInCheckaccount($accountEmail, $accountWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        $TheSame = password_verify($accountWachtwoord, $HashedWachtwoord);

        if($TheSame){
            header("Location: http://localhost/Donkey_Travel/homePagina.php");
        } else{
            echo "We hebben u niet gevonden, probeer opnieuw.";
        }
    }

    public function GegevenVeranderenWachtWoordCheck($accountEmail, $accountWachtwoord, $accountID){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        $TheSame = password_verify($accountWachtwoord, $HashedWachtwoord);

        if($TheSame){
            $this->accountWachtwoord = $HashedWachtwoord;
            $this->accountID = $accountID;
            $this->updateaccount($this->accountID);

            echo "Uw nieuwe gegevens <br>";
            $this->afdrukkenaccount();
        } else{
            echo "Verkeerd wachtwoord ingevoerd, probeer opnieuw.";
        }
    }

    public function VerwijderCheck($accountNaam, $accountWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from account where Naam = :Naam", ["Naam" => $accountNaam]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        $TheSame = password_verify($accountWachtwoord, $HashedWachtwoord);

        if($TheSame){
            return true;
        } else{
            return false;
        }
    }
    
    public function searchaccountNaam($accountNaam){
        $db = new Database("localhost","root","","project_10");

        // Zoeken op account Naam in de database
        $accountList = $db->SQLCommando("select * from account where Naam = :Naam", ["Naam" => $accountNaam]);
    
        // account gegevens opvragen
        foreach ($accountList as $account) {
            $this->accountID = $account["ID"];
            $this->accountNaam = $account["Naam"];
            $this->accountEmail = $account["Email"];
            $this->accountWachtwoord = $account["Wachtwoord"];
        }
    }

    public function searchaccountEmail($accountEmail){
        $db = new Database("localhost","root","","project_10");

        // checken waar de email in de database overeenkomt met de gegeven adress
        $accountList = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);
    
        // supplier gegevens opvragen
        foreach ($accountList as $account) {
            $this->accountID = $account["ID"];
            $this->accountNaam = $account["Naam"];
            $this->accountEmail = $account["Email"];
        }
    }

    // Het laten zien van de huidige gegevens in de class met gebruik van getters
    public function afdrukkenaccount(){
        echo "<p>ID: " . $this->getaccountID() . "<br>";
        echo "Naam: " . $this->getaccountNaam() . "<br>";
        echo "Email: " . $this->getaccountEmail() . "<br></p>";
    }
}