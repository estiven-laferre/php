<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Document</title>
</head>

<body>
    <?php require 'views/header.php'?>
    <h2 class="center" >consulta</h2>
    <div id="templade">
     
    
    <br>
    <br>
    <table >
      <thead>
       <tr>
        <th>matricula</th>
        <th>nombre</th>
        <th>apellido</th>
       </tr>
      </thead>
      <tbody>
     
      <?php
       include_once 'models/alumno.php';
      foreach($this->alumnos as $row)
      {
          $alumno=new alumno();
          $alumno= $row;
          ?>
      <tr>
        <th><?php echo $alumno->matricula; ?></th>
        <th><?php echo $alumno->nombre ;?></th>
        <th><?php echo $alumno->apellido; ?></th>
        <th><a href="<?php echo constant('URL').'consulta/ver/'.$alumno->matricula; ?>">editar</a></th>
        <!--<th><a href="<?php echo constant('URL').'consulta/eliminar/'.$alumno->matricula; ?>">borrar</a></th>-->
        <td><button class="bEliminar" data-matricula="<?php echo $alumno->matricula; ?>">Eliminar</button></td>
       </tr>
       <?php } ?>
      </tbody>
    </table>
  </div>
    
    <script src="<?php echo constant('URL');?>public/js/main.js"></script>
    
</body>
</html>
<?php require 'views/footer.php'?>