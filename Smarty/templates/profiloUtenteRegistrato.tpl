<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Polisportiva DDD</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../css/styles.css" rel="stylesheet" />
  <link href="../css/ourStyle.css" rel="stylesheet" />
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
<section class="py-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Profilo Utente</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Profilo Utente</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
      <div class="text-center mb-2">
        <!-- Profilo -->
          <img src="https://via.placeholder.com/250" class="rounded-circle" alt="Immagine utente">
      </div>
      <div class="text-center">
        <h6 class="mb-2">Username: {$username}</h6>
        <h6 class="mb-2">Nome: {$nome}</h6>
        <h6 class="mb-2">Cognome: {$cognome}</h6>
        <h6 class="mb-2">Età: {$eta}</h6>
        <h6 class="mb-2">Valutazione media:
{*          {for $start=1 to $end=$valutazione}*}
{*            <span class="fa fa-star checkedStar"></span>*}
{*          {/for}*}
{*          {for $start=$valutazione+1 to 5}*}
{*            <span class="fa fa-star"></span>*}
{*          {/for}*}
        </h6>
      </div>
      </div>
    </div>

    <div class="row mb-2 ">
      <div class="col-md-12 text-right">
        <button class="btn btn-primary  " type="submit">Recensisci</button>
    </div>

  </div>
    <h6>Recensioni:</h6>

    <hr>

    {section name="nr" loop="$results"}
      <div class="row">
        <div class="container">
          <div class="text-left mb-2">
            <!-- Profilo -->
            <img src="https://via.placeholder.com/75" class="rounded-circle" alt="Immagine utente">
            <h4 >{$results[nr].username}</h4>
          </div>
          <div class="text-left">
            <b><h6 class="mb-2">Valutazione:
{*                {for $start=1 to $valutazione}*}
{*                  <span class="fa fa-star checkedStar"></span>*}
{*                {/for}*}
{*                {for $start=$valutazione+1 to 5}*}
{*                  <span class="fa fa-star"></span>*}
{*                {/for}*}
              </h6></b>
            <br>
            <b><h6 class="mb-2">{$results[nr].titoloRecensione}</h6><br></b>
            <b><h6 class="mb-2">{$results[nr].dataRecensione}</h6><br></b>
            <p >{$results[nr].descrizioneRecensione}</p><br>

          </div>
        </div>
      </div>
      {sectionelse}
      <h2>Nessuna recensione presente</h2>
    {/section}
  </div>
</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../js/scripts.js"></script>
</html>