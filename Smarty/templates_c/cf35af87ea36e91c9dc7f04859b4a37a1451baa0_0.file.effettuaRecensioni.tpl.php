<?php
/* Smarty version 3.1.39, created on 2021-06-29 15:37:15
  from 'C:\xampp\htdocs\PolisportivaDDD\Smarty\templates\effettuaRecensioni.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60db220b781c92_39999344',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf35af87ea36e91c9dc7f04859b4a37a1451baa0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PolisportivaDDD\\Smarty\\templates\\effettuaRecensioni.tpl',
      1 => 1624971947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navBarUA.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60db220b781c92_39999344 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Effettua Recensione</title>

        <!-- Font Awesome icons (free version)-->
        <?php echo '<script'; ?>
 src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"><?php echo '</script'; ?>
>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/PolisportivaDDD/Smarty/css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <!-- Navigation-->
    <?php $_smarty_tpl->_subTemplateRender("file:navBarUA.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <section class="py-5">
            <div class="container">
                <h1>Effettua Recensione</h1>
                <hr>

                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h3>Invia recensione a: <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 </h3>
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
                                    <input class="form-control" name="titoloRecensione" maxlength="25" type="text" required data-validation-required-message="Please enter your name." />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            
                            <div class="control-group form-group">
                                <div class="controls"><label>Descrizione: </label>
                                    <textarea class="form-control" name="testo" rows="10" cols="100" required data-validation-required-message="Please enter your message" maxlength="200" ></textarea>
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
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <!-- Bootstrap core JS-->
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

    </body>
</html>
<?php }
}
