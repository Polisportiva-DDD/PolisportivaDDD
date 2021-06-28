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
{include file="navbar2.tpl"}

<section class="py-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Segnalazioni</h1>
    <ol class="breadcrumb mb-4 h-100">
    </ol>
    {section name=nr loop=$results}
    <form method="post" action="/PolisportivaDDD/amministratore/segnalazioni/{$results[nr].idSegnalazione}">
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Username: {$results[nr].username}</p>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-12 m-auto">
        <h4>Segnalazione</h4>
        <div style="height: 100px" class="border mt-3">
          <p>{$results[nr].testoSegnalazione}</p>
        </div>
        <button name={$results[nr].idSegnalazione} type="submit" class="btn btn-primary float-right mt-3">
          Rispondi
        </button>
      </div>
    </div>
    </form>
    {sectionelse}
    <h2>Nessuna segnalazione presente.</h2>
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