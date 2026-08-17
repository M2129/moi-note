<?php

class Classe
{
    private string $nom;
    private string $niveau;
    private Etablissement $etablissement;

    public function __construct(
        string $nom,
        string $niveau,
        Etablissement $etablissement
    ) {
        $this->nom = $nom;
        $this->niveau = $niveau;
        $this->etablissement = $etablissement;
    }
}
