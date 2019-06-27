<?php include 'components/authentication.php' ?>   
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?> <?php

error_reporting(0);
include('_database/config.php');

if(isset($_POST['submit']))
  {
$email =$_POST['email'];
$testimonoial=$_POST['testimonial'];
$sql="INSERT INTO  tbltestimonial(UserEmail,Testimonial) VALUES(:email,:testimonoial)";
$query = $dbh->prepare($sql);
$query->bindParam(':testimonoial',$testimonoial,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);

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
<title>Post testimonial</title>

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
    </style>
</head>
<body>


<?php
$username=$_SESSION['user_username'];
$sql = "SELECT * from user where user_username=:username";
$query = $dbh -> prepare($sql);
$query -> bindParam(':username',$username, PDO::PARAM_STR);
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
      <h4><?php echo "EMAIL :". htmlentities($result->EmailId);?><br>
        <?php echo "NAME :". htmlentities($result->FullName);?><br>
        <?php echo "ADDRESS :". htmlentities($result->user_address);?><br>
        <?php echo "PROFESSION  : ". htmlentities($result->user_profession);?>&nbsp;<?php echo htmlentities($result->Country); }}?></h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-sm-12">
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h3 class="uppercase underline">Post a Message</h3>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post">
<div class="form-group">
              <label class="control-label"><i class="fa fa-envelope"></i> Message</label>
              <input type="email" class="form-control white_bg" name="email" placeholder="Write EmailId"  required="">
            </div>

            <div class="form-group">
              <label class="control-label"><i class="fa fa-edit"></i> EmailId</label>
              <textarea class="form-control white_bg" name="testimonial" rows="4" placeholder="Compose Message Here" required=""></textarea>
            </div>


            <div class="form-group">
              <button type="submit" name="submit" class="btn">Send  <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting-->



</body>
</html>
<?php  ?>
