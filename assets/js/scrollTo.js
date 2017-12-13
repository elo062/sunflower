// Une fois que le doc est chargé
$(document).ready(function () {
    // On ajoute un évènement click sur les liens du menu
$("#op-horizontalnav .op-v-link").click(function() {
    // On récupère le lien de l'élément cliqué
    var lienClique = $(this).attr('href');
    // On récupère la position de l'élément "#"
    var indexAnchor = lienClique.indexOf("#");
    // On récupère l'id de la section sur laquelle on veut se positionner(à partir de "#")
    var anchor = lienClique.substring(indexAnchor);

// On scroll avec une animation lente
    $('html,body').animate(
        {
            // En retirant la hauteur du menu pour voir correctement la section
            scrollTop: $(anchor).offset().top - $( "#op-horizontalnav" ).height()

},
        'slow');
})
}) ;

