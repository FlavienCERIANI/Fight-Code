
<?php
session_start();
//var_dump($_SESSION['question']);
if(empty($_POST['valider'])){
 ?>

<!-- <form class="" action="question.php" method="post">
  <div class="" id="question"></div>
  <input type="submit" class="button" name="valider" value="Valider">
</form> -->


<!-- <form class="quest" action="question.php" method="post">
<div class="col-sm-4" id="question">
    <div class="radio"></div>
    <div class="radio"></div>
    <div class="radio"></div>
</div>
<input type="submit" class="button" name="valider" value="Valider">
</form> -->
<?php
// }
// else {
// if($_POST['reponse']=="non"){
  ?>
  <script type="text/javascript">
      alert("Vous avez mal répondu !");
  </script>
  <?php
  header('Refresh:0 ; url=arene.php?choix_attaque=defense');
  ob_flush();
}
else {
  ?>
  <script type="text/javascript">
      alert("C'est la bonne réponse !");
  </script>
  <?php
  $_SESSION['question']=true;
  header('Refresh: 0; url=arene.php?choix_attaque=attaque');
}
}
 ?>
<!--

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="question.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet"> -->
