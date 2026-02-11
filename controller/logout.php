<?php
$_SESSION=array(); //demande de créer un tableau vide dasn $_SESSION => écrase toutes les données 
session_destroy(); // s'assurer qu'il n'y a plus rien 
header('location: index.php');
?>