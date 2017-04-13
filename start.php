<?php
/**
 * Created by Atom.
 * User: ceriani flavien
 * Date: 22/03/17
 * Time: 08:58
 */
include('Personnage.class.php');

session_start();
//on detruit la session avant d'en démarrer une nouvelle
$_SESSION = array();
//On détruit la session
// session_destroy();

 // session_start();

$_SESSION['potion_joueur'] = 1;
// $_SESSION['potion_IA'] = 1;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fight-Code</title>
  </head>
  <link href="http://fr.allfont.net/allfont.css?fonts=ds-digital" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="start.css" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
  <script src="typed.js"></script>
  <script type="text/javascript" src="lib/jquery.js"></script>
  <script type="text/javascript" src="kkcountdown/kkcountdown/js/build/kkcountdown.min.js"></script>

  <body>
    <!-- <div class="rebours">
      <span class="kkcountdown" data-seconds="2804681"></span>
    </div><!-- rebours -->


      <div class="logo">
        <img class="logo" onclick="play('audioPlayer', this)" src="images/sd.png"/>
      </div><!-- logo -->

      <div class="sponsor">
        <img id="dta" src="images/dta.png"/>
        <img id="french" src="images/logo_french.png"/>
        <img id="tel" src="images/logo_telecom.png"/>
        <img id="ujm" src="images/logoUJM.png"/>
      </div><!-- sponsor -->

      <div class="secondes">
        <img class="sec" id="trois" src="images/3.jpg"/>
        <img class="sec" id="deux" src="images/2.jpg"/>
        <img class="sec" id="un" src="images/1.jpg"/>
      </div><!-- secondes -->


    <!-- lance le son au chargement de la page-->
    <audio id="audioPlayer">
      <source src="son2.mp3">
    </audio>

    <!-- intègre le gif fight -->
    <div class="gif">
    <img id="fight" src="images/fight.gif">
    </div><!-- gif -->

    <!-- lance l'écriture auto -->
    <div class="typewriter">
      <h1>< CODE /></h1>
      <!-- <h1>< CODE /><span>&nbsp;</span></h1> -->
    </div><!-- typewriter -->

    <div class="writer">
      <h1>CODE-MOI SI TU PEUX !!!</h1>
      <!-- <h1>CODE-MOI SI TU PEUX !!!<span>&nbsp;</span></h1> -->
    </div><!-- writer -->

    <div class="start">
    <button type="button" class="bouton btn btn-lg btn-warning" id="start">Press Start</button>
    </div><!-- start -->

    <div style="max-width: 400px; margin: 0 auto 10px;" class="well">
      <button class="btn btn-primary btn-lg btn-block" name="facile" type="button" id="easy">Easy level</button>
      <button class="btn btn-default btn-lg btn-block" name="difficile" type="button" id="hard">Hard level</button>
    </div><!-- well -->

    <h2>Choisis ton personnage</h2>

    <div class="flip-container">
      <div class="flipper">
        <div class="img">
          <img id="dragon" class="tada" src="images/dragon.svg"/>
        </div><!-- img -->
      </div><!-- flipper -->
    </div><!-- flip-container -->

    <div class="flip-container">
      <div class="flipper">
        <div class="img">
          <img id="sorcier" class="tada" src="images/sorcier.svg"/>
        </div><!-- img -->
      </div><!-- flipper -->
    </div><!-- flip-container -->

    <div class="flip-container">
      <div class="flipper">
        <div class="img">
          <img id="giga" class="tada" src="images/giga.svg"/>
        </div><!-- img -->
      </div><!-- flipper -->
    </div><!-- flip-container -->

    <div class="flip-container">
      <div class="flipper">
        <div class="img">
          <img id="princess" class="tada" src="images/princess.svg"/>
        </div><!-- img -->
      </div><!-- flipper -->
    </div><!-- flip-container -->
<!-- ##############"IMAGE DE REMPLACEMENT"############## -->
    <img id="dragon2" src="images/dragon.svg">
    <img id="sorcier2" src="images/sorcier.svg">
    <img id="giga2" src="images/giga.svg">
    <img id="princess2" src="images/princess.svg">
<!-- ##############"IMAGE DE REMPLACEMENT"############## -->
    <div class="vs">
      <img class="versus" src="images/vs.png">
    </div><!-- vs -->

    <div class="ia">
    <button type="button" class="bouton btn btn-lg btn-inverse" id="ia">IA</button>
  </div><!-- ia -->

    <div id="main">
      <img id="dragon3" src="images/dragon.svg" alt=""/>
      <img id="sorcier3" src="images/sorcier.svg" alt=""/>
      <img id="giga3" src="images/giga.svg" alt=""/>
      <img id="princess3" src="images/princess.svg" alt=""/>
    </div>

    <div class="fight">
    <button type="button" onclick="myFunction()" class="bouton btn btn-lg btn-warning"
    id="fight">FIGHT</button>
  </div><!-- fight -->

    <script type="text/javascript">

//1 permet de cacher les chiffres du compte a rebours
      $(function(){
        $('#trois').fadeOut(1);
        $('#deux').fadeOut(1);
        $('#un').fadeOut(1);
      });

