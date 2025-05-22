<div class="container-fluid mt-5 mb-2">
    <form action="/cart.php" method="POST">
        <div class="row justify-content-center">
            <fieldset>
                <legend>Choix du transporteur :</legend>
                <select id="transporter" name="transporter" required>
                    <option value="<?= $transportFees[$_SESSION["transporterChosen"]] ?? "" ?>"><?= $transportFees[$_SESSION["transporterChosen"]]["name"] ?? "Veuillez choisir :"?> </option>
                    <option value="punch">One punch delivery</option>
                    <option value="kravkage">KravKage</option>
                    <option value="blackbelt">BlackBelt Express</option>
                </select>
            </fieldset>
        </div>
    </form>
</div>