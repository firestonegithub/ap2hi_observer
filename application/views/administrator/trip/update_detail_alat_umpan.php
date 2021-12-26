
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Trip Detail Alat Umpan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip Detail lat Umpan</li>
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
             						echo form_open_multipart('trip/alat_memancing_umpan/'.$kode_trip,$attributes); 
                            	?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'>lampu</th>    
                            <td><input type='text' class='form-control' name='lampu' id="lampu" value="<?php if( !empty($detail['lampu']) ){ echo $detail['lampu']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'> boke_ami</th>    
                            <td>
                                <select class='form-control' name='boke_ami' id="boke_ami">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['boke_ami']) ){ if($detail['boke_ami'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['boke_ami']) ){ if($detail['boke_ami'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
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
