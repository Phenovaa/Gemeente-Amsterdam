<?php

require_once('systeemconfig.php');

class Database
{
    private $host;
    private $gebruikersnaam;
    private $wachtwoord;
    private $database;

    private $verbinding;

    public function __construct()
    {
        global $servername, $username, $password, $dbname;
        
        $this->host = $servername;
        $this->gebruikersnaam = $username;
        $this->wachtwoord = $password;
        $this->database = $dbname;

        // Maak een verbinding met de database
        $this->verbinding = new mysqli($this->host, $this->gebruikersnaam, $this->wachtwoord, $this->database);

        // Controleer op verbinding
        if ($this->verbinding->connect_error) {
            die("Verbinding mislukt: " . $this->verbinding->connect_error);
        }
    }

    public function getRecenteKlachten()
    {
        // Query om de meest recente 5 klachten op te halen
        $query = "SELECT id, naam, email, onderwerp, klacht, gps, foto FROM klacht ORDER BY id DESC LIMIT 5";
        // Voer de query uit
        $resultaat = $this->verbinding->query($query);

        // Controleer op resultaten
        if ($resultaat->num_rows > 0) {
            // Return resultaten als een associatieve array
            return $resultaat->fetch_all(MYSQLI_ASSOC);
        } else {
            // Return een lege array als er geen resultaten zijn
            return [];
        }
    }

    public function zoekKlachtOpID($klachtID)
    {
        // Voorkom SQL-injectie door het klachtID te ontsnappen
        $klachtID = $this->verbinding->real_escape_string($klachtID);
        // Query om een specifieke klacht op te halen op basis van ID
        $query = "SELECT id, naam, email, onderwerp, klacht, gps, foto FROM klacht WHERE id = $klachtID";
        // Voer de query uit
        $resultaat = $this->verbinding->query($query);

        // Controleer op resultaten
        if ($resultaat->num_rows > 0) {
            // Return resultaat als een associatieve array
            return $resultaat->fetch_assoc();
        } else {
            // Return null als er geen resultaten zijn
            return null;
        }
    }

    public function verwijderKlacht($klachtID)
    {
        // Voorkom SQL-injectie door het klachtID te ontsnappen
        $klachtID = $this->verbinding->real_escape_string($klachtID);
        // Query om een klacht te verwijderen op basis van ID
        $query = "DELETE FROM klacht WHERE id = $klachtID";
        // Voer de query uit
        $resultaat = $this->verbinding->query($query);

        // Return het resultaat van de verwijderingsquery
        return $resultaat;
    }
}

?>
