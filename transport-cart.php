<html lang="fr">

<head>
    <meta name="description" content="Boutique en ligne non-officielle de loic-job-dev">
    <title>Formulaire pour le choix du transporteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>

<div class="container mt-5 mb-5">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row justify-content-center">
            <fieldset>
                <legend>Choix du transporteur :</legend>
                <select id="transporter" name="transporter" required>
                    <option value="">Votre livreur</option>
                    <option value="punch">One punch delivery</option>
                    <option value="kravkage">KravKage</option>
                    <option value="blackbelt">BlackBelt Express</option>
            </fieldset>
            <input type="submit" name="submit" class="btn btn-primary" value="Commander">
        </div>
    </form>
</div>