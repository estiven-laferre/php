<?php
class Controller{
    function __construct()
    {
        //ejecucion de view.php para ser usado por las clases hijas
        $this->view = new View();
    }
    function loadmodel($model)
    {
        //ejecucion de models desde app.php
      $url='models/'.$model.'model.php';

      if(file_exists($url))
      {
          require $url;
          $modelname= $model.'model';
          $this->model= new $modelname();
      }
    }

}

?>