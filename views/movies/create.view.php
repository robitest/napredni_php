<?php 
include_once base_path('views/partials/header.php') ?>

<main style="height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1 ">
    <h1>Dodaj novi Film</h1>
    <hr>

    <form class="p-4" action="/movies/store" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="movie_title" class="form-label ps-1">Naslov Filma</label>
                <input type="text" class="form-control <?= isset($errors['naslov']) ? 'is-invalid' : '' ?>" id="movieTitle" name="movie_title" value="<?= isset($returnData['naslov']) ? $returnData['naslov'] : '' ?>"><!--  value ubacit i za ostale -->
                <span class="invalid-feedback"><?= $errors['naslov'] ?? '' ?></span>
            </div>
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Godina</label>
                <input type="number" class="form-control <?= isset($errors['godina']) ? 'is-invalid' : '' ?>" id="movieYear" name="movie_year"><!--  $_POST['zanr'] => 'Novi zanr'; -->
                <span class="invalid-feedback"><?= $errors['godina'] ?? '' ?></span>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <label for="movie_genre" class="form-label ps-1">Žanr</label>
                <select class="form-select <?= isset($errors['zanr']) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="movie_genre">
                    <option selected value="">Odaberite zanr</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?= $genre['id'] ?>"><?= $genre['ime'] ?></option>
                    <?php endforeach ?>
                </select>
                <span class="invalid-feedback"><?= $errors['zanr'] ?? '' ?></span>
            </div>
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Cjenik</label>
                <select class="form-select <?= isset($errors['cijena']) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="price">
                    <option selected value="">Odaberite cijenu</option>
                    <?php foreach ($priceList as $price): ?>
                        <option value="<?= $price['id'] ?>"><?= $price['tip_filma'] . " - Cijena " .  $price['cijena'] . " EUR - zakasnina_po_danu " . $price['zakasnina_po_danu'] . " EUR"?></option>
                    <?php endforeach ?>
                </select>
                <span class="invalid-feedback"><?= $errors['cijena'] ?? '' ?></span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="dvd_stock" class="form-label ps-1">DVD količina</label>
                <input type="number" class="form-control" id="dvdStock" name="dvd_stock">
            </div>
            <div class="col">
                <label for="blu-ray_stock" class="form-label ps-1">Blu-ray količina</label>
                <input type="number" class="form-control" id="blu-ray_stock" name="blu-ray_stock">
            </div>
            <div class="col">
                <label for="vhs_stock" class="form-label ps-1">VHS količina</label>
                <input type="number" class="form-control" id="vhsStock" name="vhs_stock">
            </div>
        </div>

        <div class="col-3 mt-4">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
        </div>

    </form>

</main>

<?php include_once base_path('views/partials/footer.php') ?>