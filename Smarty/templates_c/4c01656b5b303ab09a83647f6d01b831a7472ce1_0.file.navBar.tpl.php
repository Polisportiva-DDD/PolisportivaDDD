<?php
/* Smarty version 3.1.39, created on 2021-07-03 11:22:05
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\navBar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60e02c3dca3565_06701159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c01656b5b303ab09a83647f6d01b831a7472ce1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\navBar.tpl',
      1 => 1624787957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60e02c3dca3565_06701159 (Smarty_Internal_Template $_smarty_tpl) {
?><noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=/PolisportivaDDD/Messaggio/jsError">
</noscript>
<?php if ($_smarty_tpl->tpl_vars['isRegistrato']->value) {?>
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
                    <?php if ($_smarty_tpl->tpl_vars['isAmministratore']->value) {?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownGestione" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestione</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownGestione">
                                <a class="dropdown-item" href="/PolisportivaDDD/Utente/utentiBannati">Utenti Bannati</a>
                                <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/segnalazioni">Segnalazioni</a>
                                <a class="dropdown-item" href="/PolisportivaDDD/Amministratore/modificaPrezzi">Modifica prezzi</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="/PolisportivaDDD/Utente/informazioni">Informazioni</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>
<?php } else { ?>
    <div class="container mb-2 mt-2" dir="rtl" >
        <div class="table-responsive" >
            <table>
                <tr >
                    <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/login">  <button type="button" class="btn btn-primary">Login</button></a></th>
                    <th scope="col" class="padTh"><a href="/PolisportivaDDD/Utente/registrazione"><button type="button" class="btn btn-secondary">Registrati</button></a></th>
                </tr>
            </table>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/PolisportivaDDD/Utente/home">Polisportiva DDD</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            </div>
        </div>
    </nav>
<?php }
}
}
