<?php
/* Smarty version 3.1.39, created on 2021-06-24 09:53:56
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\dettagliGruppo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d43a1435e021_36437721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2029bf72d483c1b72ed3ab127f1390618715e95a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\dettagliGruppo.tpl',
      1 => 1624052168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d43a1435e021_36437721 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <!-- Font Awesome icons (free version)-->
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
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1>
      Nome Gruppo
    </h1>
    <hr>
    <!-- Content Row-->
    <div class="row">
      <!-- Sidebar Column-->
      <div class="col-lg-3 mb-4">
        <div class="list-group">
          <h2>Partecipanti</h2>
          <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['invitati']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
          <a class="list-group-item" href="/PolisportivaDDD/utente/utenti/<?php echo $_smarty_tpl->tpl_vars['invitati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['invitati']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)];?>
</a>
          <?php
}
}
?>
        </div>
      </div>
      <!-- Content Column-->
      <div class="col-lg-9 mb-5 mt-5">
        <h2>Dettagli gruppo</h2>
        <div class="col-lg-9 mb-4 mt-4">
          Admin: <?php echo $_smarty_tpl->tpl_vars['admin']->value;?>

        </div>
        <div class="col-lg-9 mb-4">
          Tipologia campo: <?php echo $_smarty_tpl->tpl_vars['campo']->value;?>

        </div>
        <div class="col-lg-9 mb-4">
          Data e ora: <?php echo $_smarty_tpl->tpl_vars['dataEOra']->value;?>

        </div>
        <div class="col-lg-9 mb-4">
          Posti disponibili: <?php echo $_smarty_tpl->tpl_vars['postiDisponibili']->value;?>

        </div>
        <div class="col-lg-9 mb-4">
          Limiti di età: <?php echo $_smarty_tpl->tpl_vars['etaMinima']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['etaMassima']->value;?>

        </div>
        <div class="col-lg-9 mb-4">
          Limite livello: <?php echo $_smarty_tpl->tpl_vars['votoMinimo']->value;?>

        </div>
        <div class="col-lg-9 mb-4">
          Descrizione: <?php echo $_smarty_tpl->tpl_vars['descrizione']->value;?>

        </div>
        <div class="float-right mt-5">
          <a href="/PolisportivaDDD/gruppo/partecipa/<?php echo $_smarty_tpl->tpl_vars['idGruppo']->value;?>
"><button class="btn btn-primary">Partecipa</button></a>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['isAmministratore']->value) {?>
          <div class="float-right mt-5 mx-3">
            <a href="/PolisportivaDDD/amministratore/eliminaGruppo/<?php echo $_smarty_tpl->tpl_vars['idGruppo']->value;?>
"><button class="btn btn-danger">Elimina gruppo</button></a>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
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
</body>
</html>
<?php }
}
