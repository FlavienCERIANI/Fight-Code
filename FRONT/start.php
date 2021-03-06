<?php
/**
 * Created by PhpStorm.
 * User: antoine_narboux
 * Date: 22/03/17
 * Time: 08:58
 */
include('Personnage.class.php');

 session_start();
// $_SESSION['player1'] = new Personnage("Rondoudou");
// $_SESSION['player2'] = new Personnage("Dracofeu");
$_SESSION['potion_joueur'] = 1;
$_SESSION['potion_IA'] = 1;

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

  <body>

    <!-- lance le son au chargement de la page-->
    <audio class="son" autoplay="true">
       <source src="son2.mp3" type="audio/mpeg">
    </audio>

    <!-- intègre le gif fight -->
    <div class="gif">
    <img id="fight" src="images/fight.gif">
    </div><!-- gif -->

    <div class="typewriter">
      <h1>< CODE ></h1>
    </div><!-- typewriter -->

    <div class="writer">
      <h1>CODE-MOI SI TU PEUX !!!</h1>
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
      <img id="dragon2" src="images/dragon.svg" alt=""/>
      <img id="sorcier2" src="images/sorcier.svg" alt=""/>
      <img id="giga2" src="images/giga.svg" alt=""/>
      <img id="princess2" src="images/princess.svg" alt=""/>
    </div>

    <div class="fight">
    <button type="button" class="bouton btn btn-lg btn-warning"
    id="fight">FIGHT</button>
  </div><!-- fight -->

    <script type="text/javascript">

//1    permet de cacher les éléments au chargement de la page.
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
//2    permet d'afficher les éléments a partir de 1.5s
        $(function() {
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
        $('#main :nth-child(' + random + ')').css(
            'display', 'inline'
        );

//8     permet d'envoyer le level et le perso et d'envoyer sur la page d'arene

        // $('#easy').click(function(){
        //   $.post({
        //     'test_index.php',
        //     data:"name=facile",
        //   });
        // });
        // $('#hard').click(function(){
        //   $.post({
        //     'test_index.php',
        //     data:"name=difficile",
        //   });
        // });

        $('.flipper').click(function(){
          var theId = $(this).attr('id'); //récupère l'id
          alert (theId);
        });

    </script>
  </body>
</html>
