<!DOCTYPE html>
<head>
    <meta charset='utf-8' />
    <title>Mon super forum !</title>
    
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<head>
<body>
 <h1>Bienvenue sur mon super forum !</h1>
    
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
    foreach($dVue as $v){
        ?>
        <div class="categories">
            <form method="post" id = "ajoutT">
                <td><input class="topic" name="topic" type="submit" value="<?php echo $v->name; ?>"></td>
                <input type="hidden" name="action" value="afficheSujet">
                
            </form>
        </div>
    <?php 
    }
        if(isset($_SESSION['role'])){
        ?>

            <form method="post" id = "ajoutT">
                <td><input type="submit" value="nouveau"></td>
                <input type="hidden" name="action" value="ajoutSujet">
            </form>

        <?php
        }
        ?>
         
    </div>
</body>
</html>


    
