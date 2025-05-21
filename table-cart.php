<html lang="fr">

<head>
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Tableau récapitulatif de la commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col">
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
                    <?php foreach ($_SESSION["commande"] as $key => $product) { ?>
                        <tr>
                            <td><?php echo $product["name"] ?></td>
                            <td><?php echo $product["quantity"] ?></td>
                            <td><?php formatPrice($product["price"]) ?></td>
                            <td><?php formatPrice($product["total_price"]) ?></td>
                        </tr>
                    <?php } ?>
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
                        <td><strong><?= formatPrice($_SESSION[$totalCart]) ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>