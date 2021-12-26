
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Trip Alat Bantu</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip_hl/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip Alat Bantu</li>
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
                                <strong class="card-title">Trip Add</strong>
                                
                            </div>


                            <div class="card-body">

                            	<?php echo validation_errors(); ?>
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('trip_hl/informasi_lain/'.$kode_trip,$attributes); 
                            	?>

        <div class="row">
              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                    <tr>
                            <th width='120px' scope='row'>solar</th>    
                             <td><input type='text' class='form-control' name='solar' id="solar" value="<?php if( !empty($detail['solar'])){ echo $detail['solar']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>bensin</th>    
                             <td><input type='text' class='form-control' name='bensin' id="bensin" value="<?php if( !empty($detail['bensin'])){ echo $detail['bensin']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>es</th>    
                             <td><input type='text' class='form-control' name='es' id="rakit_kapasitas" value="<?php if( !empty($detail['es'])){ echo $detail['es']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>biaya</th>    
                             <td><input type='text' class='form-control' name='biaya' id="biaya" value="<?php if( !empty($detail['biaya'])){ echo $detail['biaya']; } ?>"></td>
                    </tr>

                   

             

                   
             
     
                    </tbody>
                  </table>
                </div>
 			

               
 			</div> <!-- Row -->



             
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href='<?php echo base_url()."trip_hl/trip_detail/".$kode_trip; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->
