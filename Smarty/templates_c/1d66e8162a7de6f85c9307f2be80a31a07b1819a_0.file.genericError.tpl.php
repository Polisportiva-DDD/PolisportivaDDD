<?php
/* Smarty version 3.1.39, created on 2021-06-24 12:24:08
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\genericError.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d45d489faa87_62066774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d66e8162a7de6f85c9307f2be80a31a07b1819a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\genericError.tpl',
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
function content_60d45d489faa87_62066774 (Smarty_Internal_Template $_smarty_tpl) {
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

<!-- Page header-->
<section>
    <br><br><br><br><br>
    <h1 class="text-center">Errore</h1>
    <h2 class="text-center"><?php echo $_smarty_tpl->tpl_vars['messaggioErrore']->value;?>
</h2>
    <br><br>
    <h4 class="text-center">Verrà reindirizzato a breve alla home</h4>
    <br><br><br><br><br><br><br><br><br>
</section>
<hr class="my-0" />


</body>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
