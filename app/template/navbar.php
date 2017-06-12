
<?php
if (!isset($noNavbar)) {
?>
      <!-- Navigation -->
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">AdminPanelSiteName</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
    
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Mohamed <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> <?=$text_settings?></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i><?=$text_logout?></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

                    <ul class="nav navbar-top-links navbar-right">
                        <li><a href="/language"><?=$text_changelanguage?></a></li>
                    </ul>




            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li class="active_menu">
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i><?=$text_homepage?></a>
                        </li>
                        <li>
                            <a href="settings.php"><i class="fa fa-wrench fa-fw"></i> الاعدادات</a>
                        </li>						
                        <li class="active">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> ادارة الخدمات<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="rents.php"><i  class="glyphicon glyphicon-home"></i> خدمة 1</a>
                                </li>
                                <li>
                                    <a href="elect_invoices.php"> <i  class="glyphicon glyphicon-flash"></i> خدمة 2</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="people.php?do=manage"><i class="fa fa-users fa-fw"></i> Manage 1</a>
                        </li>
                        <li>
                            <a href="benefactors.php"><i class="fi-torsos-all"></i> Manage 2</a>
                        </li>
					
                       

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<?php
}// if (!isset($noNavbar)) {
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">