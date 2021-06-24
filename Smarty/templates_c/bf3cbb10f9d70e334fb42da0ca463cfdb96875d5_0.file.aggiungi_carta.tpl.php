<?php
/* Smarty version 3.1.39, created on 2021-06-24 10:58:58
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\aggiungi_carta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d4495237c823_14393500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf3cbb10f9d70e334fb42da0ca463cfdb96875d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\aggiungi_carta.tpl',
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
function content_60d4495237c823_14393500 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php $_smarty_tpl->_subTemplateRender("file:navBarUA.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- Page Content-->
<section class="py-5">
  <div class="container">

    <form method="post" action="/PolisportivaDDD/Gettoni/confermaAggiungiCarta">

      <h1 class="h3 mb-3 fw-normal">Aggiungi carta di credito</h1>
      <hr>

      <div class="col-md-4 offset-md-4 ">


        <label for="validationDefault01">Numero della Carta</label>
        <input class="form-control mb-3" placeholder="XXXX XXXX XXXX XXXX" type="text" id="validationDefault01" name="numero" minlength="16" maxlength="16"
               pattern="[0-9]+"
               title="Inserire solo numeri " required>

        <label for="validationDefault02">Cognome titolare della carta</label>
        <input class="form-control mb-3" placeholder="Cognome titolare" type="text" id="validationDefault02" name="cognome"  maxlength="25" required>

        <label for="validationDefault03">Nome titolare della carta</label>
        <input class="form-control mb-3" placeholder="Nome titolare" type="text" name="nome" id="validationDefault03" maxlength="25" required>

        <label for="ValidationDefaultData">Data di scadenza</label>
        <input type="date" class="form-control mb-3" id="ValidationDefaultData" name="data" required>

        <label for="validationDefault04">Codice di sicurezza</label>
        <input class="form-control mb-3" placeholder="CVC" type="text" id="validationDefault04"  name="cvc" minlength="3" maxlength="3" pattern="[0-9]+" title="Inserire solo numeri " required>

      </div>

      <div class="col-md-5 offset-md-5 ">
      <button class="btn btn-lg btn-primary mt-3 " type="submit">Aggiungi</button>
      </div>

    </form>

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
