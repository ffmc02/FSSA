<?php
include_once '../Config.php';
include_once '../Controller/ModifyPasswordCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
        </div>
        <div class="col-lg-6 ">
            <h1>Modifier son mot de passe </h1>
        </div>
        <div class="col-lg-3">
            <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1 leftColumm">

        </div>
        <div class="col-lg-10 centralColumm">
            <div>
                <h2>Pour modifier votre mots de passe utilisé le formulaire suivant :</h2>
            </div>
            <div>
                <p class="text-success"><?= isset($MessageSucces) ? $MessageSucces : '' ?></p>
                <p class="text-danger"><?= isset($formError['$UserNotRegistred']) ? $formError['$UserNotRegistred'] : '' ?></p>
                <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
            </div>
            <div>
                <form method="POST" name="FormPasswordModify" id="FormPasswordModify">
                    <div>
                        <label for="EmailUser">Votre email enregistrer sur le site </label>
                        <input name="EmailUser" type="email" id="EmailUser" />
                        <p class="text-danger"><?= isset($formError['MailRegister']) ? $formError['MailRegister'] : '' ?></p>
                    </div>
                    <div>
                        <label for="NewPassword" >Votre nouveau mot de passe</label>
                        <input type="password" id="NewPassword" name="NewPassword" />
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                    </div>
                    <div>
                        <label for="ConfirmNewPassword">Confirmé votre mots de passe</label>
                        <input id="ConfirmNewPassword" type="password" name="ConfirmNewPassword" id="ConfirmNewPassword" />
                        <p class="text-danger"><?= isset($formError['ConfirmPassword']) ? $formError['ConfirmPassword'] : '' ?></p
                    </div>
                    <div>
                        <input type="submit" name="ValdidateNewPassword" id="ValdidateNewPassword" value="Enregistre mon nouveau mot de passe" />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-1 rigthColumm">

        </div>
    </div>
</div>
<?php
include_once '../include/footer.php';
?>