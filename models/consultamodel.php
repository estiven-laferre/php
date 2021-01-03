<?php
require_once 'models/alumno.php';
class consultamodel extends model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    { 
        //array vacio para evitar errores
        $items=[];
        try
        {
            //conneccion SQL
            //llamado de todos los alumnos
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
    //conneccion SQL
    //llamado de un solo alumno atravez de la id
    public function get_by_id($id)
    {
       $item=new alumno();
       $query=$this->db->connect()->prepare("SELECT * FROM tercero WHERE matricula=:matricula");
       try
       {
           $query->execute(['matricula'=>$id]);
           while($row=$query->fetch())
           {
               $item->matricula=$row['matricula'];
               $item->nombre=$row["nombre"];
               $item->apellido=$row["apellido"];
           }
           return $item;
       }catch(PDOException $e)
       {
           return null;
       }
    }
    //actualizacion de alumno atravez de un array
    public function update($item)
    {
        $query=$this->db->connect()->prepare("UPDATE tercero SET nombre=:nombre, apellido=:apellido WHERE matricula=:matricula");
        try
        {
            $query->execute(
            [   
                'matricula'=>$item['matricula'],
                'nombre'=>$item['nombre'],
                'apellido'=>$item['apellido']
            ]);
            return true;
        }catch(PDOExecption $e)
        {
            return false;
        }
    }
    //funcion borrar atravez de id
    public function delete($id)

    {
        $query=$this->db->connect()->prepare("DELETE FROM tercero WHERE matricula=:id");
        try
        {
            $query->execute(
            [   
                'id'=>$id   
            ]);
            return true;
        }catch(PDOExecption $e)
        {
            return false;
        }
    }
}
?>