<!--
 * Created by Atom.
 * User: ceriani flavien
 * Date: 22/03/17
 * Time: 08:58
 -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Arène</title>
  </head>
  <link rel="stylesheet" href="arene.css" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
  <body>

    <!--######### intègre le logo dans la  navbar ########-->
    <!-- <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <img id="logo" src="images/fight.gif"> -->
              <!-- <h1>FIGHT < CODE ></h1>
            </div>--><!-- collapse -->
        <!-- </div>--><!-- container -->
    <!-- </nav>--><!-- navbar -->
    <!-- ######################################### -->

    <!-- lance le son au chargement de la page-->
    <audio id="audioPlayer">
      <source src="son.mp3">
    </audio>

<?php
include('Personnage.class.php');
session_start();
///MODE FACILE
if(!empty($_POST['facile'])){
    $_SESSION['facile'] = $_POST['facile'];
}
//MODE DIFFICILE
if(!empty($_POST['difficile'])){
    $_SESSION['difficile'] = $_POST['difficile'];
}
//NOM PERSONNAGE DU JOUEUR
if(!empty($_POST['id_joueur'])){
 $_SESSION['player1']= new Personnage($_POST['id_joueur']);
}
//NOM PERSONNAGE IA
if(!empty($_POST['id_ia'])){
 $_SESSION['player2']=new Personnage($_POST['id_ia']);
}

///////ATTRIBUTION DES VARIABLES DE SESSION////
$player1 = $_SESSION['player1'];
$player2 = $_SESSION['player2'];
$facile = $_SESSION['facile'];
$difficile = $_SESSION['difficile'];
$question = $_SESSION['question'];

//////TEST/////
var_dump($player1);
var_dump($player2);
var_dump($question);
var_dump($_SESSION['question']);
var_dump($facile);
var_dump($difficile);

