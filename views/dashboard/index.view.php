<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-4 d-flex flex-column flex-grow-1">
    <div class="title flex-between">
        <h1>Nova Posudba</h1>
    </div>

    <hr>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
            <?= $message['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

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


    <div class="title flex-between">
        <h1>Aktivne Posudbe</h1>
    </div>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Posudba</th>
                <th>Clan</th>
                <th>Film</th>
                <th>Cijena</th>
                <th>Vrati</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activeRentals as $activeRental): ?>
                <tr>
                    <td><?= $activeRental['pid'] ?></td>
                    <td><a href="/rentals/show?id=<?= $activeRental['pid'] ?>" class="text-black no-decor"><i class="bi bi-credit-card me-2"></i> <?= $activeRental['datum_posudbe'] ?></a></td>
                    <td><a href="/members/show?id=<?= $activeRental['cid'] ?>" class="text-black link-underline-opacity-0 no-decor"><i class="bi bi-person-circle me-2"></i> <?= $activeRental['clan'] ?></a></td>
                    <td><a href="/movies/show?id=<?= $activeRental['fid'] ?>" class="text-black link-underline-opacity-0 no-decor"><i class="bi bi-camera me-2"></i> <?= $activeRental['tip'] ?> - <?= $activeRental['naslov'] ?></a></td>
                    <td><a href="/movies/show?id=<?= $activeRental['fid'] ?>" class="text-black link-underline-opacity-0 no-decor"><i class="bi bi-<?= $currencies['euro'] ?>"></i> <?= $activeRental['cijena_tip_filma'] ?></td>
                    <td>
                        <form action="/rentals/destroy" method="POST" class=" hidend-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="pid" value="<?= $rental['pid'] ?>">
                            <input type="hidden" name="kid" value="<?= $rental['kid'] ?>">
                            <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Oznaci Vraceno"><i class="bi bi-arrow-counterclockwise"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>