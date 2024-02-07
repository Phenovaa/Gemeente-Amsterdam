<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="inlog.css">
</head>
<body>

<?php
session_start();

include 'navbar.php';
?>

<section>
    <h2>Account Inloggen</h2>
    <form action="inlogproces.php" method="post">
        Gebruikersnaam: <input type="text" name="gebruikersnaam" required><br>
        Wachtwoord: <input type="password" name="wachtwoord" required><br>
        <input class="button" type="submit" value="Inloggen">
    </form>

    <?php
    // Toon foutmelding als deze is ingesteld
    if (isset($_SESSION['login_error'])) {
        echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']); // Verwijder de foutmelding na weergave
    }

    // Toon registratie succesmelding als deze is ingesteld
    if (isset($_SESSION['registratie_success']) && $_SESSION['registratie_success']) {
        echo '<p class="success-message">Account is aangemaakt. U kunt nu inloggen.</p>';
        unset($_SESSION['registratie_success']); // Verwijder de succesmelding na weergave
    }
    ?>
</section>

</body>
</html>
