<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <script>
        function toonRegistratiePopup() {
            var code = prompt("Voer de registratiecode in:");

            if (code === "IkHouVanCookie" || code === "Kapsalon" || code === "Sinterklaas") {
                window.location.href = "registratie.php";
            } else {
                alert("Ongeldige registratiecode. Probeer het opnieuw.");
            }
        }
    </script>
</head>
<body>

<header>
<a href="startpagina.php">
        <img class="logo" src="image/AmsterdamLogo.png" alt="Amsterdam-logo" width="225px" height="150" />
    </a>

    <nav>
        <ul class="navbar">
            <li><a href="#">Informatie</a></li>
            <li><a href="klachtpagina.php">Klacht</a></li>
            <li><a href="#">Over ons</a></li>
        </ul>
    </nav>

    <ul class="navbar-2">
        <li><button onclick="toonRegistratiePopup()">registreren</button></li>
        <li><a href="inlog.php"><button>inloggen</button></a></li>
    </ul>
</header>

</body>
</html>
