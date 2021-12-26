
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




    <?php if(isset($is_map) == '1'){ ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCacsBDwjLrbelc5v5iVLQbGltVF5-DE-o&signed_in=true&libraries=drawing"
         async defer></script>

        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        -->
        



            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
            <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <?php } ?>

 

    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart { 
            min-height: 335px; 
        }
        #flotPie1  {
            height: 150px;
        } 
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        } 

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

        #map {
        height: 100%;
        }
	  
        .labels {
        color: white;
        background-color: red;
        font-family: "Lucida Grande", "Arial", sans-serif;
        font-size: 10px;
        text-align: center;
        width: 30px;
        white-space: nowrap;
        }

    </style>
