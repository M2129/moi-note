<?php

require_once __DIR__ . '/../Core/Database.php';

class Classe
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $sql = "
            SELECT c.id_classe, c.nom, c.niveau, c.etablissement_id, e.nom AS etablissement
            FROM classe c
            JOIN etablissement e
                ON e.id_etablissement = c.etablissement_id
            ORDER BY c.nom
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function findById(int $id): array|false
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM classe
            WHERE id_classe = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch();
    }
}
