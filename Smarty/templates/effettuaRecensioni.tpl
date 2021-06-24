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
    {include file="navBarUA.tpl"}

        <section class="py-5">
            <div class="container">
                <h1>Effettua Recensione</h1>
                <hr>

                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h3>Invia recensione a: {$username} </h3>
                        <form method="POST" action="recensisci" >
                            <p>Valutazione:</p>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" checked />
                                <label for="star5" title="5 stelle">5 stars </label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="4 stelle">4 stars </label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="3 stelle">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="2 stelle">2 stars </label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="1 stelle">1 star </label>
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
                                <div class="controls"><label>Descrizione: </label>
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
    {include file="footer.tpl"}
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/PolisportivaDDD/Smarty/js/scripts.js"></script>

    </body>
</html>
