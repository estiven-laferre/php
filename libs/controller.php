<?php

class Controller{

    function __construct()
    {
        //echo "<p>Controlador base</p>";
        $this->view = new View();
    }
    function loadmodel($model)
    {
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