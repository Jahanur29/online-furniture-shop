
<script type="text/javascript">
function validateForm()
{
var a=document.forms["addbrand"]["title"].value;
if (a==null || a=="")
  {
  alert("Pls. Enter the brand title");
  return false;
  }
}
</script>

<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<form action="addexecBrand.php" method="post" enctype="multipart/form-data" name="addbrand" onsubmit="return validateForm()">
 Brand Title<br />
  <input name="title" type="text" class="ed" /><br />
    <input type="submit" name="Submit" value="save" id="button1" />
 
</form>
