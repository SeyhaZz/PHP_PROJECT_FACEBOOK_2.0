<!-- NAVIGATION BAR -->
        <nav id="navigation" class="navbar py-0 bg-light">
            <div>
                <a class="navbar-brand px-3" href="../controllers/refresh_page_controller.php"><img class="logo" src="../images/logo.png" alt=""></a>
                <div class="btn-group">
                    <button type="button" class="bg-light text-primary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons " style="font-size:36px">search</i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start search">
                        <form class="d-flex">
                            <input class="form-control me-2" type="text" id="search-post" placeholder="Search">
                        </form>
                    </ul>
                </div>
            </div>
            <ul class="nav nav-pills d-flex justify-content-between" id="nav-menu">
                <li class="nav-item">
                    <a class="nav-link" href="../controllers/refresh_page_controller.php"><i class="material-icons menu-icon home-page">home</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/friends_view.php"><i class="material-icons menu-icon friend-page">people</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/profile_view.php"><i class="material-icons menu-icon profile-page">account_circle</i></a>
                </li>
                <li class="nav-item" action="" method="post">
                    <a class="nav-link" href="../index.php"><i class="material-icons menu-icon">exit_to_app</i></a>
                </li>
            </ul>
        </nav>
        <div class="container">