<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
{include file="navBarUA.tpl"}
<section class="py-5 mb-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Crea gruppo</h1>
    <hr>

    <form method="post" action="/PolisportivaDDD/Gruppo/creaGruppo">
      <div class="row mb-3">
        <div class="col-md-3">
          <label for="nomeGruppo" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nomeGruppo" name="nomeGruppo" required>
        </div>
        <div class="col-md-3">
          <label for="etaMinima" class="form-label">Età minima</label>
          <input type="number" class="form-control" id="etaMinima" min="10" max="99" name="etaMinima" required>
        </div>
        <div class="col-md-3">
          <label for="etaMassima" class="form-label">Età massima</label>
          <input type="number" class="form-control" id="etaMassima" max="99" name="etaMassima" required>
        </div>
        <div class="col-md-3">
          <label for="valMinima" class="form-label">Valutazione minima</label>
          <input type="number" class="form-control" id="balMinima" min="0" max="5" name="valMinima" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="descrizione" class="form-label">Descrizione</label>
          <textarea type="text" class="form-control" id="descrizione" name="descrizione" rows="5" required></textarea>
        </div>
      </div>
      <div class="d-flex flex-row-reverse my-5" >
        <div class="p-2"><button type="submit" class="btn btn-primary">Crea Gruppo</button></div>
      </div>
    </form>
  </div>
</section>
<!-- Footer-->
{include file="footer.tpl"}

</body>


<script>

  let etaMinima = $('#etaMinima');
  let etaMassima = $('#etaMassima');

  etaMinima.change(function(){
    console.log(etaMinima.val());
    etaMassima.attr('min',etaMinima.val());
  })

</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>