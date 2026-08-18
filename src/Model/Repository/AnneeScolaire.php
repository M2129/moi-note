<?php

require_once __DIR__ . '/../Core/Database.php';

class AnneeScolaire
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM annee_scolaire
            ORDER BY date_debut DESC
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function active(): array|false
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM annee_scolaire
            WHERE actif = TRUE
            LIMIT 1
        ");

        $stmt->execute();

        return $stmt->fetch();
    }
}
