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
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->

    <h1 class="mb-5">I Tuoi Gruppi</h1>
    {section name=nr loop=$gruppiDetails}
    <div class="row rounded border py-4 float-center mx-2 mb-5">
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Nome: <a href="/PolisportivaDDD/Gruppo/Gruppi/{$gruppiDetails[nr].id}"> {$gruppiDetails[nr].nome}</a></p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Admin: {$gruppiDetails[nr].admin}</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Tipologia Campo: {$gruppiDetails[nr].campo}</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Data e Ora: {$gruppiDetails[nr].dataEOra}</p>
      </div>
    </div>
      <br><br><br>
    {sectionelse}
      <p>Nessun gruppo presente</p>
      <br><br><br><br><br><br><br>

    {/section}
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