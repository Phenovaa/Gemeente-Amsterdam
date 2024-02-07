<?php
session_start();

include 'systeemconfig.php';
include 'User.php';

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $geboortedatum = $_POST['geboortedatum'];
    $email = $_POST['email'];
    $telefoonnummer = $_POST['telefoonnummer'];

    // Controleer of de gebruikersnaam al bestaat
    if (!$user->registerUser($naam, $gebruikersnaam, $wachtwoord, $geboortedatum, $email, $telefoonnummer)) {
        // Stel een foutmelding in
        $_SESSION['registratie_error'] = "Deze gebruikersnaam is al in gebruik.";
        // Stuur de gebruiker terug naar het registratieformulier
        header('Location: registratie.php');
        exit;
    } else {
        // Registratie succesvol, doorverwijzen naar login.php
        $_SESSION['registratie_success'] = true;
        header('Location: inlog.php');
        exit;
    }
}
?>
