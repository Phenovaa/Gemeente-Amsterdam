<?php
include_once 'dashboardconfig.php';

$database = new Database();

if (isset($_GET['verwijder_klacht_id'])) {
    $verwijderKlachtID = $_GET['verwijder_klacht_id'];
    $verwijderResultaat = $database->verwijderKlacht($verwijderKlachtID);

    echo "<div id='messageContainer' class='search-result'>";

    if ($verwijderResultaat) {
        echo "<p id='successMessage' class='success-message'>Klacht met ID $verwijderKlachtID is succesvol verwijderd.</p>";
    } else {
        echo "<p id='errorMessage' class='error-message'>Fout bij het verwijderen van klacht met ID $verwijderKlachtID.</p>";
    }

    echo "</div>";
}
?>
<script>
// Verberg de berichten na 5 seconden
setTimeout(function() {
    document.getElementById('messageContainer').style.display = 'none';
}, 5000);
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheerdersdashboard</title>
    <link rel="stylesheet" href="beheerderdashboard.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>

<?php include 'navbar2.php'; ?>

<div id="container">
    <h1>Beheerdersdashboard</h1>

    <section>
        <h2>Zoeken naar Klacht op Basis van ID</h2>
        <form method="get" action="beheerderdashboard.php">
            Zoeken naar klacht op ID: <input type="text" name="klacht_id">
            <input type="submit" value="Zoeken">
        </form>

        <?php
        if (isset($_GET['klacht_id'])) {
            $klachtID = $_GET['klacht_id'];
            $gevondenKlacht = $database->zoekKlachtOpID($klachtID);

            echo "<div class='search-result'>";

            if ($gevondenKlacht) {
                echo "<p class='success-message'>Klacht met ID $klachtID is gevonden:</p>";
                echo "<table>";
                echo "<thead><tr><th>ID</th><th>Naam</th><th>Email</th><th>Onderwerp</th><th>Klacht</th><th>GPS</th><th>Foto</th><th>Actie</th></tr></thead>";
                echo "<tbody>";
                echo "<tr>";
                echo "<td>" . $gevondenKlacht['id'] . "</td>";
                echo "<td>" . $gevondenKlacht['naam'] . "</td>";
                echo "<td>" . $gevondenKlacht['email'] . "</td>";
                echo "<td>" . $gevondenKlacht['onderwerp'] . "</td>";
                echo "<td>" . $gevondenKlacht['klacht'] . "</td>";
                echo "<td>" . $gevondenKlacht['gps'] . "</td>";
                echo "<td><img src='" . $gevondenKlacht['foto'] . "' alt='Klachtfoto' style='max-width: 100%;'></td>";
                echo "<td><a href='beheerderdashboard.php?verwijder_klacht_id=" . $gevondenKlacht['id'] . "'>Verwijder</a></td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='error-message'>Klacht met ID $klachtID niet gevonden.</p>";
            }

            echo "</div>";
        }
        ?>
    </section>

    <section>
        <h2>5 Meest Recente Klachten</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Onderwerp</th>
                    <th>Klacht</th>
                    <th>GPS</th>
                    <th>Foto</th>                 
                </tr>
            </thead>
            <tbody>
                <?php
                $recenteKlachten = $database->getRecenteKlachten();
                foreach ($recenteKlachten as $klacht) {
                    echo "<tr>";
                    echo "<td>" . $klacht['id'] . "</td>";
                    echo "<td>" . $klacht['naam'] . "</td>";
                    echo "<td>" . $klacht['email'] . "</td>";
                    echo "<td>" . $klacht['onderwerp'] . "</td>";
                    echo "<td>" . $klacht['klacht'] . "</td>";
                    echo "<td>" . $klacht['gps'] . "</td>";
                    echo "<td><img src='" . $klacht['foto'] . "' alt='Klachtfoto' style='max-width: 100%;'></td>";      
                    // Geen verwijderknop voor de 5 meest recente klachten
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section>
        <h2>Klachten op Kaart</h2>

        <div id="map" style="height: 600px;"></div>
        <script>
        var map = L.map('map').setView([51.505, -0.09], 13); // Set default view

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

         
        // Functie om een ​​markering toe te voegen voor een specifieke klacht
        function addMarker(lat, lng, klachtId, naam, klacht) {
            var marker = L.marker([lat, lng]).addTo(map);
            marker.bindPopup('<b>Klacht ID:</b> ' + klachtId + '<br><b>Naam:</b> ' + naam + '<br><b>Klacht:</b> ' + klacht + '<br><b>GPS-coördinaten:</b> ' + lat + ', ' + lng).openPopup();
        }

        // Voeg markeringen toe voor elke recente klacht
        <?php
        foreach ($recenteKlachten as $klacht) {
            $coordinates = explode(',', $klacht['gps']);
            $lat = floatval($coordinates[0]);
            $lng = floatval($coordinates[1]);
            echo "addMarker($lat, $lng, {$klacht['id']}, '{$klacht['naam']}', '{$klacht['klacht']}');\n";
        }
        ?>
        </script>
    </section>

</div>

</body>
</html>
