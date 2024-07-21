<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1><?= $genre['ime'] ?></h1>
    <hr>
    <form class="row g-3 mt-3" action="/genre-create.php" method="POST">
        <div class="row">
            <div class="col-2">
                <label for="rental_id" class="mt-1">Br:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="rentalId" name="rental_id" value="<?= $genre['id'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="full_name" class="mt-1">Ime Člana:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="fullName" name="full_name" value="<?= getFullName($member['ime'], $member['prezime']) ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="movie_title" class="mt-1">Naslov Filma:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="movieTitle" name="movie_title" value="<?= $genre['movie_title'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="movie_price" class="mt-1">Cijena Filma:</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="moviePrice" name="movie_price" value="<?= $genre['price'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-auto">
            <a href="/rentals" type="submit" class="btn btn-primary">Natrag na Posudbe</a>
            </div>
        </div>
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>