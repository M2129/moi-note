<?php

class AnneeScolaire
{
    private string $libelle;
    private string $dateDebut;
    private string $dateFin;

    public function __construct(
        string $libelle,
        string $dateDebut,
        string $dateFin,
    ) {
        $this->libelle = $libelle;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }
}
