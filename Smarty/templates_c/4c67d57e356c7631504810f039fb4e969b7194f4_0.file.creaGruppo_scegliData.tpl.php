<?php
/* Smarty version 3.1.39, created on 2021-06-18 23:35:43
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\creaGruppo_scegliData.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60cd11afa3b7e6_27908422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c67d57e356c7631504810f039fb4e969b7194f4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\creaGruppo_scegliData.tpl',
      1 => 1624045844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60cd11afa3b7e6_27908422 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<div class="container mb-2 mt-2" dir="rtl" >
  <div class="table-responsive" >
    <table>
      <tr >
        <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/logout">  <button type="submit" class="btn btn-primary">Logout</button></a></th>
        <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/mioProfilo"><button type="submit" class="btn btn-secondary" >Profilo</button></a></th>
        <form method="post" action="/PolisportivaDDD/Utente/Utenti">
          <th scope="col" class="padTh"><button type="submit" class="btn btn-outline-dark"><span class="fas fa-search"></span></button></th>
          <th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="searchedUser"></th>
        </form>
      </tr>
    </table>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">


    <a class="navbar-brand" href="/PolisportivaDDD/Utente/home">Polisportiva DDD</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Gruppo/gruppi">Gruppi</a></li>
        <?php if ($_smarty_tpl->tpl_vars['isAmministratore']->value) {?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
              <a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
              <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/segnalazioni">Segnalazioni</a>
              <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/modificaPrezzi">Modifica prezzi</a>
            </div>
          </li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/informazioni">Informazioni</a></li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>
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
              <h4 class="card-title"> <?php echo $_smarty_tpl->tpl_vars['nomeCampo']->value;?>
 </h4>
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
              <input class="form-control" name="dataCreazioneGruppo" type="date" min=<?php echo $_smarty_tpl->tpl_vars['tomorrow']->value;?>
 id="example-date-input" required>
              </label>
              <br>
			
            </div>
          </div>
        </div>

      </div>

    </div>
    <div class="d-flex flex-row-reverse my-5">

      <div class="p-2">  <button type="submit" class="btn btn-primary">Vai Avanti</button></div>
      <div class="p-2">  <button type="button" class="btn btn-primary">Torna Indietro</button></div>

    </div>

  </div>


  </div>
</section>
</form>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
</footer>
</body>

<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<!-- Core theme JS-->
<?php echo '<script'; ?>
 src="/PolisportivaDDD/Smarty/js/scripts.js"><?php echo '</script'; ?>
>
</html><?php }
}
