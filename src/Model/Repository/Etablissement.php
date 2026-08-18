<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Etablissement;

class EtablissementRepository
{
    public static function findAll(): array
    {
        $sql = "
            SELECT *
            FROM etablissements
            ORDER BY nom
        ";

        $resultats = Database::executeQuery($sql, [], false);
        $etablissements = [];
        foreach ($resultats as $resultat) {
            $etablissements[] = Etablissement::toEntity($resultat);
        }
        return $etablissements;
    }

    public static function findById(int $id): Etablissement|null
    {
        $sql = "
            SELECT *
            FROM etablissements
            WHERE id = :id
        ";

        $resultat = Database::executeQuery($sql, ['id' => $id], true);
        return $resultat ? Etablissement::toEntity($resultat) : null;
    }
}
