<?php
class Errores extends Controller
{
    function __construct()
    {
         //ejecucion de la funcion en clase padre controller
        parent::__construct();
        //notificacion de error
        $this->view->mensaje = "Error genérico";
         //renderizacion de la vista
        $this->view->render('errores/index');
    }
}
?>