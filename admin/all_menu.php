<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ALL MENU</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .navbar-brand img {
        width: 50px !important; 
        height: auto;
        padding-left: 10px !important;
    
        }
        </style>
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
                 <!-- Logo -->
                 <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="images/icon-logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span><img src="images/icon-logo.png" alt="homepage" class="dark-logo" /></span> -->
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/profile.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false">  <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">All Users</a></li>
								<li><a href="add_users.php">Add Users</a></li>
								
                               
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Category</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="allrestraunt.php">All Category</a></li>
                                <li><a href="add_restraunt.php">Add Category</a></li>
                                
                            </ul>
                        </li>
                      <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">All Orders</a></li>
								  
                            </ul>
                        </li>
                         
                    </ul>
                </nav>
            </div>
        </div>
        <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                
            </div>
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
						     <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Menu data</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
								
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
											 <th>Category</th>
                                                <th>Dish-Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                               <th>Action</th>
												  
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
										
                                           
                                        <?php
$sql_restaurant = "SELECT * FROM restaurant order by rs_id desc";
$query_restaurant = mysqli_query($db, $sql_restaurant);

$overallNumber = 1; // Nomor urut keseluruhan

if (mysqli_num_rows($query_restaurant) > 0) {
    while ($restaurant = mysqli_fetch_array($query_restaurant)) {
        $category = $restaurant['category'];
        $rs_id = $restaurant['rs_id'];
        $sql_dishes = "SELECT * FROM dishes WHERE rs_id = $rs_id order by d_id desc";
        $query_dishes = mysqli_query($db, $sql_dishes);

        if (mysqli_num_rows($query_dishes) > 0) {
            while ($dish = mysqli_fetch_array($query_dishes)) {
                echo '<tr><td>' . $overallNumber . '</td>';
                echo '<td>' . $category . '</td>';
                echo '<td>' . $dish['title'] . '</td>';
                echo '<td>' . $dish['slogan'] . '</td>';
                echo '<td>Rp' . $dish['price'] . '</td>';
                echo '<td>
                    <div class="col-md-3 col-lg-8 m-b-10">
                        <center><img src="Res_img/dishes/' . $dish['img'] . '" class="img-responsive radius" style="min-width:150px;min-height:100px;"/></center>
                    </div>
                </td>
                <td>
                    <a href="delete_menu.php?menu_del=' . $dish['d_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">
                        <i class="fa fa-trash-o" style="font-size:16px"></i>
                    </a> 
                    <a href="update_menu.php?menu_upd=' . $dish['d_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5">
                        <i class="ti-settings"></i>
                    </a>
                </td>';
                echo '</tr>';
                $overallNumber++; // Tambahkan nomor keseluruhan
            }
        } else {
            echo '<tr><td>' . $category . '</td><td colspan="4"><center>No Dish Data!</center></td></tr>';
        }
    }
} else {
    echo '<tr><td colspan="6"><center>No Category Data!</center></td></tr>';
}

?>     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>
 
</html>