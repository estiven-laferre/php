<?php
class nuevo extends Controller
{
    function __construct()
    {
        //ejecucion de la funcion en clase padre controller
        parent::__construct();
        $mensaje="";
        $this->view->mensaje='';
    }
    function render()
    {
         //renderizacion de la vista
        $this->view->render('nuevo/index');
    }
    //registro de alumno
    function registrar_alumno()
    {
        //datos enviados desde la vista
        $matricula=$_POST['matricula'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $mensaje="";

        if($this->model->insert(['matricula'=>$matricula,'nombre'=>$nombre,'apellido'=>$apellido]))
        {
             //si nos rentorna true ejecuta lo siguinte
            $mensaje= 'alumno registrado';
        }else
        {
             //si nos rentorna false ejecuta lo siguinte
            $mensaje= "alumno repetido";
        }
        $this->view->mensaje=$mensaje;
        $this->render();
    }

  
}

?>