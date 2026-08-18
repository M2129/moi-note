<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Annescolaire;

class AnneeScolaireRepository
{
    public static function findAll(): array
    {
        $sql = "
            SELECT *
            FROM annee_scolaire
            ORDER BY date_debut DESC
        ";

        $resultats = Database::executeQuery($sql, [], false);
        $annees = [];
        foreach ($resultats as $resultat) {
            $annees[] = Annescolaire::toEntity($resultat);
        }
        return $annees;
    }

    public static function active(): Annescolaire|null
    {
        $sql = "
            SELECT *
            FROM annee_scolaire
            WHERE actif = TRUE
            LIMIT 1
        ";

        $resultat = Database::executeQuery($sql, [], true);
        return $resultat ? Annescolaire::toEntity($resultat) : null;
    }
}
