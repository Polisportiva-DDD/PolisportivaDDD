<!doctype html>
{assign var='error' value=$error|default:'ok'}
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Polisportiva DDD</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/PolisportivaDDD/Smarty/css/styles.css"/>
    <link rel="stylesheet" href="/PolisportivaDDD/Smarty/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/PolisportivaDDD/Smarty/css/login.css"/>

  </head>
  <body class="text-center">

<main class="form-signin">
  <form action="/PolisportivaDDD/Utente/verifica" method="POST">
    <img class="mb-4" src="/PolisportivaDDD/Smarty/assets/img/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Benvenuto</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="username" placeholder="username" required>
      <label for="floatingInput">username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    {if $error=='1'}
      <div >
        <p class="text-center" > Username e/o password errati! </p>
      </div>
    {elseif $error=="2"}
      <div >
      <p class="text-center" >Sei stato bannato, non puoi accedere </p>
    </div>
    {/if}


    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
  </form>
</main>


    
  </body>
</html>
