
<div class="container-fluid mt-5 mb-5 ms-1 me-1">
    <form action="/cart.php" method="POST">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Quantité</th>
                            <th>Prix unitaire TTC</th>
                            <th>Prix total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION["commande"] as $key => $product) {
                            if ($product["quantity"] != 0) { ?>
                                <tr>
                                    <td><?php echo $product["name"] ?></td>
                                    <td><?php echo $product["quantity"] ?>
                                        <label for="quantity_<?= $key ?>"></label>
                                        <input type="number" id="quantity_<?= $key ?>" name="quantities[<?= $key ?>]" min="0" step="1" value="<?= $product["quantity"] ?>" required>
                                        <input type="hidden" name="names[<?= $key ?>]" value="<?= $product['name'] ?>">
                                        <input type="hidden" name="prices[<?= $key ?>]" value="<?= $product['price'] ?>">
                                        <input type="hidden" name="weights[<?= $key ?>]" value="<?= $product['weight'] ?>">
                                    </td>
                                    <td><?php formatPrice($product["price"]) ?></td>
                                    <td><?php formatPrice($product["total_price"]) ?></td>
                                </tr>
                        <?php  }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total articles :</strong></td>
                            <td><strong><?= formatPrice($totalProducts) ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">Poids total :</td>
                            <td><?= $totalWeight . " g" ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">Frais de livarison :</td>
                            <td><?= formatPrice($_SESSION["transportFees"]) ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total à payer :</strong></td>
                            <td><strong><?= formatPrice($_SESSION["totalCart"]) ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <?php require(__DIR__ . '/transport-cart.php'); ?>
                <input type="submit" name="submit" class="btn btn-primary" value="Actualiser">
            </div>
        </div>
    </form>
</div>