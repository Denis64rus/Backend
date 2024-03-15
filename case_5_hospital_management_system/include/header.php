<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>СУБ | Система Управления Больницей</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body>

    <nav class="navbar navbar-expand lg navbar-info bg-info" style="display: flex; justify-content: space-between;">
        <h5 class="text-white">Система Управления Больницей</h5>

        <div class="mr-auto"></div>

        <ul class="navbar-nav">

            <?php

                if (isset($_SESSION['admin'])) {

                    $user = $_SESSION['admin'];

                    echo '<li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                          <li class="nav-item"><a href="logout.php" class="nav-link text-white">Выйти</a></li>';

                }else if(isset($_SESSION['doctor'])) {

                    $user = $_SESSION['doctor'];

                    echo '<li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                          <li class="nav-item"><a href="logout.php" class="nav-link text-white">Выйти</a></li>';

                }else if(isset($_SESSION['patient'])) {

                    $user = $_SESSION['patient'];

                    echo '<li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                          <li class="nav-item"><a href="logout.php" class="nav-link text-white">Выйти</a></li>';

                }else {
                    echo '<li class="nav-item"><a href="index.php"
                          class="nav-link text-white">Главная</a></li>
                          <li class="nav-item"><a href="adminlogin.php"
                          class="nav-link text-white">Администратор</a></li>
                          <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Доктор</a></li>
                          <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Пациент</a></li>';
                }

             ?>

        </ul>
    </nav>

    <!-- Размещаем скрипты js здесь для оптимизации загрузки страницы -->

	<!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<!-- jQuery Core 3.5.1 slim  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- font awesome -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js
        ">
    </script>
</body>
</html>