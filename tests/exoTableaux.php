<?php
//Exercice 1 :
//1. créer un tableau $tabCouleur indexé avec les valeurs suivantes :
//•	rouge
//•	vert
//•	bleu
//•	jaune
//•	rouge
//2. afficher la valeur du tableau à l’index 1, ce doit être normalement vert

$tabCouleur = array("rouge", "vert", "bleu", "jaune", "rouge");
echo $tabCouleur[1];

//3. déclarer une variable $compteRouge à 0. Parcourir le tableau et à chaque fois que la valeur de l’élément en cours de lecture est égale à rouge, ajouter 1 à $compteRouge. A la fin du programme afficher "Il y a $compteRouge élément rouge dans le tableau".

$compteRouge = 0;
for ($i=0; $i<count($tabCouleur); $i++){
//        $compteRouge+=$tabCouleur[$i]=="rouge";
//    si l'élément est rouge alors je l'ajoute au compteur
    if($tabCouleur[$i]=="rouge"){
        $compteRouge++;
    }
}
echo "<br/>Il y a " . $compteRouge . " élément(s) rouge dans le tableau.<br/>";
// JE SAIS PAS SI C'EST BON !


//Exercice 2 :
//Que fait ce programme ?
//$tab = array() ;
//$i = 0 ;
//for($i = 0 ; $i < 5 ; $i++) {
//    $tab[$i] = $i * $i ;
//}
//for($i = 0 ; $i < 5 ; $i++) {
//    echo $tab[$i] ;
//}

// On déclare un tableau qui ne comptient pas de valeur.
// Avec le 1ère boucle on ajoute 1 à chaque passage jusqu'à arriver à 5. Et on multiplie le résultat par le résultat.
// 0x1 = 0 (la boucle continue...)
// 1x1 = 1
// 2x2 = 4
// 3x3 = 9
// 4x4 = 16 -> on sort de la boucle
// Avec la 2ème boucle on parcourt le tableau et on l'affiche.
// NOTES : J'AVAIS REUSSI A MOITIE : JE N'AVAIS PAS COMMENCE A 0 MAIS A 1 (ET JE N'AVAIS PAS COMPRIS QUE LA 2EME BOUCLE SERVAIT JUSTE A AFFICHER LE RESULTAT DE LA 1ERE.)




//Exercice 3 :
//Que fait ce programme ?
//$tab = array() ;
//$tab[0] = 1 ;
//$i = 0 ;
//for($i = 1 ; $i < 6 ; $i++) {
//    $tab[$i] = $tab[ $i-1] +2;
//}
//for($i = 0 ; $i < 5 ; $i++) {
//    echo $tab[$i] ;
//}

// On déclare un tableau qui ne comptient pas de valeur.
// On indique que la 1ère valeur du tableau(donc à l'indice 0) est égale à 1.
// On démarre la boucle à l'index 0.
// Dans la 1ère boucle on parcourt le tableau (on démarre la boucle à 1) en ajoutant 1 à i pour aller à l'index suivant du tableau. Une fois arrivé au 5ème tour de boucle on sort.
// Donc on retire 1 à i (ce qui donne 0) et on ajoute 2 à la valeur du tableau (qui est 1).
// Ce qui donne :
// 1er tour : On démarre à 1
// 2è tour : 1 + 2 = 3
// 3è tour : 3+2 = 5
// 4è tour : 5+2 = 7
// 5è tour : 7+2 = 9
// Dans la 2ème boucle on démarre à 0 et on parcourt le tableau jusqu'à arriver au 4ème tour de boucle en ajoutant 1 à i pour aller à l'index suivant du tableau.
// Et on affiche le résultat : 13579
// NOTES : JE N'AVAIS PAS COMPRIS : JE PENSAIS QU'A CHAQUE PASSAGE DE LA BOUCLE ON RETIRAIT 1 A i AU LIEU D'1 SEULE FOIS; DU COUP J'AVAIS TROUVE QQCH COMME 1-1=0+2=2 ; 2-1=1+2=3 ; ETC.




