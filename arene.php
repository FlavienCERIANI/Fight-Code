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
<?php echo $facile=$_POST['name'];?>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-24">
                    <div class="arene col-md-18">
                      <!-- <img id="arene" src="images/arène.jpg"> -->
                      <video class="dragogg" width="500" height="532" controls="controls">
                        <source src="drake.ogg" type="video/ogg" />
                      </video>
                      <!-- <video class="dragmkv" src="dragon02.mkv"> -->
                    </div><!-- arene -->

                    <div class="play col-md-6" id="play">
                      <p id="placeholder"></p>
                        <button id="button">ATTAQUE</button>
                        <script src="dice.js"></script>
                        <script src="ui.js"></script>

                        <script type="text/javascript">
                        var dice = {
                          sides: 6,
                          roll: function () {
                            var randomNumber = Math.floor(Math.random() * this.sides) + 1;
                            return randomNumber;
                          }
                        }
                        //Prints dice roll to the page
                        function printNumber(number) {
                          var placeholder = document.getElementById('placeholder');
                          placeholder.innerHTML = number;
                        }
                        var button = document.getElementById('button');

                        button.onclick = function() {
                          var result = dice.roll();
                          printNumber(result);
                        };
                        </script>
                        <button type="button" class="btn btn-lg btn-primary rounded">Default</button>
                        <button type="button" class="btn btn-lg btn-primary rounded">Default</button>
                        <button type="button" class="btn btn-lg btn-primary rounded">Default</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    </script>

  </body>
</html>
