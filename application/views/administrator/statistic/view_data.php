        

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data <?php echo $name ; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#"><?php echo $name ; ?></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




           <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                    Catch Composition 
                            </div>


                            <div class="card-body">

                               <div id="Pie" style="height: 370px; width: 100%;"></div> 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->




        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                   FAD USAGE
                            </div>


                            <div class="card-body">

                               <div id="Bar" style="height: 370px; width: 100%;"></div> 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                   Length Frequency
                            </div>


                            <div class="card-body">

                               <div id="Line" style="height: 370px; width: 100%;"></div> 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                LENGTH TO WEIGHT RATIO (ALL UOA)
                            </div>


                            <div class="card-body">

                               <div id="Point" style="height: 370px; width: 100%;"></div> 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


		<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-header">
                                LENGTH TO WEIGHT RATIO (ALL UOA)
                            </div>


                            <div class="card-body">

							<div id="Line2" style="height: 370px; width: 100%;"></div>

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

		 




        <script>


window.onload = function() {

var chart = new CanvasJS.Chart("Pie", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Desktop Browser Market Share in 2016"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: 51.08, label: "Chrome" },
			{ y: 27.34, label: "Internet Explorer" },
			{ y: 10.62, label: "Firefox" },
			{ y: 5.02, label: "Microsoft Edge" },
			{ y: 4.07, label: "Safari" },
			{ y: 1.22, label: "Opera" },
			{ y: 0.44, label: "Others" }
		]
	}]
});
chart.render();











var chart1 = new CanvasJS.Chart("Bar", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Composition of Internet Traffic in North America"
	},
	axisX: {
		interval: 1,
		intervalType: "year",
		valueFormatString: "YYYY"
	},
	axisY: {
		suffix: "%"
	},
	toolTip: {
		shared: true
	},
	legend: {
		reversed: true,
		verticalAlign: "center",
		horizontalAlign: "right"
	},
	data: [

	{
		type: "stackedColumn100",
		name: "YFT",
		showInLegend: true,
		dataPoints: [
			{ label: "Company 1", y: 40 },
			{ label: "Company 2", y: 50 },
			{ label: "Company 3", y: 60 },
			{ label: "Company 4", y: 61 },
			{ label: "Company 5", y: 63 },
			{ label: "Company 6", y: 65 },
			{ label: "Company 7", y: 67 }
		]
	}, 
	{
		type: "stackedColumn100",
		name: "BET",
		showInLegend: true,
		dataPoints: [
			{ label: "Company 1", y: 10 },
			{ label: "Company 2", y: 20 },
			{ label: "Company 3", y: 30 },
			{ label: "Company 4", y: 40 },
			{ label: "Company 5", y: 50 },
			{ label: "Company 6", y: 60 },
			{ label: "Company 7", y: 70 }
		]
	}, 
	{
		type: "stackedColumn100",
		name: "SKJ",
		showInLegend: true,
		dataPoints: [
			{ label: "Company 1", y: 11 },
			{ label: "Company 2", y: 12 },
			{ label: "Company 3", y: 13 },
			{ label: "Company 4", y: 14 },
			{ label: "Company 5", y: 15 },
			{ label: "Company 6", y: 18 },
			{ label: "Company 7", y: 17 }
		]
	},
	{
		type: "stackedColumn100",
		name: "ALB",
		showInLegend: true,
		dataPoints: [
			{ label: "Company 1", y: 44 },
			{ label: "Company 2", y: 55 },
			{ label: "Company 3", y: 11 },
			{ label: "Company 4", y: 22 },
			{ label: "Company 5", y: 33 },
			{ label: "Company 6", y: 44 },
			{ label: "Company 7", y: 13 }
		]
	},
	{
		type: "stackedColumn100",
		name: "UN",
		showInLegend: true,
		dataPoints: [
		]
	}
	
	]
});
chart1.render();













var chart = new CanvasJS.Chart("Line", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Top Oil Reserves"
	},
	axisY: {
		title: "Reserves(MMbbl)"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "MMbbl = one million barrels",
		dataPoints: [      
			{ y: 300878, label: 5 },
			{ y: 266455,  label: 10 },
			{ y: 169709,  label: 15 },
			{ y: 158400,  label: 20 },
			{ y: 142503,  label: 25 },
			{ y: 101500, label: 30 },
			{ y: 101500, label: 35 },
			{ y: 101500, label: 40 },
			{ y: 101500, label: 45 },
			{ y: 101500, label: 50 },
			{ y: 101500, label: 55 },

		]
	}]
});
chart.render();









var chart = new CanvasJS.Chart("Point", {
	animationEnabled: true,
	title:{
		text: "Server Performance"
	},
	axisX: {
		title:"Server Load (in TPS)"
	},
	axisY:{
		title: "Response Time (in ms)",
		includeZero: true
	},
	data: [{
		type: "scatter",
		toolTipContent: "<span style=\"color:#4F81BC \"><b>{name}</b></span><br/><b> Load:</b> {x} TPS<br/><b> Response Time:</b></span> {y} ms",
		name: "Server Pluto",
		showInLegend: true,
		dataPoints: [
			{ x: 23, y: 330 },
			{ x: 28, y: 390 },
			{ x: 39, y: 400 },
			{ x: 34, y: 430 },
			{ x: 24, y: 321 },
			{ x: 29, y: 250 },
			{ x: 29, y: 370 },
			{ x: 23, y: 290 },
			{ x: 27, y: 250 },
			{ x: 34, y: 380 },
			{ x: 36, y: 320 },
			{ x: 33, y: 405 },
			{ x: 32, y: 453 },
			{ x: 21, y: 292 }
		]
	},
	{
		type: "scatter",
		name: "Server Mars",
		showInLegend: true, 
		toolTipContent: "<span style=\"color:#C0504E \"><b>{name}</b></span><br/><b> Load:</b> {x} TPS<br/><b> Response Time:</b></span> {y} ms",
		dataPoints: [
			{ x: 19, y: 200 },
			{ x: 27, y: 300 },
			{ x: 35, y: 330 },
			{ x: 32, y: 190 },
			{ x: 29, y: 189 },
			{ x: 22, y: 150 },
			{ x: 27, y: 200 },
			{ x: 26, y: 190 },
			{ x: 24, y: 225 },
			{ x: 33, y: 330 },
			{ x: 34, y: 250 },
			{ x: 30, y: 120 },
			{ x: 37, y: 153 },
			{ x: 24, y: 196 }
		]
	}]
});
chart.render();





var chart = new CanvasJS.Chart("Line2", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Simple Line Chart"
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
			{ label:"Company 1" , y: 450 },
			{ label:"Company 2" ,y: 414 },
			{ label:"Company 3" ,y: 520 },
			{ label:"Company 4" ,y: 460 },
			{ label:"Company 5" ,y: 450 },
			{ label:"Company 6" , y: 500 },
			
		]
	}]
});
chart.render();


}


</script>