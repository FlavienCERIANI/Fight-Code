
<?php
$rep=$_POST['name'];

// if($rep=="OK"){
//
// }
// else {
//   header('location:test_index.php');
//   exit();
// }

if(empty($_POST['question'])){
 ?>

<form class="" action="question.php" method="post">
  <div class="" id="question"></div>
  <input type="submit" class="button" name="question" value="Valider">
</form>
<?php
}
else {
echo "else";
$_SESSION['de']=
// header('Refresh: 2; url=test_index.php?choix_attaque=defense');
// ob_flush();
}
 ?>



<script src="question.js">

</script>
