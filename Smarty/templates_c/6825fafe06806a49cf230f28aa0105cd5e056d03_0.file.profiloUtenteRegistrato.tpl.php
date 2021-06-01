<?php
/* Smarty version 3.1.39, created on 2021-06-01 17:02:42
  from 'C:\Users\dinun\PhpstormProjects\ProgettoWeb\Smarty\templates\profiloUtenteRegistrato.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b64c1264da93_88486598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6825fafe06806a49cf230f28aa0105cd5e056d03' => 
    array (
      0 => 'C:\\Users\\dinun\\PhpstormProjects\\ProgettoWeb\\Smarty\\templates\\profiloUtenteRegistrato.tpl',
      1 => 1622559761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b64c1264da93_88486598 (Smarty_Internal_Template $_smarty_tpl) {
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
  <link href="../css/styles.css" rel="stylesheet" />
  <link href="../css/ourStyle.css" rel="stylesheet" />
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
    <h1>Profilo Utente</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Profilo Utente</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
      <div class="text-center mb-2">
        <!-- Profilo -->
          <img src="https://via.placeholder.com/250" class="rounded-circle" alt="Immagine utente">
      </div>
      <div class="text-center">
        <h6 class="mb-2">Username: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h6>
        <h6 class="mb-2">Nome: <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
</h6>
        <h6 class="mb-2">Cognome: <?php echo $_smarty_tpl->tpl_vars['cognome']->value;?>
</h6>
        <h6 class="mb-2">Età: <?php echo $_smarty_tpl->tpl_vars['eta']->value;?>
</h6>
        <h6 class="mb-2">Valutazione media:
        </h6>
      </div>
      </div>
    </div>

    <div class="row mb-2 ">
      <div class="col-md-12 text-right">
        <button class="btn btn-primary  " type="submit">Recensisci</button>
    </div>

  </div>
    <h6>Recensioni:</h6>

    <hr>

    <?php
$__section_nr_0_loop = (is_array(@$_loop=((string)$_smarty_tpl->tpl_vars['results']->value)) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
      <div class="row">
        <div class="container">
          <div class="text-left mb-2">
            <!-- Profilo -->
            <img src="https://via.placeholder.com/75" class="rounded-circle" alt="Immagine utente">
            <h4 ><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['username'];?>
</h4>
          </div>
          <div class="text-left">
            <b><h6 class="mb-2">Valutazione:
              </h6></b>
            <br>
            <b><h6 class="mb-2"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['titoloRecensione'];?>
</h6><br></b>
            <b><h6 class="mb-2"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['dataRecensione'];?>
</h6><br></b>
            <p ><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['descrizioneRecensione'];?>
</p><br>

          </div>
        </div>
      </div>
      <?php }} else {
 ?>
      <h2>Nessuna recensione presente</h2>
    <?php
}
?>
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
