<?php
//archivo controlador de URL'S 
require_once 'controllers/errores.php';

class App
{
    function __construct()
    {
        // si url esta vacia sera igual a nulo
        $url = isset($_GET['url']) ? $_GET['url']: null ;
        //los diagonales indicanda donde empieza y termina un elemento 
        $url = rtrim($url, '/');
        //evita que haya 2 diagonales seguidas
        $url = explode('/', $url);

        //creacion y concatenacion de la url mediante una variable
        $archivoController = 'controllers/' . $url[0] . '.php';
        //en caso que este vacio sera rediccionado accia la pagina principal
        if(empty($_GET['url']))
        {
            $archivoController='controllers/main.php';
            require_once $archivoController;
            $controller = new main;
            $controller -> loadmodel('main');
            $controller->render();
            return false; 
        }
        //si exite el archivo
        if(file_exists($archivoController))
        {
            //mandamos a llamar al archivo
            require_once $archivoController;
            //el primer array que debe ser  el nombre del controlador de la vista
            $controller = new $url[0];
            //carga el model si es que hay 
            $controller -> loadmodel($url[0]);
            //cuenta la cantidad de elementos del array URL
            // #1 controller y class
            // #2 funcion dentro de la class
            // #3+ parametros de una funcion
            $nparam=sizeof($url);
            if($nparam > 1)
            {
                if($nparam > 2)
                {
                    //si hay mas de 3 elementos ,metelos todos en un array executando los primeros 2
                    $param=[];
                    for($i=2 ; $i<$nparam ; $i++)
                    {
                        array_push($param , $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else
                {
                //si hay 2 elementos el segundo ejecutalo como funcion
                    $controller->{$url[1]}();
                }
            }else
            {
                //si solo hay un elemento entonce procede a renderizar la vista
                 $controller->render();
            }
        }else
        {
            //si el elemento o la funcion que esta en el array no concide con ninguna dentro de controllers
            $controller = new Errores();
        }
    }
}
?>