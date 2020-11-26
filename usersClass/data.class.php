<?php

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
        if (!$connexion->set_charset("utf8")) {
            printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $connexion->error);
            exit();
        }
//        else {
//            printf("Jeu de caractères courant : %s\n", $connexion->character_set_name());
//        }
        return $connexion;
    }


}
