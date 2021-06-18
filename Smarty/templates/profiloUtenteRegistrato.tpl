<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>
  <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<!-- Navigation-->
<div class="container mb-2 mt-2" dir="rtl" >
  <div class="table-responsive" >
    <table>
      <tr >
        <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/logout">  <button type="submit" class="btn btn-primary">Logout</button></a></th>
        <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/mioProfilo"><button type="submit" class="btn btn-secondary" >Profilo</button></a></th>
        <form method="post" action="/PolisportivaDDD/Utente/Utenti">
          <th scope="col" class="padTh"><button type="submit" class="btn btn-outline-dark"><span class="fas fa-search"></span></button></th>
          <th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="searchedUser"></th>
        </form>
      </tr>
    </table>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">


    <a class="navbar-brand" href="/PolisportivaDDD/Utente/home">Polisportiva DDD</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Gruppo/gruppi">Gruppi</a></li>
        {if $isAmministratore}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
              <a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
              <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/segnalazioni">Segnalazioni</a>
              <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/modificaPrezzi">Modifica prezzi</a>
            </div>
          </li>
        {else}
          <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/informazioni">Informazioni</a></li>
        {/if}
      </ul>
    </div>
  </div>
</nav>

<section class="py-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Profilo Utente</h1>
    <hr>
    <div class="row">
      <div class="col-md-12">
      <div class="text-center mb-2">
        <!-- Profilo -->
        {if $pic64  neq ""}
          <img src="data:;base64,{$pic64}" alt="Immagine utente"  class="rounded-circle" width="200" height="200" loading="lazy">
        {else}
          <img  src="https://via.placeholder.com/300"  class="rounded-circle" alt="Immagine Utente">
        {/if}
      </div>
      <div class="text-center">
        <h6 class="mb-2">Username: {$username}</h6>
        <h6 class="mb-2">Nome: {$nome}</h6>
        <h6 class="mb-2">Cognome: {$cognome}</h6>
        <h6 class="mb-2">Età: {$eta} anni</h6>
        <h6 class="mb-2">Valutazione media:
          {for $start=1 to $valutazioneMedia}
            <span class="fa fa-star checkedStar"></span>
          {/for}
          {for $start=$valutazioneMedia+1 to 5}
            <span class="fa fa-star"></span>
          {/for}
        </h6>
      </div>
      </div>
    </div>
    {if $isAmministratore}
    <form action="/PolisportivaDDD/Amministratore/aggiungiGettoni" method="POST">
    <div class="row mb-2 ">
      <div class="col-md-12 text-right">
        <button class="btn btn-primary  " type="submit">Aggiungi Gettoni</button>
      </div>
    </div>
    </form>
    <form action="/PolisportivaDDD/Amministratore/banna" method="POST">
      <div class="row mb-2 ">
        <div class="col-md-12 text-right">
          <button class="btn btn-primary  " type="submit">Bandisci</button>
        </div>
      </div>
      </form>
        {/if}
    <form action="/PolisportivaDDD/Utente/effettuaRecensione" method="POST">
      <input type="hidden" name="username" value="{$username}" >
    <div class="row mb-2 ">
      <div class="col-md-12 text-right">
        <button class="btn btn-primary  " type="submit">Recensisci</button>
      </div>
    </div>
    </form>


    <h6>Recensioni:</h6>

    <hr>

    {section name=nr loop=$results}
      <div class="row">
        <div class="container">
          <div class="text-left mb-2">
            <!-- Profilo -->
            {if $results[nr].pic64  neq ""}
              <img src="data:;base64,{$results[nr].pic64}" class="rounded-circle" alt="Immagine utente"   width="75" height="75" loading="lazy">
            {else}
              <img  src="https://via.placeholder.com/75" class="rounded-circle" alt="Immagine utente">
            {/if}
            <h4 >{$results[nr].username}</h4>
          </div>
          <div class="text-left">
            <b><h6 class="mb-2">Valutazione:
                {for $start=1 to $results[nr].valutazione}</h6>
                  <span class="fa fa-star checkedStar"></span>
                {/for}
                {for $start=($results[nr].valutazione)+1 to 5}
                  <span class="fa fa-star"></span>
                {/for}
              </h6></b>
            <b><h6>{$results[nr].titoloRecensione}</h6></b>
            <b><h6>{$results[nr].dataRecensione}</h6></b>
            <p >{$results[nr].descrizioneRecensione}</p><br>

          </div>
        </div>
      </div>
      {sectionelse}
      <h2>Nessuna recensione presente</h2>
    {/section}
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