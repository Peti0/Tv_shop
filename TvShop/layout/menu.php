<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            TV SHOP
            <img src="./images/kep.png" height="90" alt="TV SHOP LOGO">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?menu=home">Home</a>
                </li>
                <?php
                if ($_SESSION['login']) {
                    echo '<li class="nav-item">
                        <a class="nav-link' . ($menu == 'tvvasarlasUser' ? ' active' : '') . '" aria-current="page" href="index.php?menu=tvvasarlasUser">TV vásárlás</a>
                      </li>
                        <li class = "nav-item">
                            <a class = "nav-link' . ($menu == 'logout' ? ' active' : '') . '" href = "index.php?menu=logout">Kilépés</a>
                        </li>';
                } else {

                    echo '<li class = "nav-item">
                        <a class = "nav-link' . ($menu == 'feltoltesTV' ? ' active' : '') . '" aria-current = "page" href = "index.php?menu=feltoltesTV">TV feltöltése</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link' . ($menu == 'login' ? ' active' : '') . '" href = "index.php?menu=login">Belépés</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link' . ($menu == 'regisztracio' ? ' active' : '') . '" href = "index.php?menu=regisztracio">Regisztráció</a>
                    </li>
                    <li class = "nav-item">
                        <a class = "nav-link' . ($menu == 'rolunk' ? ' active' : '') . '" href = "index.php?menu=rolunk">Rólunk</a>
                    </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>