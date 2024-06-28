<?php

class User {
    private $conn;
    private $table_name = "users"; // Certifique-se de que a propriedade está definida corretamente

    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        // Verificar se o e-mail já existe
        if ($this->emailExists()) {
            throw new Exception("Email already exists.");
        }

        $query = "INSERT INTO " . $this->table_name . " (name, email, password) VALUES (:name, :email, :password)";

        $stmt = $this->conn->prepare($query);

        // Vincular parâmetros
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        
        // Hash da senha
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $hashed_password);

        // Executar a consulta
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function emailExists() {
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

    public function read() {
        $query = "SELECT id, name, email FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>