//2 permet au click de lancer la musique et de faire apparaitre le compte a rebours
      $('.logo').click(function(){
        $(this).fadeOut('slow');
        $('#trois').delay(1000).show();
        $('#trois').fadeOut(1);
        $('#deux').delay(2000).show();
        $('#deux').fadeOut(1);
        $('#un').delay(3000).show();
        $('#un').fadeOut(1);
        $('#dta').fadeOut(1);
        $('#french').fadeOut(1);
        $('#tel').fadeOut(1);
        $('#ujm').fadeOut(1);
      });

// permet de gérer l'autoplay avec une fonction play/pause
      function play(idPlayer, control) {
        var player = document.querySelector('#' + idPlayer);
        if (player.paused) {
            player.play();
            control.textContent = 'Pause';
        } else {
            player.pause();
            control.textContent = 'Play';
        }
      }

//3 initialisation du compte a rebours
       $(".kkcountdown").kkcountdown();

//4    permet de cacher les éléments au chargement de la page.
       $(function() {
          $('.gif').fadeOut(1);//j'utilise fadeOut pour la compatibilité avec le délai de fadeIn en dessous
          $('.typewriter').fadeOut(1);
          $('.writer').fadeOut(1);
          $('.start').fadeOut(1);
          $('.well').fadeOut(1);
          $( ".flip-container" ).fadeOut(1);
          $('h2').fadeOut(1);
          $('.fight').hide();
          $('#dragon2').hide();
          $('#sorcier2').hide();
          $('#giga2').hide();
          $('#princess2').hide();
          $('.vs').hide();
          $('#main').hide();
          $('.ia').hide();
        });
//2    permet d'afficher les éléments a partir du delay
        $('.logo').click(function() {
           $('.gif').delay(7000).fadeIn(1500);
           $('.typewriter').delay(8000).fadeIn(1500);
           $('.writer').delay(9000).fadeIn(1500);
           $('.start').delay(13000).fadeIn(1500);
         });
//3    lorsqu'on click sur le bouton ça l'efface et ça fait apparaître les perso, le level, et le h2
        $('#start').click(function(){
          $(this).fadeOut(1);
          $('.flip-container').show('slow');
          $('h2').show('slow');
          $('.well').show('slow');
        });
//4    permet au click de changer les fonds de couleur sur le boutons level
        $('#easy').click(function(){
          $(this).css('background-color','maroon');
          $('#hard').css('background-color','#ec971f');
        });
        $('#hard').click(function(){
          $(this).css('background-color','maroon');
          $('#easy').css('background-color','#ec971f');
        });
//5    permet lorsqu'on selectionne un perso d'effacer toute l'entête.
        $('.flip-container').click(function(){
          $('.gif').hide();
          $('.typewriter').hide();
          $('.writer').hide();
          $('.start').hide();
          $('.fight').show('slow');
          $('h2').hide();
          $('h1').hide();
        });
//6    permet d'afficher le personnage sélectionné
        $('#dragon').click(function(){
          $('.flip-container').fadeOut(1);
          $('#dragon2').fadeIn();
          //permet de faire apparaître le versus (VS).
          $('.vs').delay(1000).fadeIn(1500);
          //permet de faire apparaître l'adversaire (IA).
          $('#main').delay(2000).fadeIn(1500);
        });
        $('#sorcier').click(function(){
          $('.flip-container').fadeOut(1);
          $('#sorcier2').fadeIn();
          //permet de faire apparaître le versus (VS).
          $('.vs').delay(1000).fadeIn(1500);
          //permet de faire apparaître l'adversaire (IA).
          $('#main').delay(2000).fadeIn(1500);
        });
        $('#giga').click(function(){
          $('.flip-container').fadeOut(1);
          $('#giga2').fadeIn();
          //permet de faire apparaître le versus (VS).
          $('.vs').delay(1000).fadeIn(1500);
          //permet de faire apparaître l'adversaire (IA).
          $('#main').delay(2000).fadeIn(1500);
        });
        $('#princess').click(function(){
          $('.flip-container').fadeOut(1);
          $('#princess2').fadeIn();
          //permet de faire apparaître le versus (VS).
          $('.vs').delay(1000).fadeIn(1500);
          //permet de faire apparaître l'adversaire (IA).
          $('#main').delay(2000).fadeIn(1500);
        });

//7    permet de faire un random sur le perso de l'IA.

        var count = $("#main").children().length;
        var random = Math.floor(Math.random()*count+1);

        var tab = ["dragon", "sorcier", "giga", "princess"];
        var ia = tab[random-1];
        $('#'+ia+'3').css(
              'display', 'inline'
          );
          console.log(random);
          console.log(ia);

//8     permet d'envoyer le level et le perso et d'envoyer sur la page d'arene
        //selection niveau
        $('#easy').click(function(){
          $.post(
            'arene.php',
            {
                facile : "facile"
            }
          );
        });
        $('#hard').click(function(){
          $.post(
            'arene.php',
            {
              difficile : "difficile"
            }
          );
        });
        //selection personnage
        var Id = "";
        $('.tada').click(function(){
          Id = $(this).attr('id'); //récupère l'id
          Id=Id.replace("2","");//enlève le 2 de l'ID
          alert (Id);
        });

          // function submitForm() { // submits form
          //        document.getElementById("form11").submit();
          //    }
        //envoyer sur l'arène

        function myFunction() {
          $.post(
            'arene.php',
            {
              id_joueur : Id,
              id_ia : ia,
            }
          );
          window.location.href="arene.php";
        };
    </script>
  </body>
</html>
