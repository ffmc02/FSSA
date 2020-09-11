<?php
$title='Renouvellement de mot de passe';
//tableau d'erreur 
$formError = array();
// liste des membre déja inscrit
$MembersExist = new membres();
if(isset($_POST['ValidatedPasswordRecovery'])){
    if(!empty($_POST['MailRegister'])){
          if (filter_var($_POST['MailRegister'], FILTER_VALIDATE_EMAIL)) {
              $MembersExist->Email= htmlspecialchars($_POST['MailRegister']);
              $MailUser=htmlspecialchars($_POST['MailRegister']);
          } else {
               $formError['MailRegister']='Merci de mettre un mail correct';
          }
    } else {
        $formError['MailRegister']='Vous n\'avez pas rempli votre mail';
    }
    $CheckMemberExist=$MembersExist->MemberExist();
    if($CheckMemberExist!='0'){
        if(count($formError) == 0){
              function generateRandomString($length = 40) {
//                définition des carractere qui vont composer la chaine
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
//definition de deux vartiable $test et $test1 avec un nombre de caratere précis
            $test1 = generateRandomString();
            $test = generateRandomString(50);
//            définition du timtemps
            $time = time();
//            concaténation des variables $test $time ^$test1
            $cle = $test1 . $time . $test;
            
              $subject = 'Nouveau mot de passe Site FFSA ';
            $messageMail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>
                <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
                <head><meta charset="utf8" />
                <title>Mot de passe oublié</title>
                </head>
     <body>
       <center><p><strong>Bonjour </strong></p><center>
           <p> Pour récupérer votre mot de passe il vous suffit de cliquer sur le lien suivant : </p>
//     <a href="http://localhost/FFSA/view/ModifyPassword.php?cle=' . $cle . '">cliquez ICI</a>
</body>
     </html>';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-859-1';
            $headers[] = 'Reply-To:dev.gaetan.jonard@outlook.fr';
            $headers[] = 'From: FFSA <dev.gaetan.jonard@outlook.fr>';

            if (mail($MailUser, $subject, $messageMail, implode("\r\n", $headers))) {
                echo '$messagesucces';
                $ModifyCle = new membres();
                $ModifyCle->Cle = $cle;
                $ModifyCle->Email=$MailUser;
                $cleModify = $ModifyCle->ModifyCle();
                $messagesucces = 'Un mail vient de vous être envoyé, vous avez juste à cliquer sur le lien , pour pouvoir accéder au formulaire pour enregistrer un nouveau mot de passe';
            } else {
                echo 'Erreur mail';
                $messageError = 'Une erreur technique est survenue, veuillez contacter l\'administrateur du site via la page de <a href="../view/contactus.php">contact</a>';
            }
        }
    } else {
    $messageNotExiste='Vous n\'êtes pas enregistré sur le site!';
    }
}