<?php
/* Smarty version 3.1.39, created on 2021-06-24 10:58:57
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\acquistaGettoni.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d449510fc109_08558171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bea8fe690ff3773e682628fb821fcdd0f53e1c1f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\acquistaGettoni.tpl',
      1 => 1624524696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar2.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60d449510fc109_08558171 (Smarty_Internal_Template $_smarty_tpl) {
?><html lang="it">
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




	<section class="py-5">
		<div class="container">
			<h1>
				Acquista Gettoni
			</h1>
			<hr>


			<form method="POST" action="/PolisportivaDDD/Gettoni/riepilogoAcquisto">
			<div class="row">
				<div class="col-lg-6">

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

					  <?php
$__section_campi_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_campi_0_total = $__section_campi_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_campi'] = new Smarty_Variable(array());
if ($__section_campi_0_total !== 0) {
for ($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration'] <= $__section_campi_0_total; $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']++){
?>
						  <tbody>
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
							<input class="quantitaGettoni" type="number" id="quantity<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['iteration'] : null);?>
"  name="<?php echo $_smarty_tpl->tpl_vars['results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_campi']->value['index'] : null)]['id'];?>
" min="0" value="0" ></td>
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

				<div class="col-lg-6  ">
					<div class="card h-80" >
						<h2 class="card-header">Paga con carta di credito</h2>

						<div class="card-body">
							<?php if (count($_smarty_tpl->tpl_vars['carta']->value)) {?>
							<div class="form-group">

								<label for="exampleSelect1">Usa una tua carta non scaduta</label>
								<select class="form-control" name="carta">
								<?php
$__section_nr_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['carta']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_1_total = $__section_nr_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_1_total !== 0) {
for ($__section_nr_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_1_iteration <= $__section_nr_1_total; $__section_nr_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['carta']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['numero'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['carta']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['numero'];?>

								</option>
								<?php
}
}
?>
								</select>


							</div>


							<label for="exampleSelect1">Sconti:</label>
							<div class="table-responsive">
							<table class="table">
								<thead>
								<tr>
									<th scope="col">Quantita</th>
									<th scope="col">Sconto</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td >3 Gettoni</td>
									<td>5%</td>
								</tr>
								<tr>
									<td >5 Gettoni</td>
									<td>10%</td>
								</tr>
								<tr>
									<td >10 Gettoni</td>
									<td>15%</td>
								</tr>
							</table>
							</div>

								<button class="btn btn-primary" id="avanti" type="submit" disabled>Vai avanti</button>
								</form>
								<form method="post" action="/PolisportivaDDD/Gettoni/aggiungiCarta">
								<button class="btn btn-primary mt-1" name="aggiungiCarta" value="1" type="submit">Aggiungi Carta</button>
								</form>
		</div>

								<?php } else { ?>
								</form>
								<div class="form-group">

									<h4>Nessuna carta disponibile, aggiungine una</h4>
									<form method="post" action="/PolisportivaDDD/Gettoni/aggiungiCarta">
										<button class="btn btn-primary" name="aggiungiCarta" value="1" type="submit">Aggiungi Carta</button>
									</form>

								</div>
							<?php }?>


	</section>
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

		</html>

<?php }
}
