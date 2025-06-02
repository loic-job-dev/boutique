<div class="container mt-1 mb-5">
    <form action="index.php" method="GET">
        <div class="row justify-content-center border border-dark rounded">
                <div class="col-3">
                    <legend>Tri par prix :</legend>
                    <select id="sortPrice" name="sortPrice">
                        <option value="">Veuillez choisir :</option>
                        <option value="ASC">Ordre croissant</option>
                        <option value="DESC">Ordre décroissant</option>
                    </select>

                </div>
                <div class="col-3">
                    <legend>Fourchette de prix :</legend>
                    <label for="priceMin">Prix minimum :</label>
                    <input type="number" class="form-control w-50 m-auto" id="priceMin" name="priceMin" min="0" value="<?= $_GET["priceMin"] ?? "0" ?>">
                    <label for="priceMax">Prix maximum :</label>
                    <input type="number" class="form-control w-50 m-auto" id="priceMax" name="priceMax" min="0" value="<?= $_GET["priceMax"] ?>">
                </div>
                <div class="col-3">
                    <legend>Catégorie :</legend>
                    <select id="category" name="category">
                        <option value="0">Veuillez choisir :</option>
                        <option value="1">Equipement</option>
                        <option value="2">Nutrition</option>
                        <option value="3">Matériel</option>
                    </select>
                </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-1">
                <input type="submit" name="submit" class="btn btn-primary mt-1" value="Filtrer">
            </div>
        </div>
    </form>

    <form action="/check.php" method="POST">
        <div class="row justify-content-center">

            <?php foreach (updateCatalog($mysqlClient) as $key => $product) {
                //echo $key;  // 0, 1, 2...
                //echo $products[$key]["name"];  // "Casque", "Coquille"... 
            ?>


                <div class="col-6 col-lg-4 my-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h3 class="card-title"><?= $product["name"] ?></h3>
                            <p class="card-text text-wrap">Prix : <?= formatPrice($product["price"]) ?></p>
                            <p class="card-text text-wrap">Prix HT : <?= formatPrice(priceExcludingVAT($product["price"])); ?></p>
                            <p class="card-text text-wrap"><?= $product["description"]; ?></p>
                        </div>
                        <img src="<?= $product["picture"] ?>" alt="<?= $product["name"] ?>" class="card-img-top">

                        <fieldset>
                            <label for="quantity_<?= $key ?>">Quantité :</label>
                            <input type="number" class="form-control w-50 m-auto" id="quantity_<?= $key ?>" name="quantities[<?= $key ?>]" min="0" step="1" value="<?= $_SESSION["commande"][$key]["quantity"] ?? "0" ?>" required>
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