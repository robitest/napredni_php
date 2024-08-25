<?php 
include_once base_path('views/partials/header.php') ?>

<main style="height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1 ">
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
            <?= $message['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <h1>Nova Posudba</h1>
    <hr>
    <form class="py-4" action="/rentals/store" method="POST">
        <div class="row mb-3">
            <div class="col-5">
                <select class="form-select <?= isset($errors['movie']) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="movie">
                    <option selected value="">Odaberite Film</option>
                    <?php foreach ($movies as $movie): ?>
                        <option value="<?= $movie['id'] ?>"><?= $movie['title'] ?> ( <?= $movie['genre_name'] ?> - <?= $movie['year_released'] ?>)</option>
                    <?php endforeach ?>
                </select>
                <span class="invalid-feedback"><?= $errors['movie'] ?? '' ?></span>
            </div>
            <div class="col-4">
                <select class="form-select" aria-label="Default select example" name="member">
                    <option selected>Odaberite Člana</option>
                    <?php foreach ($members as $member): ?>
                        <option value="<?= $member['id'] ?>"><?= $member['ime'] ?> <?= $member['prezime'] ?> - <?= $member['email'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="invalid-feedback"><?= $errors['zanr'] ?? '' ?></span>
            </div>
            <div class="col-2">
                <select class="form-select" aria-label="Default select example" name="price">
                    <option selected>Odaberite Medij</option>
                    <?php foreach ($formats as $format): ?>
                        <option value="<?= $format['id'] ?>"><?= $format['tip'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary mb-3">Spremi</button>
            </div>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php') ?>
