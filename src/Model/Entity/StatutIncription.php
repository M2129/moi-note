<?php
namespace GestionNotePooV2\Entity;

enum StatutIncription : string{
    case EN_ATTENTE = "EN ATTENTE";
    case INSCRIT = "INSCRIT";
    case NON_AFFECTE = "NON AFFECTE";
}
