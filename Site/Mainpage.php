<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Mainpage.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Ze Tournamente</title>
</head>
<body class="body">

<div id="Title">
<P style="text-align:center"><img src="https://see.fontimg.com/api/renderfont4/BWqOd/eyJyIjoiZnMiLCJoIjo3NSwidyI6MTAwMCwiZnMiOjc1LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiIzAwMDAwMCIsInQiOjF9/WmUgVG91cm5hbWVudGU/robus.png"></P>
</div>
<div id="contentlmao">
    <div id="main">
        <div id="menu">
            <div id="box"><a href="Créationjoueur.php" class="btn_menu">Création joueur</a></div>
            <div id="box"><a href="creationequipe.php" class="btn_menu">Création Equipe</a></div>
            <div id="box"><a href="Mainpage.php" class="btn_menuacceuil" ><img src="https://icon-library.com/images/home-logo-icon/home-logo-icon-0.jpg"></a></div>  
            <div id="box"><a href="ajoutermembreequipe.php" class="btn_menu ">Création Tournois</a></div>   
            <div id="box"><a href="tournois.php" class="btn_menu">Ze Tournamente</a></div> 
        </div>
        <div id="explication">
            <h1>Bienvenue sur notre Big Site de Tounamente</br></h1>
            <h3>Ici nous organisons des tournois internationaux afin de recolter des fonds et d'en faire don à l'association des "Codeurs Sans Ordi".</br> 
                Nous avons récolter près de 50 Miliards de centimes pour ces soyeux codeurs.</br>
                </br>
                Grâce à cette action, des codeurs sans ordi ont pu devenir bien plus heureux que vous auriez pu imaginer :</br></h3>
        </div>
        <div class="w3-content w3-display-container">
            <img class="mySlides" src="https://image.shutterstock.com/image-photo/young-focused-smart-programmer-working-260nw-1056775196.jpg" style="width:100%">
            <img class="mySlides" src="https://st3.depositphotos.com/1177973/17337/i/1600/depositphotos_173378778-stock-photo-male-programmer-working-in-office.jpg" style="width:100%">
            <img class="mySlides" src="https://media.istockphoto.com/photos/portrait-of-young-startup-businessman-sitting-in-small-modern-office-picture-id1040913300?k=20&m=1040913300&s=612x612&w=0&h=cXYgnxsht2DA3dZShBrQV86rtZEJgeBa1y0FH-D7XRU=" style="width:100%">
            <img class="mySlides" src="https://st4.depositphotos.com/3396639/20865/i/1600/depositphotos_208651658-stock-photo-portrait-cheerful-male-software-developer.jpg" style="width:100%">
            <img class="mySlides" src="https://thumbs.dreamstime.com/b/confident-hispanic-software-developer-tying-keyboard-smiling-young-latin-male-freelance-programmer-sitting-technology-160369322.jpg" style="width:100%">
        </div>
        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 3000); // Change image every 2 seconds
            }
        </script>

    </div>
</div>
</body>
</html>