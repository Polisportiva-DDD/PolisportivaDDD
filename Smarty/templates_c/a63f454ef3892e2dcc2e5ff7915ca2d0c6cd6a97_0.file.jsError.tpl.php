<?php
/* Smarty version 3.1.39, created on 2021-06-26 09:45:46
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\jsError.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d6db2aee3295_99484059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a63f454ef3892e2dcc2e5ff7915ca2d0c6cd6a97' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\jsError.tpl',
      1 => 1624693546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60d6db2aee3295_99484059 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" />
</head>

<body>
<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/PolisportivaDDD/Utente/home">Polisportiva DDD</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            </div>
        </div>
    </nav>


<section class="py-5">
    <br><br><br><br><br><br><br><br><br>
    <h2 class="text-center">Errore</h2>
    <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['messaggioErrore']->value;?>
</h3>
    <br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>

</section>
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
