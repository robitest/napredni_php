<?php 
include_once base_path('views/partials/header.php') ?>

<main style="height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1 ">
    <h1>Nova Posudba</h1>
    <hr>

    <form class="p-4" action="/rentals/store" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="movie" class="form-label ps-1">Odaberite Film</label>
                <select class="form-select" aria-label="Default select example" name="movie">
                    <option selected>Odaberite Film</option>
                    <?php foreach ($movies as $movie): ?>
                        <option value="<?= $movie['id'] ?>"><?= $movie['naslov'] . " - " . $movie['tip']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col">
                <label for="member" class="form-label ps-1">Odaberite Člana</label>
                <select class="form-select" aria-label="Default select example" name="member">
                    <option selected>Odaberite Člana</option>
                    <?php foreach ($members as $member): ?>
                        <option value="<?= $member['id'] ?>"><?= $member['ime'] ?></option>
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
