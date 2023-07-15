<?php

namespace Davide\Nuovo\Services;

use mysqli;

//da terminal
//composer require vlucas/phpdotenv

class Mysql
{

    private mysqli $mysqlConnection;

    public function __construct()
    {

        $this->mysqlConnection = new mysqli(
            $_ENV['DB_HOSTNAME'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE'],
            $_ENV['DB_PORT']
        );

    }

    public function cerca(): array
    {
        $utente="%".$_GET["utente"]."%";

        $stato = $this->mysqlConnection->prepare("select * from utenti where username like ?");
        $stato->bind_param("s", $utente);
        $stato->execute();

        //ottiene l'oggetto del risultato
        $result = $stato->get_result();

        //converto l'oggetto $result in array associativo
        return $result->fetch_all(MYSQLI_ASSOC);


    }


    public function login(string $user, string $password): bool
    {

        $stato = $this->mysqlConnection->prepare("select * from utenti where username=? and password=? limit 1");
        $stato->bind_param("ss", $user, $password);
        $stato->execute();

        $result = $stato->get_result();

        $res = $result->fetch_all(MYSQLI_ASSOC);


        if (count($res) > 0) {

            $_SESSION["username"] = $res[0]["username"];
            return true;

        }

        return false;

    }


    
}