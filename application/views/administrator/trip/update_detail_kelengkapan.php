
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Trip Detail Kelengkapan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip Detail Kelengkapan</li>
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
             						echo form_open_multipart('trip/detail_kelengkapan/'.$kode_trip,$attributes); 
                            	?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'>sonar</th>    
                            <td>
                              
                                <select class='form-control' name='sonar' id="sonar">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['sonar']) ){ if($detail['sonar'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['sonar']) ){ if($detail['sonar'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>

                            </td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'> fishfinder</th>    
                            <td>
                               
                                <select class='form-control' name='fishfinder' id="fishfinder">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['fishfinder']) ){ if($detail['fishfinder'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['fishfinder']) ){ if($detail['fishfinder'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>radio</th>    
                            <td>
                               
                                <select class='form-control' name='radio' id="radio">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['radio']) ){ if($detail['radio'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['radio']) ){ if($detail['radio'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>gps</th>    
                            <td>
                                <select class='form-control' name='gps' id="gps">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['gps']) ){ if($detail['gps'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['gps']) ){ if($detail['gps'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>telepon_satelite</th>    
                            <td>
                               <select class='form-control' name='telepon_satelite' id="telepon_satelite">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['telepon_satelite']) ){ if($detail['telepon_satelite'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['telepon_satelite']) ){ if($detail['telepon_satelite'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
                    </tr>

             
     
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href='<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->
