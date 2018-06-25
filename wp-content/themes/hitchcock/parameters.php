<?php

$connexion_string = "mysql:dbname=;host=;charset=utf8";

$login = "";

$mdp = "";











function openBDD()
{
    global $connexion_string;
    global $login;
    global $mdp;
    $bdd = new PDO($connexion_string, $login, $mdp);
    return $bdd;
}
