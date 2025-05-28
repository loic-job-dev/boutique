<div class="container mt-1 mb-5">
    <form action="/check.php" method="POST">
        <div class="row justify-content-center">

            <?php foreach (getAllproducts ($mysqlClient) as $key => $product) { 
                //echo $key;  // 0, 1, 2...
                //echo $products[$key]["name"];  // "Casque", "Coquille"... ?>
            
            <!-- $key est l’identifiant unique (gants, coquille, etc.).
            $product est le tableau de données du produit (nom, prix, poids, image…). -->

                <div class="col-6 col-lg-4 my-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h3 class="card-title"><?= $product["name"] ?></h3>
                            <p class="card-text text-wrap">Prix : <?= formatPrice($product["price"]) ?></p>
                            <p class="card-text text-wrap">Prix HT : <?= formatPrice(priceExcludingVAT($product["price"])); ?></p>
                            <p class="card-text text-wrap">Description : <?= $product["description"]; ?></p>
                        </div>
                        <img src="<?= $product["picture"] ?>" alt="<?= $product["name"] ?>" class="card-img-top">

                        <fieldset>
                            <label for="quantity_<?= $key ?>">Quantité :</label>
                            <input type="number" class="form-control w-50 m-auto" id="quantity_<?= $key ?>" name="quantities[<?= $key ?>]" min="0" step="1" value="<?=$_SESSION["commande"][$key]["quantity"] ?? "0"?>" required>
                            <!-- Tous les noms de champs utilisent name="champs[<?= $key ?>]" pour lier les données à chaque produit unique. -->
                        </fieldset>
                    </div>
                </div>
            <?php }; ?>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Commander">
        <!-- Le </form> est en dehors de la boucle, c’est un seul formulaire pour tous les produits. -->

    </form>
</div>