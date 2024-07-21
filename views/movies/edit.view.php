<?php include_once base_path('views/partials/header.php'); ?>

<main style="height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1 ">
    <h1>Uredi Film</h1>
    <hr>

    <form class="row g-3 mt-3" action="/movies/update" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $movies['id'] ?>">
        <div class="row mb-3">
            <div class="col">
                <label for="movie_title" class="form-label ps-1">Naslov Filma</label>
                <input type="text" class="form-control" id="movieTitle" name="movie_title" value="<?= $movies['naslov'] ?>">
            </div>
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Godina</label>
                <input type="number" class="form-control" id="movieYear" name="movie_year" value="<?= $movies['godina'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Žanr</label>
                <select class="form-select" aria-label="Default select example" name="genre">
                    <option selected value="<?= isset($movies['zanr_id']) ?>"><?= isset($movies['zanr_id']) ? $movies['ime_zanra'] : 'Videoteka Admin'?></option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?= $genre['id']?>"><?= $genre['ime'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col">
                <label for="movie_year" class="form-label ps-1">Cjenik</label>
                <select class="form-select" aria-label="Default select example" name="price">
                    <option selected value="<?= isset($movies['cjenik_id']) ?>"><?= isset($movies['cjenik_id']) ? $movies['tip_filma'] : 'Videoteka Admin'?></option>
                    <?php foreach ($priceList as $priceItem): ?>
                        <option value="<?= $priceItem['id'] ?>"><?= $priceItem['tip_filma'] . " - Cijena " .  $priceItem['cijena'] . " EUR - zakasnina_po_danu " . $priceItem['zakasnina_po_danu'] . " EUR"?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
            <a href="/movies" type="submit" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cancel">X</a>
        </div>
    </form>

</main>
