<?php

require_once 'model/User.php';

class UserController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function createUser($name, $email, $password) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->password = $password;

        try {
            if ($this->user->create()) {
                echo "User was created.";
            } else {
                echo "Unable to create user.";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function listUsers() {
        $result = $this->user->read();
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}
?>
