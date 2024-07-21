
<aside class="d-flex flex-column p-3 text-bg-dark vh-100-min" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Videoteka Admin</span>
    </a>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link text-white link-primary <?= setActivePage('/', $_SERVER['REQUEST_URI']) ?>" aria-current="<?= $_SERVER['REQUEST_URI'] === '/' ? 'page' : '' ?> "><i class="bi bi-house me-2"></i>Početna</a>
        </li>
        <li class="nav-item">
            <a href="/members" class="nav-link text-white link-primary <?= setActivePage('members', $_SERVER['REQUEST_URI']) ?>" aria-current="<?= $_SERVER['REQUEST_URI'] === '/members' ? 'page' : '' ?>"><i class="bi bi-person-circle me-2"></i>Članovi</a>
        </li>
        <li class="nav-item">
            <a href="/genres" class="nav-link text-white link-primary <?= setActivePage('genres', $_SERVER['REQUEST_URI']) ?>" aria-current="<?= $_SERVER['REQUEST_URI'] === '/controllers/genres.php' ? 'page' : '' ?>"><i class="bi bi-camera-reels me-2"></i>Žanrovi</a>
        </li>
        <li class="nav-item">
            <a href="/movies" class="nav-link text-white link-primary <?= setActivePage('movies', $_SERVER['REQUEST_URI']) ?>" aria-current="<?= $_SERVER['REQUEST_URI'] === '/controllers/movies.php' ? 'page' : '' ?>"><i class="bi bi-film me-2"></i>Filmovi</a>
        </li>
        <li class="nav-item">
            <a href="/priceList" class="nav-link text-white link-primary <?= setActivePage('priceList', $_SERVER['REQUEST_URI']) ?>" aria-current="<?= $_SERVER['REQUEST_URI'] === '/controllers/priceList.php' ? 'page' : '' ?>"><i class="bi bi-tag me-2"></i>Cjenik</a>
        </li>
        <li class="nav-item">
            <a href="/media" class="nav-link text-white link-primary <?= setActivePage('media', $_SERVER['REQUEST_URI']) ?>" aria-current="<?= $_SERVER['REQUEST_URI'] === '/controllers/media.php' ? 'page' : '' ?>"><i class="bi bi-collection-play me-2"></i>Mediji</a>
        </li>
        <li class="nav-item">
            <a href="/rentals" class="nav-link text-white link-primary <?= setActivePage('rental', $_SERVER['REQUEST_URI']) ?>" aria-current="<?= $_SERVER['REQUEST_URI'] === '/controllers/rentals.php' ? 'page' : '' ?>"><i class="bi bi-calendar3 me-2"></i>Posudbe</a>
        </li>
    </ul>

    <hr>

    <div class="dropdown">
        <a href="#" class="d-flex p-1 align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Korisnik</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</aside>