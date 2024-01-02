<?php
echo "<div class='container'>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

    if ($quantity > 0) {
        // Afficher le formulaire pour entrer les codes EAN-13
        echo "<form action='generate_keys.php' method='post'>";
        for ($i = 1; $i <= $quantity; $i++) {
            echo "<div style='background-color: #F26334; padding: 20px; text-align: center;'>";
            echo "<label style='color: #fff; for='ean$i'>Code EAN-13 - $i :</label>";
            echo "<input type='text' name='ean$i' maxlength='12' required><br> <br>";

            
        }
        echo "<input type='hidden' name='quantity' value='$quantity'>";
        echo "<input type='submit'style='color:#002C6C' value='Générer les clés' >";
        echo "</form>";
        //  un lien pour revenir à la page de saisie de la quantité
        echo "<br><br><a href='index.html' style='color:#002C6C'><p>Revenir à page précédente</p></a>";
        echo "</div>";
    } else {
        echo "Veuillez entrer un nombre valide au moins 12 chiffres.";
        //  un lien pour revenir à la page de saisie de la quantité
        echo "<br><br><a href='index.html'><p style='color: red;'>Revenir à page précédente</p></a>";
    }
} else {
    echo "Accès non autorisé.";
}
include('footer.php');
?>
