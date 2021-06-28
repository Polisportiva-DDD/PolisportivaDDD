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
<form action="/PolisportivaDDD/Gruppo/scegliOra" method="POST">
<section class="py-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Scegli data</h1>
    <hr>


    <div class="row">
      <div class="col-lg-6">
        <div class="text-center mb-2">
          <div class="card h-80" >
            <h2 class="card-header">Campo scelto:</h2>

            <div class="card-body">
              <br>
              <h4 class="card-title"> {$nomeCampo} </h4>
              <br>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-6">
        <div class="text-center ">
          <div class="card h-80" >
            <h2 class="card-header">Scegli data:</h2>

            <div class="card-body">


             <br>
              <label for="dataCreazioneGruppo">
              <input class="form-control" name="dataCreazioneGruppo" type="date" min={$tomorrow} id="example-date-input" required>
              </label>
              <br>
			
            </div>
          </div>
        </div>

      </div>

    </div>
    <div class="d-flex flex-row-reverse my-5">

      <div class="p-2">  <button type="submit" class="btn btn-primary">Vai Avanti</button></div>

    </div>

  </div>


  </div>
</section>
</form>
<!-- Footer-->
{include file="footer.tpl"}
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
</html>