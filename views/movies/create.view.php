<?php 
include_once base_path('views/partials/header.php') ?>

<main style="height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1 ">
    <h1>Dodaj novi Film</h1>
    <hr>

    <form class="p-4" action="/movies/store" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="movie_title" class="form-label ps-1">Naslov Filma</label>
                <input type="text" class="form-control" id="movieTitle" name="movie_title"><!--  $_POST['first_name'] => 'Novo Ime'; -->
            </div>
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Godina</label>
                <input type="number" class="form-control" id="movieYear" name="movie_year"><!--  $_POST['last_name'] => 'Novo Prezime'; -->
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Žanr</label>
                <select class="form-select" aria-label="Default select example" name="genre">
                    <option selected>Odaberite zanr</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?= $genre['id'] ?>"><?= $genre['ime'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Cjenik</label>
                <select class="form-select" aria-label="Default select example" name="price">
                    <option selected>Odaberite cijenu</option>
                    <?php foreach ($priceList as $priceItem): ?>
                        <option value="<?= $priceItem['id'] ?>"><?= $priceItem['tip_filma'] . " - Cijena " .  $priceItem['cijena'] . " EUR - zakasnina_po_danu " . $priceItem['zakasnina_po_danu'] . " EUR"?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-3 mt-4">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php') ?>