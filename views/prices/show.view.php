<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1><?= $prices['tip_filma'] ?></h1>
    <hr>
    <form class="row g-3 mt-3" action="#" method="POST">
        <div class="row">
            <div class="col-2">
                <label for="genre_id" class="mt-1">Id Žanra:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="genreId" name="genre_id" value="<?= $prices['id'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="genre_type" class="mt-1">Naziv Žanra:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="genre_type" name="genre_type" value="<?= $prices['tip_filma'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="genre_type" class="mt-1">Naziv Žanra:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="genre_type" name="genre_type" value="<?= $prices['cijena'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="genre_type" class="mt-1">Naziv Žanra:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="genre_type" name="genre_type" value="<?= $prices['zakasnina_po_danu'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-auto">
            <a href="/prices" type="submit" class="btn btn-primary">Natrag na Cjenik</a>
            </div>
        </div>
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>