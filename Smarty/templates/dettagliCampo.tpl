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
{include file="navBar.tpl"}



<div class="container  py-5">
  <div class="row flex-lg-row-reverse  py-5">
    <div class="col-lg-6">
      {if $pic64  neq ""}
      <img src="data:;base64,{$pic64}" class="d-block mx-lg-auto img-fluid" alt="Immagine campo" width="650" height="650" loading="lazy">
      {else}
        <img  src="https://via.placeholder.com/300"  alt="Immagine campo">
      {/if}
    </div>
    <div class="col-lg-6">
      <h1 class="mb-3">{$nomeCampo}</h1>
      <p>{$descrizione}</p>
    </div>

  </div>
  <ul class="list-group text-center">
    <li class="list-group-item">Per la prenotazione del campo creare un gruppo o chiedi di partecipare ad uno già esistente.</li>
  </ul>
</div>

<!-- Footer-->
{include file="footer.tpl"}
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</body>
</html>