<?php

/** class model : constructeur récupérer la BD, BD  --> Data : Sangl dans contructeur */
class Data
{

    private $serverName = "localhost";
    private $dBUsername = "root";
    private $dBPassword = "";
    private $dBName = "phpprojectbd";

    protected function connect()
    {
        $connexion = new mysqli($this->serverName, $this->dBUsername, $this->dBPassword, $this->dBName);

        if (!$connexion) {
            die("Connection failed: " . $connexion->connect_error);
        }
        return $connexion;
    }
}
