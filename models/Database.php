<?php
include "../core/Config.php";

/**
 * Class Database
 * For database management
 */
class Database
{
    private static ?mysqli $instance = null;

    private function __construct()
    {
        $serverName = core\Config::get("DATABASE_HOST");
        $dBUsername = core\Config::get("DATABASE_USERNAME");
        $dBPassword = core\Config::get("DATABASE_PASSWORD");
        $dBName = core\Config::get("DATABASE_NAME");

        self::$instance = new mysqli("$serverName", "$dBUsername", "$dBPassword", "$dBName");

        if (!self::$instance) {
            die("Connection failed: " . self::$instance->connect_error);
        }

        if (!self::$instance->set_charset("utf8")) {
            printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", self::$instance->error);
            exit();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            new self();
        }
        return self::$instance;
    }

    public function __destructor()
    {
        return null;
    }
}
