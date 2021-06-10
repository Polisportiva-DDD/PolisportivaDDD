
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
                        <li class="nav-item"><a class="nav-link" href="assistenza.html">Informazioni</a></li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>

