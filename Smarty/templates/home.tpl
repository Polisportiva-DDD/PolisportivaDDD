<!DOCTYPE html>
<html lang="it">
<head>
  <noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=/PolisportivaDDD/Messaggio/jsError">
  </noscript>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">

  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">


</head>
<body>

<!-- START Bootstrap-Cookie-Alert -->
<div class="alert text-center cookiealert" role="alert">
  <b>Ti piacciono i cookie?</b> &#x1F36A; Utilizziamo i cookie per assicurarti la migliore esperienza sul nostro sito web.<a href="https://cookiesandyou.com/" target="_blank">Leggi di più</a>

  <button type="button" class="btn btn-primary btn-sm acceptcookies">
    Accetto
  </button>
</div>
<!-- END Bootstrap-Cookie-Alert -->

<!-- Navigation-->
{include file="navBar.tpl"}
<!-- Page header-->
<header>
  <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
    <ol class="carousel-indicators">
      <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_5.png" alt="calcio a 5"  width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_7.png" alt="calcio a 7" width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_8.png" alt="calcio a 8" width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_11.png" alt="calcio a 11" width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <h1 class="mb-4">I nostri campi</h1>
    <!-- Marketing Icons Section-->
    <div class="row">
    {section name=nr loop=$results}

      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header">{$results[nr].nome}</h4>
          {if $results[nr].pic64  neq ""}
          <img class="card-img-top" src="data:;base64,{$results[nr].pic64}" width="300" height="300" alt="Immagine campo">
          {else}
        <img class="card-img-top" src="https://via.placeholder.com/300" width="300" height="300"  alt="Immagine campo">
          {/if}
          <div class="card-footer">
          <form method="POST" action="/PolisportivaDDD/Utente/mostraCampo">
            <input type="hidden" name="idCampo" value="{$results[nr].idCampo}" >
            <button type="submit" class="btn btn-primary float-right ">Dettagli</button>
          </form>
          </div>
        </div>
      </div>

    {/section}
    </div>
  </div>

</section>
<hr class="my-0" />


{include file="footer.tpl"}


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>