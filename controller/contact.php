<h1 class="text-center">Contactez-moi</h1>
<?php
var_dump($_POST); 
if(isset($_POST['envoyer'])){
  echo 'formulaire envoyé';
  $message = $_POST['message'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
        echo 'formulaire envoyé';
        echo $nom . " " . $prenom . " " . $email . " " . $message;
        $sql="insert into contact(nom,prenom,email,message)values(:nom,:prenom,:email,:message)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
        $sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':message', $message, PDO::PARAM_STR);
        $r = $sth->execute();
        if ($r){
          echo "message envoyé"; 
        }
        else {
          echo "Echec de l'envoie";
        }
    }
?>
<form action="index.php?page=contact" method="POST">
    <div>
      <label for="exampleInputnom1" class="form-label mt-4">Nom</label>
      <input name="nom" type="text" class="form-control" id="exampleInputnom1" aria-describedby="nomHelp" placeholder="Enter nom">
    </div>
    <div>
        <label for="exampleInputprenom1" class="form-label mt-4">Prénom</label>
        <input name="prenom" type="text" class="form-control" id="exampleInputprenom1" aria-describedby="nomHelp" placeholder="Enter prenom">
    </div>
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div>
    <label for="exampleInputmessage1" class="form-label mt-4">Message</label>
      <textarea name="message" class="form-control" id="exampleInputmessage1" aria-describedby="nomHelp" placeholder="Enter message" cols="50" rows="5"></textarea>
    </div>
    <button name="envoyer" type="submit" class="btn btn-primary">envoyer</button>
</form>