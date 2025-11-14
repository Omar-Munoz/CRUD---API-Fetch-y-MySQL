<?php
class DB {
    private $host = "localhost";
    private $dbname = "productosdb";
    private $user = "root";
    private $pass = "";
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", 
                                 $this->user, 
                                 $this->pass,
                                 [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die(json_encode(["success" => false, "message" => $e->getMessage()]));
        }
    }

    public function insertSeguro($sql, $params) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function updateSeguro($sql, $params) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
