<?php

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
