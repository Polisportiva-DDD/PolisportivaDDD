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
{include file="navbar2.tpl"}
<section class="py-5">
<div class="container">
    <h1>Rispondi segnalazione</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center mb-2">
                <!-- Profilo -->
                {if $pic64  neq ""}
                    <img src="data:;base64,{$pic64}" alt="Immagine utente"  class="rounded-circle" width="200" height="200" loading="lazy">
                {else}
                    <img  src="https://via.placeholder.com/300" class="rounded-circle" alt="Immagine utente">
                {/if}
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
                <textarea name="risposta" class="form-control" required></textarea>
            <button type="submit" class="btn btn-primary float-right mt-3">Rispondi</button>
            </form>
        </div>
    </div>
</div>
</section>

{include file="footer.tpl"}

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>