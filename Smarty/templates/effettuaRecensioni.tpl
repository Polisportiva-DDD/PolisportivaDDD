<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Effettua Recensione</title>

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>

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


            <a class="navbar-brand" href="home">Polisportiva DDD</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="RicercaGruppo.html">Gruppi</a></li>
                    {if $isAmministratore}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
                                <a class="dropdown-item" href="UItentiBannati.html">Utenti Bannati</a>
                                <a class="dropdown-item" href="SegnalazioniAmministratore.html">Segnalazioni</a>
                                <a class="dropdown-item" href="#">Modifica prezzi</a>
                            </div>
                        </li>
                    {else}
                        <li class="nav-item"><a class="nav-link" href="assistenza">Informazioni</a></li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
        <!-- Page Content-->
        <section class="py-5">
            <div class="container">
                <!-- Page Heading/Breadcrumbs-->
                <h1>
                    Effettua Recensione
                    
                </h1>
                <hr>


                <!-- Contact Form-->
                <!-- In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h3>Invia recensione a: {$username}</h3>
                        <form method="POST" action="recensisci" >

                            <p>Valutazione:</p>
                            <div class="rate">

                                <input type="radio" id="star5" name="rate" value="5" checked />
                                <label for="star5" title="5 stelle">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="4 stelle">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="3 stelle">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="2 stelle">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="1 stelle">1 star</label>

                            </div>



                            <br>
                            <br>

                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Titolo Recensione:</label>
                                    <input class="form-control" name="titoloRecensione" type="text" required data-validation-required-message="Please enter your name." />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Descrizione:</label>
                                    <textarea class="form-control" name="testo" rows="10" cols="100" required data-validation-required-message="Please enter your message" maxlength="999" ></textarea>
                                </div>
                            </div>
                            <div id="success"></div>
                            <!-- For success/fail messages-->
                            <button class="btn btn-primary" id="sendMessageButton" type="submit">Effettua Recensione</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Polisportiva DDD 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>

    </body>
</html>