//Exercice 4  :
//1. écrire un tableau $tabNotes de 9 notes (de cours) :
$tabNotes=array(10, 15, 20, 16, 8, 11, 6, 12, 11);
//2. On veut pouvoir connaître la moyenne des notes.
//Pour cela, le calcul est égal à la somme des valeurs divisée par le nombre de notes.
//Il faut avant tout créer une variable $somme à 0 et une variable $nbNotes à 1.

$somme = 0;
$nbNotes = 1;

//Puis, il faut donc parcourir le tableau et additionner chaque valeur du tableau dans une variable $somme.
//De plus, il faut additionner à chaque valeur 1 à $nbNotes.

for($i=0; $i<count($tabNotes);$i++){
    $somme=$somme+$tabNotes[$i];
    $nbNotes=count($tabNotes);
}
//Une fois le tableau parcouru, il faut diviser $somme par $nbNotes.
//Si on met 9 directement, on ne permet pas l’ajout de nouvelles notes.
$moyenne = $somme/$nbNotes;
//Une fois la moyenne obtenue l’afficher.
echo $moyenne . "<br/>";

// Autre méthode :
//$somme = array_sum($tabNotes);
//$nbNotes = count($tabNotes);
//$moyenne = $somme/$nbNotes;
//echo $moyenne;

// NOTES : JE SAIS BIEN QUE CE N'EST PAS CE QUE TU ATTENDAIS MAIS JE N'AI PAS COMPRIS LA PARTIE "il faut additionner à chaque valeur 1 à $nbNotes"; DU COUP J'AI FAIT DE MON MIEUX AVEC 2 METHODES DIFFERENTES;




//Exercice 5 :
//1. Que fait ce programme ?
//$tab = array() ;
//$i = 0 ;
//for($i = 0 ; $i < 5 ; $i++) {
//    $tab[$i] = $i * $i;
//}
//for($i = 0 ; $i < 5 ; $i++) {
//    echo $tab[$i] ;
//}
// On déclare un tableau. On dit qu'il commence à l'index 0.
// On le parcourt 5 fois en ajoutant 1 à i pour aller à l'index suivant du tableau.
// A chaque fois on multiplie le résultat par lui-même.
// Dans la 2è boucle on affiche le résultat du parcourt de boucle :
// 1er tour : 0x0 = 0
// 2è tour : 1x1 = 1
// 3è tour : 2x2 = 4
// 4è tour : 3x3 = 9
// 5è tour : 4x4 = 16

//2. Peut-on simplifier cet algorithme avec le même résultat ? Si oui, écrire le nouveau code.
// oui :
$tab = array() ;
for($i = 0 ; $i < 5 ; $i++) {
    $tab[$i] = $i * $i;
    echo $tab[$i];
}


//Exercice 6 (algorithme)
$tab1=array(4, 8, 7, 9, 1, 5, 4, 6);
$tab2=array(7, 6, 5, 2, 1, 3, 7, 4);

// J'AVAIS ESSAYE PLUSIEURS TRUCS MAIS CA N'AVAIT PAS MARCHE /

//$result=$tab1[$i]+$tab2[$i];
//echo "<br/>" . $result;

//$result = array_merge($array1, $array2);
//
//$result=array_merge($tab1[$i]+$tab2[$i]);
//echo "<br/>" . $result[$i];

// ALORS J'AI ESSAYE TROUVE CA ET CA A MARCHE (https://www.jeuweb.org/showthread.php?tid=7519):


$result= array_fusion_and_add($tab1,$tab2);
//var_dump($result);
// Voilà ce que je comprends : je crée une fonction qui prend en paramètre les variables des tab1 et tab2
function array_fusion_and_add($tab1,$tab2) {
    // La boucle parcourt le tab1 et récupère ses valeurs
    foreach($tab1 as $k => $v) {
        // Si le tab2 possède également des valeurs on les additionne à celles de tab1
        if(isset($tab2[$k])) $tab2[$k] += $v;
    }
    return $tab2;
}
// On parcourt le tableau result pour afficher la somme des tab1 et tab2
for($i=0;$i<count($result);$i++){
    echo "<br/>" . $result[$i];
}


//Exercice 7 :
//
//Reprendre l’Exercice 4 et faire en sorte d’afficher la meilleure note.

echo max($tabNotes);