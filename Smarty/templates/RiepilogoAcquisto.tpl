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
<!-- Page Content-->
<section class="py-5 mb-5">
  <form method="post" action="/PolisportivaDDD/Gettoni/paga">
  <div class="container">

    <h1 >Riepilogo acquisto</h1>
    <hr >
    {section name=nr loop=$results}
      <div class="row rounded border col-md-12 mb-2 py-4">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h4>Gettoni {$results[nr].nomeCampo}</h4>
          <input  hidden  name="{$results[nr].id}" value="{$results[nr].quantita}" >
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 m-auto mb-2" >
          <p>Prezzo per gettone: {$results[nr].prezzo}€</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 m-auto mb-2">
          <p>Quantità gettoni: {$results[nr].quantita}</p>
        </div>
      </div>
    {/section}
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-sm">

          <div class="border text-center">Numero della carta:<br>
            {$numeroCarta}</div>
      </div>
      <div class="col-sm">

        <div class="border text-center">Nome titolare della carta:<br>
            {$nomeTitolare}
        </div>
      </div>
      <div class="col-sm">
        <div class="border text-center">Data di scadenza:<br>{$dataScadenza}</div >

        </div>
      </div>


    <h4>Prezzo totale: {$prezzoTotale}€</h4>

    <button class="btn btn-primary btn-lg float-right mt-2" type="submit">Paga</button>

  </div>
  </form>

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