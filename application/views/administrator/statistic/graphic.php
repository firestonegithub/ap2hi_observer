        

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

                            <form class="form-horizontal" method="post" id="searchGraph">
                                <div class="modal-body">

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

                                <div class="form-group"> 
                                <label for="tipe_graph" class="col-sm-2 control-label">Pilih Tahun</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="tahun" name="tahun">
                                        <option value="All"> All Tahun </option>
                                        <?php foreach($years->result() as $year ){ ?>
                                            <option value="<?php echo $year->year; ?>"><?php echo $year->year; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div> 

                                
                                <div class="form-group"> 
                                <label for="tipe_graph" class="col-sm-2 control-label">Pilih Tahun</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="bulan" name="bulan">
                                        <option value="All"> All Bulan </option>
                                        <?php for($i=1;$i<=12;$i++){ ?>
                                            < <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div> 

                                
                                <div class="form-group"> 
                                <label for="tipe_graph" class="col-sm-2 control-label">Pilih Tanggal</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="tanggal" name="tanggal">
                                        <option value="All"> All Tanggal </option>
                                        <?php for($i=1;$i<=31;$i++){ ?>
                                            < <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div> 


                                <div class="form-group"> 
                                <label for="tipe_graph" class="col-sm-2 control-label">Tipe alat tangkap</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="tipe_alat" name="tipe_alat">
                                        <option value="All"> All Tipe </option>
                                        <option value="HL"> HL </option>
                                        <option value="PL"> PL </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group"> 
                                <label for="tipe_graph" class="col-sm-2 control-label">Pilih Tipe Graph</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="tipe" name="tipe">
                                        <?php foreach($tipe_graph as   $key => $value ){ ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div> 

                                

                                </div>
                                <div class="form-group"> <center> <button type="button" class="btn btn-success" id="SubmitGraph"> Search </button> </center> </div>
                            
                             </form>
                               
                             <div class="messages"></div>  

                             <div id="chartContainer"  style="height: 500px; width: 100%;" ></div>

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->




<script type="text/javascript">
$(document).ready(function() {
  
    $('#SubmitGraph').on('click',function(){


        var chartContainer = document.getElementById('chartContainer');
        chartContainer.innerHTML = '&nbsp;';
        $('#chartContainer').append('<div id="chartContainer"  style="height: 500px; width: 100%;" ></div>');


      var data = new FormData();
      var  kode_perusahaan = $('#kode_perusahaan').val();
      var  kode_provinsi = $('#kode_provinsi').val();
      var  tahun = $('#tahun').val();
      var  bulan = $('#bulan').val();
      var  tanggal = $('#tanggal').val();
      var  tipe_alat = $('#tipe_alat').val();
      var  tipe = $('#tipe').val();
      
      data.append('kode_perusahaan', $("#kode_perusahaan").val());
      data.append('kode_provinsi', $("#kode_provinsi").val());
      data.append('tipe', $("#tipe").val());
      data.append('tahun', $("#tahun").val());
      data.append('bulan', $("#bulan").val());
      data.append('tanggal', $("#tanggal").val());
      data.append('tipe_alat', $("#tipe_alat").val());
      
      console.log(data);

            $.ajax({
                    type: "POST",
                    url: "<?php echo $url_get_graph; ?>",
                    data: data,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    beforeSend: function(e) {
                      if(e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                      }
                    },
                    success:function(response){
                                  // remove pesan error
                                  $('.form-group').removeClass('has-error').removeClass('has-success');
                      console.log(response);
                                  if (response.success == 'true') {
                                      $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                        '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                                      '</div>');
                        
                     
                                      if(kode_perusahaan == 'All'  && kode_provinsi == 'All'){

                                                if(tipe == 'catch_comp'  ){

                                                    

                                                    histack(response.title, response.dataPoints);

                                                }

                                                if(tipe == 'bait_comp'){
                                                    
                                                    histack(response.title, response.dataPoints);

                                                }

                                                if(tipe == 'catch_n_bait_comp'){

                                                    histack(response.title, response.dataPoints);

                                                }

                                                if(tipe == 'fad_usage'){

                                                    histack(response.title, response.dataPoints);

                                                    }


                                                if(tipe == 'fad_composition'){

                                                    histack(response.title, response.dataPoints);

                                                }

                                                if(tipe == 'vessel_n_trip'){

                                                    //vessel_n_trip
                                                   
                                                    line(response.title, response.dataPoints);

                                                }

                                                if(tipe == 'length_freq'){

                                                    histack(response.title, response.dataPoints);

                                                }

                                                if(tipe == 'length_n_weight'){


                                                    point(response.title, response.dataPoints);

                                                }


                                      }else{

                                        if(tipe == 'catch_comp'  ){

                                                    pie(response.title , response.dataPoints );
                                        }

                                        if(tipe == 'bait_comp'){
                                                    
                                                    pie(response.title, response.dataPoints);

                                        }

                                        if(tipe == 'catch_n_bait_comp'){

                                                    pie(response.title, response.dataPoints);

                                        }

                                        if(tipe == 'fad_usage'){

                                                    pie(response.title, response.dataPoints);

                                        }

                                        if(tipe == 'fad_composition'){

                                            histack(response.title, response.dataPoints);

                                        }

                                        if(tipe == 'vessel_n_trip'){

                                            line(response.title, response.dataPoints);

                                        }

                                        if(tipe == 'length_freq'){

                                            histack(response.title, response.dataPoints);

                                        }

                                        if(tipe == 'length_n_weight'){

                                            point(response.title, response.dataPoints);

                                            }


            

                                      }
                      
                          /*  Check data tipe yamg masuk */

                        
                                  }else{
                                      $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                        '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                                      '</div>');
                        
                        
  
                        
                        
                                  }
                              }
                          });
           

    }); 



function pie(title, dataPoints){

        var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: title
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "#percent%" ,
		dataPoints: dataPoints
	}]
});
chart.render();



    }


function histack(title, dataPoints){



    var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: title
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
	data: 


        dataPoints
	
	
});
chart.render();
        
    }

function line(title, dataPoints){


    var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: title
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: dataPoints
	}]
});
chart.render();



}



function point(title, dataPoints){

    
    var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: title
	},
	axisX: {
		title:"Lenght"
	},
	axisY:{
		title: "Weight",
		includeZero: true
	},
	data: dataPoints
});
chart.render();



}

});
</script>





      