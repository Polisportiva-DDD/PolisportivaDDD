<?php
/* Smarty version 3.1.39, created on 2021-06-24 11:44:35
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\dettagliCampo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d4540367c459_57552984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f74b81bd3262bf7c482262e32c7345102635ec47' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\dettagliCampo.tpl',
      1 => 1624524696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navBar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60d4540367c459_57552984 (Smarty_Internal_Template $_smarty_tpl) {
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
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<!-- Navigation-->
<?php $_smarty_tpl->_subTemplateRender("file:navBar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div class="container  py-5">
  <div class="row flex-lg-row-reverse  py-5">
    <div class="col-lg-6">
      <?php if ($_smarty_tpl->tpl_vars['pic64']->value != '') {?>
      <img src="data:;base64,<?php echo $_smarty_tpl->tpl_vars['pic64']->value;?>
" class="d-block mx-lg-auto img-fluid" alt="Immagine campo" width="650" height="650" loading="lazy">
      <?php } else { ?>
        <img  src="https://via.placeholder.com/300"  alt="Immagine campo">
      <?php }?>
    </div>
    <div class="col-lg-6">
      <h1 class="mb-3"><?php echo $_smarty_tpl->tpl_vars['nomeCampo']->value;?>
</h1>
      <p><?php echo $_smarty_tpl->tpl_vars['descrizione']->value;?>
</p>
    </div>

  </div>
  <ul class="list-group text-center">
    <li class="list-group-item">Per la prenotazione del campo creare un gruppo o chiedi di partecipare ad uno già esistente.</li>
  </ul>
</div>

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
</html><?php }
}
