<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Polisportiva</title>

		<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/ProgettoWeb/Smarty/css/styles.css" rel="stylesheet" type="text/css"/>
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
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
							<a class="dropdown-item" href="UItentiBannati.html">Utenti Bannati</a>
							<a class="dropdown-item" href="SegnalazioniAmministratore.html">Segnalazioni</a>
							<a class="dropdown-item" href="#">Modifica prezzi</a>
						</div>
					</li>

				</ul>
			</div>
		</div>
	</nav>

	<section class="py-5">
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
							<input type="number" id="prezzo{$smarty.section.campi.iteration}" value="0" name="prezzo{$smarty.section.campi.iteration}" min="0" ></td>
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


				<div class="p-2"><a href="#">  <button type="button" class="btn btn-primary">Modifica prezzo gettoni</button></a></div>

			</div>






		</div>
	</section>
	</body>
	<footer class="py-5 bg-dark">
		<div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
	</footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/ProgettoWeb/Smarty/js/scripts.js"></script>

		</html>