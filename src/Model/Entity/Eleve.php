<?php

namespace GestionNotePooV2\Entity;

use GestionNotePooV2\Entity\Responsable;

class Eleve
{
    private int $id;
    private string $nomcomplet;
    private string $matricule;
    private Responsable $responsable;
    private \DateTime $dateNaissance;

    public function __construct(string $nomcomplet, string $matricule, Responsable $responsable, \DateTime $dateNaissance)
    {
        $this->nomcomplet = $nomcomplet;
        $this->matricule = $matricule;
        $this->responsable = $responsable;
        $this->dateNaissance = $dateNaissance;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNomComplet(): string
    {
        return $this->nomcomplet;
    }

    public function getMatricule(): string
    {
        return $this->matricule;
    }

    public function getResponsable(): Responsable
    {
        return $this->responsable;
    }

    public function getDateNaissance(): \DateTime
    {
        return $this->dateNaissance;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNomComplet(string $nomcomplet): void
    {
        $this->nomcomplet = $nomcomplet;
    }

    public function setMatricule(string $matricule): void
    {
        $this->matricule = $matricule;
    }

    public function setResponsable(Responsable $responsable): void
    {
        $this->responsable = $responsable;
    }

    public function setDateNaissance(\DateTime $dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }

    public static function toEntity(\stdClass $obj): self
    {


        return new self(
            nomcomplet: $obj->nomcomplet,
            matricule: $obj->matricule,
            responsable: Responsable::toEntity($obj),
            dateNaissance: new \DateTime($obj->date_naissance)
        );
    }
}
