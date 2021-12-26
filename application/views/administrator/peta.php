













<html>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MDPI X AP2HI Pole and Line System</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>/assets/admin/images/favicon.png">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/admin/assets/images/favicon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/css/pe-icon-7-filled.css">


    <link href="<?php echo base_url(); ?>/assets/admin/assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/admin/assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/css/style.css">
    <link href="<?php echo base_url(); ?>/assets/admin/assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>/assets/admin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 

    <script src="<?php echo base_url(); ?>/assets/admin/assets/datatables/jquery-3.3.1.js"></script>
    <link href="<?php echo base_url(); ?>/assets/admin/assets/datatables/jquery.dataTables.min.css" rel="stylesheet"> 
    <script src="<?php echo base_url(); ?>/assets/admin/assets/datatables/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/admin/assets/css/jquery-ui.css">
    <script src="<?php echo base_url(); ?>/assets/admin/assets/js/jquery-ui.js"></script>

    <script src="<?php echo base_url(); ?>/assets/admin/assets/charts/canvasjs.min.js"></script>

    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCacsBDwjLrbelc5v5iVLQbGltVF5-DE-o&signed_in=true&libraries=drawing"
         async defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>




  <body onload="init();">


  <?php include "main_menu.php"; ?>


  
  
    <!-- Right Panel --> 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <a class="navbar-brand" href="./">AP2HI Pole n Line System </a>
                    <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url(); ?>/assets/admin/images/logo.png" alt="Logo"></a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <?php 
                                         $ci = & get_instance();

                                         $query = $ci->Model_trip->count_trip(2);

                                         $jumlah_draft = $query->num_rows();

                                         $show_notif = 0;

                                         $show_notif = $jumlah_draft + 1;
                                    ?>

                                <span class="count bg-danger"><?php echo $show_notif; ?>  </span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have <?php echo $show_notif; ?> Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>This is System BETA V2. </p>

                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    
                                    <?php if($jumlah_draft > 0 ){ ?>
                                        <p>There are <?php echo $jumlah_draft; ?> draft awaiting for review</p>
                                    <?php } ?>
                                    
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">1</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 1 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo base_url(); ?>/assets/admin/images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">System Developer</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, This already updated by the latest version</p>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php 

                            $ci = & get_instance();

                            $photo = $ci->session->userdata('photos'); 


                            ?>
                           <!-- <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>/assets/admin/images/admin.jpg" alt="User Avatar">-->
                            <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>/assets/users/<?php echo $photo; ?>" alt="">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url(); ?>user/user_detail"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div> 
                </div>  
            </div>
        </header><!-- /header -->
        <!-- Header-->


                     

  			
  <div class="clearfix"></div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12"> 
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">User lists </h4>
                            </div>
                            <div class="card-body--">

                                 
                            <div id="map"  style="height: 1000px; width: 1200;"></div>  

 
							</div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->

                 
                </div> 
            </div> <!-- /.order -->


           


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; <?php echo date('Y'); ?> MDPI
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://mickrabbit.com">Mick</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->





            <?php include('main_footer.php'); ?>



            </body>
</html>


	
	
<script type="text/javascript">


function init() {

map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: {lat: -5.2018543, lng: 128.4820647},
	minZoom: 4,
				panControl: true,
				panControlOptions: {
				  position: google.maps.ControlPosition.TOP_RIGHT
				},
				zoomControl: true,
				zoomControlOptions: {
				  style: google.maps.ZoomControlStyle.LARGE,
				  position: google.maps.ControlPosition.TOP_RIGHT
				},
	 mapTypeId: 'hybrid'
	
  });

}

    </script>