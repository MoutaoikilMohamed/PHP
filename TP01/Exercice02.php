
<?php

// Eatblir la Connexion
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=MyDataBase", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie<br>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

// Créer la table PRODUIT
$sql = "CREATE TABLE PRODUIT (
    Id INT(6) PRIMARY KEY,
    PNOM VARCHAR(50),
    COULEUR VARCHAR(50),
    POIDS VARCHAR(20),
    PRIX INT(5)
)";
try {
    $conn->exec($sql);
    echo "Table PRODUIT créée avec succès<br>";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la table PRODUIT : " . $e->getMessage();
}

// Insérer 6 lignes dans la table
$sql = "INSERT INTO PRODUIT (Id, PNOM, COULEUR, POIDS, PRIX) VALUES
    (1, 'ProduitA', 'Rouge', '2 Kg', 400),
    (2, 'ProduitB', 'Bleu', '4 Kg', 250),
    (3, 'ProduitC', 'Vert', '6 Kg', 500),
    (4, 'ProduitD', 'Jaune', '3 Kg', 300),
    (5, 'ProduitE', 'Noir', '5 Kg', 450),
    (6, 'ProduitF', 'Blanc', '1 Kg', 200)";
try {
    $conn->exec($sql);
    echo "Lignes insérées avec succès<br>";
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion des lignes : " . $e->getMessage();
}

// Sélectionner tous le contenu de la table
$sql = "SELECT * FROM PRODUIT";
$result = $conn->query($sql);
echo "Contenu de la table PRODUIT :<br>";
foreach ($result as $row) {
    print_r($row);
    echo "<br>";
}

// Sélectionner les produits dont le prix est supérieur à 300DH et ordonner les par prix
$sql = "SELECT * FROM PRODUIT WHERE PRIX > 300 ORDER BY PRIX";
$result = $conn->query($sql);
echo "Produits dont le prix est supérieur à 300DH, triés par prix :<br>";
foreach ($result as $row) {
    print_r($row);
    echo "<br>";
}

// Afficher le nom et la couleur des produits dont le poids est inférieur à 5 Kg et ordonner les par prix
$sql = "SELECT PNOM, COULEUR FROM PRODUIT WHERE POIDS < '5 Kg' ORDER BY PRIX";
$result = $conn->query($sql);
echo "Produits dont le poids est inférieur à 5 Kg, triés par prix :<br>";
foreach ($result as $row) {
    print_r($row);
    echo "<br>";
}

// Modifier le prix du produit dont l'id est 3
$sql = "UPDATE PRODUIT SET PRIX = 550 WHERE Id = 3";
try {
    $conn->exec($sql);
    echo "Prix du produit avec l'id 3 modifié avec succès<br>";
} catch (PDOException $e) {
    echo "Erreur lors de la modification du prix : " . $e->getMessage();
}

// Supprimer le dernier produit de la table
$sql = "DELETE FROM PRODUIT WHERE Id = (SELECT MAX(Id) FROM PRODUIT)";
try {
    $conn->exec($sql);
    echo "Dernier produit supprimé avec succès<br>";
} catch (PDOException $e) {
    echo "Erreur lors de la suppression du dernier produit : " . $e->getMessage();
}

// Supprimer la table PRODUIT
$sql = "DROP TABLE PRODUIT";
try {
    $conn->exec($sql);
    echo "Table PRODUIT supprimée avec succès<br>";
} catch (PDOException $e) {
    echo "Erreur lors de la suppression de la table PRODUIT : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;

?>