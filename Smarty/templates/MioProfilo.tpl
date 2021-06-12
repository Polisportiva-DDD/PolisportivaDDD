<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
  <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<div class="container mb-2 mt-2" dir="rtl" >
  <div class="table-responsive" >
    <table>
      <tr >
        <th scope="col" class="padTh"><a href="#">  <button type="button" class="btn btn-primary">Logout</button></a></th>
        <th scope="col" class="padTh"><a href="#"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
        <th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="search"></th>
        <th scope="col" class="padTh"><span class="fas fa-search ml-1"></span></th>
      </tr>
    </table>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">


    <a class="navbar-brand" href="home">Polisportiva DDD</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="RicercaGruppo.html">Gruppi</a></li>
        {if $isAmministratore}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
              <a class="dropdown-item" href="UItentiBannati.html">Utenti Bannati</a>
              <a class="dropdown-item" href="SegnalazioniAmministratore.html">Segnalazioni</a>
              <a class="dropdown-item" href="#">Modifica prezzi</a>
            </div>
          </li>
        {else}
          <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
        {/if}
      </ul>
    </div>
  </div>
</nav>
<section class="py-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Il tuo profilo</h1>
    <ol class="breadcrumb mb-4 h-100">

    </ol>
    <div class="row">
      <div class="col-md-8">
      <div class="text-center mb-2">
        <!-- Profilo -->
          <img src="https://via.placeholder.com/250" class="rounded-circle" alt="Immagine utente">
      </div>
      <div class="text-center">
        <h5 class="mb-2">Username: {$username}</h5>
        <h5 class="mb-2">Nome: {$nome}</h5>
        <h5 class="mb-2">Cognome: {$cognome}</h5>
        <h5 class="mb-2">Età: {$eta} anni</h5>
        <h5 class="mb-2">Valutazione media:
          {for $start=1 to $valutazioneMedia}
            <span class="fa fa-star checkedStar"></span>
          {/for}
          {for $start=$valutazioneMedia+1 to 5}
            <span class="fa fa-star"></span>
          {/for}
        </h5>
      </div>
      </div>


      <!-- Sidebar Widgets Column-->
      <div class="col-md-4">
        <div class="list-group mb-4">
          <a class="list-group-item" href="#">Profilo personale</a>
          <a class="list-group-item" href="#">I tuoi gruppi</a>
          <a class="list-group-item" href="#">Le tue carte</a>
          <a class="list-group-item" href="#">Recensione</a>
        </div>
        <form class="card">
          <div class="card-body rounded">
            <h5 class="card-title">Wallet</h5>
            <p class="card-text">Questo è il tuo wallet</p>
          </div>
          <ul class="list-group list-group-flush">
            {section name=nr loop=$results}
              <li class="list-group-item">{$results[nr].nomeCampo} <span class="float-right">{$results[nr].quantitaGettoni}</span></li>
            {/section}
          </ul>

          <div class="card-body m-auto">
            <a href="/PolisportivaDDD/Gettoni/acquista" class="btn btn-primary btn-lg">Acquista gettoni</a>

          </div>

        </div>


      </div>
    </div>
  </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>