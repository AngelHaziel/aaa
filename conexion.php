<?php 
class Database
{
    private $hostname = "10.0.0.5";
    private $database = "bdpokegarden";
    private $username = "angel";
    private $password = "1234";
    private $charset = "utf8";

    function conectar(){
        try{
            
        $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database .";  
        charset=" . $this->charset; 
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $pdo = new PDO($conexion, $this->username, $this->password,$option);
        
        return $pdo;
        }
        catch(PDOException $e){
            echo 'Error de Conexion' . $e->getMessage();
            exit;
        }
    }
}
?>