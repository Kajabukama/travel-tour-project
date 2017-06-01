<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="#">
            <div class="profile-pic">
                <img src="img/default.png" alt="">
            </div>

            <div class="profile-info">
                <?php echo $fullname; ?><i class="zmdi zmdi-caret-down"></i>
            </div>
        </a>

        <ul class="main-menu">
            <li><a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a></li>
            <li><a href="logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a></li>
        </ul>
    </div>

    <ul class="main-menu">
        <li class="active">
            <a href="index-2.html"><i class="zmdi zmdi-home"></i> Home</a>
        </li>
        <li class="sub-menu">
            <a href="#"><i class="zmdi zmdi-account-circle"></i>User Accounts</a>
            <ul>
                <li><a href="create-account.php">Create Account</a></li>
                <li><a href="view-accounts.php">View Account</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="#"><i class="zmdi zmdi-folder-star"></i>Manage Category</a>
            <ul>
                <li><a href="create-category.php">Add Category</a></li>
                <li><a href="view-categories.php">View Category</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="#"><i class="zmdi zmdi-layers"></i>Manage Subcategory</a>
            <ul>
                <li><a href="create-subcategory.php">Add Subcategory</a></li>
                <li><a href="view-subcategories.php">View Subcategories</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="#"><i class="zmdi zmdi-shopping-basket"></i>Manage Packages</a>
            <ul>
                <li><a href="#">Create Package</a></li>
                <li><a href="#">View Packages</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="#"><i class="zmdi zmdi-swap-alt"></i>Manage Advertisement</a>
            <ul>
                <li><a href="#">Create Advertisement</a></li>
                <li><a href="#">View Advertisement</a></li>
            </ul>
        </li>
    </ul>
</aside>