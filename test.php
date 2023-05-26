<?php
if (isset($_POST["login"])) {
    log("test");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>
    <header class="container-fluid">
        <h1>Hibabejelentő oldal</h1>
    </header>

    <main class="container">
        <div class="row justify-content-center g-2 pt-5">
            <div class="col-sm-12 col-md-6">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-transparent text-white" name="pwd" id="pwd" placeholder="Jelszó" required>
                        <label for="pwd">Jelszó</label>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Küldés</button>
                </form>
            </div>
        </div>
    </main>

    <?php
    $pwd = "";
    $pwd_hash = "";
    if (isset($_POST["submit"])) {
        $pwd = $_POST["pwd"];
        $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);
    }

    if(!empty($pwd)) {
        $verified = password_verify($pwd, $pwd_hash) ? "Helyes" : "Helytelen";

        echo $pwd_hash."<br>".$pwd."<br>".$verified."<br>".strlen($pwd_hash);
    }
    ?>
    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <!-- Custom JavaScript -->
    <script type="text/javascript">
        function changeForm() {
            const loginContainer = document.querySelector("#login")
            const registerContent = document.querySelector("#register")
            let lClasses = loginContainer.classList
            let rClasses = registerContent.classList

            if (!lClasses.contains("d-none")) {
                lClasses.add("d-none")
                rClasses.remove("d-none")
            } else {
                rClasses.add("d-none")
                lClasses.remove("d-none")
            }
        }
    </script>
</body>

</html>