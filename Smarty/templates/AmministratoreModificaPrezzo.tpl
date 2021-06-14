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
	<div class="container mb-2 mt-2" dir="rtl" >
		<div class="table-responsive" >
			<table>
				<tr >
					<th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/logout">  <button type="button" class="btn btn-primary">Logout</button></a></th>
					<th scope="col" class="padTh"><a href="mioProfilo"><button type="button" class="btn btn-secondary">Profilo</button></a></th>
					<th scope="col" class="padTh"  dir="ltr"><input type="text" placeholder="Cerca" name="search"></th>
					<th scope="col" class="padTh"><span class="fas fa-search ml-1"></span></th>
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
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
							<a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
							<a class="dropdown-item" href="/PolisportivaDDD/Utente/segnalazioni">Segnalazioni</a>
							<a class="dropdown-item" href="/PolisportivaDDD/Amministratore/modificaPrezzi">Modifica prezzi</a>
						</div>
					</li>

				</ul>
			</div>
		</div>
	</nav>

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
	
						  <th scope="row" class="image" data-title="No"><img src="data:{$results[campi].type};base64,{$results[campi].pic64}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="100" height="100" loading="lazy"></th>
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


				<div class="p-2">  <button id="avanti" type="submit" class="btn btn-primary" disabled>Modifica prezzo gettoni</button></div>

			</div>






		</div>
		</form>
	</section>
	</body>
	<footer class="py-5 bg-dark">
		<div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
	</footer>

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