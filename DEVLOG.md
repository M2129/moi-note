# DEVLOG --- Gestion École

NOM: Pape Mamadou Seck Dieye

## Projet

Application de gestion scolaire --- module **Élèves & Inscriptions** et
module **Saisie des notes**.

## 17 août 2026

### Objectif du jour

Mettre en place le modèle de données et commencer la traduction du
modèle relationnel en POO PHP.

### Travail réalisé

#### 1. Analyse de l'interface Élèves & Inscriptions

L'interface présente notamment : - les élèves ; - le matricule ; - la
date de naissance ; - la classe ; - l'établissement ; - le responsable
; - le téléphone du responsable ; - le statut de l'inscription.

Les actions identifiées sont : - Inscription ; - Réinscription ; -
Transfert entrant ; - Transfert sortant.

#### 2. Modèle relationnel identifié

Les principales entités sont :

-   `ELEVE`
-   `RESPONSABLE`
-   `ELEVE_RESPONSABLE`
-   `ETABLISSEMENT`
-   `CLASSE`
-   `ANNEE_SCOLAIRE`
-   `STATUT_INSCRIPTION`
-   `INSCRIPTION`
-   `TRANSFERT`

Relations principales :

``` text
ETABLISSEMENT 1 ─── N CLASSE

ELEVE 1 ─── N INSCRIPTION
CLASSE 1 ─── N INSCRIPTION
ANNEE_SCOLAIRE 1 ─── N INSCRIPTION
STATUT_INSCRIPTION 1 ─── N INSCRIPTION

ELEVE N ─── N RESPONSABLE
        via ELEVE_RESPONSABLE

INSCRIPTION 1 ─── N TRANSFERT

pour les entites j'ai applique les concepts orientees objets suivant : classe, objet, encapsulation, abstraction, 
```
