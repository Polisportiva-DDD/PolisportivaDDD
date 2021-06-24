<?php
/* Smarty version 3.1.39, created on 2021-06-22 10:40:49
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\ricercaGruppo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d1a211354e52_99928748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28e34e619ebc96df0bcd5c0a3e53da5970215df9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\ricercaGruppo.tpl',
      1 => 1624052168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d1a211354e52_99928748 (Smarty_Internal_Template $_smarty_tpl) {
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
<div class="container mb-2 mt-2" dir="rtl" >
    <div class="table-responsive" >
        <table>
            <tr >
                <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/logout">  <button type="submit" class="btn btn-primary">Logout</button></a></th>
                <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/mioProfilo"><button type="submit" class="btn btn-secondary" >Profilo</button></a></th>
                <form method="post" action="/PolisportivaDDD/Utente/Utenti">
                    <th scope="col" class="padTh"><button type="submit" class="btn btn-outline-dark"><span class="fas fa-search"></span></button></th>
                    <th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="searchedUser"></th>
                </form>
            </tr>
        </table>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">


        <a class="navbar-brand" href="/PolisportivaDDD/Utente/home">Polisportiva DDD</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Gruppo/gruppi">Gruppi</a></li>
                <?php if ($_smarty_tpl->tpl_vars['isAmministratore']->value) {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
                            <a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
                            <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/segnalazioni">Segnalazioni</a>
                            <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/modificaPrezzi">Modifica prezzi</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/informazioni">Informazioni</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<section class="py-5">
    <div class="container">
        <!-- Page heading-->
        <h1>Ricerca gruppo</h1>
        <hr>
        <div class="row">
            <!-- Blog Entries Column-->
            <div class="col-md-8">
                <div class="col-md-4 m-auto">
                    <a href="/PolisportivaDDD/Gruppo/ScegliCampo" class="btn btn-lg btn-primary mb-4">Crea Gruppo</a>
                </div>
                <!-- Blog Post-->
                <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['nomeGruppo'];?>
</h2>
                        <div class="row mb-2">
                            <div class="col-sm">
                                Admin: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['admin'];?>

                            </div>
                            <div class="col-sm">
                                Campo: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['tipologia'];?>

                            </div>
                            <div class="col-sm">
                                Data e ora: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['dataEOra'];?>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm">
                                Limiti età: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['etaMinima'];?>
 - <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['etaMassima'];?>
 anni
                            </div>
                            <div class="col-sm">
                                Valutazione minima: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['limiteValutazione'];?>

                            </div>
                            <div class="col-sm">
                                Posti disponibili: <?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['postiDisponibili'];?>

                            </div>
                        </div>
                        <a class="btn btn-primary float-right mt-2" href="/PolisportivaDDD/Gruppo/Gruppi/<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['id'];?>
">Vai al gruppo</a>
                    </div>
                </div>
                <?php }} else {
 ?>
                    <h2>Nessun Gruppo presente</h2>
                <?php
}
?>
                </div>
            <!-- Sidebar Widgets Column-->
            <div class="col-md-4">
                <!-- Search Widget-->
                <div class="card mb-4">
                    <h5 class="card-header">Filtra</h5>
                    <div class="card-body">
                        <form method="post" action="/PolisportivaDDD/Gruppo/Gruppi">
                            <div class="mb-3">
                                <label for="nomeGruppo" class="form-label">Nome Gruppo</label>
                                <input type="text" class="form-control" id="nomeGruppo" name="nomeGruppo">
                            </div>
                            <div class="mb-3">
                                <label for="adminGruppo" class="form-label">Admin</label>
                                <input type="text" class="form-control" id="adminGruppo" name="adminGruppo">
                            </div>
                            <div class="mb-3">
                                <label for="etaMinima" class="form-label">Età minima</label>
                                <input type="number" class="form-control" id="etaMinima" name="etaMinima" min="10" max="99">
                            </div>
                            <div class="mb-3">
                                <label for="etaMassima" class="form-label">Età massima</label>
                                <input type="number" class="form-control" id="etaMassima" name="etaMassima" min="10" max="99">
                            </div>
                            <div class="mb-3">
                                <label for="inputOra" class="form-label">Data</label>
                                <input class="form-control" type="date" name="dataGruppo" id="dataGruppo">
                            </div>
                            <div class="mb-3">
                                <label for="tipologiaCampo" class="form-label">Campo</label>
                                <select class="form-control w-100" aria-label="Default-select example" name= "campo" id="tipologiaCampo">
                                        <option></option>
                                    <?php
$__section_nr_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['campi']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_1_total = $__section_nr_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_1_total !== 0) {
for ($__section_nr_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_1_iteration <= $__section_nr_1_total; $__section_nr_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['campi']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['nomeCampo'];?>
</option>
                                    <?php
}
}
?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="valMin" class="form-label">Valutazione minima</label>
                                <select class="form-control w-100" aria-label="Default-select example" name="valutazioneMinima" id="valMin">
                                    <option value="0">0 stelle</option>
                                    <option value="1">1 stelle</option>
                                    <option value="2">2 stelle</option>
                                    <option value="3">3 stelle</option>
                                    <option value="4">4 stelle</option>
                                    <option value="5">5 stelle</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtra</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
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
 src="/PolisportivaDDD/Smarty/js/scripts.js"><?php echo '</script'; ?>
>
</html><?php }
}
