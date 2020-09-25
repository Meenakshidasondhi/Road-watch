
<!DOCTYPE html>
<html>
<head>

  <title>Miskey</title>
  
 </head>
<body>

<?php
include 'hdr.php';

?>
 <div class="myprofilerow">
   <div class="container">
     <div class="row">
       <div class="col-md-6">
         <div class="profile">
           <h1 align="center">Profile Picture</h1>
            <?php
                   foreach ($data as  $value) {
                     # code...
                    
            ?>
           <td>
      
      <img src="upload_images/<?php echo $value['pimg']; ?>" class='round' ></td>
      ?>
          </td>
          <br>
          <a href="<?php echo base_url();?>logout">Logout <i class="fa fa-power-off"></i></a>
         <button type="button" data-toggle="modal" data-target="#adddata" class="btn btn-primary btn-xs" id="">ADD DATA</button>
         </div>
       </div>
       <div class="col-md-6">
         <div class="profile">
           <h1>Data</h1>
           <ul>
             <li><label style="margin-right: 20px">Name  </label>  <span>  <?php echo $value['user_name']; ?></span></li>
             <li><label style="margin-right: 20px">Email</label>    <span>  <?php echo $value['email']; ?></li>
             <li><label style="margin-right: 20px">Phone</label>    <span>  <?php echo $value['phone']; ?></li>
             <li><label style="margin-right: 20px">Country</label>  <span>  <?php echo $value['country']; ?></li>
            
           </ul>
          
        
           
         </div>

       </div>
     </div>
   </div>
 </div>
  <div class="myrow">
    <div class="container">
      
      <div class="row">
        <div class="col-md-3">
          <div class="food">
            <div class="fpos"><p>This is the containt for the food you can see the Hd pictures of the food containt..</p>
              <div class="btn">
                click me!
              </div></div>
            <h1>FOOD</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="music">
             <div class="fpos"><p>This is the containt for the music you can see the Hd pictures of the music containt..</p>
              <div class="btn">
                click me!
              </div></div>
          <h1>MUSIC</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="beuty">
             <div class="fpos"><p>This is the containt for the beuty you can see the Hd pictures of the beuty containt..</p>
              <div class="btn">
                click me!
              </div></div>
            <h1>Buety</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="travel">
             <div class="fpos"><p>This is the containt for the travel you can see the Hd pictures of the travel containt..</p>
              <div class="btn">
                click me!
              </div></div>
            <h1>TRAVEL</h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="fasion">
             <div class="fpos"><p>This is the containt for the fasion you can see the Hd pictures of the fasion containt..</p>
              <div class="btn">
                click me!
              </div></div>
            <h1>Fasion</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="fun">
             <div class="fpos"><p>This is the containt for the fun you can see the Hd pictures of the fun containt..</p>
              <div class="btn">
                click me!
              </div></div>
          <h1>Fun</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="nature">
             <div class="fpos"><p>This is the containt for the nature you can see the Hd pictures of the nature containt..</p>
              <div class="btn">
                click me!
              </div></div>
            <h1>Nature</h1>
          </div>
        </div>
        <div class="col-md-3">
          <div class="accessories">
             <div class="fpos"><p>This is the containt for the accessories you can see the Hd pictures of the accessories containt..</p>
              <div class="btn">
                click me!
              </div></div>
            <h1>Accessories</h1>
          </div>
        </div>
      </div>

    </div>


  </div>
 <!-- Trigger the modal with a button -->

<!-- Modal -->

 <div id="adddata" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div class="myform2">
        <form method="post" id="first_form" action="<?php echo base_url(); ?>addata" >
    
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
      <input type="hidden" name="uid" value="<?php echo $value['user_id'] ?>">
      <?php } ?>
      <input type="text" class="form-control" placeholder=" Name" name="contact_name" id="contact_name" >
    </div>
  </div>
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
      <input type="text" class="form-control" placeholder="Contact" name="contact_phone" id="contact_phone" >
    </div>
  </div>
   <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
      <input type="email" class="form-control" placeholder="Email" name="contact_email" id="contact_email" >
    </div>
  </div>

</div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >ADD</button>
        </form>
      </div>
    </div>

  </div>
</div>
 

<?php
include 'footer.php';
?>

</body>
</html>
<script>
  $(document).ready(function() {

  $('#adddata').submit(function(e) {
   
    var first_name = $('#contact_name').val();
    var uphone = $('#contact_phone').val();
    var uemail = $('#contact_email').val();
    

    $(".error").remove();

    if (first_name.length < 1) {
      $('#contact_name').after('<span class="error">This field is required</span>');
    }
    if (uphone.length < 1) {
      $('#contact_phone').after('<span class="error">This field is required</span>');
    }
    if (uemail.length < 1) {
      $('#contact_email').after('<span class="error">This field is required</span>');
    } else {
      var regEx = /^[a-zA-Z0-9._%+-]{1,63}@([a-zA-Z0-9]{1,53}\.){1,125}[a-zA-Z]{2,63}$/;
      var validEmail = regEx.test(uemail);
      if (!validEmail) {
        $('#contact_email').after('<span class="error">Enter a valid email</span>');
      }
    }
   
    if ($("#first_form .error").length) {
            e.preventDefault();
        }
  });

});
</script>