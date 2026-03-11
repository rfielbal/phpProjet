Les Regex
<?php

if (preg_match("/bonjour/", "je vous présente mon bonjour")) {
    echo "test 1 ok <br />";
    echo preg_replace("/bonjour/","au revoir","je vous présente mon bonjour",1);
    echo preg_replace("/input/","<input type=\"text\"/>","je vous présente mon input input input");
}
if (preg_match("/[0-9]/", "je vous présente mon bonjour 8 fois")) {
    echo "test 2 ok <br />";
}
if (preg_match("/\d/", "je vous présente mon bonjour 9 fois")) {
    echo "test 3 ok <br />";
}
if (preg_match("/[a-z]/", "j")) {
    echo "test 4 ok <br />";
}
if (preg_match("/[A-Z]/", "J")) {
  echo "test 5 ok <br />";
}
if (preg_match("/[^a-zA-z0-9]/", "?")) {
  echo "test 6 ok <br />";
}
if (preg_match("/\W/", "?")) {
  echo "test 7 ok <br />";
}
if (preg_match("/^bonne/", "bonne game")) {
  echo "test 8 ok <br />";
}
if (preg_match("/game$/", "bonne game")) {
  echo "test 9 ok <br />";
}
// vérifier s'il y a 10 chiffres consécutifs. 
if (preg_match("/\d{10}/", "0123456789")) {
  echo "test 10 ok <br />";
}
// vérifier que ça commence par une lettre minuscule et qu'il y ait un chiffre 
if (preg_match("/^[a-z]{1}\d/", "e1234")) {
  echo "test 11 ok <br />";
}
// si y'a bien une lettre minuscule, deux chiffres et 3 majuscules 
if (preg_match("/^[a-z]{1}\d{2}[A-Z]{3}$/", "e01GGG")) {
  echo "test 12 ok <br />";
}
// Numéro de téléphone
if (preg_match("/^[0]\d{1}[-]\d{2}[-]\d{2}[-]\d{2}[-]\d{2}$/", "0641556243")) {
  echo "test 13 ok <br />";
}
// Permet de récupérer que les valeurs numériques 
$result = preg_grep("/\d/", array(12,"arras",45,"Lens"));
for ($i=0;$i<count($result);$i++){
echo "<br />".$result[$i];
}
?>