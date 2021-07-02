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
{include file="navbar2.tpl"}
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1>Utenti bannati</h1>
    <hr>

    {section name=nr loop=$results}
      <form method="post" action="/PolisportivaDDD/Utente/rimuoviBan">
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-lg-3 col-md-3 col-sm-12">
        {if $results[nr].pic64  neq ""}
          <img  src="data:;base64,{$results[nr].pic64}" class="rounded-circle" width="150" height="150" alt="Immagine utente">
        {else}
          <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Immagine utente">
        {/if}

      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Username: {$results[nr].username}</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Motivo ban: {$results[nr].motivoBan}</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto text-center">
        <button class="btn btn-primary float-md-none float-sm-right float-right" name="username" value="{$results[nr].username}" type="submit" onclick="alert('Utente Sbandito');">Rimuovi ban</button>
      </div>
    </div>
      </form>
    {sectionelse}
    <h2>Nessun utente bannato.</h2>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
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