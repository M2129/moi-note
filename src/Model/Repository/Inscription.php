<?php

require_once __DIR__ . '/../Core/Database.php';

class Inscription
{
    public static function findAll(): array
    {
        $pdo = Database::getConnexion();

        $sql = "
            SELECT i.id_inscription, e.id_eleve, e.matricule, e.nom, e.prenom, e.date_naissance, c.id_classe, c.nom AS classe, et.id_etablissement, et.nom AS etablissement,
                    r.id_responsable, r.nom AS responsable_nom, r.prenom AS responsable_prenom, r.telephone AS responsable_telephone, a.id_annee, a.libelle AS annee_scolaire,
                    s.id_statut, s.libelle AS statut
            FROM inscription i
            JOIN eleve e
                ON e.id_eleve = i.eleve_id
            LEFT JOIN classe c
                ON c.id_classe = i.classe_id
            LEFT JOIN etablissement et
                ON et.id_etablissement = c.etablissement_id
            JOIN annee_scolaire a
                ON a.id_annee = i.annee_id
            JOIN statut_inscription s
                ON s.id_statut = i.statut_id
            LEFT JOIN eleve_responsable er
                ON er.eleve_id = e.id_eleve
            LEFT JOIN responsable r
                ON r.id_responsable = er.responsable_id
            ORDER BY e.nom, e.prenom
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
