<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>drag drop</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<style>
ul {
	padding:0px;
	margin: 0px;
}
#response {
	padding:10px;
	background-color:#9F9;
	border:2px solid #396;
	margin-bottom:20px;
}
#list tr {
	margin: 0 0 3px;
	padding:8px;
	background-color:#333;
	color:#fff;
	list-style: none;
}
#list li {
	margin: 10px 10px 10px 10px;
	padding:8px;
	background-color:#12815e;
	color:#fff;
	list-style: none;
	float: left;
}
</style>
<script type="text/javascript">
$(document).ready(function(){ 	
	  function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
      });
    
}, 2000);}
	
    $("#response").hide();
	$(function() {

	$("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&update=update'; 
			$.post("updateList.php", order, function(theResponse){
				$("#response").html(theResponse);
				$("#response").slideDown('slow');
				slideout();
			}); 															 
		}								  
		});

	$("#list tbody").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&update=update'; 
			$.post("updateList.php", order, function(theResponse){
				$("#response").html(theResponse);
				$("#response").slideDown('slow');
				slideout();
			}); 															 
		}								  
		});


	});



});	
</script>
</head>
<body>
<div id="header"><font>Drag Drop through php and jquery</font></div>
<div id="container">
  <div id="list">

    <div id="response"> </div>
    <ul>
      <?php
                include("connect.php");
				$query  = "SELECT id, text FROM dragdrop ORDER BY listorder ASC";
				$result = mysqli_query($conn,$query);
				while($row = mysqli_fetch_array($result))
				{
					
				$id = stripslashes($row['id']);
				$text = stripslashes($row['text']);
					
				?>
      <li id="arrayorder_<?php echo $id ?>"><?php echo $id?> <?php echo $text; ?>
        <div class="clear"></div>
      </li>
      <?php } ?>
    </ul>

    <table style="width:100%">
    	<thead>
    		<td>ID</td>
    		<td>Description</td>
    	</thead>
    	<tbody>
    		<?php
    			include("connect.php");
				$query  = "SELECT id, text FROM dragdrop ORDER BY listorder ASC";
				$result = mysqli_query($conn,$query);
    			while($row = mysqli_fetch_array($result)){
					
				$id = stripslashes($row['id']);
				$text = stripslashes($row['text']);
					
				?>
    		<tr id="arrayorder_<?php echo $id ?>">
    			<td> <?php echo $id?> </td>
    			<td> <?php echo $text; ?></td>   
    		</tr> 
    		<?php } ?>		
    	</tbody>
    </table>
  </div>
</div>

</body>
</html>
