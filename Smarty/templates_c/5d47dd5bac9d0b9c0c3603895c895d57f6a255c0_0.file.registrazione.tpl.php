<?php
/* Smarty version 3.1.39, created on 2021-07-04 13:07:17
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\registrazione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60e196650565e6_20148217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d47dd5bac9d0b9c0c3603895c895d57f6a255c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\registrazione.tpl',
      1 => 1625396829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60e196650565e6_20148217 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<?php $_smarty_tpl->_assignInScope('error', (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? 'ok' : $tmp));?>
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
  <form enctype="multipart/form-data" action="/PolisportivaDDD/Utente/verificaRegistrazione" method="POST" >
    <img class="mb-4" src="/PolisportivaDDD/Smarty/assets/img/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Benvenuto</h1>

    <div class="form-group">

      <label for="nome"><h6>Nome</h6></label>
      
        <input class="form-control" placeholder="Nome" name="nome" type="text"  minlength="2" maxlength="25" id="nome"
               pattern="[a-zA-Z' ]{2,25}"
               title="Un nome è composto da lettere minuscole e maiuscole e può contenere spazi; sono consentiti da 2 fino a 25 caratteri."
               required>
      


      <label for="cognome"><h6>Cognome</h6></label>
      
        <input class="form-control" placeholder="Cognome" name="cognome" minlength="2" maxlength="25" type="text" id="cognome"
               pattern="[a-zA-Z' ]{2,25}"
               title="Un nome è composto da lettere minuscole e maiuscole e può contenere spazi; sono consentiti da 2 fino a 25 caratteri."
               required>
      


      <label for="username"><h6>Username</h6></label>
      
        <input class="form-control" placeholder="Username" name="username" minlength="3" maxlength="20" type="text" id="username"
               pattern="[a-zA-Z]{1}[A-Za-z0-9_.-]{2,19}"
               title="Un username è composto da lettere minuscole, maiuscole, '.', '-', '_'; sono consentiti da 3 a 20 caratteri;deve iniziare con una lettera minuscolo o maiuscola."
               required>
      


      <label for="data"><h6>Data di nascita</h6></label>
      <input type="date" class="form-control" name="data" id="data"
             required>

      <label for="email"><h6>Email</h6></label>
      
        <input type="email" class="form-control" name="email" maxlength="50" id="email" placeholder="name@example.com"
               pattern="[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}"
               title="L'email deve essere del tipo: caratteri@caratteri.dominio; il dominio deve essere compreso tra i 2 e i 6 caratteri."
               required>
      

      <label for="password"><h6>Password</h6></label>
      
        <input type="password" class="form-control" name="password" minlength="5" maxlength="40" id="password" placeholder="Password"
               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"
               title="La password deve contenere almeno una maiuscola,una minuscola e un numero; almeno 5 caratteri."
               required>
      


      <label for="file"><h6>Immagine Profilo</h6></label>
      <input type="file" class="form-control-file" name="file" id="file" accept="image/png, image/jpeg, image/jpg" required>


    </div>
    <br>

    <?php if ($_smarty_tpl->tpl_vars['error']->value == 'errorUsername') {?>
      <div>
        <p class="text-center">Attenzione! Username già esistente!  </p>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'errorEmail') {?>
      <div>
        <p class="text-center">Attenzione! Email già esistente!  </p>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'type') {?>
      <div>
        <p class="text-center">Attenzione! Il tipo dell'immagine deve essere jpg,jpeg o png </p>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'size') {?>
      <div>
        <p class="text-center">Attenzione! La dimensione dell'immagine è troppo grande </p>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'eta') {?>
      <div>
        <p class="text-center">Attenzione! Hai inserito un'età errata </p>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'campi') {?>
      <div>
        <p class="text-center">Attenzione! Devi inserire tutti i campi </p>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value == 'errorRegistrazione') {?>
      <div>
        <p class="text-center">Attenzione! Registrazione non andata a buon fine, inserire nuovamente i dati rispettando le specifiche.</p>
      </div>
    <?php }?>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrati</button>

  </form>

</main>



</body>
</html><?php }
}
