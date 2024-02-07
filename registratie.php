<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="registratie.css">
</head>

<?php
session_start();

include 'navbar.php';
?>

<section>
  <h2>Account Registratie</h2>
  <form action="registratieproces.php" method="post">
    Naam: <input type="text" name="naam" required><br>
    Gebruikersnaam: <input type="text" name="gebruikersnaam" required><br>
    Wachtwoord: <input type="password" name="wachtwoord" required><br>
    Geboortedatum: <input type="date" name="geboortedatum" required><br>
    Email: <input type="email" name="email" required><br>
    Telefoonnummer: <input type="tel" name="telefoonnummer" required><br>
    <input class="button" type="submit" value="Registreren">
  </form>

  <?php
    // Toon foutmelding als deze is ingesteld
    if (isset($_SESSION['registratie_error'])) {
        echo '<p class="error-message">' . $_SESSION['registratie_error'] . '</p>';
        unset($_SESSION['registratie_error']); // Verwijder de foutmelding na weergave
    }
  ?>

</section>

</body>
</html>
