<?php

function eval_expr($expr)
{   
   // $rio = explode("+",$expr);
   //$ma =  $rio[0]+$rio[1];
   
  // $mb=0;
   //for($i=0; $i < count($rio); $i++)
   //{
   // //$mb += $rio[$i];
   // //$calcul =  $rio[$i]+ $rio[$i];
   // //echo $calcul;
   //  //var_dump( $rio[$i]);
   //  //var_dump( $rio[$i]);
   //}
   $tableau = [];
   $nombre = [];
   $NEWTABLEAU=[];
   
   array_push($tableau,$expr);

   $nombreDeCaractereDansEXPR = strlen($expr);
   
   for($i=0;$i < $nombreDeCaractereDansEXPR; $i++)
   {
     if($tableau[0][$i]=="0" ||$tableau[0][$i]=="1" || $tableau[0][$i] =="2"|| $tableau[0][$i]=="3"||$tableau[0][$i]=="4"||$tableau[0][$i]=="5"||$tableau[0][$i]=="6"||$tableau[0][$i]=="7"||$tableau[0][$i]=="8"||$tableau[0][$i]=="9")
     {
        array_push($nombre,$tableau[0][$i]);
     }
     else
     {
        $limplode = implode("",$nombre); // si il trouve un operateur il push les element deja present dans le tableau en tant que chaine de caractere
        array_push($NEWTABLEAU,$limplode);
        $nombre =[]; // vide le tableau pour pas qu'il push tout 15jours

        array_push($NEWTABLEAU,$tableau[0][$i]); 
     }
   }
   $limplode = implode("",$nombre);
    array_push($NEWTABLEAU,$limplode);

        calcul($NEWTABLEAU); 
}
function calcul($NEWTABLEAU)
{   
    for($compteur=0;$compteur < count($NEWTABLEAU);$compteur++)
        {
            echo "$compteur\n";
            //var_dump($NEWTABLEAU);
            if(isset($NEWTABLEAU[$compteur]) && $NEWTABLEAU[$compteur] == "*")
           { // a mettre dans une boucle for pour qu'elle passe en prio
            //var_dump($NEWTABLEAU);
            // vide mon tableau newtableau(enfin juste le - le[-1]et le [+1] car il a ete use) et met le resultat dans le result
            $result = $NEWTABLEAU[$compteur-1] * $NEWTABLEAU[$compteur+1];
             array_splice($NEWTABLEAU,$compteur-1,3,"$result"); //1argument le tableau 2argument d'ou on commence 3argument nombre d'elemnt qu'on prend, 4eme par quoi on le remplace 
           }
           if(isset($NEWTABLEAU[$compteur]) && $NEWTABLEAU[$compteur] == "%" )
           {
            //var_dump($NEWTABLEAU);
            // vide mon tableau newtableau(enfin juste le - le[-1]et le [+1] car il a ete use) et met le resultat dans le result
            $result = $NEWTABLEAU[$compteur-1] % $NEWTABLEAU[$compteur+1];
             array_splice($NEWTABLEAU,$compteur-1,3,"$result"); //1argument le tableau 2argument d'ou on commence 3argument nombre d'elemnt qu'on prend, 4eme par quoi on le remplace 
           }
           if(isset($NEWTABLEAU[$compteur]) && $NEWTABLEAU[$compteur] == "/")
           {
           var_dump($NEWTABLEAU);
            // vide mon tableau newtableau(enfin juste le - le[-1]et le [+1] car il a ete use) et met le resultat dans le result
            $result = $NEWTABLEAU[$compteur-1] / $NEWTABLEAU[$compteur+1];
             array_splice($NEWTABLEAU,$compteur-1,3,"$result"); //1argument le tableau 2argument d'ou on commence 3argument nombre d'elemnt qu'on prend, 4eme par quoi on le remplace  
           }
          // var_dump($NEWTABLEAU);
        }
        for($compteur=0;$compteur < count($NEWTABLEAU);$compteur++)
        {
            if(isset($NEWTABLEAU[$compteur]) && $NEWTABLEAU[$compteur] == "-")
           {
           var_dump($NEWTABLEAU);
            // vide mon tableau newtableau(enfin juste le - le[-1]et le [+1] car il a ete use) et met le resultat dans le result
            $result = $NEWTABLEAU[$compteur-1] - $NEWTABLEAU[$compteur+1];
             array_splice($NEWTABLEAU,$compteur-1,3,"$result"); //1argument le tableau 2argument d'ou on commence 3argument nombre d'elemnt qu'on prend, 4eme par quoi on le remplace  
           }
           if(isset($NEWTABLEAU[$compteur]) && $NEWTABLEAU[$compteur] == "+")
           {
           var_dump($NEWTABLEAU);
            // vide mon tableau newtableau(enfin juste le - le[-1]et le [+1] car il a ete use) et met le resultat dans le result
            $result = $NEWTABLEAU[$compteur-1] + $NEWTABLEAU[$compteur+1];
             array_splice($NEWTABLEAU,$compteur-1,3,"$result"); //1argument le tableau 2argument d'ou on commence 3argument nombre d'elemnt qu'on prend, 4eme par quoi on le remplace  
           }
        }
        if(count($NEWTABLEAU)>1)
        {
            calcul($NEWTABLEAU);
        } else
        echo $result;    
}
//3 Probleme a demande a charlelie 
// 1 pour le result copie le dernier et l'avant dernier 
// pourquoi il y une erreur lors de la 2eme iteration 
// pourquoi si j'utilise pas un - et un + ça fonctionne pas