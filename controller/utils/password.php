<?php
function verifPassword($actuel, $nouveau, $confirmation)
{
    $result = false;
    $error = array();
    $error[] = verifVide($actuel, $nouveau, $confirmation);
    $error[] = verifTaille($nouveau);
    var_dump($error);
    return $result;
    
    if ($message == null) {
        $result = true;
    } else {
        echo "$message";
    }
    return $result;
}

function verifVide($actuel, $nouveau, $confirmation)
{
    $result = null;
    if (empty($actuel) || empty($nouveau) || empty($confirmation)) {
        $result = 'veuillez saisir toutes les informations';
    }
    return $result;
}
function VerifTaille($nouveau)
{
    $result = null;
    $nb = strlen($nouveau);
    if ($nb < 12) {
        echo 'Le mot de passe doit contenir au minimum 12 caractères';
    }
    return $result;
}
