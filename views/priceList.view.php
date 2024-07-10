<?php include_once 'partials/header.php' ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <h1><?=isset($pageTitle) ? $pageTitle : 'Videoteka Admin';?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tip Filma</th>
                <th>Cjena</th>
                <th>Zakasnina Po Danu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($priceList as $price): ?>
                <tr>
                    <td><?= $price['id'] ?></td>
                    <td><?= $price['tip_filma'] ?></td>
                    <td><?= $price['cijena'] . " EUR" ?></td>
                    <td><?= $price['zakasnina_po_danu'] . " EUR" ?></td>
                    <td>
                        <a href="#" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Price"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Price"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once 'partials/footer.php' ?>