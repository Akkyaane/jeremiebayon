<?php 

$sousTotal = 0;
$totalPanier = 0;
$tableauProduits = array(
    "produit1" => ["nom" => "Jeu vidéo", "prix" => 29.99, "quantite" => 2],
    "produit2" => ["nom" => "Saucisson", "prix" => 5.99, "quantite" => 5],
    "produit3"=> ["nom" => "Stylo", "prix" => 3.99, "quantite" => 5],
);

foreach ($tableauProduits as $key => $value) {
    $sousTotal = calculerSousTotal($value);
    $tableauProduits[$key]["sousTotal"] = $sousTotal;
    $totalPanier += $sousTotal;
}

function calculerSousTotal($produit) {
    $sousTotalProduit = $produit['prix'] * $produit['quantite'];
    return $sousTotalProduit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Sous-total</th>
        </thead>
        <tbody>
            <?php foreach ($tableauProduits as $key => $value): ?>
                <tr>
                    <td><?php echo $value['nom']; ?></td>
                    <td><?php echo $value['prix']; ?> €</td>
                    <td><?php echo $value['quantite']; ?></td>
                    <td><?php echo $value['sousTotal']; ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php 
        if ($totalPanier > 50) {
            $totalPanierAvecRemise = $totalPanier - ($totalPanier * 0.10);
            echo "<p>Le montant étant supérieur à 50 euros, vous bénéficiez d'une remise de 10%. Le montant total de votre panier est désormais de $totalPanierAvecRemise euros.</p>";
        } else {
            echo "<p>Le montant total du panier est de $totalPanier euros.</p>";
        }?> 

</body>
</html>

