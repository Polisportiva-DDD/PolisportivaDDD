<?php
/* Smarty version 3.1.39, created on 2021-06-02 17:33:19
  from 'C:\Users\dinun\PhpstormProjects\ProgettoWeb\Smarty\templates\utenteRegistratoHome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b7a4bf487919_84174966',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b99953981f25cd27462cbb0af3c887097c23c7a5' => 
    array (
      0 => 'C:\\Users\\dinun\\PhpstormProjects\\ProgettoWeb\\Smarty\\templates\\utenteRegistratoHome.tpl',
      1 => 1622643431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b7a4bf487919_84174966 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Polisportiva DDD</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/ProgettoWeb/Smarty/css/styles.css" rel="stylesheet" />
  <link href="/ProgettoWeb/Smarty/css/ourStyle.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<div class="container mb-2 mt-2" dir="rtl" >
  <div class="table-responsive" >
    <table>
      <tr >
        <th scope="col" class="padTh"><a href="#">  <button type="button" class="btn btn-primary">Logout</button></a></th>
        <th scope="col" class="padTh"><a href="#"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
        <th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="search"></th>
        <th scope="col" class="padTh"><span class="fas fa-search ml-1"></span></th>
      </tr>
    </table>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">


    <a class="navbar-brand" href="index.html">Polisportiva DDD</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="home-utente-registrato.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="RicercaGruppo.html">Gruppi</a></li>
        <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
      </ul>
    </div>
  </div>
</nav>
<section class="py-5">
  <div class="container">
    <!-- Page heading-->
    <h1>Il tuo profilo</h1>
    <ol class="breadcrumb mb-4 h-100">

    </ol>
    <div class="row">
      <div class="col-md-8">
      <div class="text-center mb-2">
        <!-- Profilo -->
          <img src="https://via.placeholder.com/250" class="rounded-circle" alt="Immagine utente">
      </div>
      <div class="text-center">
        <h5 class="mb-2">Username: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h5>
        <h5 class="mb-2">Nome: <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
</h5>
        <h5 class="mb-2">Cognome: <?php echo $_smarty_tpl->tpl_vars['cognome']->value;?>
</h5>
        <h5 class="mb-2">Età: <?php echo $_smarty_tpl->tpl_vars['eta']->value;?>
</h5>
        <h5 class="mb-2">Valutazione media:
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
        </h5>
      </div>
      </div>


      <!-- Sidebar Widgets Column-->
      <div class="col-md-4">
        <div class="list-group mb-4">
          <a class="list-group-item" href="#">Profilo personale</a>
          <a class="list-group-item" href="#">I tuoi gruppi</a>
          <a class="list-group-item" href="#">Le tue carte</a>
          <a class="list-group-item" href="#">Recensione</a>
        </div>
        <div class="card">
          <div class="card-body rounded">
            <h5 class="card-title">Wallet</h5>
            <p class="card-text">Questo è il tuo wallet</p>
          </div>
          <ul class="list-group list-group-flush">
            <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
              <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['nomeCampo'];?>
 <span class="float-right"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['quantitaGettoni'];?>
</span></li>
            <?php
}
}
?>
          </ul>
          <div class="card-body m-auto">
            <a href="#" class="btn btn-primary btn-lg">Acquista gettoni</a>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
</body>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<!-- Core theme JS-->
<?php echo '<script'; ?>
 src="../js/scripts.js"><?php echo '</script'; ?>
>
</html><?php }
}
