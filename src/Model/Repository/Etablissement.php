<?php

require_once __DIR__ . '/../Core/Database.php';

class Etablissement
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM etablissement
            ORDER BY nom
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function findById(int $id): array|false
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM etablissement
            WHERE id_etablissement = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch();
    }
}
