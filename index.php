    <?php $title = "Boutique en ligne de loic-job-dev";
    require(__DIR__ . '/header.php'); ?>

        <div class="container mt-5 mb-2">
            <div class="row justify-content-center">
                <div class="col">
                    <a href="cart.php" class="btn btn-primary">Mon panier</a>
                </div>
            </div>
        </div>

        <?php
        $sqlQuerry = "SELECT * FROM products";
        $productsStatement = $mysqlClient->prepare($sqlQuerry);
        $productsStatement->execute();
        $productsBDD = $productsStatement->fetchAll();

        foreach ($productsBDD as $productBDD) { ?>
            <p><?php echo $productBDD["name"];?></p>
        <?php
        }
        ?>

        <?php require(__DIR__ . '/multidimensional-catalog.php'); ?>


        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col offset-1">
                    <a href="cart.php" class="btn btn-primary">Mon panier</a>
                </div>
            </div>
        </div>

    <?php require(__DIR__ . '/footer.php'); ?>
