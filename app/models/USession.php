<?php

namespace models;

class USession
{
    //Récupère une valeur à la position list, retourne un tableau vide si la clé n'existe pas
    $list=USession::get('list',[]);

    //Modifie une valeur à la position list
    $list=USession::set(self::ACTIVE_LIST_SESSION_ID,$list);

    //Teste l'existance de la clé ACTIVE_LIST_SESSION_ID
    if(USession::exists(self::ACTIVE_LIST_SESSION_ID)){
    }
}