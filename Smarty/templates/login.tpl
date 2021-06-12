<!doctype html>
{assign var='error' value=$error|default:'ok'}
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Polisportiva DDD</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">


{*    <!-- Bootstrap CSS CDN -->*}
{*    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">*}

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/gh/Polisportiva-DDD/PolisportivaDDD@main/Smarty/css/styles.css?token=AT7Q53F7W7QA4XDL476F5YDAYS7BY" rel="stylesheet" integrity="undefined" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/Polisportiva-DDD/PolisportivaDDD@62b984d32e67cda14e74f20dedfc93f15928721a/Smarty/css/ourStyle.css" rel="stylesheet" integrity="undefined" crossorigin="anonymous" >

    <script>
      function ready(){
        if (!navigator.cookieEnabled) {
          alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
        }
      }
      document.addEventListener("DOMContentLoaded", ready);
    </script>

    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/gh/Polisportiva-DDD/PolisportivaDDD@078198c0e2db4b216d21ab289870b3f37859385a/Smarty/css/login.css" rel="stylesheet" integrity="undefined" crossorigin="anonymous">
  </head>
  <body class="text-center">

<main class="form-signin">
  <form action="/PolisportivaDDD/Utente/Home" method="POST">
    <img class="mb-4" src="C:\xampp\htdocs\PolisportivaDDD\Smarty\assets\img\bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Benvenuto</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    {if $error!='ok'}
      <div style="color: red;">
        <p class="text-center" >Attenzione! Username e/o password errati! </p>
      </div>
    {/if}

    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
  </form>
</main>


    
  </body>
</html>
