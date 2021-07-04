<?php
/* Smarty version 3.1.39, created on 2021-07-03 11:40:02
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\AmministratoreAggiungiGettoni.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60e03072d4a5e3_84038126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fc4c8e45a98370365747a04b3cecf343e950c88' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\AmministratoreAggiungiGettoni.tpl',
      1 => 1624640402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar2.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60e03072d4a5e3_84038126 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Polisportiva</title>
		<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <!-- Core theme CSS (includes Bootstrap)-->
<link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>
    </head>

	<body>
	<!-- Navigation-->
	<?php $_smarty_tpl->_subTemplateRender("file:navbar2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<form method="POST" action="/PolisportivaDDD/Amministratore/aggiungi">
	<section class="py-5">
		<div class="container">


			<h1>
				Aggiungi Gettoni

			</h1>
			<hr>

			<div class="row">
				<div class="col-lg-12">
					<!-- Shopping Summery -->
				<div class="table-responsive">
					<table class="table">
					  <thead>
						<tr class="table-primary">
						  <th >Campi</th>
						  <th scope="col">Nome</th>
						  <th scope="col">Prezzo</th>
						  <th scope="col">Quantità</th>

						</tr>
					  </thead>
					  <tbody>
					  <?php
$__section_campi_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_campi_0_total = $__section_campi_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_campi'] = new Smarty_Variable(array());
if ($__section_campi_0_total !== 0) {
for ($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration'] <= $__section_campi_0_total; $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']++){
?>
						<tr>
						  <th scope="row" class="image" data-title="No">
							  <?php if ($_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] : null)]['pic64'] != '') {?>
								  <img src="data:;base64,<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] : null)]['pic64'];?>
"  alt="Immagine Campo" width="100" height="100" loading="lazy">
							  <?php } else { ?>
								  <img  src="https://via.placeholder.com/100"  alt="Immagine campo">
							  <?php }?>
						  </th>
						  <td ><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] : null)]['nome'];?>
</td>
						  <td><?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] : null)]['prezzo'];?>
</td>
						  <td>  <label for="quantity<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration'] : null);?>
">Inserisci quantita:</label>
							<input type="number" class="quantitaGettoni" id="quantity<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration'] : null);?>
" value="0" name="<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] : null)]['idCampo'];?>
" min="0" ></td>
						</tr>
						
					  </tbody>
					  <?php }} else {
 ?> 
						<h4>Nessun campo presente</h4>
						<?php
}
?>
					</table>
				</div>

			</div>


			</div>
			<div class="d-flex flex-row-reverse mb-5" >


				<div class="p-2">  <button type="submit" id="avanti" class="btn btn-primary" onclick="alert('Gettoni aggiunti');" disabled>Aggiungi gettoni</button></div>

			</div>



		</div>
	</section>
		</form>
	</body>
	<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php echo '<script'; ?>
>
		$('.quantitaGettoni').change(function() {
			let abilitato = false;
			$('.quantitaGettoni').each( function () {
				if($(this).val()>0){
					abilitato = true;
				}
			})
			$('#avanti').prop("disabled",!abilitato);
		});


	<?php echo '</script'; ?>
>



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
