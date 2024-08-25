<?php include_once base_path('views/partials/header.php'); ?>

<main style="min-height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1">
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
            <?= $message['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <h1><?=isset($pageTitle) ? $pageTitle : 'Videoteka Admin';?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tip Filma</th>
                <th>Cjena</th>
                <th>Zakasnina Po Danu</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prices as $price): ?>
                <tr>
                    <td><?= $price['id'] ?></td>
                    <td><a href="/prices/show?id=<?= $price['id'] ?>"><?= $price['tip_filma'] ?></a></td>
                    <td><?= $price['cijena'] . " EUR" ?></td>
                    <td><?= $price['zakasnina_po_danu'] . " EUR" ?></td>
                    <td>
                        <a href="/prices/edit?id=<?= $price['id'] ?>" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Zanr"><i class="bi bi-pencil"></i></a>
                        <form id="delete-form" class="hidden d-inline" method="POST" action="/prices/destroy">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $price['id'] ?>">
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obrisi Zanr"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>
