<?php
require_once 'controllers/errores.php';

class App{

    function __construct(){
       // echo "<p>Nueva app</p>";

        $url = isset($_GET['url']) ? $_GET['url']: null ;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //var_dump($url);
        $archivoController = 'controllers/' . $url[0] . '.php';
        if(empty($_GET['url']))
        {
            $archivoController='controllers/main.php';
            require_once $archivoController;
            $controller = new main;
            $controller -> loadmodel('main');
            
            return false; 
        }
        if(file_exists($archivoController)){
            require_once $archivoController;
            $controller = new $url[0];
            $controller -> loadmodel($url[0]);

            if(isset($url[1])){
                $controller->{$url[1]};
            }
        }else{
            $controller = new Errores();
        }
    }
}

?>