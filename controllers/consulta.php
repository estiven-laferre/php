
<?php

class consulta extends Controller{

    function __construct()
    {
        parent::__construct();
        $alumnos=$this->view->alumnos=[];
        //echo "<p>Nuevo controlador Main</p>";
    }
    function render()
    {
        $alumnos=$this->model->get();
        $this->view->alumnos=$alumnos;
        $this->view->render('consulta/index');
    }
}

?>