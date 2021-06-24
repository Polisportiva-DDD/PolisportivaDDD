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
    <!-- Page heading-->
    <h1>Scegli campo</h1>
    <hr>
    <div class="row">
    {section name=nr loop=$results}
      <div class="col-md-6 mb-4">
        <div class="card h-100">

          <h4 class="card-header">{$results[nr].nome}</h4>

          {if $results[nr].pic64  neq ""}
            <img class="card-img-top" src="data:;base64,{$results[nr].pic64}" width="300" height="300" alt="Immagine campo">
          {else}
            <img class="card-img-top" src="https://via.placeholder.com/300" width="300" height="300"  alt="Immagine campo">
          {/if}

          <div class="card-footer">
            <form action="/PolisportivaDDD/Gruppo/scegliData" method="POST">
              <button type="submit" class="btn btn-primary float-right" name="idCampo" value={$results[nr].idCampo}>Scegli</button>
            </form>
          </div>
        </div>
      </div>
    {/section}
    </div>
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