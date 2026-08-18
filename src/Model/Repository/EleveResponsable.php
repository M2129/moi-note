<?php

require_once __DIR__ . '/../Core/Database.php';

class EleveResponsable
{
    public static function findByEleve(int $eleveId): array
    {
        $pdo = Database::getConnexion();

        $sql = "
            SELECT r.id_responsable, r.nom, r.prenom, r.telephone, r.adresse, er.lien
            FROM eleve_responsable er
            JOIN responsable r
                ON r.id_responsable = er.responsable_id
            WHERE er.eleve_id = :eleve_id
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'eleve_id' => $eleveId
        ]);

        return $stmt->fetchAll();
    }
}
