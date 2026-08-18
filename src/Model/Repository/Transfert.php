<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Transfert;

class TransfertRepository
{
    public static function findAll(): array
    {
        $sql = "
            SELECT t.id, t.type_transfert, t.etablissement_origine, t.etablissement_destination, t.date_transfert, t.motif,
                    e.matricule, e.nomcomplet
            FROM transferts t
            JOIN inscriptions i
                ON i.id = t.id_inscription
            JOIN eleves e
                ON e.id = i.id_eleve
            ORDER BY t.date_transfert DESC
        ";

        $resultats = Database::executeQuery($sql, [], false);
        $transferts = [];
        foreach ($resultats as $resultat) {
            $transferts[] = Transfert::toEntity($resultat);
        }
        return $transferts;
    }
}
