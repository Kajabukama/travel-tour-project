<?php require_once 'core/functions.php'; ?>
<?php
    if (isset($_SESSION['uid'])) {

        $messages = findAll('contactus');

        $uid = $_SESSION['uid'];
        $user = findById('users',$uid);


        $loggedName = $user['email'];
        $fullname = $user['firstname'].' '.$user['lastname'];

        $users = findAll('users');

        
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
                        
                    </div>

                    <div class="row">
                        <div class="col-sm-9 col-md-offset-2">
                        
                
                        <div class="card">
                            <div class="listview lv-bordered lv-lg">
                                <div class="lv-header-alt clearfix">
                                    <h2 class="lvh-label hidden-xs">Available user Accounts</h2>
                                    
                                    <div class="lvh-search">
                                        <input type="text" placeholder="Search users..." class="lvhs-input">
                    
                                        <i class="lvh-search-close">&times;</i>
                                    </div>
                                    
                                    <ul class="lv-actions actions">
                                        <li>
                                            <a href="#" class="lvh-search-trigger">
                                                <i class="zmdi zmdi-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    </div>
                                
                                    <div class="lv-body">
                                        <?php 
                                            foreach($users as $key => $value):
                                                $fllname = $value['firstname'].' '.$value['lastname'];
                                         ?>
                                            <div class="lv-item media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="img/default.png" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">
                                                        <?php echo $fllname; ?>
                                                    
                                                    </div>
                                                    <small class="lv-small"><?php echo $value['email'] ?></small>
                                                
                                                <ul class="lv-attrs">
                                                    <li>Date Created: <?php echo formatDate($value['created']);?></li>
                                                    <li>Role: <?php echo $value['type'];?></li>
                                                </ul>
                                                    <div class="lv-actions actions dropdown">
                                                        <a href="#" data-toggle="dropdown" aria-expanded="true">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>
                                    
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="update-account.php?userid=<?php echo $value['id'];?>">Edit</a></li>
                                                            <li><a href="delete.php?userid=<?php echo $value['id'];?>&action=delete-account">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
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