<?php
/* Smarty version 3.1.39, created on 2021-06-24 12:23:34
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\creaGruppo_scegliData.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d45d26841408_17832826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c67d57e356c7631504810f039fb4e969b7194f4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\creaGruppo_scegliData.tpl',
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
function content_60d45d26841408_17832826 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php $_smarty_tpl->_subTemplateRender("file:navBarUA.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
