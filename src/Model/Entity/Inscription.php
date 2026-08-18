<?php

class Inscription
{
    private Eleve $eleve;
    private Classe $classe;
    private AnneeScolaire $annee;
    private StatutInscription $statut;

    private string $dateInscription;
    private ?string $dateSortie;

    public function __construct(
        Eleve $eleve,
        Classe $classe,
        AnneeScolaire $annee,
        StatutInscription $statut,
        string $dateInscription,
        ?string $dateSortie = null
    ) {
        $this->eleve = $eleve;
        $this->classe = $classe;
        $this->annee = $annee;
        $this->statut = $statut;
        $this->dateInscription = $dateInscription;
        $this->dateSortie = $dateSortie;
    }
}
