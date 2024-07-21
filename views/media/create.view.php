<?php 
include_once base_path('views/partials/header.php') ?>

<main style="height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1 ">
    <h1>Novi Medij</h1>
    <hr>

    <form class="p-4" action="/media/store" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="media_type" class="form-label ps-1">Tip Medija</label>
                <input type="text" class="form-control" id="mediaType" name="media_type">
            </div>
            <div class="col">
                <label for="coefficient" class="form-label ps-1">Koeficijent</label>
                <input type="number" class="form-control" id="mediaCoefficient" name="coefficient">
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary mb-3"  name="storeMedia">Spremi</button>
        </div>
    </form>

</main>


<?php include_once base_path('views/partials/footer.php') ?>