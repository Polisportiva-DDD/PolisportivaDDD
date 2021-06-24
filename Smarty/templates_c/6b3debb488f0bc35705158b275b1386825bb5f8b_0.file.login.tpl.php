<?php
/* Smarty version 3.1.39, created on 2021-06-18 21:46:44
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60ccf824843d03_08887575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b3debb488f0bc35705158b275b1386825bb5f8b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\login.tpl',
      1 => 1624026777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ccf824843d03_08887575 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<?php $_smarty_tpl->_assignInScope('error', (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? 'ok' : $tmp));?>
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

    <?php echo '<script'; ?>
>
      function ready(){
        if (!navigator.cookieEnabled) {
          alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
        }
      }
      document.addEventListener("DOMContentLoaded", ready);
    <?php echo '</script'; ?>
>

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

    <?php if ($_smarty_tpl->tpl_vars['error']->value == '1') {?>
      <div >
        <p class="text-center" > Username e/o password errati! </p>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value == "2") {?>
      <div >
      <p class="text-center" >Sei stato bannato, non puoi accedere </p>
    </div>
    <?php }?>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
  </form>
</main>


    
  </body>
</html>
<?php }
}
