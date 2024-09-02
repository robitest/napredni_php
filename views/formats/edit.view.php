<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1>Uredi Medij</h1>
    <hr>

    <form class="row g-3 mt-3" action="/formats/update" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $format['id'] ?>">
        <div class="row mb-3">
            <div class="col">
                <label for="media_type" class="form-label ps-1">Tip Medija</label>
                <input type="text" class="form-control" id="mediaType" name="media_type" value="<?= $format['tip'] ?>">
            </div>
            <div class="col">
                <label for="last_name" class="form-label ps-1">Koeficijent</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $format['koeficijent'] ?>">
            </div>
        </div>
       
        <div class="col-3">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
            <a href="/media" type="submit" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cancel">X</a>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php'); ?>