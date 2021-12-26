
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Supplier</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Supplier</a></li>
                                    <li class="active">Update Supplier</li>
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
                                <strong class="card-title">Supplier Update</strong>
                              
                            </div>


                            <div class="card-body">

                            	
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('master/update_master_supplier',$attributes); 
                            	?>

              <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>

    
                  <tbody>
                    <input type='hidden' name='id_supplier' value="<?php echo $row['id_supplier'] ; ?>">
                    <tr>
                    		<th width='120px' scope='row'>Kode Supplier</th>    
                    		<td><input type='text' class='form-control' name='kode_name' value="<?php echo $row['kode_name'] ; ?>" maxlength="3" onkeydown="upperCaseF(this)" required></td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>Nama Perusahaan</th>   
                    		 <td><input type='text' class='form-control' name='nama_perusahaan' value="<?php echo $row['nama_perusahaan'] ; ?>"  required></td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>Tipe Perusahaan</th>    
                    		<td><input type='text' class='form-control' name='tipe_perusahaan' value="<?php echo $row['tipe_perusahaan'] ; ?>"  required></td>
                    </tr>
                   <!-- <tr>
                    		<th width='120px' scope='row'>Lokasi Perusahaan</th>  
                    		<td><input type='text' class='form-control' name='lokasi' value="<?php echo $row['lokasi'] ; ?>"  required></td>
                    </tr> -->
                    <input type='hidden' class='form-control' name='lokasi' >
                    <tr>
                    		<th width='120px' scope='row'>Alamat Perusahaan</th>   
                    		<td><input type='text' class='form-control' name='address' value="<?php echo $row['address'] ; ?>"  required></td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>country</th>    
                    		<td><select class="form-control" name="country" id="country">
              						 <option value="">Select Country</option>
						               <?php foreach($countryLists->result() as $rows){ ?>
						                <option value="<?php echo $rows->id ; ?>" <?php if($row['country'] == $rows->id  ) { ?> selected="selected"<?php } ?> ><?php echo $rows->country_name ; ?></option>
						               <?php  } ?>
            					</select>
            				</td>
            		</tr>
                    <tr>
                    		<th width='120px' scope='row'>province</th>    
                    		<td> 
                    			<select class="form-control" name="province" id="province">
					               <option value="">Select Province</option>
					               <?php foreach($provinceLists->result() as $rows){ ?>
					                <option value="<?php echo $rows->id ; ?>" <?php if($row['province'] == $rows->id  ) { ?> selected="selected"<?php } ?>><?php echo $rows->name ; ?></option>
					               <?php  } ?>
					            </select>
					        </td>
                    </tr>
                    <tr>
                    		<th width='120px' scope='row'>regencies</th>    
                    		<td> <select class="form-control" name="regencies" id="regencies">
					               <option value="">Select regencies</option>
                                   <option value="<?php echo $rows->id ; ?>"><?php echo $rows->name ; ?></option>
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
                   <!-- <tr>
                    		<th width='120px' scope='row'>village</th>    
                    		<td> <select class="form-control" name="village" id="village">
					               <option value="">Select village</option>
					            </select>
					        </td>
                    </tr> -->
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
               <a href='<?php echo base_url(); ?>master/master_supplier/'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<script>


$(document).ready(function() {
 

     getRegencies(<?php echo $row['province']; ?> , <?php echo $row['regencies']; ?>)
     getDistrict(<?php echo $row['regencies']; ?> , <?php echo $row['district']; ?>)
     getVillage(<?php echo $row['district']; ?> , <?php echo $row['village']; ?>)

 	 /* Dropdown Dinamic */
   $("#province").change(function(){
        //alert('province!');
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
     // alert('regencies!');
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
   // alert('district!');
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


 function getRegencies(province , regencies){
     //alert('getRegencies!');
      $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo $select_load_regencies_edit; ?>",
            data: "province="+province+"&regencies="+regencies,
            success: function(msg){

                if(msg == ''){
                    $("#regencies").html('<option value="">Select Regencies</option>');
                }else{
                    $("#regencies").html(msg);                                                     
                }
            }
        }); 
   }
   function getDistrict(regencies , district){
    //alert('getDistrict!');
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo $select_load_district_edit; ?>",
            data: "regencies="+regencies+"&district="+district,
            success: function(msg){

                if(msg == ''){
                    $("#district").html('<option value="">Select District</option>');
                }else{
                    $("#district").html(msg);                                                     
                }
            }
        }); 
   }
   function getVillage(district , village){
    //alert('getVillage!');
       $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo $select_load_villages_edit; ?>",
            data: "district="+district+"&village="+village,
            success: function(msg){

                if(msg == ''){
                    $("#village").html('<option value="">Select District</option>');
                }else{
                    $("#village").html(msg);                                                     
                }
            }
        }); 
   }


   function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}


</script>

