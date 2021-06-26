<?php
/* Smarty version 3.1.39, created on 2021-06-26 12:37:04
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\utentiBannati.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d7035091a6d1_20939912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '141194c5a3a4ba97fc26ebbba5ce9280a88df6e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\utentiBannati.tpl',
      1 => 1624524696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar2.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60d7035091a6d1_20939912 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php $_smarty_tpl->_subTemplateRender("file:navbar2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1>Utenti bannati</h1>
    <hr>

    <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
      <form method="post" action="/PolisportivaDDD/Utente/rimuoviBan">
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-lg-3 col-md-3 col-sm-12">
        <?php if ($_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['pic64'] != '') {?>
          <img  src="data:;base64,<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['pic64'];?>
" class="rounded-circle" width="150" height="150" alt="Immagine utente">
        <?php } else { ?>
          <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Immagine utente">
        <?php }?>

      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Username: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['username'];?>
</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto">
        <p>Motivo ban: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['motivoBan'];?>
</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 m-auto text-center">
        <button class="btn btn-primary float-md-none float-sm-right float-right" name="username" value="<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['username'];?>
" type="submit" onclick="alert('Utente Sbandito');">Rimuovi ban</button>
      </div>
    </div>
      </form>
    <?php }} else {
 ?>
    <h2>Nessun utente bannato.</h2>
    <?php
}
?>

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
</html><?php }
}
