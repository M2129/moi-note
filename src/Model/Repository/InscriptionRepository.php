<?php

namespace GestionNotePooV2\Repository;

use GestionNotePooV2\Core\Database;
use GestionNotePooV2\Entity\Inscription;

class InscriptionRepository
{
    public static function getAllInscriptionsAndEleves(int $idAnnee): array
    {
        $sql = "select i.id, e.nomcomplet, e.matricule, c.nom as classe, r.nom as nomresponsable, r.prenom as prenomresponsable, r.numero ,et.nom as nometablissement, e.id as eleve_id, c.id as classe_id, r.id as responsable_id, et.id as etablissement_id, r.numero, e.date_naissance, an.annee, u.nomcomplet as nomUtilisateur, u.login, u.password, ro.nom as nom_role
            from inscriptions i
            inner join eleves e on e.id = i.id_eleve
            inner join responsables r on r.id = e.id_responsable
            inner join classes c on c.id = i.id_classe
            inner join etablissements et on et.id = c.id_etablissement
            inner join anneescolaires an on an.id = i.id_annee
            inner join utilisateurs u on u.id = i.id
            inner join roles ro on ro.id = u.role_id
            where i.id_annee = :idAnnee";

        $resultats = Database::executeQuery($sql, ["idAnnee" => $idAnnee], false);

        $inscriptions = [];
        foreach ($resultats as $resultat) {
            $inscriptions[] = Inscription::toEntity($resultat);
        }

        return $inscriptions;
    }
}
