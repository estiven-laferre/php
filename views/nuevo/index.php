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
    <h2 class='center'>nuevo</h2>

    <div id="mensaje"><?php echo $this->mensaje; ?></div>
    <form action="<?php echo constant('URL');?>nuevo/registrar_alumno" method="POST">
    <label >matricula</label>
    <input type="text" name='matricula'>
    <label >nombre</label>
    <input type="text" name='nombre'>
    
    <label >apellido</label>
    <input type="text" name='apellido' >
    <input type="submit" value='registrar'>
    </form>
    </div>
    <?php require 'views/footer.php'?>
    
</body>
</html>