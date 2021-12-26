
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
                                    <li><a href="<?php echo base_url()."/trip/trip_detail/".$kode_trip; ?>">Data Trip</a></li>
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
             						echo form_open_multipart('trip/detail_pancing/'.$kode_trip,$attributes); 
                            	?>

              <div class='col-md-4'>
                  <table class='table table-condensed table-bordered'>

                  <tbody>

                    <input type='hidden' name='kode_trip' value='<?php echo $kode_trip; ?>'>

                
                    <tr>
                            <th width='120px' scope='row'>ukuran_mata_pancing</th>    
                            <td><input type='number' class='form-control' name='ukuran_mata_pancing' id="ukuran_mata_pancing" value="<?php if( !empty($detail['ukuran_mata_pancing']) ){ echo $detail['ukuran_mata_pancing']; } ?>" step=".01"></td>
                    </tr>

                    <!--<tr>
                            <th width='120px' scope='row'>jumlah_pemancing</th>    
                            <td><input type='number' class='form-control' name='jumlah_pemancing' id="jumlah_pemancing" value="<?php if( !empty($detail['jumlah_pemancing']) ){ echo $detail['jumlah_pemancing']; } ?>"></td>
                    </tr>-->
                    <input type='hidden' class='form-control' name='jumlah_pemancing' id="jumlah_pemancing" value="<?php if( !empty($detail['jumlah_pemancing']) ){ echo $detail['jumlah_pemancing']; } ?>">

              		<tr>
                            <th width='120px' scope='row'>jumlah_boiboi</th>    
                            <td><input type='number' class='form-control' name='jumlah_boiboi' id="jumlah_boiboi" value="<?php if( !empty($detail['jumlah_boiboi']) ){ echo $detail['jumlah_boiboi']; } ?>"></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>jumlah__palka</th>    
                            <td><input type='number' class='form-control' name='jumlah__palka' id="jumlah__palka" value="<?php if( !empty($detail['jumlah__palka']) ){ echo $detail['jumlah__palka']; } ?>" step=".01"></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>kapasitas_palka_umpan (m<sup>3</sup> )</th>    
                            <td><input type='number' class='form-control' name='kapasitas_palka_umpan' id="kapasitas_palka_umpan" value="<?php if( !empty($detail['kapasitas_palka_umpan']) ){ echo $detail['kapasitas_palka_umpan']; } ?>" step=".01"></td>
                    </tr>

                    <tr>
                            <th width='120px' scope='row'>sistem_sirkulasi_air_palka_umpan</th>    
                            <td>
                                 <select class='form-control' name='sistem_sirkulasi_air_palka_umpan' id="sistem_sirkulasi_air_palka_umpan">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="Y" <?php if( !empty($detail['sistem_sirkulasi_air_palka_umpan']) ){ if($detail['sistem_sirkulasi_air_palka_umpan'] == "Y"){ echo 'selected';  } } ?>>Ya</option>
                                    <option value="T" <?php if( !empty($detail['sistem_sirkulasi_air_palka_umpan']) ){ if($detail['sistem_sirkulasi_air_palka_umpan'] == "T"){ echo 'selected';  } } ?>>Tidak</option>
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
