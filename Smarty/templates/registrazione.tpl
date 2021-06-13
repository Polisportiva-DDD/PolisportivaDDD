<!doctype html>
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
  <form>
    <img class="mb-4" src="../assets/img/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Benvenuto</h1>

    <div class="form-group">

      <label for="validationDefault01">Nome</label>
      <input class="form-control" placeholder="Nome" name="nome" type="text" id="validationDefault01" required>

      <label for="validationDefault02">Cognome</label>
      <input class="form-control" placeholder="Cognome" type="text" id="validationDefault02" required>

      <label for="validationDefaultUsername">Username</label>
      <input class="form-control" placeholder="Username" type="text" id="validationDefaultUsername" required>

      <label for="ValidationDefaultData">Data di nascita</label>
      <input type="date" class="form-control" id="ValidationDefaultData"  required>

      <label for="floatingInput">Email</label>
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>

      <label for="floatingPassword">Password</label>
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>

      <label for="floatingPasswordConfirm">Conferma Password</label>
      <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Conferma Password" required>

      <div class="form-group">
        <label for="exampleInputFile">Inserisci immagine</label>
        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      </div>
    </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrati</button>
  </form>
</main>



</body>
</html>
