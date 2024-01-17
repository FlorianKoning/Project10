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
        $db = new Database("localhost","root","","project_10");
        $rowCount = 1;

        // Alle account gegevens in de database opvragen
        $accountList = $db->SQLCommando("select * from account where 1",[]);
        if (empty($accountList)) {
            echo "<h1 style='text-align: center; color: #fff;'>Geen data gevonden, database is leeg!</h1>";
        } elseif (!empty($accountList)) {
            echo "<thead>";
            echo "<th scope='col'>#</th>";  
            echo "<th scope='col'>ID</th>";
            echo "<th scope='col'>Naam</th>";
            echo "<th scope='col'>Email</th>";
            echo "<th scope='col'>Delete</th>";
            echo "</tr>";   
            echo "</thead>";

            // Alle account gegevens laten zien
            foreach($accountList as $account){
                echo "<tr>";
                echo "<th scope='row'>" . $rowCount . "</th>";
                echo "<td>" . $account["ID"] . "</td>";
                echo "<td>" . $account["Naam"] . "</td>";
                echo "<td>" . $account["Email"] . "</td>";
                echo "<td> <form action='adminDeleteKlant.php' method='POST'><button class='btn btn-primary' type='submit' name='DELETE' value='" . $account["ID"] . "'>Delete</button></form></td>";
                echo "</tr>";
                $rowCount++;
            }
        } else {
            echo "how?";
        }
        
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

    public function deleteAccount($ID){
        $db = new Database("localhost","root","","project_10");
        
        // Checken waar de account id in de database overeenkomt met de gegeven account id
        $db->SQLCommando("delete from account where ID  = :ID", ["ID" => $ID]);
    }

    public function logInCheckAccount($accountEmail, $accountWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);

        // Haal het gehashed wachtwoord uit de database
        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        // Verifiert het inkomende wachtwoord met de opgeslagen wachtwoord
        $TheSame = password_verify($accountWachtwoord, $HashedWachtwoord);

        // Als de wachtwoorden gelijk zijn dan stuurt de functie naar userPagina.php of als het niet zo is geeft het een message
        if($TheSame){
            header("Location: http://localhost/project10/includes/html/userPagina.php");
        } else{
            echo "We hebben u niet gevonden, probeer opnieuw.";
        }
    }

    public function GegevenVeranderenWachtWoordCheck($accountEmail, $accountWachtwoord, $accountID){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);

        // Haal het gehashed wachtwoord uit de database
        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        // Verifiert het inkomende wachtwoord met de opgeslagen wachtwoord
        $TheSame = password_verify($accountWachtwoord, $HashedWachtwoord);

        // Als de wachtwoorden gelijk zijn dan voert het de updateAccount functie uit en vervangt de gegevens in de database
        if($TheSame){
            $this->accountWachtwoord = $HashedWachtwoord;
            $this->accountID = $accountID;
            $this->updateAccount($this->accountID);

            // Laat de nieuwe gegevens zien
            echo "Uw nieuwe gegevens <br>";
            $this->afdrukkenAccount();
        } else{
            echo "Verkeerd wachtwoord ingevoerd, probeer opnieuw.";
        }
    }

    public function VerwijderCheck($accountEmail, $accountWachtwoord){
        // Connectie maken met de database 
        $db = new Database("localhost","root","","project_10");

        $HashedWachtwoord = "Niks";

        $logins = $db->SQLCommando("select * from account where Email = :Email", ["Email" => $accountEmail]);

        // Haal het gehashed wachtwoord uit de database
        foreach($logins as $login){
            $HashedWachtwoord = $login["Wachtwoord"];
        }

        // Verifiert het inkomende wachtwoord met de opgeslagen wachtwoord
        $TheSame = password_verify($accountWachtwoord, $HashedWachtwoord);

        // Het geeft de functie de value om te confirmeren dat het wachtwoord juist is
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