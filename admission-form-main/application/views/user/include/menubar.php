<style type="text/css">
    .pcoded .pcoded-header .navbar-logo[logo-theme="theme1"] {
    background-color: #b40303;
}
</style>
<body class="horizontal-icon">
    <!-- Pre-loader start -->
<!--     <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div> -->
  

    <div id="pcoded" class="pcoded">
        <div class="pcoded-container">            
            <nav class="navbar header-navbar pcoded-header" style="background: #b40303;">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="<?php echo base_url();?>user/dashboard">
                            <!-- <img class="img-fluid" src="<?php echo base_url();?>assets/logo_vivek.png" alt="DAV Hazaribagh" style="width:46%"/> -->
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">                                       
                                        <span><?php echo $_SESSION['name']; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                      <!--   <li>
                                            <a href="<?php echo base_url();?>user/user_profile">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li> -->
                                        
                                        <li>
                                            <a href="<?php echo base_url();?>logout">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
           
            <div class="pcoded-main-container">
               
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">