<!doctype html>
{assign var='errorUsername' value=$errorUsername|default:'ok'}
<html lang="it">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Polisportiva DDD</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="/PolisportivaDDD/Smarty/css/bootstrap.min.css" rel="stylesheet">
  <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet">



  <!-- Custom styles for this template -->
  <link href="/PolisportivaDDD/Smarty/css/login.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
  <form action="/PolisportivaDDD/Utente/verificaRegistrazione" method="POST">
    <img class="mb-4" src="/PolisportivaDDD/Smarty/assets/img/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Benvenuto</h1>

    <div class="form-group">

      <label for="nome"><h6>Nome</h6></label>
      <input class="form-control" placeholder="Nome" name="nome" type="text" maxlength="25" id="nome" pattern="[a-zA-Z]+\" required>

      <label for="cognome"><h6>Cognome</h6></label>
      <input class="form-control" placeholder="Cognome" name="cognome" maxlength="25" type="text" id="cognome" pattern="[a-zA-Z]+\" required>

      <label for="username"><h6>Username</h6></label>
      <input class="form-control" placeholder="Username" name="username" maxlength="20" type="text" id="username" required>

      <label for="data"><h6>Data di nascita</h6></label>
      <input type="date" class="form-control" name="data" id="data"  required>

      <label for="email"><h6>Email</h6></label>
      <input type="email" class="form-control" name="email" maxlength="50" id="email" placeholder="name@example.com" required>

      <label for="password"><h6>Password</h6></label>
      <input type="password" class="form-control" name="password" maxlength="40" id="password" placeholder="Password" required>

      <label for="file"><h6>Immagine Profilo</h6></label>
      <input type="file" class="form-control-file" name="file" id="file" accept="image/png, image/jpeg" required>


    </div>
    <br>

    {if $errorUsername!='ok'}
      <div>
        <p class="text-center">Attenzione! Username già esistente!  </p>
      </div>
    {/if}

    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrati</button>

  </form>

</main>



</body>
</html>
