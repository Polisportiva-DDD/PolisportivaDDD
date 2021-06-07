<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/ProgettoWeb/Smarty/css/styles.css" rel="stylesheet" />
  <link href="/ProgettoWeb/Smarty/css/ourStyle.css" rel="stylesheet" />
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
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1 class="mb-5">Recensioni Effettuate</h1>
    {section name=nr loop=$results}
      <div class="row rounded border col-md-12 mb-5 py-4">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <img src="https://image-placeholder.com/images/actual-size/57x57.png" class="rounded-circle" alt="Immagine utente">
          {$results[nr].username}
          <h6>
            {for $start=1 to $results[nr].valutazione}
              <span class="fa fa-star checkedStar"></span>
            {/for}
            {for $start=($results[nr].valutazione)+1 to 5}
              <span class="fa fa-star"></span>
            {/for}
          </h6>
          <h6>{$results[nr].titoloRecensione}</h6>
          <h6>{$results[nr].dataRecensione}</h6>
          <p>{$results[nr].descrizioneRecensione}</p>
          <a class="btn btn-primary float-right" href="#!">Elimina Recensione</a>
        </div>
      </div>
      {sectionelse}
      <h2>Nessuna recensione presente</h2>
    {/section}
    </div>
</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/ProgettoWeb/Smarty/js/scripts.js"></script>
</html>