<?php

$connexion_string = "mysql:dbname=unlim1004139;host=185.98.131.93;charset=utf8";

$login = "unlim1004139";

$mdp = "0rndx7lx17";











function openBDD()
{
    global $connexion_string;
    global $login;
    global $mdp;
    $bdd = new PDO($connexion_string, $login, $mdp);
    return $bdd;
}
