<?php

namespace GestionNotePooV2\Entity;

use GestionNotePooV2\Entity\Eleve;
use GestionNotePooV2\Entity\Responsable;

class EleveResponsable
{
    private Eleve $eleve;
    private Responsable $responsable;
    private string $lien;

    public function __construct(
        Eleve $eleve,
        Responsable $responsable,
        string $lien
    ) {
        $this->eleve = $eleve;
        $this->responsable = $responsable;
        $this->lien = $lien;
    }
}
