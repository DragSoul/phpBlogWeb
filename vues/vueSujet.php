<!DOCTYPE html>
<head>
    <meta charset='utf-8' />
    <title>Mon super forum !</title>
    
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<head>
<body>
<?php
if (isset($dVue))
{?>
<a href="vueP.php">retour</a> <!--                      RETOUR                            -->
 <h1><?php echo $dVue['article'][0];?></h1>
    <div id="Cforum">
    <?php
        if(isset($_SESSION['role'])){
            echo 'Bienvenue, '.$_SESSION['login'];?>
            
            <form method="post" id="deconnexion">
                <td><input type="submit" value="Deconnexion"></td>
                <input type="hidden" name="action" value="deconnexion">
            </form>
        <?php
        }
        else{?>
            <form method="post" id="connexion">
                <td><input type="submit" value="Connexion"></td>
                <input type="hidden" name="action" value="connexion">
            </form>
            <form method="post" id="inscription">
                <td><input type="submit" value="Inscription"></td>
                <input type="hidden" name="action" value="inscription">
            </form>
        <?php
        }
        foreach($dVue['rep'] as $v){
            ?>
            <div class="post">
                <h3><?php echo $v[0];?></h3>
                <p><?php echo $v[1];?></p>
            </div>


            <?php 
            if(isset($_SESSION['role'])){
            ?>
                <form method="post">
                    <textarea name="article" placeholder="Contenu du sujet..."></textarea><br>
                    <input type="hidden" name="action" value="repondre">
                    <input type="hidden" name="topic" value="<?php echo $_REQUEST['topic'];?>">
                    <input type="submit" value="envoyer" />
                    <?php 
                    if(isset($erreur)){
                        echo $erreur;
                    }
                    ?>
                </form >   
            <?php
            }
            
        }
        ?>
        
         
    </div>
    <?php
    }
    ?>    
</body>
</html>