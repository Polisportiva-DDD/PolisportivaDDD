<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Polisportiva</title>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
	<!-- Navigation-->
	{include file="navbar2.tpl"}

	<section class="py-5">
		<form method="POST" action="/PolisportivaDDD/Amministratore/modifica">
		<div class="container">


			<h1>
				Modifica prezzo gettoni

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
						  <th scope="col">Modifica Prezzo</th>

						</tr>
					  </thead>
					  <tbody>
						{section name=campi loop=$results}
						<tr>
	
						  <th scope="row" class="image" data-title="No">
							  {if $results[campi].pic64  neq ""}
								  <img src="data:;base64,{$results[campi].pic64}"  alt="Immagine Campo" width="100" height="100" loading="lazy">
							  {else}
								  <img  src="https://via.placeholder.com/100"  alt="Immagine campo">
							  {/if}
						  </th>
						  <td >{$results[campi].nome}</td>
						  <td>{$results[campi].prezzo}</td>
						  <td>  <label for="prezzo{$smarty.section.campi.iteration}">Inserisci nuovo prezzo :</label>
							<input class="prezzo" type="number" id="prezzo{$smarty.section.campi.iteration}" value="0" name="{$results[campi].idCampo}" min="0" step="0.2"></td>
						</tr>
						
					  </tbody>
					  {sectionelse} 
						<h4>Nessun campo presente</h4>
						{/section}
					</table>
				</div>

			</div>


			</div>
			<div class="d-flex flex-row-reverse mb-5" >


				<div class="p-2">  <button id="avanti" type="submit" class="btn btn-primary" onclick='alert("Prezzi Modificati");' disabled>Modifica prezzo gettoni</button></div>

			</div>






		</div>
		</form>
	</section>
	</body>
	{include file="footer.tpl"}

	<script>
		$('.prezzo').change(function() {
			let abilitato = false;
			$('.prezzo').each( function () {
				if($(this).val()>0){
					abilitato = true;
				}
			})
			$('#avanti').prop("disabled",!abilitato);
		});


	</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>

		</html>