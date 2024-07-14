<?php include_once 'partials/header.php' ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <div class="title flex-between">
        <h1><?=isset($pageTitle) ? $pageTitle : 'Videoteka Admin';?></h1>
        <div class="action-buttons">
            <a href="../controllers/member-create.php" type="submit" class="btn btn-primary">Dodaj novi</a>
        </div>
    </div>

    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ime</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Članski broj</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
                <tr>
                    <td><?= $member['id'] ?></td>
                    <td><?= $member['ime'] ?></td>
                    <td><?= $member['adresa'] ?></td>
                    <td><?= $member['telefon'] ?></td>
                    <td><?= $member['email'] ?></td>
                    <td><?= $member['clanski_broj'] ?></td>
                    <td>
                        <a href="#" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Member"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Member"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once 'partials/footer.php' ?>