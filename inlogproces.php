<?php
session_start();

include 'systeemconfig.php';
include 'User.php';

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    // Controleer of de inloggegevens juist zijn
    if (!$user->loginUser($gebruikersnaam, $wachtwoord)) {
        // Stel een foutmelding in
        $_SESSION['login_error'] = "Ongeldige gebruikersnaam of wachtwoord.";
        // Stuur de gebruiker terug naar het inlogformulier
        header('Location: inlog.php');
        exit;
    } else {
        // Inloggen succesvol, doe wat je nodig hebt
        $_SESSION['login_success'] = true;
        header('Location: beheerderdashboard.php');
        exit;
    }
}
?>
