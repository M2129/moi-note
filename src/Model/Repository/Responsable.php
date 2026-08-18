<?php

require_once __DIR__ . '/../Core/Database.php';

class Responsable
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM responsable
            ORDER BY nom, prenom
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function findById(int $id): array|false
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM responsable
            WHERE id_responsable = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch();
    }
}
