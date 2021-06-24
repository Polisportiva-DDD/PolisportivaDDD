<?php
/* Smarty version 3.1.39, created on 2021-06-24 12:23:37
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\creaGruppo_scegliOra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d45d29857694_79663661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ca35385a136d60d0ca9b67615659fc1bab9bb15' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\creaGruppo_scegliOra.tpl',
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
function content_60d45d29857694_79663661 (Smarty_Internal_Template $_smarty_tpl) {
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


<section class="py-5">
    <form action="/PolisportivaDDD/Gruppo/scegliInvitati" method="post">
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

                            <select class="form-control w-100" aria-label="Default-select example" name='ora' id="ora">
                                <?php
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['ore']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total !== 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                <option value=<?php echo $_smarty_tpl->tpl_vars['ore']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)];?>
><?php echo $_smarty_tpl->tpl_vars['ore']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)];?>
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
            <div class="p-2"> <button type="submit" class="btn btn-primary">Vai Avanti</button></div>
            <div class="p-2"> <button type="button" class="btn btn-primary">Torna Indietro</button></div>
        </div>

        </div>
    </form>


    </div>
</section>

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
