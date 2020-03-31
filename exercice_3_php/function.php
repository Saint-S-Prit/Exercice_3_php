<?php

//Fonction qui permet de cacluler la longueur d'une chaine de caractères

function longeurCaractere($test)
    {
        for ($i=0; (isset($test[$i])); $i++)
        { 
            $i = $i + 1; 
        }
        return $i;
    }

function limiteCaractere($mot, $limite)
{
    $mot = longeurCaractere($mot);
    if ($mot < $limite) {
       return false;
    }
    else
    {
        return true;
    }
}


function is_entier($n)
{
	return ($n>0 || $n =='0');
}


function taille_chaine($chaine)
{
	$taill=0;
	for ($i=0;isset($chaine[$i]); $i++)
	{ 
		$taill ++;
	}
	return $taill;
}




function is_numeric2($chaine)
{
	$result = 1 ;
	if (isset($chaine))
	{
		for ($i=0; $i < taille_chaine($chaine); $i++)
		{ 
			if (is_entier($chaine[$i])!=1)
			{
                $result = 0;
            break;
			}
		}
	}
	return $result;
}





function is_Valide($chaine)
{
	for ($i=0; $i < taille_chaine($chaine); $i++)
	{ 
		if ( (!is_lower($chaine[$i])) && (!is_upper($chaine[$i])) )
		{
		return false;
		}
	}
	return true;
}




function is_lower($carac)
{
	return ($carac >='a' && $carac<='z');
}




function is_upper($carac)
{
	return ($carac >='A' && $carac<='Z');
}


function low_to_Up($carac)
{
	for ($fin=0,$i='a' ,$j='A';$fin<26 ; $i++,$j++,$fin++)
	{ 
		if ($carac == $i)
		{
			return $j;
		}
	}
}




function up_to_Low($carac){

	for ($fin=0,$i='a' ,$j='A';$fin<26 ; $i++,$j++,$fin++)
	{ 
		if ($carac == $j)
		{
			return $i;
		}
	}
}



function Invers_carc($carac)
{   
	for ($fin=0, $i='a' ,$j='A';$fin<26 ; $i++,$j++,$fin++)
	{ 
		if ($carac == $i)
		{
			return $j;
		}       
		if ($carac == $j)
		{
			return $i;
		}       
	}
	return $carac;
}



function inverse_chaine($chaine){
$chaineInver ="";
for ($i=0; $i < taille_chaine($chaine) ; $i++) { 
	$chaineInver=$chaineInver.Invers_carc($chaine[$i]);
}
return $chaineInver;
}


function my_trim($chaine)
{
	$chaineTrimer ="";
	for ($i=0; $i < taille_chaine($chaine); $i++)
		{ 
			if (is_lower($chaine[$i]) || is_upper($chaine[$i]))
			{
				$chaineTrimer = $chaineTrimer.$chaine[$i];
			}
		}
	return $chaineTrimer;
}

// verifie si un mot contient la lettre M
function verif($mot, $m, $M){
	for ($i=0; $i <=taille_chaine($mot) ; $i++) {
		if (isset($mot[$i])) {
			if ($mot[$i]==$M||$mot[$i]==$m) {
				return true;
			} 
		} 
	}
return false;
}
