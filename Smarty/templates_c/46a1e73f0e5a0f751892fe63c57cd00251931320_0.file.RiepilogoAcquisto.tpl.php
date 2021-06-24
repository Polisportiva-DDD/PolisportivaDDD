<?php
/* Smarty version 3.1.39, created on 2021-06-24 11:45:03
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\RiepilogoAcquisto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d4541fbcc3e2_63195415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46a1e73f0e5a0f751892fe63c57cd00251931320' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\RiepilogoAcquisto.tpl',
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
function content_60d4541fbcc3e2_63195415 (Smarty_Internal_Template $_smarty_tpl) {
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
<section class="py-5 mb-5">
  <form method="post" action="/PolisportivaDDD/Gettoni/paga">
  <div class="container">

    <h1 >Riepilogo acquisto</h1>
    <hr>
    <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
      <div class="row rounded border col-md-12 mb-2 py-4">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h4>Gettoni <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['nomeCampo'];?>
</h4>
          <input  hidden  name="<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['quantita'];?>
" >
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 m-auto mb-2" >
          <p>Prezzo per gettone: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['prezzo'];?>
€</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 m-auto mb-2">
          <p>Quantità gettoni: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['quantita'];?>
</p>
        </div>
      </div>
    <?php
}
}
?>
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-sm">

          <div class="border text-center">Numero della carta:<br>
            <?php echo $_smarty_tpl->tpl_vars['numeroCarta']->value;?>
</div>
      </div>
      <div class="col-sm">

        <div class="border text-center">Nome titolare della carta:<br>
            <?php echo $_smarty_tpl->tpl_vars['nomeTitolare']->value;?>

        </div>
      </div>
      <div class="col-sm">
        <div class="border text-center">Data di scadenza:<br><?php echo $_smarty_tpl->tpl_vars['dataScadenza']->value;?>
</div >

        </div>
      </div>


    <h4>Prezzo totale: <?php echo $_smarty_tpl->tpl_vars['prezzoTotale']->value;?>
€</h4>

    <button class="btn btn-primary btn-lg float-right mt-2" type="submit">Paga</button>

  </div>
  </form>

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
