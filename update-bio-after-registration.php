<?php include '_database/database.php' ?>
<?php include 'controllers/base/head.php' ?>
        <div class="container" style="padding-top:100px;">
            <div class="no-gutter row">             
                <div class="col-md-12">
                     <center><h2 style="color:#65aeee;">Fill Up the details below to Continue</h2></center>
              	     <div class="panel panel-default" id="sidebar">
                        <div class="panel-body">
<?php
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_username']);
    $sql = "SELECT * FROM user WHERE user_username='$user_username'";
    $result = mysqli_query($database,$sql) or die(mysqli_error($database)); 
    $rws = mysqli_fetch_array($result);
?>                
<?php include 'controllers/form/update-bio-after-registration-form.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>