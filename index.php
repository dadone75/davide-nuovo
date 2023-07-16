<?php
session_start();


use Dotenv\Dotenv;
use Davide\Nuovo\Services\Route;
use Davide\Nuovo\Controllers\Controllers;
use Davide\Nuovo\Controllers\Utenti;
//definizione di costanti
define('BASE_DIR', __DIR__);
//posso richiamarla senza $ come le altre variabili
require BASE_DIR.'/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(BASE_DIR);
$dotenv->load();


Route::get("/",Controllers::class,"home");
Route::get("/login",Controllers::class,"login");
Route::post("/login/(user)",Controllers::class,"login_error");
Route::post("/accesso",Controllers::class,"accesso");
Route::get("/accesso/dati",Controllers::class,"cerca");
Route::get("/utenti",Utenti::class,"utenti");
Route::get("/dati",Utenti::class,"prova");

?>