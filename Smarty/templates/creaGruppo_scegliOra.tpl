<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Polisportiva DDD</title>

    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
{include file="navBarUA.tpl"}


<section class="py-5">
    <form action="/PolisportivaDDD/Gruppo/scegliInvitati" method="post">
    <div class="container">
        <!-- Page heading-->
        <h1>Scegli Ora</h1>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="text-center mb-2">
                    <div class="card h-80" >
                        <h2 class="card-header">Data scelta:</h2>

                        <div class="card-body">
                            <br>
                            <h4 class="card-title">{$dataScelta}</h4>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="text-center mb-2">
                    <div class="card h-80" >
                        <h2 class="card-header">Scegli ora:</h2>

                        <div class="card-body">
                            <br>

                            <select class="form-control w-100" aria-label="Default-select example" name='ora' id="ora">
                                {section name=nr loop=$ore}
                                <option value={$ore[nr]}>{$ore[nr]}</option>
                                {/section}
                            </select>
                            <br>
                        </div>
                    </div>
                </div>

            </div>

            </div>
        <div class="d-flex flex-row-reverse my-5" >
            <div class="p-2"> <button type="submit" class="btn btn-primary">Vai Avanti</button></div>
        </div>

        </div>
    </form>


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