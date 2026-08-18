<?php

require_once __DIR__ . '/../Core/Database.php';

class Transfert
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $sql = "
            SELECT t.id_transfert, t.type_transfert, t.etablissement_origine, t.etablissement_destination, t.date_transfert, t.motif,
                    e.matricule, e.nom, e.prenom
            FROM transfert t
            JOIN inscription i
                ON i.id_inscription = t.inscription_id
            JOIN eleve e
                ON e.id_eleve = i.eleve_id
            ORDER BY t.date_transfert DESC
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
