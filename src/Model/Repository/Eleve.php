<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Eleve;

class EleveRepository
{
    public static function findAll(): array
    {
        $sql = "
            SELECT e.id, e.nomcomplet, e.matricule, e.date_naissance, r.id as responsable_id, r.nomcomplet as responsable_nom, r.numero
            FROM eleves e
            JOIN responsables r ON r.id = e.id_responsable
            ORDER BY e.nomcomplet
        ";

        $resultats = Database::executeQuery($sql, [], false);
        $eleves = [];
        foreach ($resultats as $resultat) {
            $eleves[] = Eleve::toEntity($resultat);
        }
        return $eleves;
    }

    public static function findById(int $id): Eleve|null
    {
        $sql = "
            SELECT e.id, e.nomcomplet, e.matricule, e.date_naissance, r.id as responsable_id, r.nomcomplet as responsable_nom, r.numero
            FROM eleves e
            JOIN responsables r ON r.id = e.id_responsable
            WHERE e.id = :id
        ";

        $resultat = Database::executeQuery($sql, ['id' => $id], true);
        return $resultat ? Eleve::toEntity($resultat) : null;
    }

    public static function findByMatricule(string $matricule): Eleve|null
    {
        $sql = "
            SELECT e.id, e.nomcomplet, e.matricule, e.date_naissance, r.id as responsable_id, r.nomcomplet as responsable_nom, r.numero
            FROM eleves e
            JOIN responsables r ON r.id = e.id_responsable
            WHERE e.matricule = :matricule
        ";

        $resultat = Database::executeQuery($sql, ['matricule' => $matricule], true);
        return $resultat ? Eleve::toEntity($resultat) : null;
    }

    public static function create(
        string $nomcomplet,
        string $matricule,
        string $dateNaissance,
        int $idResponsable
    ): int|string {
        $sql = "
            INSERT INTO eleves (
                nomcomplet,
                matricule,
                date_naissance,
                id_responsable
            )
            VALUES (
                :nomcomplet,
                :matricule,
                :date_naissance,
                :id_responsable
            )
        ";

        return Database::executeUpdate($sql, [
            'nomcomplet' => $nomcomplet,
            'matricule' => $matricule,
            'date_naissance' => $dateNaissance,
            'id_responsable' => $idResponsable
        ]);
    }
}
