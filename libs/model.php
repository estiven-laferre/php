<?php
//clase padre y coneccion de bases de datos SLQ 
class model{
    function __construct()
    {
        $this->db =new database();
    }
   
}

?>