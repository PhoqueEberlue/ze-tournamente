<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Mainpage.css"/>
    <title>Ze Tournamente</title>
</head>
<body class="body">

<div id="Title">
<P style="text-align:center"><img src="https://see.fontimg.com/api/renderfont4/BWqOd/eyJyIjoiZnMiLCJoIjo3NSwidyI6MTAwMCwiZnMiOjc1LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiIzAwMDAwMCIsInQiOjF9/WmUgVG91cm5hbWVudGU/robus.png"></P>
</div>
<div id="contentlmao">
    <div id="main">
    <div id="menu">
            <div id="box"><a href="form_player.php" class="btn_menu">Création joueur</a></div>
            <div id="box"><a href="form_equipe.php" class="btn_menu">Création Equipe</a></div>
            <div id="box"><a href="Mainpage.php" class="btn_menuacceuil" ><img src="https://icon-library.com/images/home-logo-icon/home-logo-icon-0.jpg"></a></div>  
            <div id="box"><a href="form_add_team.php" class="btn_menu ">Création Tournois</a></div>   
            <div id="box"><a href="tournament.php" class="btn_menu">Ze Tournamente</a></div> 
        </div>
        

    </div>
</div>



<form action="form.php" method="post">
        <form-panel id ="panel">
            <form-header id="Formheader">
                <h3>Ajout d'une equipe :</h3>
            </form-header>

            <form-content>
                <form-group class="group">
                    <label for="nomTeam">Nom de l'équipe:</label>
                    <input type="text" name="NomTeam" id="NomTeam" />
                </form-group>
            
                <form-group class="group" id="Choix">
                    <select name="activite" id="activite">
                    <option value="">Choisir une activité</option>
                    </select>
                </form-group>

                <form-group class="group">
                    <input type="submit" name="btn1" value="Ajouter" />
                </form-group>
            </form-content>
        </form-panel>
    </form>


    
    <form action="form.php" method="post">
        <form-panel id ="panel">
            <form-header id="Formheader">
                <h3>Ajout d'une activité :</h3>
            </form-header>
        
            <form-content>
                <form-group class="group">
                    <label for="nomActivite">Nom :</label>
                    <input type="text" name="nomActivite" id="nomActivite" />
                </form-group>

                <form-group class="group">
                    <input type="submit" name="btn3" value="Ajouter" />
                </form-group>
            </form-content>
        </form-panel>
    </form>
</body>
</html>