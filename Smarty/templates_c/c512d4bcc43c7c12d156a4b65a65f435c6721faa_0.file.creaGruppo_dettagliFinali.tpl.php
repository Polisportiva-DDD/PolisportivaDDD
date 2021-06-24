<?php
/* Smarty version 3.1.39, created on 2021-06-24 12:23:46
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\creaGruppo_dettagliFinali.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d45d32a18171_53096038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c512d4bcc43c7c12d156a4b65a65f435c6721faa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\creaGruppo_dettagliFinali.tpl',
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
function content_60d45d32a18171_53096038 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<?php $_smarty_tpl->_subTemplateRender("file:navBarUA.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section class="py-5 mb-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Crea gruppo</h1>
    <hr>

    <form method="post" action="/PolisportivaDDD/Gruppo/creaGruppo">
      <div class="row mb-3">
        <div class="col-md-3">
          <label for="nomeGruppo" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nomeGruppo" name="nomeGruppo" required>
        </div>
        <div class="col-md-3">
          <label for="etaMinima" class="form-label">Età minima</label>
          <input type="number" class="form-control" id="etaMinima" min="10" max="99" name="etaMinima" required>
        </div>
        <div class="col-md-3">
          <label for="etaMassima" class="form-label">Età massima</label>
          <input type="number" class="form-control" id="etaMassima" max="99" name="etaMassima" required>
        </div>
        <div class="col-md-3">
          <label for="valMinima" class="form-label">Valutazione minima</label>
          <input type="number" class="form-control" id="balMinima" min="0" max="5" name="valMinima" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="descrizione" class="form-label">Descrizione</label>
          <textarea type="text" class="form-control" id="descrizione" name="descrizione" rows="5" required></textarea>
        </div>
      </div>
      <div class="d-flex flex-row-reverse my-5" >
        <div class="p-2"><button type="submit" class="btn btn-primary">Crea Gruppo</button></div>
        <div class="p-2"><a href="#">  <button type="button" class="btn btn-primary">Torna Indietro</button></a></div>
      </div>
    </form>
  </div>
</section>
<!-- Footer-->
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>


<?php echo '<script'; ?>
>

  let etaMinima = $('#etaMinima');
  let etaMassima = $('#etaMassima');

  etaMinima.change(function(){
    console.log(etaMinima.val());
    etaMassima.attr('min',etaMinima.val());
  })

<?php echo '</script'; ?>
>


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
