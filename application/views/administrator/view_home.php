

<div class="content pb-0">
            
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7f-rocket"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text"><span class="count"><?php echo $total_trips['total'];  ?></span></div>
                                        <div class="stat-heading">Total Trips </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7f-car"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count"><?php echo $total_vessel['total'];   ?></span></div>
                                        <div class="stat-heading">Total Vessels </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7f-browser"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text"><span class="count"><?php echo $total_supp['total'];  ?></span></div>
                                        <div class="stat-heading">Total Suplier</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7f-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text"><span class="count"><span class="count"><?php echo $total_user['total'];  ?></span></div>
                                        <div class="stat-heading">Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Widgets End -->
			
			
            <div class="clearfix"></div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12"> 
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">User lists </h4>
                            </div>
                            <div class="card-body--">
                                 
                                     <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id_user</th>
                                                    <th>Profile</th>
                                                    <th>username</th>
                                                    <th>name</th>
                                                    <th>address</th>
                                                    <th>no_telp</th>
                                                    <th>no_hp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                 foreach ($list_users->result_array() as $row){

                                                ?>
                                                <tr>
                                                    <td><?php echo $row['id_user'] ?></td>
                                                    <td class="avatar pb-0">
                                                    <div class="round-img">
                                                        <a href="#"><img class="rounded-circle" src="<?php echo base_url(); ?>/assets/users/<?php echo $row['photo']; ?>" alt="" 
                                                        <?php if( $row['photo'] != ""){ ?>
                                                        width="50" height="50"
                                                        <?php } ?>
                                                        ></a> 
                                                    </div>
                                                    </td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['address'] ?></td>
                                                    <td><?php echo $row['no_telp'] ?></td>
                                                    <td><?php echo $row['no_hp'] ?></td>
                                                   
                                                </tr>

                                                <?php 
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                  <tr>
                                                    <th>id_user</th>
                                                    <th>Profile</th>
                                                    <th>username</th>
                                                    <th>name</th>
                                                    <th>address</th>
                                                    <th>no_telp</th>
                                                    <th>no_hp</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                          
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->

                 
                </div> 
            </div> <!-- /.order -->



            <div class="clearfix"></div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12"> 
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">   Daily Log observer Map </h4>
                            </div>
                            <div class="card-body--">

                            <div class="row">
						

						<div class="col-md-12 header-kanan">
								<div class="row">
								<div class="col-md-12" style="margin-top: 0;">   
								<div class="row">
										
											<div class="col-md-8">
												<div class="toolbar-atas toolbar-options">
												
												<div class="alert alert-info" role="alert">
												<div><strong>Tools:</strong></div>
														<div>
															<button type="button" title="Move Tool" id="" onclick="handTool()" class="btn btn-default btn-lg" data-placement="bottom">
															  <!-- handtool --><span class="glyphicon glyphicon-move"></span></button>
															
															<button type="button" title="Put Marker" id="" onclick="drawMarker()" class="btn btn-default btn-lg">
															   <!-- drop pin location --><span class="glyphicon glyphicon-map-marker"></span></button>
													
															<button type="button" title="Draw Circle" id="" onclick="drawCircle()"  class="btn btn-default btn-lg">
															  <!-- draw circle --><span class="glyphicon glyphicon-record"></span></button>
												  
															<button title="Draw Polyline" id="" onclick="drawPolyline()" type="button" class="btn btn-default btn-lg">
															<!-- draw line --><span class="glyphicon glyphicon-pencil"></span></button>
													
															<button type="button" title="Draw Rectangle" id="" onclick="drawRectangle()" class="btn btn-default btn-lg">
														   <!-- draw square --><span class="glyphicon glyphicon-stop"></span></button>
													   
															<button type="button" title="Draw Polygon" id="" onclick="drawPolygon()" class="btn btn-default btn-lg">
															<span class="glyphicon glyphicon-th-large"></span></button>
												   
															<button id="clearOverlay" title="Clear Drawing" type="button"  class="btn btn-default btn-lg">
															<!-- erase -->
													
															<span class="glyphicon glyphicon-remove"></span></button>
													
															<button type="button" class="btn btn-default btn-lg" onclick="window.print()">
																<span class="glyphicon glyphicon-print"></span>
															</button>
																						   
															 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
																	<span class="glyphicon glyphicon-check"></span>
															 </button>

																
														</div>
												</div>
																
											</div>
										</div>
										
										<div class="col-md-4"  >
												<div class="alert alert-info" role="alert">
													<div class="eventtext">
													<div>coordinate: <span id="latlong"></span></div>
														<div id="div-result" class="">Result: <span id="result"></span></div>
													</div>
												</div>
												
										</div>
											
											
										
								</div>
								</div>
								</div>
						</div>
						 
                    </div>


                    <form class="form-horizontal" method="post" id="searchGraph">


                            <div class="form-group"> <!-- here add class has-error -->
                                <label for="province" class="col-sm-2 control-label">Pilih Provinsi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kode_provinsi" name="kode_provinsi">
                                        <option value="All"> All Province </option>
                                        <?php foreach($listsProvince->result() as $row){  ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group"> <!-- here add class has-error -->
                                <label for="supplier" class="col-sm-2 control-label">Pilih Supplier</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kode_perusahaan" name="kode_perusahaan">
                                        <option value="All"> All Supplier </option>
                                        <?php foreach($listsSupplier->result() as $row){  ?>
                                            <option value="<?php echo $row->id_supplier; ?>"><?php echo $row->nama_perusahaan; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                  <div class="form-group"> <!-- here add class has-error -->
                                <label for="supplier" class="col-sm-2 control-label">Pilih Aktivitas</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kode_aktivitas" name="kode_aktivitas">
                                        <option value="All"> All Aktivitas </option>
                                        <?php foreach($listsAktivitas->result() as $row){  ?>
                                            <option value="<?php echo $row->kode_aktivitas; ?>"><?php echo $row->nama_aktivitas; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group"> <!-- here add class has-error -->
                                <label for="supplier" class="col-sm-2 control-label">Pilih Alat Tangkap</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="alat_tangkap" name="alat_tangkap">
                                        <option value="All"> All Alat Tangkap </option>
                                        <option value="HL"> Handline </option>
                                        <option value="PL"> Pole And Line </option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group"> <!-- here add class has-error -->
                                <label for="date" class="col-sm-2 control-label">Pilih Tanggal</label>
                                    <div class="col-sm-10">

                                        <input class="form-control" type="text" name="date" id="date" />

                                       
                                    </div>
                                </div>   

                                <div class="form-group"> <!-- here add class has-error -->
                                <label for="date" class="col-sm-2 control-label">Pilih All Tanggal</label>
                                    <div class="col-sm-10">

                                      
                                        <input class="form-control" type="checkbox" name="isDate" id="isDate"  />

                                    </div>
                                </div> 

                                <div class="form-group"> <center> <button type="button" class="btn btn-success" id="SubmitGraph"> Search </button> </center> </div>
                            
                                
                                 </form>
                               
                             <div class="messages"></div>                   
                                                    
	
                            <div id="map"  style="height: 1000px; width: 1200;"></div>  


 
							</div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->

                 
                </div> 
            </div> <!-- /.order -->

  
            
        



<script type="text/javascript">

var map;



var drawingManager;
var newShape;  
var all_overlays = [];
var kmlLayer;
var markers = [];
var polygons = [];



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


  drawingManager = new google.maps.drawing.DrawingManager({
			drawingMode: null,
			drawingControl: false,
			drawingControlOptions: {
			  position: google.maps.ControlPosition.TOP_CENTER,
			  drawingModes: [
				google.maps.drawing.OverlayType.MARKER,
				google.maps.drawing.OverlayType.CIRCLE,
				google.maps.drawing.OverlayType.POLYGON,
				google.maps.drawing.OverlayType.POLYLINE,
				google.maps.drawing.OverlayType.RECTANGLE
			  ]
			},
			markerOptions: {
			 /* icon: 'img/marker-house.png',*/
			  animation: google.maps.Animation.DROP
			},
			polylineOptions:{
				strokeColor: "#FF0000",
				strokeOpacity: 0.6,
				strokeWeight: 3,
				clickable: true,
				editable: true
				},
			polygonOptions:{
				fillColor:'#5DE044',
				strokeColor:'#009B0C',
				fillOpacity:0.6,
				clickable: true,
				editable: true
				},
			rectangleOptions:{
				fillColor:'#7ED2FF',
				strokeColor:'#0092E0',
				fillOpacity:0.6,
				clickable: true,
				editable: true
				},
			circleOptions: {
			  fillColor: '#ffff00',
			  fillOpacity: 0.7,
			  strokeWeight: 3,
			  clickable: false,
			  editable: true,
			  zIndex: 1
			}
		  });
  		drawingManager.setMap(map);



        google.maps.event.addListener(map,'mousemove',function(event) {
		    document.getElementById('latlong').innerHTML = event.latLng.lat().toFixed(5) + ', ' + event.latLng.lng().toFixed(5)
		});	

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
 		 all_overlays.push(event);
	
				 if (event.type == google.maps.drawing.OverlayType.CIRCLE) {
				var radius = event.overlay.getRadius();
				document.getElementById('result').innerHTML=((3.1415927*Math.pow(radius,2))/1000000).toPrecision(7)+"km<sup>2<\/sup>";
				 
				 newShape = event.overlay;
				newShape.type = event.type;
				 
				 google.maps.event.addListener(newShape, 'radius_changed', function(){
				radius = event.overlay.getRadius();
				document.getElementById('result').innerHTML=((3.1415927*Math.pow(radius,2))/1000000).toPrecision(7)+"km<sup>2<\/sup>";
				  });
				 
				 }
		 
				 else if (event.type == google.maps.drawing.OverlayType.POLYLINE) {
				var coordinate = event.overlay.getPath();
				
				var panjang=google.maps.geometry.spherical.computeLength(coordinate);
				//alert(panjang);
				document.getElementById('result').innerHTML=(panjang/1000).toPrecision(7)+' km';
				
				 
				 
				 newShape = event.overlay;
				 newShape.type = event.type;
				 
				var path = newShape.getPath();
				google.maps.event.addListener(path, 'insert_at', function(){
				//coordinate = newShape.getPath();
				panjang=google.maps.geometry.spherical.computeLength(coordinate);
				//alert(panjang);
				document.getElementById('result').innerHTML=(panjang/1000).toPrecision(7)+' km';
				}); 
				google.maps.event.addListener(path, 'remove_at', function(){
				//coordinate = newShape.getPath();
				panjang=google.maps.geometry.spherical.computeLength(coordinate);
				//alert(panjang);
				document.getElementById('result').innerHTML=(panjang/1000).toPrecision(7)+' km';
				}); 
				google.maps.event.addListener(path, 'set_at', function(){
				//coordinate = newShape.getPath();
				panjang=google.maps.geometry.spherical.computeLength(coordinate);
				//alert(panjang);
				document.getElementById('result').innerHTML=(panjang/1000).toPrecision(7)+' km';
				}); 
				 
				 }
				 
				 
					else if (event.type == google.maps.drawing.OverlayType.RECTANGLE) {
					var coordinate = event.overlay.getBounds();
					
					var sw = coordinate.getSouthWest();
					var ne = coordinate.getNorthEast();
				  var southWest = new google.maps.LatLng(sw.lat(), sw.lng());
				  var northEast = new google.maps.LatLng(ne.lat(), ne.lng());
				  var southEast = new google.maps.LatLng(sw.lat(), ne.lng());
				  var northWest = new google.maps.LatLng(ne.lat(), sw.lng());
				  var hasil= google.maps.geometry.spherical.computeArea([northEast, northWest, southWest, southEast]);

					//alert(coordinate);
					
					document.getElementById('result').innerHTML=(hasil/1000000).toPrecision(7)+ "km<sup>2<\/sup>" ;
					
					newShape = event.overlay;
					newShape.type = event.type;
					
					google.maps.event.addListener(newShape, 'bounds_changed', function(){
						// Point was removed
						var coordinate = event.overlay.getBounds();
					
					var sw = coordinate.getSouthWest();
					var ne = coordinate.getNorthEast();
					var southWest = new google.maps.LatLng(sw.lat(), sw.lng());
					var northEast = new google.maps.LatLng(ne.lat(), ne.lng());
					var southEast = new google.maps.LatLng(sw.lat(), ne.lng());
					var northWest = new google.maps.LatLng(ne.lat(), sw.lng());
					var hasil= google.maps.geometry.spherical.computeArea([northEast, northWest, southWest, southEast]);
				  
						document.getElementById('result').innerHTML=(hasil/1000000).toPrecision(7)+ "km<sup>2<\/sup>" ;
					  });
					
					 
					 }
		 
					 else if (event.type == google.maps.drawing.OverlayType.POLYGON) {
					var coordinate = event.overlay.getPath();
					
					var hasil= google.maps.geometry.spherical.computeArea(coordinate);

					//alert(coordinate);
					document.getElementById('result').innerHTML=(hasil/1000000).toPrecision(7)+ "km<sup>2<\/sup>" ;
					 
					 newShape = event.overlay;
					 newShape.type = event.type;
							
					newShape.getPaths().forEach(function(path, index){
					
					  google.maps.event.addListener(path, 'insert_at', function(){
						// New point
						//alert("ASEEKKKKKKK");
						hasil= google.maps.geometry.spherical.computeArea(coordinate);
						document.getElementById('result').innerHTML=(hasil/1000000).toPrecision(7)+ "km<sup>2<\/sup>" ;
					  });
					
					  google.maps.event.addListener(path, 'remove_at', function(){
						// Point was removed
						hasil= google.maps.geometry.spherical.computeArea(coordinate);
						document.getElementById('result').innerHTML=(hasil/1000000).toPrecision(7)+ "km<sup>2<\/sup>" ;
					  });
					
					  google.maps.event.addListener(path, 'set_at', function(){
						// Point was moved
						hasil= google.maps.geometry.spherical.computeArea(coordinate);
						document.getElementById('result').innerHTML=(hasil/1000000).toPrecision(7)+ "km<sup>2<\/sup>" ;
					  });
					
					});
					 }
		
		});
		google.maps.event.addDomListener(document.getElementById('clearOverlay'), 'click', deleteAllShape);

}



        function deleteMarkers() {
		  clearMarkers();
		  markers = [];
		  polygons = [];
		}
		function clearMarkers() {
		  setMapOnAll(null);
		}
		function setMapOnAll(map) {
		  for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		  }
		   for (var i = 0; i < polygons.length; i++) {
			polygons[i].setMap(map);
		  }
		}

		function drawCircle(){
		drawingManager.setDrawingMode(google.maps.drawing.OverlayType.CIRCLE);
		}
		function drawPolygon(){
		drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON);
		}
		function drawPolyline(){
		drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYLINE);
		}
		function drawRectangle(){
		drawingManager.setDrawingMode(google.maps.drawing.OverlayType.RECTANGLE);
		}
		function drawMarker(){
		drawingManager.setDrawingMode(google.maps.drawing.OverlayType.MARKER);
		}
		function handTool(){
		drawingManager.setDrawingMode(null);
		}

        function deleteAllShape() {
			
            for (var i=0; i < all_overlays.length; i++)
            {
              all_overlays[i].overlay.setMap(null);
            }
            all_overlays = [];
            document.getElementById('result').innerHTML= "" ;
     }	



    $(document).ready(function() {

        
    $('#date').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD',
            separator: " to "
        }
    });
         
    $('#example').DataTable();



    $('#SubmitGraph').on('click',function(){


      var data = new FormData();
      var  kode_perusahaan = $('#kode_perusahaan').val();
      var  kode_provinsi = $('#kode_provinsi').val();
      var  date = $('#date').val();
      var  kode_aktivitas = $('#kode_aktivitas').val();
      var  alat_tangkap = $('#alat_tangkap').val();
      var  isDate = $('#isDate').is(":checked");
      
      data.append('kode_perusahaan', $("#kode_perusahaan").val());
      data.append('kode_provinsi', $("#kode_provinsi").val());
      data.append('date', $("#date").val());
      data.append('kode_aktivitas', $("#kode_aktivitas").val());
      data.append('alat_tangkap', $("#alat_tangkap").val());
      data.append('isDate', $("#isDate").is(":checked"));

      console.log("nilai isdate "+ isDate);

      console.log(  data );
     

    $.ajax({
                    type: "POST",
                    url: "<?php echo $url_get_ping; ?>",
                    data: data,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    beforeSend: function(e) {
                      if(e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                      }
                    },
                    success:function(data){
                                  // remove pesan error
                                  $('.form-group').removeClass('has-error').removeClass('has-success');
                      console.log(data);

                      deleteMarkers();							
									if(data.length > 0){   
											var flightPlanCoordinates = [];								
											for (i in data){
											

                                                      if(data[i].kode_aktivitas == 1 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/blue_MarkerA.png" ; 
                                                       } 

                                                       else if(data[i].kode_aktivitas == 2 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/brown_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 3 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/darkgreen_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 4 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/green_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 5 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/orange_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 6 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/paleblue_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 7 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/pink_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 8 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/purple_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 9 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/red_MarkerA.png" ; 
                                                       }

                                                       else if(data[i].kode_aktivitas == 10 ){
                                                        var image = "<?php echo base_url(); ?>/assets/GoogleMapsMarkers/yellow_MarkerA.png" ; 
                                                       }

                                                       else{
												
													  var image = 'data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2238%22%20height%3D%2238%22%20viewBox%3D%220%200%2038%2038%22%3E%3Cpath%20fill%3D%22%23808080%22%20stroke%3D%22%23ccc%22%20stroke-width%3D%22.5%22%20d%3D%22M34.305%2016.234c0%208.83-15.148%2019.158-15.148%2019.158S3.507%2025.065%203.507%2016.1c0-8.505%206.894-14.304%2015.4-14.304%208.504%200%2015.398%205.933%2015.398%2014.438z%22%2F%3E%3Ctext%20transform%3D%22translate%2819%2018.5%29%22%20fill%3D%22%23fff%22%20style%3D%22font-family%3A%20Arial%2C%20sans-serif%3Bfont-weight%3Abold%3Btext-align%3Acenter%3B%22%20font-size%3D%2212%22%20text-anchor%3D%22middle%22%3E' + i + '%3C%2Ftext%3E%3C%2Fsvg%3E';
                                                     }
                                                      

														   var myLatLng = new google.maps.LatLng(data[i].lat, data[i].long);
														   var marker = new google.maps.Marker({
															  position: myLatLng,
															  map: map,
															  icon: image
														  });
																	var infoWindow = new google.maps.InfoWindow(), marker, i;
																	google.maps.event.addListener(marker, 'click', (function(marker, i) {
																	return function() {
																		infoWindow.setContent(data[i].content);
																		infoWindow.open(map, marker);
																		}
																		})(marker, i));
																		
																	flightPlanCoordinates.push(new google.maps.LatLng( data[i].lat, data[i].long ));
																	markers.push(marker);
				
											}
											
                                            /*
											 var flightPath = new google.maps.Polyline({
												path: flightPlanCoordinates,
												geodesic: true,
												strokeColor: '#FF0000',
												strokeOpacity: 1.0,
												strokeWeight: 2
											  });
											  polygons.push(flightPath);
											  flightPath.setMap(map); 
											  */
											  
									}else{
										 alert("Maaf data tidak tersedia, silahkan kontak admin untuk info yang lebih detail");
									}

                                 
                              }
                          });
           

                        }); 
    


	} );
		



</script>