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
    <!-- Page heading-->
    <h1>Le tue carte</h1>
    <div class="row">
      <!-- Blog Entries Column-->
        <div class="col-md-12 mb-2 py-2">
          <button class="btn btn-lg btn-primary mb-4">Aggiungi carta</button>
        </div>


        <!-- Blog Post-->
        {section name=nr loop=$results}
          <div class="row rounded border col-md-12 mb-5 py-4">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-sm">
                  Numero della carta
                  <div style="width:100%;max-width:250px;border:1px red solid;overflow:hidden">
                    <div style="background-color:#eeeeee;padding:5px">
                      {$results[nr].numeroCarta}
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  Titolare della carta
                  <div style="width:100%;max-width:250px;border:1px red solid;overflow:hidden">
                    <div style="background-color:#eeeeee;padding:5px">
                      {$results[nr].titolareCarta}
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  Data di scadenza
                  <div style="width:100%;max-width:250px;border:1px red solid;overflow:hidden">
                    <div style="background-color:#eeeeee;padding:5px">
                      {$results[nr].dataScadenza}
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-primary float-right mt-2" href="#!">Rimuovi carta</a>
            </div>
          </div>
          {sectionelse}
          <h2>Nessun utente bannato.</h2>
        {/section}
    </div>
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