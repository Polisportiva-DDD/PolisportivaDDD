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
{include file="navBarUA.tpl"}

<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1 class="mb-5">Recensioni Effettuate</h1>
    {section name=nr loop=$results}
      <div class="row rounded border col-md-12 mb-5 py-4">
        <div class="col-lg-12 col-md-12 col-sm-12">
          {if $results[nr].pic64 neq ""}
          <img src="base64,{$results[nr].pic64}" class="rounded-circle" alt="Immagine utente">
          {else}
          <img src="https://image-placeholder.com/images/actual-size/57x57.png" class="rounded-circle" alt="Immagine utente">
          {/if}
          {$results[nr].username}
          <h6>
            {for $start=1 to $results[nr].valutazione}
              <span class="fa fa-star checkedStar"></span>
            {/for}
            {for $start=($results[nr].valutazione)+1 to 5}
              <span class="fa fa-star"></span>
            {/for}
          </h6>
          <h6>{$results[nr].titoloRecensione}</h6>
          <h6>{$results[nr].dataRecensione}</h6>
          <p>{$results[nr].descrizioneRecensione}</p>
          <a class="btn btn-primary float-right" href="/PolisportivaDDD/Recensione/eliminaRecensione/{$results[nr].idRecensione}">Elimina Recensione</a>
        </div>
      </div>
      {sectionelse}
      <h2>Nessuna recensione presente</h2>
    {/section}
    </div>
</section>

<!-- Footer-->
{include file="footer.tpl"}
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>