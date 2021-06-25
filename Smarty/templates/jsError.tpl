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
    <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" />
</head>

<body>
<!-- Navigation-->
    <div class="container mb-2 mt-2" dir="rtl" >
        <div class="table-responsive" >
            <table>
                <tr >
                    <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/login">  <button type="button" class="btn btn-primary">Login</button></a></th>
                    <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/registrazione"><button type="button" class="btn btn-secondary">Registrati</button></a></th>
                </tr>
            </table>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/PolisportivaDDD/Utente/home">Polisportiva DDD</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            </div>
        </div>
    </nav>


<section class="py-5">
    <br><br><br><br><br>
    <h1 class="text-center">Errore</h1>
    <h2 class="text-center">{$messaggioErrore}</h2>
    <br><br><br><br>
    <br><br><br><br><br><br><br><br><br>

</section>
{include file="footer.tpl"}
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>