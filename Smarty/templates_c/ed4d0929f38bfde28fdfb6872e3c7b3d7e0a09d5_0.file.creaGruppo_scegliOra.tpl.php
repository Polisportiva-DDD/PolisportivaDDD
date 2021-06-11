<?php
/* Smarty version 3.1.39, created on 2021-06-11 13:09:31
  from 'C:\Users\dinun\PhpstormProjects\PolisportivaDDD\Smarty\templates\creaGruppo_scegliOra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60c3446b58f398_52863014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed4d0929f38bfde28fdfb6872e3c7b3d7e0a09d5' => 
    array (
      0 => 'C:\\Users\\dinun\\PhpstormProjects\\PolisportivaDDD\\Smarty\\templates\\creaGruppo_scegliOra.tpl',
      1 => 1623409534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60c3446b58f398_52863014 (Smarty_Internal_Template $_smarty_tpl) {
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


        <a class="navbar-brand" href="index.php">Polisportiva DDD</a>
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
        <h1>Scegli Ora</h1>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="text-center mb-2">
                    <div class="card h-80" >
                        <h2 class="card-header">Data scelta:</h2>

                        <div class="card-body">
                            <br>
                            <h4 class="card-title"><?php echo $_smarty_tpl->tpl_vars['dataScelta']->value;?>
</h4>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="text-center mb-2">
                    <div class="card h-80" >
                        <h2 class="card-header">Scegli ora:</h2>

                        <div class="card-body">
                            <br>

                            <select class="form-control w-100" aria-label="Default-select example" id="tipologiaCampo">
                                <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['ore']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['iteration'] <= $__section_nr_0_total; $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                <option value=$smarty.section.nr.iteration+1><?php echo $_smarty_tpl->tpl_vars['ore']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)];?>
</option>
                                <?php
}
}
?>
                            </select>
                            <br>
                        </div>
                    </div>
                </div>

            </div>

            </div>
        <div class="d-flex flex-row-reverse my-5" >
            <div class="p-2"><a href="#">  <button type="button" class="btn btn-primary">Vai Avanti</button></a></div>
            <div class="p-2"><a href="#">  <button type="button" class="btn btn-primary">Torna Indietro</button></a></div>
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
