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
{include file="navBarUA.tpl"}
<section class="py-5">
    <div class="container">
        <!-- Page heading-->
        <h1>Ricerca gruppo</h1>
        <hr>
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
                                Admin: {$results[nr].admin}
                            </div>
                            <div class="col-sm">
                                Campo: {$results[nr].tipologia}
                            </div>
                            <div class="col-sm">
                                Data e ora: {$results[nr].dataEOra}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm">
                                Limiti età: {$results[nr].etaMinima} - {$results[nr].etaMassima} anni
                            </div>
                            <div class="col-sm">
                                Valutazione minima: {$results[nr].limiteValutazione}
                            </div>
                            <div class="col-sm">
                                Posti disponibili: {$results[nr].postiDisponibili}
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
                                <input type="number" class="form-control" id="etaMassima" name="etaMassima" min="10" max="99">
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
{include file="footer.tpl"}

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>