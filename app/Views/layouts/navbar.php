<nav class="navbar navbar-expand-lg navbar-dark bg-dark gap-3 mx-5">
    <div class="container-fluid">
        <a class="navbar-brand fs-4 fw-bold" href="<?= base_url('/blog'); ?>">Bloggy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="btn btn-dark" aria-expanded="false" href="<?= base_url('/blog'); ?>">
                        Inicio
                    </a>
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= session()->get('user'); ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>