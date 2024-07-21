<?php 
include_once base_path('views/partials/header.php') ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1>Dodaj novu Cijenu</h1>
    <hr>

    <form class="row g-3 mt-3" action="/priceList/store" method="POST">
        <div class="col-auto">
            <label for="zanr" class="mt-1">Naziv Žanra</label>
        </div>
       
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php') ?>