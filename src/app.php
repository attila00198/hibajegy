<?php
include 'includes/autoload.php';

$uri = $_SERVER["REQUEST_URI"];
$uri = explode('/', $uri);
$method = $_SERVER["REQUEST_METHOD"];

$db = new Database();
$db->connect();
$dbc = $db->getConnection();

switch ($uri[1]) {
    case '':
        if (!isset($_SESSION["user"])) {
            require "views/index.php";
        } else {
            if ($_SESSION["user"]["isAdmin"]) {
                require "views/adminViews/dashbord.php";
            } else {
                require "views/home.php";
            }
        }
        break;

    case 'login':
        if ($method == "POST") {

            $uName = $_POST["lusername"];
            $uPasswd = $_POST["lpassword"];

            $usrCtrl = new UserController($dbc);
            $usrCtrl->loginUser($uName, $uPasswd);

            header("location: /");
        }
        break;

    case "register":
        if ($method == "POST") {
            $uName = $_POST["rusername"];
            $fullName = $_POST["rfullname"];
            $email = $_POST["remail"];

            if ($_POST["rpassword"] != $_POST["rpassword-repeat"]) {
                $_SESSION["msg"] = [
                    "category" => "danger",
                    "message" => "A megadott jelszavak nem egyeznek"
                ];
            } else {
                $password = $_POST["rpassword"];
            }

            $usrCtrl = new UserController($dbc);
            $usrCtrl->createUser($uName, $fullName, $email, $password);
        }

    case "tickets":
        if (!isset($_SESSION["user"])) {
            header("location: /");
        }
        $user = $_SESSION["user"];
        include "views/tickets.php";
        break;

    case "profile":
        if (!isset($_SESSION["user"])) {
            header("location: /");
        }
        $user = $_SESSION["user"];
        include "views/profile.php";
        break;

    case "logout":
        unset($_SESSION["user"]);
        header("location: /");
        break;

    default:
        require "views/404.php";
        break;
}
