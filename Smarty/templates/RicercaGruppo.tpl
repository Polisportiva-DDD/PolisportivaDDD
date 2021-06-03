<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Polisportiva DDD</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
                    <button class="btn btn-lg btn-primary mb-4">Crea Gruppo</button>
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
                                {$results[nr].limiteEtà}
                            </div>
                            <div class="col-sm">
                                {$results[nr].limiteValutazione}
                            </div>
                            <div class="col-sm">
                                {$results[nr].postiDisponibili}
                            </div>
                        </div>
                        <a class="btn btn-primary float-right mt-2" href="#!">Vai al gruppo</a>
                    </div>
                </div>
                {sectionelse}
                    <h2>Nessun Gruppo presente</h2>
                {/section}
                </div>
                <!-- Pagination-->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item"><a class="page-link" href="#!">← Precedente</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Successivo →</a></li>
                </ul>
            </div>
            <!-- Sidebar Widgets Column-->
            <div class="col-md-4">
                <!-- Search Widget-->
                <div class="card mb-4">
                    <h5 class="card-header">Filtra</h5>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="nomeGruppo" class="form-label">Nome Gruppo</label>
                                <input type="text" class="form-control" id="nomeGruppo" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="adminGruppo" class="form-label">Admin</label>
                                <input type="text" class="form-control" id="adminGruppo">
                            </div>
                            <div class="mb-3">
                                <label for="etaMinima" class="form-label">Età minima</label>
                                <input type="number" class="form-control" id="etaMinima" min="10" max="99">
                            </div>
                            <div class="mb-3">
                                <label for="etaMassima" class="form-label">Età massima</label>
                                <input type="number" class="form-control" id="etaMassima" min="10" max="99">
                            </div>
                            <div class="mb-3">
                                <label for="inputData" class="form-label">Dalle ore</label>
                                <input class="form-control" type="date" id="inputData">
                            </div>
                            <div class="mb-3">
                                <label for="inputOra" class="form-label">Data</label>
                                <input class="form-control" type="time" id="inputOra">
                            </div>
                            <div class="mb-3">
                                <label for="tipologiaCampo" class="form-label">Tipologia Campo</label>
                                <select class="form-control w-100" aria-label="Default-select example" id="tipologiaCampo">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Calcio a 5</option>
                                    <option value="2">Calcio a 7</option>
                                    <option value="3">Calcio a 8</option>
                                    <option value="3">Calcio a 11</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="valMin" class="form-label">Valutazione minima</label>
                                <select class="form-control w-100" aria-label="Default-select example" id="valMin">
                                    <option selected>Open this select menu</option>
                                    <option value="1">0 stelle</option>
                                    <option value="2">0.5 stelle</option>
                                    <option value="1">1 stelle</option>
                                    <option value="2">1.5 stelle</option>
                                    <option value="1">2 stelle</option>
                                    <option value="2">2.5 stelle</option>
                                    <option value="1">3 stelle</option>
                                    <option value="2">3.5 stelle</option>
                                    <option value="1">4 stelle</option>
                                    <option value="2">4.5 stelle</option>
                                    <option value="1">5 stelle</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtra</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
<script src="/ProgettoWeb/Smarty/js/scripts.js"></script>
</html>