<?php
header('Access-Control-Allow-Origin: *');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("../api/header.php")?>
</head>
<body>
    
    
    <form id="formLogin">
        <img style="width:40%;margin-bottom:50px;" src="dist/assets/img/logo2-w.png" alt="">
        <div class="text1"><input type="text" style="border-radius: 10px;  padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid #fdb10e;font-weight:500; font-family 'open-sans'"  placeholder="username" name="username"></div>
        <div class="text2"><input type="password" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid #fdb10e;font-weight:500; font-family 'open-sans'"  placeholder="password" name="password"></div>
        <div class="text3"><input type="submit" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid black; background-color:#fdb10e;font-weight:500;" value="LOGIN"></div>
        <button>S'enregistrer</button>
    </form>
    <form id="formSignup">
        <div class="text4"><input type="text" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid #fdb10e;font-weight:500; font-family 'open-sans'"  placeholder="Prenom" name="name"></div>
        <div class="text5"><input type="text" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid #fdb10e;font-weight:500; font-family 'open-sans'"  placeholder="Nom" name="lastname"></div>
        <div class="text6"><input type="text" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid #fdb10e;font-weight:500; font-family 'open-sans'"  placeholder="Email" name="email"></div>
        <div class="text7"><input type="text" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid #fdb10e;font-weight:500; font-family 'open-sans'"  placeholder="username" name="username"></div>
        <div class="text8"><input type="password" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid #fdb10e;font-weight:500; font-family 'open-sans'"  placeholder="password" name="password"></div>
        <div class="text9"><input type="submit" style="border-radius: 10px; padding:6px; width:50%; text-align:center; margin-bottom:10px; border:2px solid black; background-color:#fdb10e;font-weight:500;" value="S'enregistrer"></div>
        <button>S'enregistrer</button>
    </form>
    
    <section id="main">
            <header id="navbarVelo">
                <div id="mySidenav" class="sidenav">
                    <div class="sidebarProfil">
                        <div class="row">
                        <div class="col-3">
                            <div class="imageProfil"></div>
                        </div>
                        <div class="col-9">
                            <h3><div id="profilUsername"></div></h3>
                            <p>Crédit : 0.00 €</p>
                        </div>
                        </div>
                    </div>
                <div class="buttonSidenav">
                    <a href="#">Carte</a>
                    <a href="#">Mes factures</a>
                    <a href="#">Shop</a>
                    <a href="#">Paramètres</a>
                    <a href="#">Paiement</a>
                    <a href="#">Aide</a>
                </div>
                </div>
                <div class="col-1">
                <span ><i class="fas fa-bars"></i></span>
                </div>
                <div class="col-10">
                <img style="width:10%; text-align:center; padding-bottom:5px;" src="dist/assets/img/logo2-w.png" alt="">
                </div>
            </header>
        <div id="map"></div>
    </section>
    <?php include_once("../api/scripts.php")?>
</body>
</html>