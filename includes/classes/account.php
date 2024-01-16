<?php 

require_once "connect.php";

// Vincent Kroon

class Account{
    private int $accountID;
    private string $accountNaam;
    private string $accountEmail;
    private string $accountWachtwoord;

    // wanneer de class wordt aangemaakt met | new Account() | dan worden er standaard gegevens ingezet op de variabelen bovenaan
    public function __construct($accountNaam="", $accountWachtwoord="", $accountEmail="", $accountID=0){
        $this->accountNaam = $accountNaam;
        $this->accountEmail = $accountEmail;
        $this->accountWachtwoord = $accountWachtwoord;
        $this->accountID = $accountID;
    }

    // Getters
    public function getAccountID(){
        return $this->accountID;
    }
    public function getAccountNaam(){
        return $this->accountNaam;
    }
    public function getAccountEmail(){
        return $this->accountEmail;
    }
    public function getAccountWachtwoord(){
        return $this->accountWachtwoord;
    }

    // Setters
    public function setAccountID($accountID){
        $this->accountID = $accountID;
    }
    public function setAccountNaam($accountNaam){
        $this->accountNaam = $accountNaam;
    }
    public function setAccountEmail($accountEmail){
        $this->accountEmail = $accountEmail;
    }
    public function setAccountWachtwoord($accountWachtwoord){
        $this->accountWachtwoord = $accountWachtwoord;
    }

    // CRUD
    public function createAccount(){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        // gegevens in variabelen zetten via de getters
        $accountID = NULL;
        $accountNaam = $this->getaccountNaam();
        $accountEmail = $this->getAccountEmail();
        $accountWachtwoord = $this->getAccountWachtwoord();

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

    public function readAccounts(){
        $db = new Database("localhost","root","","project10");

        // Alle account gegevens in de database opvragen
        $accountList = $db->SQLCommando("select * from account where 1",[]);

        echo "<table>"; 
        echo "<th>ID</th>";
        echo "<th>Naam</th>";
        echo "<th>Email</th>";
        echo "</tr>";

        // Alle account gegevens laten zien
        foreach($accountList as $account){
            echo "<tr>";
            echo "<td>" . $account["ID"] . "</td>";
            echo "<td>" . $account["naam"] . "</td>";
            echo "<td>" . $account["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function updateAccount($accountID){
        $db = new Database("localhost","root","","project_10");

        $accountID = $this->getAccountID();
        $accountNaam = $this->getAccountNaam();
        $accountEmail = $this->getAccountEmail();
        $accountWachtwoord = $this->getAccountWachtwoord();

        // Veranderen van de gegevens in de database gebaseerd op de gegeven account id
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

    public function deleteAccount($accountNaam){
        $db = new Database("localhost","root","","project_10");
        
        // Checken waar de account id in de database overeenkomt met de gegeven account id
        $db->SQLCommando("delete from account where naam  = :naam", ["naam" => $accountNaam]);
    }

    public function logInCheckAccount($accountEmail, $accountWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);

        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        $TheSame = password_verify($accountWachtwoord, $HashedWachtwoord);

        if($TheSame){
            header("Location: http://localhost/Donkey_Travel/userPagina.php");
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
            $this->updateAccount($this->accountID);

            echo "Uw nieuwe gegevens <br>";
            $this->afdrukkenAccount();
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
    
    public function searchAccountNaam($accountNaam){
        $db = new Database("localhost","root","","project_10");

        // Zoeken op account naam in de database
        $accountList = $db->SQLCommando("select * from account where Naam = :Naam", ["Naam" => $accountNaam]);
    
        // account gegevens opvragen
        foreach ($accountList as $account) {
            $this->accountID = $account["ID"];
            $this->accountNaam = $account["Naam"];
            $this->accountEmail = $account["Email"];
            $this->accountWachtwoord = $account["Wachtwoord"];
        }
    }

    public function searchAccountEmail($accountEmail){
        $db = new Database("localhost","root","","project_10");

        // checken waar de email in de database overeenkomt met de gegeven adress
        $accountList = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);
    
        // account gegevens opvragen
        foreach ($accountList as $account) {
            $this->accountID = $account["ID"];
            $this->accountNaam = $account["Naam"];
            $this->accountEmail = $account["Email"];
        }
    }

    // Het laten zien van de huidige gegevens in de class met gebruik van getters
    public function afdrukkenAccount(){
        echo "<p>ID: " . $this->getAccountID() . "<br>";
        echo "Naam: " . $this->getAccountNaam() . "<br>";
        echo "Email: " . $this->getAccountEmail() . "<br></p>";
    }
}