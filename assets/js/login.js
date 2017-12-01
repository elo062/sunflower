
$(document).ready(function(){

    var $prenom = $('#prenom'),
        $password = $('#password'),
        $vpassword = $('#vpassword'),
        $email = $('#email'),
        $saisie = $(".saisie"),
        $erreur = $(".erreur"),
        $btn = $('#btn');


        function verifier(champ){
            if(champ.val() == ""){ // si le champ est vide
                $erreur.html("Vous n'avez rempli correctement un champ."); // on affiche le message d'erreur
                champ.css({ // on rend le champ rouge
                    borderColor : 'red',
                    color : 'red'
                });
                return false;
            }
            else{
                return true;
            }
        }

            $vpassword.keyup(function(){
                if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
                    $(this).css({ // on rend le champ rouge
                        borderColor : 'red',
        	        color : 'red'
                    });
                 }
                 else{
                     $(this).css({ // si tout est bon, on le rend vert
        	         borderColor : 'green',
        	         color : 'green'
        	     });
                 }
            });

            $vpassword.keyup(function(){
                if($(this).val() != $password.val()){ // si la confirmation est différente du mot de passe
                    $(this).css({ // on rend le champ rouge
             	    borderColor : 'red',
                	color : 'red'
                    });

                }
                else{
        	    $(this).css({ // si tout est bon, on le rend vert
        	    borderColor : 'green',
        	    color : 'green'
        	    });
                }
            });


            $btn.click(function(e){
                e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
                // puis on lance la fonction de vérification sur tous les champs :
                verifier($prenom);
                verifier($password);
                verifier($vpassword);
                verifier($email);
                if(verifier($prenom) && verifier($password) && verifier($vpassword) && verifier($email)){
                    $('#monFormulaire').submit();
                }
            });
});
