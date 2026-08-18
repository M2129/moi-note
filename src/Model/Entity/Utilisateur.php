<?php

namespace GestionNotePooV2\Entity;

class Utilisateur
{
    private int $id;
    private string $nomcomplet;
    private string $login;
    private string $password;
    private Role $role;

    public function __construct(string $nomcomplet, string $login, string $password, Role $role)
    {
        $this->nomcomplet = $nomcomplet;
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNomComplet(): string
    {
        return $this->nomcomplet;
    }

    public function getlogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNomComplet(string $nomcomplet): void
    {
        $this->nomcomplet = $nomcomplet;
    }

    public function setlogin(string $login): void
    {
        $this->login = $login;
    }

    public function setpassword(string $password): void
    {
        $this->password = $password;
    }

    public function setRole(ROle $role): void
    {
        $this->role = $role;
    }

    public static function toEntity(\stdClass $obj): self
    {
        return new self(
            nomcomplet: $obj->nomutilisateur,
            login: $obj->login,
            password: $obj->password,
            role: Role::toEntity($obj)
        );
    }
}
