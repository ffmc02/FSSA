//page de connexion inscription
//
//alert('proute');
//Partie connecttion
$('.inscription').hide();
$('.btnInscription').click(function () {
    $('.inscription').show();
    $('.connection').hide();
});
//partie inscription
$('.btnConnection').click(function () {
    $('.inscription').hide();
    $('.connection').show();
});
//Ajout de licences
$('.FormAddLicences').hide();
$('.BtnFormAddLicences').click(function () {
    $('.Licences').hide();
    $('.FormAddLicences').show();
});

//-------------------------------------
//Controle des donnée dans formulairs inscription
$("#InscriptionUser").submit(function (e) {
    var envoi = true,
//    définition desq regex 
            RegexMail = /^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/,
            RegexTitle = /^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/,
            RegexId = /^\d+$/,
//récupération des valeurs rentrer par l'utilisateur
            NameUser = $('#NameUser').val(),
            FirstnameUser = $('#FirstnameUser').val(),
            EmailUser = $('#EmailUser').val(),
            AddressUser = $('#AddressUser').val(),
            ZipCodeUser = $('#ZipCodeUser').val(),
            City = $('#City').val(),
            PasswordUser = $('#PasswordUser').val(),
            ConbfirmPasswordUSer = $('#ConbfirmPasswordUSer').val(),
            AsaCode = $('#AsaCode').val(),
            AsaName = $('#AsaName').val(),
            LicenceNumber = $('#LicenceNumber').val(),
            // definition des variables d'erreurs
            NameError1 = 'Vous n\'avez pas rempli votre Nom',
            NameError2 = 'Veuillez mettre que des caractères alphabétiques!!!!!!!!!!',
            FirstnameError = 'Vous n\'avez pas rempli votre Prénom',
            FirstnameError2 = 'Veuillez mettre que des caractères alphabétiques!!!!!!!!!!',
            EmailError = 'Vous n\'avez pas rempli votre adresse mail',
            AddressError = 'Vous n\'avez pas rempli votre adresse',
            ZipCodeError1 = 'Merci de mettre uniquement des chiffres ',
            ZipCodeError2 = 'Vous n\'avez pas rempli votre code postal',
            CityError = 'Vous n\'avez pas rempli votre ville',
            PasswordError1 = 'Attention, les mots de passe ne sont pas identiques.',
            PasswordError2 = 'Merci de remplir le mots de passe',
            PasswordError3 = 'Merci de remplir la confirmation du mot de passe',
            AsaCodeError = 'Merci de remplir votre numéros d\'ASA',
            AsaCodeError2 = 'Merci de mettre uniquement des chiffres dans votre numéro ASA',
            AsaNameError = 'Vous n\'avez pas rempli votre Nom de votre ASA',
            AsaNameError2 = 'Veuillez mettre que des caractères alphabétiques!!!!!!!!!!',
            LicenceNumberError2 = 'Merci de mettre que des chiffres dans le champ Nuéro de licence',
            LicenceNumberError = 'Merci de remplir le champ Numéro de licence',
            messageRest = '';
//  On verifie les champs coté utilisateur
//champs Nom
    if (NameUser == '') {
        envoi = false;
        $('#ErrorName').text(NameError1);
    } else if (!RegexTitle.test(NameUser)) {
        envoi = false;
        $('#ErrorName').text(NameError2);
    } else {
        $('#ErrorName').text(messageRest);
    }
    //Champs prénom
    if (FirstnameUser == '') {
        envoi = false;
        $('#ErrorFirstname').text(FirstnameError);
    } else if (!RegexTitle.test(FirstnameUser)) {
        envoi = false;
        $('#ErrorFirstname').text(FirstnameError2);
    } else {
        $('#ErrorFirstname').text(messageRest);
    }
//champs email
    if (EmailUser == '') {
        envoi = false;
        $('#ErrorEmail').text(EmailError);
    } else {
        $('#ErrorEmail').text(messageRest);
    }
//    chmpas adresse
    if (AddressUser == '') {
        envoi = false;
        $('#ErrorAddress').text(AddressError);
    } else {
        $('#ErrorAddress').text(messageRest);
    }
    //champs Code postal
    if (ZipCodeUser == '') {
        envoi = false;
        $('#ErrorZipCode').text(ZipCodeError1);
    } else if (!RegexId.test(ZipCodeUser)) {
        envoi = false;
        $('#ErrorZipCode').text(ZipCodeError2);
    } else {
        $('#ErrorZipCode').text(messageRest);
    }
    //Champs Ville
    if (City == '') {
        envoi = false;
        $('#ErrorCity').text(CityError);
    } else {
        $('#ErrorCity').text(messageRest);
    }
    //Chmpas mots de passe et confirmation de mots de passe 
    if (PasswordUser == '') {
        envoi = false;
        $('#ErrorPassword').text(PasswordError2);
    } else if (ConbfirmPasswordUSer == '') {
        envoi = false;
        $('#ErrorConfirmPassword').text(PasswordError3);
    } else if (PasswordUser != ConbfirmPasswordUSer) {
        envoi = false;
        $('#ErrorPassword').text(PasswordError1);
        $('#ErrorConfirmPassword').text(PasswordError1);
    } else {
        $('#ErrorPassword').text(messageRest);
        $('#ErrorConfirmPassword').text(messageRest);
    }
    // champs Numéros d'ASA
    if (AsaCode == '') {
        envoi = false;
        $('#ErrorAsaCode').text(AsaCodeError);
    } else if (!RegexId.test(AsaCode)) {
        envoi = false;
        $('#ErrorAsaCode').text(AsaCodeError2);
    } else {
        $('#ErrorAsaCode').text(messageRest);
    }
    //Chmpas du nom de l'ASA
    if (AsaName == '') {
        envoi = false;
        $('#ErrorAsaName').text(AsaNameError);
    } else if (!RegexTitle.test(AsaName)) {
        envoi = false;
        $('#ErrorAsaName').text(AsaNameError2);
    } else {
        $('#ErrorAsaName').text(messageRest);
    }
    //chmaps Numéro de license
    if (LicenceNumber == '') {
        envoi = false;
        $('#ErrorLicenceNumber').text(LicenceNumberError);
    } else if (!RegexId.test(LicenceNumber)) {
        envoi = false;
        $('#ErrorLicenceNumber').text(LicenceNumberError2);
    } else {
        $('#ErrorLicenceNumber').text(messageRest);
    }
    if (envoi != true) {
        alert('erreur dans un champ merci de vous reporter à  la ligne en rouge!:!');
        return false;
        e.preventDefault();
    }
});
//formulaire de connexion
$("#ConnexionForm").submit(function (e) {
    var envoi = true,
//récupération des valeurs rentrer par l'utilisateur
            LoginMailUser = $("#LoginMailUser").val(),
            LoginPasswordUser = $("#LoginPasswordUser").val(),
            // definition des variables d'erreurs
            EmailError = 'Vous n\'avez pas rempli votre adresse mail',
            PasswordError = 'Merci de remplir le mots de passe',
            messageRest = '';
            // Verification des champs remplis par l'utilisateur
        // Champs Email
         if(LoginMailUser==''){
           envoi = false; 
        $('#ErrorMailUserConnect').text(EmailError);
        }else{
            $('#ErrorMailUserConnect').text(messageRest);
        }
        // chmaps mot de passe 
        if(LoginPasswordUser==''){
           envoi = false; 
        $('#ErrorPasswordUserConnecte').text(PasswordError);
        }else{
            $('#ErrorPasswordUserConnecte').text(messageRest);
        }
        if (envoi != true) {
        alert('erreur dans un champ merci de vous reporter à  la ligne en rouge!:!');
        return false;
        e.preventDefault();
    } 
});