<header>
    <div class="px-3 py-4 text-bg-dark border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?= URL_BASE ?>home" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <h1 class="size-45pt">LoveChurch</h1>
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="<?= URL_BASE ?>home" class="nav-link text-secondary">
                            <div class="d-block text-center mb-1">
                                <span class="material-symbols-outlined">
                                    home
                                </span>
                            </div>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>praysg" class="nav-link text-white">
                            <div class="d-block text-center mb-1">
                                <i class="fa-solid fa-person-praying size-22pt"></i>
                            </div>
                            Pray's Groups
                        </a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>bible" class="nav-link text-white">
                            <div class="d-block text-center mb-1">
                                <i class="fa-solid fa-book-bible size-22pt"></i>
                            </div>
                            Bible Reading
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <div class="d-block text-center mb-1">
                                <span class="material-symbols-outlined">
                                    help
                                </span>
                            </div>
                            DUNNO
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <div class="d-block text-center mb-1">
                                <span class="material-symbols-outlined">
                                    help
                                </span>
                            </div>
                            DUNNO
                        </a>
                    </li>
                    <li>
                        <a href="<?= URL_BASE ?>/login/logoff" class="nav-link text-danger">
                            <div class="d-block text-center mb-1">
                                <span class="material-symbols-outlined">
                                    logout
                                </span>
                            </div>
                            LOGOUT
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                <p><?= $_SESSION['nome'] ?></p>
            </div>
        </div>
    </div>
</header>