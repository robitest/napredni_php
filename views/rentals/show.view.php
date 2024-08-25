<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <div class="title flex-between">
        <h1>Posudba Film na DVD<? // ime i tip filma ?></h1>
        <div class="text-bg-danger px-3 pt-1 rounded">
            <h3>U posudbi</h3>
        </div>
    </div>
    <hr>

    <table class="table text-center ">
        <thead>
            <tr>
                <th>Dani posudbe</th>
                <th>Cijena za prvi dan</th>
                <th>Dani kašnjenja</th>
                <th>Zakasnina po danu</th>
                <th>Zakasnina ukupno</th>
                <th>Ukupno dugovanje</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>48</td>
                <td>3.00 €</td>
                <td>47</td>
                <td>0.50 €</td>
                <td>23.50 €</td>
                <td>26.50 €</td>
            </tr>
        </tbody>
    </table>


    <form class="row g-3 mt-3" action="#" method="POST">
    <div class="row">
        <div class="row mb-3">
            <div class="col">
                <label for="rental_date" class="form-label ps-1">Datum Posudbe</label>
                <input type="text" class="form-control" id="rentalDate" name="rental_date" value="<?= $rental['datum_posudbe'] ?>" disabled>
            </div>
            <div class="col">
                <label for="return_date" class="form-label ps-1">Datum Povrata</label>
                <input type="text" class="form-control" id="returnDate" name="return_date" value="<?= $rental['datum_povrata'] ?>" disabled>
            </div>
            <div class="col">
                <label for="last_change_timestamp" class="form-label ps-1">Vrijeme zadnje promjene</label>
                <input type="text" class="form-control" id="lastChangeTimestamp" name="last_change_timestamp" value="<?= $rental['updated_at'] ?>" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="member" class="form-label ps-1">Clan</label>
                <input type="text" class="form-control" id="member" name="member" value="<?= $rental['clan_id'] ?>" disabled>
            </div>
            <div class="col">
                <label for="movie" class="form-label ps-1">Film</label>
                <input type="text" class="form-control" id="movie" name="movie" value="<?= $rental['clan_id'] ?>" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="member" class="form-label ps-1">Medij</label>
                <input type="text" class="form-control" id="member" name="member" value="DVD" disabled>
            </div>
            <div class="col">
                <label for="movie" class="form-label ps-1">Cijena</label>
                <input type="text" class="form-control" id="movie" name="movie" value="<?= '3.00 € - Ne-hit' ?>" disabled>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-auto me-auto">
                <a href="<?= $_SERVER['HTTP_REFERER'] ?>" type="submit" class="btn btn-primary">Natrag</a>
            </div>
            <div class="col-auto">
                <a href="/movies/edit" type="submit" class="btn btn-info">Uredi</a>
            </div>
        </div>
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>