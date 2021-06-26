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
  <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- Navigation-->
{include file="navbar2.tpl"}

<section class="py-5">


  <div class="container">
    <h1>Banna utente</h1>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="text-center mb-2">
          {if $pic64  neq ""}
            <img src="data:;base64,{$pic64}" alt="Immagine utente"  class="rounded-circle" width="200" height="200" loading="lazy">
          {else}
            <img  src="https://via.placeholder.com/200"  class="rounded-circle" alt="Immagine Utente">
          {/if}
        </div>
        <div class="text-center">
			<h6 class="mb-2">Username: {$username}</h6>
			<h6 class="mb-2">Nome: {$nome}</h6>
			<h6 class="mb-2">Cognome: {$cognome}</h6>
			<h6 class="mb-2">Età: {$eta} anni</h6>
			<h6 class="mb-2">Valutazione media:
          {for $start=1 to $valutazioneMedia}
            <span class="fa fa-star checkedStar"></span>
          {/for}
          {for $start=$valutazioneMedia+1 to 5}
            <span class="fa fa-star"></span>
          {/for}
        </h6>
        </div>
      </div>

    </div>


    <div class="row mt-2 mb-2">
      <div class="col-lg-8 mb-4">
        <h4>Motivazione Ban</h4>
        <form method="POST" action="/PolisportivaDDD/Amministratore/inviaBan">

          <div>

            <label for="motivazione"></label><textarea type="text" class="form-control" id="motivazione" name="motivazione" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary float-right mt-3" onclick="alert('Utente Bandito')">Banna</button>
        </form>
      </div>
    </div>



</div>
</section>

{include file="footer.tpl"}


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>