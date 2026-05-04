<nav class="navbar navbar-expand-lg navbar-dark bg-dark gap-3 sticky-top">
    <div class="container-fluid mx-5">
        <a class="navbar-brand fs-4 fw-bold" href="<?= base_url('/blog'); ?>">Bloggy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-dark" href="<?= base_url('/blog'); ?>">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-dark" href="/blog/my-posts">
                        Mis publicaciones
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= session()->get('user'); ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('/blog/logout') ?>">
                                Cerrar Sesión
                            </a>
                        </li>
                    </ul> <!-- Lista de opciones del desplegable -->
                </li> <!-- Usuario y sus opciones -->
            </ul> <!-- Cinta de opciones del navbar -->
        </div> <!-- Contenedor de la cinta de opciones -->
        
    </div> <!-- Contenedor general de elementos del navbar -->
</nav>