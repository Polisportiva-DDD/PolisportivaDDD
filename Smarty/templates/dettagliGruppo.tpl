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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
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
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1>
      Nome Gruppo
    </h1>
    <hr>
    <!-- Content Row-->
    <div class="row">
      <!-- Sidebar Column-->
      <div class="col-lg-3 mb-4">
        <div class="list-group">
          <h2>Partecipanti</h2>
          {section name=nr loop=$invitati}
          <a class="list-group-item" href="#">{$invitati[nr]}</a>
          {/section}
        </div>
      </div>
      <!-- Content Column-->
      <div class="col-lg-9 mb-5 mt-5">
        <h2>Dettagli gruppo</h2>
        <div class="col-lg-9 mb-4 mt-4">
          Admin: {$admin}
        </div>
        <div class="col-lg-9 mb-4">
          Tipologia campo: {$campo}
        </div>
        <div class="col-lg-9 mb-4">
          Data e ora: {$dataEOra}
        </div>
        <div class="col-lg-9 mb-4">
          Posti disponibili: {$postiDisponibili}
        </div>
        <div class="col-lg-9 mb-4">
          Limiti di età: {$etaMinima}-{$etaMassima}
        </div>
        <div class="col-lg-9 mb-4">
          Limite livello: {$votoMinimo}
        </div>
        <div class="col-lg-9 mb-4">
          Descrizione: {$descrizione}
        </div>
        <div class="float-right mt-5">
          <button class="btn btn-primary" href="#">Chiedi di partecipare</button>
        </div>
        {if $isAmministratore}
          <div class="float-right mt-5 mx-3">
            <button class="btn btn-danger" href="#">Elimina gruppo</button>
          </div>
        {/if}
      </div>
    </div>
  </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</body>
</html>
