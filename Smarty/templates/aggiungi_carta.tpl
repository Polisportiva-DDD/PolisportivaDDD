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
{include file="navBarUA.tpl"}
<!-- Page Content-->
<section class="py-5">
  <div class="container">

    <form method="post" action="/PolisportivaDDD/Gettoni/confermaAggiungiCarta">

      <h1 class="h3 mb-3 fw-normal">Aggiungi carta di credito</h1>
      <hr>

      <div class="col-md-4 offset-md-4 ">


        <label for="validationDefault01">Numero della Carta</label>
        <input class="form-control mb-3" placeholder="XXXX XXXX XXXX XXXX" type="text" id="validationDefault01" name="numero" minlength="16" maxlength="16"
               pattern="[0-9]+"
               title="Inserire solo numeri " required>

        <label for="validationDefault02">Cognome titolare della carta</label>
        <input class="form-control mb-3" placeholder="Cognome titolare" type="text" id="validationDefault02" name="cognome"  maxlength="25" required>

        <label for="validationDefault03">Nome titolare della carta</label>
        <input class="form-control mb-3" placeholder="Nome titolare" type="text" name="nome" id="validationDefault03" maxlength="25" required>

        <label for="ValidationDefaultData">Data di scadenza (Il giorno inserito sarà settato a 1)</label>
        <input type="date" class="form-control mb-3" id="ValidationDefaultData" name="data" required>

        <label for="validationDefault04">Codice di sicurezza</label>
        <input class="form-control mb-3" placeholder="CVC" type="text" id="validationDefault04"  name="cvc" minlength="3" maxlength="3" pattern="[0-9]+" title="Inserire solo numeri " required>

      </div>

      <div class="col-md-5 offset-md-5 ">
      <button class="btn btn-lg btn-primary mt-3 " type="submit">Aggiungi</button>
      </div>
      {if $errore=='1'}
      <div >
        <br>
        <p class="text-center" > Inserisci i dati della carta correttamente </p>
      </div>
      {/if}

    </form>

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