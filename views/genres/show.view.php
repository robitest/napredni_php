<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 ">
    <div class="row mt-3 title">
        <h1><?= $genre['ime'] ?></h1>
    </div>
    
    <hr>
    <form class="row g-3 mt-3" action="/genre-create.php" method="POST">
        <div class="row">
            <div class="col-2">
                <label for="zanr" class="mt-1">Id Žanra:</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control" id="zanr" name="zanr" value="<?= $genre['id'] ?>" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label for="zanr" class="mt-1">Naziv Žanra:</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control" id="zanr" name="zanr" value="<?= $genre['ime'] ?>" disabled>
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

    <!-- Lista filmova u trazenom zanru -->
    <div class="title flex-between mt-5">
        <h2>Filmovi u žanru <?= strtolower($genre['ime']) ?></h2> <!-- treba sredit -->
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
                <th>Godina</th>
                <th>Tip Filma</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                
                    <td><?= '1' ?></td>
                    <td><a href="/movies/show?id=<?= $movie['id'] ?>"><?= $movie['naslov'] ?></a></td>
                    <td><?= $movie['godina'] ?></td>
                    <td><?= $movie['tip_filma'] ?></td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>