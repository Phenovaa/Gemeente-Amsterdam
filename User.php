<?php
class User {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    // Functie voor het registreren van een nieuwe gebruiker
    public function registerUser($naam, $gebruikersnaam, $wachtwoord, $geboortedatum, $email, $telefoonnummer) {
        // Controleer of de gebruikersnaam al bestaat
        $check_username = "SELECT * FROM user WHERE gebruikersnaam='$gebruikersnaam'";
        $result = $this->conn->query($check_username);

        if ($result->num_rows > 0) {
            echo "Deze gebruikersnaam is al in gebruik.";
            return false;
        }

        // Voeg nieuwe gebruiker toe aan de database
        $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO user (naam, gebruikersnaam, wachtwoord, geboortedatum, email, telefoonnummer) VALUES ('$naam', '$gebruikersnaam', '$hashed_password', '$geboortedatum', '$email', '$telefoonnummer')";

        if ($this->conn->query($insert_query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $insert_query . "<br>" . $this->conn->error;
            return false;
        }
    }

    // Functie voor het inloggen van een gebruiker
    public function loginUser($gebruikersnaam, $wachtwoord) {
        // Haal gebruikersgegevens op
        $get_user_query = "SELECT * FROM user WHERE gebruikersnaam='$gebruikersnaam'";
        $result = $this->conn->query($get_user_query);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            // Controleer het wachtwoord
            if (password_verify($wachtwoord, $user['wachtwoord'])) {
                return true;
            } else {
                echo "Ongeldig wachtwoord.";
                return false;
            }
        } else {
            echo "Gebruiker niet gevonden.";
            return false;
        }
    }
}
?>
