<?php
class View
{
    //funcion para renderizar vistas ,que las clases de hijas de controllers ejecutan
    function render($nombre)
    {
        require 'views/' . $nombre . '.php';
    }
}
?>