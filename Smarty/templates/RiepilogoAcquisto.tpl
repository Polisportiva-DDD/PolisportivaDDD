<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Polisportiva DDD</title>

  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/ProgettoWeb/Smarty/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<div class="container mb-2 mt-2" dir="rtl" >
  <div class="table-responsive" >
    <table>
      <tr >
        <th scope="col" class="padTh"><a href="#">  <button type="button" class="btn btn-primary">Logout</button></a></th>
        <th scope="col" class="padTh"><a href="#"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
        <th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="search"></th>
        <th scope="col" class="padTh"><span class="fas fa-search ml-1"></span></th>
      </tr>
    </table>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">


    <a class="navbar-brand" href="index.html">Polisportiva DDD</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="home-utente-registrato.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="RicercaGruppo.html">Gruppi</a></li>
        <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Page Content-->
<section class="py-5 mb-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1 class="mb-5">Riepilogo acquisto</h1>
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <h4>Gettoni calcio a cinque</h4>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Prezzo: {$prezzo}€</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Quantità: {$quantita}</p>
      </div>
    </div>
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-lg-3 col-md-3 col-sm-12">
        <p>{$numeroCarta}</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>{$nomeTitolare}</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>{$cognomeTitolare}</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>{$scadenza}</p>
      </div>
    </div>

    <h4>Prezzo totale: {$prezzoTotale}€</h4>
    <button class="btn btn-primary btn-lg float-right mt-2">Paga</button>

  </div>

</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/ProgettoWeb/Smarty/js/scripts.js"></script>
</body>
</html>