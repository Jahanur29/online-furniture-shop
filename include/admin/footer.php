  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker2" ).datepicker();
  } );
</script> 
    
    
<script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable({
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
      
  } );
$(function() {

$(".delBrandButton").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = 'id=' + del_id;
    if(confirm("Sure you want to delete this update? There is NO undo!"))
    {

        $.ajax({
            type: "GET",
            url: "deleteBrand.php",
            data: info,
            success: function(){
            }
        });
        $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
            .animate({ opacity: "hide" }, "slow");
    }
    return false;
});

$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteprod.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<script src="js/script.js"></script>
    
    
</body>


</html>