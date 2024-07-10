<?php include_once 'partials/header.php' ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <h1><?=isset($pageTitle) ? $pageTitle : 'Videoteka Admin';?></h1>
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
                foreach ($lendings as $lending): 
                    // Računjanje razlike dana za zakasninu ako datum povrata nije null 
                    // Naravno ovo je samo malo vježba pošto u upitu imamo definirano WHERE datum povrata IS NULL, znači nema magije
                    // AKO obrišemo WHERE datum povrata IS NULL u SQL upitu, zabava počinje
                    $diff = 0;
                    if($lending['datum_povrata'] !== NULL){
                        $date1 = date_create($lending['datum_posudbe']);
                        // dd($date1);
                        $date2 = date_create($lending['datum_povrata']);
                        // dd($date2);
                        $dateDiff = date_diff($date1, $date2);
                        // dd($dateDiff);
                        $diff = ($dateDiff->days - 1);
                        // dd($diff);
                        // optimizacija u bliskoj buducnosti :)
                    }
                ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $lending['clan_ime'] . " " . $lending['clan_prezime'] ?></td>
                    <td><?= $lending['naslov_filma'] ?></td>
                    <td><?= $lending['cijena_filma'] ?></td>
                    <td><?= $lending['datum_posudbe'] ?></td>
                    <td><?= $lending['datum_povrata'] === NULL ? 'Nije vraćen' : $lending['datum_povrata'] ?></td>
                    <!-- zfdp = zakasnina filma po danu -->
                    <td><?= $lending['zfpd'] ?></td>
                    <!--  Računjanje ukupne cijene sa if/else -->
                    <td><?= $lending['datum_povrata'] === NULL ? $lending['cijena_filma'] : $lending['cijena_filma'] + ($lending['zfpd'] * $diff)?></td>
                    <td>
                        <a href="#" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Member"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Member"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php $count++; endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once 'partials/footer.php' ?>