<?php include_once base_path('views/partials/header.php'); 
?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1>Uredi Cjenik</h1>
    <hr>

    <form class="row g-3 mt-3" action="/prices" method="PATCH">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $prices['id'] ?>">
        <div class="row mt-3">
            <div class="col-2">
                <label for="price_type" class="mt-1">Tip Filma:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="price_type" name="price_type" value="<?= $prices['tip_filma'] ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="price_amount" class="mt-1">Cijena:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="price_amount" name="price_amount" value="<?= $prices['cijena'] ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="late_fee" class="mt-1">Zakasnina po danu:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="late_fee" name="late_fee" value="<?= $prices['zakasnina_po_danu'] ?>">
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
            <a href="/prices" type="submit" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cancel">X</a>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php'); ?>





