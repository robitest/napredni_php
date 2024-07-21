<?php include_once base_path('views/partials/header.php'); ?>

<main style="height:72.9vh;" class="container my-3 d-flex flex-column flex-grow-1 ">
    <h1>Uredi Člana</h1>
    <hr>

    <form class="row g-3 mt-3" action="/members/update" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $members['id'] ?>">
        <div class="row mb-3">
            <div class="col">
                <label for="first_name" class="form-label ps-1">Ime</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $members['ime'] ?>">
            </div>
            <div class="col">
                <label for="last_name" class="form-label ps-1">Prezime</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $members['prezime'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="address" class="form-label ps-1">Adresa</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $members['adresa'] ?>">
            </div>
            <div class="col">
                <label for="tel" class="form-label ps-1">Telefon</label>
                <input type="text" class="form-control" id="tel" name="tel" value="<?= $members['telefon'] ?>">
            </div>
        </div>
        <div class="row mb-3 ">
            <div class="col">
                <label for="email" class="form-label ps-1">Email</label> 
                <input type="text" class="form-control" id="email" name="email" value="<?= $members['email'] ?>">
            </div>
            <div class="col">
                <label for="member_id" class="form-label ps-1">Član Id</label> 
                <input type="text" class="form-control" id="member_id" name="member_id" value="<?= $members['clanski_broj'] ?>">
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
            <a href="/members" type="submit" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cancel">X</a>
        </div>
    </form>

</main>
