
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Landing</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Landing</a></li>
                                    <li class="active">Tambah Landing Baru</li>
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
                                <strong class="card-title">Landing Add</strong>
                              
                            </div>


                            <div class="card-body">

                            	
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('master/add_master_landing',$attributes); 
                            	?>

              <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>

    
                  <tbody>

                    <tr>
                    		<th width='120px' scope='row'>Nama Landing</th>   
                    		 <td><input type='text' class='form-control' name='nama_landing' required></td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>Lokasi </th>  
                    		<td><input type='text' class='form-control' name='lokasi' required></td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>province</th>    
                    		<td> 
                    			<select class="form-control" name="province" id="province">
					               <option value="">Select Province</option>
					               <?php foreach($provinceLists->result() as $row){ ?>
					                <option value="<?php echo $row->id ; ?>"><?php echo $row->name ; ?></option>
					               <?php  } ?>
					            </select>
					        </td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>regencies</th>    
                    		<td> <select class="form-control" name="regencies" id="regencies">
					               <option value="">Select regencies</option>
					            </select>
					        </td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>district</th>    
                    		<td> <select class="form-control" name="district" id="district">
					               <option value="">Select district</option>
					            </select>
					        </td>
                    </tr>
                    <!--<tr>
                    		<th width='120px' scope='row'>village</th>    
                    		<td> <select class="form-control" name="village" id="village">
					               <option value="">Select village</option>
					            </select>
					        </td>
                    </tr> -->
                    <input type='hidden' class='form-control' name='village'>
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
               <a href='<?php echo base_url(); ?>master/master_landing/'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<script>


$(document).ready(function() {
 
 	


 	 /* Dropdown Dinamic */
   $("#province").change(function(){

        var id = $("#province").val();
       $("#district").html('<option value="">Select District</option>');
        $("#village").html('<option value="">Select Village</option>');

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo $select_load_regencies; ?>",
            data: "id="+id,
            success: function(msg){

                if(msg == ''){
                    $("#regencies").html('<option value="">Select Regencies</option>');

                }else{
                    $("#regencies").html(msg);                                                     
                }
            }
        });    
    });


   $("#regencies").change(function(){
        var id = $("#regencies").val();
        $("#village").html('<option value="">Select Village</option>');
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo $select_load_districts; ?>",
            data: "id="+id,
            success: function(msg){
                if(msg == ''){
                    $("#district").html('<option value="">Select District</option>');
                }else{
                    $("#district").html(msg);                                                     
                }
            }
        });    
    });

   $("#district").change(function(){
        var id = $("#district").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo $select_load_villages; ?>",
            data: "id="+id,
            success: function(msg){
                if(msg == ''){
                    $("#village").html('<option value="">Select Village</option>');
                }else{
                    $("#village").html(msg);                                                     
                }
            }
        });    
    });
    /* End Dropdown Dinamic */




 } );

</script>

