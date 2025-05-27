<?php

namespace App\Models;

use Database\Database;

class DashboardModel
{
    private $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getUserInfo($id)
    {
        $sql = "SELECT id, name, email, gender, birthdate, picture, mbti_type, mbti_description, intelligences, about_me, memories, strengths, weaknesses, `values`, aptitudes, relationships, daily_life, school_life, self_view, others_view, self_esteem FROM users WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}