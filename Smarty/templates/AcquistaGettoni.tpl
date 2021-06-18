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
					<li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Gruppo/Gruppi">Gruppi</a></li>
					{if $isAmministratore}
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
								<a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
								<a class="dropdown-item" href="/PolisportivaDDD/Amministratore/segnalazioni">Segnalazioni</a>
								<a class="dropdown-item" href="/PolisportivaDDD/Amministratore/modificaPrezzi">Modifica prezzi</a>
							</div>
						</li>
					{else}
						<li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/informazioni">Informazioni</a></li>
					{/if}
				</ul>
			</div>
		</div>
	</nav>




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

					  {section name=campi loop=$results}
						  <tbody>
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
						  <td>  <label for="quantity{$smarty.section.campi.iteration}">Inserisci quantita:</label>
							<input class="quantitaGettoni" type="number" id="quantity{$smarty.section.campi.iteration}"  name="{$results[campi].id}" min="0" value="0" ></td>
						</tr>
						
					  </tbody>
					  {sectionelse} 
					  <h4>Nessun campo presente</h4>

						{/section}
					</table>
					
				</div>

			</div>

				<div class="col-lg-6  ">
					<div class="card h-80" >
						<h2 class="card-header">Paga con carta di credito</h2>

						<div class="card-body">
							{if $carta|@count }
							<div class="form-group">

								<label for="exampleSelect1">Usa una tua carta non scaduta</label>
								<select class="form-control" name="carta">
								{section name=nr loop=$carta}
								<option value="{$carta[nr].numero}">
								{$carta[nr].numero}
								</option>
								{/section}
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

								{else}
								</form>
								<div class="form-group">

									<h4>Nessuna carta disponibile, aggiungine una</h4>
									<form method="post" action="/PolisportivaDDD/Gettoni/aggiungiCarta">
										<button class="btn btn-primary" name="aggiungiCarta" value="1" type="submit">Aggiungi Carta</button>
									</form>

								</div>
							{/if}


	</section>
	</body>
	<footer class="py-5 bg-dark">
		<div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
	</footer>

	<script>
		$('.quantitaGettoni').change(function() {
			let abilitato = false;
			$('.quantitaGettoni').each( function () {
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

