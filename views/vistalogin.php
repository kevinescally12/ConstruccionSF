<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Paginita </title>
    <link rel="stylesheet" href="<?php echo get_urlBase('/css/estilo.css'); ?>">
</head>
<body>


    <div class="login-container">
        <h2> Ingresar usuario </h2>
        <form action="/controlers/controladorlogin.php" method="post" autocomplete="off">
            <div class="input-row">
                <input type="text" name="txtusername" placeholder="username" required>
                <input type="password" name="txtpassword" placeholder="password" required>
            </div>
            <div class="remember-me">
                <span class="password-label">    </span>    
                <button type="button" class="remember-button">Remember</button>
            </div>
            <div class="button-row">
                <button type="button" class="button">Lisenome</button>
                <button type="submit" class="button">Login</button>
            </div>
        </form>
    </div>
    <script src="<?php echo get_js("validarLogin.js")?>"></script>
</body>
</html>