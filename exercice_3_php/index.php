<?php
require_once('function.php');

    if (isset($_POST['valider'])) {
        $nbr_input = $_POST['nbr_input'];

        if (!empty($nbr_input))
        {
            $chiffre = is_numeric2($nbr_input);
            if(isset($chiffre))
            {
                
                for ($i=0; $i < $nbr_input ; $i++)
                {
                    
                    $champs_input[] =  '<input type="text" name="input_'.$i.'">';
                }
            }
            else
            {
                $erreurs = "veuillez entrez un chiffre";
            }
        }
        else
        {
            $erreurs = "veuillez remplir le champs !";
        }
            
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<fieldset class="fiel1">
    <legend>
        Combien de Mots
    </legend>
    <form action="" method="post">
        <input type="text" name="nbr_input" id=""> <br><br>
        <input type="submit" name="valider" class="valider" value="Valider">
        <input type="reset" name="annuler" class="annuler" value="Annuler">
    </form>
    <?php
        if (isset($erreurs)) {
            echo "<p class='erreurs'>".$erreurs."</p>";
        }
    ?>
</fieldset>









<?php
    if (!empty($champs_input))
    {
        ?>
            <fieldset class="fiel2">
                <form action="" method="post">
                <?php
                    foreach ($champs_input as $key => $input)
                    {
                        $key = $key +1;
                        $val = $input;
                        ?>
                            <p>
                                <label for="">
                                    Mot N°: <?= $key ?>
                                </label><br>
                                <?= $input ?>
                            </p><br>
                        <?php
                    }
                ?>

                <input type="submit" class="resultat" value="résultat">
                </form>
            </fieldset>
        <?php 
    }  

?>

</body>
</html>

<?php
            if (!empty($_POST['input_0']))
            {
               
                $i= 0; 
                $compt = 0;
                 while (isset($_POST['input_'.$i])) 
                {
                    $val= $_POST['input_'.$i];
                    
                    if (!limiteCaractere($val, 20))
                    {
                        $verif = is_numeric2($val);
                        if (empty($verif))
                        {
                            
                            if (is_Valide($val)) {
                                   if (empty($err)) {
                                    
                                    if (verif($val, "m", "M"))
                                    {
                                        $compt = $compt +1;
                                        $champs_input[] = '<p><input value="'.$val.'" type="text" name="input_'.$i.'">';
                                    }
                                    else
                                    {

                                        $champs_input[] = '<p><input value="'.$val.'" type="text" name="input_'.$i.'">';
                                    }
                                   }
                                   
                                
                                    
                            }
                            else
                            {
                                $err = '<span style="color:red">(Des lettres uniquement)</span><br>';

                                $champs_input[] =  $err.'<input value="'.$val.'" type="text" name="input_'.$i.'">';
                            }
                            
                        }
                        else
                        {
                            $err = '<span style="color:red">(Des lettres uniquement)</span><br>';

                            $champs_input[] =  $err.'<input value="'.$val.'" type="text" name="input_'.$i.'">';
                        }
                        
                    }
                    else
                    {
                        
                        $err = '<span style="color:red">(Le mot ne doit pas depasser 20 caractères)</span><br>';

                        $champs_input[] =  $err.'<input value="'.$val.'" type="text" name="input_'.$i.'">';
                    }
                        
                    $i++;
                }
                


                ?>
                <fieldset class="fiel2">
                    <form action="" method="post">
                    <?php
                        foreach ($champs_input as $key => $input)
                        {
                            $key = $key +1;
                            ?>
                                <p>
                                    <label for="">
                                        Mot N°: <?= $key ?>
                                    </label>

                                    <?= $input ?>
                                </p>
                            <?php
                        }
                        
                    ?>

                    <input type="submit" class="resultat" value="Résultat">
                    </form>
                </fieldset>
            <?php 

            if (isset($compt) && $compt != 0 && empty($err))
            {
                echo "<p class='resultat_final'>Vous avez saisi ".longeurCaractere($champs_input)." Mot(s) dont <span class='nombre_m'>".$compt. " avec la lettre M  </span></p>";
            }

            }
?>