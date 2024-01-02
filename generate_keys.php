<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    

    if ($quantity > 0) {

        for ($i = 1; $i <= $quantity; $i++) {
            $ean = isset($_POST["ean$i"]) ? $_POST["ean$i"] : '';
            $check_digit = generateCheckDigit($ean);
            $ean13 = $ean . $check_digit;

            echo "<div style='background-color: #F26334; padding: 2px; text-align: center;'>";
            echo "<h2 style='color: #fff;'>  $i Code EAN-13 complet :</h2>";
            echo "<p style='font-size: 24px; color: #fff;'>$ean<span style='color: #2ecc71;'>$check_digit</span></p>";
            //  lien pour générer le code-barres
            echo "<br><br><a href='generate_barcode.html?ean=$ean$check_digit'><p style='color: #002C6C;'>Générer le Code-Barres</p></a>";
            
        }
    } else {
        echo "Veuillez entrer un nombre valide.";
    }
} else {
    echo "Accès non autorisé.";
}
            //  un lien pour revenir à la page de saisie de la quantité
            echo "<br><br><a href='index.html'><p style='color: #002C6C;'>Générer un nouveau code EAN-13 (12 chiffres).</p></a>";
            echo "</div>";

function generateCheckDigit($ean) {
    $sum = 0;

    for ($i = 0; $i < 12; $i++) {
        $digit = (int)$ean[$i];
        $sum += ($i % 2 === 0) ? $digit : $digit * 3;
    }

    $remainder = $sum % 10;
    return ($remainder === 0) ? 0 : 10 - $remainder;
}
include('footer.php');
?>
