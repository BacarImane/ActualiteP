<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
            <header>
                <div class="pied" > 
                     <h1> actualité Polytechniennes </h1>
                </div>
            </header>
            <div>
                <div id="Menu">
                    <div class="lien">
                        <a href="http://localhost:8888/IAL/Exercice/accueil.php?categorie=Accueil" >Accueil</a>
                    <?php
                require 'Connexion.php';
                $req = "SELECT Categorie ,id FROM Categorie";
                $resultat = $conn->query($req);
                if ($resultat->num_rows > 0) {
                    while($row = $resultat->fetch_assoc()) {
                        echo '<a href="http://localhost:8888/IAL/Exercice/accueil.php?id=' . $row['id']. '&categorie='.$row['Categorie'].'">'.$row['Categorie'].'</a>';
                    }
                } 
                ?>
                  </div>
                </div>
            </div>
            <div>
                <h2> Les derniéres actualités </h1>
            </div>
            <div id="divArticle">
                <?php 
                    if (isset($_GET['categorie'],$_GET['id'])) {
                        $categorie = $_GET['categorie'];
                        $id=(int)$_GET['id'];
                        if ($categorie == "Accueil") {
                            include 'body.php';
                        } else {
                            $req1 = $conn->prepare("SELECT Titre_Article, Article FROM Article WHERE id_categorie = ?");
                            $req1->bind_param("i", $id);
                            $req1->execute();
                            $result = $req1->get_result();
                            $articles = $result->fetch_all(MYSQLI_ASSOC);
                    
                            if (!empty($articles)) {
                                foreach ($articles as $article) {
                                    echo "<h2>".$article['Titre_Article']."</h2>";
                                    echo "<p>".$article['Article']."</p>";
                                }
                            } else {
                                echo "<div class='erreur'> <p>Aucun article trouve pour la categorie </p></div>";
                            }
                        }
                    } else {
                        include 'body.php';
                    }
                
                
                
                
                ?>
            </div>
          <footer>
                <p>COPYRIGHT@IMANE2024</p>
          </footer>
</body>
</html>