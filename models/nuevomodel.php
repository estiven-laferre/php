<?php
class nuevomodel extends model
{
    public function __construct()
    {
        parent::__construct();
    }
    function insert($datos)
    {
        try
        {
        $query=$this->db->connect()->prepare('INSERT INTO tercero(matricula,nombre,apellido) VALUES(:matricula,:nombre,:apellido)');
        $query->execute(['matricula'=>$datos['matricula'],'nombre'=>$datos['nombre'],'apellido'=>$datos['apellido']]);
        return true;
        }
        catch(PDOException $e)
        {
          return false;  
        }
    }
}
?>