<?php

namespace App\Models;

use Database\Database;

class AuthModel
{
    private $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function storeAccountGoogle($name, $email, $gender, $id_google, $picture): void
    {
        $sql = "SELECT * from users WHERE id_google = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_google]);

        if ($stmt->rowCount() == 0) {
            $sql = "INSERT INTO users (name, email, id_google, gender, picture, created_at, updated_at) VALUES(:name, :email, :id_google, :picture, :gender, NOW(), NOW())";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id_google', $id_google);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':picture', $picture);
            $stmt->execute();
            exit();
        } else {
            $sql = "SELECT id, name, email, gender, picture FROM users WHERE id_google = " . $id_google;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            $_SESSION['user'] = $user;
            $_SESSION['authenticated'] = 'authenticatedWithGoogle';
            header("Location: dashboard");
        }


    }

    public function storeAccount($name, $email, $password, $gender, $birthdate): void
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password, gender, birthdate, created_at, updated_at) 
        VALUES (:name, :email, :password, :gender, :birthdate, NOW(), NOW())";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->execute();

    }

    public function login($email, $password)
    {
        $sql = "SELECT id, email, password FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$user) {
            exit();
        } else {
            if (password_verify($password, $user['password'])) {
                $sql = "SELECT id, name, email, gender, birthdate, picture FROM users WHERE email = :email";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                $user = $stmt->fetch(\PDO::FETCH_ASSOC);

                $_SESSION['user'] = $user;
                $_SESSION['auth'] = 'authenticated';
            }
        }
    }


}