<?php

namespace GestionNotePooV2\Entity;

use GestionNotePooV2\Entity\Etablissement;

class Classe
{
    private int $id;
    private string $nom;
    private Etablissement $etablissement;

    public function __construct(string $nom, Etablissement $etablissement)
    {
        $this->nom = $nom;
        $this->etablissement = $etablissement;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEtablissement(): Etablissement
    {
        return $this->etablissement;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setEtablissement(Etablissement $etablissement): void
    {
        $this->etablissement = $etablissement;
    }

    public static function toEntity(\stdClass $obj): Classe
    {
        return new Classe(nom: $obj->classe, etablissement: Etablissement::toEntity($obj));
    }
}
