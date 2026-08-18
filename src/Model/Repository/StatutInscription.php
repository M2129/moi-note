<?php

require_once __DIR__ . '/../Core/Database.php';

class StatutInscription
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $stmt = $pdo->prepare("
            SELECT *
            FROM statut_inscription
            ORDER BY libelle
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
