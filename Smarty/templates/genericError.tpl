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
<div class="container mb-2 mt-2" dir="rtl" >
    <div class="table-responsive" >
        <table>
            <tr >
                <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/logout">  <button type="button" class="btn btn-primary">Logout</button></a></th>
                <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/mioProfilo"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
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
                <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Gruppo/ricercaGruppi">Gruppi</a></li>
                {if $isAmministratore}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
                            <a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
                            <a class="dropdown-item" href="/PolisportivaDDD/Utente/segnalazioni">Segnalazioni</a>
                            <a class="dropdown-item" href="/PolisportivaDDD/Utente/modificaPrezzi">Modifica prezzi</a>
                        </div>
                    </li>
                {else}
                    <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/assistenza">Informazioni</a></li>
                {/if}
            </ul>
        </div>
    </div>
</nav>

<!-- Page header-->
<section>
    <br><br><br><br><br>
    <h1 class="text-center">Errore</h1>
    <h2 class="text-center">{$messaggioErrore}</h2>
    <br><br>
    <h4 class="text-center">Verrà reindirizzato a breve alla home</h4>
    <br><br><br><br><br><br><br><br><br>
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