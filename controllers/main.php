<?php
class Main extends Controller
{
    function __construct()
    {
        //ejecucion de la funcion en clase padre controller
        parent::__construct();
    }
    function render()
    {
        //renderizacion de la vista
        $this->view->render('main/index');
    }
}

?>