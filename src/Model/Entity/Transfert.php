<?php

namespace GestionNotePooV2\Entity;

use GestionNotePooV2\Entity\Inscription;
use GestionNotePooV2\Entity\Eleve;
use GestionNotePooV2\Entity\Classe;
use GestionNotePooV2\Entity\Etablissement;
use GestionNotePooV2\Entity\Annescolaire;
use GestionNotePooV2\Entity\Utilisateur;
use GestionNotePooV2\Entity\Role;
use GestionNotePooV2\Entity\StatutTransfert;
use GestionNotePooV2\Entity\Responsable;
use GestionNotePooV2\Entity\StatutIncription;

class Transfert
{
    private int $id;
    private string $etablissementSortant;
    private string $etablissementEntrant;
    private Inscription $inscription;
    private StatutTransfert $statut;

    public function __construct(
        string $etablissementSortant,
        string $etablissementEntrant,
        Inscription $inscription,
        StatutTransfert $statut
    ) {
        $this->etablissementSortant = $etablissementSortant;
        $this->etablissementEntrant = $etablissementEntrant;
        $this->inscription = $inscription;
        $this->statut = $statut;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEtablissementEntrant(): string
    {
        return $this->etablissementEntrant;
    }

    public function getEtablissementSortant(): string
    {
        return $this->etablissementSortant;
    }

    public function getInscription(): Inscription
    {
        return $this->inscription;
    }

    public function getStatut(): StatutTransfert
    {
        return $this->statut;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setEtablissementEntrant(string $etablissementEntrant): void
    {
        $this->etablissementEntrant = $etablissementEntrant;
    }

    public function setEtablissementSortant(string $etablissementSortant): void
    {
        $this->etablissementSortant = $etablissementSortant;
    }

    public function setStatut(StatutTransfert $statut): void
    {
        $this->statut = $statut;
    }

    public function setInscription(Inscription $inscription): void
    {
        $this->inscription = $inscription;
    }

    public static function toEntity(\stdClass $obj): self
    {
        $transfert = new self(
            etablissementSortant: $obj->etablissement_origine,
            etablissementEntrant: $obj->etablissement_destination,
            inscription: new Inscription(
                eleve: new Eleve('', '', new Responsable('', ''), new \DateTime()),
                classe: new Classe('', new Etablissement('')),
                annescolaire: new Annescolaire(''),
                utilisateur: new Utilisateur('', '', '', new Role('')),
                statut: StatutIncription::INSCRIT
            ),
            statut: new StatutTransfert('')
        );
        $transfert->setId($obj->id ?? 0);
        return $transfert;
    }
}
