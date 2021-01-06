<!DOCTYPE html>
<head>
    <meta charset='utf-8' />
    <title>Mon forum pas fini !</title>
    
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<head>
<body>
 <h1>Bienvenue sur mon super forum ! Il est presque fini. Et par "presque" j'entends "pas du tout" !</h1>
    
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
                <td><input name="article" type="submit" value="<?php echo $v->nom; ?>"></td>
                <input name="topic" type="hidden" value="<?php echo $v->id; ?>">
                <input type="hidden" name="action" value="afficheArticle">
            </form>

        <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
        ?>
            <form method="post" id = "suppr">
                <td><input name="supprArticle" type="submit" value="supprimer"></td>
                <input name="topic" type="hidden" value="<?php echo $v->id; ?>">
                <input type="hidden" name="action" value="supprArticle">
            </form>
        <?php
        }
        ?>
        </div>
    <?php 
    }
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
        ?>

            <form method="post" id = "ajoutT">
                <td><input type="submit" value="nouveau"></td>
                <input type="hidden" name="action" value="ajoutArticle">
            </form>

        <?php
        }
        ?>
         
    </div>
</body>
</html>


    
