<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Polisportiva DDD</title>

    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>
	<link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" type="text/css"/>
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


        <a class="navbar-brand" href="/PolisportivaDDD/Utente/home">Polisportiva DDD</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Gruppo/gruppi">Gruppi</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
                        <a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
                        <a class="dropdown-item" href="/PolisportivaDDD/Utente/segnalazioni">Segnalazioni</a>
                        <a class="dropdown-item" href="/PolisportivaDDD/Utente/modificaPrezzi">Modifica prezzi</a>
                    </div>
                </li>

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
        <div class="col-md-12 mt-3">
            <h5>Oggetto: {$oggettoSegnalazione}</h5>
            <div style="height: 100px" class="border"> {$messaggioSegnalazione}</div>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-md-12">
            <form method="post" action="/PolisportivaDDD/amministratore/rispondiSegnalazione">
                <h4>Rispondi</h4>
                <textarea name="risposta" class="form-control"></textarea>
            <button type="submit" class="btn btn-primary float-right mt-3">Rispondi</button>
            </form>
        </div>
    </div>
</div>
</section>

<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
</footer>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>