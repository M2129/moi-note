<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Classe;

class ClasseRepository
{
    public static function findAll(): array
    {
        $sql = "
            SELECT c.id, c.nom, c.niveau, c.id_etablissement, e.nom AS nometablissement
            FROM classes c
            JOIN etablissements e
                ON e.id = c.id_etablissement
            ORDER BY c.nom
        ";

        $resultats = Database::executeQuery($sql, [], false);
        $classes = [];
        foreach ($resultats as $resultat) {
            $classes[] = Classe::toEntity($resultat);
        }
        return $classes;
    }

    public static function findById(int $id): Classe|null
    {
        $sql = "
            SELECT c.id, c.nom, c.niveau, c.id_etablissement, e.nom AS nometablissement
            FROM classes c
            JOIN etablissements e
                ON e.id = c.id_etablissement
            WHERE c.id = :id
        ";

        $resultat = Database::executeQuery($sql, ['id' => $id], true);
        return $resultat ? Classe::toEntity($resultat) : null;
    }
}
