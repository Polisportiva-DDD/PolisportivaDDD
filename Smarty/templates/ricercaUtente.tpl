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
</head>
<body>
<!-- Navigation-->
{include file="navBarUA.tpl"}<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1 class="mb-5">Ricerca utente</h1>

    {section name=nr loop=$results}
      <div class="row rounded border mb-5 py-4">
        <div class="col-lg-3 col-md-3 text-center">
          <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Immagine utente">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 m-auto text-center">
          <p>Username: <a href="/PolisportivaDDD/utente/utenti/{$results[nr].username}">{$results[nr].username}</a></p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 m-auto text-center">
          <p>Nome: {$results[nr].nome}</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 m-auto text-center">
          <p>Cognome: {$results[nr].cognome}</p>
        </div>
      </div>
    {sectionelse}
      <h2>Nessun utente corrispondente alla ricerca</h2>
      <br><br><br><br><br><br><br><br><br><br><br><br>
    {/section}
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