<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Polisportiva DDD</title>

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
<section class="py-5 mb-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Crea gruppo</h1>
    <hr>

    <form method="post">
      <div class="row mb-3">
        <div class="col-md-3">
          <label for="nomeGruppo" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nomeGruppo">
        </div>
        <div class="col-md-3">
          <label for="etaMinima" class="form-label">Età minima</label>
          <input type="number" class="form-control" id="etaMinima" min="10" max="99">
        </div>
        <div class="col-md-3">
          <label for="etaMassima" class="form-label">Età massima</label>
          <input type="number" class="form-control" id="etaMassima" min="10" max="99">
        </div>
        <div class="col-md-3">
          <label for="tipologiaCampo" class="form-label">Campo</label>
          <select class="form-control w-100" aria-label="Default-select example" id="tipologiaCampo">
            {section name=nr loop=$results}
              <option {if $smarty.section.nr.iteration == 1}selected {/if}>{$results[nr]}</option>
            {/section}
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="descrizione" class="form-label">Descrizione</label>
          <textarea type="text" class="form-control" id="descrizione" rows="5"></textarea>
        </div>
      </div>
      <div class="d-flex flex-row-reverse my-5" >
        <div class="p-2"><button type="submit" class="btn btn-primary">Crea Gruppo</button></div>
        <div class="p-2"><a href="#">  <button type="button" class="btn btn-primary">Torna Indietro</button></a></div>
      </div>
    </form>
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
<script src="js/scripts.js"></script>
</html>