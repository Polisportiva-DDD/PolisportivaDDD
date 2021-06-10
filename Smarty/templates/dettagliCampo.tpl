<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>
  
</head>
<body>
<!-- Navigation-->
{if $isRegistrato}
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


      <a class="navbar-brand" href="index.html">Polisportiva DDD</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="home-utente-registrato.html">Home</a></li>
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
          {elseif $isUtente}
            <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
          {/if}
        </ul>
      </div>
    </div>
  </nav>
{else}
  <div class="container mb-2 mt-2" dir="rtl" >
    <div class="table-responsive" >
      <table>
        <tr >
          <th scope="col" class="padTh"><a href="#">  <button type="button" class="btn btn-primary">Login</button></a></th>
          <th scope="col" class="padTh"><a href="#"><button type="button" class="btn btn-secondary">Registrati</button></a></th>
        </tr>
      </table>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">Polisportiva DDD</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      </div>
    </div>
  </nav>
{/if}



<div class="container  py-5">
  <div class="row flex-lg-row-reverse  py-5">
    <div class="col-lg-6">
      <img src="data:{$type};base64,{$pic64}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="500" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="mb-3">{$nomeCampo}</h1>
      <p class="lead ">{$descrizione}</p>
    </div>

  </div>
  <ul class="list-group text-center">
    <li class="list-group-item">Per la prenotazione del campo creare un gruppo o chiedi di partecipare ad uno già esistente.</li>
  </ul>
</div>

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