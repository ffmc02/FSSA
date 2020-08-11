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
$('.BtnFormAddLicences').click(function (){
    $('.Licences').hide();
    $('.FormAddLicences').show();
});



