<?php
include_once '../Config.php';
include_once '../Controller/ForgottenPasswordCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 ">
                <h1></h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
               
            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <h2>Pour renouveller votre mot de passe remplissez le formulaire suivant </h2>
                </div>
                <div>
                        <p class="text-danger"><?= isset($messageNotExiste) ? $messageNotExiste : '' ?></p>
                        <p class="text-danger"><?= isset($messageError) ? $messageError : '' ?></p>
                        <p class="text-success"<?= isset($messagesucces) ? $messagesucces : '' ?></p>
                </div>
                <form method="POST" name="FormForgottenPassword" id="FormForgottenPassword">
                    <div>
                    <label for="MailRegister"> Votre mail avec le quelle vous étes enregistré.</label>
                    <input type="email" id="MailRegister" name="MailRegister" />
                    <span class="text-danger" id="EmailForPasswordRecovery"><?= isset($formError['MailRegister']) ? $formError['MailRegister'] :'' ?></span>
                    </div>
                    <div>
                        <input type="submit" name="ValidatedPasswordRecovery" id="ValidatedPasswordRecovery" value="Renouveller mon mot de passe" />
                       </div> 
                </form>
            </div>
            <div class="col-lg-3 rigthColumm">
                <?php
                include_once '../Include/RightColum.php';
                ?>
            </div>
        </div>
    </div>
    <?php
include_once '../include/footer.php';
?>