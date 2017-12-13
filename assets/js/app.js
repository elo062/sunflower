/* ====== Add Smooth effect ===== */
$(function() {
  // On fait apparaître le menu sandwich et disparaitre la barre de navigation sur petit écran
        var windowWidth= $(window).width();
        if(windowWidth < 600){
          $(".op-sectionlist").hide();
          $(".menuSandwich").show();
        }
        // On fait disparaître le menu sandwich sur grand écran
      if(windowWidth > 600){
        $(".menuSandwich").hide();
      }

  // var scrollToAnchor = function( id ) {
  //   var elem = $("section[id='"+ id +"']"); // on crée une balise d'ancrage
  //   if ( typeof elem.offset()  === "undefined" ) { // on verifie si l'élément existe
	// 	elem = $("#"+id); }
  //   if ( typeof elem.offset()  !== "undefined" ) { // si l'élément existe, on continue
  //     $('html, body').animate({
  //             scrollTop: elem.offset().top }, 600 );} // on définit un temps de défilement de page
  // };


// Rendre les champs du formulaire obligatoire
var $champ = $('.champ'),
    $erreur = $('#erreur');
    $envoi = $('#envoi');

   function verifier(champ){
       if(champ.val() == ""){ // si le champ est vide
         $envoi.click(function(e){
             e.preventDefault();})
           $erreur.css('display', 'block'); // on affiche le message d'erreur
       }
   }


// Menu scroll
//   $("a").click(function( event ) { // on attache la fonction au click
//     if ( $(this).attr("href").match("#") ) { // on vérifie qu'il s'agit d'une ancre
//       var href = $(this).attr('href').replace('#', '') // on scroll vers la cible
//       scrollToAnchor( href ); }
//
// // On fait apparaître le menu sandwich et disparaitre les boutons de navigation sur petit écran
//       var windowWidth= $(window).width();
//       if(windowWidth < 600){
//         $(".op-sectionlist").hide();
//         $(".menuSandwich").show();
//       }
//       // On fait disparaître le menu sandwich sur grand écran
//     if(windowWidth > 600){
//       $(".menuSandwich").hide();
//     }
//   });
//   // Au clic le menu sandwich se déroule doucement
//   $(".menuSandwich").click(function( event ) { // on attache la fonction au click
//     $(".op-sectionlist").slideToggle('slow');
//   });
// });


/* ====== add class on pagination if the section is visible ====== */
  // $(document).scroll(function() {
  //   var cutoff = $(window).scrollTop() + 200; // on définit la position de déclenchement (*1)
  //   // Find current section and highlight nav menu
  //   var curSec = $.find('.current'); // on cherche l'élément (section) avec la class current
  //   var curID = $(curSec).attr('id'); // on récupère son ID
  //   var curNav = $.find('a[href=#'+curID+']'); // on cherche l'élément de navigation correspondant (*2)
  //   $('li .op-v-link').removeClass('active'); // on nettoie la navigation de la class active présente
  //   $(curNav).addClass('active'); // (*2) -> on ajoute la class active
  //   $('section').each(function(){
  //   if($(this).offset().top + $(this).height() > cutoff){ // si la section est dans le champ de scroll
  //   $('section').removeClass('current') // on nettoie les sections de la class current présente
  //   $(this).addClass('current'); // on ajoute la class current à la section visible
  //   return false; // on stoppe l’itération (le cas contraire, seule la derniere section se verra ajouter la class)
  //   }
  //   });
  });
