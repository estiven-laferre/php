
<?php

class nuevo extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('nuevo/index');
        
    }
    function registrar_alumno()
    {
        echo 'alumno registrado';
        $this->model->insert();
    }

  
}

?>