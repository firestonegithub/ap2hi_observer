
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Trip Detail Pancing</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo base_url()."/administrator/" ?>">Dashboard</a></li>
                                    <li><a href="<?php echo base_url()."/trip_hl/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
                                    <li class="active">Update  Trip Detail Pancing</li>
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
                                <strong class="card-title">Trip Detail Pancing</strong>
                                
                            </div>


                            <div class="card-body">

                            	<?php echo validation_errors(); ?>
                            	<?php 
                            	 $attributes = array('class'=>'form-horizontal','role'=>'form');
             						echo form_open_multipart('trip_hl/detail_pancing/'.$kode_trip,$attributes); 
                            	?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'>ukuran_mata_pancing_tuna</th>    
                            <td><input type='number' class='form-control' name='ukuran_mata_pancing_tuna' id="ukuran_mata_pancing_tuna" value="<?php if( !empty($detail['ukuran_mata_pancing_tuna']) ){ echo $detail['ukuran_mata_pancing_tuna']; } ?>" step=".01"></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>ukuran_mata_pancing_umpan</th>
                            <td><input type='number' class='form-control' name='ukuran_mata_pancing_umpan' id="ukuran_mata_pancing_umpan" value="<?php if( !empty($detail['ukuran_mata_pancing_umpan']) ){ echo $detail['ukuran_mata_pancing_umpan']; } ?>" step=".01"></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>jenis_mata_pancing</th>
                            <td>
                                <select class='form-control' name='jenis_mata_pancing' id="jenis_mata_pancing">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="J" <?php if( !empty($detail['jenis_mata_pancing']) ){ if($detail['jenis_mata_pancing'] == "J"){ echo 'selected';  } } ?>>J</option>
                                    <option value="Circle" <?php if( !empty($detail['jenis_mata_pancing']) ){ if($detail['jenis_mata_pancing'] == "Circle"){ echo 'selected';  } } ?>>Cirle</option>
                                </select>
                            </td>
                    </tr>

                    
                    <tr>
                            <th width='120px' scope='row'>tali_baja</th>
                            <td>
                                <select class='form-control' name='tali_baja' id="tali_baja">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['tali_baja']) ){ if($detail['tali_baja'] == "Y"){ echo 'selected';  } } ?>>Y</option>
                                    <option value="T" <?php if( !empty($detail['tali_baja']) ){ if($detail['tali_baja'] == "T"){ echo 'selected';  } } ?>>T</option>
                                </select>
                            </td>
                    </tr>
                    
                    <tr>
                            <th width='120px' scope='row'>pengolahan_limbah</th>
                            <td>
                                <select class='form-control' name='pengolahan_limbah' id="pengolahan_limbah">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['pengolahan_limbah']) ){ if($detail['pengolahan_limbah'] == "Y"){ echo 'selected';  } } ?>>Y</option>
                                    <option value="T" <?php if( !empty($detail['pengolahan_limbah']) ){ if($detail['pengolahan_limbah'] == "T"){ echo 'selected';  } } ?>>T</option>
                                </select>
                            </td>
                    </tr>
                    
                    <tr>
                            <th width='120px' scope='row'>alat_tangkap</th>    
                            <td><input type='text' class='form-control' name='alat_tangkap' id="alat_tangkap" value="<?php if( !empty($detail['alat_tangkap']) ){ echo $detail['alat_tangkap']; } ?>"></td>
                    </tr>
                    
                    <tr>
                            <th width='120px' scope='row'>gambar_mata_pancing</th>    
                            <td> <input type="file" class="form-control" name="gambar_mata_pancing" id="gambar_mata_pancing" accept="image/*" >
                                <?php if( !empty($detail['gambar_mata_pancing']) ){ ?>
                                                <img src="<?php echo base_url() ?>assets/upload/<?php echo $detail['gambar_mata_pancing']; ?> " class="thumbnail" width="100px" height="100px">
                                <?php }  ?>

                            </td>
              		</tr>
     
                    </tbody>
                  </table>
                </div>
             
               <button type='submit' name='submit' class='btn btn-info'>Update</button>
               <a href='<?php echo base_url()."trip_hl/trip_detail/".$kode_trip; ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
 

                               
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>


                   



        </div>
    </div><!-- .animated -->
</div><!-- .content -->
