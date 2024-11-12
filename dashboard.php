<?php
    session_start();
    if (!isset($_SESSION["txtusername"])) {
        header("Location: http://127.0.0.1/ExamanMedioCurso/index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA</title>
    <link rel="stylesheet" href="css/estilodashboard.css">
</head>
<body>
    <div class="menu">
        <h3>Este es el menú</h3>
        <ul>
            <li><a href="?opcion=inicio">Inicio</a></li>
            <li><a href="?opcion=ver">Ver</a></li>
            <li><a href="?opcion=modificar">Modificar</a></li>
            <li><a href="?opcion=eliminar">Eliminar</a></li>
        </ul>
        <div class="menu-footer">
            <a href="http://127.0.0.1/ExamanMedioCurso/logout.php">Salir del sistema</a>
            <p>Contacto: 992214567</p>
            <a href="https://wa.me/992214567" target="_blank">Contáctanos en WhatsApp</a>
        </div>
    </div> 

    <div class="contenido">
        <div class="header-section">
            <h2>Bienvenido al Dashboard</h2>
            <p>Aquí puedes gestionar y visualizar la información del sistema.</p>
        </div>
        
        <div class="cards">
            <div class="card">
                <img src="img\usuarioimg.png" alt="Icono 1">
                <h3>Total de Usuarios</h3>
                <p>1,245</p>
            </div>
            <div class="card">
                <img src="img\dineroimg.png" alt="Icono 2">
                <h3>Ventas Mensuales</h3>
                <p>$13,500</p>
            </div>
            <div class="card">
                <img src="img\ticket.jpg" alt="Icono 3">
                <h3>Tickets Abiertos</h3>
                <p>37</p>
            </div>
        </div>
        
        <div class="main-section">
            <h3>Últimos Registros</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Kevin Escally</td>
                    <td>kevin.escally@unas.edu.pe</td>
                    <td>Desaparecido(buscado)</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Paul Tarazona</td>
                    <td>paul.tarazona@unas.edu.pe</td>
                    <td>Delegado</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Juanito Lopez</td>
                    <td>juanito.lopez@unas.edu.pe</td>
                    <td>Juan</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Luchito Pérez</td>
                    <td>Luchito.perez@unas.edu.pe</td>
                    <td>Perdido</td>
                </tr>
            </table>
        </div>

        <div class="stats-section">
            <h3>Estadísticas Recientes</h3>
            <img src="img\estadistica-e1607728657107.jpg" alt="Gráfico de estadísticas">
        </div>
    </div>
</body>
</html>
