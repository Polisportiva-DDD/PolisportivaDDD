<?php
/* Smarty version 3.1.39, created on 2021-06-26 10:46:18
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\bannaUtente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d6e95a6d4329_56906572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62c91f90b85bbf9744ac9cc24b835088c6790baf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\bannaUtente.tpl',
      1 => 1624697175,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar2.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60d6e95a6d4329_56906572 (Smarty_Internal_Template $_smarty_tpl) {
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
  <link href="/PolisportivaDDD/Smarty/css/ourStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- Navigation-->
<?php $_smarty_tpl->_subTemplateRender("file:navbar2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section class="py-5">


  <div class="container">
    <h1>Banna utente</h1>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="text-center mb-2">
          <?php if ($_smarty_tpl->tpl_vars['pic64']->value != '') {?>
            <img src="data:;base64,<?php echo $_smarty_tpl->tpl_vars['pic64']->value;?>
" alt="Immagine utente"  class="rounded-circle" width="200" height="200" loading="lazy">
          <?php } else { ?>
            <img  src="https://via.placeholder.com/200"  class="rounded-circle" alt="Immagine Utente">
          <?php }?>
        </div>
        <div class="text-center">
			<h6 class="mb-2">Username: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h6>
			<h6 class="mb-2">Nome: <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
</h6>
			<h6 class="mb-2">Cognome: <?php echo $_smarty_tpl->tpl_vars['cognome']->value;?>
</h6>
			<h6 class="mb-2">Età: <?php echo $_smarty_tpl->tpl_vars['eta']->value;?>
 anni</h6>
			<h6 class="mb-2">Valutazione media:
          <?php
$_smarty_tpl->tpl_vars['start'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['valutazioneMedia']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['valutazioneMedia']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration === 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration === $_smarty_tpl->tpl_vars['start']->total;?>
            <span class="fa fa-star checkedStar"></span>
          <?php }
}
?>
          <?php
$_smarty_tpl->tpl_vars['start'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? 5+1 - ($_smarty_tpl->tpl_vars['valutazioneMedia']->value+1) : $_smarty_tpl->tpl_vars['valutazioneMedia']->value+1-(5)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = $_smarty_tpl->tpl_vars['valutazioneMedia']->value+1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration === 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration === $_smarty_tpl->tpl_vars['start']->total;?>
            <span class="fa fa-star"></span>
          <?php }
}
?>
        </h6>
        </div>
      </div>

    </div>


    <div class="row mt-2 mb-2">
      <div class="col-lg-8 mb-4">
        <h4>Motivazione Ban</h4>
        <form method="POST" action="/PolisportivaDDD/Amministratore/inviaBan">

          <div>

            <label for="motivazione"></label><textarea type="text" class="form-control" id="motivazione" name="motivazione" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary float-right mt-3" onclick="alert('Utente Bandito')">Banna</button>
        </form>
      </div>
    </div>



</div>
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
