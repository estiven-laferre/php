<?php
class consulta extends Controller{
    function __construct()
    {
        //ejecucion de la funcion en clase padre controller
        parent::__construct();
        //creacion de un array vacion para evitar errores
        $alumnos=$this->view->alumnos=[];
    }
    //funcion de la clase padre para renderizar la vista
    function render()
    {
        //ejecucion de una funcion de un archivo model para ver todos los alumnos
        $alumnos=$this->model->get(); 
        $this->view->alumnos=$alumnos;
        //renderizacion de la vista
        $this->view->render('consulta/index');
    }
    //funcion que permite ver a detalle los alumnos y editarlos
    function ver($param=null)
    {
        //el primer elemento es la matricula del alumno
        $idalumno=$param[0];
        //ejcutamos el model pasando como parametro la matricula
        $alumno=$this->model->get_by_id($idalumno);
        //asignamos en una variable de secion la matricula
        session_start();
        $_SESSION['idmatricula']= $alumno->matricula;
        $this->view->alumno=$alumno;
        //mensaje en blanco para evitar problemas
        $this->view->mensaje='';
        //renderizacion de la vista
        $this->view->render('consulta/detalle');
    }
    //funcion que envia los datos para actualizarlos en la base de datos
    function actualizar()
    {
        //recolectamos los datos nombre , apellido y matricula lo conservamos sin cambios y
        session_start();
        $matricula=$_SESSION['idmatricula'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $mensaje='';
        //destruimos la variable de sesion
        unset($_SESSION['matricula']);
        //ejecutamos la funcion del model atravez del if
        if($this->model->update(['matricula'=>$matricula,'nombre'=>$nombre,'apellido'=>$apellido]))
        {
            //si nos rentorna true ejecuta lo siguinte
            $alumno=new alumno();
            $alumno->matricula=$matricula;
            $alumno->nombre=$nombre;
            $alumno->apellido=$apellido;
            $this->view->alumno=$alumno;
            $this->view->mensaje='alumno actualizado';
        }else
        {
            //si nos rentorna false ejecuta lo siguinte
            $this->view->mensaje='alumno no actualizado';
        }
        //renderizacion de una nueva vista
        $this->view->render('consulta/detalle');
    }
    //funcion para borrar alumno
    function eliminar($param=null)
    {
        $matricula=$param[0];
        if($this->model->delete($matricula))
        {
            //si nos rentorna true ejecuta lo siguinte
            $this->view->mensaje='alumno eliminado'; 
        }else
        {
            //si nos rentorna false ejecuta lo siguinte
            $this->view->mensaje='alumno no eliminido';
        }
        //renderiza la misma vista
        $this->render();
    }
}
?>