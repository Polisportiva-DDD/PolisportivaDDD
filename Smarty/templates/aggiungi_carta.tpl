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
<div class="container mb-2 mt-2" dir="rtl" >
  <div class="table-responsive" >
    <table>
      <tr >
        <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/logout">  <button type="button" class="btn btn-primary">Logout</button></a></th>
        <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/mioProfilo"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
        <th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="search"></th>
        <th scope="col" class="padTh"><span class="fas fa-search ml-1"></span></th>
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
        <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Gruppo/ricercaGruppi">Gruppi</a></li>
        {if $isAmministratore}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
              <a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
              <a class="dropdown-item" href="/PolisportivaDDD/Utente/segnalazioni">Segnalazioni</a>
              <a class="dropdown-item" href="/PolisportivaDDD/Utente/modificaPrezzi">Modifica prezzi</a>
            </div>
          </li>
        {else}
          <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/informazioni">Informazioni</a></li>
        {/if}
      </ul>
    </div>
  </div>
</nav>
<!-- Page Content-->
<section class="py-5">
  <div class="container">

    <form method="post" action="/PolisportivaDDD/Gettoni/confermaAggiungiCarta">

      <h1 class="h3 mb-3 fw-normal">Aggiungi carta di credito</h1>
      <hr>

      <div class="col-md-4 offset-md-4 ">


        <label for="validationDefault01">Numero della Carta</label>
        <input class="form-control mb-3" placeholder="XXXX XXXX XXXX XXXX" type="text" id="validationDefault01" name="numero" minlength="16" maxlength="16" required>

        <label for="validationDefault02">Cognome titolare della carta</label>
        <input class="form-control mb-3" placeholder="Cognome titolare" type="text" id="validationDefault02" name="cognome"  maxlength="40" required>

        <label for="validationDefault03">Nome titolare della carta</label>
        <input class="form-control mb-3" placeholder="Nome titolare" type="text" name="nome" id="validationDefault03" maxlength="40" required>

        <label for="ValidationDefaultData">Data di scadenza</label>
        <input type="date" class="form-control mb-3" id="ValidationDefaultData" name="data" required>

        <label for="validationDefault04">Codice di sicurezza</label>
        <input class="form-control mb-3" placeholder="CVC" type="text" id="validationDefault04"  name="cvc" minlength="3" maxlength="3" required>

      </div>

      <div class="col-md-5 offset-md-5 ">
      <button class="btn btn-lg btn-primary mt-3 " type="submit">Aggiungi</button>
      </div>

    </form>

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