<?php include 'components/authentication.php' ?>   
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?> 



<?php
error_reporting(0);
include('_database/config.php');



if(isset($_POST['send']))
  {
$username=$_SESSION['user_username'];
$email =$_POST['email'];
$cartegory=$_POST['cartegory'];
$message=$_POST['message'];
$fromd=$_POST['fromd'];
$to=$_POST['to'];

$sql="INSERT INTO  tblpermit(userEmail,EventId,FromDate,ToDate,Reason,username,Status,PostingDate) VALUES('$email','$cartegory','$fromd','$to','$message','$username','0',CURRENT_TIMESTAMP)";
$query = $dbh->prepare($sql);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':cartegory',$cartegory,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':fromd',$fromd,PDO::PARAM_STR);
$query->bindParam(':to',$to,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Message submitted successfully";
}
else
{
$error="Something went wrong. Please try again";
}

}
?>


<?php
if(isset($_POST['query']))
  {
$username=$_SESSION['user_username'];
$email =$_POST['emailid'];
$fullname=$_POST['fullname'];
$query=$_POST['query'];
$mobileno=$_POST['mobileno'];

$sqli="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message,PostingDate,Status) VALUES('$fullname','$email','$mobileno','$query',CURRENT_TIMESTAMP,'0')";
$query = $dbh->prepare($sqli);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':query',$query,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);


$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Message submitted successfully";
}
else
{
$error="Something went wrong. Please try again";
}

}
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Send a Message to admin</title>


 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
/*
1.10. Modal
--------------------------------*/
.modal-dialog {
  width: 650px;
}
.modal-content {
  padding: 0 32px 22px;
}
.modal-header {
  padding:15px 0;
  margin-bottom:25px;
}
.modal-body {
  padding:10px 0;
}
.modal .modal-header .close {
  background: #000000 none repeat scroll 0 0;
  border-radius: 50%;
  color: #ffffff;
  font-size: 17px;
  height: 31px;
  line-height: 30px;
  margin-top: 5px;
  opacity: 1;
  text-align: center;
  text-shadow: none;
  width: 31px;
}
    </style>
</head>
<body>

<?php
$useremail=$_SESSION['user_username'];
$sql = "SELECT * from user where user_username=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      

      <div class="dealer_info">
        

      </div>
    </div>
   <div id="content">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="panel panel-default" style="margin: 20px 0px;">
                                          <div class="panel-heading">   
                                              
                                    <h5><?php echo "NAME : ". htmlentities($result->FullName);?></h5>          
                                    <p><?php echo "ADDRESS : ". htmlentities($result->user_address);?><br>
          <?php echo "PROFESSION  : ". htmlentities($result->user_profession);?>&nbsp;<br>
          <?php echo"EMAIL : ". htmlentities($result->EmailId); }}?></p>  

   
                                              </div>
                                          <div class="panel-body">
                                              <div class="row">
                                                  <div class="container">
                                                      <div class="row clearfix">
                                                          <div class="col-md-12 column">
                                                              <div class="row clearfix">
<?php
$useremail=$_SESSION['user_username'];
 $sql = "SELECT tblevents.EventsTitle,tblevents.id as vid,tblcartegories.CartegoryName,tblpermit.FromDate,tblpermit.ToDate,tblpermit.Reason,tblpermit.Status  from tblpermit join tblevents on tblpermit.EventId=tblevents.id join tblcartegories on tblcartegories.id=tblevents.EventsCartegory where tblpermit.username=:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 if($query->rowCount() < 3)
          {
?>
 <button class="btn btn-primary"> <a id="myBtn" href="#permit" style="color: red" data-toggle="modal" data-dismiss="modal"><h2 style="color: red">COMPOSE PERMIT</h2></a> 
 </button>
<?php }
else{
echo "<script>alert('You Have exceeded the number of your requests!!!');</script>";
echo "Hi, You have exceeded you requests";
 } ?>


<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

 <?php 
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


               

        <div class="panel-group" id="panel-<?php echo $rws['user_id']; ?>">
        <div class="panel panel-success">
        <div class="panel-heading">
        <h5><center><?php echo "MY REQUESTS";?></center></h5> 
        </div>
        <div id="panel-element-<?php echo $rws['user_id']; ?>" class="panel-collapse collapse in">
            <div class="panel-body">
       <div class="col-md-12 column">
                                                                                        
                                                                                        
        <div class="row">
                  
                  <p style="color: green;font-size: 30px;"><?php echo htmlentities($result->vid);?>, <?php echo htmlentities($result->EventsTitle);?></p>
                  <p><b>From Date:</b> <?php echo htmlentities($result->FromDate);?><br /> <b>To Date:</b> <?php echo htmlentities($result->ToDate);?></p>
                </div>
                <br>
                <div style="float: left"><p><b style="font-size: 20px;">Message:</b> <?php echo htmlentities($result->Reason);?> </p></div>
                <?php if($result->Status==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn" style="font-size: 40px;color: green;">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($result->Status==2) { ?>
               <div class="vehicle_status"> <a href="#" class="btn outline btn-xs" style="font-size: 40px;color: red;">Cancelled</a>
                            <div class="clearfix"></div>
        </div>



                <?php } else { ?>
              <div class="vehicle_status"> <a href="#" class="btn outline btn-xs" style="font-size: 40px;color: blue;">Waiting Approval</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       
              
              <?php }} ?>

                                                                                        
           </div>


                        
  <div class="modal fade" id="permit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><i class="fa fa-edit"></i> COMPOSE PERMIT HERE!</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="row">
                <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="From Date" name="fromd" required>
                                </div>
                            </div>
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="To Date" name="to" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">     
                            <div class="col-lg-8" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="EmailId" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-4" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" placeholder="EventCartegory" name="cartegory" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" style="z-index: 9;">
                                                                                             <div class="form-group">
                                 <textarea class="form-control white_bg" name="message" placeholder="Write Your Reason" rows="4"></textarea>
                            </div>
                          </div>
                     <p> <button id="send" name="send" type="submit" class="btn btn-primary">Send Permit <i class="fa fa-angle-right"></i></button>

              <button class="btn btn-primary pull-right"> <a id="myBtn" href="#comment" data-toggle="modal" data-dismiss="modal" style="color: green">Compose Request</a>      
              </form>
              
             
 </button></p>
             <div class="login-or">
              <hr class="hr-or">
              <span class="span-or" style="color: red">or</span>
          </div>
 
           
               
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
      </div>
        <p style="color: blue">You can only send upto three request for Now. Incase you exceed your count, you wont be able to make n' further requests. Please contact ADMIN for more information.</p>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="comment">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Send Query To Admin</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <textarea class="form-control white_bg" name="query" placeholder="Type Your Query Here" rows="4"></textarea>
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" style="background-color: green;color: blue" value="Send Query" name="query" id="submit" class="btn btn-block primary">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Back to writing Permit? <a href="#permit" data-toggle="modal" data-dismiss="modal">Click Here</a></p>
      </div>
    </div>
  </div>
</div>



                                                                               </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>                                        
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>






 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>