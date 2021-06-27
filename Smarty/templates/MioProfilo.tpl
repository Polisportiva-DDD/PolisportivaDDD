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

<section class="py-5">

  <div class="container">
    <h1>Il tuo profilo</h1>
    <hr>
    <div class="row">
      <div class="col-md-8">
      <div class="text-center mb-2">
        {if $pic64  neq ""}
          <img src="data:;base64,{$pic64}" alt="Immagine campo" class="rounded-circle"  width="200" height="200" loading="lazy">
        {else}
          <img  src="https://via.placeholder.com/300"  alt="Immagine campo">
        {/if}

      </div>
      <div class="text-center">
        <h5 class="mb-2">Username: {$username}</h5>
        <h5 class="mb-2">Nome: {$nome}</h5>
        <h5 class="mb-2">Cognome: {$cognome}</h5>
        <h5 class="mb-2">Età: {$eta} anni</h5>
        <h5 class="mb-2">Valutazione media:
          {for $start=1 to $valutazioneMedia}
            <span class="fa fa-star checkedStar"></span>
          {/for}
          {for $start=$valutazioneMedia+1 to 5}
            <span class="fa fa-star"></span>
          {/for}
        </h5>
      </div>
      </div>


      <div class="col-md-4">
        <div class="list-group mb-4">
          <a class="list-group-item" href="/PolisportivaDDD/Gruppo/mieiGruppi">I tuoi gruppi</a>
          <a class="list-group-item" href="/PolisportivaDDD/Gettoni/carte">Le tue carte</a>
          <a class="list-group-item" href="/PolisportivaDDD/Recensione/recensioniEffettuate">Recensioni Effettuate</a>
        </div>
        <form class="card">
          <div class="card-body rounded">
            <h5 class="card-title">Wallet</h5>
            <p class="card-text">Questo è il tuo wallet</p>
          </div>
          <ul class="list-group list-group-flush">
            {section name=nr loop=$results}
              <li class="list-group-item">{$results[nr].nomeCampo} <span class="float-right">{$results[nr].quantitaGettoni}</span></li>
            {/section}
          </ul>

          <div class="card-body m-auto">
            <a href="/PolisportivaDDD/Gettoni/acquista" class="btn btn-primary btn-lg">Acquista gettoni</a>
          </div>
        </div>


      </div>
    <h6>Recensioni:</h6>
    <hr>

    {section name=nr loop=$recensioni}
      <div class="row">
        <div class="container">

          <div class="text-left mb-2" >
            {if $recensioni[nr].pic64  neq ""}
              <img src="data:;base64,{$recensioni[nr].pic64}" alt="Immagine utente" class="rounded-circle"   width="75" height="75" loading="lazy">
            {else}
              <img  src="https://via.placeholder.com/75" class="rounded-circle" alt="Immagine utente">
            {/if}

            <h4 >{$recensioni[nr].username}</h4>
          </div>
          <div class="text-left">
            <b><h6 class="mb-2">Valutazione:
                {for $start=1 to $recensioni[nr].valutazione}</h6>
              <span class="fa fa-star checkedStar"></span>
              {/for}
              {for $start=($recensioni[nr].valutazione)+1 to 5}
                <span class="fa fa-star"></span>
              {/for}
              </h6></b>
            <b><h6>{$recensioni[nr].titoloRecensione}</h6></b>
            <b><h6>{$recensioni[nr].dataRecensione}</h6></b>
            <p>{$recensioni[nr].descrizioneRecensione}</p><br>
          </div>
        </div>
      </div>
      {sectionelse}
      <h2>Nessuna recensione presente</h2>
    {/section}
    </div>

</section>
{include file="footer.tpl"}
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>