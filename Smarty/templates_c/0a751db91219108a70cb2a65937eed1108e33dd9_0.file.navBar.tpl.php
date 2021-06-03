<?php
/* Smarty version 3.1.39, created on 2021-06-03 10:21:43
  from 'C:\Users\dinun\PhpstormProjects\ProgettoWeb\Smarty\templates\navBar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b89117de6523_85355994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a751db91219108a70cb2a65937eed1108e33dd9' => 
    array (
      0 => 'C:\\Users\\dinun\\PhpstormProjects\\ProgettoWeb\\Smarty\\templates\\navBar.tpl',
      1 => 1622708435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b89117de6523_85355994 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Polisportiva DDD</title>

    <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/ProgettoWeb/Smarty/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<?php if ($_smarty_tpl->tpl_vars['isRegistrato']->value) {?>
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
                <?php if ($_smarty_tpl->tpl_vars['isAmministratore']->value) {?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
                        <a class="dropdown-item" href="UItentiBannati.html">Utenti Bannati</a>
                        <a class="dropdown-item" href="SegnalazioniAmministratore.html">Segnalazioni</a>
                        <a class="dropdown-item" href="#">Modifica prezzi</a>
                    </div>
                </li>
                <?php } elseif ($_smarty_tpl->tpl_vars['isUtente']->value) {?>
                <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
    <?php } else { ?>
    <div class="container mb-2 mt-2" dir="rtl" >
        <div class="table-responsive" >
            <table>
                <tr >
                    <th scope="col" class="padTh"><a href="#">  <button type="button" class="btn btn-primary">Login</button></a></th>
                    <th scope="col" class="padTh"><a href="#"><button type="button" class="btn btn-secondary">Registrati</button></a></th>
                </tr>
            </table>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Polisportiva DDD</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            </div>
        </div>
    </nav>
<?php }?>



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
