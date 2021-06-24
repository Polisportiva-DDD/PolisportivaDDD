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
<section class="py-5 mb-5">
  <form method="post" action="/PolisportivaDDD/Gettoni/paga">
  <div class="container">

    <h1 >Riepilogo acquisto</h1>
    <hr>
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
{include file="footer.tpl"}
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</body>
</html>