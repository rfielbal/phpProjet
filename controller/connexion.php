<?php
// var_dump($_POST); 
if(isset($_POST['connecter'])){
  echo 'formulaire envoyé';
  $email=htmlentities($_POST['email']);
  $password=htmlentities($_POST['password']);
  echo $email." ".$password;
  $sql = "select email,password from user where email = :email";
  $sth = $dbh->prepare($sql);
  $sth->bindParam(':email', $email, PDO::PARAM_STR);
  $sth->execute();
  $row = $sth->fetch();
  // var_dump($row); 
  if ($row){
    $recupPassword = $row['password'];
    if(password_verify($password, $recupPassword)){
      echo 'Tout est bon';
      $_SESSION['login'] = $email;
      header('location: index.php');
    }
      else{
        echo "Il y a un problème d'identifiant";
      }
    }
  }else{
    echo "Il y a un problème d'identifiant";

  }
?>
<h1 class="text-center">Connexion</h1>

<form action="index.php?page=connexion" method="POST">
<div>
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div>
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
    </div>
    <div>
    <button name="connecter" type="submit" class="btn btn-primary">Submit</button>
</form>