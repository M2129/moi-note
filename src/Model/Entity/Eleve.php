<?php

class Eleve
{
    private string $matricule;
    private string $nom;
    private string $prenom;
    private string $dateNaissance;
    private string $sexe;

    public function __construct(
        string $matricule,
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $sexe
    ) {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->sexe = $sexe;
    }
}
