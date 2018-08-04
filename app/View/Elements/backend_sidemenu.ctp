<?php
    $user = $_SESSION['Auth'];
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="<?php echo $company_name; ?>" class="img-responsive" src="<?php echo $this->webroot.$company_logo; ?>" style="margin-bottom: 15px;"/>
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo ucwords($user['User']['f_name']." " . $user['User']['l_name']); ?></strong>
                     </span> <span class="text-muted text-xs block"><?php echo ucwords($user['User']['Group']['name']); ?><b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo $this->webroot; ?>users/profile">Profile</a></li>
                        <li><a href="<?php echo $this->webroot; ?>users/change_password">Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->webroot; ?>users/logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
               
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">My profile</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo $this->webroot; ?>users/profile">My profile</a></li>
                    <!-- <li><a href="<?php echo $this->webroot; ?>pincodemasters">Bank details</a></li> -->
                    <?php 
                        if ($user['User']['group_id'] == '4') {
                    ?>
                    <li><a href="<?php echo $this->webroot; ?>vendors/vendor_business_info">Business / pickup address</a></li>
                    <li><a href="<?php echo $this->webroot; ?>vendors/compliance_details">Compliance details</a></li>
                    <li><a href="<?php echo $this->webroot; ?>vendors/vendor_bank_details">bank details</a></li>
                    <li><a href="<?php echo $this->webroot; ?>vendors/vendor_working_details">Business / Working calender</a></li>
                    <?php } ?>
                    <li><a href="<?php echo $this->webroot; ?>users/change_password">Change password</a></li>
                </ul>
            </li>
            <?php 
                if ($user['User']['group_id'] == '1' || $user['User']['group_id'] == '2') {
            ?>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo $this->webroot; ?>settings/project_setting">General Setting</a></li>
                    <li><a href="<?php echo $this->webroot; ?>pincodemasters">Pincode Master</a></li>
                    <li><a href="<?php echo $this->webroot; ?>slidermasters">Slider Master</a></li>
                </ul>
            </li>
            <li>
                <a href="layouts.html"><i class="fa fa-user-o"></i> <span class="nav-label">Manage users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo $this->webroot; ?>users/user_type">User type</a></li>
                    <li><a href="<?php echo $this->webroot; ?>users/add_new_user">Add new user</a></li>
                </ul>
            </li>
            <?php
                }
            ?>
            <li>
                <a><i class="fa fa-diamond"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <?php 
                        if ($user['User']['group_id'] == '1' || $user['User']['group_id'] == '2') {
                    ?>
                    <li><a href="<?php echo $this->webroot; ?>brandmasters">Brand Master</a></li>
                    <li><a href="<?php echo $this->webroot; ?>categories/index">Categories</a></li>
                    <li><a href="<?php echo $this->webroot; ?>categories/add">Add category</a></li>
                    <?php
                        }
                    ?>
                    <li><a href="<?php echo $this->webroot; ?>products/index">Product List</a></li>
                    <li><a href="<?php echo $this->webroot; ?>products/add">Add Product</a></li>
                </ul>
            </li>
            <?php 
                if ($user['User']['group_id'] == '1' || $user['User']['group_id'] == '2') {
            ?>
            <li>
                <a href="<?php echo $this->webroot; ?>discounts"><i class="fa fa-envelope"></i> <span class="nav-label">Discount coupens</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Prescription</span>  </a>
            </li>
            <?php
                }
            ?>
            <li>
                <a href="widgets.html"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Orders</span></a>
            </li>
            <?php 
                if ($user['User']['group_id'] == '1' || $user['User']['group_id'] == '2') {
            ?>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Chatboard</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">Basic form</a></li>
                </ul>
            </li>
            <li class="landing_link">
                <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
            </li>
            <li class="special_link">
                <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
            </li>
            <?php
                }
            ?>
        </ul>

    </div>
</nav>