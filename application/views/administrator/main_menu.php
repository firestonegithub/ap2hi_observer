   <!-- Left Panel --> 
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default"> 
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>administrator/home"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data Master</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Data Company</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="<?php echo base_url(); ?>master/add_master_supplier">Add Data</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/master_supplier">List Company</a></li>
                          
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-road"></i>Data Pelabuhan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="<?php echo base_url(); ?>master/add_master_landing">Add Data</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/master_landing">List Pelabuhan Sites</a></li>
                          
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-ship"></i>Data Vessels</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="<?php echo base_url(); ?>master/add_master_vessel">Add Vessel</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/master_vessel">Data Vessels</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sitemap"></i>Miscellaneous</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/kode_aktivitas">Kode Aktivitas</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/kode_ikan_terlihat">Ikan Terlihat</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/kode_terasosiasi">Ikan Terasosiasi</a></li> 
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/kode_posisi_pancing_etp">Kode Posisi Pancing ETP</a></li>   
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/kode_kondisi_etp">Kondisi ETP</a></li>
                             <li><i class="fa fa-table"></i><a href="<?php echo base_url(); ?>master/fishbank">Fish Bank</a></li>
                            
                                                    
                        </ul>
                    </li>
                 

                    <li class="menu-title">Trips</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Menu Trips</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="<?php echo base_url(); ?>trip/add_trip">New Trip Input PL</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="<?php echo base_url(); ?>trip_hl/add_trip">New Trip Input HL</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="<?php echo base_url(); ?>trip/list_trip_all">List Trip Approved</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="<?php echo base_url(); ?>trip/list_trip_draft">List Trip Draft</a></li>
                        </ul>
                    </li>
                    <li>
                  
                        <a href="<?php echo base_url(); ?>statistic/"> <i class="menu-icon ti-email"></i> Statistik</a>
                    </li>
                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Statistik Trips</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li> 

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-map-marker"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>-->
                    <li class="menu-title">User</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>User Lists</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="<?php echo base_url(); ?>user/add_user">Add Users</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="<?php echo base_url(); ?>user/user_list">User Lists</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="<?php echo base_url(); ?>user/user_detail">Profile</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="<?php echo base_url(); ?>user/role_editor">Role Editor</a></li>

                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel --> 
    <!-- Left Panel -->