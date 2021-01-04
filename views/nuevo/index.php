<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
    <?php require 'views/header.php'?>
</div>
    <div id="ingresar">

    <h2 class='center'>nuevo</h2>

    <div id="mensaje"><?php echo $this->mensaje; ?></div>
    <br>
    <form action="<?php echo constant('URL');?>nuevo/registrar_alumno" method="POST">
    <br>
    <label >matricula</label>
    <input type="text" name='matricula'>
    <br>
    <label >nombre</label>
    <input type="text" name='nombre'>
    <br>
    <label >apellido</label>
    <input type="text" name='apellido' >
    <br>
    <input type="submit" value='registrar'>
    </form>
    </div>
    <div>
    <?php require 'views/footer.php'?>
    </div>
</body>
</html>