<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;

class StatutInscriptionRepository
{
    public static function findAll(): array
    {
        $sql = "
            SELECT *
            FROM statut_inscription
            ORDER BY libelle
        ";

        return Database::executeQuery($sql, [], false);
    }
}
