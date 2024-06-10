<?php 
require "Connexion.php";
$req = "SELECT Titre_article, Article FROM Article";
$resultat = $conn->query($req);

if ($resultat->num_rows > 0) {
    while($row = $resultat->fetch_assoc()) {
        echo '<h3 id="titre">' . $row['Titre_article'] . '</h3>';
        echo '<p id="article">' . $row['Article'] . '</p>';
    }
} else {
    echo '<p>Aucun article trouvé</p>';
}
?>