

<!DOCTYPE html>
<html>
<head>

	<title>Miskey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- 	<link rel="stylesheet" type="text/css" href="font/logo.png">
 -->	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <link rel="stylesheet" type="text/css" href="assets/css/mk.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon32" href="assets/img/logo.jpg">
 </head>
<body>

<div class="mynv">
		
			<nav class="navbar  navbar-fixed-to nv" >
  <div class="container-fluid">
   
    <div class="navbar-header myhd">
    	 <button type="button" class="navbar-toggle collapsed btn btn-default" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MIS<span class="mys">KEY</span>
       <p>M<span class="mys">19</span><i class="fa fa-smile-o"></i></i></p>
   </a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<div class="myul">
      <ul class="nav navbar-nav ">

      	         <li class="myli">
        	<div class="search">
        		<input type="text" name="search" placeholder="Search" class="sr">
        	</div>
        </li class="myli">
        <li class="active"><a  class="myanq" href="<?php echo base_url(); ?>">Home <i class="fa fa-home"></i> <span class="sr-only"></span></a></li>
        <li class="myli"><a class="myanq" href="<?php echo base_url();?>about">About us <i class="fa fa-question-circle"></i> </a></li>
         <li class="myli"><a class="myanq" href="<?php echo base_url();?>discover">Discover <i class="fa fa-spinner"></i>
</a></li>


         <li class="myli"><a class="myanq" href="<?php echo base_url();?>whymiskey">WHY Miskey !!! <i class="fa fa-exclamation-circle"></i></a></li>
        <li class="myli showin_5"><a class="myanq" href="<?php echo base_url();?>profile">Profile<i class="fa fa-phone"></i></a></li>
        <li class="myli"><a class="myanq" href="<?php echo base_url();?>contact">Contact Details <i class="fa fa-file"></i>
</a></li>
       
       </ul>
   </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="myanq mymd1" href="#"data-toggle="modal" data-target="#myModal">Login</a></li>
        <li><a class="myanq" href="#"data-toggle="modal" data-target="#myModal2">Registration</a></li>
      </ul>
    </div>
  </div>
</nav>
	</div>
  <?php if($this->session->flashdata('signup_failure')){?>
  <div class="alert alert-danger" style="margin-bottom: 0px">      
    <?php echo $this->session->flashdata('signup_failure')?>
  </div>
<?php } ?>


<div class="modal fade" id="myModal2">
  <div class="modal-dialog" role="document">
    <div class="modal-content mycnt">
      <div class="modal-header myhd2 ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><h3>x</h3></button>
        <h4 class="modal-title" id="myModalLabel"> New Rgister</h4>
      </div>
      <div class="modal-body mybody">
      	<div class="myform2">
        <form id="first_form" action="<?php echo base_url();?>insertdata" method="post" enctype="multipart/form-data">
        	<div class="col-md-6">	<div class="form-group">
		<div class="input-group">
		 <p>Name</p>
		 <p>Email</p>
		 <p>Phone</p>
		 <p>Country</p>
		 <p>Password</p>
		 		 <p>Profile Picture</p>
		
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
	<div class="input-group">
		 <span class="input-group-addon"><i class="fa fa-user"></i></span>
		  <input type="text" id="user" name="user" value="" class="form-control" placeholder="Name" >
		  
		</div>
		
	</div>
	<div class="form-group">
	<div class="input-group">
		 <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		  <input type="email" id="email" name="email" class="form-control" placeholder="email" >
		   		</div>
		   		
	</div>
		<div class="form-group">
	<div class="input-group">
		 <span class="input-group-addon"><i class="fa fa-phone"></i></span>
		  <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" >
		  </div>
		 
		
	</div>
	<div class="form-group">
	<div class="input-group">
		 <span class="input-group-addon"><i class="fa fa-flag"></i></span>
		  <select class="form-control" name="country">
		  	<option value=" ">Choose your option</option>
		  	<option value="India">India</option>
		  	<option value="Chaina">Chaina</option>
		  	<option value="America">America</option>
		  
		  </select>
		  
		</div>
	</div>

<div class="form-group">
	<div class="input-group">
		 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
		  <input type="Password" id="passw" name="passw" class="form-control" placeholder="Password" >
		  </div>
		  
		
	</div>
	
	<div class="form-group">
	<div class="input-group">
		 <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
		  <input type="file" name="profileimg" class="form-control" value="upload" placeholder="Choose Profile Picture " >
		</div>
	</div>

</div>

      </div>
      <div class="modal-footer">
        <button type="submit"  name="rgbtn" class="btn btn-primary btn4">Login</button>
        </form>


      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content mdlcont">
      <div class="modal-header mdlhd">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><h3>x</h3></button>
        <h4 class="modal-title" id="myModalLabel"> Member Login</h4>
      </div>
      <div class="modal-body">
      	<div class="myform2">
        <form method="post" action="<?php echo base_url();?>login">
		  <div class="form-group">
			 <div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-user"></i></span>
				  <input type="email" class="form-control" placeholder="Useremail" name="loginemail" >
			 </div>
		 </div>
	
		<div class="form-group">
			<div class="input-group">
			  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
			  <input type="password" class="form-control" placeholder="Password" name="loginpass" >
			</div>
		</div>

     </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="loginbtn" class="btn btn-primary btn4" id="#showin5">Login</button>
    </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script> 
$(document).ready(function() {

  $('#first_form').submit(function(e) {
   
    var first_name = $('#user').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var password = $('#passw').val();

    $(".error").remove();

    if (first_name.length < 1) {
      $('#user').after('<span class="error">This field is required</span>');
    }
    if (phone.length < 1) {
      $('#phone').after('<span class="error">This field is required</span>');
    }
    if (email.length < 1) {
      $('#email').after('<span class="error">This field is required</span>');
    } else {
      var regEx = /^[a-zA-Z0-9._%+-]{1,63}@([a-zA-Z0-9]{1,53}\.){1,125}[a-zA-Z]{2,63}$/;
      var validEmail = regEx.test(email);
      if (!validEmail) {
        $('#email').after('<span class="error">Enter a valid email</span>');
      }
    }
    if (password.length < 8) {
      $('#passw').after('<span class="error">Password must be at least 8 characters long</span>');
    }
    if ($("#first_form .error").length) {
            e.preventDefault();
        }
  });

});
</script>
<script>
  
$("document").ready(function(){
    setTimeout(function(){
        $("div.alert").remove();
    }, 5000 ); // 5 secs

});

</script>