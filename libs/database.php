<?php
class database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct()
    {
        $this->host=constant('host');
        $this->db=constant('db');
        $this->user=constant('user');
        $this->password=constant('password');
        $this->charset=constant('charset');
    }
    function connect()
    {
        try
        {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
        }
        catch(PDOException $e)
        {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
    
}
?>