<?php require_once 'core/functions.php'; ?>
<?php
    if (isset($_SESSION['uid'])) {
        
        $uid = $_SESSION['uid'];
        $packages = findAll('package');
        $categories = findAll('category'); 
        $subcategory = findAll('subcategory');
        $messages = findAll('contactus');

        // get the logged in user

        $user = findById('users',$uid);
        $fullname = $user['firstname'].' '.$user['lastname'];
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
            
            
            <section id="content">
                <div class="container">
                    
                    <div class="mini-charts">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-cyan">
                                    <div class="clearfix">
                                        <div class="chart">
                                            <i class="zmdi zmdi-account-circle icon-dash"></i>
                                        </div>
                                        <div class="count">
                                            <small>Registered Users</small>
                                            <h2><?php echo countAll('users');?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-lightgreen">
                                    <div class="clearfix">
                                        <div class="chart">
                                            <i class="zmdi zmdi-folder-star icon-dash"></i>
                                        </div>
                                        <div class="count">
                                            <small>Categories</small>
                                            <h2><?php echo countAll('category');?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-orange">
                                    <div class="clearfix">
                                        <div class="chart">
                                            <i class="zmdi zmdi-layers icon-dash"></i>
                                        </div>
                                        <div class="count">
                                            <small>Sub Categories</small>
                                            <h2><?php echo countAll('subcategory');?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="mini-charts-item bgm-bluegray">
                                    <div class="clearfix">
                                        <div class="chart">
                                            <i class="zmdi zmdi-shopping-basket icon-dash"></i>
                                        </div>
                                        <div class="count">
                                            <small>Available Packages</small>
                                            <h2><?php echo countAll('package');?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Recent Posts -->
                            <div class="card">
                                <div class="card-header ch-alt m-b-20">
                                    <h2>Avaialable Packages <small>List of available Packages offered by My Tour, Click on the package for its details</small></h2>
                                </div>
                                
                                <div class="card-body">
                                    <div class="listview">
                                        <?php foreach($packages as $key => $value): ?>

                                        <a class="lv-item" href="#">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="../Admin/packimages/<?php echo $value['Pic1']; ?>" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title"><?php echo $value['Packname']; ?></div>
                                                    <small class="lv-small"><?php echo $value['Detail']; ?></small>
                                                </div>
                                            </div>
                                        </a>
                                        <?php endforeach; ?>

                                        <a class="lv-footer" href="#">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- Recent Items -->
                            <div class="card">
                                <div class="card-header">
                                    <h2>Sub Category <small>List of all sub categories for various packages offered by My Tour.</small></h2>
                                    
                                </div>
                                
                                <div class="card-body m-t-0">
                                    <table class="table table-inner table-vmiddle">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($subcategory as $key => $value): ?>
                                            <tr>
                                                <td class="f-500 c-cyan"><?php echo $value['catid']; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <th><?php echo $value['description']; ?></th>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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