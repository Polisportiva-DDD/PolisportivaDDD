<?php
/* Smarty version 3.1.39, created on 2021-06-24 12:24:07
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\dettagliGruppo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d45d4748c620_18404850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2029bf72d483c1b72ed3ab127f1390618715e95a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\dettagliGruppo.tpl',
      1 => 1624524696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navBarUA.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60d45d4748c620_18404850 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php $_smarty_tpl->_subTemplateRender("file:navBarUA.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
