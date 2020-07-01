<?php
include_once '../Modele/dataBase.php';
include_once '../Modele/membres.php';
include_once '../Modele/functions.php';
include_once '../controlleur/connexionCtrl.php';
include_once '../include/header.php';
include_once '../include/navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
        </div>
        <div class="col-lg-6 ">
            <h1>Vous devez vous inscrire avant de vous connecter</h1>
        </div>
        <div class="col-lg-3">
            <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 leftColumm">

        </div>
        <div class="col-lg-6 centralColumm">
            <div class="connection" id="connection">
                <h2>Formulaire de connexion</h2>
                <form method="post" id="connexionForm">
                    <div>
                        <label for="loginNameUser" > Votre nom :</label>
                        <input id="loginNameUser" type="text" name="loginNameUser"/>
                    </div>
                    <div>
                        <label for="loginLicenceNumber"> votre numéro de licence :</label> 
                        <input id="loginLicenceNumber" type="text"  name="loginLicenceNumber" />
                    </div>
                    <div>
                        <label for="loginpasswordUser">votre mot de passe :</label> 
                        <input id="loginpasswordUser" type="text" name="loginpasswordUser" />
                    </div>
                    <div> 
                        <input id="connection" type="submit" name="connection" value="connexion" />
                    </div>
                </form>
                <div>
                    <p>Je ne suis pas <button class="btnInscription" id="btnInscription" >inscrit</button></p>

                </div>
            </div>
            <div class="inscription" id="inscription">
                <h2>Formulaire d'inscription</h2>
                <form method="post" id="inscription">
                    <div>  
                        <label for="nameUser"> Votre nom :</label> 
                        <input id="nameUser" type="text" name="nameUser" />
                         <p class="text-danger"><?= isset($formError['nameUser']) ? $formError['nameUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="firstnameUser"> Votre prénom :</label> 
                        <input id="firstnameUser" type="text" name="firstnameUser" />
                        <p class="text-danger"><?= isset($formError['firstnameUser']) ? $formError['firstnameUser'] : '' ?></p>
                    </div>
                         <div>  
                        <label for="emailUser"> Votre Email :</label> 
                        <input id="emailUser" type="email" name="emailUser" />
                        <p class="text-danger"><?= isset($formError['emailUser']) ? $formError['emailUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="adressUser"> Votre adresse :</label> 
                        <input id="adressUser" type="text" name="adressUser" />
                         <p class="text-danger"><?= isset($formError['adressUser']) ? $formError['adressUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="zipCodeUser"> Votre code postale :</label> 
                        <input id="zipeCodeUser" type="text" name="zipeCodeUser" />
                        <p class="text-danger"><?= isset($formError['zipeCodeUser']) ? $formError['zipeCodeUser'] : '' ?></p>
                    </div>
                      <div>  
                        <label for="city"> votre ville :</label> 
                        <input id="city" type="text" name="city" />
                        <p class="text-danger"><?= isset($formError['city']) ? $formError['city'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="passwordUser"> Votre mot de passe :</label> 
                        <input id="passwordUser" type="password" name="passwordUser" />
                        <p class="text-danger"><?= isset($formError['passwordUser']) ? $formError['passwordUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="conbfirmPasswordUSer"> Confirmé votre mot de passe :</label> 
                        <input id="confirmPasswordUser" type="password" name="confirmPasswordUser" />
                        <p class="text-danger"><?= isset($formError['passwordUser']) ? $formError['passwordUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="asaCode">Numéro de votre ASA ou ASK :</label> 
                        <input id="asaCode" type="text" name="asaCode" />
                        <p class="text-danger"><?= isset($formError['asaCode']) ? $formError['asaCode'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="licenceNumber"> Votre numéro de licence:</label> 
                        <input id="licenceNumber" type="text" name="licenceNumber" />
                        <p class="text-danger"><?= isset($formError['licenceNumber']) ? $formError['licenceNumber'] : '' ?></p>
                    </div>
                    <div ">
                        <label>Sélectionnez le type de licence dans la liste suivante :*</label><br>
                        <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                            <option selected=""></option>
                            <?php foreach ($listerFunctions as $FunctionList) { ?>
                                <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div> 
                        <input id="inscription" type="submit" name="validate" value="je m'inscrit" />
                    </div>
                </form>
                <div>
                    <p>Je  suis inscrit, je me  <button class="btnConnection" id="btnConnection" >connecte</button></p>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
            </div>
        </div>
    </div>
    <?php
    include_once '../include/footer.php';
    