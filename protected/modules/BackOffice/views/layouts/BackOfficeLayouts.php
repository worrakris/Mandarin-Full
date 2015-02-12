<!-- Index file ของ Admin Module -->
<?php /* @var $this Controller */ ?>
<?php
Yii::app()->theme = "Admin";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 1.11.0 -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/jquery-1.11.0.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <!--         AdminLTE dashboard demo (This is only for demo purposes) 
                <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>     
        
                 AdminLTE for demo purposes 
                <script src="js/AdminLTE/demo.js" type="text/javascript"></script>-->

<!--        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/vendors/jquery.slimscroll.min.js"></script>-->

        <title><?php echo CHtml::encode($this->pageTitle) . "[Back-Office]"; ?></title>
    </head>

    <body class="skin-blue">

        <header class="header">
           
            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/" class="logo">
                 <!--Add the class icon to your logo image or logo icon to add the margining--> 
                Mandarin Back-Office
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Yii::app()->user->fullname; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo Yii::app()->user->fullname; ?> - <?php echo Yii::app()->user->position; ?>
                                        <small>Member since <?php echo date('F, Y', strtotime(Yii::app()->user->created)); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!--                                    <li class="user-body">
                                                                        <div class="col-xs-4 text-center">
                                                                            
                                                                        </div>
                                                                        <div class="col-xs-4 text-center">
                                                                            
                                                                        </div>
                                                                        <div class="col-xs-4 text-center">
                                                                            
                                                                        </div>
                                                                    </li>-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?php echo CHtml::link('Profile',array('staff/update', 'id' => Yii::app()->user->id), array('class' => 'btn btn-default btn-flat' )); ?>
<!--                                        <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/default/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">


                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if (Yii::app()->user->isAdmin() || Yii::app()->user->isOperatorWeb() || Yii::app()->user->isMarketing()) { ?>
                        <li>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/tblNews/admin">
                                <i class="fa fa-comment-o"></i> <span>News Management</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (Yii::app()->user->isAdmin() || Yii::app()->user->isOperatorWeb() || Yii::app()->user->isMarketing() ) { ?>
                        <li>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/promotions/admin">
                                <i class="fa fa-tags"></i> <span>Promotion Management</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (Yii::app()->user->isAdmin() || Yii::app()->user->isOperatorWeb()) { ?>
                        <li>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/gallery/admin">
                                <i class="fa fa-picture-o"></i> <span>Gallery Management</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (Yii::app()->user->isAdmin() || Yii::app()->user->isOperatorWeb() || Yii::app()->user->isMarketing()) { ?>
                        <li>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/subscription/index">
                                <i class="fa fa-envelope"></i> <span>E-Newsletter</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (Yii::app()->user->isAdmin() || Yii::app()->user->isOperatorWeb() || Yii::app()->user->isMarketing()) { ?>
                        <li>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/contact/admin">
                                <i class="fa fa-inbox"></i> <span>Customer Contact</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (false) { ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-check-square-o"></i> <span>Reservation Management</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (false) { ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-print"></i> <span>Report</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (Yii::app()->user->isAdmin()) { ?>
                        <li>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/BackOffice/staff/admin">
                                <i class="fa fa-users"></i> <span>Staff Management</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $this->pageTitle; ?>

                    </h1>
                    <ol class="breadcrumb">
                        <?php
                        if (isset($this->breadcrumbs)) {
                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'links' => $this->breadcrumbs,
                                'homeLink' => CHtml::link('Home', Yii::app()->baseUrl . '/BackOffice/'),
                            ));
                        }
                        ?>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->
                    <div class="row">
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-12 connectedSortable">
                            <div>
                                <?php echo $content; ?>
                                <div class="clear"></div>
                            </div>

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    </body>
</html>
