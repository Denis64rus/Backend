 <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="blog.php"><b>Мой <span style="color: #0088FF;">Блог</span></b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Категория</a>
                    </li>
                    <?php
                        if ($logged) {
                     ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="profile.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            @<?=$_SESSION['username']?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Выйти</a></li>
                        </ul>
                    </li>
                    <?php
                        }else {
                     ?>
                     <li class="nav-item">
                        <a class="nav-link" href="login.php">Вход | Регистрация</a>
                    </li>
                     <?php
                        }
                     ?>
                </ul>
            </div>
            <form class="d-flex" role="search" method="GET" action="blog.php">
                <input class="form-control me-2" type="search" name="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
        </div>
    </nav>