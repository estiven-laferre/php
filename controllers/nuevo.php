
<?php

class nuevo extends Controller{

    function __construct(){
        parent::__construct();
        $mensaje="";
        $this->view->mensaje='';
    }
    function render()
    {
        $this->view->render('nuevo/index');
    }
    function registrar_alumno()
    {
        //echo "alumno registrado";
        $matricula=$_POST['matricula'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $mensaje="";

        if($this->model->insert(['matricula'=>$matricula,'nombre'=>$nombre,'apellido'=>$apellido]))
        {
            $mensaje= 'alumno registrado';
        }else
        {
            $mensaje= "alumno repetido";
        }
        $this->view->mensaje=$mensaje;
        $this->render();
    }

  
}

?>