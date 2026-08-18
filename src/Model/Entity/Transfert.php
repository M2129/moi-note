<?php

class Transfert
{
    private Inscription $inscription;

    private string $typeTransfert;
    private string $etablissementOrigine;
    private string $etablissementDestination;
    private string $dateTransfert;

    public function __construct(
        Inscription $inscription,
        string $typeTransfert,
        string $etablissementOrigine,
        string $etablissementDestination,
        string $dateTransfert,
    ) {
        $this->inscription = $inscription;
        $this->typeTransfert = $typeTransfert;
        $this->etablissementOrigine = $etablissementOrigine;
        $this->etablissementDestination = $etablissementDestination;
        $this->dateTransfert = $dateTransfert;
    }
}
