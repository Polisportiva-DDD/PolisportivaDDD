<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

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
        <th scope="col" class="padTh"><a href="mioProfilo"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
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
    <h1>Inserisci dati carta</h1>
    <hr>

    <form method="post" action="PolisportivaDDD/Gettoni/riepilogo">
      <div class="row ">

        <div class="col-md-4 offset-md-4 ">
          <label for="numeroCarta" class="form-label mt-3">Numero Carta</label>
          <input type="text" class="form-control" id="numeroCarta"  minlength="16" maxlength="16" required>
          <label for="nomeTitolare" class="form-label mt-3">Nome titolare</label>
          <input type="text" class="form-control" id="nomeTitolare" required>
          <label for="cognomeTitolare" class="form-label mt-3">Cognome titolare</label>
          <input type="text" class="form-control" id="cognomeTitolare" required>
          <label for="cvc" class="form-label mt-3">CVC</label>
          <input type="text" class="form-control" id="cvc" maxlength="3" required>
          <label for="dataDiScadenza" class="form-label mt-3">Data di Scadenza</label>
          <input type="month" class="form-control" id="dataDiScadenza" placeholder="yyyy-mm" required>
          <div class="form-check mt-3">
            <input type="checkbox" class="form-check-input" id="salvaDatiCarta">
            <label class="form-check-label" for="salvaDatiCarta">Salva i dati di questa carta</label>
          </div>
          <button type="submit" class="btn btn-primary btn-lg float-right mt-3">Vai avanti</button>
        </div>


      </div>
    </form>







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