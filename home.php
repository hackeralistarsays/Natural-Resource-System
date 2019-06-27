<?php include 'components/authentication.php' ?>     
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/home-navigation.php' ?>  
<?php include 'admin/includes/config.php'
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>www.egertona..</title>
    <link rel="stylesheet" href="assets/css/base/main.css" type="text/css">
    <link rel="stylesheet" href="custom-confirm.css">
    <link rel="stylesheet" href="custom-confirm.css" />
    <link rel="stylesheet" href="assets/css/css/panel.css">

    <!--Side navigation bar-->   
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 80%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 20%;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 20px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 15px;
    color: red;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<!--/side navigation bar-->
    </head>
    <body>
        
    <script>
        $.growl("<?php echo $dialogue; ?> ", {
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            }								
        });
    </script>
        
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php" style="color:green"><i class="fa fa-home"></i> Home</a>
  <a href="controllers/form/notification-table.php"><i class="fa fa-bell"></i> Notifications</a>
  <a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a>
  <a href="permit.php"><i class="fa fa-envelope"></i> Permits</a>
  <a href="all-users.php"><i class="fa fa-eye"></i> View all users</a>
  <a href="components/logout.php" style=""><i class="fa fa-laptop" ></i> Logout</a>
</div>
       

<div id="main">
    <h2 style="color:blue">EGERTON NATURAL RESOURCE DEPARTMENT USER PAGE</h2>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
    
        
<div class="container"  style="background-image: url('userfiles/background-images/front-imag.jpg'); " style="background-image: opacity:0.1;" >
    <div class="row clearfix" >
        
        <div class="col-md-12 " data-wow-duration="2s" data-wow-delay=".4s">
            <h1 class="text-center" data-duration="2s" data-delay=".4s"style="color:green;">Welcome <?php echo $_SESSION['user_username']; ?>!</h1>
        </div>
        
        
        
<!--Meetng panel -->             
                        
    <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <h2 style="color:red"> <i class="fa fa-warning" style="color:red;font-size:45px;"></i> IMPORTANT NOTICE</h2>
                        </div>
                        <div class="panel-body">
                            <?php
$sql = "SELECT type,detail,PageName from tblpages where type='updates'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

  <!-- Dark Overlay-->
<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2><?php  echo $result->PageName; ?> </h2>
      <p><?php  echo $result->detail; ?> </p>
    </div>
   <?php } }?>
  </div>
</section>
                            
                        </div>
                        <div class="panel-footer" style="background-color:gray">
                            <a href="controllers/form/notification-table.php">View Details <i class="fa fa-arrow-right"></i></a>
                        </div>
                        </div>
                        
                </div>
        <!--Chat Panel StarTs Here-->
                <div class="col-md-6 col-sm-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                           <i class="fa fa-comments" style="font-size:35px;"></i> Chats Panel
                        </div>
                        <div class="panel-body">
                                                <?php
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,user.FullName,tbltestimonial.PostingDate from tbltestimonial join user on tbltestimonial.UserEmail=user.EmailId where tbltestimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        
              <h5><i class="fa fa-user"> <?php echo htmlentities($result->FullName);?></i><small class="pull-right text-muted">
            <i class="fa fa-clock-o fa-fw"></i><?php echo htmlentities($result->PostingDate); ?></small></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
    
        
            <p><a href="#" id="like"><i class="fa fa-thumbs-up" style="color:blue"></i> Likes </a>
               <a href="#" id="dislike"><i class="fa fa-thumbs-down" style="color:blue"></i> Dislikes</a>
               <a href="post-message.php" id="comment"><i class="fa fa-comment" style="color:blue"></i> comments</a></p>
               <p>-------------------------------------------------------------------------------------------------</p>             
          
        <?php }} ?>   
      
                        </div>
                        <div class="panel-footer" style="color:gray">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <p style="font-size:18px;color:green"><a href="post-message.php"><i class="fa fa-edit"></i> 
                                        Compose A New Message
                                    </a></p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                        
                        
                        
                        
                        
                        
        
        
            
                     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>  
    
          </div>
        
    </div>
</div>
     
        <footer style="background-color:black">
            <div class="col-md-6 col-md-12">
          <p class="text-center" style="color:green;position:">Copyright &copy; 2018 Project Portal. Brought To You By The Sevens</p>
        </div>
        
        </footer>
        
        
        
        
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
        
        
 <script src="custom-confirm.js"></script>
    <script>
        CustomConfirm('a', function (confirmed, element) {
            if (confirmed) {
                // do what you want (play with target element, ajax...)
                location.href = element.href;
            } else {
                // do something or... nothing, if you want to
            }
        });

        CustomConfirm('button', function (confirmed, element) {
            // play with the target element or anything else
            if (confirmed) {
                element.parentNode.remove();
            } else {
                var p = document.createElement('p');
                p.innerHTML = 'A Wise decision has been made for LI <strong>' + element.previousSibling.textContent + '</strong>';
                element.parentNode.parentNode.appendChild(p);
            }
        });
            </script>
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