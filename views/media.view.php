<?php include_once 'partials/header.php' ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <h1><?=isset($pageTitle) ? $pageTitle : 'Videoteka Admin';?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tip Medija</th>
                <th>Koeficijent</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($media as $m): ?>
                <tr>
                    <td><?= $m['id'] ?></td>
                    <td><?= $m['tip'] ?></td>
                    <td><?= $m['koeficijent'] ?></td>
                    <td>
                        <a href="#" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Media"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Media"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once 'partials/footer.php' ?>