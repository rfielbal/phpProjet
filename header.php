<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://bootswatch.com/5/solar/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse show" id="navbarColor03" style="">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php?page=accueil">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=contact">Contact</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?page=apropos">About</a>
        <li class="nav-item">
        <?php 
        if(isset($_SESSION['login'])){
          echo '<li class=nav-item">
        <a class="nav-link" href="index.php?page=profil">'.$_SESSION['login'].'</a>
        <a href="index.php?page=logout"><i class="bi bi-box-arrow-right"></i> </a>
        </li>';
      }else{
        echo '<li class=nav-item">
        <a class="nav-link" href="index.php?page=inscription">Inscription</a> </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?page=connexion">Connexion</a>
      </li>';
      }
        ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
