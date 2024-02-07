<?php
session_start();

require_once 'systeemconfig.php'; // Inclusie van de systeemconfiguratie

class FormulierVerwerker {
    private $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function verwerkFormulier() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $naam = $_POST["naam"];
            $email = $_POST["email"];
            $onderwerp = $_POST["onderwerp"];
            $klacht = $_POST["klacht"];
            $gps = $_POST["gps"];

            // Foto-uploadverwerking
            $fotoPaths = $this->verwerkFotoUpload();

            // Voeg gegevens toe aan de database
            $stmt = $this->conn->prepare("INSERT INTO klacht (naam, email, onderwerp, klacht, gps, foto) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("ssssss", $naam, $email, $onderwerp, $klacht, $gps, $fotoString);

            $fotoString = implode(',', $fotoPaths);

            $stmt->execute();

            $_SESSION['klacht_ingediend'] = true;

            $stmt->close();

            header("Location: klachtpagina.php");
            exit();
        }
    }

    private function verwerkFotoUpload() {
        $fotoPaths = array();

        if (!empty($_FILES['foto']['name'][0])) {
            $fotoUploadDir = "uploads/";

            if (!is_dir($fotoUploadDir)) {
                mkdir($fotoUploadDir, 0755, true);
            }

            foreach ($_FILES['foto']['name'] as $key => $fotoName) {
                $fotoTmpName = $_FILES['foto']['tmp_name'][$key];
                $fotoPath = $fotoUploadDir . uniqid() . '_' . $fotoName;

                if (move_uploaded_file($fotoTmpName, $fotoPath)) {
                    $fotoPaths[] = $fotoPath;
                }
            }
        }

        return $fotoPaths;
    }
}

// Maak een instantie van de FormulierVerwerker met de databaseverbinding
$formulierVerwerker = new FormulierVerwerker($conn);
$formulierVerwerker->verwerkFormulier();
?>
