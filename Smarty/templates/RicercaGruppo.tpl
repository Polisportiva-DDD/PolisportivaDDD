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
                <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/assistenza">Informazioni</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="py-5">
    <div class="container">
        <!-- Page heading-->
        <h1>Ricerca gruppo</h1>
        <ol class="breadcrumb mb-4 h-100">

        </ol>
        <div class="row">
            <!-- Blog Entries Column-->
            <div class="col-md-8">
                <div class="col-md-4 m-auto">
                    <a href="/PolisportivaDDD/Gruppo/ScegliCampo" class="btn btn-lg btn-primary mb-4">Crea Gruppo</a>
                </div>
                <!-- Blog Post-->
                {section name=nr loop=$results}
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{$results[nr].nomeGruppo}</h2>
                        <div class="row mb-2">
                            <div class="col-sm">
                                {$results[nr].admin}
                            </div>
                            <div class="col-sm">
                                {$results[nr].tipologia}
                            </div>
                            <div class="col-sm">
                                {$results[nr].dataEOra}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm">
                                {$results[nr].etaMinima} - {$results[nr].etaMassima} anni
                            </div>
                            <div class="col-sm">
                                {$results[nr].limiteValutazione}
                            </div>
                            <div class="col-sm">
                                {$results[nr].postiDisponibili}
                            </div>
                        </div>
                        <a class="btn btn-primary float-right mt-2" href="/PolisportivaDDD/Gruppo/Gruppi/{$results[nr].id}">Vai al gruppo</a>
                    </div>
                </div>
                {sectionelse}
                    <h2>Nessun Gruppo presente</h2>
                {/section}
                </div>
            <!-- Sidebar Widgets Column-->
            <div class="col-md-4">
                <!-- Search Widget-->
                <div class="card mb-4">
                    <h5 class="card-header">Filtra</h5>
                    <div class="card-body">
                        <form method="post" action="/PolisportivaDDD/Gruppo/Gruppi">
                            <div class="mb-3">
                                <label for="nomeGruppo" class="form-label">Nome Gruppo</label>
                                <input type="text" class="form-control" id="nomeGruppo" name="nomeGruppo">
                            </div>
                            <div class="mb-3">
                                <label for="adminGruppo" class="form-label">Admin</label>
                                <input type="text" class="form-control" id="adminGruppo" name="adminGruppo">
                            </div>
                            <div class="mb-3">
                                <label for="etaMinima" class="form-label">Età minima</label>
                                <input type="number" class="form-control" id="etaMinima" name="etaMinima" min="10" max="99">
                            </div>
                            <div class="mb-3">
                                <label for="etaMassima" class="form-label">Età massima</label>
                                <input type="number" class="form-control" id="etaMassima" min="10" max="99">
                            </div>
                            <div class="mb-3">
                                <label for="inputOra" class="form-label">Data</label>
                                <input class="form-control" type="date" name="dataGruppo" id="dataGruppo">
                            </div>
                            <div class="mb-3">
                                <label for="tipologiaCampo" class="form-label">Campo</label>
                                <select class="form-control w-100" aria-label="Default-select example" name= "campo" id="tipologiaCampo">
                                        <option></option>
                                    {section name=nr loop=$campi}
                                        <option>{$campi[nr].nomeCampo}</option>
                                    {/section}

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="valMin" class="form-label">Valutazione minima</label>
                                <select class="form-control w-100" aria-label="Default-select example" name="valutazioneMinima" id="valMin">
                                    <option value="0">0 stelle</option>
                                    <option value="1">1 stelle</option>
                                    <option value="2">2 stelle</option>
                                    <option value="3">3 stelle</option>
                                    <option value="4">4 stelle</option>
                                    <option value="5">5 stelle</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtra</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
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
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>