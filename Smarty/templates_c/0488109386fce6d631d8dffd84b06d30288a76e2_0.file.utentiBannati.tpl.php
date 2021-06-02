<?php
/* Smarty version 3.1.39, created on 2021-06-02 19:31:21
  from 'C:\Users\dinun\PhpstormProjects\ProgettoWeb\Smarty\templates\utentiBannati.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b7c0691f2ec5_92420674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0488109386fce6d631d8dffd84b06d30288a76e2' => 
    array (
      0 => 'C:\\Users\\dinun\\PhpstormProjects\\ProgettoWeb\\Smarty\\templates\\utentiBannati.tpl',
      1 => 1622627368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b7c0691f2ec5_92420674 (Smarty_Internal_Template $_smarty_tpl) {
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
<!-- Page Content-->
<section class="py-5">
  <div class="container">
    <!-- Page Heading/Breadcrumbs-->
    <h1>Utenti bannati</h1>
    <ol class="breadcrumb mb-4 h-100"></ol>

    <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
    <div class="row rounded border col-md-12 mb-5 py-4">
      <div class="col-lg-3 col-md-3 col-sm-12">
        <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Immagine utente">
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
        <button class="btn btn-primary float-md-none float-sm-right float-right">Rimuovi ban</button>
      </div>
    </div>
    <?php }} else {
 ?>
    <h2>Nessun utente bannato.</h2>
    <?php
}
?>

  </div>
  <!-- Pagination-->
  <ul class="pagination justify-content-center mb-4">
    <li class="page-item"><a class="page-link" href="#!">← Precedente</a></li>
    <li class="page-item"><a class="page-link" href="#!">Successivo →</a></li>
  </ul>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
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
</body>
</html><?php }
}
