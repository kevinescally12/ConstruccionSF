<?php

define('URL_BASE', "http://examanmediocurso.test/");
define('DB_HOST', 'localhost');
define('DB_NAME', 'dbsistema');
define('DB_USER', 'root');
define('DB_PASS', '');

function get_path($type, $arg1)
{

    $basePaths = [
        'base' => URL_BASE,
        'views' => URL_BASE . 'views/',
        'models' => URL_BASE . 'models/',
        'controlers' => URL_BASE . 'controlers/',
        'javascript'=> URL_BASE.'javascript/'
    ];
    return $basePaths[$type].$arg1;
}

function get_urlBase($arg1)
{
    return get_path('base', $arg1);
}

function get_views($arg1)
{
    return get_path('views', $arg1);
}

function get_views_disc($arg1)
{
    return $_SERVER['DOCUMENT_ROOT'] . '/views/'.$arg1;
}

function get_models($arg1)
{  
    return get_path('models', $arg1);
}

function get_controlers($arg1)
{
    return get_path('controlers', $arg1);
}

function get_controlers_disc($arg1)
{
    return $_SERVER['DOCUMENT_ROOT'] . '/controlers/'.$arg1;
}

function get_js($arg1)
{  
    return get_path('javascript', $arg1);
}

//echo "algo";
//echo get_urlBase('');
//echo get_models('modeloUsuario.php');