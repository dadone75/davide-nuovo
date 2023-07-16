<?php

namespace Davide\Nuovo\Controllers;

use Davide\Nuovo\Services\Render;

class Utenti
{

    public string $nome;
    public string $cognome;
    public string $ruolo;
    public int $eta;

    public function __construct(string $nome, string $cognome, string $ruolo, int $eta)
    {

        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->ruolo = $ruolo;
        $this->eta = $eta;

    }

    ///in realtà volevo passare un array che fosse tra le proprietà della classe
    //ma con jquery sono riuscito solo a passare un metodo statico

    public static function prova()
    {
        $dati = [["nome" => "davide", "cognome" => "cupri", "ruolo" => "STUDENT", "eta" => "48"],
        ["nome" => "davide", "cognome" => "cavallini", "ruolo" => "TEACHER", "eta" => "30"]];
       
        echo json_encode($dati);

    }
    public function setUtenti(string $utente): void
    {

        $this->nome = $utente;

    }

    public function getUtenti()
    {

        $stringa="davide";
        $this->setUtenti($stringa);

        if ($this->nome == 'davide') {

            $this->cognome = "cupri";
            $this->ruolo = "IT";
            $this->eta = 48;

        } else {

            $this->cognome = "";
            $this->ruolo = "";
            $this->eta = 0;

        }

        $dati = ["nome" => $this->nome, "cognnome" => $this->cognome, "ruolo" => $this->ruolo, "eta" => $this->eta];

        echo json_encode($dati);

        

    }



    public static function utenti(array $request): void
    {

        // use Davide\Nuovo\Controllers\Utente;

        Render::View("utenti", []);

    }


}


?>