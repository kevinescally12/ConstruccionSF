<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $k_username = $_POST["txtusername"] ?? "";
        $k_password = $_POST["txtpassword"] ?? "";

        if ($k_username === "admin" && $k_password === "1234") {
            $_SESSION["txtusername"] = $k_username;
            header("Location: " . get_views('dashboard.php'));
            exit();
        } else {
            header("Location: " .get_views('claveequivocada.php'));
            exit();
        }
    }

    if (isset($_SESSION["txtusername"])) {
        header("Location: " . get_views('dashboard.php'));
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN MEDIO CURSO</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('/css/estilo.css'); ?>">
</head>
<body>


    <div class="login-container">
        <h2>LOGIN</h2>
        <form action="" method="post" autocomplete="off">
            <div class="input-row">
                <input type="text" name="txtusername" placeholder="username" required>
                <input type="password" name="txtpassword" placeholder="password" required>
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
