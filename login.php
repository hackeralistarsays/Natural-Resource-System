<?php include 'components/session-check-index.php' ?>
<?php include 'controllers/base/head.php' ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>

<body style="background-image: url(userfiles/background-images/front-image.jpg);">
<div class="container">
    <div class="row">
      <div class="main">
          <!-- Trigger/Open The Modal -->
          <h3 style="color:#65aeee;">Please Log In or <a id="myBtn">Sign Up</a></h3>
          <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                  <button href="#" type="submit" class="btn btn-lg btn-primary btn-block ladda-button" data-style="zoom-in"><i class="fa fa-facebook"></i>acebook</button>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                  <button href="#" class="btn btn-lg btn-info btn-block ladda-button" data-style="zoom-in" ><i class="fa fa-google"></i>oogle</button>
              </div>
          </div>
          <div class="login-or">
              <hr class="hr-or">
              <span class="span-or">or</span>
          </div>
          <form role="form" action="components/login-process.php" method="post" name="login" autocomplete="off">
              <div class="form-group">
                  <label for="inputUsernameEmail" style="color:green"><i class="fa fa-user"></i> Username or email</label>
                  <input type="text" class="form-control" id="inputUsernameEmail" name="username" placeholder="Username" autocomplete="off">
              </div>
              <div class="form-group">
                  <label for="inputPassword" style="color:green"><i class="fa fa-lock"></i> Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login_button">
                  Log In  
              </button>
          </form>
        </div>
    </div>
</div>
    


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" style="color:red">&times;</span>
    <a style="color:red">
	Sorry you cant create a new account on your own... Please lias wit the admin or chairman who is the admin to create you an account.
        Remember your credentials as they are essential in the login process. AAfter login you will be able to change or modify your credentials including specifying your customised user avatar,login password among other things. Thank you for your time.
	</a>
      
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
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