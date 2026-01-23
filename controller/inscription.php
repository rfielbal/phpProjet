<h1 class="text-center">Inscription</h1>
<?php
var_dump($_POST);
if (isset($_POST['envoyer'])) {
    echo 'formulaire envoyé';
    $password = $_POST['password'];
    $confirmation = $_POST['confirmation'];
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    if ($password == $confirmation) {
        $password = password_hash($password,PASSWORD_DEFAULT);
        echo 'formulaire envoyé';
        echo $nom . " " . $prenom . " " . $email . " " . $password;
        $sql="insert into user(nom,prenom,email,password)values(:nom,:prenom,:email,:password)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
        $sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $r = $sth->execute();
        if ($r){
          echo "Inscription réussie"; 
        }
        else {
          echo "Echec lors de l'inscription";
        }
    } else {
        echo 'les mots de passe sont différents';
    }

}
?>
<form action="index.php?page=inscription" method="POST">
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
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
    </div>
    <label for="exampleInputPassword1" class="form-label mt-4">Confirmation</label>
      <input name="confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmation" autocomplete="off">
    <div>
    </div>
    <button name="envoyer" type="submit" class="btn btn-primary">s'inscrire</button>
</form>