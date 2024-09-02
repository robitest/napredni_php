<?php include_once base_path('views/partials/header.php'); ?>

<main style="min-height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1">
    <div class="title flex-between">
        <div class="">
            <h1><?=isset($pageTitle) ? $pageTitle : 'Videoteka Admin';?></h1>
        </div>bazi ako ima vec npr
        <?php if (!empty($message)): ?>
            <div class="alert alert-<?= $message['type'] ?> alert-dismissible fade show" role="alert">
                <?= $message['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="action-buttons">
            <a href="/formats/create" type="submit" class="btn btn-primary">Dodaj novi</a>
        </div>
    </div>

    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tip Medija</th>
                <th>Koeficijent</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formats as $format): ?>
                <tr>
                    <td><?= $format['id'] ?></td>
                    <td><a href="/formats/show?id=<?= $format['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Uredi Medij"><?= $format['tip'] ?></a></td>
                    <td><?= $format['koeficijent'] ?></td>
                    <td>
                        <a href="/formats/edit?id=<?= $format['id'] ?>" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Medij"><i class="bi bi-pencil"></i></a>
                        <form id="delete-form" class="hidden d-inline" method="POST" action="/formats/destroy">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $format['id'] ?>">
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obriši Medij"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>

