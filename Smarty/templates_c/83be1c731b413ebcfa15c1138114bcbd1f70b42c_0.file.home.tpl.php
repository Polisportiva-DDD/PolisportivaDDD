<?php
/* Smarty version 3.1.39, created on 2021-06-26 09:34:15
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d6d87769b040_94288772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83be1c731b413ebcfa15c1138114bcbd1f70b42c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\home.tpl',
      1 => 1624692842,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navBar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60d6d87769b040_94288772 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
  <noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=/PolisportivaDDD/Messaggio/jsError">
  </noscript>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Polisportiva DDD</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">

  <!-- Font Awesome icons (free version)-->
  <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />



</head>
<body>


<!-- Navigation-->
<?php $_smarty_tpl->_subTemplateRender("file:navBar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- Page header-->
<header>
  <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
    <ol class="carousel-indicators">
      <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_5.png" alt="calcio a 5"  width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_7.png" alt="calcio a 7" width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_8.png" alt="calcio a 8" width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/PolisportivaDDD/Smarty/assets/img/calcio_a_11.png" alt="calcio a 11" width="1900" height="450"/>
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <h1 class="mb-4">I nostri campi</h1>
    <!-- Marketing Icons Section-->
    <div class="row">
    <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>

      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['nome'];?>
</h4>
          <?php if ($_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['pic64'] != '') {?>
          <img class="card-img-top" src="data:;base64,<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['pic64'];?>
" width="300" height="300" alt="Immagine campo">
          <?php } else { ?>
        <img class="card-img-top" src="https://via.placeholder.com/300" width="300" height="300"  alt="Immagine campo">
          <?php }?>
          <div class="card-footer">
          <form method="POST" action="/PolisportivaDDD/Utente/mostraCampo">
            <input type="hidden" name="idCampo" value="<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['idCampo'];?>
" >
            <button type="submit" class="btn btn-primary float-right ">Dettagli</button>
          </form>
          </div>
        </div>
      </div>

    <?php
}
}
?>
    </div>
  </div>

</section>
<hr class="my-0" />


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
