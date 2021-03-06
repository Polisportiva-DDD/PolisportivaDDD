<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Polisportiva DDD</title>

        <!-- Font Awesome icons (free version)-->
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
                    <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/informazioni">Informazioni</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Page Content-->
        <section class="py-5">
            <div class="container">
                <!-- Page Heading/Breadcrumbs-->
                <h1>
                    Assistenza
                    
                </h1>
                <hr>
                <!-- Content Row-->
                <div class="row">

                    <!-- Contact Details Column-->
                    <div class="col-lg-4 mb-4">
                        <h3>Informazioni polisportiva</h3>
                        <p>
                            Polisportiva DDD
                            <br />
                            L'Aquila, CAP 67100
                            <br />
                        </p>
                        <p>
                            Telefono: 0873-1234690
                        </p>
                        <p>
                            Email:
                            <a href="mailto:name@example.com">polisportivaddd@libero.it</a>
                        </p>
                        <p>
                            Giorni
                            : Luned?? - Domenica: 9:00 AM to 5:00 PM
                        </p>
                    </div>
                </div>
                <!-- Contact Form-->
                <!-- In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h3>Invia ticket d'assistenza</h3>
                        <form method="post" action="/PolisportivaDDD/Utente/inviaSegnalazione">
                            <div>
                                <label for="oggetto" class="form-label">Oggetto</label>
                                <input type="text" class="form-control" id="oggetto" name="oggetto" maxlength="25" required>
                            </div>
                            <div>
                                    <label for="messaggio" class="form-label">Messaggio</label>
                                    <textarea type="text" class="form-control" id="messaggio" name="messaggio" rows="5" maxlength="200" required></textarea>
                            </div>
                            <button class="btn btn-primary" id="sendMessageButton" type="submit">Invia ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
    {include file="footer.tpl"}
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>
        <!-- Contact form JavaScript-->
        <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
        <script src="/PolisportivaDDD/Smarty/assets/mail/jqBootstrapValidation.js"></script>
        <script src="/PolisportivaDDD/Smarty/assets/mail/contact_me.js"></script>
    </body>
</html>
