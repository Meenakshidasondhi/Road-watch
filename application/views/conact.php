


<!DOCTYPE html>
<html>
<head>

	<title>Miskey</title>
	
 </head>
<body>

<?php
include 'hdr.php';

?>


<h1 style="text-align: center; color:#18eddf; ">CONTACT DETAILS</h1>
 <table class="table" id="myTable" style="background-color: #090954; color:#18eddf;">
 	<input type="text" name="srtxt" id="srtxt"><button type="submit" name="sub" class="btn btn-default" >search</button>
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $key => $value) {
        ?>
  <tr>
    <td><?php echo $value->usrname; ?></td> 
    <td><?php echo $value->phone_number; ?></td> 
    <td><?php echo $value->email_add; ?></td> 
   
  </tr>
  <?php
}
  ?>
  </tbody>
</table>

<?php
include 'footer.php';
?>

</body>
</html>

<script>
$(document).ready(function(){
  $("#srtxt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
