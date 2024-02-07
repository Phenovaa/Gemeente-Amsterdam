<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemeente Amsterdam - Klachtenformulier</title>
    <link rel="stylesheet" href="klachtpagina.css">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <section>
        <h2>Klachtenformulier</h2>
        <?php
        if (isset($_SESSION['klacht_ingediend']) && $_SESSION['klacht_ingediend']) {
            echo "<p class='succes-bericht'>Klacht succesvol ingediend!</p>";
            unset($_SESSION['klacht_ingediend']);
        }
        ?>
        <form action="klachtproces.php" method="post" enctype="multipart/form-data">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="onderwerp">Onderwerp:</label>
            <input type="text" id="onderwerp" name="onderwerp" required />

            <label for="klacht">Klacht:</label>
            <textarea id="klacht" name="klacht" rows="4" required></textarea>

            <label for="gps">GPS-coördinaten voor OpenStreetMap:</label>
            <input type="text" id="gps" name="gps" required />

            <label for="foto">Foto's uploaden:</label>
            <input type="file" id="foto" name="foto[]" accept="image/*" multiple />

            <div class="form-footer">
                <input type="submit" value="Verstuur klacht" />
                <?php
                if (isset($_SESSION['klacht_ingediend']) && $_SESSION['klacht_ingediend']) {
                    echo "<p class='succes-bericht-mobile'>Klacht succesvol ingediend!</p>";
                }
                ?>
            </div>
        </form>
    </section>
</body>
</html>
