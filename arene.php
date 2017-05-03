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
  <link href="/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" />
  <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js" integrity="sha256-Nd2xznOkrE9HkrAMi4xWy/hXkQraXioBg9iYsBrcFrs=" crossorigin="anonymous"></script>
  <script src="question.js"></script>
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
// var_dump($player1);
// var_dump($player2);
// var_dump($_SESSION['player1']);
// var_dump($_SESSION['player2']);
// var_dump($question);
// var_dump($_SESSION['potion_joueur']);
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
          <!-- <img id="arene" src="images/arène.jpg"> -->
          <div class="" id="video"></div>
          </div><!-- arene -->

          <div class="play col-md-6" id="play">
            <div class="" id="round"></div>  <!--Numéro Round -->
            <p id="de_joueur"></p>  <!--valeur du de -->
            <p id="de_ia"></p>  <!--valeur du de -->

              <?php
              if(!empty($facile)){ //si aucun choix d'attaque n'est sélectionner alors le bouton apparaît
                ?>
                  <!-- <input type="button" class="button"  onclick="btnform();" value="Attaquer" autocomplete="off"> -->
                  <button type="button" id="boutatak" class="btn btn-lg btn-primary rounded" onclick="redirection_attaque();">Attaque</button>
              <?php
              }

              if(!empty($difficile)){ //si aucun choix d'attaque n'est sélectionner alors le bouton apparaît
                ?>

              <button type="button" id="boutatak2" class="btn btn-lg btn-primary rounded" onclick="question();">Attaque</button>

              <?php
              }
              ?>
              <!-- The Modal -->
              <div id="myModal" class="modal">
               <!-- Modal content -->
               <div class="modal-content">
                 <span class="close">&times;</span>
                 <div class="quest" id="question">
                     <!-- <div class="radio"></div>
                     <div class="radio"></div>
                     <div class="radio"></div> -->
                 </div>
                 <button type="button" onclick="redirection_question();">Valider</button>

               </div>
              </div>
              <?php

              if($_SESSION['potion_joueur']==1){ //si la potion est déjà utilisé le bouton n'apparait plus
                ?>
                  <button type="button" id="boutpotion" class="btn btn-lg btn-primary rounded" onclick="redirection_potion();">Potion</button>
              <?php
            }

            ?>


          <!-- <div class="degat" id="valeur_de" hidden="true"><?php echo $valeur_de; ?></div> -->
          <div class="degat" id="nom_joueur" hidden="true"><?php echo $player1->getNom(); ?></div>
          <div class="id_session" id="id_session" hidden="true"><?php echo session_id(); ?></div>
          <div class="degat" id="nom_ia" hidden="true"><?php echo $player2->getNom(); ?></div>
            <div class="jeu">

            <?php
              echo "<br>";
              echo $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
              echo $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";
            ?>
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
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("boutatak2");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    // btn.onclick = function() {
    //   $("#question").html(
    //   "coucou"
    // );
    //   modal.style.display = "block";
    // }

    // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //   modal.style.display = "none";
    // }

    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //   if (event.target == modal) {
    //       modal.style.display = "none";
    //   }
    // }

    //Affichage une image de la video comme fond
    setVideoFixe("attaque");

    //Affiche le numéro de round au lancement de la page
    $("#round").html("ROUND 1");

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
