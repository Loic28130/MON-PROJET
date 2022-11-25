<?php
    function connecter(){
        return isset($_SESSION["nom"]);
    }

    // permet de savoir si on est connecter en tant que client
    function connecter_client(){
        return isset ($_SESSION["type"]) && $_SESSION["type"] == "client";
    }

    // permet de savoir si on est connecter en tant que collaborateur
    function connecter_collaborateur(){
        return isset ($_SESSION["type"]) && $_SESSION["type"] == "collaborateur";
    }

?>