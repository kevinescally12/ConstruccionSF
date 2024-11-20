<?php
$_urlBase = "http://examanmediocurso.test/";

$host = 'localhost';
$namedb = 'dbsistema';
$userdb = 'root';
$passworddb = '';

function get_urlBase($arg1)
{
    return $GLOBALS["_urlBase"] . $arg1;
}

function get_views($arg1)
{
    return $GLOBALS["_urlBase"] . 'views/' . $arg1;
}

function get_models($arg1)
{
    return $GLOBALS["_urlBase"] . 'models/' . $arg1;
}

function get_controlers($arg1)
{
    return $GLOBALS["_urlBase"] . 'controlers/' . $arg1;
}
