<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
  <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<div class="container mb-2 mt-2" dir="rtl" >
  <div class="table-responsive" >
    <table>
      <tr >
        <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/logout">  <button type="button" class="btn btn-primary">Logout</button></a></th>
        <th scope="col" class="padTh"><a href="mioProfilo"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
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
        <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
      </ul>
    </div>
  </div>
</nav>
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1>
      Invita Utente
    </h1>
    <hr>
    <!-- Content Row-->
    <form action="/PolisportivaDDD/Gruppo/scegliDettagli" method="post">
    <div class="row">
      {section name=nr loop=$utenti}
      <div class="col-lg-4 mb-4 mt-4 mb-lg-0">
        <div class="card h-80">
          <h6 class="card-header">{$utenti[nr].username}</h6>
          <div class="card-body text-center">
            <img src="https://via.placeholder.com/75" class="rounded-circle" alt="Immagine utente">
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Età: {$utenti[nr].eta}</li>
            <li class="list-group-item">
              <h10 class="mb-2">Valutazione media:
                {for $start=1 to $utenti[nr].valutazione}
                  <span class="fa fa-star checkedStar"></span>
                {/for}
                {for $start=($utenti[nr].valutazione)+1 to 5}
                  <span class="fa fa-star"></span>
                {/for}
              </h10>
            </li>
            <li class="list-group-item">Invita <input name={$utenti[nr].username} value={$utenti[nr].username} type="checkbox"></li>
          </ul>
        </div>
      </div>
      {sectionelse}
      <h2>Nessun Utente presente</h2>
      {/section}
    </div>
      <div class="d-flex flex-row-reverse my-5">

        <div class="p-2">  <button type="submit" class="btn btn-primary">Vai Avanti</button></div>

      </div>
    </form>
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
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>