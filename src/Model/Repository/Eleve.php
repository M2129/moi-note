<?php

require_once __DIR__ . '/../Core/Database.php';

class Eleve
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $sql = "
            SELECT e.id_eleve, e.matricule, e.nom, e.prenom, e.date_naissance, e.sexe
            FROM eleve e
            ORDER BY e.nom, e.prenom
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function findById(int $id): array|false
    {
        $pdo = Database::getConnexion();

        $sql = "
            SELECT *
            FROM eleve
            WHERE id_eleve = :id
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch();
    }

    public static function findByMatricule(string $matricule): array|false
    {
        $pdo = Database::getConnexion();

        $sql = "
            SELECT *
            FROM eleve
            WHERE matricule = :matricule
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'matricule' => $matricule
        ]);

        return $stmt->fetch();
    }

    public static function create(
        string $matricule,
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $sexe
    ): bool {
        $pdo = Database::getConnexion();

        $sql = "
            INSERT INTO eleve (
                matricule,
                nom,
                prenom,
                date_naissance,
                sexe
            )
            VALUES (
                :matricule,
                :nom,
                :prenom,
                :date_naissance,
                :sexe
            )
        ";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            'matricule' => $matricule,
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $dateNaissance,
            'sexe' => $sexe
        ]);
    }
}
