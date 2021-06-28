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
{include file="navBarUA.tpl"}
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
          <a class="list-group-item" href="/PolisportivaDDD/utente/utenti/{$invitati[nr]}">{$invitati[nr]}</a>
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
          Descrizione:<p>{$descrizione}</p>
        </div>
        <div class="float-right mt-5">
          <a href="/PolisportivaDDD/gruppo/partecipa/{$idGruppo}"><button class="btn btn-primary">Partecipa</button></a>
        </div>
        {if $isAmministratore}
          <div class="float-right mt-5 mx-3">
            <a href="/PolisportivaDDD/amministratore/eliminaGruppo/{$idGruppo}"><button class="btn btn-danger">Elimina gruppo</button></a>
          </div>
        {/if}
      </div>
    </div>
  </div>
</section>
<!-- Footer-->
{include file="footer.tpl"}
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</body>
</html>
