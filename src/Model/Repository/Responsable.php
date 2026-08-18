<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Responsable;

class ResponsableRepository
{
    public static function findAll(): array
    {
        $sql = "
            SELECT *
            FROM responsables
            ORDER BY nomcomplet
        ";

        $resultats = Database::executeQuery($sql, [], false);
        $responsables = [];
        foreach ($resultats as $resultat) {
            $responsables[] = Responsable::toEntity($resultat);
        }
        return $responsables;
    }

    public static function findById(int $id): Responsable|null
    {
        $sql = "
            SELECT *
            FROM responsables
            WHERE id = :id
        ";

        $resultat = Database::executeQuery($sql, ['id' => $id], true);
        return $resultat ? Responsable::toEntity($resultat) : null;
    }
}
