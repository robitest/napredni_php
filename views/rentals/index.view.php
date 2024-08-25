<?php include_once base_path('views/partials/header.php'); ?>

<main style="min-height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1">
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
            <?= $message['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="title flex-between">
        <h1><?=isset($pageTitle) ? $pageTitle : 'Videoteka Admin';?></h1>
        <div class="action-buttons">
            <a href="/rentals/create" type="submit" class="btn btn-primary">Dodaj novi</a>
        </div>
    </div>

    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
            <!-- posudbi -> samo aktivne posudbe -> posudba* + clan.ime + film * + tocna cijena, zakasnina  -->
                <th>Br</th>
                <th>Ime Člana</th>
                <th>Naslov Filma</th>
                <th>Cijena Filma</th>
                <th>Datum Posudbe</th>
                <th>Datum Povrata</th>
                <th>Zakasnina Po Danu</th>
                <th>Ukupna Cijena</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $count = 1;
                // Računjanje razlike dana za zakasninu 
                foreach ($rentals as $rental): 
                    $daysLate = calculateDateDifference($rental['datum_posudbe'], date('Y/m/d'), 'days');
                ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $rental['clan_ime'] . " " . $rental['clan_prezime'] ?></td>
                    <td><?= $rental['naslov_filma'] ?></td>
                    <td><?= $rental['cijena_filma'] ?></td>
                    <td><?= $rental['datum_posudbe'] ?></td>
                    <td><?= $rental['datum_povrata'] === NULL ? 'Nije vraćen' : $rental['datum_povrata'] ?></td>
                    <!-- zfdp = zakasnina filma po danu -->
                    <td><?= $rental['zfpd'] ?></td>
                    <!--  Računjanje ukupne cijene sa if/else -->
                    <td><?= $rental['cijena_filma'] + ($rental['zfpd'] * $daysLate)?> EUR</td>
                    <td>
                        <a href="rentals/edit?id=<?= $rental['posudba_id'] ?>" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Posudbu"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obriši Posudbu"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php $count++; endforeach ?>
        </tbody>
    </table>
</main>
<?php include_once base_path('views/partials/footer.php'); ?>
