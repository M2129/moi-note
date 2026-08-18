<?php

class Database
{
    private static ?PDO $connexion = null;

    private function __construct()
    {
        // Singleton pattern: prevent direct instantiation
    }

    public static function getConnexion(): PDO
    {
        if (self::$connexion === null) {

            $dsn = "pgsql:host=127.0.0.1;port=5432;dbname=gestion_ecole";

            try {
                self::$connexion = new PDO(
                    $dsn,
                    'postgres',
                    ''
                );

                self::$connexion->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

                self::$connexion->setAttribute(
                    PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::FETCH_ASSOC
                );

            } catch (PDOException $e) {
                die(
                    "Erreur de connexion : "
                    . $e->getMessage()
                );
            }
        }

        return self::$connexion;
    }
}
