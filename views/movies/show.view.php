<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1><?= $movies['naslov'] ?></h1>
    <hr>
    <form class="row g-3 mt-3" action="#" method="POST">
        <div class="row">
            <div class="col-2">
                <label for="zanr" class="mt-1">Id Filma:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="zanr" name="zanr" value="<?= $movies['id'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="zanr" class="mt-1">Naslov Filma:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="zanr" name="zanr" value="<?= $movies['naslov']?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="zanr" class="mt-1">Godina Filma:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="zanr" name="zanr" value="<?= $movies['godina'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="zanr" class="mt-1">Žanr:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="zanr" name="zanr" value="<?= $movies['zanr'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="zanr" class="mt-1">Cjenik:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="zanr" name="zanr" value="<?= $movies['tip_filma']  ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-auto">
            <a href="/movies" type="submit" class="btn btn-primary">Natrag na Filmove</a>
            </div>
        </div>
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>