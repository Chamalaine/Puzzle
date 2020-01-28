<?php  

$handle=opendir("./conteneur");

$i=1;

while (false !== ($entry = readdir($handle))) {
      if($i>2){
        $pieces[]=$entry;
      }
      $i++;
}
shuffle($pieces);

?>





<!DOCTYPE html>
<html>
	<head>
	<style>


*{
  box-sizing:border-box;
}

#wrapper{
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: linear-gradient(#e66465, #9198e5);
}
.boites{
  border : 1px solid black;
  width:225px;
  height:225px;
}

#pieces{
  display:flex;
  flex-wrap:wrap;
}

.piece{
  width:225px;
  height:225px;
  border: 1px solid #aaa;
}

#plateau{
      margin-top: 2em;
      width:904px;
      background : #e66465;
      border : 2px solid black;
      display:flex;
      flex-wrap:wrap;
}

#titre{
    border : 1px solid black;
    padding: 2em;
    margin-top: 2em;
}
</style>
	</head>
	<body>

<div id="wrapper">
  <div id=pieces>
    <?php


    
    foreach($pieces as $piece){
      echo "<img class='piece' src='./conteneur/$piece' data-img=$piece>";
    }

      ?>
  </div>


  <div id="titre">
    <h1>Un Puzzle de ouf</h1>
  </div>

  <div id="plateau">
      <?php
     asort($pieces);
      foreach($pieces as $piece){
        echo "<div class='boites' data-id=$piece></div>";
      }


        ?>


  </div>


</div>


        <script
          src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $( function() {
    $( ".piece" ).draggable();
    $( ".piece" ).draggable({ scroll: true, scrollSensitivity: 100, snap:true });
    
    $( ".boites").droppable({
        accept:".piece",
        drop : function(event, ui){
          var id= $(this).data("id");
          var img = ui.draggable.data("img");

          if(id===img){
            var src= ui.draggable.attr("src");
            $(this).html("<img src='"+src+"'>");
            ui.draggable.remove();
          }

    } 
    });
  });

  </script> 

    </body>  		
	
</html>