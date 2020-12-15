<?php
include "../core/Config.php";

/**
 * Class Database : For the management of the database.
 * This class is a singleton. Call getInstance() to get the database
 */
class Database
{
    private static ?mysqli $instance = null;

    /**
     * Database private constructor. To instantiate only once the class. The data information is defined in Config.php
     */
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
            error_log("Erreur lors du chargement du jeu de caractères utf8 : %s\n", self::$instance->error);
            exit();
        }
    }

    /**
     * @return mysqli|null instance of the database
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            new self();
        }
        return self::$instance;
    }

    /**
     * destroy the instance
     */
    public function __destructor()
    {
        self::$instance = null;
    }
}
