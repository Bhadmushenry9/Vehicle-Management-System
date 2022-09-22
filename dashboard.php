<?php

    $page_title = "Dashboard";
    require_once 'includes/fetch.php';
    require_once 'includes/header.php';
    require_once 'includes/nav.php';
    require_once 'includes/sidebar.php'; 


 ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Added Vehicles</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $vehicle_count . " Vehicle(s)" ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Content Row -->

<!--         <div class="row">
 -->
            <!-- Area Chart -->
<!--             <div class="col-xl-8 col-lg-7">
 --><!--                 <div class="card shadow mb-4">
 -->                    <!-- Card Header - Dropdown -->
                    <!-- <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- Card Body -->
                    <!-- <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                      </div>
                </div>
            </div> -->

            <!-- Pie Chart -->
            <!-- <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4"> -->
                    <!-- Card Header - Dropdown -->
                    <!-- <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- Card Body -->
                    <!-- <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Content Row -->
        <div class="row">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recently Added Vehicles</h6>
            </div>
                
        </div>
        <p></p>
        <div class="row">

            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                if(!isset($page) || $page < 1 || $page == 1){
                    $display_vehicle_query = querydb("SELECT * FROM vehicles WHERE userid = '$user' LIMIT 0,2");
                    if (mysqli_num_rows($display_vehicle_query) > 0) {
                        foreach ($display_vehicle_query as $vehicle) {
                            $vehicle_display = $vehicle['vehicle_img']; ?>
                            <div class="col-lg-4 py-2">

                                <!-- RECENT VEHICLES -->
                                <div class="card-group">
                                    <div class="card shadow">
                                        <div class="text-center">
                                                <img id="myImg" class="img-fluid card-img-top" style="width: 25rem; height: 15rem;" alt="Vehicle Image"
                                                    src=<?php echo "img/users/".$vehicle_display; ?>>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li><?php echo "Model: ".$vehicle['model']; ?></li>
                                                <li><?php echo "Color: ".$vehicle['color']; ?></li>
                                                <li><?php echo "Engine No: ".$vehicle['engine_no']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 

                            <div id="imgModal" class="modal">

                                <!-- The Close Button -->
                                <span class="close">&times;</span>

                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img_display">

                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                            </div> <?php
                                     
                        }
                    }
                }
                else{
                    $last = ($page - 1) * 2;
                    $display_vehicle_query = querydb("SELECT * FROM vehicles WHERE userid = '$user' LIMIT $last,2");
                    if (mysqli_num_rows($display_vehicle_query) > 0) {
                        foreach ($display_vehicle_query as $vehicle) {
                            $vehicle_display = $vehicle['vehicle_img']; ?>
                            <div class="col-lg-4 py-2">

                                <!-- RECENT VEHICLES -->
                                <div class="card-group">
                                    <div class="card shadow">
                                        <div class="text-center">
                                                <img id="myImg" class="img-fluid card-img-top" style="width: 25rem; height: 15rem;" alt="Vehicle Image"
                                                    src=<?php echo "img/users/".$vehicle_display; ?>>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li><?php echo "Model: ".$vehicle['model']; ?></li>
                                                <li><?php echo "Color: ".$vehicle['color']; ?></li>
                                                <li><?php echo "Engine No: ".$vehicle['engine_no']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 

                            <div id="imgModal" class="modal">

                                <!-- The Close Button -->
                                <span class="close">&times;</span>

                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img_display">

                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                            </div> <?php
                                     
                        }
                    }

                }
                
            ?>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 text-center">
                <?php 
                    $display_vehicle_query = querydb("SELECT * FROM vehicles WHERE userid = '$user'");
                    $count_items = mysqli_num_rows($display_vehicle_query);
                    $pages = ceil($count_items / 2); 
                    if (isset($_GET['page'])) { 
                        if ($_GET['page'] <= 1) { ?>
                            <a class="px-3">Prev</a> <?php
                        }
                        else{ ?>
                            <a href="?page=<?php echo $_GET['page'] - 1; ?>" class="px-3">Prev</a> <?php
                                                
                        }
                    } 
                    else{ ?>
                        <a class="px-3">Prev</a> <?php
                    }?>
                    
                    <?php for ($i=1; $i <= $pages; $i++) { ?>
                        <a href="?page=<?php echo $i ?>" class="px-3"><?php echo $i; ?></a> <?php
                    } 
                    if (isset($_GET['page'])) { 
                        if ($_GET['page'] >= $pages) { ?>
                            <a class="px-3">Next</a> <?php
                        }
                        else{ ?>
                            <a href="?page=<?php echo $_GET['page'] + 1; ?>" class="px-3">Next</a> <?php
                                                
                        }
                    } 
                    else{ ?>
                        <a class="px-3">Next</a> <?php
                    }?>
                    
            
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php  require_once 'includes/footer.php'; ?>