<?php
include_once '../Modele/dataBase.php';
include_once '../Modele/membres.php';
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
                        <label for="NameUser" > Votre nom :</label>
                        <input id="NameUser" type="text" name="NameUser"/>
                    </div>
                    <div>
                        <label for="LicenceNumber"> votre numéro de licence :</label> 
                        <input id="LicenceNumber" type="text"  name="LicenceNumber" />
                    </div>
                    <div>
                        <label for="passwordUser">votre mot de passe :</label> 
                        <input id="passwordUser" type="text" name="passwordUser" />
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
                    </div>
                    <div>  
                        <label for="firstnameUser"> Votre prénom :</label> 
                        <input id="firstnameUser" type="text" name="firstnameUser" />
                    </div>
                    <div>  
                        <label for="adressUser"> Votre adresse :</label> 
                        <input id="adressUser" type="text" name="adressUser" />
                    </div>
                    <div>  
                        <label for="zipCodeUser"> Votre code postale :</label> 
                        <input id="zipeCodeUser" type="text" name="zipeCodeUser" />
                    </div>
                      <div>  
                        <label for="city"> votre ville :</label> 
                        <input id="city" type="text" name="city" />
                    </div>
                    <div>  
                        <label for="passwordUser"> Votre mot de passe :</label> 
                        <input id="passwordUser" type="text" name="passwordUser" />
                    </div>
                    <div>  
                        <label for="conbfirmPasswordUSer"> Confirmé votre mot de passe :</label> 
                        <input id="confirmPasswordUser" type="text" name="confirmPasswordUser" />
                    </div>
                    <div>  
                        <label for="asaCode">Numéro de votre ASA ou ASK :</label> 
                        <input id="asaCode" type="text" name="asaCode" />
                    </div>
                    <div>  
                        <label for="licenceNumber"> Votre numéro de licence:</label> 
                        <input id="licenceNumber" type="text" name="licenceNumber" />
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
    