<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
{include file="navBarUA.tpl"}

<section class="py-5">
  <div class="container">
    <h1>Le tue carte</h1>
    <div class="row">
        <a class="col-md-12 mb-2 py-2">
          <a href="/PolisportivaDDD/Gettoni/aggiungiCarta"> <button class="btn btn-lg btn-primary mb-4">Aggiungi carta</button></a>
        </div>

        {section name=nr loop=$results}
          <div class="row rounded border col-md-12 mb-5 py-4">
            <div class="card-body">
              <div class="row mb-2">

                  <div class="col-sm">
                    <div class="border text-center">Numero della carta:<br>
                      {$results[nr].numeroCarta}</div>
                  </div>

                <div class="col-sm">
                  <div class="border text-center">Titolare della carta<br>
                    {$results[nr].titolareCarta}</div>
                </div>


                <div class="col-sm">
                  <div class="border text-center">Data di scadenza<br>
                    {$results[nr].dataScadenza}</div>
                </div>


              </div>
              <form method="POST" action="/PolisportivaDDD/Gettoni/rimuoviCarta">
                <button name="numeroCarta" value={$results[nr].numeroCarta} type="submit" class="btn btn-primary float-right mt-2" >
                  Rimuovi carta
                </button>
              </form>

            </div>
          </div>
          {sectionelse}
          <h2>Nessun carta presente.</h2>
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