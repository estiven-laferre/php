<?php
require_once 'models/alumno.php';
class consultamodel extends model
{
    public function __construct()
    {
        parent::__construct();
    }
    function get()
    { 
        $items=[];
        try
        {
        $query=$this->db->connect()->query("SELECT * FROM tercero");
        while($row=$query->fetch())
        {
            $item=new alumno();
            $item->matricula=$row['matricula'];
            $item->nombre=$row['nombre'];
            $item->apellido=$row['apellido'];

            array_push($items,$item);
        }
        return $items;
        }

        catch(PDOException $e)
        {
          return [];  
        }
    }
}
?>