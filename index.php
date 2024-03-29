<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Hibabejelentő</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header class="container-fluid">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-sm-12 col-md-6">
                <h1 class="text-center">Hibabejelentő rendszer</h1>
                <p class="text-center">A használathoz jelentkezz be vagy regisztrálj</p>
            </div>
        </div>
    </header>

    <?php if (isset($_SESSION["user"])) : ?>
        <?php if (($_SESSION["user"]["isAdmin"])) : ?>

        <?php endif; ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
            <a class="navbar-brand" href="/">Hibabejelentő</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tickets">Hibajegyeim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Kilépés</a>
                    </li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>

    <main class="container-fluid">
        <?php include 'src/app.php' ?>
    </main>

    <footer class="container-fluid">
        <div class="row justify-content-center pt-5">
            <div class="copyright col-sm-12 col-md-6">
                &copy; <span>Copyright <strong>Kiss Attila</strong> 2022</span>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <script src="public/js/script.js"></script>

    <script type="text/javascript">
        let navLinks = document.querySelectorAll(".nav-link")

        navLinks.forEach(navLink => {
            if(document.URL == navLink.href) {
                navLink.classList.add("active")
            }
        })
    </script>
</body>

</html>