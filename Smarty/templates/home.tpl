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
{if $isRegistrato}
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


      <a class="navbar-brand" href="index.php">Polisportiva DDD</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="home-utente-registrato.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="RicercaGruppo.html">Gruppi</a></li>
          {if $isAmministratore}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
                <a class="dropdown-item" href="UtentiBannati.html">Utenti Bannati</a>
                <a class="dropdown-item" href="SegnalazioniAmministratore.html">Segnalazioni</a>
                <a class="dropdown-item" href="#">Modifica prezzi</a>
              </div>
            </li>
          {else}
            <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
          {/if}
        </ul>
      </div>
    </div>
  </nav>
{else}
  <div class="container mb-2 mt-2" dir="rtl" >
    <div class="table-responsive" >
      <table>
        <tr >
          <th scope="col" class="padTh"><a href="#">  <button type="button" class="btn btn-primary">Login</button></a></th>
          <th scope="col" class="padTh"><a href="#"><button type="button" class="btn btn-secondary">Registrati</button></a></th>
        </tr>
      </table>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Polisportiva DDD</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      </div>
    </div>
  </nav>
{/if}
<!-- Page header-->
<header>
  <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
    <ol class="carousel-indicators">
      <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://via.placeholder.com/1900x600" alt="..." />
        <div class="carousel-caption d-none d-md-block">
          <h3>First Slide</h3>
          <p>This is a description for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://via.placeholder.com/1900x600" alt="..." />
        <div class="carousel-caption d-none d-md-block">
          <h3>Second Slide</h3>
          <p>This is a description for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://via.placeholder.com/1900x600" alt="..." />
        <div class="carousel-caption d-none d-md-block">
          <h3>Third Slide</h3>
          <p>This is a description for the third slide.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <h1 class="mb-4">I nostri campi</h1>
    <!-- Marketing Icons Section-->
    {section name=nr loop=$results}
    <div {if $smarty.section.nr.iteration is even} class="row mt-4"}{/if}>
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="card h-100">
          <h4 class="card-header">{$results[nr].nome}</h4>
          <img class="card-img-top" src="https://via.placeholder.com/1400x700" alt="Immagine campo">
          <div class="card-body"><p class="card-text">{$results[nr].descrizione}</p></div>
          <div class="card-footer"><a class="btn btn-primary float-right" href="#!">Scegli</a></div>
        </div>
      </div>
      {/section}
    </div>
</section>
<hr class="my-0" />


</body>
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
</footer>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>