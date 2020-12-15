<?php
include "../core/Config.php";

class Database
{
    private static ?mysqli $instance = null;

    /**
     * Database constructor.
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
            printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", self::$instance->error);
            exit();
        }
    }

    /**
     * @return mysqli|null
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            new self();
        }
        return self::$instance;
    }

    /**
     * @return null
     */
    public function __destructor()
    {
        return null;
    }

    /**
     * Insert:
     * @access public
     * @param string $table
     * @param array $fields
     * @return string|boolean
     * @since 1.0.1
     */
    public function insert($table, array $fields)
    {
        if (count($fields)) {
            $params = [];
            foreach ($fields as $key => $value) {
                $params[":{$key}"] = $value;
            }
            $columns = implode("`, `", array_keys($fields));
            $values = implode(", ", array_keys($params));
            if (!self::getInstance()->query("INSERT INTO `{$table}` (`{$columns}`) VALUES({$values})", $params)->error()) {
                return (self::getInstance()->lastInsertId()); // --/!\--
            }
        }
        return false;
    }
}
