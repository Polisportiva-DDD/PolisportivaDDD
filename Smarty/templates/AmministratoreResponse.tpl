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
    <link href="/ProgettoWeb/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>
	<link href="/ProgettoWeb/Smarty/css/ourStyle.css" rel="stylesheet" type="text/css"/>
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
    <h1>Rispondi segnalazione</h1>
    <hr>

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
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4>Segnalazione</h4>
            <div style="height: 100px" class="border"> {$segnalazione}</div>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-md-12">
            <form method="post" action="#">
                <h4>Rispondi</h4>
                <textarea class="form-control"></textarea>
            </form>
            <button type="submit" class="btn btn-primary float-right mt-3">Submit</button>
        </div>
    </div>
</div>
</section>

<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</html>