<?php
include_once '../Config.php';
include_once '../Controller/ConnectionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
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
            <div>
                <p class="text-danger"><?= isset($formError['MeessageMemberExist']) ? $formError['MeessageMemberExist'] : '' ?></p>
            </div>
            <div class="connection" id="connection">
                <h2>Formulaire de connexion</h2>
                <div>
                    <p class="text-danger"><?= isset($UserNotRegistred) ? $UserNotRegistred : '' ?></p>
                    <p class="text-danger"><?= isset($formError['Technical']) ? $formError['Technical'] : '' ?></p>
                </div>
                <form method="post" id="ConnexionForm">
                    <div>
                        <label for="LoginMailUser" > Votre Mail :</label>
                        <input id="LoginMailUser" type="text" name="LoginMailUser" value="<?= isset($_SESSION['TemporyloginMail']) ? $_SESSION['TemporyloginMail'] : '' ?>" />
                        <p class="text-danger" id="ErrorMailUserConnect"><?= isset($formError['LoginMailUser']) ? $formError['LoginMailUser'] : '' ?></p>
                    </div>
                    <div>
                        <label for="LoginPasswordUser">votre mot de passe :</label> 
                        <input id="LoginPasswordUser" type="password" name="LoginPasswordUser" />
                        <p class="text-danger" id="ErrorPasswordUserConnecte"><?= isset($formError['LoginPasswordUser']) ? $formError['LoginPasswordUser'] : '' ?></p>
                    </div>
                    <div> 
                        <input id="connection" type="submit" id="submit" name="connection" value="connexion" />
                    </div>
                </form>
                <div>
                    <p> Vous avez oubliez votre<a href="ForgottenPassword.php"> mot de passe </a></p>
                </div>
                <div>
                    <br>
                    <br>
                    <br>
                </div>
                <div>
                    <p>Je ne suis pas <button class="btnInscription" id="btnInscription" >inscrit</button></p>

                </div>
            </div>
            <div class="inscription" id="inscription">
                <h2>Formulaire d'inscription</h2>
                <p class="text-danger"><?= isset($formError['$MeessageMemberExist']) ? $formError['$MeessageMemberExist'] : '' ?></p>
                <form method="post" id="InscriptionUser">
                    <div>  
                        <label for="NameUser"> Votre nom :</label> 
                        <input id="NameUser" type="text" name="NameUser" />
                        <p class="text-danger" id="ErrorName"><?= isset($formError['NameUser']) ? $formError['NameUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="FirstnameUser"> Votre prénom :</label> 
                        <input id="FirstnameUser" type="text" name="FirstnameUser" />
                        <p class="text-danger" id="ErrorFirstname"><?= isset($formError['FirstnameUser']) ? $formError['FirstnameUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="EmailUser"> Votre Email :</label> 
                        <input id="EmailUser" type="email" name="EmailUser" />
                        <p class="text-danger" id="ErrorEmail"><?= isset($formError['EmailUser']) ? $formError['EmailUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="AddressUser"> Votre adresse :</label> 
                        <input id="AddressUser" type="text" name="AddressUser" />
                        <p class="text-danger" id="ErrorAddress"><?= isset($formError['AddressUser']) ? $formError['AddressUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="ZipCodeUser"> Votre code postal :</label> 
                        <input id="ZipCodeUser" type="text" name="ZipCodeUser" />
                        <p class="text-danger" id="ErrorZipCode"><?= isset($formError['ZipCodeUser']) ? $formError['ZipCodeUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="City"> votre ville :</label> 
                        <input id="City" type="text" name="City" />
                        <p class="text-danger" id="ErrorCity"><?= isset($formError['City']) ? $formError['City'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="PasswordUser"> Votre mot de passe :</label> 
                        <input id="PasswordUser" type="password" name="PasswordUser" />
                        <p class="text-danger" id="ErrorPassword"><?= isset($formError['PasswordUser']) ? $formError['PasswordUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="ConbfirmPasswordUSer"> Confirmer votre mot de passe :</label> 
                        <input id="ConbfirmPasswordUSer" type="password" name="ConbfirmPasswordUSer" />
                        <p class="text-danger" id="ErrorConfirmPassword"><?= isset($formError['PasswordUser']) ? $formError['PasswordUser'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="AsaCode">Numéro de votre ASA ou ASK :</label> 
                        <input id="AsaCode" type="text" name="AsaCode" />
                        <p class="text-danger" id="ErrorAsaCode"><?= isset($formError['AsaCode']) ? $formError['AsaCode'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="AsaName">Nom de votre ASA ou ASK :</label> 
                        <input id="AsaName" type="text" name="AsaName" />
                        <p class="text-danger" id="ErrorAsaName"><?= isset($formError['AsaName']) ? $formError['AsaName'] : '' ?></p>
                    </div>
                    <div>  
                        <label for="LicenceNumber"> Votre numéro de licence:</label> 
                        <input id="LicenceNumber" type="text" name="LicenceNumber" />
                        <p class="text-danger" id="ErrorLicenceNumber"><?= isset($formError['LicenceNumber']) ? $formError['LicenceNumber'] : '' ?></p>
                    </div>
                    <div>
                        <label>Sélectionnez le type de licence dans la liste suivante :*</label><br>
                        <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                            <option selected="">Choissez dans la liste suivante </option>
                            <?php
                            foreach ($listerFunctions as $FunctionList) {
                                if ($FunctionList->id != 155 && $FunctionList->id != 14 && $FunctionList->id != 13 &&  $FunctionList->id != 11 && $FunctionList->id != 12) {
                                    ?>
                                    <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                    </div>
                    <div> 
                        <input id="inscription" type="submit"  id="submit" name="validate" value="je m'inscrit" />
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
    include_once '../Include/Footer.php';
    ?>