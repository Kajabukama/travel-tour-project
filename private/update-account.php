<?php require_once 'core/functions.php'; ?>
<?php
    if (isset($_SESSION['uid'])) {

        $messages = findAll('contactus');

        $uid = $_SESSION['uid'];


        $user = findById('users',$uid);
        $loggedName = $user['email'];
        $fullname = $user['firstname'].' '.$user['lastname'];

        $userid = $_GET['userid'];
        $edit = findById('users',$userid);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = clean($_POST['email']);
            $password = $_POST['password'];

            

            $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' WHERE id = $userid";

            $result = mysqli_query($link, $query);
            if (mysqli_affected_rows($link) == 1) {
                header('Location:view-accounts.php');
            }

        }
    } else {
        header('Location:../');
    }

?>
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Tour - Admin Dashboard</title>

        <!-- Vendor CSS -->
        <link href="vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
            
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        
    </head>
    <body>
        <?php include('views/top.header.php'); ?>
        
        <section id="main" data-layout="layout-1">
            <?php include('views/side.menu.php'); ?>
            <?php include('views/side.chats.php'); ?>
            
        
            <section id="content">
                <div class="container">
                    
                    <div class="block-header">
                        <h2>Logged in as : <?php echo $loggedName; ?></h2>
                    
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                    
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="view-accounts.php">View Accounts</a></li>
                                    <li><a href="create-account.php">Add Account</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-offset-3">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Update Account <small>System administrator account modification.</small></h2>
                                </div>
                                
                                <div class="card-body card-padding">
                                    <form role="form" action="" method="POST">
                                        <div class="form-group fg-line">
                                            <label for="inputFirstname">First Name</label>
                                            <input type="text" class="form-control input-sm" id="inputFirstname" value="<?php echo $edit['firstname']; ?>" name="firstname">
                                        </div>

                                        <div class="form-group fg-line">
                                            <label for="inputLastname">Last Name</label>
                                            <input type="text" class="form-control input-sm" id="inputLastname" value="<?php echo $edit['lastname']; ?>" name="lastname">
                                        </div>

                                        <div class="form-group fg-line">
                                            <label for="inputEmail">Email address</label>
                                            <input type="email" class="form-control input-sm" id="inputEmail" value="<?php echo $edit['email']; ?>"  name="email">
                                        </div>
                                        <div class="form-group fg-line">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" class="form-control input-sm" id="inputPassword" value="<?php echo $edit['firstname']; ?>"  name="password">
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
        </section>
        
        <footer id="footer">
            Copyright &copy; <?php echo date('Y') ?> My Tour Dashboard
            
            <ul class="f-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-cyan">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>
        
        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        <script src="js/functions.js"></script>
        <script src="js/demo.js"></script>

        
    </body>
  
<!-- Mirrored from byrushan.com/projects/ma/1-5-2/jquery/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2017 08:38:16 GMT -->
</html>