?>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-24">
        <div class="arene col-md-18">
          <!-- <img id="arene" src="images/arène.jpg"> -->
          <video class="dragogg" width="100%" height="100%" controls="controls">
            <source src="drake.ogg" type="video/ogg" />
          </video>

          <!-- <video class="dragmkv" src="dragon02.mkv"> -->
          </div><!-- arene -->

          <div class="play col-md-6" id="play">
            <p id="placeholder"></p>
            <button id="button">ATTAQUE</button>
            <!-- <script src="de.js"></script> -->
            <!-- <script src="dice.js"></script> -->
              <script src="de.js"></script>
              <form id="form11" name="form11" method="post" action="arene.php?choix_attaque=attaque" >
                  <input type="button" class="button"  onclick="btnform();" value="Attaquer" autocomplete="off">
              </form>
              <form id="form1" name="form" method="post" action="arene.php?choix_attaque=potion" >
                  <input type="submit" class="button" value="Potion">
              </form>

            <?php
            $valeur_de=rand(1,6);
            $player1->attaque($valeur_de);
            $player1->defense($valeur_de);
            $player2->defense(rand(1,6));
            $player2->attaque(rand(1,6));
            ?>

          <div class="degat" id="valeur_de" hidden="true"><?php echo $valeur_de; ?></div>
            <div class="jeu">
            <?php
            echo " " . "<br>";
            echo "ROUND " . $_SESSION['compteur'] . " <br> ";

            if (!empty(@$_GET['choix_attaque'])){

              if ($_GET['choix_attaque'] == "attaque") {

                  if (!empty($facile)){
                    $_SESSION['compteur']++;
                    ?>
                    <script type="text/javascript">
                      de();
                    </script>
                    <?php
                    ////////////////////////////Phase attaque//////////////////////
                    echo "Phase Attaque" . "<br>";

                    echo $player1->getNom() . " a " . $player1->getAttaque() . " en attaque<br>";
                    echo $player2->getNom() . " a " . $player2->getDefense() . " en défense<br>";
                    $player2->subit_attaque($player1->getAttaque(), $player2->getDefense());
                    echo $player2->getNom() . " reçoit " . $player2->getDegat();


                    /////////Verification que l'adversaire soit toujours en vie//////
                    if ($player2->mort()) {
                      ?>
                      <script type="text/javascript">
                          alert("L'adversaire est K.O !");
                      </script>
                      <?php
                      echo $player2->_nom . " est K.O<br>";
                      $_SESSION = array();
                      //On détruit la session
                      session_destroy();
                      header('Refresh: 3; url=start.php');
                      ob_flush();
                    }
                    ?>
                    <script type="text/javascript">
                      // redirection_defense();
                      setTimeout("redirection_defense()", 2000);
                    </script>
                    <?php
                    header('Refresh: 2; url=arene.php?choix_attaque=defense');
                    ob_flush();
                  }else if(!empty($difficile) && $question !=null){

                      $_SESSION['compteur']++;
                      $_SESSION['question']=null;
                      ?>
                      <script type="text/javascript">
                        de();
                      </script>
                      <?php

                      ////////////////////////////Phase attaque//////////////////////
                      echo "Phase Attaque" . "<br>";

                      echo $player1->getNom() . " a " . $player1->getAttaque() . " en attaque<br>";
                      echo $player2->getNom() . " a " . $player2->getDefense() . " en défense<br>";
                      $player2->subit_attaque($player1->getAttaque(), $player2->getDefense());
                      echo $player2->getNom() . " reçoit " . $player2->getDegat();


                      /////////Verification que l'adversaire soit toujours en vie//////
                      if ($player2->mort()) {
                        ?>
                        <script type="text/javascript">
                            alert("L'adversaire est K.O !");
                        </script>
                        <?php
                        echo $player2->_nom . " est K.O<br>";
                        $_SESSION = array();
                        //On détruit la session
                        session_destroy();
                        header('Refresh: 3; url=start.php');
                        ob_flush();
                      }
                        // unset($_SESSION['question']);
                        echo "alors !!!!";
                        ?>

                        <script type="text/javascript">
                          redirection_defense();
                        </script>
                        <?php
                        header('Refresh: 2; url=arene.php?choix_attaque=defense');
                        ob_flush();
                    }
                        else{
                            echo "olala";
                            header('Location:question.php');
                            exit();
                        }
                  }

                    // echo $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
                    // echo $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";

                    else if ($_GET['choix_attaque'] == "defense") {
                        ///////////////////////////Phase defense/////////////////////
                        ?>
                        <script type="text/javascript">
                          de();
                          </script>
                          <?php
                          echo "Phase Defense" . "<br>";

                          echo $player2->getNom() . " a " . $player2->getAttaque() . " en attaque<br>";
                          echo $player1->getNom() . " a " . $player1->getDefense() . " en défense<br>";
                          $player1->subit_attaque($player2->getAttaque(), $player1->getDefense());
                          echo $player1->getNom() . " reçoit " . $player1->getDegat();

                          /////////Verification que l'adversaire soit toujours en vie//////
                          if ($player1->mort()) {
                            ?>
                            <script type="text/javascript">
                                alert("Votre personnage est K.O !");
                                </script>
                                <?php
                                echo $player1->_nom . " est K.O<br>";
                                $_SESSION = array();
                                // On détruit la session
                                session_destroy();
                                header('Refresh: 3; url=start.php');
                                ob_flush();
                              }
                              ?>
                              <script type="text/javascript">
                                // redirection_defense();
                                setTimeout("redirection_arene()", 2000);
                              </script>
                              <?php
                              header('Refresh: 5; url=arene.php');
                              ob_flush();
                            }
                            else if ($_GET['choix_attaque'] == "potion") {
                              $_SESSION['compteur']++;
                              ///////Mettre en place potion//////
                              echo "<br>Utilisation Potion !<br>";
                              if($player1->UsePotion($_SESSION['potion_joueur'])){
                                $_SESSION['potion_joueur'] -=1;
                              }
                              else {
                                  echo "plus de potion<br>";
                                }
                                ?>
                                <script type="text/javascript">
                                  // redirection_defense();
                                  setTimeout("redirection_defense()", 2000);
                                </script>
                                <?php
                                header('Refresh: 2; url=arene.php?choix_attaque=defense');
                                ob_flush();
                              }
                              else {

                              }

                            } //boucle if Empty

                          // echo $player1->getNom() . " a reçu " . $player1->getDegat() ;
                          // echo $player2->getNom() . " a reçu " . $player2->getDegat() ;
                          echo "<br>";
                          echo $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
                          echo $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";

                          //echo "Combat Terminé !!";
                          ?>
                          <!-- <form id="form11" name="form11" method="post" action="arene.php?choix_attaque=attaque" >
                              <input type="button" class="button"  onclick="btnform();" value="Attaquer" autocomplete="off">
                          </form>
                          <form id="form1" name="form" method="post" action="arene.php?choix_attaque=potion" >
                              <input type="submit" class="button" value="Potion">
                          </form> -->
                          </div><!-- jeu -->


                        <div class="gameplay">
                          <button type="button" class="btn btn-lg btn-primary rounded">Default</button>
                          <button type="button" class="btn btn-lg btn-primary rounded">Default</button>
                          <button type="button" class="btn btn-lg btn-primary rounded">Default</button>
                        </div><!-- gameplay -->


                    </div><!-- arene col-md-18 -->
                </div><!-- col-md-24 -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- section -->

    <footer class="section section-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-24" id="terminal">
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </footer>

    <script type="text/javascript">

    $(function() {
       $('#arene').hide();//j'utilise fadeOut pour la compatibilité avec le délai de fadeIn en dessous
       $('#play').hide();
       $('#terminal').hide();
    });

    $(function() {
       $('#arene').delay(1000).fadeIn(500);
       $('#play').delay(1500).fadeIn(500);
       $('#terminal').delay(2000).fadeIn(500);
    });

    </script> -->

  <!-- </body>
</html>
