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
    <h2 class='center'>detalle <?php echo $this->alumno->nombre ?> </h2>

    <div id="mensaje"><?php echo $this->mensaje; ?></div>
    <form action="<?php echo constant('URL');?>consulta/actualizar" method="POST">
    <label >matricula</label>
    <input type="text" disabled value='<?php echo $this->alumno->matricula ?>'>
    <label >nombre</label>
    <input type="text" name="nombre"  value='<?php echo $this->alumno->nombre ?>'>
    
    <label >apellido</label>
    <input type="text" name='apellido' value='<?php echo $this->alumno->apellido ?>' >
    <input type="submit" value='registrar'>
    </form>
    </div>
    <?php require 'views/footer.php'?>
    
</body>
</html>