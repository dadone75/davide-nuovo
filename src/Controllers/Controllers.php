<?php


namespace Davide\Nuovo\Controllers;

use Davide\Nuovo\Services\Mysql;
use Davide\Nuovo\Services\Render;
use Davide\Nuovo\Controllers\Utenti;

class Controllers{

  


    public static function home(array $request):void{

        Render::View("home",[]);

    }


    public static function login(array $request):void{

        Render::View("login",[]);

    }

    //voglio tornare alla pagna di login mostrando la variabile user 
    //se sotto metto ?variabile=nome e facio con header funziona ma volevo farlo con le rotte
    //quindi ho pensato di chiamare con self il metodo interno alla clase che rimanda ad una rotta
    //con variabile che ho "istanziato" nella index

    public static function login_error(array $request):void{

        Render::View("login",$request);

    }


    public static function accesso(array $request):void{
        
        $db= new Mysql;
        
        $db->login($request["username"],$request["password"]);

        if(isset($_SESSION["username"])){
        
            Render::View("accesso",[]);
        
        }else{

           // self::login_error($request);
           header("Location: ".$_ENV['BASE_URL']."/login?username=".$request["username"]);
        }
    }
 
    
    public static function cerca(){

        $db = new Mysql();

        if(isset($_SESSION["username"])===true){

           $var = $db->cerca();

           echo json_encode($var);

        }


    }


}




?>