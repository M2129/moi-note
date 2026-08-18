<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Responsable;

class EleveResponsableRepository
{
    public static function findByEleve(int $eleveId): array
    {
        $sql = "
            SELECT r.id, r.nomcomplet, r.numero
            FROM eleve_responsable er
            JOIN responsables r
                ON r.id = er.id_responsable
            WHERE er.id_eleve = :eleve_id
        ";

        $resultats = Database::executeQuery($sql, ['eleve_id' => $eleveId], false);
        $responsables = [];
        foreach ($resultats as $resultat) {
            $responsables[] = Responsable::toEntity($resultat);
        }
        return $responsables;
    }
}
