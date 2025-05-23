<?php


namespace App\Models;

use Database\Database;
use PDO;

class ProfileModel
{
    private $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function update($avatar, $name, $email, $password, $gender, $birthdate): array
    {
        try {
            $imagePath = null;

            // Verifica se um arquivo de imagem foi enviado
            if (is_array($avatar) && isset($avatar['tmp_name']) && !empty($avatar['tmp_name'])) {
                // Caminho físico onde será salvo o arquivo
                $uploadDir = __DIR__ . '/../../public/images/profile/uploads/';
                $relativePath = 'images/profile/uploads/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                // Tipo e nome do arquivo
                $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
                $newFileName = uniqid('profile_') . '.' . $extension;
                $fullPath = $uploadDir . $newFileName;

                if (move_uploaded_file($avatar['tmp_name'], $fullPath)) {
                    $imagePath = $relativePath . $newFileName;
                } else {
                    throw new \Exception('Erro ao fazer upload da imagem.');
                }
            }

            // Parâmetros obrigatórios
            $params = [
                ':name' => $name,
                ':email' => $email,
                ':gender' => $gender,
                ':birthdate' => $birthdate,
                ':user_id' => $_SESSION['user']['id']
            ];

            // Começa a construir a query
            $setFields = "name = :name, email = :email, gender = :gender, birthdate = :birthdate, updated_at = NOW()";

            // Se houver senha, adiciona
            if (!empty($password)) {
                $setFields .= ", password = :password";
                $params[':password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            // Se houver imagem, adiciona
            if ($imagePath) {
                $setFields .= ", picture = :picture";
                $params[':picture'] = $imagePath;
            }

            // Query final montada de forma clara
            $query = "UPDATE users SET $setFields WHERE id = :user_id";

            $stmt = $this->pdo->prepare($query);

            if ($stmt->execute($params)) {
                return ['success' => true, 'message' => 'Perfil atualizado com sucesso.'];
            } else {
                return ['success' => false, 'message' => 'Erro ao atualizar o perfil.'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($result)) {
            return [];
        } else {
            return $result[0];
        }
    }


}