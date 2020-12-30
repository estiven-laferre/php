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
    <div>
    <h2 class='center'>consulta</h2>
    </div>
    <table width='100%'>
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
        <th><a href="">editar</a></th>
        <th><a href="">borrar</a></th>
       </tr>
       <?php } ?>
      </tbody>
    </table>
  
    <?php require 'views/footer.php'?>
    
</body>
</html>