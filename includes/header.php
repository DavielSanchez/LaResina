<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">La Resina</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <?php
                $current_page = basename($_SERVER['PHP_SELF']);
                ?>
                <li><a href="index.php#hero" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Inicio</a></li>
                <li><a href="index.php#about" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Nosotros</a></li>
                <li><a href="menu.php" class="<?php echo ($current_page == 'menu.php') ? 'active' : ''; ?>">Menú</a></li>
                <!-- <li><a href="#events">Eventos</a></li> -->
                <li><a href="index.php#chefs" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Chefs</a></li>
                <!-- <li><a href="#gallery">Galería</a></li> -->
                <li><a href="index.php#contact" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Contacto</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="reservation.php">Haz tu reservación</a>

    </div>
</header>