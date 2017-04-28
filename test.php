<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="arene.css" />
    <link href="/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="/bootstrap-3.3.7/js/tests/vendor/jquery.min.css" rel="stylesheet"> -->
    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js></script>

  
  <script src="question.js"></script>
  </head>
  <body>

    <!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

 <!-- Modal content -->
 <div class="modal-content">
   <span class="close">&times;</span>
   <p>SAlut</p>
 </div>

</div>

<script text/javascript>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
  }
}
</script>


  </body>
</html>
