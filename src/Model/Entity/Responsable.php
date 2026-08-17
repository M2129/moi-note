<?php

class Responsable
{
    private string $nom;
    private string $prenom;
    private string $telephone;
    private string $adresse;

    public function __construct(
        string $nom,
        string $prenom,
        string $telephone,
        string $adresse
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
    }
}
