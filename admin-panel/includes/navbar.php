<?php 
   
   $user_check = $_SESSION['login_user'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }


?>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Railwala</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo($user_check )?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Profile</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            
                            
                            <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-product-hunt fa-fw"></i>Advertisement<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="product.php"><i class="fa fa-plus fa-fw"></i>Create</a>
                                </li>
                                
                                <li class="divider"></li>
                                <li><a href="products.php"><i class="fa fa-eye fa-fw"></i>View</a>
                                </li>
                            </ul>
                        </li>

                        </ul>
                    </div>
                </div>
            </nav>
        <script type="text/javascript" src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script type="text/javascript" src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script type="text/javascript" src="../js/raphael.min.js"></script>
        <script type="text/javascript" src="../js/morris.min.js"></script>
        <script type="text/javascript" src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="../js/startmin.js"></script>

    </body>