<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1>Uredi Cjenik</h1>
    <hr>

    <form class="row g-3 mt-3" action="/priceList/update" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $prices['id'] ?>">
        <div class="col-auto">
            <label for="tip_filma" class="mt-1">Tip Filma</label>
        </div>
        <div class="col-6">
            <input type="text" class="form-control" id="tip_filma" name="tip_filma" value="<?= $prices['tip_filma'] ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
        </div>
        <div class="col-auto">
            <a href="/priceList" type="submit" class="btn btn-primary">X</a>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php'); ?>





