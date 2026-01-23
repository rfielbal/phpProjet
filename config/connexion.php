<?php
$user = 'login4719'; 
$pass = 'cMqjitAPccsMcDr';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbPHP', $user, $pass);
} catch (PDOException $e) {
    $dbh=null;
}