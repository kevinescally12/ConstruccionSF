<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN MEDIO CURSO</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $k_username = "";
        $k_password = "";

        if (isset($_POST["txtusername"])) {
            $k_username = $_POST["txtusername"];
        }
        if (isset($_POST["txtpassword"])) {
            $k_password = $_POST["txtpassword"];
        }

        if (($k_username == "admin") && ($k_password == "1234")) {
            $_SESSION["txtusername"] = $k_username;
            $_SESSION["txtpassword"] = $k_password;

            header("Location: http://127.0.0.1/ExamanMedioCurso/dashboard.php");
            exit();
        } else {
            header("Location: http://127.0.0.1/ExamanMedioCurso/claveequivocada.php");
            exit();
        }
    }

    if (isset($_SESSION["txtusername"])) {
        header("Location: http://127.0.0.1/ExamanMedioCurso/dashboard.php");
        exit();
    }
?>



    <div class="login-container">
        <h2>LOGIN</h2>
        <form action="" method="post" autocomplete="off">
            <div class="input-row">
                <input type="text" name="txtusername" placeholder="username" autocomplete="off">
                <input type="password" name="txtpassword" placeholder="password" autocomplete="off">
            </div>
            <div class="remember-me">
                <span class="password-label">PASSWORD</span>    
                <button type="button" class="remember-button">Remember</button>
            </div>
            <div class="button-row">
                <button type="button" class="button">Lisenome</button>
                <button type="submit" class="button">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
