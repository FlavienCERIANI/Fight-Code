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
 $_SESSION['player1']= serialize(new Personnage($_POST['id_joueur']));
}
//NOM PERSONNAGE IA
if(!empty($_POST['id_ia'])){
 $_SESSION['player2']=serialize(new Personnage($_POST['id_ia']));
}

///////ATTRIBUTION DES VARIABLES DE SESSION////
$player1 = unserialize($_SESSION['player1']);
$player2 = unserialize($_SESSION['player2']);
$facile = $_SESSION['facile'];
$difficile = $_SESSION['difficile'];
$question = $_SESSION['question'];

//////TEST/////
var_dump($player1);
var_dump($player2);
var_dump($_SESSION['player1']);
var_dump($_SESSION['player2']);
// var_dump($question);
// var_dump($_SESSION['question']);
// var_dump($facile);
// var_dump($difficile);

?>
<script src="de.js"></script>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-24">
        <div class="arene col-md-18">
          <img id="arene" src="images/arène.jpg">
          <div class="" id="video"></div>
          </div><!-- arene -->

          <div class="play col-md-6" id="play">
            <p id="placeholder"></p>  <!--valeur du de -->

              <?php
              if(!empty($facile)){ //si aucun choix d'attaque n'est sélectionner alors le bouton apparaît
                ?>
              <form id="form11" name="form11" method="post" action="arene.php?choix_attaque=attaque" >
                  <!-- <input type="button" class="button"  onclick="btnform();" value="Attaquer" autocomplete="off"> -->
                  <button type="button" id="boutatak" class="btn btn-lg btn-primary rounded" onclick="redirection_attaque();">Attaque</button>
              </form>
              <?php
              }

              if(!empty($difficile)){ //si aucun choix d'attaque n'est sélectionner alors le bouton apparaît
                ?>
              <form id="form12" name="form12" method="post" action="arene.php?choix_attaque=attaque" >
                  <!-- <input type="button" class="button"  onclick="btnform();" value="Attaquer" autocomplete="off"> -->
                  <button type="button" id="boutatak2" class="btn btn-lg btn-primary rounded" onclick="redirection_question();">Attaque</button>
              </form>
              <?php
              }

              if($_SESSION['potion_joueur']==1){ //si la potion est déjà utilisé le bouton n'apparait plus
                ?>
              <form id="form13" name="form13" method="post" action="arene.php?choix_attaque=potion" >
                  <!-- <input type="submit" class="button" value="Potion"> -->
                  <button type="button" id="boutpotion" class="btn btn-lg btn-primary rounded" onclick="redirection_potion();">Potion</button>
              </form>
              <?php
            }


            //valeur du dé
            $valeur_de=rand(1,6);
            $player1->attaque($valeur_de);
            $player1->defense($valeur_de);
            $player2->defense(rand(1,6));
            $player2->attaque(rand(1,6));
            ?>


          <div class="degat" id="valeur_de" hidden="true"><?php echo $valeur_de; ?></div>
          <div class="degat" id="nom_joueur" hidden="true"><?php echo $player1->getNom(); ?></div>
          <div class="id_session" id="id_session" hidden="true"><?php echo session_id(); ?></div>
          <div class="degat" id="nom_ia" hidden="true"><?php echo $player2->getNom(); ?></div>
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
                      de();  //affichage du dé
                      setVideo("attaque"); ///lancement de la video
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
                        redirection_start();
                      </script>
                      <?php
                    }
                    ?>
                    <script type="text/javascript">
                      setTimeout("redirection_defense()", 7000);
                    </script>
                    <?php

                  }else if(!empty($difficile) && $question !=null){  //PHASE ATTAQUE EN MODE DIFFICILE

                      $_SESSION['compteur']++;
                      $_SESSION['question']=null;
                      ?>
                      <script type="text/javascript">
                        de();
                        setVideo("attaque"); ///lancement de la video
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
                        // $_SESSION = array();
                        // //On détruit la session
                        // session_destroy();
                        ?>
                        <script type="text/javascript">
                          redirection_start();
                        </script>
                        <?php
                      }

                        ?>
                        <script type="text/javascript">
                          setTimeout("redirection_defense()", 7000);
                        </script>
                        <?php

                    }
                        else{ //si mode difficile et premier clic sur bouton attaque
                            ?>
                            <script type="text/javascript">
                              redirection_question();
                            </script>
                            <?php
                        }
                  }


                    else if ($_GET['choix_attaque'] == "defense") {
                        ///////////////////////////Phase defense/////////////////////
                        ?>
                        <script type="text/javascript">
                          de();
                          setVideo("defense"); ///lancement de la video
                          </script>
                          <?php
                          echo "Phase Defense" . "<br>";

                          // echo $player2->getNom() . " a " . $player2->getAttaque() . " en attaque<br>";
                          // echo $player1->getNom() . " a " . $player1->getDefense() . " en défense<br>";
                          // $player1->subit_attaque($player2->getAttaque(), $player1->getDefense());
                          // echo $player1->getNom() . " reçoit " . $player1->getDegat();

                          /////////Verification que l'adversaire soit toujours en vie//////
                          if ($player1->mort()) {
                            ?>
                            <script type="text/javascript">
                                alert("Votre personnage est K.O !");
                                redirection_start();
                                </script>
                                <?php

                              }
                              ?>
                              <script type="text/javascript">
                                setTimeout("redirection_arene()", 7000);
                              </script>
                              <?php
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
                                  setVideo("potion"); ///lancement de la video
                                  setTimeout("redirection_defense()", 4000);
                                </script>
                                <?php
                              }
                              else {

                              }

                            } //boucle if Empty

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
                    </div><!-- arene col-md-18 -->
                </div><!-- col-md-24 -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- section -->

    <footer class="section section-primary">
        <div class="container">
            <div class="row">
                <div class="terminal col-md-24" id="terminal">
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </footer>

    <!-- creation du bouton continue qui va rediriger sur start2.php-->
    <div class="continue">
      <button type="button" onclick="redirFunction()" class="bouton btn btn-lg btn-warning"
      id="continue">CONTINUE ?</button>
    </div><!-- continue -->

    <script type="text/javascript">

      $(document).ready(function() {
        $('.continue').hide();
        $('#terminal').text($('.arene').html());
      });
      // if($(this).attr('auteur')){
      // // ... l'afficher.
      //
      // }
      //});
      $('#boutatak').click(function(){
        $('#terminal').text($('.jeu').html());
      });

      $(function() {
         $('#arene').hide();
         $('#play').hide();
         $('#terminal').hide();
      });

      $(function() {
         $('#arene').delay(1000).fadeIn(500);
         $('#play').delay(1500).fadeIn(500);
         $('#terminal').delay(2000).fadeIn(500);
      });

      $(function(){

      });


      //permet de rediriger une fois que l'adversaire est ko sur start2.php
      // function redirFunction() {
      //   // $.post(
      //   //   'start2.php',
      //   //   {
      //   //     id_joueur : Id,
      //   //     id_ia : ia,
      //   //   }
      //   // );
      //   window.location.href="start2.php";
      // };
    </script>

  <!-- </body>
</html>
