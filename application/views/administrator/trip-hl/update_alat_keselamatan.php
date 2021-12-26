
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
             						echo form_open_multipart('trip_hl/alat_keselamatan/'.$kode_trip,$attributes); 
                            	?>

        <div class="row">
              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                    <tr>
                            <th width='120px' scope='row'>jaket_keselamatan</th>    
                            <td>
                              
                                <select class='form-control' name='jaket_keselamatan' id="jaket_keselamatan">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['jaket_keselamatan']) ){ if($detail['jaket_keselamatan'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['jaket_keselamatan']) ){ if($detail['jaket_keselamatan'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>

                            </td>
                    </tr>


                    <tr>
                            <th width='120px' scope='row'>jumlah_ring</th>    
                             <td><input type='text' class='form-control' name='jumlah_ring' id="jumlah_ring" value="<?php if( !empty($detail['jumlah_ring'])){ echo $detail['jumlah_ring']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>rakit_jumlah</th>    
                             <td><input type='text' class='form-control' name='rakit_jumlah' id="rakit_jumlah" value="<?php if( !empty($detail['rakit_jumlah'])){ echo $detail['rakit_jumlah']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>rakit_kapasitas</th>    
                             <td><input type='text' class='form-control' name='rakit_kapasitas' id="rakit_kapasitas" value="<?php if( !empty($detail['rakit_kapasitas'])){ echo $detail['rakit_kapasitas']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'>rakit_kondisi</th>    
                             <td><input type='text' class='form-control' name='rakit_kondisi' id="rakit_kondisi" value="<?php if( !empty($detail['rakit_kondisi'])){ echo $detail['rakit_kondisi']; } ?>"></td>
                    </tr>

                     <tr>
                            <th width='120px' scope='row'> p3k</th>    
                            <td>
                               
                                <select class='form-control' name='p3k' id="p3k">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['p3k']) ){ if($detail['p3k'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['p3k']) ){ if($detail['p3k'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
                                </select>
                            </td>
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
