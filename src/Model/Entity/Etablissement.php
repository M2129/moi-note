<?php

class Etablissement
{
    private string $nom;
    private string $adresse;
    private string $telephone;

    public function __construct(
        string $nom,
        string $adresse,
        string $telephone
    ) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
    }
}
