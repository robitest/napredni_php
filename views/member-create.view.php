<?php 
include_once 'partials/header.php' 
?>

<main class="container my-3 d-flex flex-column flex-grow-1 ">
    <h1>Dodaj novog Člana</h1>
    <hr>

    <form class="p-4" action="../controllers/member-create.php" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="first_name" class="form-label ps-1">Ime</label>
                <input type="text" class="form-control" id="fName" name="first_name"><!--  $_POST['first_name'] => 'Novo Ime'; -->
            </div>
            <div class="col">
                <label for="last_name" class="form-label ps-1">Prezime</label>
                <input type="text" class="form-control" id="lName" name="last_name"><!--  $_POST['last_name'] => 'Novo Prezime'; -->
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="address" class="form-label ps-1">Adresa</label>
                <input type="text" class="form-control" id="address" name="address"><!--  $_POST['address'] => 'Nova Adresa'; -->
            </div>
            <div class="col">
                <label for="tel" class="form-label ps-1">Telefon</label>
                <input type="tel" class="form-control" id="phone" name="tel"><!--  $_POST['tel'] => 'Novi Telefon'; -->
            </div>
        </div>
        <div class="row mb-3 ">
            <div class="col">
                <label for="email" class="form-label ps-1">Email</label> 
                <input type="email" class="form-control" id="email" name="email"><!--  $_POST['email'] => 'Novi Email'; -->
            </div>
            <div class="col">
                <label for="member_id" class="form-label ps-1">Član Id</label> 
                <input type="text" class="form-control" id="memberId" name="member_id"><!--  $_POST['member_id'] => 'Novi Clan Id'; -->
            </div>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
        </div>
    </form>

</main>

<?php 
    include_once 'partials/footer.php';
?>
